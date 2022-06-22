<?php
session_start();
include('config.php');
if(isset($_SESSION['cart']))
{
    $date= date('Y-m-d');
    $total=$_SESSION['total'];
    $user_id=$_SESSION['user_id'];
    $or_query="INSERT INTO `tbl_order`(`or_date`, `or_Total`, `cust_id`) VALUES ('$date','$total','$user_id')";
    $or_result=mysqli_query($conn,$or_query);
    if($or_result)
    {
        $order_id=mysqli_insert_id($conn);
        $query="select * from tbl_product where pro_id IN (".implode(',',$_SESSION['cart']).")";
        $result=mysqli_query($conn,$query);
        $index=0;
        while($row=mysqli_fetch_assoc($result))
        {
            $pro_id=$row['pro_id'];
            $pro_name=$row['pro_name'];
            $pro_quan=$_SESSION['qty'][$index];
            $pro_price=$row['pro_price'];
            $in_query="INSERT INTO `tbl_invoice`(`in_pro_id`, `in_pro_quantity`, `in_pro_price`, `in_order_id`, `in_pro_name`) VALUES ('$pro_id','$pro_quan','$pro_price','$order_id','$pro_name')";
            $in_result=mysqli_query($conn,$in_query);
            
            $index++;
        }
        unset($_SESSION['cart']);
        unset($_SESSION['qty']);
        $_SESSION['msg']="Your Order has been Placed";
        header('location:index.php');
                
    }
}else{
    header('location:view_cart.php');
}

?>
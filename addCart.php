<?php
session_start();
if(isset($_GET['id']))
{
    $id=$_GET['id'];
    $flag=true;
    foreach($_SESSION['cart'] as $item)
    {
        if($item==$id)
        {
            $flag=false;
        }
    }
    if($flag)
    {
        array_push($_SESSION['cart'],$id);
        array_push($_SESSION['qty'],1);
    }else{
        $_SESSION['msg']="Item already exist";
    }
    
    header('location:products.php');
}else{
    header('location:products.php');
}

?>
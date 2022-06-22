<?php
include 'header.php';
include '../config.php';

$or_query="SELECT * from tbl_order ";
$or_result=mysqli_query($conn,$or_query);

?>

<!-- Table Start -->
<div class="container-fluid pt-4 px-4">
                <div class="row g-4">
                    <div class="col-12">
                        <div class="bg-light rounded h-100 p-4">
                            <h6 class="mb-4">Responsive Table</h6>
                            <div class="table-responsive">
                                <table>
                                <?php
                                        while($o_row=mysqli_fetch_assoc($or_result))
                                        {
                                        ?>
                                    <tr>
                                        <th><h1>Order Id</h1></th>
                                        <td><?php echo $o_row['or_id'];?></td>
                                        <th>Customer Name</th>
                                        <td><?php echo $o_row['cust_id'];?></td>
                                    </tr>
                                    <tr>
                                        <th>Order Date</th>
                                        <td><?php echo $o_row['or_date'];?></td>
                                        <th>Total Bill</th>
                                        <td><?php echo $o_row['or_Total'];?></td>
                                    </tr>
                                    <table class="table">
                                    <thead>
                                        <tr>
                                            <th scope="col">Product Id</th>
                                            <th scope="col">Image</th>
                                            <th scope="col">Product Name</th>
                                            <th scope="col">Product Category</th>
                                            <th scope="col">Product Price</th>
                                            <th scope="col">Product Quantity</th>
                                            <th scope="col">Description</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $query="SELECT * from tbl_order o join tbl_invoice i on o.or_id=i.in_order_id join tbl_product p on i.in_pro_id=p.pro_id join tbl_category c on p.pro_category=c.cat_id where o.or_id=".$o_row['or_id'];
                                        $result=mysqli_query($conn,$query);
                                        while($row=mysqli_fetch_assoc($result))
                                        {
                                        ?>
                                        <tr>
                                            <th scope="row"><?php echo $row['pro_id'];?></th>
                                            <td><img src="data:image/jpg;charset=utf8;base64,<?php echo base64_encode($row['pro_image']);?>" width="100px" height="100px"/></td>
                                            <td><?php echo $row['pro_name'];?></td>
                                            <td><?php echo $row['cat_name'];?></td>
                                            <td><?php echo $row['pro_price'];?></td>
                                            <td><?php echo $row['pro_quantity'];?></td>
                                            <td><?php echo $row['pro_description'];?></td>
                                        </tr>
                                        <?php
                                        }
                                        ?>
                                    </tbody>
                                </table>
                                <?php
                                        }
                                        ?>
                                </table>
                                
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Table End -->


<?php
include 'footer.php';

?>
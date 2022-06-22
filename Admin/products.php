<?php
include 'header.php';
include '../config.php';
$query="SELECT * from tbl_product p join tbl_category c on p.pro_category=c.cat_id ";
$result=mysqli_query($conn,$query);
?>

<!-- Table Start -->
<div class="container-fluid pt-4 px-4">
                <div class="row g-4">
                    <div class="col-12">
                        <div class="bg-light rounded h-100 p-4">
                            <h6 class="mb-4">Responsive Table</h6>
                            <div class="table-responsive">
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
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Table End -->


<?php
include 'footer.php';

?>
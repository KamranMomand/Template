<?php
 
 include 'header.php';
 include 'config.php';
 $id=$_GET['id'];
 $query="select * from tbl_product join tbl_category on tbl_product.pro_category=tbl_category.cat_id where pro_id='$id'";
 $result=mysqli_query($conn,$query);

 ?>
 
 <!-- inner page section -->
 <section class="inner_page_head">
         <div class="container_fuild">
            <div class="row">
               <div class="col-md-12">
                  <div class="full">
                     <h3>Product Details</h3>
                  </div>
               </div>
            </div>
         </div>
      </section>
      <!-- end inner page section -->
      <!-- product section -->
      <section class="product_section layout_padding">
         <div class="container">
           
            <div class="row">
            <?php
while($row=mysqli_fetch_assoc($result))
{
?>
<div class="col-lg-6">
<div class="img-box">
                        <img src="data:image/jpg;charset=utf8;base64,<?php echo base64_encode($row['pro_image']);?>" alt="" width="500px" height="400px">
                     </div>
</div>
<div class="col-lg-6">
<h1>
                        <?php echo $row['pro_name'];?>
                        </h1>
                        <h4><?php echo $row['pro_description'];?></h4>
                        <h4><?php echo "$".$row['pro_price'];?></h4>

                        <input type="number" name="qty"/>
                        <a href="addCart.php?id=<?php echo $row['pro_id'];?>" class="option2">
                           Add To Cart
                           </a>
</div>
<?php
}
               ?>
            </div>

            </div>
            
         </div>
      </section>
      <!-- end product section -->
      <?php
 
 include 'footer.php';
 ?>
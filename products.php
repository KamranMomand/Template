 <?php
 
 include 'header.php';
 include 'config.php';
 $query="select * from tbl_product join tbl_category on tbl_product.pro_category=tbl_category.cat_id";
 $result=mysqli_query($conn,$query);

 ?>
 
 <!-- inner page section -->
 <section class="inner_page_head">
         <div class="container_fuild">
            <div class="row">
               <div class="col-md-12">
                  <div class="full">
                     <h3>Product Grid</h3>
                  </div>
               </div>
            </div>
         </div>
      </section>
      <!-- end inner page section -->
      <!-- product section -->
      <section class="product_section layout_padding">
         <div class="container">
            <div class="heading_container heading_center">
               <h2>
                  Our <span>products</span>
               </h2>
            </div>
            <div class="row">
<?php
while($row=mysqli_fetch_assoc($result))
{
?>
               <div class="col-sm-6 col-md-4 col-lg-3">
                  <div class="box">
                     <div class="option_container">
                        <div class="options">
                           <a href="pro_details.php?id=<?php echo $row['pro_id'];?>" class="option1">
                           <?php echo $row['pro_name'];?>
                           </a>
                           <a href="addCart.php?id=<?php echo $row['pro_id'];?>" class="option2">
                           Buy Now
                           </a>
                        </div>
                     </div>
                     <div class="img-box">
                        <img src="data:image/jpg;charset=utf8;base64,<?php echo base64_encode($row['pro_image']);?>" alt="">
                     </div>
                     <div class="detail-box">
                        <h5>
                        <?php echo $row['pro_name'];?>
                        </h5>
                        <h6>
                           $<?php echo $row['pro_price'];?>
                        </h6>
                     </div>
                  </div>
               </div>
               <?php
}
               ?>
            </div>
            <div class="btn-box">
               <a href="">
               View All products
               </a>
            </div>
         </div>
      </section>
      <!-- end product section -->
      <?php
 
 include 'footer.php';
 ?>
<?php
 include 'header.php';
 include 'config.php';
 if(isset($_SESSION['total']))
 {
   $_SESSION['total']=0;
 }
 ?>
 
 <!-- inner page section -->
 <section class="inner_page_head">
         <div class="container_fuild">
            <div class="row">
               <div class="col-md-12">
                  <div class="full">
                     <h3>Cart Details</h3>
                  </div>
               </div>
            </div>
         </div>
      </section>
      <!-- end inner page section -->
      <!-- product section -->
      <section class="product_section layout_padding">
      <form action="updateCart.php" method="post">
         <div class="container">
           
            <div class="row">
            <?php
                  if(count($_SESSION['cart'])>0)
                  {
                      $total=0;
                      ?>
                     
            <table class="table table-bordered">
                <thead>
                  <tr>
                    <th class="product-thumbnail">Image</th>
                    <th class="product-name">Product</th>
                    <th class="product-price">Price</th>
                    <th class="product-quantity">Quantity</th>
                    <th class="product-total">Total</th>
                    <th class="product-remove">Remove</th>
                  </tr>
                </thead>
                <tbody>
                <?php
                $query="select * from tbl_product where pro_id IN (".implode(',',$_SESSION['cart']).")";
                $result=mysqli_query($conn,$query);
                $index=0;
                while($row=mysqli_fetch_assoc($result))
                {
                ?>
                      <tr>
                    <td class="product-thumbnail">
                      <img src="data:image/jpg;charset=utf8;base64,<?php echo base64_encode($row['pro_image']);?>" alt="Image" class="img-fluid" width="100px" height="100px">
                    </td>
                    <td class="product-name">
                      <h2 class="h5 text-black"><?php echo $row['pro_name'];?></h2>
                    </td>
                    <td>Rs&nbsp;<?php echo $row['pro_price'];?></td>
                   
                    <td>
                      <div class="input-group mb-3" style="max-width: 120px;">
                        <input type="hidden" name="indexes[]" value="<?php echo $index; ?>">
                        <input type="number" class="form-control" value="<?php echo $_SESSION['qty'][$index]?>" min="1" name="qty<?php echo $index;?>">
                        <!-- <div class="input-group-append">
                          <button class="btn btn-outline-primary js-btn-plus" type="button">&plus;</button>
                        </div> -->
                      </div>

                    </td>
                    <td>Rs &nbsp;<?php echo $row['pro_price']* $_SESSION['qty'][$index];
                    $total += $row['pro_price']* $_SESSION['qty'][$index];   //$total= $total+ $row['pro_price']* $_SESSION['qty'][$index]
                    ?></td>
                    <td><a href="deleteCart.php?id=<?php echo $row['pro_id'];?>" class="btn btn-primary height-auto btn-sm">X</a></td>
                  </tr>
                  <?php
                  $index++;
                }
                  
                  ?>
                  </tbody>
              </table>
              <input type="submit" class="btn btn-success" value="UpdateCart" name="btnUpdate"/> 
                  
<?php
echo "<h5> Total bill : ".$total."</h5>";
$_SESSION['total']=$total;
                  }else{
                      ?>
                      <h1> No Data in cart</h1>
                      <?php
                  }
                  ?>
               <a href="orders.php" class="btn btn-success">Place Order</a>
            </div>

            </div>
            </form>
         </div>
      </section>
      <!-- end product section -->
      <?php
 
 include 'footer.php';
 ?>
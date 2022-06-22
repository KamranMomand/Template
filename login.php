<?php
 session_start();

 include 'config.php';

 if(isset($_POST['btnLogin']))
 {
    $email=$_POST['email'];
    $password=$_POST['password'];

    $query="select * from tbl_user where user_email='$email' && user_password='$password'";
    $result=mysqli_query($conn,$query);
    if(mysqli_num_rows($result)>0)
    {
        $row=mysqli_fetch_assoc($result);
        $_SESSION['user_id']=$row['user_id'];
        $_SESSION['user']=$row['user_name'];
        header('location:index.php');
    }else
    {
        echo "<script>alert('Invalid Credentials');</script>";
    }
 }

 include 'header.php';
 ?>
 
 
 <!-- inner page section -->
 <section class="inner_page_head">
         <div class="container_fuild">
            <div class="row">
               <div class="col-md-12">
                  <div class="full">
                     <h3>Contact us</h3>
                  </div>
               </div>
            </div>
         </div>
      </section>
      <!-- end inner page section -->
      <!-- why section -->
      <section class="why_section layout_padding">
         <div class="container">
         
            <div class="row">
               <div class="col-lg-8 offset-lg-2">
                  <div class="full">
                     <form method="post">
                        <fieldset>
                           <input type="email" placeholder="Enter your email address" name="email" required />
                           <input type="password" placeholder="Enter your password" name="password" required />
                           <input type="submit" value="Login" name="btnLogin" />
                        </fieldset>
                     </form>
                  </div>
               </div>
            </div>
         </div>
      </section>
      <!-- end why section -->
      <?php
 
 include 'footer.php';
 ?>
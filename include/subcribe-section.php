<?php
if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {  ?>
<?php } else { ?>
   <section class="subscribe_section">
      <div class="container-fuild">
         <div class="box">
            <div class="row">
               <div class="col-md-6 offset-md-3">
                  <div class="subscribe_form ">
                     <div class="heading_container heading_center">
                        <h3>Subscribe To Get Discount Offers</h3>
                     </div>
                     <p class="text-danger"><?php echo $_GET['m'] ?? ""; ?></p>
                     <!-- <p>Register first, then Subscribe and enjoy the discount offers.</p> -->
                     <form action="log.php" method="post" enctype="multipart/form-data">
                        <input type="email" placeholder="Enter your email address" name="email" id="email" required />
                        <input type="password" placeholder="Enter password" name="password" id="password" required />
                        <button type="submit" name="login" id="subscribe">Subscribe</button>
                        <p class="text-center mt-4">don't have an account? <a href="register.php">register now</a></p>
                     </form>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </section>
<?php }; ?>
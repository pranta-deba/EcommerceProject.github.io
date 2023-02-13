<?php
if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {  ?>

<section class="client_section layout_padding mt-0">
   <div class="container">
      <div class="heading_container heading_center mb-5">
         <h2>
            Customer's Review
         </h2>
      </div>
      <!--  -->
      <div class="container">
         <div class="owl-carousel owl-theme text-center">
            <?php
            require "include/config.php";
            $selectQuery = "select * from reviews where 1 order by created_at desc limit 20";
            $reviews = $conn->query($selectQuery);
            $items = "";
            while ($row = $reviews->fetch_assoc()) {
               $items .= '<div class="item">
               <div class="d-flex justify-content-center mb-4">
                  <img src="assets/images/' . $row['image'] . '" class="rounded shadow-1-strong" style="width: 9em;"/>
               </div>
               <h5 class="mb-3">' . $row['name'] . '</h5>
               <h6 class="text-primary mb-3">Customer</h6>
               <p class="px-xl-3"></i>' . $row['post'] . '.</p>
               <ul class="list-unstyled d-flex justify-content-center mb-0">
                  <li>
                     <i class="fas fa-star fa-sm text-warning"></i>
                  </li>
                  <li>
                     <i class="fas fa-star fa-sm text-warning"></i>
                  </li>
                  <li>
                     <i class="fas fa-star fa-sm text-warning"></i>
                  </li>
                  <li>
                     <i class="fas fa-star fa-sm text-warning"></i>
                  </li>
                  <li>
                     <i class="fas fa-star fa-sm text-warning"></i>
                  </li>
               </ul>
            </div>';
            }
            echo $items;
            ?>

            


         </div>
      </div>
      <!--  -->
      <div>
         <div class="text-center h3 mt-4">
            <a href="javascript:void(0)" class="text-dark" id="Review-btn">&#9733; Review &#9733;</a>
         </div>
         <!-- review section -->
         <section class="why_section layout_padding" id="Review-form">
            <div class="container">

               <div class="row">
                  <div class="col-lg-5 offset-lg-2 m-auto">
                     <div class="full">
                        <form action="review.php" method="post" enctype="multipart/form-data">
                           <fieldset>
                              <p class="text-center mt-4 text-danger">If not register then please register and give review! <br><a href="register.php">Register now?</a></p>
                              <label>Full Name</label>
                              <input type="text" placeholder="Enter Full Name" name="name" id="name" required />
                              <label>Your Image <span class="text-danger">(Upload PNG)</span></label>
                              <input type="file" name="images" id="image" required />
                              <label>Post</label>
                              <textarea id="Post" name="post"></textarea>
                              <input type="submit" value="Review" name="Review" id="Review" />

                           </fieldset>
                        </form>
                     </div>
                  </div>
               </div>
            </div>
         </section>
         <!-- end review section -->
      </div>
   </div>
</section>
<?php } ?>
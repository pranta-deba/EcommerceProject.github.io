<?php
// session_start : user login cheak
if (session_status() === PHP_SESSION_NONE) {
   session_start();
};
// check admin
require "cheak-admin.php";
require "../../include/config.php";
?>
<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Product</title>
   <?php include "link.php"; ?>
</head>

<body>
   <!-- hero_area start -->
   <div class="hero_area">

      <!-- navber start -->
      <?php include "navbarNewview.php"; ?>
      <!-- navber end -->

      <section class="inner_page_head">
         <div class="container_fuild">
            <div class="row">
               <div class="col-md-12">
                  <div class="full">
                     <h3>All User</h3>
                  </div>
               </div>
            </div>
         </div>
      </section>

      <table class="table table-striped my-4">
         <thead>
            <tr>
               <th scope="col">Id</th>
               <th scope="col">user Name</th>
               <th scope="col">Email</th>
               <th scope="col">"User-1","Admin-2"</th>
               <th scope="col">Created At</th>
            </tr>
         </thead>
         <tbody>
            <!-- database to table -->
            <?php
            $selec = "select * from users where 1";
            $allproducts = $conn->query($selec);
            while ($row = $allproducts->fetch_assoc()) {
               echo "<tr>
               <td>" . $row['id'] . "</td>
               <td>" . $row['username'] . "</td>
               <td>" . $row['email'] . "</td>
               <td>" . $row['role'] . "</td>
               <td>" . $row['created_at'] . "</td>";
            };
            ?>
            <!--  -->
         </tbody>
      </table>
   </div>
   <!-- hero-area end -->
   
     <!-- footer start -->
     <?php include "footer.php"; ?>
   <!-- footer end -->

   <!-- jQery js-->
   <script src="../../assets/js/jquery-3.6.3.min.js"></script>
   <!-- bootstrap js -->
   <script src="../../assets/js/bootstrap.js"></script>
</body>

</html>
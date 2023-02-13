<section class="product_section layout_padding">
   <div class="container">
      <div class="heading_container heading_center">
         <h2>
         Latest <span>products</span>
         </h2>
      </div>
      <div class="row justify-content-center ">
         <?php
         require "include/config.php";
         $selectQ = "select * from products where 	letest_item='1' order by created_at desc limit 20";
         $hotitems = $conn->query($selectQ);
         while ($row = $hotitems->fetch_assoc()) {
            echo  '<div class="col-sm-6 col-md-4 col-lg-4">
            <div class="box">
               <div class="img-box">
                  <img src="assets/Products/' . $row['image'] . '" class="pimage">
               </div>
               <div class="detail-box">
                  <h5><a href="javascript:void(0);" class="text-dark pname">' . $row['name'] . '</a></h5>
                  <h6>৳ <span class="pprice">' . $row['price'] . '</span></h6>
                  
               </div>
               <h6 class="text-center mt-3">
               <a href="javascript:void(0);" data-id="' . $row['id'] . '" class="addToCart" style="font-size:19px;color:red;"><i class="fas fa-cart-plus"></i> Cart</a>
                | 
                <a href="deteils.php?id=' . $row['id'] . '" class="ps-2" style="font-size:19px;color:blue;"> Deteils</a></h6>
            </div>
         </div>';
         };
         ?>
      </div>
      <div class="btn-box">
         <a href="products.php">
            View All products
         </a>
      </div>
   </div>
</section>
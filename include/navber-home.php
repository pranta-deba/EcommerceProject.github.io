<header class="header_section">
   <div class="container">
      <nav class="navbar navbar-expand-lg custom_nav-container ">
         <a class="navbar-brand PomuShopLogo" href="index.php"><b class="pomu">Pomu</b><b class="shop">Shop</b></a>
         <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class=""> </span>
         </button>
         <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav">
               <li class="nav-item active">
                  <a class="nav-link" href="index.php">Home</a>
               </li>
               <?php if (isset($_SESSION['loggedin'])  && $_SESSION['loggedin'] && $_SESSION['role'] == "2") { ?>
                  <li class="nav-item dropdown">
                     <a class="nav-link dropdown-toggle" href="javascript:void(0)" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                     Admin
                     </a>
                     <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="admin/index.php">Dashboard</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="admin/order.php">Oders</a>
                        <a class="dropdown-item" href="admin/include/viewcategory.php">Category</a>
                        <a class="dropdown-item" href="admin/include/viewproduct.php">Products</a>
                     </div>
                  </li>
               <?php } ?>
               <li class="nav-item">
                  <a class="nav-link" href="products.php">Products</a>
               </li>
               <li class="nav-item">
                  <a class="nav-link" href="cart.php"><i style="font-size:19px;" class="fa-sharp fa-solid fa-cart-shopping"></i><span id="cardLength" class="badge text-bg-secondary"></span></a>
               </li>

               <?php
               if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {  ?>
                  <li class="nav-item dropdown">
                     <a class="nav-link dropdown-toggle" href="javascript:void(0)" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                     </i><?= $_SESSION['username'] ?>
                     </a>
                     <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="javascript:void(0)">Pofile</a>
                        <a class="dropdown-item" href="javascript:void(0)">Setting</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="logout.php">Logout</a>
                     </div>
                  </li>
               <?php } else { ?>
                  <li class="nav-item">
                     <a class="nav-link" href="login.php">Signup</a>
                  </li>
               <?php }; ?>

               <form class="form-inline">
                  <button class="btn  my-2 my-sm-0 nav_search-btn" type="submit">
                     <i class="fa-solid fa-magnifying-glass"></i>
                  </button>
               </form>
            </ul>
         </div>
      </nav>
   </div>
</header>
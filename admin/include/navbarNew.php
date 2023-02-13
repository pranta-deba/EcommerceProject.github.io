<header class="header_section">
    <div class="container">
        <nav class="navbar navbar-expand-lg custom_nav-container ">
            <a class="navbar-brand PomuShopLogo" href="index.php"><b class="pomu">Admin</b><b class="shop">Panel</b></a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class=""> </span>
            </button>
            <!-- new nav -->
            <div class="collapse navbar-collapse justify-content-end" id="navbarSupportedContent">
                <ul id="newNav">
                    <li><a href="index.php">Home</a></li>
                    <li><a href="../index.php">Site</a></li>
                    <li><a href="order.php"><i class='fas fa-cart-arrow-down'></i> Order</a></li>
                    <li><a href="javascript:void(0);"><i class='fas fa-edit'></i> Add</a>
                        <ul>
                            <li><a href="addproduct.php"><i class='fas fa-edit'></i> Product</a></li>
                            <li><a href="addcategory.php"><i class='fas fa-edit'></i> Category</a></li>
                            <li><a href="addsubcategory.php"><i class='fas fa-edit'></i> Sub.Cat</a></li>
                        </ul>
                    </li>
                    <li><a href="javascript:void(0);"><i class='far fa-eye'></i> View</a>
                        <ul>
                            <li><a href="include/viewproduct.php"><i class='far fa-eye'></i> Product</a></li>
                            <li><a href="include/viewcategory.php"><i class='far fa-eye'></i> Category</a></li>
                            <li><a href="include/viewsubcategory.php"><i class='far fa-eye'></i> Sub.Cat</a></li>
                        </ul>
                    </li>
                    <li><a href="javascript:void(0);"><i class='fas fa-user-check'></i> <?= $_SESSION['username'] ?></a>
                        <ul>
                            <li><a href="javascript:void(0);">Pofile</a></li>
                            <li><a href="javascript:void(0);">Setting</a></li>
                            <li><a href="../logout.php">Logout</a></li>
                        </ul>
                    </li>
                </ul>
            </div>
            <!-- new nav -->
        </nav>
    </div>
</header>
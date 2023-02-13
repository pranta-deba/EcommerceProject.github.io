<section class="product_section layout_padding">
    <div class="container">
        <div class="heading_container heading_center">
            <h2>
                Cate<span>gories</span>
            </h2>
        </div>
        <div class="container">

            <!-- Card deck -->
            <div class="card-deck row justify-content-center">
                <?php
                require "include/config.php";
                $cq = "select * from categories where 1";
                $cqr = $conn->query($cq);
                while ($row = $cqr->fetch_assoc()) {
                    echo '<div class="col-xs-12 col-sm-6 col-md-3">
                <div class="card mb-4 text-center">
                    <div class="view overlay p-2">
                        <img class="card-img-top" src="assets/category/'. $row['image'] .'" alt="Categories" style="width:7em;">
                    </div>
                    <div class="card-body" style="margin: 0% 0% 0% 3%;padding: 6% 0%;">
                        <h5 class="card-title">'. $row['name'] .'</h5>
                        <a href="categoriesView.php?cat=' . $row['id'] . '" class="btn mr-2 text-danger">View Products</a>
                    </div>
                </div>
            </div>';
                };
                ?>
            </div>
            <!-- Card deck -->
        </div>
    </div>
</section>
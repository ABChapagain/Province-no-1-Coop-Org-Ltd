<?php
require_once('./components/Header.php');

require_once('./config/db_config.php');

?>


<!-- Breadcrumb Area Start -->
<div class="breadcrumb-area bg-image-5 ptb-170">
    <div class="container">
        <div class="breadcrumb-content text-center">
            <h3>PRODUCTS</h3>
            <ul>
                <li><a href="index.php">Home</a></li>
                <li class="active">Products</li>
            </ul>
        </div>
    </div>
</div>
<!-- Breadcrumb Area End -->

<!-- Shop Page Area Start -->
<div class="shop-page-area ptb-100">
    <div class="container">
        <div class="row">

            <?php
            $sql = "SELECT * FROM category";

            $result = $conn->query($sql);
            $result->fetch_all(MYSQLI_ASSOC);
            ?>

            <div class="col-lg-3">
                <div class="shop-sidebar-wrapper gray-bg-7 shop-sidebar-mrg">
                    <div class="shop-widget">
                        <h4 class="shop-sidebar-title">Category</h4>
                        <div class="sidebar-list-style mt-20">
                            <ul>
                                <?php
                                foreach ($result as $category) {
                                    echo "
                                    <li>
                                    <input type='checkbox' />
                                    <a href='#'>$category[name]</a>
                                    </li>
                                    ";
                                }
                                ?>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-9">
                <div class="grid-list-product-wrapper">
                    <div class="product-grid product-view pb-20">
                        <div class="row">
                            <?php
                            $sql = "SELECT * FROM products ORDER BY id DESC";
                            $result = $conn->query($sql);
                            $result->fetch_all(MYSQLI_ASSOC);
                            foreach ($result as $product) {
                                $sql = "select * from product_image where id = $product[id]";
                                $image = $conn->query($sql)->fetch_all(MYSQLI_ASSOC);
                                $image = $image[0];
                                echo "
                                <div class='product-width col-xl-4 col-lg-4 col-md-4 col-sm-6 col-12 mb-30'>
                                <div class='product-wrapper mb-30 shadow rounded'>
                                    <div class='rounded'>
                                        <img alt='Product' class='product-image'
                                            width='100%'
                                            src='uploads/products/$image[name]' />
                                    </div>
                                    <div class='blog-content px-2 py-3'>
                                        <h4>$product[name]</h4>";
                                $description = $product['short_description'];
                                if (strlen($description) > 100) {
                                    $description = trim(substr($description, 0, 100));
                                    $description .= "...";
                                }
                                echo "<p>$description</p>
                                <a class='action-compare' href='product.php?id=$product[id]' >
                                            Read More
                                        </a>
                                    </div>
                                </div>
                            </div>
                                ";
                            }
                            ?>


                        </div>
                    </div>
                </div>
            </div>


        </div>
    </div>
</div>
<!-- Shop Page Area End -->



<?php
$sql = "SELECT * FROM products";

$result = $conn->query($sql);
$result->fetch_all(MYSQLI_ASSOC);

foreach ($result as $product) {

    echo "
<div class='modal fade exampleModal' id='productModal$product[id]' tabindex='-1' role='dialog'>
    <div class='modal-dialog' role='document'>
        <div class='modal-content'>
            <div class='modal-header'>
                <button type='button' class='close' data-bs-dismiss='modal' aria-label='Close'>
                    <span aria-hidden='true'>x</span>
                </button>
            </div>
            <div class='modal-body'>
                <div class='row'>
                    <div class='col-md-5 col-sm-5 col-xs-12'>
                        <div class='tab-content'>
                            <div id='pro-1' class='tab-pane fade show active'>
                                <img src='assets/img/product-details/product-detalis-l1.jpg' alt='' />
                            </div>
                            <div id='pro-2' class='tab-pane fade'>
                                <img src='assets/img/product-details/product-detalis-l2.jpg' alt='' />
                            </div>
                            <div id='pro-3' class='tab-pane fade'>
                                <img src='assets/img/product-details/product-detalis-l3.jpg' alt='' />
                            </div>
                            <div id='pro-4' class='tab-pane fade'>
                                <img src='assets/img/product-details/product-detalis-l4.jpg' alt='' />
                            </div>
                        </div>
                        <div class='product-thumbnail'>
                            <div class='thumb-menu owl-carousel nav nav-style' role='tablist'>
                                <a class='active' data-bs-toggle='tab' href='#pro-1'><img
                                        src='assets/img/product-details/product-detalis-s1.jpg' alt='' /></a>
                                <a data-bs-toggle='tab' href='#pro-2'><img
                                        src='assets/img/product-details/product-detalis-s2.jpg' alt='' /></a>
                                <a data-bs-toggle='tab' href='#pro-3'><img
                                        src='assets/img/product-details/product-detalis-s3.jpg' alt='' /></a>
                                <a data-bs-toggle='tab' href='#pro-4'><img
                                        src='assets/img/product-details/product-detalis-s4.jpg' alt='' /></a>
                            </div>
                        </div>
                    </div>
                    <div class='col-md-7 col-sm-7 col-xs-12'>
                        <div class='modal-pro-content'>
                            <h3>$product[name]</h3>
                            <div class='product-price-wrapper'>
                                <span>$product[category]</span>
                            </div>
                            <p>
                                $product[description]
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

    ";
}

?>



<?php require_once('./components/Footer.php');

?>
<?php
require_once('./components/Header.php');

require_once('./config/db_config.php');

$current_url = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";


if (isset($_GET['id']) && !is_null($_GET['id']) && $_GET['id'] != '') {
    $product_id = $_GET['id'];
    $sql = "SELECT * FROM products WHERE id = $product_id";
    $res = $conn->query($sql);
    $result = $res->fetch_assoc();

    if ($res->num_rows !== 0) {

        $sql = "SELECT * FROM product_image WHERE id = $product_id";
        $res = $conn->query($sql);
        $images = $res->fetch_all(MYSQLI_ASSOC);


?>

<!-- Breadcrumb Area Start -->
<div class="breadcrumb-area bg-image-3 ptb-150"
    style="background: url('uploads/products/<?php echo $images[0]['name'] ?>') no-repeat center center/cover;">
    <div class="container">
        <div class="breadcrumb-content text-center">
            <h3><?php echo $result['name'] ?></h3>
            <ul>
                <li><a href="index.php">Home</a></li>
                <li><a href="products.php">Products</a></li>
            </ul>
        </div>
    </div>
</div>
<!-- Breadcrumb Area End -->

<!-- Product Deatils Area Start -->
<div class="product-details pt-100 pb-95">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 col-md-12">
                <div class="product-details-img">
                    <img style="object-fit: cover;" width="100%" height="100%" class="zoompro"
                        src="uploads/products/<?php echo $images[0]['name'] ?>"
                        data-zoom-image="uploads/products/<?php echo $images[0]['name'] ?>" alt="zoom" />
                    <div id="gallery" class="mt-20 product-dec-slider owl-carousel">

                        <?php foreach ($images as $index => $image) {

                                ?>
                        <a data-image="uploads/products/<?php echo $image['name'] ?>"
                            data-zoom-image="uploads/products/<?php echo $image['name'] ?>">
                            <img style="object-fit: cover;" width="90px" height="90px"
                                src="uploads/products/<?php echo $image['name'] ?>" alt="">
                        </a>
                        <?php
                                }
                                ?>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 col-md-12">
                <div class="product-details-content">
                    <h4 class="mb-4">
                        <?php echo $result['name'] ?>
                    </h4>
                    <div class="pro-dec-categories">
                        <ul>
                            <li class="categories-title">Category: </li>
                            <li><a href="#"><?php echo $result['category'] ?></a></li>
                        </ul>
                    </div>

                    <p class="mt-4 mb-4"><?php echo $result['short_description'] ?></p>

                    <div class="pro-dec-categories">
                        <ul>
                            <li class="categories-title">Tags: </li>

                            <?php
                                    $tags = explode(",", $result['tags']);
                                    foreach ($tags as $tag) {
                                        echo " ";
                                        echo "<li><a href='#'> $tag, </a></li>";
                                        echo " ";
                                    }
                                    ?>

                        </ul>
                    </div>
                    <div class="pro-dec-social">
                        <ul>

                            </li>
                            <?php
                                    $share_url = "https://www.facebook.com/sharer/sharer.php?u=$current_url";
                                    ?>
                            <li><a class="share" href="<?php echo $share_url ?>"><i class="ion-social-facebook"></i>
                                    Share</a></li>
                            <?php
                                    $share_url = "https://twitter.com/intent/tweet?url=$current_url";
                                    ?>
                            <li><a class="tweet" href="<?php echo $share_url ?>"><i class="ion-social-twitter"></i>
                                    Twitter</a>
                            </li>

                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Product Deatils Area End -->


<!-- Product Description Area Start -->
<div class="description-review-area pb-70">
    <div class="container">
        <div class="description-review-wrapper">
            <div class="description-review-topbar nav text-center">
                <a class="active" data-bs-toggle="tab" href="#des-details1">Description</a>
                <a data-bs-toggle="tab" href="#des-details2">Tags</a>
            </div>
            <div class="tab-content description-review-bottom">
                <div id="des-details1" class="tab-pane active">
                    <div class="product-description-wrapper">
                        <?php echo $result['description'] ?>
                    </div>
                </div>
                <div id="des-details2" class="tab-pane">
                    <div class="product-anotherinfo-wrapper">
                        <ul>
                            <li><span>Tags:</span></li>
                            <?php
                                    foreach ($tags as $tag) {
                                        echo " ";
                                        echo "<li><a href='#'> $tag, </a></li>";
                                        echo " ";
                                    }
                                    ?>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>




<div class="product-area pb-100">
    <div class="container">
        <div class="product-top-bar section-border mb-35">
            <div class="section-title-wrap">
                <h3 class="section-title section-bg-white">Related Products</h3>
            </div>
        </div>
        <div class="featured-product-active hot-flower owl-carousel product-nav">

            <?php

                    $sql = "SELECT * from products where category = '$result[category]' AND id <> $result[id]";

                    $res = $conn->query($sql);

                    $products = $res->fetch_all(MYSQLI_ASSOC);


                    foreach ($products as $product) :
                        $sql = "SELECT * FROM product_image WHERE id = $product[id] AND featured = 1";
                        $res = $conn->query($sql);
                        $image = $res->fetch_all(MYSQLI_ASSOC);

                    ?>
            <div class="product-wrapper mb-30 shadow rounded">
                <div class='rounded'>
                    <img alt='Product' class='product-image' width='100%'
                        src='./uploads/products/<?php echo $image[0]['name'] ?>' />
                </div>
                <div class='blog-content px-2 py-3'>
                    <h4>
                        <?php echo $product['name'] ?>
                    </h4>

                    <?php
                                $description = $product['short_description'];
                                if (strlen($description) > 100) {
                                    $description = trim(substr($description, 0, 100));
                                    $description .= "...";
                                }
                                ?>

                    <p><?php echo $description ?></p>
                    <a class='action-compare' href='product.php?id=<?php echo $product['id'] ?>'>
                        Read More
                    </a>
                </div>
            </div>
            <?php
                    endforeach; ?>


        </div>
    </div>
</div>




<?php
    } else {
    ?>
<div class="blog-page-area masonary-style ptb-100">
    <div class="container text-center">
        <h1>NO PRODUCT TO SHOW</h1>
    </div>
</div>
<?php
    }
} else {
    echo "<script>window.location.href = 'products.php'</script>";
    exit();
}
require_once('./components/Footer.php');
?>
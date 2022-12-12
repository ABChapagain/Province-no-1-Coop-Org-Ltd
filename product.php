<?php
require_once('./useable/header.php');
require_once('./config/db_config.php');

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
                <li class="active"><?php echo $result['name'] ?></li>
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

                    <p class="mt-4"><?php echo $result['description'] ?></p>


                    <hr />

                    <div class="pro-dec-categories">
                        <ul>
                            <li class="categories-title">Category: </li>
                            <li><a href="#"><?php echo $result['category'] ?></a></li>
                        </ul>
                    </div>
                    <div class="pro-dec-categories">
                        <ul>
                            <li class="categories-title">Tags: </li>
                            <li><a href="#"> Oolong, </a></li>
                            <li><a href="#"> Pu'erh,</a></li>
                            <li><a href="#"> Dark,</a></li>
                            <li><a href="#"> Special </a></li>
                        </ul>
                    </div>
                    <div class="pro-dec-social">
                        <ul>
                            <li><a class="tweet" href="#"><i class="ion-social-twitter"></i> Tweet</a></li>
                            <li><a class="share" href="#"><i class="ion-social-facebook"></i> Share</a></li>
                            <li><a class="google" href="#"><i class="ion-social-googleplus-outline"></i> Google+</a>
                            </li>
                            <li><a class="pinterest" href="#"><i class="ion-social-pinterest"></i> Pinterest</a></li>
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
                        <p>Duis autem vel eum iriure dolor in hendrerit in vulputate velit esse molestie consequat, vel
                            illum dolore eu feugiat nulla facilisis at vero eros et accumsan et iusto odio dignissim qui
                            blandit praesent luptatum zzril delenit augue duis dolore te feugait nulla facilisi. Nam
                            liber tempor cum soluta nobis eleifend option congue nihil imperdiet doming id quod mazim
                            placerat facer possim assum. Typi non habent claritatem insitam est usus legentis in iis qui
                            facit eorum claritatem. </p>
                        <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod
                            tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad minim veniam, quis
                            nostrud exerci tation ullamcorper suscipit lobortis nisl ut aliquip ex ea commodo consequat.
                        </p>
                        <ul>
                            <li>- Typi non habent claritatem insitam</li>
                            <li>- Est usus legentis in iis qui facit eorum claritatem. </li>
                            <li>- Investigationes demonstraverunt lectores legere me lius quod ii legunt saepius.</li>
                            <li>- Claritas est etiam processus dynamicus, qui sequitur mutationem consuetudium lectorum.
                            </li>
                        </ul>
                    </div>
                </div>
                <div id="des-details2" class="tab-pane">
                    <div class="product-anotherinfo-wrapper">
                        <ul>
                            <li><span>Tags:</span></li>
                            <li><a href="#"> Green,</a></li>
                            <li><a href="#"> Herbal,</a></li>
                            <li><a href="#"> Loose,</a></li>
                            <li><a href="#"> Mate,</a></li>
                            <li><a href="#"> Organic ,</a></li>
                            <li><a href="#"> special</a></li>
                        </ul>
                    </div>
                </div>
                <div id="des-details3" class="tab-pane">
                    <div class="rattings-wrapper">
                        <div class="sin-rattings">
                            <div class="star-author-all">
                                <div class="ratting-star f-left">
                                    <i class="ion-star theme-color"></i>
                                    <i class="ion-star theme-color"></i>
                                    <i class="ion-star theme-color"></i>
                                    <i class="ion-star theme-color"></i>
                                    <i class="ion-star theme-color"></i>
                                    <span>(5)</span>
                                </div>
                                <div class="ratting-author f-right">
                                    <h3>Potanu Leos</h3>
                                    <span>12:24</span>
                                    <span>9 March 2018</span>
                                </div>
                            </div>
                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor
                                incididunt ut labore et dolore magna aliqua. Utenim ad minim veniam, quis nost rud
                                exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Lorem ipsum dolor
                                sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et
                                dolore magna aliqua. Utenim ad minim veniam, quis nost.</p>
                        </div>
                        <div class="sin-rattings">
                            <div class="star-author-all">
                                <div class="ratting-star f-left">
                                    <i class="ion-star theme-color"></i>
                                    <i class="ion-star theme-color"></i>
                                    <i class="ion-star theme-color"></i>
                                    <i class="ion-star theme-color"></i>
                                    <i class="ion-star theme-color"></i>
                                    <span>(5)</span>
                                </div>
                                <div class="ratting-author f-right">
                                    <h3>Kahipo Khila</h3>
                                    <span>12:24</span>
                                    <span>9 March 2018</span>
                                </div>
                            </div>
                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor
                                incididunt ut labore et dolore magna aliqua. Utenim ad minim veniam, quis nost rud
                                exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Lorem ipsum dolor
                                sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et
                                dolore magna aliqua. Utenim ad minim veniam, quis nost.</p>
                        </div>
                    </div>

                </div>
            </div>
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
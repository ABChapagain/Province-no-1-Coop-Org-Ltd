<?php
require_once('./useable/header.php');
require_once('./config/db_config.php');


?>


<!-- Slider Start -->
<div class="slider-area">
    <div class="slider-active owl-dot-style owl-carousel">
        <div class="single-slider ptb-240 bg-img" style="background-image: url(assets/img/slider/slider-2.jpeg)">
            <div class="container">
                <div style="height: 13.3rem;" class="slider-content slider-animated-1">
                    <h1 class="animated">Want to stay <span class="theme-color">healthy</span></h1>
                    <h1 class="animated">drink matcha.</h1>
                    <p>Lorem ipsum dolor sit amet, consectetu adipisicing elit sedeiu tempor inci ut labore et dolore
                        magna aliqua.</p>
                </div>
            </div>
        </div>
        <div class="single-slider ptb-240 bg-img" style="background-image: url(assets/img/slider/slider-3.jpg)">
            <div class="container">
                <div style="height: 13.3rem;" class="slider-content slider-animated-1">
                    <h1 class="animated">Want to stay <span class="theme-color">healthy</span></h1>
                    <h1 class="animated">drink matcha.</h1>
                    <p>Lorem ipsum dolor sit amet, consectetu adipisicing elit sedeiu tempor inci ut labore et dolore
                        magna aliqua.</p>
                </div>
            </div>
        </div>
        <div class="single-slider ptb-240 bg-img" style="background-image: url(assets/img/slider/slider-4.jpg)">
            <div class="container">
                <div style="height: 13.3rem;" class="slider-content slider-animated-1">
                    <h1 class="animated">Want to stay <span class="theme-color">healthy</span></h1>
                    <h1 class="animated">drink matcha.</h1>
                    <p>Lorem ipsum dolor sit amet, consectetu adipisicing elit sedeiu tempor inci ut labore et dolore
                        magna aliqua.</p>
                </div>
            </div>
        </div>


        <!-- You can add new slider here just copy upper div -->
    </div>
</div>
<!-- Slider End -->


<!-- About Us Area Start -->
<div id="about-us" class="about-us-area pt-100 pb-100">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 col-md-12">
                <div class="overview-img text-center">
                    <a href="about-us.php">
                        <img class="rounded" src="assets/img/slider/slider-5.jpg" alt="About Us" />
                    </a>
                </div>
            </div>
            <div class="col-lg-6 col-md-12 mt-3 mt-lg-0 d-flex align-items-center">
                <div class="overview-content-2">
                    <h4>Welcome To</h4>
                    <h2>Province no. 1 Wholesale Consumer Specialized Cooperative Union Ltd</h2>
                    <p class="peragraph-blog" style="text-align: justify;">
                        Lorem ipsum dolor sit amet consectetur, adipisicing elit. Vitae,
                        nemo fugiat, incidunt molestiae velit neque autem possimus
                        pariatur tempora, laudantium veniam omnis similique dicta eum.
                        Saepe culpa ratione pariatur necessitatibus optio officiis
                        aspernatur quam odio eos alias, minima veniam, magnam harum
                        quia. Animi itaque nam doloribus inventore officiis vel veniam
                        quos repellendus aut quisquam nisi nostrum esse, provident
                        assumenda possimus repellat sunt minima dignissimos perspiciatis
                        neque. Quis optio id consectetur!
                    </p>
                    <a class="btn py-2 px-4 rounded text-white bg-project" href="about-us.php">Read
                        More</a>
                </div>
            </div>

        </div>
    </div>
</div>
<!-- About Us Area End -->

<!-- New Products Start -->
<div id="products" class="product-area gray-bg pt-90 pb-65">
    <div class="container">
        <div class="product-top-bar section-border mb-55">
            <div class="section-title-wrap text-center">
                <h3 class="section-title">Our Products</h3>
            </div>
        </div>
        <div class="tab-content jump">
            <div class="tab-pane active">
                <div class="featured-product-active owl-carousel product-nav">

                    <?php
                    $sql = "SELECT * FROM products";

                    $result = $conn->query($sql);
                    $result->fetch_all(MYSQLI_ASSOC);

                    foreach ($result as $index => $product) {
                        echo "<div class='product-wrapper-single'>";
                        for ($i = 0; $i < 2; $i++) {
                            echo "
                             <div class='product-wrapper mb-30 shadow rounded'>
                        <div class='rounded'>";

                            $sql = "select * from product_image where id=" . $product['id'];
                            $image = $conn->query($sql)->fetch_all(MYSQLI_ASSOC);


                            echo "
                            <img alt='Product'
                                style='object-fit:cover; height: 180px; border-top-left-radius: 5px; border-top-right-radius: 5px;'
                                src=' assets/img/product/product-1.jpg' />
                        </div>
                        <div class='blog-content px-2 py-3'>
                            <h4> $product[name]</h4>";
                            $description = $product['description'];
                            if (strlen($description) > 100) {
                                $description = trim(substr($description, 0, 100));
                                $description .= "...";
                            }
                            echo "<p>$description</p>
                            <a class='action-compare' href='#' data-bs-target='#productModal$product[id]' data-bs-toggle='modal'
                                title='Quick View'>
                                Read More
                            </a>
                        </div>
                    </div>
                            ";
                        }
                        echo "</div>";
                    }
                    ?>





                </div>
            </div>
        </div>
        <div class="ms-auto text-end">

            <a class="btn py-2 px-4 rounded text-white text-end bg-project" href="products.php">Show
                More</a>
        </div>
    </div>
</div>
<!-- New Products End -->

<!-- Testimonial Area Start -->
<div class="testimonials-area bg-image-2 bg-img pt-100 pb-100">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-12">
                <div class="testimonial-active owl-carousel">
                    <div class="single-testimonial text-center">
                        <div class="testimonial-img">
                            <img alt="" src="assets/img/icon-img/testi.png" />
                        </div>
                        <p>
                            Lorem ipsum dolor sit amet, consectetur adipisici elit, sed do
                            eiusmod tempor incididunt ut labore
                        </p>
                        <h4>Achyut Chapagain</h4>
                        <h5>Customer</h5>
                    </div>
                    <div class="single-testimonial text-center">
                        <div class="testimonial-img">
                            <img alt="" src="assets/img/icon-img/testi.png" />
                        </div>
                        <p>
                            Lorem ipsum dolor sit amet, consectetur adipisici elit, sed do
                            eiusmod tempor incididunt ut labore
                        </p>
                        <h4>Rejens Rayamajhi</h4>
                        <h5>Customer</h5>
                    </div>
                    <div class="single-testimonial text-center">
                        <div class="testimonial-img">
                            <img alt="" src="assets/img/icon-img/testi.png" />
                        </div>
                        <p>
                            Lorem ipsum dolor sit amet, consectetur adipisici elit, sed do
                            eiusmod tempor incididunt ut labore
                        </p>
                        <h4>Sandeep Giri</h4>
                        <h5>Customer</h5>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Testimonial Area End -->


<!-- Message from CEO -->
<div class="about-us-page-area ptb-100">
    <div class="container">
        <div class="product-top-bar section-border mb-55">
            <div class="section-title-wrap text-center">
                <h3 class="section-title">Message from CEO</h3>
            </div>
        </div>
        <div class="d-xl-flex gap-4 align-items-center justify-content-center">
            <div>
                <p class="peragraph-blog" style="text-align: justify;">
                    Hello Namaste everyone 🙏
                    <br>
                    <br>
                    Our organization is an umbrella organization of coopratives and it's vision is to
                    establish sustainable business entity in the community by marketing goods and
                    services through cooperatives. We encourage early cooperatives and members to become
                    entrepreneurs.
                    <br>
                    <br>

                    Through cooperatives, we are moving forward by bringing the products of cooperatives
                    or members to various Nepalese markets, as well as minimizing the potential fraud
                    that may be caused to consumers by middlemen. This is our first organization in
                    Nepal which will gather the cooperatives and engage them into the business.

                    <br>
                    <br>
                    Finally, I would like to express my sincere gratitude to all of you who have
                    connected with us directly or indirectly.

                    <br>
                    <br>
                    Thank you!
                </p>
            </div>

            <div>
                <div class="overview-img text-center">
                    <img style="object-fit:cover" width="100%" class="rounded" src="assets/img/team/ceo.JPG"
                        alt="About Us" />
                </div>
                <div class="ceo-title">
                    <h4>Sandip Giri</h4>
                    <p>CEO</p>
                </div>
            </div>

        </div>
    </div>
</div>


<!-- News Area Start -->
<div class="blog-area bg-image-1 pt-90 pb-70">
    <div class="container">
        <div class="product-top-bar section-border mb-55">
            <div class="section-title-wrap text-center">
                <h3 class="section-title">Latest Events</h3>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-4 col-md-6">
                <div class="blog-single mb-30">
                    <div class="blog-thumb">
                        <a href="#"><img src="assets/img/blog/blog-single-1.jpg" alt="" /></a>
                    </div>
                    <div class="blog-content pt-25">
                        <span class="blog-date">14 Sep</span>
                        <h3><a href="#">Lorem ipsum sit ame co.</a></h3>
                        <p>Lorem ipsum dolor sit amet, consectetur adipisici elit, sed do eius tempor incididunt ut
                            labore et dolore</p>
                        <a href="#">Read More</a>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6">
                <div class="blog-single mb-30">
                    <div class="blog-thumb">
                        <a href="#"><img src="assets/img/blog/blog-single-2.jpg" alt="" /></a>
                    </div>
                    <div class="blog-content pt-25">
                        <span class="blog-date">20 Dec</span>
                        <h3><a href="#">Lorem ipsum sit ame co.</a></h3>
                        <p>Lorem ipsum dolor sit amet, consectetur adipisici elit, sed do eius tempor incididunt ut
                            labore et dolore</p>
                        <a href="#">Read More</a>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6">
                <div class="blog-single mb-30">
                    <div class="blog-thumb">
                        <a href="#"><img src="assets/img/blog/blog-single-3.jpg" alt="" /></a>
                    </div>
                    <div class="blog-content pt-25">
                        <span class="blog-date">18 Aug</span>
                        <h3><a href="#">Lorem ipsum sit ame co.</a></h3>
                        <p>Lorem ipsum dolor sit amet, consectetur adipisici elit, sed do eius tempor incididunt ut
                            labore et dolore</p>
                        <a href="#">Read More</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="ms-auto text-end">
            <a class="btn py-2 px-4 rounded text-white text-end bg-project" href="events.php">Show
                More</a>
        </div>
    </div>
</div>
<!-- News Area End -->




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

<!-- Modal end -->


<?php require_once('./useable/footer.php') ?>
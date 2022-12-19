<?php
require_once('./useable/header.php');
require_once('./config/db_config.php');
?>


<!-- Breadcrumb Area Start -->
<div class="breadcrumb-area bg-image-5 ptb-170">
    <div class="container">
        <div class="breadcrumb-content text-center">
            <h3>ABOUT US</h3>
            <ul>
                <li><a href="index.php">Home</a></li>
                <li class="active">About Us</li>
            </ul>
        </div>
    </div>
</div>
<!-- Breadcrumb Area End -->

<!-- About Us Page Area Start -->
<div class="about-us-page-area ptb-100">
    <div class="container">
        <div class="row">
            <div class="col-lg-3">
                <div class="sticky-sidebar sidebar-list-style mt-20">
                    <ul>
                        <li><a class="about-us-sidebar active" href="about-us.php">About Us </a></li>
                        <li><a class="about-us-sidebar" href="message-from-ceo.php">Message from CEO</a></li>
                    </ul>
                </div>
            </div>
            <div class="col-lg-9 mt-lg-0 mt-5">
                <div class="grid-list-product-wrapper">
                    <div class="product-grid product-view pb-20">
                        <div class="row">
                            <div class="mb-4">
                                <h4 class="text-green">Welcome To</h4>
                                <h2>Province no. 1 Wholesale Consumer Specialized Cooperative Union Ltd</h2>
                            </div>
                            <div class="col-lg-6 col-md-12">
                                <div class="overview-img text-center">

                                    <img class="rounded" src="assets/img/slider/slider-5.jpg" alt="About Us" />

                                </div>
                            </div>
                            <div class="col-lg-6 col-md-12 mt-3 mt-lg-0 d-flex">
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
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
<!-- About Us Page Area End -->


<?php
$sql = "SELECT * FROM members";
$res = $conn->query($sql);
$members = $res->fetch_all(MYSQLI_ASSOC);

if ($res->num_rows !== 0) {

?>


<!-- Team Area Start -->
<div class="team-area pt-95 pb-70">
    <div class="container">
        <div class="product-top-bar section-border mb-50">
            <div class="section-title-wrap style-two text-center">
                <h3 class="section-title">Our Members</h3>
            </div>
        </div>
        <div class="row">
            <?php
                foreach ($members as $member) :
                ?>
            <div class="col-lg-3 col-md-6 col-6">
                <div class="team-wrapper mb-30">
                    <div class="team-img">
                        <img src="uploads/members/<?php echo $member['image'] ?>" alt="Team" />
                    </div>
                    <div class="team-content text-center">
                        <h4><?php echo $member['name'] ?></h4>
                        <span style="color: #519f10"><?php echo $member['position'] ?></span>
                    </div>
                </div>
            </div>
            <?php endforeach; ?>
        </div>
    </div>
</div>
<!-- Team Area End -->

<?php
}
?>

<!-- Testimonial Area Start -->
<div class="branch-area pt-100 pb-100">
    <div class="container">
        <div class="section-title-wrap style-two text-center mb-50">
            <h3 class="section-title">Our Branches</h3>
        </div>
        <div class="row">
            <div class="col-4 border p-2" style="height: 700px; overflow-y: scroll;">
                <div class="section-title-wrap style-two text-center">
                    <h3 class="section-title">Branch Locator</h3>
                </div>
                <div class="my-5">
                    <input type="search" placeholder="Search Branch...">
                </div>

                <?php
                $sql = "SELECT * FROM branches";
                $res = $conn->query($sql);
                $branches = $res->fetch_all(MYSQLI_ASSOC);

                foreach ($branches as $branch) :
                ?>
                <div class="col-12 px-3">
                    <h5><?php echo $branch['name'] ?></h5>
                    <h5><?php echo $branch['address'] ?></h5>
                    <a href="#">
                        <h5 class="text-green"><?php echo $branch['phone'] ?></h5>
                    </a>
                    <!-- <h5><?php echo $branch['email'] ?></h5> -->
                    <h5>email</h5>
                </div>
                <hr>
                <?php
                endforeach;
                ?>
            </div>
            <div class="col-8">
                <div id="mapId" style="height: 100%; width: 100%"></div>
            </div>
        </div>
    </div>
</div>
<!-- Testimonial Area End -->


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



<?php

require_once('./components/Footer.php');

?>
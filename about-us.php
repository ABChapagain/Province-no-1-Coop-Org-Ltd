<?php
$siteName = 'About Us';
require_once('./components/Header.php');
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

require_once('./components/AboutSection.php');

require_once('./components/Footer.php');

?>
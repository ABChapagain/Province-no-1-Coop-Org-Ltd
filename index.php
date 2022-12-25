<?php
require_once('./components/Header.php');
require_once('./config/db_config.php');


?>


<!-- Slider Start -->
<div class="slider-area">
    <div class="slider-active owl-dot-style owl-carousel">
        <div class="single-slider ptb-240 bg-img" style="background-image: url(assets/img/slider/slider-2.jpeg)">
            <div class="container">
                <div style="height: 13.3rem;" class="slider-content slider-animated-1">
                    <h1 class="animated">Want to stay <span class="theme-color">healthy</span></h1>
                    <h1 class="animated">drink <span class="theme-color">Alpine</span>.</h1>
                    <p>Lorem ipsum dolor sit amet, consectetu adipisicing elit sedeiu tempor inci ut labore et dolore
                        magna aliqua.</p>
                </div>
            </div>
        </div>
        <div class="single-slider ptb-240 bg-img" style="background-image: url(assets/img/slider/slider-3.jpg)">
            <div class="container">
                <div style="height: 13.3rem;" class="slider-content slider-animated-1">
                    <h1 class="animated">Want to stay <span class="theme-color">healthy</span></h1>
                    <h1 class="animated">drink <span class="theme-color">Alpine</span>.</h1>
                    <p>Lorem ipsum dolor sit amet, consectetu adipisicing elit sedeiu tempor inci ut labore et dolore
                        magna aliqua.</p>
                </div>
            </div>
        </div>
        <div class="single-slider ptb-240 bg-img" style="background-image: url(assets/img/slider/slider-4.jpg)">
            <div class="container">
                <div style="height: 13.3rem;" class="slider-content slider-animated-1">
                    <h1 class="animated">Want to stay <span class="theme-color">healthy</span></h1>
                    <h1 class="animated">drink <span class="theme-color">Alpine</span>.</h1>
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

<?php require_once('./components/OurProducts.php') ?>

<?php require_once('./components/Testimonial.php') ?>



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

<?php require_once('./components/LatestEvents.php') ?>


<?php

// get notices from database
$current_date = date('Y-m-d');
$sql = "SELECT * FROM `notices` WHERE popup_start_date < '$current_date' AND popup_end_date > '$current_date' ORDER BY id DESC";
$res = mysqli_query($conn, $sql);
$notices = $res->fetch_all(MYSQLI_ASSOC);

foreach ($notices as $notice) {


?>
<!-- Modal -->
<div class="modal fade" id="popupNoticeModel<?php echo $notice['id'] ?>" data-bs-backdrop="static"
    data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog model-lg modal-dialog-centered modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="staticBackdropLabel"><?php echo $notice['title'] ?></h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                    <img src="assets/img/icons/x-lg.svg" alt="close" />
                </button>
            </div>
            <div class="modal-body">
                <p>
                    <?php echo $notice['short_description'] ?>
                </p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn py-2 px-4 border" data-bs-dismiss="modal">Close</button>
                <a href="notice.php?id=<?php echo $notice['id'] ?>" class="btn py-2 px-4 text-white bg-project">Read
                    More</a>
            </div>
        </div>
    </div>
</div>

<?php
}
?>

<script>
<?php

    foreach ($notices as $notice) :
    ?>
$(document).ready(function() {
    $('#popupNoticeModel<?php echo $notice['id'] ?>').modal('show');
})

<?php
    endforeach;
    ?>
</script>


<?php require_once('./components/Footer.php') ?>
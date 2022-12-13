<?php
require_once('./useable/header.php');
require_once('./config/db_config.php');

if (isset($_GET['id']) && !is_null($_GET['id']) && $_GET['id'] != '') {
    $event_id = $_GET['id'];

    $sql = "SELECT * FROM events WHERE id = $event_id";
    $result = $conn->query($sql);
    $result = $result->fetch_assoc();

    $sql = "select * from event_images where id = " . $result['id'] . " AND featured = 1";
    $res = $conn->query($sql);
    $image = $res->fetch_assoc();
    $image = $image['name'];



?>

<!-- Breadcrumb Area Start -->
<div class="breadcrumb-area bg-image-4 ptb-170" style="background-image: url('uploads/events/<?php echo $image ?>');
    background-position: center center; background-repeat: no-repeat; background-size: cover;">
    <div class="container">
        <div class="breadcrumb-content text-center">
            <h3><?php echo $result['title'] ?></h3>
            <ul>
                <li><a href="index.php">Home</a></li>
                <li><a href="events.php">Events</a></li>
            </ul>
        </div>
    </div>
</div>
<!-- Breadcrumb Area End -->


<!-- blog-area start -->
<div class="blog-page-area ptb-100">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-xl-9 col-md-8">
                <div class="blog-details-wrapper">
                    <div class="single-blog-wrapper">
                        <div class="blog-img mb-30">
                            <img src="uploads/events/<?php echo $image ?>" alt="">
                        </div>
                        <div class="blog-content">
                            <h2><?php echo $result['title'] ?></h2>
                            <div class="blog-date-categori">
                                <ul>
                                    <li>October 14, 2018 </li>
                                    <li>Admin</li>
                                </ul>
                            </div>
                        </div>
                        <?php echo $result['description'] ?>
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut
                            labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco
                            laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprhendit in
                            voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat
                            cupidatat non proident, sunt in culpa qei officia deser mollit anim id est laborum. Sed ut
                            perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium,
                            totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et</p>
                        <div class="highlights-title-wrapper">
                            <div class="highlights-img">
                                <img src="assets/img/blog/blog-link-post2.png" alt="">
                            </div>
                            <div class="importent-title">
                                <h4>Lorem ipsum dolor sit amet, consecte adipisicing elit, sed do eiusmod tempor
                                    incididunt labo dolor magna aliqua. Ut enim ad minim veniam quis nostrud.</h4>
                            </div>
                        </div>
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut
                            labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco
                            laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehendrit in
                            voluptate velit esse cillum dolore eu fugiat nulla pariatur.</p>
                        <div class="dec-img-wrapper">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="dec-img">
                                        <img src="assets/img/blog/blog-dec-img1.jpg" alt="">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="dec-img dec-mrg">
                                        <img src="assets/img/blog/blog-dec-img2.jpg" alt="">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut
                            labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco
                            laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehnderit in
                            voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat
                            cupidatat non proident, sunt in culpa qui officia dser mollit anim id est laborum. Sed ut
                            perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium,
                            totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et</p>
                        <div class="blog-dec-tags-social">
                            <div class="blog-dec-tags">
                                <ul>
                                    <li><a href="#">lifestyle</a></li>
                                    <li><a href="#">interior</a></li>
                                    <li><a href="#">outdoor</a></li>
                                </ul>
                            </div>
                            <div class="blog-dec-social">
                                <span>share :</span>
                                <ul>
                                    <li><a href="#"><i class="ion-social-instagram"></i></a></li>
                                    <li><a href="#"><i class="ion-social-skype"></i></a></li>
                                    <li><a href="#"><i class="ion-social-twitter"></i></a></li>
                                    <li><a href="#"><i class="ion-social-facebook"></i></a></li>
                                </ul>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-xl-3 col-md-4">
                <div class="blog-sidebar-wrapper sidebar-mrg">
                    <div class="blog-widget mb-45">
                        <h4 class="blog-widget-title mb-25">Recent post</h4>
                        <div class="blog-recent-post">
                            <div class="recent-post-wrapper mb-25">
                                <div class="recent-post-img">
                                    <a href="#"><img src="assets/img/blog/blog-recentpost-1.jpg" alt=""></a>
                                </div>
                                <div class="recent-post-content">
                                    <h4><a href="#">New Products</a></h4>
                                    <span>October 14, 2018</span>
                                </div>
                            </div>
                            <div class="recent-post-wrapper mb-25">
                                <div class="recent-post-img">
                                    <a href="#"><img src="assets/img/blog/blog-recentpost-2.jpg" alt=""></a>
                                </div>
                                <div class="recent-post-content">
                                    <h4><a href="#">New Products</a></h4>
                                    <span>October 14, 2018</span>
                                </div>
                            </div>
                            <div class="recent-post-wrapper mb-25">
                                <div class="recent-post-img">
                                    <a href="#"><img src="assets/img/blog/blog-recentpost-3.jpg" alt=""></a>
                                </div>
                                <div class="recent-post-content">
                                    <h4><a href="#">New Products</a></h4>
                                    <span>October 14, 2018</span>
                                </div>
                            </div>
                            <div class="recent-post-wrapper mb-25">
                                <div class="recent-post-img">
                                    <a href="#"><img src="assets/img/blog/blog-recentpost-4.jpg" alt=""></a>
                                </div>
                                <div class="recent-post-content">
                                    <h4><a href="#">New Products</a></h4>
                                    <span>October 14, 2018</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="blog-widget mb-35">
                        <h4 class="blog-widget-title mb-20">follow us </h4>
                        <div class="blog-sidebar-social">
                            <ul>
                                <li><a href="#"><i class="ion-social-instagram"></i></a></li>
                                <li><a href="#"><i class="ion-social-skype"></i></a></li>
                                <li><a href="#"><i class="ion-social-twitter"></i></a></li>
                                <li><a href="#"><i class="ion-social-facebook"></i></a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="blog-widget mb-50 mrg-none">
                        <h4 class="blog-widget-title mb-25">tags</h4>
                        <div class="blog-tags">
                            <ul>
                                <li><a href="#">Green</a></li>
                                <li><a href="#">Oolong </a></li>
                                <li><a href="#">Black </a></li>
                                <li><a href="#">Pu'erh </a></li>
                                <li><a href="#">love </a></li>
                                <li><a href="#">special </a></li>
                                <li><a href="#">success </a></li>
                                <li><a href="#">Dark </a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- blog-area end -->



<?php
    require_once('./components/Footer.php');
} else {
    echo "<script>window.location.href = 'events.php'</script>";
    exit();
}

?>
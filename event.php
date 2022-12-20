<?php
require_once('./components/Header.php');
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
        <div class="row justify-content-center">
            <div class="col-lg-8 col-xl-9 col-md-8">
                <div class="blog-details-wrapper">
                    <div class="single-blog-wrapper">
                        <div class="blog-img mb-30">
                            <img width="auto" height="600px" style="object-fit: cover;"
                                src="uploads/events/<?php echo $image ?>" alt="">
                        </div>
                        <div class="blog-content">
                            <h2><?php echo $result['title'] ?></h2>
                            <div class="blog-date-categori">
                                <li><?php echo date('F d, Y', strtotime($result['posted_date'])) ?></li>
                            </div>
                        </div>
                        <p style="text-align: justify;">
                            <?php echo $result['description'] ?>
                        </p>
                        <?php
                            $sql = "select * from event_images where id = " . $result['id'] . " AND featured <> 1";
                            $res = $conn->query($sql);
                            $images = $res->fetch_all(MYSQLI_ASSOC);
                            ?>


                        <div class="dec-img-wrapper">
                            <div class="row">
                                <?php
                                    foreach ($images as $image) {
                                    ?>
                                <div class="col-md-6">
                                    <div class="dec-img">
                                        <img width="auto" height="347px" style="object-fit: contain;"
                                            src="uploads/events/<?php echo $image['name'] ?>" alt="">
                                    </div>
                                </div>
                                <?php
                                    }
                                    ?>
                            </div>
                        </div>

                        <div class="blog-dec-tags-social">
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
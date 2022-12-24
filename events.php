<?php
require_once('./components/Header.php');
require_once('./config/db_config.php');
?>


<!-- Breadcrumb Area Start -->
<div class="breadcrumb-area bg-image-4 ptb-170">
    <div class="container">
        <div class="breadcrumb-content text-center">
            <h3>EVENTS</h3>
            <ul>
                <li><a href="index.php">Home</a></li>
                <li class="active">Events</li>
            </ul>
        </div>
    </div>
</div>
<!-- Breadcrumb Area End -->

<?php
$sql = "SELECT * FROM events";
$res = $conn->query($sql);
$result = $res->fetch_all(MYSQLI_ASSOC);

if ($res->num_rows !== 0) {

?>

<!-- blog-area start -->
<div class="blog-page-area masonary-style ptb-100">
    <div class="container">
        <div class="row blog-grid">

            <?php
                foreach ($result as $index => $event) {
                    $sql = "select * from event_images where id = " . $event['id'] . " AND featured = 1";
                    $res = $conn->query($sql);
                    $image = $res->fetch_assoc();
                    $image = $image['name'];
                ?>

            <div class="col-lg-4 col-md-6 blog-grid-item">
                <div class="single-blog-wrapper mb-40">
                    <div class="blog-img mb-30">
                        <a href="event.php?id=<?php echo $event['id'] ?>">
                            <img style="object-fit: cover;" width="100%" height="247px"
                                src="uploads/events/<?php echo $image ?>" alt="">
                        </a>
                    </div>
                    <div class="blog-content">
                        <h2><a href="event.php?id=<?php echo $event['id'] ?>"><?php echo $event['title'] ?></a></h2>
                        <div class="blog-date-categori">
                            <li><?php echo date('F d, Y', strtotime($event['posted_date'])) ?></li>
                        </div>
                    </div>
                    <?php
                            $description = $event['short_description'];
                            if (strlen($description) > 150) {
                                $description = trim(substr($description, 0, 150));
                                $description .= "...";
                            }
                            ?>
                    <p><?php echo $description ?></p>
                    <div class="blog-btn-social mt-30">
                        <div class="blog-btn">
                            <a href="event.php?id=<?php echo $event['id'] ?>">Read more</a>
                        </div>
                    </div>
                </div>
            </div>

            <?php
                }
                ?>
        </div>

        <!-- Pagination -->
    </div>
</div>
<!-- events-area end -->

<?php
} else {
?>
<div class="blog-page-area masonary-style ptb-100">
    <div class="container text-center">
        <h1>NO EVENTS TO SHOW</h1>
    </div>
</div>

<?php
}
require_once('./components/Footer.php');

?>
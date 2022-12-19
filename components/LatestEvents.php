<?php
$sql = "SELECT * FROM events LIMIT 3";
$res = $conn->query($sql);
$result = $res->fetch_all(MYSQLI_ASSOC);

if ($res->num_rows !== 0) {

?>
<!-- Events Area Start -->
<div class="blog-area bg-image-1 pt-90 pb-70">
    <div class="container">
        <div class="product-top-bar section-border mb-55">
            <div class="section-title-wrap text-center">
                <h3 class="section-title">Latest Events</h3>
            </div>
        </div>

        <div class="row">
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
                            <img style="object-fit: cover;" width="100%" height="347px"
                                src="uploads/events/<?php echo $image ?>" alt="">
                        </a>
                    </div>
                    <div class="blog-content">
                        <span class="blog-date"><?php echo date('F d, Y', strtotime($event['posted_date'])) ?></span>
                        <h3><a href="event.php?id=<?php echo $event['id'] ?>"><?php echo $event['title'] ?></a></h3>
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
                            <a href="event.php?id=<?php echo $event['id'] ?>">read more</a>
                        </div>
                    </div>
                </div>
            </div>
            <?php
                }
                ?>
        </div>
        <div class="ms-auto text-end">
            <a class="btn py-2 px-4 rounded text-white text-end bg-project" href="events.php">Show
                More</a>
        </div>
    </div>
</div>
<!-- Events Area End -->

<?php
} else {
    echo "";
}
?>
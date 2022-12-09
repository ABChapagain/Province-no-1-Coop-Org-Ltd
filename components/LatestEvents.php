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

                ?>
            <div class="col-lg-4 col-md-6">
                <div class="blog-single mb-30">
                    <div class="blog-thumb">
                        <a href="event.php?id=<?php echo $event['id'] ?>"><img src="assets/img/blog/blog-single-1.jpg"
                                alt="" /></a>
                    </div>
                    <div class="blog-content pt-25">
                        <span class="blog-date">14 Sep</span>
                        <h3><a href="event.php?id=<?php echo $event['id'] ?>"><?php echo $event['title'] ?></a></h3>
                        <p>Lorem ipsum dolor sit amet, consectetur adipisici elit, sed do eius tempor incididunt ut
                            labore et dolore</p>
                        <a href="event.php?id=<?php echo $event['id'] ?>">Read More</a>
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
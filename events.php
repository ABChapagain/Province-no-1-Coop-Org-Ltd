<?php
require_once('./useable/header.php');
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

                ?>

            <div class="col-lg-4 col-md-6 blog-grid-item">
                <div class="single-blog-wrapper mb-40">
                    <div class="blog-img mb-30">
                        <a href="event.php?id=<?php echo $event['id'] ?>">
                            <img src="assets/img/blog/blog-masonry-1.jpg" alt="">
                        </a>
                    </div>
                    <div class="blog-content">
                        <h2><a href="event.php?id=<?php echo $event['id'] ?>"><?php echo $event['title'] ?></a></h2>
                        <div class="blog-date-categori">
                            <ul>
                                <li>October 14, 2018 </li>
                                <li>Admin</li>
                            </ul>
                        </div>
                    </div>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicin sed do eiusmod tempor incididunt ut labore
                        dolore mag aliqua. Ut enim ad minim veniam</p>
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
require_once('./useable/footer.php');

?>
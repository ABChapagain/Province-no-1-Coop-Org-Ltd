<?php
require_once('./components/Header.php');
require_once('./config/db_config.php');

if (isset($_GET['id'])) {
    $notice_id = $_GET['id'];
} else {
    $notice_id = '';
}
?>


<!-- Breadcrumb Area Start -->
<div class="breadcrumb-area bg-image-4 ptb-170">
    <div class="container">
        <div class="breadcrumb-content text-center">
            <h3>NOTICE</h3>
            <ul>
                <li><a href="index.php">Home</a></li>
                <li class="active">Notice</li>
            </ul>
        </div>
    </div>
</div>
<!-- Breadcrumb Area End -->

<!-- my account start -->
<div class="checkout-area pb-80 pt-100">
    <div class="container">
        <div class="row justify-content-center">
            <div class="ml-auto mr-auto col-lg-9">
                <div class="checkout-wrapper">
                    <div id="faq" class="panel-group">

                        <?php
                        $sql = "SELECT * FROM notices";
                        $result = mysqli_query($conn, $sql);

                        if ($result->num_rows > 0) {

                            $notices = $result->fetch_all(MYSQLI_ASSOC);

                            foreach ($notices as $index => $notice) :
                                $show = '';
                                if ($notice_id === '') {
                                    if ($index === 0) {
                                        $show = 'show';
                                    }
                                } else {
                                    if ($notice_id === $notice['id']) {
                                        $show = 'show';
                                    }
                                }

                        ?>

                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h5 class="panel-title">
                                    <span><?php echo $index + 1 ?></span>
                                    <a data-bs-toggle="collapse"
                                        href="#notice-<?php echo $notice['id'] ?>"><?php echo $notice['title'] ?>
                                        <br>
                                        <p class="mb-0" style="text-transform: capitalize;">
                                            <strong>
                                                <i class="ti-calendar me-1"></i> Published Date:
                                            </strong>
                                            <?php echo date('F d, Y', strtotime($notice['published_date'])) ?>
                                        </p>
                                    </a>
                                </h5>
                            </div>
                            <div id="notice-<?php echo $notice['id'] ?>"
                                class="panel-collapse collapse <?php echo $show ?>" data-bs-parent="#faq">
                                <div class="panel-body">
                                    <div class="billing-information-wrapper text-justify">
                                        <p>
                                            <?php echo $notice['description'] ?>
                                        </p>
                                        <?php
                                                $sql = "SELECT * FROM notice_images WHERE id = $notice[id]";
                                                $res = mysqli_query($conn, $sql);
                                                if ($res->num_rows > 0) :
                                                    while ($notice_images = $res->fetch_assoc()) :
                                                ?>
                                        <img class="my-2" width="100%"
                                            src="./uploads/notices/<?php echo $notice_images['image'] ?>"
                                            alt="<?php echo $notice['title'] ?>" />
                                        <?php
                                                    endwhile;
                                                endif; ?>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <?php endforeach; ?>
                        <?php
                        } else {
                            echo "<h2 class='text-center'>No Notice Found</h2>";
                        }
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- my account end -->

<?php require_once('./components/Footer.php');

?>
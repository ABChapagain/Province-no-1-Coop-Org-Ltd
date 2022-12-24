<?php
require_once('./components/Header.php');

require_once('./config/db_config.php');

?>


<!-- Breadcrumb Area Start -->
<div class="breadcrumb-area bg-image-3 ptb-170">
    <div class="container">
        <div class="breadcrumb-content text-center">
            <h3>REPORTS</h3>
            <ul>
                <li><a href="index.php">Home</a></li>
                <li class="active">Reports </li>
            </ul>
        </div>
    </div>
</div>
<!-- Breadcrumb Area End -->

<!-- shopping-cart-area start -->
<div class="cart-main-area ptb-100">
    <div class="container">
        <?php
        $sql = "SELECT * FROM reports ORDER BY id DESC";
        $result = $conn->query($sql);
        $reports = $result->fetch_all(MYSQLI_ASSOC);

        if ($result->num_rows > 0) {

        ?>
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-12">
                <div class="table-content table-responsive wishlist">
                    <table class="w-100">
                        <thead>
                            <tr>
                                <th>SN</th>
                                <th>Title</th>
                                <th>Published Date</th>
                                <th>Download</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                                foreach ($reports as $index => $report) :
                                ?>
                            <tr>
                                <td><?php echo $index + 1 ?></td>
                                <td class="product-name"><?php echo $report['title'] ?></td>
                                <td><?php echo date('F d, Y', strtotime($report['published_date'])) ?>
                                </td>
                                <td class="product-wishlist-cart">
                                    <a target="_blank"
                                        href="./uploads/reports/<?php echo $report['file_name'] ?>">Download</a>
                                </td>
                            </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <?php
        } else {
        ?>
        <h3>NO REPORTS FOUND</h3>
        <?php
        }
        ?>
    </div>
</div>

<?php require_once('./components/Footer.php');

?>
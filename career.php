<?php require_once('./useable/header.php');
require_once('./config/db_config.php');

?>


<!-- Breadcrumb Area Start -->
<div class="breadcrumb-area bg-image-3 ptb-170">
    <div class="container">
        <div class="breadcrumb-content text-center">
            <h3>CAREER</h3>
            <ul>
                <li><a href="index.php">Home</a></li>
                <li class="active">Career </li>
            </ul>
        </div>
    </div>
</div>
<!-- Breadcrumb Area End -->

<!-- Career Area Start -->
<div class="career-area  pt-100 pb-95">
    <div class="container">

        <div class="section-border mb-35">
            <div class="text-center section-title-wrap">
                <h2 class="section-title section-bg-white">
                    Work With Us
                </h2>
                <p>
                    Work with great people. Our team is passionate, driven and successful – join us if you are too!
                </p>
            </div>
        </div>
        <?php
        $sql = "SELECT * FROM vacancy ORDER BY id DESC";
        $result = $conn->query($sql);
        $vacancies = $result->fetch_all(MYSQLI_ASSOC);

        if ($result->num_rows > 0) {

        ?>
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-12">
                <div class="table-content table-responsive wishlist">

                    <table class="w-100">
                        <thead>
                            <tr>
                                <th>SN</th>
                                <th>Job Title</th>
                                <th>Openings</th>
                                <th>Posted On</th>
                                <th>Apply Before</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                                foreach ($vacancies as $index => $vacancy) :
                                ?>
                            <tr>
                                <td><?php echo $index + 1 ?></td>
                                <td style="color: #519f10" class="fw-bold"><?php echo $vacancy['title'] ?>
                                </td>
                                <td>
                                    <span class="career-opening">
                                        10
                                    </span>
                                </td>
                                <td><?php echo date('F d, Y', strtotime($vacancy['published_date'])) ?>
                                <td><?php echo date('F d, Y', strtotime($vacancy['termination_date'])) ?>
                                <td class="product-wishlist-cart">
                                    <a href="#">View Details</a>
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
        <h3 style="text-align:center;">NO OPENINGS FOUND</h3>
        <?php
        }
        ?>
    </div>
</div>

<?php require_once('./components/Footer.php');

?>
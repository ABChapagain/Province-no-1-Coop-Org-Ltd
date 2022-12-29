<?php
require_once('./components/Header.php');
require_once('./config/db_config.php');

if (isset($_GET['id']) && !is_null($_GET['id']) && $_GET['id'] != '') {
    $id = $_GET['id'];
    $vacancy_id = mysqli_real_escape_string($conn, $id);
    $sql = "SELECT * FROM vacancy WHERE id = $vacancy_id";
    $res = $conn->query($sql);
    $vacancy = $res->fetch_assoc();

    if ($res->num_rows > 0) {



?>


<!-- Breadcrumb Area Start -->
<div class="breadcrumb-area bg-image-3 ptb-170">
    <div class="container">
        <div class="breadcrumb-content text-center">
            <h3><?php echo $vacancy['title'] ?></h3>
            <ul>
                <li><a href="index.php">Home</a></li>
                <li><a href="careers.php">Career</a> </li>
            </ul>
        </div>
    </div>
</div>
<!-- Breadcrumb Area End -->

<!-- Career Area Start -->
<div class="career-area pt-100 pb-95">
    <div class="container">

        <div class="section-border mb-35">
            <div class="text-center section-title-wrap">
                <h2 class="section-title section-bg-white">
                    <?php echo $vacancy['title'] ?>
                </h2>
                <div class="mt-4">
                    Posted On : <span
                        class="fw-bold me-3"><?php echo date('F d, Y', strtotime($vacancy['starting_date'])) ?></span>
                    Apply Before : <span
                        class="fw-bold"><?php echo date('F d, Y', strtotime($vacancy['termination_date'])) ?></span><br>
                    Openings : <span class="fw-bold"><?php echo $vacancy['vacancy_seats'] ?></span>
                </div>
            </div>
        </div>

        <div class="row">
            <p>
                <?php echo $vacancy['description'] ?>
            </p>
        </div>

        <div class="row text-center justify-content-center">
            <div>

                <?php
                        $current_date = date('Y-m-d');
                        $termination_date = $vacancy['termination_date'];
                        $starting_date = $vacancy['starting_date'];

                        if (strtotime($starting_date) <= strtotime($current_date) && strtotime($termination_date) >= strtotime($current_date)) {
                            echo "<a class='btn btn-style-2' href='career-apply.php?id=$vacancy_id'>Apply Now</a>";
                        } else {
                            echo '<button class="btn btn-danger py-2 px-3">Application Closed</button>';
                        }

                        ?>
            </div>

            <div class="blog-dec-tags-social">
                <div class="blog-dec-social">
                    <span>share :</span>
                    <ul>
                        </li>
                        <?php
                                $share_url = "https://www.facebook.com/sharer/sharer.php?u=$current_url";
                                ?>
                        <li><a class="share" href="<?php echo $share_url ?>"><i class="ion-social-facebook"></i>
                            </a></li>
                        <?php
                                $share_url = "https://twitter.com/intent/tweet?url=$current_url";
                                ?>
                        <li><a class="tweet" href="<?php echo $share_url ?>"><i class="ion-social-twitter"></i>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>

    </div>
</div>


<?php
    } else {
        echo "<script>window.location.href = 'careers.php'</script>";
        exit();
    }
} else {
    echo "<script>window.location.href = 'careers.php'</script>";
    exit();
}

require_once('./components/Footer.php');

?>
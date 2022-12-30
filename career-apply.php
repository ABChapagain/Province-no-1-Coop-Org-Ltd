<?php
session_start();
require_once('./components/Header.php');
require_once('./config/db_config.php');

if (isset($_GET['id']) && !is_null($_GET['id']) && $_GET['id'] != '') {

    $vacancy_id = $_GET['id'];
    $current_date = date('Y-m-d');

    $sql = "SELECT * FROM vacancy WHERE id = $vacancy_id AND starting_date <= '$current_date' AND termination_date >= '$current_date'";
    $res = $conn->query($sql);
    $vacancy = $res->fetch_assoc();

    if ($res->num_rows > 0) {
        $sql = "SELECT * FROM vacancy WHERE starting_date <= '$current_date' AND termination_date >= '$current_date'";
        $res = $conn->query($sql);
        $vacancies = $res->fetch_all(MYSQLI_ASSOC);

?>


<!-- Breadcrumb Area Start -->
<div class="breadcrumb-area bg-image-3 ptb-170">
    <div class="container">
        <div class="breadcrumb-content text-center">
            <h3>Apply For Vaccancy</h3>
            <ul>
                <li><a href="index.php">Home</a></li>
                <li><a href="careers.php">Career</a> </li>
                <li><a href="career.php?id=<?php echo $vacancy_id ?>"><?php echo $vacancy['title'] ?></a> </li>
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
                <h3>Apply For</h3>
                <h2 class="text-green ">
                    <?php echo $vacancy['title'] ?>
                </h2>
            </div>
        </div>

        <div class="row justify-content-center">
            <div class="col-md-10 col-xl-8 shadow p-3 rounded">

                <?php
                        if (isset($_SESSION['apply_error'])) {
                        ?>
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <?php echo $_SESSION['apply_error'] ?>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
                        <img src="assets/img/icons/x-lg.svg" alt="close" />
                    </button>
                </div>
                <?php
                            unset($_SESSION['apply_error']);
                        }
                        ?>
                <?php

                        if (isset($_SESSION['apply_success'])) {
                        ?>
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <?php echo $_SESSION['apply_success'] ?>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
                        <img src="assets/img/icons/x-lg.svg" alt="close" />
                    </button>
                </div>
                <?php
                            unset($_SESSION['apply_success']);
                            echo "<script>setTimeout(() => {
                                window.location.href = 'careers.php';
                            }, 3000);</script>";
                        }
                        ?>

                <form action="career-apply-post.php" method="POST" enctype="multipart/form-data">
                    <div class="mb-3">
                        <label class="mb-2" for="name">Full Name: </label>
                        <input type="text" name="name" placeholder="Full Name" required />
                    </div>
                    <div class="mb-3">
                        <label class="mb-2" for="email">Email: </label>
                        <input type="email" name="email" placeholder="Email" required />
                    </div>
                    <div class="mb-3">
                        <label class="mb-2" for="phone">Mobile Number: </label>
                        <input type="tel" name="phone" placeholder="Mobile Number" required />
                    </div>
                    <div class="mb-3">
                        <label class="mb-2" for="address">Address: </label>
                        <input type="text" name="address" placeholder="Address" required />
                    </div>
                    <div class="mb-3">
                        <label class="mb-2" for="apply-for">Apply For: </label>
                        <select name="apply-for" id="apply-for" required>
                            <option disabled selected>-- Apply For --</option>
                            <?php foreach ($vacancies as $vacant) : ?>
                            <option value="<?php echo $vacant['id'] ?>"
                                <?php echo $vacant['id'] === $vacancy['id'] ? 'selected' : '' ?>>
                                <?php echo $vacant['title'] ?>
                            </option>
                            <?php endforeach; ?>
                        </select>
                    </div>

                    <div class="mb-3">
                        <label class="mb-2" for="resume">Upload Resume Here: </label>
                        <input type="file" name="resume" required>
                        <span>Files must be less than 1mb. Allowed file types: pdf, doc,docx</span>
                    </div>
                    <div class="mb-3">
                        <label class="mb-2" for="cover-letter">Cover Letter: </label>
                        <textarea name="cover-letter" id="cover-letter" cols="30" rows="7" required></textarea>
                    </div>
                    <div class="mb-3 text-center">
                        <input style="width: auto;" type="submit" name="submit" value="Apply Now"
                            class="btn btn-style-2">
                    </div>
                </form>

            </div>
        </div>
    </div>
</div>


<?php
    } else {
        echo "<script>window.location.href = 'careers.php'</script>";
    }
} else {
    echo "<script>window.location.href = 'careers.php'</script>";
}
require_once('./components/Footer.php');

?>
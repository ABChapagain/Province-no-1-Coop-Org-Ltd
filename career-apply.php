<?php
require_once('./components/Header.php');
require_once('./config/db_config.php');

if (isset($_GET['id']) && !is_null($_GET['id']) && $_GET['id'] != '') {

    $vacancy_id = $_GET['id'];
    $current_date = date('Y-m-d');

    $sql = "SELECT * FROM vacancy WHERE id = $vacancy_id AND termination_date > '$current_date'";
    $res = $conn->query($sql);
    $vacancy = $res->fetch_assoc();

    if ($res->num_rows > 0) {
        $sql = "SELECT * FROM vacancy WHERE termination_date > '$current_date'";
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
            <div class="col-8 shadow p-3 rounded">
                <?php

                        if (isset($_POST['submit']) && isset($_FILES['resume'])) {

                            $name = mysqli_real_escape_string($conn, $_POST['name']);
                            $email = mysqli_real_escape_string($conn, $_POST['email']);
                            $phone = mysqli_real_escape_string($conn, $_POST['phone']);
                            $address = mysqli_real_escape_string($conn, $_POST['address']);
                            $position = mysqli_real_escape_string($conn, $_POST['apply-for']);
                            $cover_letter = mysqli_real_escape_string($conn, $_POST['cover-letter']);
                            $date = date('Y-m-d');

                            // Get file name
                            $file_name = $_FILES['resume']['name'];

                            // Allowed extensions
                            $allowed_ext = array('pdf', 'doc', 'docx', 'jpg');

                            // Get file extension
                            $file_ext = strtolower(pathinfo($file_name, PATHINFO_EXTENSION));

                            if (in_array($file_ext, $allowed_ext)) {
                                // Set unique id with the extension

                                $uniqID =  uniqid() . "." . pathinfo($file_name, PATHINFO_EXTENSION);
                                $file_tem_loc = $_FILES['resume']['tmp_name'];
                                $file_store = "uploads/resume/" . $uniqID;


                                $sql = "INSERT INTO `job_application` (`name`, `email`, `phone`, `address`, `position`, `resume`, `cover_letter`, `date`) VALUES ('$name', '$email', '$phone', '$address', '$position', '$file_store','$uniqID', '$date')";

                                if ($conn->query($sql)) {
                                    move_uploaded_file($file_tem_loc, $file_store);
                                    echo
                                    '<div class="alert alert-success alert-dismissible fade show" role="alert">
                            <strong>Success!</strong> Your application has been submitted successfully.
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>';
                                    echo "<script>setTimeout(`location.href = 'index.php'`,2000);</script>";
                                } else {
                                    echo
                                    '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                            <strong>Error!</strong> Something went wrong. Please try again.
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>';
                                }
                            } else {
                                echo
                                '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                        <strong>Error!</strong> File type not allowed. Allowed file types: pdf, doc,docx
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>';
                            }
                        }

                        ?>
                <form action="#" method="POST" enctype="multipart/form-data">
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
                            <option value="<?php echo $vacant['title'] ?>"
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
        echo "<script>setTimeout(`location.href = 'index.php'`,0);</script>";
    }
}
require_once('./components/Footer.php');

?>
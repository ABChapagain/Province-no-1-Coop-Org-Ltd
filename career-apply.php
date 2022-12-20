<?php
require_once('./components/Header.php');
require_once('./config/db_config.php');

if (isset($_GET['id']) && !is_null($_GET['id']) && $_GET['id'] != '') {
    $vacancy_id = $_GET['id'];

    $sql = "SELECT * FROM vacancy WHERE id = $vacancy_id";
    $res = $conn->query($sql);
    $vacancy = $res->fetch_assoc();
}

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
                <form action="#" method="POST">
                    <div class="mb-3">
                        <label class="mb-2" for="name">Full Name: </label>
                        <input type="text" name="name" placeholder="Full Name" />
                    </div>
                    <div class="mb-3">
                        <label class="mb-2" for="email">Email: </label>
                        <input type="email" name="email" placeholder="Email" />
                    </div>
                    <div class="mb-3">
                        <label class="mb-2" for="phone">Mobile Number: </label>
                        <input type="tel" name="phone" placeholder="Mobile Number" />
                    </div>
                    <div class="mb-3">
                        <label class="mb-2" for="apply-for">Apply For: </label>
                        <select name="apply-for" id="apply-for">
                            <option disabled selected>-- Apply For --</option>
                            <option value="<?php echo $vacancy['title'] ?>">
                                <?php echo $vacancy['title'] ?>
                            </option>
                            <option value="<?php echo $vacancy['title'] ?>">
                                <?php echo $vacancy['title'] ?>
                            </option>
                            <option value="<?php echo $vacancy['title'] ?>">
                                <?php echo $vacancy['title'] ?>
                            </option>
                            <option value="<?php echo $vacancy['title'] ?>">
                                <?php echo $vacancy['title'] ?>
                            </option>
                        </select>
                    </div>

                    <div class="mb-3">
                        <label class="mb-2" for="resume">Upload Resume Here: </label>
                        <input type="file" name="resume">
                        <span>Files must be less than 1mb. Allowed file types: pdf, doc,docx</span>
                    </div>
                    <div class="mb-3">
                        <label class="mb-2" for="cover-letter">Cover Letter: </label>
                        <textarea name="cover-letter" id="cover-letter" cols="30" rows="7"></textarea>
                    </div>
                    <div class="mb-3 text-center">
                        <input style="width: auto;" type="submit" value="Apply Now" class="btn btn-style-2">

                    </div>

                </form>
            </div>

        </div>




    </div>
</div>


<?php require_once('./components/Footer.php');

?>
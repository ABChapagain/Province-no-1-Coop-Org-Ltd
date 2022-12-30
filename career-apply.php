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

                <form id="applyForm" action="career-apply-post.php" method="POST" enctype="multipart/form-data">
                    <div class="mb-3">
                        <label class="mb-2" for="name">Full Name: *</label>
                        <input type="text" name="name" placeholder="Full Name" />
                        <span id="name-error" class="input-error">Please enter a valid name.</span>
                    </div>
                    <div class="mb-3">
                        <label class="mb-2" for="email">Email: *</label>
                        <input type="email" name="email" placeholder="Email" />
                        <span id="email-error" class="input-error">Please enter a valid email.</span>
                    </div>
                    <div class="mb-3">
                        <label class="mb-2" for="phone">Mobile Number: *</label>
                        <input type="tel" name="phone" placeholder="Mobile Number" />
                        <span id="phone-error" class="input-error">Please enter a valid phone number.</span>
                    </div>
                    <div class="mb-3">
                        <label class="mb-2" for="address">Address: *</label>
                        <input type="text" name="address" placeholder="Address" />
                        <span id="address-error" class="input-error">Please enter a valid address.</span>
                    </div>
                    <div class="mb-3">
                        <label class="mb-2" for="apply-for">Apply For: *</label>
                        <select name="apply-for" id="apply-for">
                            <option disabled selected>-- Apply For --</option>
                            <?php foreach ($vacancies as $vacant) : ?>
                            <option value="<?php echo $vacant['id'] ?>"
                                <?php echo $vacant['id'] === $vacancy['id'] ? 'selected' : '' ?>>
                                <?php echo $vacant['title'] ?>
                            </option>
                            <?php endforeach; ?>
                        </select>
                        <span id="apply-for-error" class="input-error">Please select a valid option.</span>
                    </div>

                    <div class="mb-3">
                        <label class="mb-2" for="resume">Upload Resume Here: * <span>(Files must be less than 1mb.
                                Allowed
                                file
                                types: pdf, doc,docx)</span></label>
                        <input type="file" name="resume">
                        <span id="resume-error" class="input-error">Please upload a valid file.</span>
                    </div>
                    <div class="mb-3">
                        <label class="mb-2" for="cover-letter">Cover Letter: *</label>
                        <textarea placeholder="Write your cover letter here." name="cover-letter" id="cover-letter"
                            cols="30" rows="7"></textarea>
                        <span id="cover-letter-error" class="input-error">Please enter a valid cover letter.</span>
                    </div>
                    <div class="mb-3 text-center">
                        <input style="width: auto;" id="career_apply_btn" type="button" value="Apply Now"
                            class="btn btn-style-2">
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<script>
const applyBtn = document.getElementById('career_apply_btn')
const applyForm = document.getElementById('applyForm')


const validateInput = () => {
    const name = document.querySelector('input[name="name"]');
    const email = document.querySelector('input[name="email"]');
    const phone = document.querySelector('input[name="phone"]');
    const address = document.querySelector('input[name="address"]');
    const applyFor = document.querySelector('select[name="apply-for"]');
    const resume = document.querySelector('input[name="resume"]');
    const coverLetter = document.querySelector('textarea[name="cover-letter"]');

    // selecting name-error
    const nameError = document.getElementById('name-error');
    nameError.style.display = 'none';

    const emailError = document.getElementById('email-error');
    emailError.style.display = 'none';

    const phoneError = document.getElementById('phone-error');
    phoneError.style.display = 'none';

    const addressError = document.getElementById('address-error');
    addressError.style.display = 'none';

    const applyForError = document.getElementById('apply-for-error');
    applyForError.style.display = 'none';

    const resumeError = document.getElementById('resume-error');
    resumeError.style.display = 'none';

    const coverLetterError = document.getElementById('cover-letter-error');
    coverLetterError.style.display = 'none';


    const nameRegex = /^[a-zA-Z ]{2,30}$/;
    const emailRegex = /^[^@]+@[^@]+\.[^@]+$/;
    const phoneRegex = /^[0-9]{10}$/;
    const addressRegex = /^[a-zA-Z0-9\s.,#-]+$/;
    const coverLetterRegex = /^[a-zA-Z0-9 ]{6,150}$/;

    if (name.value === '' || !nameRegex.test(name.value)) {
        name.focus();
        nameError.style.display = 'block';
        return false;
    } else if (email.value === '' || !emailRegex.test(email.value)) {
        email.focus();
        emailError.style.display = 'block';
        return false;
    } else if (phone.value === '' || !phoneRegex.test(phone.value)) {
        phone.focus();
        phoneError.style.display = 'block';
        return false;
    } else if (address.value === '' || !addressRegex.test(address.value)) {
        address.focus();
        addressError.style.display = 'block';
        return false;
    } else if (applyFor.value === '') {
        applyFor.focus();
        applyForError.style.display = 'block';
        return false;
    } else if (resume.value === '') {
        resume.focus();
        resumeError.style.display = 'block';
        return false;
    } else if (coverLetter.value === '') {
        coverLetter.focus();
        coverLetterError.style.display = 'block';
        return false;
    } else {
        return true;
    }
}
applyBtn.addEventListener('click', (e) => {
    e.preventDefault();
    if (validateInput()) {
        applyForm.submit();
    }
});
</script>


<?php
    } else {
        echo "<script>window.location.href = 'careers.php'</script>";
    }
} else {
    echo "<script>window.location.href = 'careers.php'</script>";
}
require_once('./components/Footer.php');

?>
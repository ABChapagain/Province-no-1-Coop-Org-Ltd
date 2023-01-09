<?php
session_start();
$siteName = 'Contact Us';
require_once('./components/Header.php');
?>


<!-- Breadcrumb Area Start -->
<div class="breadcrumb-area bg-image-5 ptb-170">
    <div class="container">
        <div class="breadcrumb-content text-center">
            <h3>CONTACT US</h3>
            <ul>
                <li><a href="index.php">Home</a></li>
                <li class="active">Contact Us</li>
            </ul>
        </div>
    </div>
</div>
<!-- Breadcrumb Area End -->


<!-- Contact Area Start -->
<div class="contact-us ptb-95">
    <div class="container">
        <div class="row">
            <!-- Contact Form Area Start -->
            <div class="col-lg-6">
                <div class="small-title mb-30">
                    <h2>Contact Form</h2>
                    <p>There are many variations of passages of Lorem Ipsum available, but the majority Lorem Ipsum
                        available.</p>
                </div>
                <?php if (isset($_SESSION['contact_success'])) : ?>
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <strong>Success!</strong> <?php echo $_SESSION['contact_success']; ?>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
                        <img src="assets/img/icons/x-lg.svg" alt="close" />
                    </button>
                </div>
                <?php
                    unset($_SESSION['contact_success']);
                endif;
                ?>
                <?php if (isset($_SESSION['contact_error'])) : ?>
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <strong>Error!</strong> <?php echo $_SESSION['contact_error']; ?>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
                        <img src="assets/img/icons/x-lg.svg" alt="close" />
                    </button>
                </div>
                <?php
                    unset($_SESSION['contact_error']);
                endif;
                ?>
                <form id="contact-form" action="contact-us-post.php" method="POST">
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="contact-form-style mb-20">
                                <input name="con_name" placeholder="Full Name" type="text" required>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="contact-form-style mb-20">
                                <input name="con_email" placeholder="Email Address" type="email" required>
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <div class="contact-form-style mb-20">
                                <input name="con_subject" placeholder="Subject" type="text" required>
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <div class="contact-form-style">
                                <textarea name="con_message" placeholder="Message" required></textarea>
                                <button class="submit" name="con_submit" type="submit">SEND MESSAGE</button>
                            </div>
                        </div>
                    </div>
                </form>
                <p class="form-messege"></p>
            </div>
            <!-- Contact Form Area End -->


            <!-- Contact Address Strat -->
            <div class="col-lg-6">
                <div class="small-title mb-30">
                    <h2>प्रदेश नं. १ थोक उपभोक्ता विशिष्टिकृत सहकारी संघ लिमिटेड</h4>
                </div>
                <div class="row">
                    <div class="col-lg-12 col-md-12">
                        <div class="contact-information mb-30">
                            <h4>Established Date</h4>
                            <p> Ashar 19, 2078</p>
                        </div>
                    </div>
                    <div class="col-lg-12 col-md-12">
                        <div class="contact-information mb-30">
                            <h4>Registration Number</h4>
                            <p> 04/077/078</p>
                        </div>
                    </div>
                    <div class="col-lg-12 col-md-12">
                        <div class="contact-information mb-30">
                            <h4>Registration Office</h4>
                            <p>प्रदेश सहकारी रजिष्ट्रार कार्यलय, इटहरी, सुनसरी</p>
                        </div>
                    </div>
                    <div class="col-lg-12 col-md-12">
                        <div class="contact-information contact-mrg mb-30">
                            <h4>Phone Number</h4>
                            <p>
                                <a href="tel:01234567890">0123456789</a>
                                <a href="tel:01234567891">0123456789</a>
                            </p>
                        </div>
                    </div>
                    <div class="col-lg-12 col-md-12">
                        <div class="contact-information contact-mrg mb-30">
                            <h4>Web Address</h4>
                            <p>
                                <a href="mailto:info@example.com">demo@example.com</a>
                                <a href="#">demo@example.com</a>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Contact Address Strat -->
            <!-- Google Map Start -->
            <div class="col-md-12">
                <div id="store-location">
                    <div class="contact-map pt-80">
                        <iframe
                            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3565.6123188455513!2d87.6769012509231!3d26.660892477220717!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x39e58f5fdb32e3ff%3A0x469f9ad5de4872ee!2z4KSq4KWN4KSw4KSm4KWH4KS2IOCkqC4g4KWnIOCkpeCli-CklSDgpIngpKrgpK3gpYvgpJXgpY3gpKTgpL4g4KS14KS_4KS24KS_4KS34KWN4KSf4KS_4KSV4KWD4KSkIOCkuOCkueCkleCkvuCksOClgCDgpLjgpILgpJgg4KSy4KS_Lg!5e0!3m2!1sen!2snp!4v1671953647391!5m2!1sen!2snp"
                            height="600px" width="100%" allowfullscreen="" aria-hidden="false" tabindex="0"
                            loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                    </div>
                </div>
            </div>
            <!-- Google Map Start -->
        </div>
    </div>
</div>
<!-- Contact Area Start -->

<?php
require_once('./components/Footer.php');

?>
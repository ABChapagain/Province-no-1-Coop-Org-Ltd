<?php require_once('./useable/header.php');
?>


<!-- Breadcrumb Area Start -->
<div class="breadcrumb-area bg-image-4 ptb-170">
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
<div id="contact" class="contact-us ptb-95">
    <div class="container">
        <div class="row">
            <!-- Contact Form Area Start -->
            <div class="col-lg-6">
                <div class="small-title mb-30">
                    <h2>Contact Form</h2>
                    <p>Please fill this form to send a message.</p>
                </div>
                <form id="contact-form" action="https://whizthemes.com/mail-php/other/mail.php">
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="contact-form-style mb-20">
                                <input name="con_name" placeholder="Full Name" type="text" />
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="contact-form-style mb-20">
                                <input name="con_email" placeholder="Email Address" type="email" />
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <div class="contact-form-style mb-20">
                                <input name="con_subject" placeholder="Subject" type="text" />
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <div class="contact-form-style">
                                <textarea name="con_message" placeholder="Message"></textarea>
                                <button class="submit" type="submit">SEND MESSAGE</button>
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
                    <h2>Contact Address</h2>
                </div>
                <div class="row">
                    <div class="col-lg-12 col-md-12">
                        <div class="contact-information mb-30">
                            <h4>Our Address</h4>
                            <p>Your address goes here</p>
                        </div>
                    </div>
                    <div class="col-lg-12 col-md-12">
                        <div class="contact-information contact-mrg mb-30">
                            <h4>Phone Number</h4>
                            <p>
                                <a href="tel:9822401941">9822401941</a>
                                <a href="tel:9824897492">9824897492</a>
                            </p>
                        </div>
                    </div>
                    <div class="col-lg-12 col-md-12">
                        <div class="contact-information contact-mrg mb-30">
                            <h4>Web Address</h4>
                            <p>
                                <a href="mailto:abchapagain@example.com">abchapagain@example.com</a>
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
                        <div id="map"></div>
                    </div>
                </div>
            </div>
            <!-- Google Map Start -->
        </div>
    </div>
</div>
<!-- Contact Area Start -->

<?php require_once('./useable/footer.php');

?>
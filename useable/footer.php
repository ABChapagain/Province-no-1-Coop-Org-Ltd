    </div>

    <!-- Footer style Start -->
    <footer class="footer-area pt-75 gray-bg-3">
        <div class="footer-top gray-bg-3 pb-35">
            <div class="container">
                <div class="row">
                    <div class="col-lg-3 col-md-6 col-sm-6">
                        <div class="footer-widget mb-40">
                            <div class="footer-title mb-25">
                                <h4>My Account</h4>
                            </div>
                            <div class="footer-content">
                                <ul>
                                    <li><a href="my-account.html">My Account</a></li>
                                    <li><a href="about-us.html">Order History</a></li>
                                    <li><a href="wishlist.html">WishList</a></li>
                                    <li><a href="#">Newsletter</a></li>
                                    <li><a href="about-us.html">Order History</a></li>
                                    <li><a href="#">International Orders</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 col-sm-6">
                        <div class="footer-widget mb-40">
                            <div class="footer-title mb-25">
                                <h4>Information</h4>
                            </div>
                            <div class="footer-content">
                                <ul>
                                    <li><a href="about-us.php">About Us</a></li>
                                    <li><a href="#">Delivery Information</a></li>
                                    <li><a href="#">Privacy Policy</a></li>
                                    <li><a href="#">Terms & Conditions</a></li>
                                    <li><a href="#">Customer Service</a></li>
                                    <li><a href="#">Return Policy</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 col-sm-6">
                        <div class="footer-widget mb-40">
                            <div class="footer-title mb-25">
                                <h4>Quick Links</h4>
                            </div>
                            <div class="footer-content">
                                <ul>
                                    <li><a href="#">Support Center</a></li>
                                    <li><a href="#">Term & Conditions</a></li>
                                    <li><a href="#">Shipping</a></li>
                                    <li><a href="#">Privacy Policy</a></li>
                                    <li><a href="#">Help</a></li>
                                    <li><a href="#">FAQS</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 col-sm-6">
                        <div class="footer-widget footer-widget-red footer-black-color mb-40">
                            <div class="footer-title mb-25">
                                <h4>Contact Us</h4>
                            </div>
                            <div class="footer-about">
                                <p>Your address goes here</p>
                                <div class="footer-contact mt-20">
                                    <ul>
                                        <li>0123456789</li>
                                        <li>0123456789</li>
                                    </ul>
                                </div>
                                <div class="footer-contact mt-20">
                                    <ul>
                                        <li>demo@example.com</li>
                                        <li>demo@example.com</li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="footer-bottom pb-25 pt-25 gray-bg-2">
            <div class="container">
                <div class="copyright">
                    <p class="copy-text text-center"> © 2022 <strong>Province no. 1 Wholesale Consumer
                            Specialized
                            Cooperative Union Ltd</strong>. All Rights Reserved.</p>
                    </p>
                </div>

            </div>
        </div>
        </div>
    </footer>
    <!-- Footer style End -->


    <!-- all js here -->
    <script src="assets/js/vendor/jquery-3.6.0.min.js"></script>
    <script src="assets/js/vendor/jquery-migrate-3.3.2.min.js"></script>
    <script src="assets/js/bootstrap.bundle.min.js"></script>
    <script src="assets/js/imagesloaded.pkgd.min.js"></script>
    <script src="assets/js/isotope.pkgd.min.js"></script>
    <script src="assets/js/ajax-mail.js"></script>
    <script src="assets/js/owl.carousel.min.js"></script>
    <script src="assets/js/plugins.js"></script>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBmGmeot5jcjdaJTvfCmQPfzeoG_pABeWo"></script>
    <script>
function init() {
    var mapOptions = {
        zoom: 11,
        scrollwheel: false,
        center: new google.maps.LatLng(26.6717, 87.668), // Damak
        styles: [{
                featureType: 'administrative',
                elementType: 'all',
                stylers: [{
                    visibility: 'on'
                }],
            },
            {
                featureType: 'administrative',
                elementType: 'geometry.fill',
                stylers: [{
                    visibility: 'on'
                }],
            },
            {
                featureType: 'administrative',
                elementType: 'geometry.stroke',
                stylers: [{
                    visibility: 'on'
                }, {
                    color: '#f53651'
                }],
            },
            {
                featureType: 'administrative',
                elementType: 'labels.text.fill',
                stylers: [{
                    color: '#444444'
                }, {
                    visibility: 'on'
                }],
            },
            {
                featureType: 'landscape',
                elementType: 'all',
                stylers: [{
                    color: '#f2f2f2'
                }, {
                    visibility: 'on'
                }],
            },
            {
                featureType: 'poi',
                elementType: 'all',
                stylers: [{
                    visibility: 'off'
                }],
            },
            {
                featureType: 'road',
                elementType: 'all',
                stylers: [{
                        saturation: -100
                    },
                    {
                        lightness: 45
                    },
                    {
                        visibility: 'off'
                    },
                ],
            },
            {
                featureType: 'road',
                elementType: 'geometry',
                stylers: [{
                    visibility: 'off'
                }],
            },
            {
                featureType: 'road',
                elementType: 'geometry.fill',
                stylers: [{
                    visibility: 'off'
                }],
            },
            {
                featureType: 'road',
                elementType: 'geometry.stroke',
                stylers: [{
                    visibility: 'off'
                }],
            },
            {
                featureType: 'road',
                elementType: 'labels',
                stylers: [{
                    visibility: 'off'
                }],
            },
            {
                featureType: 'road',
                elementType: 'labels.text',
                stylers: [{
                    visibility: 'off'
                }],
            },
            {
                featureType: 'road',
                elementType: 'labels.text.fill',
                stylers: [{
                    visibility: 'off'
                }],
            },
            {
                featureType: 'road',
                elementType: 'labels.text.stroke',
                stylers: [{
                    visibility: 'off'
                }],
            },
            {
                featureType: 'road',
                elementType: 'labels.icon',
                stylers: [{
                    visibility: 'off'
                }],
            },
            {
                featureType: 'road.highway',
                elementType: 'all',
                stylers: [{
                    visibility: 'simplified'
                }],
            },
            {
                featureType: 'road.highway',
                elementType: 'geometry',
                stylers: [{
                    visibility: 'off'
                }],
            },
            {
                featureType: 'road.highway',
                elementType: 'geometry.fill',
                stylers: [{
                    visibility: 'off'
                }],
            },
            {
                featureType: 'road.highway',
                elementType: 'geometry.stroke',
                stylers: [{
                    visibility: 'off'
                }],
            },
            {
                featureType: 'road.highway',
                elementType: 'labels',
                stylers: [{
                    visibility: 'off'
                }],
            },
            {
                featureType: 'road.highway',
                elementType: 'labels.text',
                stylers: [{
                    visibility: 'off'
                }],
            },
            {
                featureType: 'road.highway.controlled_access',
                elementType: 'all',
                stylers: [{
                    visibility: 'off'
                }],
            },
            {
                featureType: 'road.arterial',
                elementType: 'labels',
                stylers: [{
                    visibility: 'off'
                }],
            },
            {
                featureType: 'road.arterial',
                elementType: 'labels.icon',
                stylers: [{
                    visibility: 'off'
                }],
            },
            {
                featureType: 'road.local',
                elementType: 'all',
                stylers: [{
                    visibility: 'off'
                }],
            },
            {
                featureType: 'road.local',
                elementType: 'labels',
                stylers: [{
                    visibility: 'off'
                }],
            },
            {
                featureType: 'transit',
                elementType: 'all',
                stylers: [{
                    visibility: 'off'
                }],
            },
            {
                featureType: 'transit.line',
                elementType: 'all',
                stylers: [{
                    visibility: 'off'
                }],
            },
            {
                featureType: 'water',
                elementType: 'all',
                stylers: [{
                    color: '#f1ced3'
                }, {
                    visibility: 'on'
                }],
            },
        ],
    }
    var mapElement = document.getElementById('map')
    var map = new google.maps.Map(mapElement, mapOptions)
    var marker = new google.maps.Marker({
        position: new google.maps.LatLng(26.6717, 87.668),
        map: map,
        icon: 'assets/img/icon-img/map.png',
        animation: google.maps.Animation.BOUNCE,
        title: 'Snazzy!',
    })
}
google.maps.event.addDomListener(window, 'load', init)
    </script>
    <script src="assets/js/main.js"></script>
    </body>

    </html>
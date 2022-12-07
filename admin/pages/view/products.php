<?php
include "../../config/config.php";
require app . "/pages/includes/header.php";
require app . "/pages/includes/sidebar.php";

$id = $_GET['id'];
$sql = "select * from products where id='$id'";
$result = $conn->query($sql);
$rows = $result->fetch_assoc();

$sql = "select * from product_image where id='$id'";
$images = $conn->query($sql)->fetch_all(MYSQLI_ASSOC);
?>

<!-- Google Font: Source Sans Pro -->
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
<!-- Font Awesome -->
<link rel="stylesheet" href="<?php echo url ?>plugins/fontawesome-free/css/all.min.css">
<!-- SweetAlert2 -->
<link rel="stylesheet" href="<?php echo url ?>plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css">
<!-- Toastr -->
<link rel="stylesheet" href="<?php echo url ?>plugins/toastr/toastr.min.css">
<!-- Theme style -->
<link rel="stylesheet" href="<?php echo url ?>dist/css/adminlte.min.css">

<body>
    <div class="items">
        <div class="card card-primary">
            <div class="card-header">
                <h3 class="card-title">View Products</h3>
            </div>
            <!-- /.card-header -->
            <!-- form start -->
            <div class="card-body" style="height: fit-content;">
                <div class="title">
                    <span class="font-weight-bold">Product Name:</span>
                    <?php echo $rows['name'] ?>
                </div>
                <hr>

                <div class="category">
                    <span class="font-weight-bold">Category:</span>
                    <?php echo $rows['category'] ?>
                </div>
                <hr>

                <div class="description">
                    <span class="font-weight-bold">Description:</span>
                    <?php echo $rows['description'] ?>
                </div>
                <hr>

                <div class="description">
                    <span class="font-weight-bold">Images:</span>
                    <div class="image-preview">
                        <?php foreach ($images as $image) :
                        ?>
                            <div class="image">
                                <a href="<?php echo image . $image['name'] ?>" data-toggle="lightbox">
                                    <img src="<?php echo image . $image['name'] ?>" width=" 80px" class="img-fluid mb-2" alt="image" />
                                </a>
                            </div>
                        <?php endforeach; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <!-- jQuery -->
    <script src="<?php echo url ?>plugins/jquery/jquery.min.js"></script>
    <!-- Bootstrap 4 -->
    <script src="<?php echo url ?>plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- SweetAlert2 -->
    <script src="<?php echo url ?>plugins/sweetalert2/sweetalert2.min.js"></script>
    <!-- Toastr -->
    <script src="<?php echo url ?>plugins/toastr/toastr.min.js"></script>
    <!-- AdminLTE App -->
    <script src="<?php echo url ?>dist/js/adminlte.min.js"></script>
    <!-- AdminLTE for demo purp oses -->
    <!-- Page specific script -->
    <?php
    require app . "/pages/includes/js_links.php";
    ?>



    <?php
    if (isset($_SESSION['product_added'])) {
        if ($_SESSION['product_added'] == "successful") {
            echo "<script>success('success', 'product added successfully'); </script>";
        } else {
            echo "<script>success('error', 'unable to add product'); </script>";
        }
        unset($_SESSION['product_added']);
    }
    ?>

</body>
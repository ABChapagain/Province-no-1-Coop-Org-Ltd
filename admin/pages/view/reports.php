<?php
include "../../includes.php";


$id = $_GET['id'];
$sql = "select * from reports where id='$id'";
$result = $conn->query($sql);
$rows = $result->fetch_assoc();

$sql = "select * from reports_list where id='$id'";
$files = $conn->query($sql)->fetch_all(MYSQLI_ASSOC);
?>

<body>
    <div class="items">
        <div class="card card-primary">
            <div class="card-header">
                <h3 class="card-title">View Reports</h3>
            </div>
            <!-- /.card-header -->
            <!-- form start -->
            <div class="card-body" style="height: fit-content;">
                <div class="title">
                    <span class="font-weight-bold">Title:</span>
                    <?php echo $rows['title'] ?>
                </div>
                <hr>

                <div class="Description">
                    <span class="font-weight-bold">Description:</span>
                    <div class="card-body">
                        <textarea id="summernote" name="description" readonly> <?php echo $rows['description'] ?>
                        </textarea>
                    </div>
                </div>
                <hr>

                <div class="PublishedDate">
                    <span class="font-weight-bold">Published Date</span>
                    <div class="card-body">
                        <?php echo $rows['published_date'] ?>
                    </div>
                </div>
                <hr>

                <!-- <div class="PopupDate">
                    <span class="font-weight-bold">Popup date</span>
                    <div class="card-body">
                        <?php //echo $rows['start_popup'] . " to " . $rows['end_popup'] 
                        ?>
                    </div>
                </div>
                <hr> -->

                <div class="fiels">
                    <span class="font-weight-bold">Files:</span>
                    <div class="image-preview">
                        <?php foreach ($files as $file) :
                        ?>
                            <div class="position-relative">
                                <div class="image">
                                    <a href="<?php echo event_url . $image['name']
                                                ?>" data-toggle="lightbox">
                                        <img src="<?php echo event_url . $image['name']
                                                    ?>" width=" 80px" class="img-fluid mb-2" alt="image" />
                                        <?php if ($image['featured']) :
                                        ?>
                                            <div class="ribbon-wrapper">
                                                <div class="ribbon bg-info">
                                                    Featured
                                                </div>
                                            </div>
                                        <?php endif;
                                        ?>
                                    </a>
                                </div>
                            </div>
                        <?php endforeach;
                        ?>
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
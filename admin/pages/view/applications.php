<?php
include "../../includes.php";

if (!isset($_GET['id'])) {
?>
    <script>
        location.replace("<?php echo url . "applications.php" ?>")
    </script>
<?php
    exit;
}

$id = $_GET['id'];
$sql = "select * from job_application where id='$id'";
$result = $conn->query($sql);
if ($result->num_rows == 0) {
?>
    <script>
        location.replace("<?php echo url . "applications.php" ?>")
    </script>
<?php
    exit;
}
$rows = $result->fetch_assoc();

$vacancy_id = $rows['vacancy_id'];
$sql = "select title from vacancy where id='$vacancy_id'";
$position = $conn->query($sql)->fetch_assoc()['title'];


?>

<body>
    <div class="items">
        <div class="card card-primary">
            <div class="card-header">
                <h3 class="card-title">View Application</h3>
            </div>
            <!-- /.card-header -->
            <!-- form start -->
            <div class="card-body" style="height: fit-content;">
                <div class="name">
                    <span class="font-weight-bold">Name:</span>
                    <?php echo $rows['name'] ?>
                </div>
                <hr>

                <div class="email">
                    <span class="font-weight-bold">Email:</span>
                    <?php echo $rows['email'] ?>
                </div>
                <hr>

                <div class="phone">
                    <span class="font-weight-bold">Phone:</span>
                    <?php echo $rows['phone'] ?>
                </div>
                <hr>

                <div class="address">
                    <span class="font-weight-bold">Address:</span>
                    <?php echo $rows['address'] ?>
                </div>
                <hr>

                <div class="position">
                    <span class="font-weight-bold">Position:</span>
                    <?php echo $position ?>
                </div>
                <hr>

                <div class="cover-letter">
                    <span class="font-weight-bold">Cover Letter:</span>
                    <textarea name="" id="" cols="100%" rows="10"><?php echo $rows['cover_letter'] ?></textarea>

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

                <div class="files">

                    <span class="font-weight-bold">Files:</span>
                    <div class="file-collection d-flex" style="gap:1rem">

                        <div class="file">
                            <div class="link">
                                <div class="pdf">
                                    <div class="pdf_img">
                                        <a target="_blank" class="file" href="<?php echo resume_url . $rows['resume'] ?>">
                                            <img class="" src="<?php echo url ?>dist/img/pdf.png" alt="" height="50px">
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <div class="file_name">
                                <span> Resume </span>
                            </div>
                        </div>

                    </div>

                </div>
            </div>

        </div>
    </div>
    </div>

    <?php
    require app . "/pages/includes/js_links.php";
    ?>




</body>
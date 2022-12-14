<?php
include "../../includes.php";

if (!isset($_GET['id'])) {
?>
    <script>
        location.replace("<?php echo url . "notices.php" ?>")
    </script>
<?php
    exit;
}

$id = $_GET['id'];
$sql = "select * from notices where id='$id'";
$result = $conn->query($sql);
if ($result->num_rows == 0) {
?>
    <script>
        location.replace("<?php echo url . "notices.php" ?>")
    </script>
<?php
    exit;
}
$rows = $result->fetch_assoc();

$sql = "select * from notice_images where id='$id'";
$images = $conn->query($sql)->fetch_all(MYSQLI_ASSOC);
?>

<body>
    <div class="items">
        <div class="card card-primary">
            <div class="card-header">
                <h3 class="card-title">View Notices</h3>
            </div>
            <!-- /.card-header -->
            <!-- form start -->
            <div class="card-body" style="height: fit-content;">
                <div class="title">
                    <span class="font-weight-bold">Title:</span>
                    <?php echo $rows['title'] ?>
                </div>
                <hr>

                <div class="short_description">
                    <span class="font-weight-bold">Short Description:</span>
                    <?php echo $rows['short_description'] ?>
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

                <div class="PopupDate">
                    <span class="font-weight-bold">Popup date</span>
                    <div class="card-body">
                        <?php echo $rows['popup_start_date'] . " to " . $rows['popup_end_date'] ?>
                    </div>
                </div>
                <hr>

                <div class="images">
                    <span class="font-weight-bold">Images:</span>
                    <div class="image-preview">
                        <?php foreach ($images as $image) :
                        ?>
                            <div class="position-relative">
                                <div class="image">
                                    <a href="<?php echo notice_url . $image['image'] ?>" data-toggle="lightbox">
                                        <img src="<?php echo notice_url . $image['image'] ?>" width=" 80px" class="img-fluid mb-2" alt="image" />
                                    </a>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    </div>
                </div>

            </div>
        </div>
    </div>



    <?php
    require app . "/pages/includes/js_links.php";
    ?>




</body>
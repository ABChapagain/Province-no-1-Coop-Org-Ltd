<?php
include "../../includes.php";

if (!isset($_GET['id'])) {
?>
    <script>
        location.replace("<?php echo url . "reports.php" ?>")
    </script>
<?php
    exit;
}

$id = $_GET['id'];
$sql = "select * from reports where id='$id'";
$result = $conn->query($sql);
if ($result->num_rows == 0) {
?>
    <script>
        location.replace("<?php echo url . "reports.php" ?>")
    </script>
<?php
    exit;
}
$rows = $result->fetch_assoc();

?>


<body>
    <div class="items">
        <div class="card card-primary">
            <div class="card-header">
                <h3 class="card-title">Edit Reports</h3>
            </div>
            <!-- /.card-header -->
            <!-- form start -->
            <form method="POST" enctype="multipart/form-data" action="reports_post.php?id=<?php echo $id ?>">
                <div class="card-body">
                    <div class="form-group">
                        <label for="title">Title</label>
                        <input type="text" class="form-control" id="title" placeholder="Enter Title" name="title" value="<?php echo $rows['title'] ?>" required>
                    </div>

                    <div class="form-group">
                        <label for="short_description">Short Description</label>
                        <textarea class="form-control" id="short_description" rows="3" placeholder="Enter ..." name="short_description" required><?php echo $rows['short_description'] ?></textarea>
                    </div>

                    <div class="form-group">
                        <label for="summernote">Description</label>
                        <div class="card-body">
                            <textarea id="summernote" name="description" required> <?php echo $rows['description'] ?> </textarea>
                        </div>
                    </div>



                    <div class="form-group">
                        <label for="file">Files</label>
                        <div class="input-group">

                            <div class="custom-file">
                                <input type="file" class="custom-file-input" id="file" name="files">
                                <label class="custom-file-label" for="file"> Replace File</label>
                            </div>
                        </div>
                        <div class="img-description"> Allowed file types: pdf</div>

                    </div>

                    <div class="form-group">
                        <label>Report Popup Date:</label>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text">
                                    <i class="far fa-calendar-alt"></i>
                                </span>
                            </div>
                            <input type="text" class="form-control float-right" id="reservation" name="popupdate" required>
                        </div>
                        <!-- /.input group -->
                    </div>


                </div>
                <!-- /.card-body -->




                <div class="card-footer">
                    <button type="submit" id="submit" name="submit" class="btn btn-primary">Update</button>
                </div>
            </form>
        </div>
        <br>

        <div class="files">
            <span class="font-weight-bold">File:</span>

            <div class="file-collection">
                <div class="file">
                    <div class="link">
                        <div class="pdf">
                            <div class="pdf_img">
                                <a target="_blank" class="file" href="<?php echo report_url . $rows['file_name'] ?>">
                                    <img class="" src="<?php echo url ?>dist/img/pdf.png" alt="" height="50px">
                                </a>
                            </div>

                        </div>
                    </div>
                    <div class="file_name">
                        <span><?php echo $rows['file_name'] ?></span>
                    </div>

                </div>
            </div>
        </div>
    </div>


    <?php
    require app . "/pages/includes/js_links.php";
    ?>

    <script>
        changeDatePickerData("<?php echo $rows['start_popup'] ?>", "<?php echo $rows['end_popup'] ?>")
    </script>

    <?php
    if (isset($_SESSION['report_updated'])) {
        if ($_SESSION['report_updated'] == "successful") {
            echo "<script>success('success', 'report updated successfully'); </script>";
        } else {
            echo "<script>success('error', 'unable to update report'); </script>";
        }
        unset($_SESSION['report_updated']);
    }

    if (isset($_SESSION['validation'])) {
        if ($_SESSION['validation'] == "error")
            echo "<script>success('error', 'file validation error'); </script>";
        unset($_SESSION['validation']);
    }
    ?>

</body>
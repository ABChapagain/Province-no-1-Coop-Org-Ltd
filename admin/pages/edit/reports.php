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
                <h3 class="card-title">Edit Products</h3>
            </div>
            <!-- /.card-header -->
            <!-- form start -->
            <form method="POST" enctype="multipart/form-data" action="reports_post.php?id=<?php echo $id ?>">
                <div class="card-body">
                    <div class="form-group">
                        <label for="name">Title</label>
                        <input type="text" class="form-control" id="name" placeholder="Enter Product name" name="title" value="<?php echo $rows['title'] ?>">
                    </div>

                     <div class="form-group">
                        <label for="short_description">Short Description</label>
                        <textarea class="form-control" id="short_description" rows="3" placeholder="Enter ..." name="short_description"><?php echo $rows['short_description'] ?></textarea>
                    </div>
                    
                    <div class="form-group">
                        <label for="summernote">Description</label>
                        <div class="card-body">
                            <textarea id="summernote" name="description"><?php echo $rows['description'] ?></textarea>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="files">Files</label>
                        <div class="input-group">
                            <div class="custom-file">
                                <input type="file" class="custom-file-input" id="files" name="files[]" multiple>
                                <label class="custom-file-label" for="files"> add more files </label>
                            </div>
                        </div>
                    </div>


                    <div class="form-group">
                        <label>Event Popup Date:</label>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text">
                                    <i class="far fa-calendar-alt"></i>
                                </span>
                            </div>
                            <input type="text" class="form-control float-right" id="reservation" name="popupdate">
                        </div>
                    </div>

                </div>
        </div>
        <!-- /.card-body -->
        <div class="card-footer">
            <button type="submit" id="submit" name="submit" class="btn btn-primary">Update</button>
        </div>
        </form>
    </div>

    <div class="files">
        <span class="font-weight-bold">Files:</span>
        <?php foreach ($files as $file) :
        ?>
            <div class="position-relative">
                <div class="file">
                    <a target="_blank" class="file" href="<?php echo report_url . $file['name'] ?>">
                        <i class="fas fa-file fa-3x"></i>
                        <span><?php echo $file['name'] ?></span>
                    </a>
                </div>
            </div>
        <?php endforeach;
        ?>
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
    ?>

</body>
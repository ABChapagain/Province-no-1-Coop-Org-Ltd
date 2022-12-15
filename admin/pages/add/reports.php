<?php

include "../../includes.php";


$sql = "select * from category";
$category = $conn->query($sql)->fetch_all(MYSQLI_ASSOC);
?>


<body>
    <div class="items">
        <div class="card card-primary">
            <div class="card-header">
                <h3 class="card-title">Add Reports</h3>
            </div>
            <!-- /.card-header -->
            <!-- form start -->
            <form method="POST" enctype="multipart/form-data" action="reports_post.php">
                <div class="card-body">
                    <div class="form-group">
                        <label for="title">Title</label>
                        <input type="text" class="form-control" id="title" placeholder="Enter Title" name="title">
                    </div>

 <div class="form-group">
                        <label for="short_description">Short Description</label>
                        <textarea class="form-control" id="short_description" rows="3" placeholder="Enter ..." name="short_description"><?php echo $rows['short_description'] ?></textarea>
                    </div>

                    <div class="form-group">
                        <label for="summernote">Description</label>
                        <div class="card-body">
                            <textarea id="summernote" name="description">       </textarea>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="files">Files</label>
                        <div class="input-group">
                            <div class="custom-file">
                                <input type="file" class="custom-file-input" id="files" name="files[]" multiple>
                                <label class="custom-file-label" for="files"> Select Files </label>
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
                    <!-- /.input group -->

                </div>
                <!-- /.card-body -->
                <div class="card-footer">
                    <button type="submit" id="submit" name="submit" class="btn btn-primary">Submit</button>
                </div>
            </form>
        </div>
    </div>

    <?php
    require app . "/pages/includes/js_links.php";
    ?>

    <?php
    if (isset($_SESSION['reports_added'])) {
        if ($_SESSION['reports_added'] == "successful") {
            echo "<script>success('success', 'report added successfully'); </script>";
        } elseif ($_SESSION['reports_added'] == "exists") {
            echo "<script> success('warning','product already exists') </script>";
        } else {
            echo "<script>success('error', 'unable to add report'); </script>";
        }
        unset($_SESSION['reports_added']);
    }
    ?>

</body>
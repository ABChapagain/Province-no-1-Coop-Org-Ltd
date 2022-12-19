<?php
include "../../includes.php";


$id = $_GET['id'];
$sql = "select * from reports where id='$id'";
$result = $conn->query($sql);
$rows = $result->fetch_assoc();

$sql = "select * from reports_list where report_id='$id'";
$files = $conn->query($sql)->fetch_all(MYSQLI_ASSOC);
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
                        <input type="text" class="form-control" id="title" placeholder="Enter Title" name="title" value="<?php echo $rows['title'] ?>">
                    </div>

                    <div class="form-group">
                        <label for="short_description">Short Description</label>
                        <textarea class="form-control" id="short_description" rows="3" placeholder="Enter ..." name="short_description"><?php echo $rows['short_description'] ?></textarea>
                    </div>

                    <div class="form-group">
                        <label for="summernote">Description</label>
                        <div class="card-body">
                            <textarea id="summernote" name="description"> <?php echo $rows['description'] ?> </textarea>
                        </div>
                    </div>



                    <div class="form-group">
                        <label for="file">Files</label>
                        <div class="input-group">

                            <div class="custom-file">
                                <input type="file" class="custom-file-input" id="file" name="files[]" multiple>
                                <label class="custom-file-label" for="file"> Add new files</label>
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
                        <!-- /.input group -->
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
                <div class="file-collection">
                    <div class="del_button hide_del_button">
                        <button class="btn btn-danger">delete</button>
                    </div>
                    <div class="file">
                        <div class="link">
                            <div class="pdf">
                                <div class="pdf_img">
                                    <a target="_blank" class="file" href="<?php echo report_url . $file['name'] ?>">
                                        <img class="" src="<?php echo url ?>dist/img/pdf.png" alt="" height="50px">
                                    </a>
                                </div>
                                <div class="overlay">

                                    <button style="width:100%; border-radius:50%" class="btn btn-danger" onclick="deleteReportFile( <?php echo $id ?>,'<?php echo $file['name'] ?>')"><i class="fas fa-trash"></i></button>
                                </div>
                            </div>
                        </div>
                        <div class="file_name">
                            <span><?php echo $file['name'] ?></span>
                        </div>

                    </div>
                </div>

            <?php endforeach;
            ?>
        </div>
    </div>


    <?php
    require app . "/pages/includes/js_links.php";
    ?>

    <script>
        changeDatePickerData("<?php echo $rows['start_popup'] ?>", "<?php echo $rows['end_popup'] ?>")
    </script>

    <?php
    if (isset($_SESSION['event_updated'])) {
        if ($_SESSION['event_updated'] == "successful") {
            echo "<script>success('success', 'event updated successfully'); </script>";
        } else {
            echo "<script>success('error', 'unable to update event'); </script>";
        }
        unset($_SESSION['event_updated']);
    }
    ?>

</body>
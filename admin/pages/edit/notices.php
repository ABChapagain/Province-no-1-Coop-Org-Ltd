<?php
include "../../includes.php";


$id = $_GET['id'];
$sql = "select * from notices where id='$id'";
$result = $conn->query($sql);
$rows = $result->fetch_assoc();

$sql = "select * from notice_images where id='$id'";
$images = $conn->query($sql)->fetch_all(MYSQLI_ASSOC);
?>


<body>
    <div class="items">
        <div class="card card-primary">
            <div class="card-header">
                <h3 class="card-title">Edit Notice</h3>
            </div>
            <!-- /.card-header -->
            <!-- form start -->
            <form method="POST" enctype="multipart/form-data" action="notices_post.php?id=<?php echo $id ?>">
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

                    <!-- <div class="form-group">
                        <label for="image">Featured Image</label>
                        <div class="input-group">
                            <div class="custom-file">
                                <input type="file" class="custom-file-input" id="featured_image" name="featured_img">
                                <label class="custom-file-label" for="featured_image"> Replace image</label>
                            </div>
                        </div>
                    </div> -->

                    <div class="form-group">
                        <label for="image">Gallery</label>
                        <div class="input-group">

                            <div class="custom-file">
                                <input type="file" class="custom-file-input" id="image" name="img[]" multiple>
                                <label class="custom-file-label" for="image"> Add new images</label>
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

        <div class="image-preview mt-3">
            <?php foreach ($images as $image) :
            ?>
                <div class="position-relative">
                    <div class="image">
                        <a href="<?php echo notice_url . $image['image'] ?>" data-toggle="lightbox" data-title="<button class='btn btn-danger' onclick='deleteNoticeImage(<?php echo $image['id'] ?>,`<?php echo $image['image'] ?>`)'>Delete</button>">
                            <img src="<?php echo notice_url . $image['image'] ?>" width=" 80px" class="img-fluid mb-2" alt="image" />
                        </a>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>


    <?php
    require app . "/pages/includes/js_links.php";
    ?>

    <script>
        changeDatePickerData("<?php echo $rows['popup_start_date'] ?>", "<?php echo $rows['popup_end_date'] ?>")
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
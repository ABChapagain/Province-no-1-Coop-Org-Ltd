<?php

include "../../includes.php";


?>


<body>
    <div class="items">
        <div class="card card-primary">
            <div class="card-header">
                <h3 class="card-title">Add Event</h3>
            </div>
            <!-- /.card-header -->
            <!-- form start -->
            <form method="POST" enctype="multipart/form-data" action="events_post.php">
                <div class="card-body">
                    <div class="form-group">
                        <label for="title">Title</label>
                        <input type="text" class="form-control" id="title" placeholder="Enter Title" name="title">
                    </div>

                    <div class="form-group">
                        <label for="description">Short Description</label>
                        <textarea class="form-control" id="short_description" rows="3" placeholder="Enter ..." name="short_description"></textarea>
                    </div>

                    <div class="form-group">
                        <label for="summernote">Description</label>
                        <div class="card-body">
                            <textarea id="summernote" name="description">       </textarea>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="image">Featured Image</label>
                        <div class="input-group">
                            <div class="custom-file">
                                <input type="file" class="custom-file-input" id="featured_image" name="featured_img">
                                <label class="custom-file-label" for="featured_image"> Select image</label>
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="image">Gallery</label>
                        <div class="input-group">

                            <div class="custom-file">
                                <input type="file" class="custom-file-input" id="image" name="img[]" multiple>
                                <label class="custom-file-label" for="image"> Select images</label>
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
                    <button type="submit" id="submit" name="submit" class="btn btn-primary">Submit</button>
                </div>
            </form>
        </div>
    </div>

    <?php
    require app . "/pages/includes/js_links.php";
    ?>

    <?php
    if (isset($_SESSION['validation'])) {
        if ($_SESSION['validation'] == "error")
            echo "<script>success('error', 'image validation error'); </script>";
        elseif ($_SESSION['validation'] == "warning")
            echo "<script>success('warning', 'gallary validation error'); </script>";
    }
    if (isset($_SESSION['events_added'])) {
        if ($_SESSION['events_added'] == "successful") {
            echo "<script>success('success', 'events added successfully'); </script>";
        } elseif ($_SESSION['events_added'] == "exists") {
            echo "<script> success('warning','product already exists') </script>";
        } else {
            echo "<script>success('error', 'unable to add events'); </script>";
        }
        unset($_SESSION['events_added']);
    }
    ?>

</body>
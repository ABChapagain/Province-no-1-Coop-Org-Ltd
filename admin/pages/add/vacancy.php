<?php

include "../../includes.php";

?>


<body>
    <div class="items">
        <div class="card card-primary">
            <div class="card-header">
                <h3 class="card-title">Add Vacancy</h3>
            </div>
            <!-- /.card-header -->
            <!-- form start -->
            <form method="POST" enctype="multipart/form-data" action="vacancy_post.php">
                <div class="card-body">
                    <div class="form-group">
                        <label for="title">Title</label>
                        <input type="text" class="form-control" id="title" placeholder="Enter Title" name="title" required>
                    </div>

                    <div class="form-group">
                        <label for="vacant">Vacant Seats</label>
                        <input type="text" class="form-control" id="vacant" placeholder="Enter the number of vacant seats" name="vacant" required>
                    </div>

                    <div class="form-group">
                        <label for="description">Short Description</label>
                        <textarea class="form-control" id="short_description" rows="3" placeholder="Enter ..." name="short_description" required></textarea>
                    </div>

                    <div class="form-group">
                        <label for="summernote">Description</label>
                        <div class="card-body">
                            <textarea id="summernote" name="description" required>       </textarea>
                        </div>
                    </div>



                    <!-- <div class="form-group">
                        <label for="image">Featured Image</label>
                        <div class="input-group">
                            <div class="custom-file">
                                <input type="file" class="custom-file-input" id="featured_image" name="featured_img" required>
                                <label class="custom-file-label" for="featured_image"> Select image</label>
                            </div>
                        </div>
                    </div> -->

                    <!-- <div class="form-group">
                        <label for="image">Gallery</label>
                        <div class="input-group">

                            <div class="custom-file">
                                <input type="file" class="custom-file-input" id="image" name="img[]" multiple required>
                                <label class="custom-file-label" for="image"> Select images</label>
                            </div>
                        </div>
                    </div> -->

                    <div class="form-group">
                        <label>Registration Date:</label>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text">
                                    <i class="far fa-calendar-alt"></i>
                                </span>
                            </div>
                            <input type="text" class="form-control float-right" id="reservation" name="registration" required>
                        </div>
                    </div>

                    <div class="form-group">
                        <label>Popup Date Date:</label>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text">
                                    <i class="far fa-calendar-alt"></i>
                                </span>
                            </div>
                            <input type="text" id="vacancy-popup" name="popup" class="form-control float-right" />
                        </div>
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
    if (isset($_SESSION['vacancy_added'])) {
        if ($_SESSION['vacancy_added'] == "successful") {
            echo "<script>success('success', 'vacancy added successfully'); </script>";
        } elseif ($_SESSION['vacancy_added'] == "exists") {
            echo "<script> success('warning','product already exists') </script>";
        } else {
            echo "<script>success('error', 'unable to add vacancy'); </script>";
        }
        unset($_SESSION['vacancy_added']);
    }
    ?>

</body>
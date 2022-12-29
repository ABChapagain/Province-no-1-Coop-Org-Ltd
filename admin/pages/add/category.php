<?php

include "../../includes.php";

?>


<body>
    <div class="items">
        <div class="card card-primary">
            <div class="card-header">
                <h3 class="card-title">Add Category</h3>
            </div>
            <!-- /.card-header -->
            <!-- form start -->
            <form method="POST" enctype="multipart/form-data" action="category_post.php">
                <div class="card-body">
                    <div class="form-group">
                        <label for="name">Name</label>
                        <input type="text" class="form-control" id="name" placeholder="Enter Product name" name="name" required>
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
    if (isset($_SESSION['category_added'])) {
        if ($_SESSION['category_added'] == "successful") {
            echo "<script>success('success', 'category added successfully'); </script>";
        } elseif ($_SESSION['category_added'] == "exists") {
            echo "<script> success('warning','category already exists') </script>";
        } else {
            echo "<script>success('error', 'unable to add category'); </script>";
        }
        unset($_SESSION['category_added']);
    }
    ?>

</body>
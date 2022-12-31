<?php

include "../../includes.php";

?>


<body>
    <div class="items">
        <div class="card card-primary">
            <div class="card-header">
                <h3 class="card-title">Add Department</h3>
            </div>
            <!-- /.card-header -->
            <!-- form start -->
            <form method="POST" enctype="multipart/form-data" action="departments_post.php">
                <div class="card-body">
                    <div class="form-group">
                        <label for="name">Name</label>
                        <input type="text" class="form-control" id="name" placeholder="Enter Department name" name="name" required>
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
    if (isset($_SESSION['department_added'])) {
        if ($_SESSION['department_added'] == "successful") {
            echo "<script>success('success', 'department added successfully'); </script>";
        } elseif ($_SESSION['department_added'] == "exists") {
            echo "<script> success('warning','department already exists') </script>";
        } else {
            echo "<script>success('error', 'unable to add department'); </script>";
        }
        unset($_SESSION['department_added']);
    }
    ?>

</body>
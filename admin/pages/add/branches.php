<?php

include "../../includes.php";

?>


<body>
    <div class="items">
        <div class="card card-primary">
            <div class="card-header">
                <h3 class="card-title">Add Branch</h3>
            </div>
            <!-- /.card-header -->
            <!-- form start -->
            <form method="POST" enctype="multipart/form-data" action="branches_post.php">
                <div class="card-body">
                    <div class="form-group">
                        <label for="name">Name</label>
                        <input type="text" class="form-control" id="name" placeholder="Enter Branch name" name="name">
                    </div>

                    <div class="form-group">
                        <label for="address">Address</label>
                        <input type="text" class="form-control" id="address" placeholder="Enter address" name="address">
                    </div>

                    <div class="form-group">
                        <label for="phone">Phone</label>
                        <input type="tel" class="form-control" id="phone" placeholder="Enter Telephone Number" name="phone">
                    </div>

                     <div class="form-group">
                        <label for="email">Email</label>
                        <input type="tel" class="form-control" id="email" placeholder="Enter Email" name="email">
                    </div>

                    <div class="form-group">
                        <label for="coord">Coordinates</label>
                        <input type="text" class="form-control" id="coord" placeholder="latitude,longitude" name="coord">
                    </div>
                </div>

                <div class="card-footer">
                    <button type="submit" id="submit" name="submit" class="btn btn-primary">Submit</button>
                </div>
            </form>
        </div>
    </div>

    <?php
    require app . "/pages/includes/js_links.php";

    if (isset($_SESSION['branches_added'])) {
        if ($_SESSION['branches_added'] == "successful") {
            echo "<script>success('success', 'branch added successfully'); </script>";
        } elseif ($_SESSION['branches_added'] == "exists") {
            echo "<script> success('warning','branch already exists') </script>";
        } else {
            echo "<script>success('error', 'unable to add branch'); </script>";
        }
        unset($_SESSION['branches_added']);
    }
    ?>

</body>
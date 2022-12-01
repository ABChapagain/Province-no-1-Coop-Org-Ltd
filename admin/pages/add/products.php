<?php
session_start();

include "../../config/config.php";
require app . "/pages/includes/header.php";
require app . "/pages/includes/sidebar.php";
?>


<body>
    <div class="items">
        <div class="card card-primary">
            <div class="card-header">
                <h3 class="card-title">Add Products</h3>
            </div>
            <!-- /.card-header -->
            <!-- form start -->
            <form method="POST" enctype="multipart/form-data" action="product_post.php">
                <div class="card-body">
                    <div class="form-group">
                        <label for="name">Name</label>
                        <input type="text" class="form-control" id="name" placeholder="Enter Product name" name="name">
                    </div>
                    <div class="form-group">
                        <label for="description">Description</label>
                        <textarea class="form-control" id="description" rows="3" placeholder="Enter ..." name="description"></textarea>
                    </div>
                    <div class="form-group">
                        <label for="image">Image</label>
                        <div class="input-group">
                            <div class="custom-file">
                                <input type="file" class="custom-file-input" id="image" name="img">
                                <label class="custom-file-label" for="image">Choose file</label>
                            </div>
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

    <script>
        var Toast = Swal.mixin({
            toast: true,
            position: 'top-end',
            showConfirmButton: false,
            timer: 3000
        });

        const success = function(status, message) {
            Toast.fire({
                icon: status,
                title: message
            })
        }
    </script>


    <?php
    if (isset($_SESSION['product_added'])) {
        if ($_SESSION['product_added'] == "successful") {
            echo "<script>success('success', 'product added successfully'); </script>";
        } else {
            echo "<script>success('error', 'unable to add product'); </script>";
        }
        unset($_SESSION['product_added']);
    }
    ?>

</body>
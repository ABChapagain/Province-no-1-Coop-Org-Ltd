<?php
include "../../config/config.php";
require app . "/pages/includes/header.php";
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
                <button type="button" class="btn btn-success swalDefaultSuccess">
                    Launch Success Toast
                </button>
            </form>
        </div>
    </div>


    <?php

    // if (isset($_POST['submit'])) {
    //     $img = $_FILES['img'];
    //     $name = $img['name'];
    //     $tempName = $img['tmp_name'];
    //     $name = uniqid();
    //     $fileDestination = "/$name.jpg";


    //     $product = $_POST['name'];
    //     echo $product;
    //     echo $fileDestination;

    //     move_uploaded_file($tempName, "../../uploads/products" . $fileDestination);
    //     // $sql = "insert into n_b_d_ads(`a_title`, `a_date`, `a_image`) values ('$title','$date','$fileDestination')";
    //     // $res = mysqli_query($conn, $sql);
    //     // if ($res) {
    //     //     echo "<script> location.replace('../ads.php') </script>";
    //     // } else {
    //     //     echo "sorry could not add ads details to database";
    //     // }
    // }

    // if (isset($_POST['cancel'])) {
    //     echo "<script> location.replace('../ads.php') </script>";
    // }


    require app . "/pages/includes/js_links.php";
    ?>
    <script>
        $('.swalDefaultSuccess').click(function() {
            Toast.fire({
                icon: 'success',
                title: 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr.'
            })
        });
    </script>
</body>
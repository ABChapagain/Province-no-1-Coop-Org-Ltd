<?php
include "../../config/config.php";
require app . "/pages/includes/header.php";
require app . "/pages/includes/sidebar.php";

$id = $_GET['id'];
$sql = "select * from products where id='$id'";
$result = $conn->query($sql);
$rows = $result->fetch_assoc();

$sql = "select * from product_image where id='$id'";
$images = $conn->query($sql)->fetch_all(MYSQLI_ASSOC);

$sql = "select * from category";
$category = $conn->query($sql)->fetch_all(MYSQLI_ASSOC);
?>


<body>
    <div class="items">
        <div class="card card-primary">
            <div class="card-header">
                <h3 class="card-title">Edit Products</h3>
            </div>
            <!-- /.card-header -->
            <!-- form start -->
            <form method="POST" enctype="multipart/form-data" action="product_post.php?id=<?php echo $id ?>">
                <div class="card-body">
                    <div class="form-group">
                        <label for="name">Name</label>
                        <input type="text" class="form-control" id="name" placeholder="Enter Product name" name="name" value="<?php echo $rows['name'] ?>">
                    </div>
                    <div class="form-group">
                        <label for="exampleFormControlSelect1">Category</label>
                        <select class="form-control" name="category">
                            <?php $selected = $rows['category'] ?>
                            <option value="<?php echo $selected ?>" selected><?php echo $selected ?></option>
                            <?php
                            foreach ($category as $cat) :
                                if ($selected != $cat['name']) :
                            ?>
                                    <option value="<?php echo $cat['name'] ?>"><?php echo $cat['name'] ?></option>
                            <?php
                                endif;
                            endforeach;
                            ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="description">Description</label>
                        <textarea class="form-control" id="description" rows="3" placeholder="Enter ..." name="description"><?php echo $rows['description'] ?></textarea>
                    </div>
                    <div class="form-group">
                        <label for="image">Image</label>
                        <div class="input-group">
                            <div class="custom-file">
                                <input type="file" class="custom-file-input" id="image" name="img[]" multiple>
                                <label class="custom-file-label" for="image">add image</label>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /.card-body -->


                <div class="card-footer">
                    <button type="submit" id="submit" name="submit" class="btn btn-primary">Update</button>
                </div>
            </form>

        </div>
    </div>

    <div class="image-preview">
        <?php foreach ($images as $image) :
        ?>
            <div class="image">
                <a href="<?php echo url . $image['name'] ?>" data-toggle="lightbox" data-title="<button class='btn btn-danger' onclick='deleteImage(<?php echo $image['id'] ?>,`<?php echo $image['name'] ?>`)'>Delete</button>">

                    <img src="<?php echo url . $image['name'] ?>" width=" 80px" class="img-fluid mb-2" alt="image" />
                </a>
            </div>
        <?php endforeach; ?>
    </div>
    <?php
    require app . "/pages/includes/js_links.php";
    ?>


    <?php
    if (isset($_SESSION['product_updated'])) {
        echo "<script>swalfire();</script>";
        if ($_SESSION['product_updated'] == "successful") {
            echo "<script>success('success', 'product updated successfully'); </script>";
        } else {
            echo "<script>success('error', 'unable to update product'); </script>";
        }
        unset($_SESSION['product_updated']);
    }
    ?>

</body>
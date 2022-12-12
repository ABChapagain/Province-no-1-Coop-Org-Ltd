<?php
include "../../includes.php";


$id = $_GET['id'];
$sql = "select * from products where id='$id'";
$result = $conn->query($sql);
$rows = $result->fetch_assoc();

$sql = "select * from product_image where id='$id'";
$images = $conn->query($sql)->fetch_all(MYSQLI_ASSOC);

$sql = "select * from category";
$category = $conn->query($sql)->fetch_all(MYSQLI_ASSOC);

$sql = "select * from product_tags where id='$id'";
$tags = $conn->query($sql)->fetch_all(MYSQLI_ASSOC);

$tag = "";
foreach ($tags as $t) {
    $tag = $tag . $t['tag'] . ",";
}
$tag = rtrim($tag, ",");
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
                        <label for="short_description">Short Description</label>
                        <textarea class="form-control" id="short_description" rows="3" placeholder="Enter ..." name="short_description"><?php echo $rows['short_description'] ?></textarea>
                    </div>

                    <div class="form-group">
                        <label for="summernote">Description</label>
                        <div class="card-body">
                            <textarea id="summernote" name="description"><?php echo $rows['description'] ?></textarea>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="tags">Tags</label>
                        <input type="text" class="form-control" id="tags" placeholder="seperate tags with comma ','" name="tags" value="<?php echo $tag ?>">
                    </div>

                    <div class="form-group">
                        <label for="image">Featured Image</label>
                        <div class="input-group">
                            <div class="custom-file">
                                <input type="file" class="custom-file-input" id="featured_image" name="featured_img">
                                <label class="custom-file-label" for="featured_image"> Replace featured image</label>
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="image">Gallery</label>
                        <div class="input-group">

                            <div class="custom-file">
                                <input type="file" class="custom-file-input" id="image" name="img[]" multiple>
                                <label class="custom-file-label" for="image"> Add images</label>
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
        <div class="image-preview mt-3">
            <?php foreach ($images as $image) :
            ?>
                <div class="position-relative">
                    <div class="image">

                        <?php if ($image['featured']) :  ?>
                            <a href="<?php echo product_url . $image['name'] ?>" data-toggle="lightbox" data-title="">
                                <img src="<?php echo product_url . $image['name'] ?>" width=" 80px" class="img-fluid mb-2" alt="image" />
                                <div class="ribbon-wrapper">
                                    <div class="ribbon bg-info">
                                        Featured
                                    </div>
                                </div>

                            <?php else : ?>
                                <a href="<?php echo product_url . $image['name'] ?>" data-toggle="lightbox" data-title="<button class='btn btn-danger' onclick='deleteProductImage(<?php echo $image['id'] ?>,`<?php echo $image['name'] ?>`)'>Delete</button>">
                                    <img src="<?php echo product_url . $image['name'] ?>" width=" 80px" class="img-fluid mb-2" alt="image" />
                                <?php endif; ?>
                                </a>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>


    <?php
    require app . "/pages/includes/js_links.php";
    ?>


    <?php
    if (isset($_SESSION['product_updated'])) {
        if ($_SESSION['product_updated'] == "successful") {
            echo "<script>success('success', 'product updated successfully'); </script>";
        } else {
            echo "<script>success('error', 'unable to update product'); </script>";
        }
        unset($_SESSION['product_updated']);
    }
    ?>

</body>
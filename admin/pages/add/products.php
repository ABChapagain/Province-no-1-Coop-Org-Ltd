<?php


include "../../includes.php";


$sql = "select * from category";
$category = $conn->query($sql)->fetch_all(MYSQLI_ASSOC);
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
                        <label for="exampleFormControlSelect1">Category</label>
                        <select class="form-control" name="category">
                            <option value="" disabled selected>select</option>
                            <?php
                            foreach ($category as $cat) :
                            ?>
                                <option value="<?php echo $cat['name'] ?>"><?php echo $cat['name'] ?></option>
                            <?php
                            endforeach
                            ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="description">Short Description</label>
                        <textarea class="form-control" id="short_description" rows="3" placeholder="Enter ..." name="short_description"></textarea>
                    </div>


                    <div class="form-group">
                        <label for="summernote">Description</label>
                        <div class="card-body">
                            <textarea id="summernote" name="description"></textarea>
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
                                <label class="custom-file-label" for="image"> Select image</label>
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="tags">Tags</label>
                        <input type="text" class="form-control" id="tags" placeholder="seperate tags with comma ','" name="tags">
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
    if (isset($_SESSION['product_added'])) {
        if ($_SESSION['product_added'] == "successful") {
            echo "<script>success('success', 'product added successfully'); </script>";
        } elseif ($_SESSION['product_added'] == "exists") {
            echo "<script> success('warning','product already exists') </script>";
        } else {
            echo "<script>success('error', 'unable to add product'); </script>";
        }
        unset($_SESSION['product_added']);
    }
    ?>

</body>
<?php
include "../../includes.php";


$id = $_GET['id'];
$sql = "select * from category where id='$id'";
$result = $conn->query($sql);
$rows = $result->fetch_assoc();
?>


<body>
    <div class="items">
        <div class="card card-primary">
            <div class="card-header">
                <h3 class="card-title">Edit Category</h3>
            </div>
            <!-- /.card-header -->
            <!-- form start -->
            <form method="POST" enctype="multipart/form-data" action="category_post.php?id=<?php echo $id ?>">
                <div class="card-body">
                    <div class="form-group">
                        <label for="name">Name</label>
                        <input type="text" class="form-control" id="name" placeholder="Enter Product name" name="name" value="<?php echo $rows['name'] ?>" required>
                    </div>
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                    <button type="submit" id="submit" name="submit" class="btn btn-primary">Update</button>
                </div>
            </form>

        </div>
    </div>

    <?php
    require app . "/pages/includes/js_links.php";
    ?>


    <?php
    if (isset($_SESSION['category_updated'])) {
        if ($_SESSION['category_updated'] == "successful") {
            echo "<script>success('success', 'category updated successfully'); </script>";
        } else {
            echo "<script>success('error', 'unable to update category'); </script>";
        }
        unset($_SESSION['category_updated']);
    }
    ?>

</body>
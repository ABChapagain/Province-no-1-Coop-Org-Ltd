<?php
include "../../includes.php";


$id = $_GET['id'];
$sql = "select * from branches where id='$id'";
$result = $conn->query($sql);
$rows = $result->fetch_assoc();
?>


<body>
    <div class="items">
        <div class="card card-primary">
            <div class="card-header">
                <h3 class="card-title">Edit Branch</h3>
            </div>
            <!-- /.card-header -->
            <!-- form start -->
            <form method="POST" enctype="multipart/form-data" action="branches_post.php?id=<?php echo $id ?>">
                <div class="card-body">
                    <div class="form-group">
                        <label for="name">Name</label>
                        <input type="text" class="form-control" id="name" placeholder="Enter Product name" name="name" value="<?php echo $rows['name'] ?>" required>
                    </div>

                    <div class="form-group">
                        <label for="address">Address</label>
                        <input type="text" class="form-control" id="address" placeholder="Enter address" name="address" value="<?php echo $rows['address'] ?>" required>
                    </div>

                    <div class="form-group">
                        <label for="phone">Phone</label>
                        <input type="tel" class="form-control" id="phone" placeholder="Enter Telephone Number" name="phone" value="<?php echo $rows['phone'] ?>" required>
                    </div>

                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="tel" class="form-control" id="email" placeholder="Enter Email" name="email" value="<?php echo $rows['email'] ?>" required>
                    </div>

                    <div class="form-group">
                        <label for="coord">Coordinates</label>
                        <input type="text" class="form-control" id="coord" placeholder="latitude,longitude" name="coords" value="<?php echo $rows['coords'] ?>" required>
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
    if (isset($_SESSION['branch_updated'])) {
        if ($_SESSION['branch_updated'] == "successful") {
            echo "<script>success('success', 'branch updated successfully'); </script>";
        } else {
            echo "<script>success('error', 'unable to update branch'); </script>";
        }
        unset($_SESSION['branch_updated']);
    }
    ?>

</body>
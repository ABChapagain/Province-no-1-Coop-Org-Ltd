<?php
include "../../includes.php";

if (!isset($_GET['id'])) {
?>
    <script>
        location.replace("<?php echo url . "departments.php" ?>")
    </script>
<?php
    exit;
}

$id = $_GET['id'];
$sql = "select * from department where id='$id'";
$result = $conn->query($sql);

if ($result->num_rows == 0) {
?>
    <script>
        location.replace("<?php echo url . "departments.php" ?>")
    </script>
<?php
    exit;
}
$rows = $result->fetch_assoc();
?>


<body>
    <div class="items">
        <div class="card card-primary">
            <div class="card-header">
                <h3 class="card-title">Edit Department</h3>
            </div>
            <!-- /.card-header -->
            <!-- form start -->
            <form method="POST" enctype="multipart/form-data" action="departments_post.php?id=<?php echo $id ?>">
                <div class="card-body">
                    <div class="form-group">
                        <label for="name">Name</label>
                        <input type="text" class="form-control" id="name" placeholder="Enter Product name" name="name" value="<?php echo $rows['department_name'] ?>" required>
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
    if (isset($_SESSION['department_updated'])) {
        if ($_SESSION['department_updated'] == "successful") {
            echo "<script>success('success', 'Department updated successfully'); </script>";
        } else {
            echo "<script>success('error', 'unable to update Department'); </script>";
        }
        unset($_SESSION['department_updated']);
    }
    ?>

</body>
<?php
include "../../includes.php";

if (!isset($_GET['id'])) {
?>
    <script>
        location.replace("<?php echo url . "members.php" ?>")
    </script>
<?php
    exit;
}


$id = $_GET['id'];
$sql = "select * from members where id='$id'";
$result = $conn->query($sql);
if ($result->num_rows == 0) {
?>
    <script>
        location.replace("<?php echo url . "members.php" ?>")
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
                <h3 class="card-title">View Members</h3>
            </div>
            <!-- /.card-header -->
            <!-- form start -->
            <div class="card-body" style="height: fit-content;">
                <div class="name">
                    <span class="font-weight-bold">Name:</span>
                    <?php echo $rows['name'] ?>
                </div>
                <hr>

                <div class="position">
                    <span class="font-weight-bold">Position:</span>
                    <?php echo $rows['position'] ?>
                </div>
                <hr>

                <div class="department">
                    <span class="font-weight-bold">Department:</span>
                    <?php
                    $department_id = $rows['department_id'];
                    $sql = "select department_name from department where id='$department_id'";
                    $department_name = $conn->query($sql)->fetch_assoc()['department_name'];
                    echo $department_name;
                    ?>
                </div>
                <hr>

                <div class="images">
                    <span class="font-weight-bold">Images:</span>
                    <div class="image-preview">

                        <div class="image">
                            <a href="<?php echo member_url . $rows['image'] ?>" data-toggle="lightbox">
                                <img src="<?php echo member_url . $rows['image'] ?>" width=" 80px" class="img-fluid mb-2" alt="image" />
                            </a>
                        </div>

                    </div>
                </div>

            </div>
        </div>
    </div>


    <?php
    require app . "/pages/includes/js_links.php";
    ?>





</body>
<?php
include "../../includes.php";


$id = $_GET['id'];
$sql = "select * from members where id='$id'";
$result = $conn->query($sql);
$rows = $result->fetch_assoc();

$sql = "select * from department";
$department = $conn->query($sql)->fetch_all(MYSQLI_ASSOC);
?>


<body>
    <div class="items">
        <div class="card card-primary">
            <div class="card-header">
                <h3 class="card-title">Edit members</h3>
            </div>
            <!-- /.card-header -->
            <!-- form start -->
            <form method="POST" enctype="multipart/form-data" action="members_post.php?id=<?php echo $id ?>">
                <div class="card-body">
                    <div class="form-group">
                        <label for="name">Name</label>
                        <input type="text" class="form-control" id="name" placeholder="Enter Product name" name="name" value="<?php echo $rows['name'] ?>">
                    </div>
                    <div class="form-group">
                        <label for="exampleFormControlSelect1">Department</label>
                        <select class="form-control" name="department">
                            <?php $selected = $rows['department_id'];
                            $sql = "select department_name from department where id='$selected'";
                            $selected = $conn->query($sql)->fetch_assoc()['department_name'];
                            ?>
                            <option value="<?php echo $selected ?>" selected><?php echo $selected ?></option>
                            <?php
                            foreach ($department as $cat) :
                                if ($selected != $cat['name']) :
                            ?>
                                    <option value="<?php echo $cat['department_name'] ?>"><?php echo $cat['department_name'] ?></option>
                            <?php
                                endif;
                            endforeach;
                            ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="position">Position</label>
                        <input type="text" class="form-control" id="name" placeholder="Enter Position" name="position" value="<?php echo $rows['position'] ?>">
                    </div>
                    <div class="form-group">
                        <label for="image">Image</label>
                        <div class="input-group">
                            <div class="custom-file">
                                <input type="file" class="custom-file-input" id="image" name="img">
                                <label class="custom-file-label" for="image">Replace image</label>
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

        <?php

        $sql = "select image from members where id='$id'";
        $img = $conn->query($sql)->fetch_assoc()['image'];
        ?>

        <div class="image">
            <a href="<?php echo member_url . $img ?>" data-toggle="lightbox" data-title="">
                <img src="<?php echo member_url . $img ?>" width=" 80px" class="img-fluid mb-2" alt="image" />
            </a>
        </div>

    </div>
    <?php
    require app . "/pages/includes/js_links.php";
    ?>


    <?php
    if (isset($_SESSION['validation'])) {
        if ($_SESSION['validation'] == "error")
            echo "<script>success('error', 'image validation error'); </script>";
        elseif ($_SESSION['validation'] == "warning")
            echo "<script>success('warning', 'gallary validation error'); </script>";
        unset($_SESSION['validation']);
    }
    if (isset($_SESSION['member_updated'])) {
        if ($_SESSION['member_updated'] == "successful") {
            echo "<script>success('success', 'member updated successfully'); </script>";
        } else {
            echo "<script>success('error', 'unable to update member'); </script>";
        }
        unset($_SESSION['member_updated']);
    }
    ?>

</body>
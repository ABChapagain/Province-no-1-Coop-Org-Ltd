<?php
include "../../includes.php";


$id = $_GET['id'];
$sql = "select * from users where id='$id'";
$result = $conn->query($sql);
$rows = $result->fetch_assoc();

$sql = "select * from roles where role_name!='admin'";
$roles = $conn->query($sql)->fetch_all(MYSQLI_ASSOC);
?>


<body>
    <div class="items">
        <div class="card card-primary">
            <div class="card-header">
                <h3 class="card-title">Edit members</h3>
            </div>
            <!-- /.card-header -->
            <!-- form start -->
            <form method="POST" enctype="multipart/form-data" action="users_post.php?id=<?php echo $id ?>">
                <div class="card-body">
                    <div class="form-group">
                        <label for="name">Name</label>
                        <input type="text" class="form-control" id="name" placeholder="Enter Product name" name="name" value="<?php echo $rows['user_name'] ?>">
                    </div>
                    <div class="form-group">
                        <label for="exampleFormControlSelect1">roles</label>
                        <select class="form-control" name="roles">
                            <?php $selected = $rows['role'];
                            $sql = "select role_name from roles where id='$selected'";
                            $selected = $conn->query($sql)->fetch_assoc()['role_name'];
                            ?>
                            <option value="<?php echo $selected ?>" selected><?php echo $selected ?></option>
                            <?php
                            foreach ($roles as $cat) :
                                if ($selected != $cat['role_name']) :
                            ?>
                                    <option value="<?php echo $cat['role_name'] ?>"><?php echo $cat['role_name'] ?></option>
                            <?php
                                endif;
                            endforeach;
                            ?>
                        </select>
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
    if (isset($_SESSION['user_updated'])) {
        if ($_SESSION['user_updated'] == "successful") {
            echo "<script>success('success', 'user updated successfully'); </script>";
        } else {
            echo "<script>success('error', 'unable to update user'); </script>";
        }
        unset($_SESSION['user_updated']);
    }
    ?>

</body>
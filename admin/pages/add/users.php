<?php


include "../../includes.php";


$sql = "select * from roles where role_name!='admin'";
$roles = $conn->query($sql)->fetch_all(MYSQLI_ASSOC);


?>


<body>
    <div class="items">
        <div class="card card-primary">
            <div class="card-header">
                <h3 class="card-title">Add Users</h3>
            </div>
            <!-- /.card-header -->
            <!-- form start -->
            <form method="POST" enctype="multipart/form-data" action="users_post.php">
                <div class="card-body">
                    <div class="form-group">
                        <label for="name">Name</label>
                        <input type="text" class="form-control" id="name" placeholder="Enter Name" name="name" required>
                    </div>

                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="text" class="form-control" id="email" placeholder="Enter email" name="email" required>
                    </div>

                    <div class="form-group">
                        <label for="exampleFormControlSelect1">Role</label>
                        <select class="form-control" name="role">
                            <option value="" disabled selected>select</option>
                            <?php
                            foreach ($roles as $cat) :
                            ?>
                                <option value="<?php echo $cat['role_name'] ?>"><?php echo $cat['role_name'] ?></option>
                            <?php
                            endforeach
                            ?>
                        </select>
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
    if (isset($_SESSION['user_added'])) {
        if ($_SESSION['user_added'] == "successful") {
            echo "<script>success('success', 'user added successfully'); </script>";
        } elseif ($_SESSION['user_added'] == "exists") {
            echo "<script> success('warning','user already exists') </script>";
        } else {
            echo "<script>success('error', 'unable to add user'); </script>";
        }
        unset($_SESSION['user_added']);
    }
    ?>

</body>
<?php


include "../../includes.php";


$sql = "select * from department";
$category = $conn->query($sql)->fetch_all(MYSQLI_ASSOC);
?>


<body>
    <div class="items">
        <div class="card card-primary">
            <div class="card-header">
                <h3 class="card-title">Add Members</h3>
            </div>
            <!-- /.card-header -->
            <!-- form start -->
            <form method="POST" enctype="multipart/form-data" action="members_post.php">
                <div class="card-body">
                    <div class="form-group">
                        <label for="name">Name</label>
                        <input type="text" class="form-control" id="name" placeholder="Enter Name" name="name">
                    </div>
                    <div class="form-group">
                        <label for="exampleFormControlSelect1">Department</label>
                        <select class="form-control" name="department">
                            <option value="" disabled selected>select</option>
                            <?php
                            foreach ($category as $cat) :
                            ?>
                                <option value="<?php echo $cat['department_name'] ?>"><?php echo $cat['department_name'] ?></option>
                            <?php
                            endforeach
                            ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="position">Position</label>
                        <input type="text" class="form-control" id="name" placeholder="Enter Position" name="position">
                    </div>
                    <div class="form-group">
                        <label for="image">Image</label>
                        <div class="input-group">
                            <div class="custom-file">
                                <input type="file" class="custom-file-input" id="image" name="img">
                                <label class="custom-file-label" for="image"> please enter images of jpg, png, jpeg, svg, webp format</label>
                            </div>
                        </div>
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
    if (isset($_SESSION['validation'])) {
        if ($_SESSION['validation'] == "error")
            echo "<script>success('error', 'image validation error'); </script>";
    }
    if (isset($_SESSION['member_added'])) {
        if ($_SESSION['member_added'] == "successful") {
            echo "<script>success('success', 'member added successfully'); </script>";
        } elseif ($_SESSION['member_added'] == "exists") {
            echo "<script> success('warning','member already exists') </script>";
        } else {
            echo "<script>success('error', 'unable to add member'); </script>";
        }
        unset($_SESSION['member_added']);
    }
    ?>

</body>
<?php
include "../../includes.php";


$id = $_GET['id'];
$sql = "select * from events where id='$id'";
$result = $conn->query($sql);
$rows = $result->fetch_assoc();
?>


<body>
    <div class="items">
        <div class="card card-primary">
            <div class="card-header">
                <h3 class="card-title">Edit Events</h3>
            </div>
            <!-- /.card-header -->
            <!-- form start -->
            <form method="POST" enctype="multipart/form-data" action="events_post.php?id=<?php echo $id ?>">
                <div class="card-body">
                    <div class="form-group">
                        <label for="title">Title</label>
                        <input type="text" class="form-control" id="title" placeholder="Enter Title" name="title" value="<?php echo $rows['title'] ?>">
                    </div>

                    <div class="card-body">
                        <textarea id="summernote" name="description"> <?php echo $rows['description'] ?> </textarea>
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
    if (isset($_SESSION['event_updated'])) {
        echo "<script>swalfire();</script>";
        if ($_SESSION['event_updated'] == "successful") {
            echo "<script>success('success', 'event updated successfully'); </script>";
        } else {
            echo "<script>success('error', 'unable to update event'); </script>";
        }
        unset($_SESSION['event_updated']);
    }
    ?>

</body>
<?php
include "../../includes.php";


$id = $_GET['id'];
$sql = "select * from vacancy where id='$id'";
$result = $conn->query($sql);
$rows = $result->fetch_assoc();


?>


<body>
    <div class="items">
        <div class="card card-primary">
            <div class="card-header">
                <h3 class="card-title">Edit Vacancy</h3>
            </div>
            <!-- /.card-header -->
            <!-- form start -->
            <form method="POST" enctype="multipart/form-data" action="vacancy_post.php?id=<?php echo $id ?>">
                <div class="card-body">
                    <div class="form-group">
                        <label for="title">Title</label>
                        <input type="text" class="form-control" id="title" placeholder="Enter Title" name="title" value="<?php echo $rows['title'] ?>">
                    </div>

                     <div class="form-group">
                        <label for="short_description">Short Description</label>
                        <textarea class="form-control" id="short_description" rows="3" placeholder="Enter ..." name="short_description"><?php echo $rows['short_description'] ?></textarea>
                    </div>

                    <div class="form-group">
                        <label for="summernote">Description</label>
                        <div class="card-body">
                            <textarea id="summernote" name="description"> <?php echo $rows['description'] ?> </textarea>
                        </div>
                    </div>

                  

                    <div class="form-group">
                        <label>Registration Date:</label>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text">
                                    <i class="far fa-calendar-alt"></i>
                                </span>
                            </div>
                            <input type="text" class="form-control float-right" id="reservation" name="registration">
                        </div>
                        <!-- /.input group -->
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

    <script>
        changeDatePickerData("<?php echo $rows['starting_date'] ?>", "<?php echo $rows['termination_date'] ?>")
    </script>

    <?php
    if (isset($_SESSION['event_updated'])) {
        if ($_SESSION['event_updated'] == "successful") {
            echo "<script>success('success', 'event updated successfully'); </script>";
        } else {
            echo "<script>success('error', 'unable to update event'); </script>";
        }
        unset($_SESSION['event_updated']);
    }
    ?>

</body>
<?php
include "./includes.php";

$sql = "select * from notices";
$result = $conn->query($sql);
$result->fetch_all(MYSQLI_ASSOC);
?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>applications</h1>
                </div>

            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">

            <div class="card">
                <!-- /.card-header -->
                <div class="card-body">
                    <table id="example1" class="table table-bordered table-striped">
                        <div class="add-button"> <a href="<?php url ?>pages/add/notices.php"> <button class="btn btn-primary">add</button></a></div>
                        <thead>
                            <tr>
                                <th>Sn.</th>
                                <th>Title</th>
                                <th>Short Description</th>
                                <th>Images</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $i = 0;
                            foreach ($result as $rows) :
                            ?>
                                <tr>
                                    <td><?php echo ++$i ?></td>
                                    <td><?php echo $rows['title'] ?> </td>
                                    <td><?php
                                        $description = $rows['short_description'];
                                        if (strlen($description) > 30) {
                                            $description = trim(substr($description, 0, 30));
                                            $description .= ".....";
                                        }
                                        echo $description;
                                        ?>
                                    </td>
                                    <td>
                                        <div>
                                            <?php
                                            $sql = "select * from notice_images where id=" . $rows['id'];
                                            $image = $conn->query($sql)->fetch_all(MYSQLI_ASSOC);
                                            foreach ($image as $img) :
                                            ?>
                                                <a href="<?php echo notice_url . $img['image'] ?>" data-toggle="lightbox" data-title="<?php echo $rows['title'] ?>">
                                                    <img src="<?php echo notice_url . $img['image'] ?>" width="50px" class="img-fluid mb-2" alt="image" />
                                                </a>
                                            <?php
                                            endforeach;
                                            ?>
                                        </div>
                                    </td>
                                    <td>
                                        <a href="<?php echo url ?>pages/view/notices.php?id=<?php echo $rows['id'] ?>"><button class="btn btn-primary" data-toggle="tooltip" data-placement="top" title="View"><i class="fas fa-eye"></i></button></a>
                                        <a href="<?php echo url ?>pages/edit/notices.php?id=<?php echo $rows['id'] ?>"><button class="btn btn-secondary" data-toggle="tooltip" data-placement="top" title="Edit"><i class="fas fa-pen-square"></i></button></a>
                                        <button class="btn btn-danger" data-toggle="tooltip" onclick="deleteNotice(<?php echo $rows['id'] ?>)" data-placement="top" title="Delete"><i class="fas fa-trash"></i></button>
                                    </td>
                                </tr>
                            <?php
                            endforeach;
                            ?>

                        </tbody>

                    </table>
                </div>
                <!-- /.card-body -->
            </div>
            <!-- /.card -->

        </div>
        <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->

<?php include "./pages/includes/footer.php" ?>


<?php
if (isset($_SESSION['notice_deleted'])) {
    echo $_SESSION['notice_deleted'];
    if ($_SESSION['notice_deleted'] == "successful") {
        echo "<script>success('success', 'notice deleted successfully'); </script>";
    } else {
        echo "<script>success('error', 'unable to delete notice'); </script>";
    }
    unset($_SESSION['notice_deleted']);
}
?>
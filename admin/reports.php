<?php
include "./includes.php";

$sql = "select * from reports";
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
                    <h1>Reports</h1>
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
                        <div class="add-button"> <a href="<?php url ?>pages/add/reports.php"> <button class="btn btn-primary">add</button></a></div>
                        <thead>
                            <tr>
                                <th>Sn.</th>
                                <th>Title</th>
                                <th>Description</th>
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
                                        $description = $rows['description'];
                                        if (strlen($description) > 10) {
                                            $description = trim(substr($description, 0, 10));
                                            $description .= ".....";
                                        }
                                        echo $description;
                                        ?>
                                    </td>

                                    <td>
                                        <a href="<?php echo url ?>pages/view/reports.php?id=<?php echo $rows['id'] ?>"><button class="btn btn-primary" data-toggle="tooltip" data-placement="top" title="View"><i class="fas fa-eye"></i></button></a>
                                        <a href="<?php echo url ?>pages/edit/reports.php?id=<?php echo $rows['id'] ?>"><button class="btn btn-secondary" data-toggle="tooltip" data-placement="top" title="Edit"><i class="fas fa-pen-square"></i></button></a>
                                        <button class="btn btn-danger" data-toggle="tooltip" onclick="deleteReport(<?php echo $rows['id'] ?>)" data-placement="top" title="Delete"><i class="fas fa-trash"></i></button>
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
if (isset($_SESSION['report_deleted'])) {
    echo $_SESSION['report_deleted'];
    if ($_SESSION['report_deleted'] == "successful") {
        echo "<script>success('success', 'report deleted successfully'); </script>";
    } else {
        echo "<script>success('error', 'unable to delete report'); </script>";
    }
    unset($_SESSION['report_deleted']);
}
?>
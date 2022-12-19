<?php
include "./includes.php";

$sql = "select * from branches";
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
                    <h1>Category</h1>
                </div>

            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table id="example1" class="table table-bordered table-striped">
                                <div class="add-button"> <a href="<?php url ?>pages/add/branches.php"> <button class="btn btn-primary">add</button></a></div>
                                <thead>
                                    <tr>
                                        <th>Sn.</th>
                                        <th>Name</th>
                                        <th>Address</th>
                                        <th>Phone</th>
                                        <th>Email</th>
                                        <th>Coordinates</th>
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
                                            <td><?php echo $rows['name'] ?> </td>
                                            <td><?php echo $rows['address'] ?> </td>
                                            <td><?php echo $rows['phone'] ?> </td>
                                            <td><?php echo $rows['email'] ?></td>
                                            <td><?php echo $rows['coords'] ?> </td>
                                            <td>
                                                <a href="<?php echo url ?>pages/edit/branches.php?id=<?php echo $rows['id'] ?>"><button class="btn btn-secondary" data-toggle="tooltip" data-placement="top" title="Edit"><i class="fas fa-pen-square"></i></button></a>
                                                <button class="btn btn-danger" data-toggle="tooltip" onclick="deleteBranch(<?php echo $rows['id'] ?>)" data-placement="top" title="Delete"><i class="fas fa-trash"></i></button>
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
                <!-- /.col -->
            </div>
            <!-- /.row -->
        </div>
        <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->

<?php include "./pages/includes/footer.php" ?>


<?php
if (isset($_SESSION['branch_deleted'])) {
    echo $_SESSION['branch_deleted'];
    if ($_SESSION['branch_deleted'] == "successful") {
        echo "<script>success('success', 'branch deleted successfully'); </script>";
    } else {
        echo "<script>success('error', 'unable to delete branch'); </script>";
    }
    unset($_SESSION['branch_deleted']);
}
?>
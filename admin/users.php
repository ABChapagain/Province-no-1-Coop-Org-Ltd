<?php
include "./includes.php";

$sql = "select * from users where role!=(select id from roles where role_name='admin')";
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
                    <h1>Users</h1>
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
                        <div class="add-button"> <a href="<?php url ?>pages/add/users.php"> <button class="btn btn-primary">add</button></a></div>
                        <thead>
                            <tr>
                                <th>Sn.</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Role</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $i = 0;
                            foreach ($result as $rows) :
                                $id = $rows['role'];
                                $sql = "select role_name from roles where id='$id'";
                                $role_name = $conn->query($sql)->fetch_assoc()['role_name'];

                            ?>
                                <tr>
                                    <td><?php echo ++$i ?></td>
                                    <td><?php echo $rows['user_name'] ?> </td>
                                    <td><?php echo $rows['email'] ?> </td>
                                    <td><?php echo $role_name ?></td>

                                    <td>
                                        <a href="<?php echo url ?>pages/view/users.php?id=<?php echo $rows['id'] ?>"><button class="btn btn-primary" data-toggle="tooltip" data-placement="top" title="View"><i class="fas fa-eye"></i></button></a>
                                        <a href="<?php echo url ?>pages/edit/users.php?id=<?php echo $rows['id'] ?>"><button class="btn btn-secondary" data-toggle="tooltip" data-placement="top" title="Edit"><i class="fas fa-pen-square"></i></button></a>
                                        <button class="btn btn-danger" data-toggle="tooltip" onclick="deleteUser(<?php echo $rows['id'] ?>)" data-placement="top" title="Delete"><i class="fas fa-trash"></i></button>
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
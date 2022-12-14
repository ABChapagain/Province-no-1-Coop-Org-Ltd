<?php
include "./includes.php";

$sql = "select * from members";
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
                    <h1>Products</h1>
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
                        <div class="add-button"> <a href="<?php url ?>pages/add/members.php"> <button class="btn btn-primary">add</button></a></div>
                        <thead>
                            <tr>
                                <th>Sn.</th>
                                <th>Name</th>
                                <th>Position</th>
                                <th>Department</th>
                                <th>Image</th>
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
                                    <td>
                                        <?php echo $rows['position'] ?>
                                    </td>
                                    <td>

                                        <?php
                                        $department_id = $rows['department_id'];
                                        $sql = "select department_name from department where id='$department_id'";
                                        $department_name = $conn->query($sql)->fetch_assoc()['department_name'];
                                        echo $department_name;
                                        ?>
                                    </td>
                                    <td>
                                        <div>
                                            <a href="<?php echo member_url . $rows['image'] ?>" data-toggle="lightbox" data-title="<?php echo $rows['name'] ?>">
                                                <img src="<?php echo member_url . $rows['image'] ?>" width="50px" class="img-fluid mb-2" alt="image" />
                                            </a>
                                        </div>
                                    </td>

                                    <td>
                                        <a href="<?php echo url ?>pages/view/members.php?id=<?php echo $rows['id'] ?>"><button class="btn btn-primary" data-toggle="tooltip" data-placement="top" title="View"><i class="fas fa-eye"></i></button></a>
                                        <a href="<?php echo url ?>pages/edit/members.php?id=<?php echo $rows['id'] ?>"><button class="btn btn-secondary" data-toggle="tooltip" data-placement="top" title="Edit"><i class="fas fa-pen-square"></i></button></a>
                                        <button class="btn btn-danger" data-toggle="tooltip" onclick="deleteMember(<?php echo $rows['id'] ?>)" data-placement="top" title="Delete"><i class="fas fa-trash"></i></button>
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
if (isset($_SESSION['member_deleted'])) {
    echo $_SESSION['member_deleted'];
    if ($_SESSION['member_deleted'] == "successful") {
        echo "<script>success('success', 'member deleted successfully'); </script>";
    } else {
        echo "<script>success('error', 'unable to delete member'); </script>";
    }
    unset($_SESSION['member_deleted']);
}
?>
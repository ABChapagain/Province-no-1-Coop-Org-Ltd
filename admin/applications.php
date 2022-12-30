<?php
include "./includes.php";

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $sql = "select * from job_application where vacancy_id='$id'";
} else {
    $sql = "select * from job_application";
}


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
                        <thead>
                            <tr>
                                <th>Sn.</th>
                                <th>Name</th>
                                <th>Position</th>
                                <th>Email</th>
                                <th>Phone</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $i = 0;
                            foreach ($result as $rows) :
                                $vacancy_id = $rows['vacancy_id'];
                                $sql = "select title from vacancy where id='$vacancy_id'";
                                $position = $conn->query($sql)->fetch_assoc()['title'];
                            ?>
                                <tr>
                                    <td><?php echo ++$i ?></td>
                                    <td><?php echo $rows['name'] ?> </td>
                                    <td><?php echo $position ?></td>
                                    <td><?php echo  $rows['email']; ?></td>
                                    <td><?php echo  $rows['phone']; ?></td>
                                    <td>
                                        <a href="<?php echo url ?>pages/view/applications.php?id=<?php echo $rows['id'] ?>"><button class="btn btn-primary" data-toggle="tooltip" data-placement="top" title="View"><i class="fas fa-eye"></i></button></a>
                                        <!-- <a href="<?php echo url ?>pages/edit/notices.php?id=<?php //echo $rows['id'] 
                                                                                                    ?>"><button class="btn btn-secondary" data-toggle="tooltip" data-placement="top" title="Edit"><i class="fas fa-pen-square"></i></button></a> -->
                                        <button class="btn btn-danger" data-toggle="tooltip" onclick="deleteApplication(<?php echo $rows['id'] ?>)" data-placement="top" title="Delete"><i class="fas fa-trash"></i></button>
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
if (isset($_SESSION['application_deleted'])) {
    echo $_SESSION['application_deleted'];
    if ($_SESSION['application_deleted'] == "successful") {
        echo "<script>success('success', 'application deleted successfully'); </script>";
    } else {
        echo "<script>success('error', 'unable to delete application'); </script>";
    }
    unset($_SESSION['application_deleted']);
}
?>
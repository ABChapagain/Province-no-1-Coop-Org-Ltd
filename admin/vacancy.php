<?php
include "./includes.php";

$sql = "select * from vacancy";
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
                    <h1>Vacancy</h1>
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
                        <div class="add-button"> <a href="<?php url ?>pages/add/vacancy.php"> <button class="btn btn-primary">add</button></a></div>
                        <thead>
                            <tr>
                                <th>Sn.</th>
                                <th>Title</th>
                                <th>Vacant Seats</th>
                                <th>Short Description</th>
                                <th>Registration Date</th>
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
                                    <td><?php echo $rows['vacancy_seats'] ?></td>
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
                                        <?php echo $rows['starting_date'] . " to " . $rows['termination_date'] ?>
                                    </td>
                                    <td>
                                        <a href="<?php echo url ?>pages/view/vacancy.php?id=<?php echo $rows['id'] ?>"><button class="btn btn-success" data-toggle="tooltip" data-placement="top" title="View applications"><i class="fas fa-book-open"></i></button></a>

                                        <a href="<?php echo url ?>pages/view/vacancy.php?id=<?php echo $rows['id'] ?>"><button class="btn btn-primary" data-toggle="tooltip" data-placement="top" title="View"><i class="fas fa-eye"></i></button></a>
                                        <a href="<?php echo url ?>pages/edit/vacancy.php?id=<?php echo $rows['id'] ?>"><button class="btn btn-secondary" data-toggle="tooltip" data-placement="top" title="Edit"><i class="fas fa-pen-square"></i></button></a>
                                        <button class="btn btn-danger" data-toggle="tooltip" onclick="deleteVacancy(<?php echo $rows['id'] ?>)" data-placement="top" title="Delete"><i class="fas fa-trash"></i></button>
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
if (isset($_SESSION['vacancy_deleted'])) {
    echo $_SESSION['vacancy_deleted'];
    if ($_SESSION['vacancy_deleted'] == "successful") {
        echo "<script>success('success', 'vacancy deleted successfully'); </script>";
    } else {
        echo "<script>success('error', 'unable to delete vacancy'); </script>";
    }
    unset($_SESSION['vacancy_deleted']);
}
?>
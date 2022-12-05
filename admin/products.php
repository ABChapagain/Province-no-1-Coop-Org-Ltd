<?php
include "./includes.php";

$sql = "select * from products";
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
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table id="table" class="table table-bordered table-striped">
                                <a href="<?php url ?>pages/add/products.php"> <button style="margin-left:auto;margin-bottom:5px" class="btn btn-primary d-flex">add</button></a>
                                <thead>
                                    <tr>
                                        <th>Sn.</th>
                                        <th>Name</th>
                                        <th>Description</th>
                                        <th>Image</th>
                                        <th>Category</th>
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
                                                <?php
                                                $description = $rows['description'];
                                                if (strlen($description) > 15) {
                                                    $description = trim(substr($description, 0, 15));
                                                    $description .= ".....";
                                                }
                                                echo $description;
                                                ?>
                                            </td>
                                            <td>

                                                <?php
                                                $sql = "select * from product_image where id=" . $rows['id'];
                                                $image = $conn->query($sql)->fetch_all(MYSQLI_ASSOC);
                                                foreach ($image as $img) :
                                                ?>
                                                    <a href="<?php echo url . $img['name'] ?>" data-toggle="lightbox" data-title="<?php echo $rows['name'] ?>">
                                                        <img src="<?php echo url . $img['name'] ?>" width="50px" class="img-fluid mb-2" alt="image" />
                                                    </a>
                                                <?php
                                                endforeach;
                                                ?>
                                            </td>
                                            <td>
                                                <?php echo $rows['category'] ?>
                                            </td>
                                            <td>
                                                <a href="<?php echo url ?>pages/view/products.php?id=<?php echo $rows['id'] ?>"><button class="btn btn-primary" data-toggle="tooltip" data-placement="top" title="View"><i class="fas fa-book-open"></i></button></a>
                                                <a href="<?php echo url ?>pages/edit/products.php?id=<?php echo $rows['id'] ?>"><button class="btn btn-secondary" data-toggle="tooltip" data-placement="top" title="Edit"><i class="fas fa-pen-square"></i></button></a>
                                                <button class="btn btn-danger" data-toggle="tooltip" onclick="showConfirmation(<?php echo $rows['id'] ?>)" data-placement="top" title="Delete"><i class="fas fa-trash"></i></button>
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


<script>
    $('#table').dataTable({
        // "columnDefs": [{
        //     "width": "20%",
        //     "targets": 0
        // }]
        "autoWidth": false
    });
</script>
<?php
if (isset($_SESSION['product_deleted'])) {
    echo $_SESSION['product_deleted'];
    if ($_SESSION['product_deleted'] == "successful") {
        echo "<script>success('success', 'product deleted successfully'); </script>";
    } else {
        echo "<script>success('error', 'unable to delete product'); </script>";
    }
    unset($_SESSION['product_deleted']);
}
?>
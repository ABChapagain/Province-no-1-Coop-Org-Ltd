<?php include "./includes.php" ?>

<?php


$sql = "select * from products";
$result = $conn->query($sql);
$result->fetch_all();

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
                            <table id="example1" class="table table-bordered table-striped">
                                <a href="<?php url ?>pages/add/products.php"> <button style="margin-left:auto;margin-bottom:5px" class="btn btn-primary d-flex">add</button></a>
                                <thead>
                                    <tr>
                                        <th>Sn.</th>
                                        <th>Name</th>
                                        <th>Description</th>
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
                                                <div class="card card-secondary">
                                                    <div class="card-header">
                                                        <div class="card-tools">
                                                            <button type="button" class="btn btn-tool" data-card-widget="maximize"><i class="fas fa-expand"></i>
                                                            </button>
                                                        </div>
                                                        <!-- /.card-tools -->
                                                    </div>
                                                    <!-- /.card-header -->
                                                    <div class="card-body table-description">
                                                        <?php echo $rows['description'] ?> </div>
                                                    <!-- /.card-body -->
                                                </div>
                                            </td>
                                            <td>

                                                <a href="<?php echo url . $rows['image'] ?>" data-toggle="lightbox" data-title="<?php echo $rows['name'] ?>">
                                                    <img src="<?php echo url . $rows['image'] ?>" width="80px" class="img-fluid mb-2" alt="white sample" />
                                                </a>
                                            </td>
                                            <td>
                                                <button class="btn btn-secondary" data-toggle="tooltip" data-placement="top" title="Edit"><i class="fas fa-pen-square"></i></button>
                                                <button class="btn btn-danger" data-toggle="tooltip" data-placement="top" title="Delete"><i class="fas fa-trash"></i></button>
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
    $(function() {
        $(document).on('click', '[data-toggle="lightbox"]', function(event) {
            event.preventDefault();
            $(this).ekkoLightbox({
                alwaysShowClose: true
            });

        });

    })
</script>
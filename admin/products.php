<?php include "./includes.php" ?>

<body class="hold-transition sidebar-mini">
    <div class="wrapper">
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
                                        <button style="margin-left:auto;margin-bottom:5px" class="btn btn-primary d-flex">add</button>
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
                                            <tr>
                                                <td>1</td>
                                                <td>Tea </td>
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
                                                            Lorem, ipsum dolor sit amet consectetur adipisicing elit. Facilis nam distinctio, unde dolor quam tempora id recusandae eius beatae itaque numquam incidunt. Libero, provident ipsum! Illo sit quos delectus illum consequuntur in sint vero doloribus impedit provident soluta animi laudantium, facere neque eius doloremque inventore sequi similique nisi quis nihil., Lorem ipsum, dolor sit amet consectetur adipisicing elit. Sunt ducimus eaque consequuntur debitis. Commodi ullam rem est quia, dignissimos quo?
                                                        </div>
                                                        <!-- /.card-body -->
                                                    </div>

                                                </td>
                                                <td> 4</td>
                                                <td><button class="btn btn-secondary"><i class="fas fa-pen-square"></i></button>
                                                    <button class="btn btn-danger"><i class="fas fa-trash"></i></button>
                                                </td>
                                            </tr>

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
    </div>
    <!-- ./wrapper -->




    <?php include "./pages/includes/footer.php" ?>
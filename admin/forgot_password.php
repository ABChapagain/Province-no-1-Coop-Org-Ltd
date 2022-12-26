<?php
include "./config/config.php";
include "./pages/includes/header.php";
?>
</body>

<body class="hold-transition login-page">
    <div class="login-box">
        <div class="login-logo">
            <a href="login.php"><b>Admin</b></a>
        </div>
        <!-- /.login-logo -->
        <div class="card">
            <div class="card-body login-card-body">
                <p class="login-box-msg">Find your account</p>

                <form action="forgot_password_post.php" method="post">
                    <div class="input-group mb-3">
                        <input type="text" class="form-control" placeholder="email" name="email">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-envelope"></span>
                            </div>
                        </div>
                    </div>

                    <div class="row d-flex justify-content-center">
                        <!-- /.col -->
                        <div class="col-4">
                            <button type="submit" class="btn btn-primary btn-block">Recover</button>
                        </div>
                        <!-- /.col -->
                    </div>
                </form>



                <p class="my-3 text-center">
                    <a href="login.php">login</a>
                </p>

            </div>
            <!-- /.login-card-body -->
        </div>
    </div>
    <!-- /.login-box -->
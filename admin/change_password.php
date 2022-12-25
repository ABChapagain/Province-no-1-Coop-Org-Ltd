<?php include "./includes.php" ?>


<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Profile</h1>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">

            <div class="card" style="width: 40%; margin:auto">
                <div class="card-body login-card-body">
                    <p class="login-box-msg">You are only one step a way from changing your password.</p>

                    <form action="change_password_post.php" method="post">
                        <div class="input-group mb-3 oldPassword">
                            <input type="password" class="form-control" placeholder="old password" name="old_password">
                            <div class="input-group-append">
                                <div class="input-group-text">
                                    <span class="fas fa-eye" onclick="clicked('oldPassword')"></span>
                                </div>
                            </div>
                        </div>

                        <div class="input-group mb-3 newPassword">
                            <input type="password" class="form-control" placeholder="new password" name="new_password">
                            <div class="input-group-append">
                                <div class="input-group-text">
                                    <span class="fas fa-eye" onclick="clicked('newPassword')"></span>
                                </div>
                            </div>
                        </div>

                        <div class="input-group mb-3 confirmPassword">
                            <input type="password" class="form-control" placeholder="Confirm Password" name="confirm_password">
                            <div class="input-group-append">
                                <div class="input-group-text">
                                    <span class="fas fa-eye" onclick="clicked('confirmPassword')"></span>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12">
                                <button type="submit" class="btn btn-primary btn-block">Change password</button>
                            </div>
                            <!-- /.col -->
                        </div>
                    </form>


                </div>
                <!-- /.login-card-body -->
            </div>

        </div>
        <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->

<?php include "./pages/includes/footer.php" ?>

<script>
    function clicked(passType) {
        const typePass = document.querySelector(`.${passType} input`)
        // const eyePass = document.querySelector(`.${passType} span`)
        const eyePass = document.querySelector(`.${passType} span:first-child`)


        const type = typePass.getAttribute("type") === "password" ? "text" : "password";
        // const eye = eyePass.classList.contains("fa-eye") ? "fa-eye-slash" : "fa-eye"

        typePass.setAttribute("type", type);
        eyePass.classList.toggle("fa-eye");
        eyePass.classList.toggle("fa-eye-slash")
        // console.log(eyePass)

    }
</script>


<?php
if (isset($_SESSION['password_changed'])) {
    if ($_SESSION['password_changed'] == "successful") {
        echo "<script>success('success', 'password changed successfully'); </script>";
    } elseif ($_SESSION['password_changed'] == "oldPassword") {
        echo "<script>success('error', 'old password not matched'); </script>";
    } elseif ($_SESSION['password_changed'] == "confirmPassword") {
        echo "<script>success('error', 'confirm password not matched'); </script>";
    } else {
        echo "<script>success('error', 'sorry could not change the password'); </script>";
    }
    unset($_SESSION['password_changed']);
}
?>
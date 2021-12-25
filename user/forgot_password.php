<?php
session_start();
ob_start();
?>


<?php
include("./header/header.php");
include("../db/db.php");
?>


<body>

    <?php
    if (isset($_POST['done'])) {
        $email = $_POST['email'];
        $sql = "SELECT * FROM users WHERE email='$email'";
        $result = mysqli_query($con, $sql);
        $row = mysqli_fetch_array($result);

        if ($row['email'] != '') {
            $_SESSION['resetpass-mail'] = $row['email'];
            // echo '<script>toastr.success("Password change success")</script>';
            header("location:new_password.php");
        } else {
            echo '<script>toastr.error("Sorry user not found")</script>';
        }
    }

    ?>
    <!-- tap on top starts-->
    <div class="tap-top"><i data-feather="chevrons-up"></i></div>
    <!-- tap on tap ends-->
    <!-- page-wrapper Start-->
    <div class="page-wrapper">
        <div class="row">
            <div class="col-xl-7"><img class="bg-img-cover bg-center" src="../assets/images/login/2.jpg" alt="looginpage"></div>
            <div class="col-xl-5 p-0">
                <div class="login-card">
                    <div>
                        <div><a class="logo" href="index.html"><img class="img-fluid for-light" src="../assets/cusotmimg/Tamilan_logo_default.png" alt="looginpage"><img class="img-fluid for-dark" src="../assets/images/logo/logo_dark.png" alt="looginpage"></a></div>
                        <div class="login-main">
                            <h4>Reset Your Password</h4>
                            <form method="POST" action="">

                                <div class="form-group">
                                    <label class="col-form-label">Enter Your Email</label>
                                    <div class="row">

                                        <div class="col-12 col-sm-12">
                                            <input class="form-control mb-1" type="email" name="email" value="<?php echo $_SERVER['REQUEST_METHOD'] === 'POST' ? $_POST['email'] : '' ?>" required>
                                        </div>


                                    </div>
                                </div>

                                <button class="btn btn-primary btn-block w-100 mt-3" type="submit" name="done">Verify </button>
                        </div>
                        <p class="mt-4 mb-0 text-center">Already have an password?<a class="ms-2" href="login.php">Sign in</a></p>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php
    include("./header/script.php");
    ?>
    </div>



</body>

</html>
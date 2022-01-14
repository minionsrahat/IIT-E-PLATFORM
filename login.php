<?php include('layout-files/import_files.php') ?>
<!DOCTYPE html>
<html lang="zxx" class="no-js">

<head>
    <!-- Mobile Specific Meta -->
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Favicon-->
    <link rel="shortcut icon" href="img/fav.png">
    <!-- Author Meta -->
    <meta name="author" content="colorlib">
    <!-- Meta Description -->
    <meta name="description" content="">
    <!-- Meta Keyword -->
    <meta name="keywords" content="">
    <!-- meta character set -->
    <meta charset="UTF-8">
    <!-- Site Title -->
    <title>Education</title>

    <?php
    include('layout-files/css-links.php')
    ?>
    <style>
        .login-form .main-content {
            width: 50%;
            border-radius: 20px;
            box-shadow: 0 5px 5px rgba(0, 0, 0, .4);
            margin: 5em auto;
            display: flex;
        }

        .login-form .company__info {
            background-color: #008080;
            border-top-left-radius: 20px;
            border-bottom-left-radius: 20px;
            display: flex;
            flex-direction: column;
            justify-content: center;
            color: #fff;
        }

        .login-form .fa-android {
            font-size: 3em;
        }

        @media screen and (max-width: 640px) {
            .login-form .main-content {
                width: 90%;
            }

            .login-form .company__info {
                display: none;
            }

            .login_form {
                border-top-left-radius: 20px;
                border-bottom-left-radius: 20px;
            }
        }

        @media screen and (min-width: 642px) and (max-width:800px) {
            .login-form .main-content {
                width: 70%;
            }
        }

        .login-form .row>h2 {
            color: #008080;
        }

        .login_form {
            background-color: #fff;
            border-top-right-radius: 20px;
            border-bottom-right-radius: 20px;
            border-top: 1px solid #ccc;
            border-right: 1px solid #ccc;
        }

        .login-form form {
            padding: 0 2em;
        }

        .login-form .form__input {
            width: 100%;
            border: 0px solid transparent;
            border-radius: 0;
            border-bottom: 1px solid #aaa;
            padding: 1em .5em .5em;
            padding-left: 2em;
            outline: none;
            margin: 1.5em auto;
            transition: all .5s ease;
        }

        .login-form .form__input:focus {
            border-bottom-color: #008080;
            box-shadow: 0 0 5px rgba(0, 80, 80, .4);
            border-radius: 4px;
        }

        .login-form .btn {
            transition: all .5s ease;
            width: 70%;
            border-radius: 30px;
            color: #008080;
            font-weight: 600;
            background-color: #fff;
            border: 1px solid #008080;
            margin-top: 1.5em;
            margin-bottom: 1em;
        }

        .login-form .btn:hover,
        .btn:focus {
            background-color: #008080;
            color: #fff;
        }

        .container-fluid {
            padding-top: 80px;
        }
    </style>
</head>

<body>




    <?php include('layout-files/navigation-menu.php') ?>

    <?php
    $user_type = array(
        1 => 'Teacher',
        2 => 'Staff',
        3 => 'Student'
    );

    $session_login = array(
        1 => 'teacher_login',
        2 => 'staff_login',
        3 => 'student_login'
    );


    if (isset($_GET['type']) && in_array($_GET['type'], array(1, 2, 3))) {
        $error = array(
            'error' => false,
            'msg' => ''
        );

        if (isset($_POST['submit'])) {
            $username = $_POST["username"];
            $password = $_POST["password"];

            if ($_GET['type'] == 1) {

                $stmt = $con->prepare("SELECT * FROM teacher_info WHERE username=? AND password=?");
            } elseif ($_GET['type'] == 2) {
                $stmt = $con->prepare("SELECT * FROM staff_info WHERE username=? AND password=?");
            } elseif ($_GET['type'] == 3) {
                $stmt = $con->prepare("SELECT * FROM student_info WHERE username=? AND password=?");
            }
            $stmt->bind_param("ss", $username, $password);
            $stmt->execute();

            $row = $stmt->get_result()->fetch_assoc();
            if (!empty($row)) {
                $_SESSION['login'] = true;
                $_SESSION[$session_login[$_GET['type']]] = true;
                $_SESSION['username'] = $username;
                $_SESSION['user_id'] = $row['id'];
                echo '<script> location.replace("index.php"); </script>';
            } else {

                $error['error'] = true;
                $error['msg'] = 'Invalid Username Or Password';
            }
            $con->close();
        }
    } else {
        echo '<script> location.replace("index.php"); </script>';
    }




    ?>

    <!-- start banner Area -->
    <section class="banner-area relative about-banner" id="home">
        <div class="overlay overlay-bg"></div>
        <div class="container">
            <div class="row d-flex align-items-center justify-content-center">
                <div class="about-content col-lg-12">
                    <h1 class="text-white">
                    <?php echo $user_type[$_GET['type']] ?>
                    </h1>
                    <!-- <p class="text-white link-nav">As a </a> <span class="lnr lnr-arrow-right"></span> <?php echo $user_type[$_GET['type']] ?></p> -->
                </div>
            </div>
        </div>
    </section>
    <!-- End banner Area -->


    <!-- Start contact-page Area -->
    <div class="container-fluid login-form ">
        <div class="row main-content bg-success text-center">
            <div class="col-md-4 text-center company__info">
                <span class="company__logo">
                    <h2><span class="fa fa-android"></span></h2>
                </span>
                <h4 class="company_title text-white">Institute Of Information Technology</h4>
            </div>
            <div class="col-md-8 col-xs-12 col-sm-12 login_form ">
                <div class="container-fluid">
                    <div class="row">
                        <h2 class="ml-4">Log In</h2>
                    </div>
                    <?php
                    if ($error['error']) {
                    ?>
                        <div class="row">
                            <div class="text-danger" role="alert">
                                <strong>Invalid Username Or Password</strong>
                            </div>
                        </div>

                    <?php
                    }
                    ?>


                    <div class="row">
                        <form action="login.php?type=<?php echo $_GET['type'] ?>" method="post" control="" class="form-group">
                            <div class="row">
                                <input type="text" name="username" id="username" class="form__input" placeholder="Username">
                            </div>
                            <div class="row">
                                <!-- <span class="fa fa-lock"></span> -->
                                <input type="password" name="password" id="password" class="form__input" placeholder="Password">
                            </div>
                            <div class="row">
                                <input type="submit" name="submit" value="Log In" class="btn">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End contact-page Area -->
    <!-- start footer Area -->
    <?php include('layout-files/footer.php') ?>
    <!-- End footer Area -->

    <?php include('layout-files/js-links.php') ?>
</body>

</html>
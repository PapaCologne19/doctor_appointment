<?php
session_start();
include 'model/connect.php';
include 'model/authenticate.php';

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Favicon -->
    <link rel="shortcut icon" href="assets/img/pcn.png" type="image/x-icon">

    <!-- Bootstrap 5 -->
    <link rel="stylesheet" href="assets/bootstrap/dist/css/bootstrap.css">
    <link rel="stylesheet" href="assets/bootstrap/dist/css/bootstrap.min.css">
    <script src="assets/bootstrap/dist/js/bootstrap.js"></script>
    <script src="assets/bootstrap/dist/js/bootstrap.min.js"></script>
    <!-- Bootstrap Icon -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">

    <!-- Sweet Alert -->
    <script src="https://code.jquery.com/jquery-3.6.3.min.js" integrity="sha256-pvPw+upLPUjgMXY0G+8O0xUf+/Im1MZjXxxgOcBQBXU=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <link rel="stylesheet" href="assets/css/style.css">

    <!-- Icons -->
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css">

    <title>Login</title>

    <style>
        @font-face {
            font-family: Poppins;
            src: url('assets/fonts/Poppins/Poppins-Regular.ttf');
        }

        @font-face {
            font-family: Inter;
            src: url('assets/fonts/Inter/Inter-VariableFont_slnt\,wght.ttf');
        }

        * {
            font-family: 'Poppins', sans-serif;
        }

        #username,
        #password {
            border: 0px solid #404040;
            padding: 20px;
            box-shadow: rgba(60, 64, 67, 0.3) 0px 1px 2px 0px, rgba(60, 64, 67, 0.15) 0px 1px 3px 1px;
        }

        #username:focus,
        #password:focus {
            outline: none !important;
            box-shadow: none !important;
            border: 0px solid black;
            box-shadow: rgba(60, 64, 67, 0.3) 0px 1px 2px 0px, rgba(60, 64, 67, 0.15) 0px 1px 3px 1px !important;
        }

        .btn-login {
            padding: 15px;
            width: 250px;
            border-radius: 15px;
            background-color: #57d8cd;
            color: white;
        }

        .btn-login:hover {
            background-color: #57d8cd;
            color: white;
        }

        h4 {
            color: #57d8cd;
        }

        #title {
            font-weight: 900 !important;
        }

        .container,
        .form-label,
        .modal-footer {
            font-family: 'Inter', sans-serif !important;
        }

        .modal-footer .btn {
            padding: 10px !important;
        }

        #eye-open,
        #Coneye-open {
            position: relative;
            float: right;
            margin: 1rem;
            top: -2.7rem;
            display: none;
        }

        #eye-close,
        #Coneye-close {
            position: relative;
            float: right;
            margin: 1rem;
            top: -2.7rem;
        }

        .alert {
            display: none;
        }

        .requirements {
            list-style-type: none;
        }

        .wrong .fa-check {
            display: none;
        }

        .good .fa-times {
            display: none;
        }
    </style>
</head>
<!-- style="box-shadow: rgba(60, 64, 67, 0.3) 0px 1px 2px 0px, rgba(60, 64, 67, 0.15) 0px 1px 3px 1px;" -->

<body>
    <?php
    if (isset($_SESSION['successMessage'])) { ?>
        <script>
            Swal.fire({
                icon: 'success',
                title: "<?php echo $_SESSION['successMessage']; ?>",
            })
        </script>
    <?php unset($_SESSION['successMessage']);
    }
    ?>
    <?php
    if (isset($_SESSION['errorMessage'])) { ?>
        <script>
            Swal.fire({
                icon: 'error',
                title: "<?php echo $_SESSION['errorMessage']; ?>",
            })
        </script>
    <?php unset($_SESSION['errorMessage']);
    }
    ?>
    <?php
    if (isset($_SESSION['warningMessage'])) { ?>
        <script>
            Swal.fire({
                icon: 'warning',
                title: "<?php echo $_SESSION['warningMessage']; ?>",
            })
        </script>
    <?php unset($_SESSION['warningMessage']);
    }
    ?>

    <nav class="mt-5 mx-5">
        <img src="assets/img/pcn.png" alt="PCN LOGO" class="img-responsive" width="10%">
    </nav>

    <center>
        <div class="container position-absolute top-50 start-50 translate-middle">
            <div class="row justify-content-center">
                <div class="col-lg-4 col-md-6 col-sm-12 col-md-offset-3">
                    <div class="panel">
                        <div class="panel-heading pt-3">
                            <div class="panel-title text-center mt-4" id="title">
                                <h4 class="fs-1"><strong>L O G I N</strong></h4>
                                <hr>
                            </div>
                        </div>
                        <div class="panel-body mt-3">
                            <div class="row">
                                <div class="col-lg-12 forms">
                                    <form id="login-form" class="col-lg-offset-1 col-lg-10 forms" action="views/action.php" method="post" style="display: block;">
                                        <div class="mt-4">
                                            <!-- <label class="form-label" for="username" id="usernameLabel">Username</label> -->
                                            <input type="text" name="username" id="username" tabindex="1" class="form-control" placeholder="Username" autocomplete="on" required>
                                        </div>
                                        <div class="mt-4">
                                            <!-- <label class="form-label" for="password" id="passwordLabel">Password</label> -->
                                            <input type="password" name="password" id="password" tabindex="2" class="form-control" placeholder="Password" autocomplete="current-password" required>
                                        </div>
                                        <div class="form-check mt-3">
                                            <input class="form-check-input" type="checkbox" value="" onclick="showPasswords()" id="showPassword" style="border: 1px solid gray !important;">
                                            <label class="form-check-label" for="showPassword" id="showPasswordLabel" style="transform: none !important; float: left;">
                                                Show password
                                            </label>
                                        </div>
                                        <div class="col-md-12 col-sm-6 col-sm-offset-3 mt-5">
                                            <button type="submit" name="login-submit" id="login-submit" tabindex="3" class="btn btn-default btn-login" value="LOGIN"> Login</button>
                                        </div>
                                        <div class="col-sm-12 col-md-12 pt-4 pb-4 mb-5">
                                            <a href="javascript:void(0)" class="registerAccount link" style="color: #BABABA; ">Register Account here</a>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </center>


    <!-- MODAL FOR REGISTER ACCOUNT -->
    <div class="modal fade" id="registerAccount" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel"></h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="container">
                        <form action="views/action.php" method="post" class="row g-3 needs-validation">
                            <div class="">
                                <label for="" class="form-label">PCN ID Number</label>
                                <input type="number" class="form-control" name="idnumber" id="idnumber" required>
                            </div>
                            <div class="col-md-12 col-sm-12 ">
                                <label for="" class="form-label">First Name</label>
                                <input type="text" class="form-control" name="firstName" id="firstName" required>
                            </div>
                            <div class="col-md-12 col-sm-12 ">
                                <label for="" class="form-label">Middle Name</label>
                                <input type="text" class="form-control" name="middleName" id="middleName" required>
                            </div>
                            <div class="col-md-12 col-sm-12 ">
                                <label for="" class="form-label">Last Name</label>
                                <input type="text" class="form-control" name="lastName" id="lastName" required>
                            </div>
                            <div class="">
                                <label for="" class="form-label">Email Address</label>
                                <input type="email" class="form-control" name="email" id="email" required>
                            </div>
                            <div class="">
                                <label for="" class="form-label">Contact Number</label>
                                <input type="number" class="form-control" name="contactNumber" id="contactNumber" required>
                            </div>
                            <div class="">
                                <label for="" class="form-label">Division</label>
                                <select name="division" class="form-select" id="division" required>
                                    <option value="" disabled selected></option>
                                    <option value="BD1">BD1</option>
                                    <option value="BD2">BD2</option>
                                    <option value="BD3">BD3</option>
                                    <option value="BSG">BSG</option>
                                    <option value="HR">HR</option>
                                    <option value="FINANCE">FINANCE</option>
                                    <option value="PPI">PPI</option>
                                    <option value="STRAT">STRAT</option>
                                </select>
                            </div>
                            <div class="">
                                <label for="" class="form-label">Username</label>
                                <input type="text" class="form-control" name="username" id="Username" autocomplete="off" required>
                            </div>
                            <div class="form-group">
                                <label for="" class="form-label">Password</label>
                                <input type="password" name="password" id="Password" class="form-control" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" autocomplete="off" required>
                                <span onclick="showPasswordRegistration()">
                                    <i class="bi bi-eye" id="eye-open"></i>
                                    <i class="bi bi-eye-slash" id="eye-close"></i>

                                </span>
                            </div>
                            <div class="alert alert-warning password-alert" role="alert">
                                <ul>
                                    <li class="requirements leng"><i class="fas fa-check green-text"></i></i></i><i class="fas fa-times red-text"></i> Your password must have at least 8 characters.</li>
                                    <li class="requirements big-letter"><i class="fas fa-check green-text"></i><i class="fas fa-times red-text"></i> Your password must have at least 1 big letter.</li>
                                    <li class="requirements small-letter"><i class="fas fa-check green-text"></i><i class="fas fa-times red-text"></i> Your password must have at least 1 small letter.</li>
                                    <li class="requirements num"><i class="fas fa-check green-text"></i><i class="fas fa-times red-text"></i> Your password must have at least 1 number.</li>
                                </ul>
                            </div>
                            <div class="" style="margin-top: -1rem !important;">
                                <label for="" class="form-label">Confirm Password</label>
                                <input type="password" name="confirmpassword" id="ConfirmPassword" class="form-control" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" autocomplete="off" required>
                                <span onclick="showConfirmPasswordRegistration()">
                                    <i class="bi bi-eye" id="Coneye-open"></i>
                                    <i class="bi bi-eye-slash" id="Coneye-close"></i>
                                </span>
                            </div>
                            <span id='message' style="margin-top: -2rem !important;"></span>
                            <script type="text/javascript" charset="utf-8">
                                $('#Password, #ConfirmPassword').on('keyup', function() {
                                    if ($('#Password').val() && $('#ConfirmPassword').val() == null) {
                                        $('');
                                    } else if ($('#Password').val() == $('#ConfirmPassword').val()) {
                                        $('#message').html('Password Matched').css('color', 'green');
                                    } else
                                        $('#message').html('Password Unmatched').css('color', 'red');
                                });
                            </script>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn btn-primary button" name="register" id="register">Save changes</button>
                    </div>
                    </form>
                </div>
            </div>

        </div>
    </div>
    </div>


    <script>
        // Modal Pop-up
        $(document).ready(function() {
            $('.registerAccount').on('click', function() {
                $('#registerAccount').modal('show');
            });
        });

        // Show password
        function showPasswords() {
            var showPassword = document.getElementById('password');

            if (showPassword.type === 'password') {
                showPassword.type = 'text';
            } else {
                showPassword.type = 'password';
            }
        }

        // Show password in registration page
        function showPasswordRegistration() {
            var password = document.getElementById("Password");
            var open = document.getElementById("eye-open");
            var close = document.getElementById("eye-close");

            if (password.type === 'password') {
                password.type = "text";
                open.style.display = "block";
                close.style.display = "none";
            } else {
                password.type = "password";
                open.style.display = "none";
                close.style.display = "block";
            }
        }

        // Show Confirm Password in Registration page
        function showConfirmPasswordRegistration() {
            var conpassword = document.getElementById("ConfirmPassword");
            var conopen = document.getElementById("Coneye-open");
            var conclose = document.getElementById("Coneye-close");

            if (conpassword.type === 'password') {
                conpassword.type = "text";
                conopen.style.display = "block";
                conclose.style.display = "none";
            } else {
                conpassword.type = "password";
                conopen.style.display = "none";
                conclose.style.display = "block";
            }
        }


        // Password Input Checker
        $(function() {
            var $password = $("#Password");
            var $passwordAlert = $(".password-alert");
            var $requirements = $(".requirements");
            var leng, bigLetter, smallLetter, num, specialChar;
            var $leng = $(".leng");
            var $bigLetter = $(".big-letter");
            var $smallLetter = $(".small-letter");
            var $num = $(".num");
            var numbers = "0123456789";
            var lowercaseLetters = "abcdefghijklmnopqrstuvwxyz";

            $requirements.addClass("wrong");
            $password.on("focus", function() {
                $passwordAlert.show();
            });

            $password.on("input blur", function(e) {
                var el = $(this);
                var val = el.val();
                $passwordAlert.show();

                if (val.length < 8) {
                    leng = false;
                } else {
                    leng = true;
                }

                if (val.toLowerCase() == val) {
                    bigLetter = false;
                } else {
                    bigLetter = true;
                }

                smallLetter = false;
                for (var i = 0; i < val.length; i++) {
                    for (var j = 0; j < lowercaseLetters.length; j++) {
                        if (val[i] == lowercaseLetters[j]) {
                            smallLetter = true;
                        }
                    }
                }

                num = false;
                for (var i = 0; i < val.length; i++) {
                    for (var j = 0; j < numbers.length; j++) {
                        if (val[i] == numbers[j]) {
                            num = true;
                        }
                    }
                }

                if (leng == true && bigLetter == true && smallLetter == true && num == true) {
                    $(this).addClass("valid").removeClass("invalid");
                    $requirements.removeClass("wrong").addClass("good");
                    $passwordAlert.removeClass("alert-warning").addClass("alert-success");
                } else {
                    $(this).addClass("invalid").removeClass("valid");
                    $passwordAlert.removeClass("alert-success").addClass("alert-warning");

                    if (leng == false) {
                        $leng.addClass("wrong").removeClass("good");
                    } else {
                        $leng.addClass("good").removeClass("wrong");
                    }

                    if (bigLetter == false) {
                        $bigLetter.addClass("wrong").removeClass("good");
                    } else {
                        $bigLetter.addClass("good").removeClass("wrong");
                    }

                    if (smallLetter == false) {
                        $smallLetter.addClass("wrong").removeClass("good");
                    } else {
                        $smallLetter.addClass("good").removeClass("wrong");
                    }

                    if (num == false) {
                        $num.addClass("wrong").removeClass("good");
                    } else {
                        $num.addClass("good").removeClass("wrong");
                    }
                }

                if (e.type == "blur") {
                    $passwordAlert.hide();
                }
            });
        });
    </script>
</body>

</html>
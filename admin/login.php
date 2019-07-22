<?php
    session_start();
    require_once 'config.php';
    
    if ($_SESSION['logins'] == true) {
        header('Location: adminpanel.php');
        exit;
    }
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="yol torres">

    <title>Login</title>

    <!-- Custom fonts for this template-->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <link rel="stylesheet" href="css/style.css">

    <style>
        body {
        background: url('logo.png');
        background-image: url("https://ak4.picdn.net/shutterstock/videos/23628754/thumb/1.jpg");
        background-repeat: no-repeat;
        background-position: center;
        background-position-y: 1px;
        background-size: 100%;
    }

    .card-header img {
        height: 50px;
        width: 50px;
        margin-right: 35px;
    }
    </style>
</head>

<body class="loginBody">

    <div class="container">
        <div class="card card-login mx-auto mt-5">
            <div class="card-header log" id="log">
                <span> <img src="https://www.passerellesnumeriques.org/wp-content/uploads/2016/03/pn-logo.png" alt="pn logo"></span>
                Login as Admin
            </div>
            <div class="card-body">
                <div class="form-group">
                    <div class="form-label-group">
                        <label for="username">Username </label>
                        <select name='username' id="username" class="form-control" placeholder="... " required="required"
                            class="form-control">
                            <option value = 'Staff'>Staff</option>
                            <option value="1styrEducators">1styrEducators</option>
                            <option value="2ndYrEducators">2ndYrEducators</option>
                        </select>

                    </div>
                </div>
                <div class="form-group">
                    <div class="form-label-group">
                        <label for="inputPassword">Password</label>
                        <input type="password" id="inputPassword" class="form-control" placeholder="..." required="required">
                    </div>
                </div>
                <br>
                <input type="button" value="login" id="loginbtn" class="btn btn-success btn-block">
            </div>
        </div>
    </div>
    <script>
        $(document).ready(function () {
            $(document).keypress(function (event) {

                var keycode = (event.keyCode ? event.keyCode : event.which);
                if (keycode == '13') {
                    $("#loginbtn").click();
            }
            $("#loginbtn").click(
                function () {
                    var email = $('#username').val();
                    var pw = $('#inputPassword').val();
                    $.ajax({
                        url: "log.php",
                        type: 'POST',
                        data: {
                            email: email,
                            pw: pw
                        },
                        success: function (response) {
                            if (response == 0) {
                                swal("Account Not Found!",
                                    " Please Double Check Your Credentials",
                                    "error");
                            } else if (response == 1) {
                                window.location.href = "adminpanel.php";
                            } else {
                                location.reload();
                            }
                        }
                    })
                });
        });
        });
    </script>

</body>

</html>
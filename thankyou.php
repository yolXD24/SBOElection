<?php 
    // ini_set('display_errors',1);
    session_start();
    require_once "config.php";
    $_SESSION["login"] = false;


    if (!(isset($_SESSION['userlog']) || isset($_SESSION['ClassNumber']))) {
       header('location:login.php');
    }
    ?>
<!DOCTYPE html>
<html>

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="Yol torres">

    <title>Thank you</title>
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="css/sb-admin.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <link rel="stylesheet" href="js/sweetalert.css">
    <script src="js/yol.js"></script>


    <style>
    body {
        overflow-x: hidden;
    }

    .vtbl th {
        font-size: 14px;
    }

    .vtbl td {
        font-size: 14px;
    }

    .fa-home,
    .fa-user-circle {
        font-size: 25px !important;
    }

    .swal-overlay .swal-overlay--show-modal {
        background-color: rgba(0, 0, 0, 0.58)
    }

    .swal-button,
    .swal-button--confirm {
        color: white;
        background-color: #428BCA !important;
    }

    #logo {
        height: 20em;
    }

    #pnp {
        color: #CC6600;
        font-family: Verdana, sans-serif;
        font-weight: bolder;
    }

    .typ {
        background: #EFEFEF;
        margin: 10px;
    }

    #pnps {
        text-indent: 30px;
    }

    #wrapper #content-wrapper {
        padding-bottom: 50px;
    }

    a,
    i {
        color: blue;
    }
    </style>

</head>

<body id="page-top">

    <nav class="navbar navbar-expand navbar-dark bg-dark static-top">

        <p class="navbar-brand mr-1" id="title" href="#"><img class="logo"
                src="https://www.passerellesnumeriques.org/wp-content/uploads/2016/03/pn-logo.png">SBO ELECTION 2019
            </a>
            <!-- Navbar Search -->
            <div class="d-none d-md-inline-block form-inline ml-auto mr-0 mr-md-3 my-2 my-md-0">
                <div class="input-group">

                </div>
            </div>
            </div>

            <!-- Navbar -->
            <ul class="navbar-nav">
                <li class="nav-item active">
                    <a class="nav-link" id="userName"></a>
                </li>
            </ul>

            <ul class="navbar-nav ml-auto ml-md-0">
                <li class="nav-item dropdown no-arrow">
                    <p class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown"
                        aria-haspopup="true" aria-expanded="false">
                        <i class="fas fa-user-circle fa-fw" id="userIcon"></i>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="userDropdown">
                            <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                                Logout</a>
                        </div>
                </li>
            </ul>
    </nav>

    <div id="wrapper">

        <!-- Sidebar -->

        <div id="content-wrapper">

            <div class="container-fluid">

                <script type="text/javascript">
                $(document).ready(function() {
                    swal("Congrats!", " Your Vote is Submitted Successfully!", "success");
                });
                </script>

                <div class="container-fluid">
                    <br>
                    <h1 class="text-center">Voting Completed!</h1>
                    <br>
                    <div class="row">
                        <div class="col-md-4"></div>
                        <div class="col-md-4">
                            <center>
                                <div class="container-fluid">
                                    <!-- <h5>Your Votes:</h5> -->
                                <?php       
                                
                                $sql = null;
                        
                        if ($_SESSION['userlog'] == 1) {
                            $sql = "SELECT DISTINCT 
                            tblVoter2.Name as name
                            FROM 
                            tblCandidates2
                            JOIN tblVoter2 ON tblCandidates2.ClassNumber = tblVoter2.ClassNumber 
                            left JOIN tblVotes2 on tblCandidates2.CandidateId = tblVotes2.CandidateId 
                            where tblVotes.ClassNumber =".$_SESSION['ClassNumber']." GROUP BY 
                            tblCandidates2.CandidateId" ;
                       
                    }else if ($_SESSION['userlog'] == 2) {
                            $sql = "SELECT DISTINCT 
                            tblVoter.Name as name
                            FROM 
                            tblCandidates 
                            JOIN tblVoter ON tblCandidates.ClassNumber = tblVoter.ClassNumber 
                            left JOIN tblVotes on tblCandidates.CandidateId = tblVotes.CandidateId 
                            where tblVotes.ClassNumber = ".$_SESSION['ClassNumber']."
                            GROUP BY 
                            tblCandidates.CandidateId";
                             }
                             
                            
                            $result = $link->query($sql);
                            if ($result->num_rows > 0) {
                                echo "<h5>Your Votes:</h5>";
                                while ($row = $result->fetch_assoc()) {
                                    echo "<td>".$row['name']."</td>";
                                    echo "<br>";
                                    }   
                            }
                            echo "<br>";
                            ?>
                                </div>
                            </center>
                        </div>
                        <div class="col-md-4"></div>
                    </div>

                    <div class="row typ">
                        <div class="col-md-3">
                            <img src="logo10.png" id="logo" alt="pnLogo">
                        </div>
                        <div class="col-md-1"></div>

                        <div class="col-md-8" style="padding-left: 0px;">
                            <br><br><br><br>
                            <div class="container-fluid ">
                                <h3 id="pnps">Thank you for participating the<i> <span id="pnp">PN SBO Election
                                            2019</span></i> .</h3><br>
                                <p class="h6">Your Votes was successully cast.For questions and clarifications please
                                    reach us us soon as posible <a
                                        href="https://mail.google.com/mail/?view=cm&fs=1&to=leonilojr.torres@student.passerellesnumeriques.org">
                                        here <i class="fas fa-envelope"></i></a></h6>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
    <small>
        <p class=' text-center '>This system is developed by :<span id='dev'>Leonilo Torres Jr </span><br><i
                class="fas fa-envelope"></i> <a
                href="https://mail.google.com/mail/?view=cm&fs=1&to=leonilojr.torres@student.passerellesnumeriques.org">leonilojr.torres@student.passerellesnumeriques.org</a>
        </p>
    </small>
    <br>


    <br><div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body text-center"><span>
                        <h5><i class="fa fa-question-circle" aria-hidden="true"></i>
                    </span> Are You Sure You Want To Log Out?</h5>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <a class="btn btn-primary" href="out.php">Logout</a>
                </div>
            </div>
        </div>
    </div>
    <footer class="sticky-footer">
        <div class="container my-auto">
            <div class="copyright text-center my-auto">
                <span>Passerelles numériques Philippines SBO Election 2019</span>
            </div>
        </div>
    </footer>

    </div>
    <!-- /.content-wrapper -->

    </div>
    <!-- /#wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>



    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>
    <script src="js/sb-admin.min.js"></script>
    <script src="js/yol.js"></script>

</body>

</html>
<?php
    session_start();
    ini_set('display_errors',1);
    require "config.php";
    if ($_SESSION['login'] != true) {
		header('Location: login.php');
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
    <meta name="author" content="Yol torres">

    <title>Vote Wisely</title>
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="css/sb-admin.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
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

    #ttl {
        margin-left: 10px
    }

    .candidates {
        padding-left: 70px;
    }

    .logo10th {
        position: fixed;
        right: 15%;
        opacity: 0.3;
    }

    .swal-overlay .swal-overlay--show-modal {
        background-color: rgba(0, 0, 0, 0.58)
    }

    .swal-button--confirm {
        color: white;
        background-color: #428BCA !important;
    }

    .swal-text {
        text-align: center;
    }

    .swal-button--cancel {
        background-color: #d33 !important;
        color: white;
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

            <div class="container-fluid row">

                <div class="col-md-4">

                    <div class="card mb-3 " id="bdgtbl ">
                        <div class="card-header">
                            <i class="fas fa-user-friends"></i><span id='ttl'><b> Select 9 Candidates for SBO</b></span>
                        </div>
                        <div class="container-fluid">
                            <div class="card-body candidates">

                                <!-- some contents here -->
                                <div class="tbl1">
                                    <?php 
                                            $sql = "SELECT  CandidateId, tblCandidates2.ClassNumber as cn , tblVoter2.Name as name from tblCandidates2
                                            JOIN tblVoter2 ON tblCandidates2.ClassNumber = tblVoter2.ClassNumber group by tblCandidates2.ClassNumber";
                                            $id = 100;	
                                            $result = $link->query($sql);
                                            if ($result->num_rows > 0) {
                            
                                                while ($row = $result->fetch_assoc()) {
                                    
                                                    echo '<div class="custom-control custom-checkbox">';
                                                    echo '<input type="checkbox" class="custom-control-input single-checkbox" value="'.$row["CandidateId"].'" id="customCheck'.$id.'" name="votes[]">';
                                                    echo '<label class="custom-control-label" for="customCheck'.$id.'">'.$row["name"].'</label>';
                                                    echo '</div>';
                                                    $id+=1;
                                                }
                                                echo '<br>';
                                                echo '<input type="sumbit" id="vote2" value="confirm" class="btn btn-primary sub">';
                                            }
                                            else{
                                                echo "<h1 class='text-center'>Voting will Start Soon!</h1>";
                                            }
                                        
                                        ?>
                                </div>


                                <div class="tbl2">
                                    <?php 
                                        $sql = "SELECT Distinct CandidateId, tblCandidates.ClassNumber as cn ,tblVoter.Name as name from tblCandidates
                                            JOIN tblVoter ON tblCandidates.ClassNumber = tblVoter.ClassNumber";
                                        $id = 1;	
                                        $result = $link->query($sql);
                                        if ($result->num_rows > 0) {
                                            echo '<br>';
                                    
                                            while ($row = $result->fetch_assoc()) {
                                
                                                echo '<div class="custom-control custom-checkbox">';
                                                echo '<input type="checkbox" class="custom-control-input single-checkbox" value="'.$row["CandidateId"].'" id="customCheck'.$id.'" name="votes[]">';
                                                echo '<label class="custom-control-label" for="customCheck'.$id.'">'.$row["name"].'</label>';
                                                echo '</div>';
                                                $id+=1;
                                            }
                                            echo '<br>';
                                            echo '<input type="button" id ="vote" value="confirm" class="sub btn btn-primary">';
                                        }
                                        else{
                                            echo "<h1 class='text-center'>Voting will Start Soon!</h1>";
                                        }
                            ?>
                                </div>
                                <!--end of contents  -->
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-8">
                    <center>
                        <img src="logo10.png" alt="logo10th" class="logo10th">
                    </center>
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

    <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
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
    <?php
        if ($_SESSION["userlog"] == 1){

        echo "<script>$('.tbl2').hide()</script>";                                                         

        }else if  ($_SESSION["userlog"] == 2){

        echo "<script>$('.tbl1').hide()</script>";
                                                            
        }
    ?>

    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>
    <script src="js/sb-admin.min.js"></script>
    <script>
    $(document).ready(function() {

        var temp = "<?php  echo $_SESSION['ClassNumber'];  ?>";
        var votes = [];
        var urls = '';


        $('#userName').html("Class Number : " + temp +
            "<sub><i class='fas fa-circle text-success on'></i></sub> ");

        var count = 0;
        var truth = false;

        $('.single-checkbox').on('change', function() {
            count = $('.single-checkbox:checked').length;
            if ($('.single-checkbox:checked').length > 9) {
                this.checked = false;
                swal("Check Vote!", "You can only up to Choose 9 Candidates", "error");
            }

        });

        $(".sub").click(function() {
            if (count < 9) {
                swal("Check Vote!", "You must Choose 9 Candidates\nPlease check your Vote", "error");
            } else {
                urls = $(this).attr("id") + ".php";
                var votes = []
                $.each($(".single-checkbox:checked"), function() {
                    votes.push($(this).val());
                });


                swal({
                    title: 'Confirm vote',
                    text: "Your Vote will be Submitted\nDo you want to Continue?",
                    icon: "warning",
                    buttons: ['Cancel', 'Submit'],
                    dangerMode: true,

                })
                $(".swal-button--danger").click(
                    function() {
                        $.ajax({
                            url: urls,
                            type: 'POST',
                            data: {
                                votes: votes
                            },
                            success: function(response) {
                                swal("Success!", "Your Vote is successfully Submitted!",
                                    "success")
                                window.location.href = "thankyou.php"
                            }
                        });
                    });
            }
        });
    });
    </script>


</body>

</html>
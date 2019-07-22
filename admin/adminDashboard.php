<?php 
        session_start();
        require_once "config.php";

        if ($_SESSION['logins'] == false) {
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
    <meta name="author" content="yol torres">

    <title>Dashboard</title>
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="css/sb-admin.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
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

    .footer {
        height: 50px;
        bottom: 0;
        padding-top: 2.5px;
    }
    </style>

</head>

<body id="page-top">

    <nav class="navbar navbar-expand navbar-dark bg-dark static-top">

        <a class="navbar-brand mr-1" id="title" href="adminpanel.php"><img class="logo"
                src="https://www.passerellesnumeriques.org/wp-content/uploads/2016/03/pn-logo.png">SBO ELECTION
            2019</a>
            <!-- Navbar Search -->
            <div class="d-none d-md-inline-block form-inline ml-auto mr-0 mr-md-3 my-2 my-md-0">
                <div class="input-group">

                </div>
            </div>
            </div>

            <!-- Navbar -->
            <ul class="navbar-nav">
                <li class="nav-item active">
                    <a class="nav-link" href="adminpanel.php"><span> <i class="fas fa-home fa-fw"
                                id="userIcon"></i></span></a>
                </li>
            </ul>
            <ul class="navbar-nav ml-auto ml-md-0">
                <li class="nav-item dropdown no-arrow">
                    <p class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown"
                        aria-haspopup="true" aria-expanded="false">
                        <i class="fas fa-user-circle fa-fw" id="userIcon"></i>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="userDropdown">
                            <a class="dropdown-item" href="results.php">Results</a>
                            <div class="dropdown-divider"></div>
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
                <small>
                    <h4>Dashboard<small> <sub><small> </small></sub></small>
                </small></h4>
                <hr>

                <div class="row">
                        <div class="col-md-2">
                            <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist"
                                aria-orientation="vertical">
                                <a class="nav-link active" id="v-pills-home-tab" data-toggle="pill" href="#v-pills-home"
                                    role="tab" aria-controls="v-pills-home" aria-selected="true">Class 2021</a>
                                <a class="nav-link" id="v-pills-profile-tab" data-toggle="pill" href="#v-pills-profile"
                                    role="tab" aria-controls="v-pills-profile" aria-selected="false">Class 2022</a>
                            </div>

                </div>
                <div class="col-md-10">
                    <div class="tab-content" id="v-pills-tabContent">
                        <div class="tab-pane fade show active" id="v-pills-home" role="tabpanel"
                            aria-labelledby="v-pills-home-tab">
                            <!-- Nav tabs -->
                            <ul class="nav nav-tabs" id="myTab" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab"
                                        aria-controls="home" aria-selected="true">Candidates</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab"
                                        aria-controls="profile" aria-selected="false">Voters</a>
                                </li>
                            </ul>

                            <!-- Tab panes -->
                            <div class="tab-content">
                                <br>
                                <div class="tab-pane active" id="home" role="tabpanel" aria-labelledby="home-tab">
                                    <div class="card mb-3 " id="bdgtbl">
                                        <div class="card-header">
                                            <i class="fas fa-user-friends"></i>
                                            Candidates</div>
                                        <div class="card-body vtbl">
                                            <!--  -->
                                            <div class="table-responsive tbl2">
                                                <table id="candintbl" class=" text-center table table-bordered"
                                                    id="dataTable" width="100%" cellspacing="0">
                                                    <thead>
                                                        <tr class="table-striped">
                                                            <th>Candidate Number</th>
                                                            <th>Name</th>
                                                        </tr>
                                                    </thead>

                                                    <tbody>
                                                        <?php
                                                                $sql = "SELECT
                                                                tblVoter.Name as name
                                                                FROM 
                                                                tblCandidates 
                                                                JOIN tblVoter ON tblCandidates.ClassNumber = tblVoter.ClassNumber
                                                                GROUP BY tblCandidates.ClassNumber";

                                                                
                                                                $result = $link->query($sql);
                                                                $rank = 1;
                                                                if ($result->num_rows > 0) {

                                                                    while ($row = $result->fetch_assoc()) {
                                                                        echo "<tr>";

                                                                        echo "<td>". $rank."</td>";
                                                                        echo "<td>".$row['name']."</td>";
                                                                        echo "</tr>";
                                                                        ++$rank;
                                                                        }
                                                                }
                                                            ?>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                                    <div class="card mb-3" id="bdgtbl">
                                        <div class="card-header">
                                            <i class="fas fa-users"></i>
                                            Voters</div>
                                        <div class="card-body vtbl">
                                            <div class="table-responsive tbl2">
                                                <table id="candintbl" class=" text-center table table-bordered"
                                                    id="dataTable">
                                                    <thead>
                                                        <tr class="table-striped">
                                                            <th>Voter Number</th>
                                                            <th>Name</th>
                                                            <th>Already Voted?</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody id="tbody1">
                                                    </tbody>
                                                </table>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                            </div>


                        </div>
                        <div class="tab-pane fade" id="v-pills-profile" role="tabpanel"
                            aria-labelledby="v-pills-profile-tab">
                            <ul class="nav nav-tabs" id="myTab2" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home2" role="tab"
                                        aria-controls="home" aria-selected="true">Candidates</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile2" role="tab"
                                        aria-controls="profile" aria-selected="false">Voters</a>
                                </li>
                            </ul>

                            <div class="tab-content">
                                <br>
                                <div class="tab-pane active" id="home2" role="tabpanel" aria-labelledby="home-tab">
                                    <div class="card mb-3 " id="bdgtbl">
                                        <div class="card-header">
                                            <i class="fas fa-user-friends"></i>
                                            Candidates</div>
                                        <div class="card-body vtbl">
                                            <div class="table-responsive tbl1">
                                                <table class=" text-center table table-bordered" id="dataTable"
                                                    width="100%" cellspacing="0">
                                                    <thead>
                                                        <tr class="table-striped">
                                                            <th>Candidate Number</th>
                                                            <th>Name</th>
                                                        </tr>
                                                    </thead>

                                                    <tbody>
                                                        <?php
                                                                $sql = "SELECT
                                                                tblVoter2.Name as name
                                                                FROM 
                                                                tblCandidates2 
                                                                JOIN tblVoter2 ON tblCandidates2.ClassNumber = tblVoter2.ClassNumber 
                                                                GROUP BY 
                                                                tblCandidates2.ClassNumber";

                                                                
                                                                $result = $link->query($sql);
                                                                $rank = 1;
                                                                if ($result->num_rows > 0) {

                                                                    while ($row = $result->fetch_assoc()) {
                                                                        echo "<tr>";

                                                                        echo "<td>". $rank."</td>";
                                                                        echo "<td>".$row['name']."</td>";
                                                                        echo "</tr>";
                                                                        ++$rank;
                                                                        }
                                                                }
                                                            ?>



                                                    </tbody>
                                                </table>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane" id="profile2" role="tabpanel" aria-labelledby="profile-tab">
                                    <div class="card mb-3" id="bdgtbl">
                                        <div class="card-header">
                                            <i class="fas fa-users"></i>
                                            Voters</div>
                                        <div class="card-body vtbl">
                                            <div class="table-responsive tbl1">
                                                <table id="candintbl" class=" text-center table table-bordered"
                                                    id="dataTable">
                                                    <thead>
                                                        <tr class="table-striped">
                                                            <th>Voter Number</th>
                                                            <th>Name</th>
                                                            <th>Already Voted?</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody id="tbody2">
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>





            <!-- Tab panes -->

        </div>


    </div>

    </div>
    </div>
    <br>
    <br>
    <br>

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
                    <a class="btn btn-primary" href="logout.php">Logout</a>
                </div>
            </div>
        </div>
    </div>

    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>
    <script src="js/sb-admin.min.js"></script>
    <script src="js/yol.js"></script>

    <script>
    $("ul.nav-tabs a").click(function(e) {
        e.preventDefault();
        $(this).tab('show');
    });
    </script>

    <?php
              if ($_SESSION["user"] == "1styrEducators"){

                echo "<script>$('.tbl2').hide()</script>";                                                         


                }else if  ($_SESSION["user"] == "2ndYrEducators"){

                echo "<script>$('.tbl1').hide()</script>";                                                         
                }
               
        ?>

          <script>
        $(document).ready(function() {
            function tbaleIt(url , tbl){
                $.getJSON(url, function(data) {
                $(function() {
                    var table = $(tbl);
                    var td = "<td>";
                    if (data.length != 0) {
                        for (let i = 0; i < data.length; i++) {
                        var row = '<tr>';
                            var temp = 'no';
                            if (data[i]["Status"] == 'True') {
                                temp = "yes";
                               row = "<tr class = 'table-success'>";
                            }
                            $(table).append(
                                $(row).append(
                                    $(td).html(data[i]["ClassNumber"]) , $(td).html(data[i]['Name']) ,  $(td).html(temp)
                                )
                            );
                    }
                    } else {
                        $(table).append("Voters List is currently Empty");
                    }

                });
            });
            } //end of function

            tbaleIt("configs/2021list.php",'#tbody1');      
            tbaleIt("configs/2022list.php",'#tbody2');      
            
        });
        </script>


</body>

</html>
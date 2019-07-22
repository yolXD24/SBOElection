<?php 
    session_start();
    // ini_set('display_errors', 1);
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

    <title>Result</title>
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="css/sb-admin.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
    <script type="text/javascript" src="js/saveAsExcel.js"></script>

    <script src="js/yol.js"></script>


    <style>
    .vtbl {
        height: 500px;
        overflow: auto;
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
    </style>

</head>

<body id="page-top">

    <nav class="navbar navbar-expand navbar-dark bg-dark static-top">

        <a class="navbar-brand mr-1" id="title" href="adminpanel.php">SBO ELECTION 2019</a>
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
                        <a class="dropdown-item" href="dashboard.php">Dashboard</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                            Logout</a>
                    </div>
            </li>
        </ul>
    </nav>


    <div id="wrapper">
        <div id="content-wrapper">
            <div class="container-fluid">
                <small>
                    <h4>Results<small> <sub><small> </small></sub></small>
                </small></h4>
                <hr>
                <!-- Tab panes -->
                <div class="tab-content container-fluid ">
                    <ul class="nav nav-tabs" id="myTab2" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home2" role="tab"
                                aria-controls="home" aria-selected="true">Batch 2022</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile2" role="tab"
                                aria-controls="profile" aria-selected="false">Batch 2021</a>
                        </li>
                    </ul>
                    <div class="tab-content">
                        <div id="home2" class="tab-pane  active">
                            <br>
                            <div class="card mb-3 tbl1 ">
                                <div class="card-header">
                                    <i class="fas fa-user-friends"></i>
                                    Candidates</div>
                                <div class="card-body">
                                    <div class="table-responsive">

                                        <?php         
                                                                                                                                                                                          
                                                    $sql = "SELECT DISTINCT 
                                                    tblVoter2.Name as name, 
                                                    COUNT(tblVotes2.CandidateId) AS Votes 
                                                    FROM 
                                                    tblCandidates2
                                                    JOIN tblVoter2 ON tblCandidates2.ClassNumber = tblVoter2.ClassNumber 
                                                    left JOIN tblVotes2 on tblCandidates2.CandidateId = tblVotes2.CandidateId 
                                                    GROUP BY 
                                                    tblCandidates2.CandidateId order by Votes desc ";
                                                    
                                                    $result = $link->query($sql);
                                                    if ($result->num_rows > 0) {
                                                        $result2022 = ' 
                                                        <table id="tbl2022" border = "1px" class="table table-bordered" id="dataTable" width="100%"
                                                        cellspacing="0">
                                                        <thead>
                                                            <tr class="text-center table-striped">
                                                                <th>Rank</th>
                                                                <th>Name</th>
                                                                <th>Votes</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>';
                                                        $rank = 1;
                                                        while ($row = $result->fetch_assoc()) {
                                                            $result2022 .= '
                                                                    <tr class="text-center table-hover">  
                                                                        <td>'.$rank.'</td>  
                                                                        <td>'.$row["name"].'</td>  
                                                                        <td>'.$row["Votes"].'</td>
                                                                    </tr>';
                                                            ++$rank;
                                                            
                                                            }
                                                            $result2022 .= '  </tbody>
                                                            </table>';
                                                            echo $result2022;
                                                    }else{
                                                        echo 'No results found.';
                                                    }
                                                    ?>
                                        <!-- </tbody>
                                        </table> -->
                                            <input type="button" name="export" class="btn btn-success btn-sm"
                                                value="Export result as Excel"  onclick="saveAsExcel('tbl2022', 'Batch2022Result.xls')" />

                                    </div>
                                </div>
                            </div>
                        </div>
                        <div id="profile2" class="tab-pane fade">
                            <br>
                            <div class="card mb-3 tbl2 ">
                                <div class="card-header">
                                    <i class="fas fa-user-friends"></i>
                                    Candidates</div>
                                <div class="card-body">
                                    <div class="table-responsive">
                                        <?php                                                                                                                                                   
                                                    $sql = "SELECT DISTINCT 
                                                    tblVoter.Name as name, 
                                                    COUNT(tblVotes.CandidateId) AS Votes 
                                                    FROM 
                                                    tblCandidates 
                                                    JOIN tblVoter ON tblCandidates.ClassNumber = tblVoter.ClassNumber 
                                                    left JOIN tblVotes on tblCandidates.CandidateId = tblVotes.CandidateId 
                                                    GROUP BY 
                                                    tblCandidates.CandidateId order by Votes desc ";
                                                    
                                                    $result = $link->query($sql);
                                                    if ($result->num_rows > 0) {
                                                        $result2021 = ' 
                                                        <table id="tbl2021"  border = "1px" class="table table-bordered" id="dataTable" width="100%"
                                                        cellspacing="0">
                                                        <thead>
                                                            <tr class="text-center table-striped">
                                                                <th>Rank</th>
                                                                <th>Name</th>
                                                                <th>Votes</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>';
                                                        $rank = 1;
                                                        while ($row = $result->fetch_assoc()) {
                                                            $result2021 .= '
                                                                    <tr class="text-center table-hover">  
                                                                        <td>'.$rank.'</td>  
                                                                        <td>'.$row["name"].'</td>  
                                                                        <td>'.$row["Votes"].'</td>
                                                                    </tr>';
                                                            ++$rank;
                                                            
                                                            }
                                                            $result2021 .= '  </tbody>
                                                            </table>';
                                                            echo $result2021;
                                                    }else{
                                                        echo 'No results found.';
                                                    }

                                                    ?>
                                                      <input type="button" name="export" class="btn btn-success btn-sm"
                                                value="Export result as Excel"  onclick="saveAsExcel('tbl2021', 'Batch2021Result.xls')" />
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>

                </div>
            </div>
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
    <?php
              if ($_SESSION["user"] == "1styrEducators"){

                echo "<script>$('#profile-tab').hide()</script>";                                                         


                }else if  ($_SESSION["user"] == "2ndYrEducators"){

                echo "<script>$('#home-tab').hide()</script>";
                echo "<script>$('#home2').hide()</script>";
                echo "<script>$('#profile-tab').addClass('active')</script>";
                echo "<script>$('#profile2').addClass('fade active show')</script>";                                                                                           
                }
               
        ?>
    <script>
    $(document).ready(function() {

    });
    </script>


</body>

</html>
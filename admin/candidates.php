<?php 
    session_start();
    ini_set('display_errors',1);
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

    <title>Candidates</title>
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


    body {
        overflow-x: hidden;
    }

    .vtbl th,
    .vtbl td {
        font-size: 14px;
    }

    .addC {
        float: right;
    }

    .btn {
        padding: 2px 6px;
    }

    .modal-header {
        background: #009DE1;
        color: white;
    }

    .modal-header img {
        height: 50px;
        margin-right: 15em;
    }

    #sub,
    #sub2 {
        padding: 10px;
        font-weight: bold;
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
                    <h4>Manage Candidates<small> <sub><small> </small></sub>
                        </small>
                </small>
                </h4>
                <hr>

                <div class="card mb-3 " id="bdgtbl">
                    <div class="card-header">
                        <i class="fas fa-user-friends"></i> Candidates
                        <span><button class="btn btn-primary addC" data-toggle="modal" data-target="#Add"><i
                                    class="fas fa-user-plus"></i> Add
                                Candidates</button></span>
                    </div>

                    <div class="card-body vtbl">
                        <div class="table-responsive tbl1">
                            <h4 class="text-center">Batch 2022</h4>
                            <br>
                            <table id="candintbl" class=" text-center table table-bordered" id="dataTable" width="100%"
                                cellspacing="0">
                                <thead>
                                    <tr class="table-striped">
                                        <th>No.</th>
                                        <th>Name</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>

                                <tbody>
                                    <?php
                                        $sql = "SELECT
                                        tblVoter2.Name as name, tblCandidates2.CandidateId as ids,tblCandidates2.CLassNumber as cn
                                        FROM 
                                        tblCandidates2 
                                        JOIN tblVoter2 ON tblCandidates2.ClassNumber = tblVoter2.ClassNumber 
                                        left JOIN tblVotes2 on tblCandidates2.CandidateId = tblVotes2.CandidateId 
                                        GROUP BY 
                                        tblCandidates2.CandidateId";

                                        $resultx = $link->query($sql);
                                        $rank = 1;
                                        if ($resultx->num_rows > 0) {

                                            while ($row = $resultx->fetch_assoc()) {
                                                echo "<tr>";
                                                echo "<td>". $rank."</td>";
                                                echo "<td>".$row['name']."</td>";
                                                echo '<td><button class="btn btn-primary deleteRow" id="1st_' . 
                                                $row['ids'] .'" ><i class="fas fa-trash " ></i> Delete</button></td>';
                                                echo "</tr>";
                                                ++$rank;
                                                }
                                        }
                                        ?>



                                </tbody>
                            </table>
                        </div>
                        <br>
                        <div class="table-responsive tbl2">
                            <h4 class="text-center">Batch 2021</h4>
                            <br>
                            <table id="candintbl" class=" text-center table table-bordered" id="dataTable" width="100%"
                                cellspacing="0">
                                <thead>
                                    <tr class="table-striped">
                                        <th>No.</th>
                                        <th>Name</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>

                                <tbody>
                                    <?php
                                        $sql = "SELECT
                                        tblVoter.Name as name, 
                                        COUNT(tblVotes.CandidateId) AS Votes ,tblCandidates.CandidateId as ids,tblCandidates.CLassNumber as cn
                                        FROM 
                                        tblCandidates 
                                        JOIN tblVoter ON tblCandidates.ClassNumber = tblVoter.ClassNumber 
                                        left JOIN tblVotes on tblCandidates.CandidateId = tblVotes.CandidateId 
                                        GROUP BY 
                                        tblCandidates.ClassNumber";
                                            
                                        $result = $link->query($sql);
                                        $rank = 1;
                                        if ($result->num_rows > 0) {
                                            while ($row = $result->fetch_assoc()) {
                                                echo "<tr>";
                                                echo "<td>". $rank."</td>";
                                                echo "<td>".$row['name']."</td>";
                                                echo '<td><button class="btn btn-primary deleteRow" id="2nd_' . 
                                                $row['ids'] ."_".$row['cn']. '" ><i class="fas fa-trash " ></i> Delete</button></td>';
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

                <!-- The Modal -->
                <div class="modal fade" id="Add">
                    <div class="modal-dialog modal-xl">
                        <div class="modal-content">

                            <!-- Modal Header -->
                            <div class="modal-header">
                                <span><img src="logo.png" alt="pnlogo"></span>
                                <h3 class="modal-title "><b> Select Candidates</b></h3>
                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                            </div>

                            <!-- Modal body -->
                            <div class="modal-body">

                                <form action="add1.php" method="POST" class='tbl1'>
                                    <hr>
                                    <div class="row">

                                        <div class="col-md-4">
                                            <?php 
                                                $sq1 = "SELECT ClassNumber as cn ,Name as name from tblVoter2 where ClassNumber Between 2 and 24";
                                                $id = 101;	
                                                $result = $link->query($sq1);
                                                if ($result->num_rows > 0) {

                                                    while ($row = $result->fetch_assoc()) {
                                                        echo '<div class="custom-control custom-checkbox">';
                                                        echo "";
                                                        echo '<input type="checkbox" class="custom-control-input single-checkbox" value="'.$row["cn"].'" id="customCheck'.$id.'" name="candid[]">';
                                                        echo "";
                                                        echo '<label class="custom-control-label" for="customCheck'.$id.'">'.$row["name"].'</label>';
                                                        echo "";
                                                        echo '</div>';
                                                        $id+=1;
                                                        
                                                    }
                                                }

                                            ?>
                                        </div>
                                        <div class="col-md-4">
                                            <?php 
                                                $sql = "SELECT ClassNumber as cn ,Name as name from tblVoter2 where ClassNumber Between 25 and 48";
                                                $id = 125;	
                                                $result = $link->query($sql);
                                                if ($result->num_rows > 0) {

                                                    while ($row = $result->fetch_assoc()) {
                                                        echo '<div class="custom-control custom-checkbox">';
                                                        echo "";
                                                        echo '<input type="checkbox" class="custom-control-input single-checkbox" value="'.$row["cn"].'" id="customCheck'.$id.'" name="candid[]">';
                                                        echo "";
                                                        echo '<label class="custom-control-label" for="customCheck'.$id.'">'.$row["name"].'</label>';
                                                        echo "";
                                                        echo '</div>';
                                                        $id+=1;		
                                                    }
                                                }
                                            ?>
                                        </div>
                                        <div class="col-md-4">
                                            <?php 
                                                $sql = "SELECT ClassNumber as cn ,Name as name from tblVoter2 where ClassNumber Between 49 and 72";
                                                $id = 149;	
                                                $result = $link->query($sql);
                                                if ($result->num_rows > 0) {
                                                    while ($row = $result->fetch_assoc()) {
                                                        echo '<div class="custom-control custom-checkbox">';

                                                        echo '<input type="checkbox" class="custom-control-input single-checkbox" value="'.$row["cn"].'" id="customCheck'.$id.'" name="candid[]">';

                                                        echo '<label class="custom-control-label" for="customCheck'.$id.'">'.$row["name"].'</label>';

                                                        echo '</div>';
                                                        $id+=1;
                                                    }
                                                }
                                        
                                                ?>
                                        </div>
                                    </div>
                                    <br>
                                    <div class="modal-footer">
                                        <input type="button" id="tbl1" value="confirm" class="btn btn-primary subd">
                                    </div>
                                </form>
                                <hr>
                                <form action="add.php" method="POST" class='tbl2'>

                                    <div class="row">

                                        <div class="col-md-4" id="col12021">
                                            <?php 
                                                $sql = "SELECT ClassNumber as cn ,Name as name from tblVoter where ClassNumber Between 1 and 24";
                                                $id = 1;	
                                                $result = $link->query($sql);
                                                if ($result->num_rows > 0) {

                                                    while ($row = $result->fetch_assoc()) {
                                                        echo '<div class="custom-control custom-checkbox">';

                                                        echo '<input type="checkbox" class="custom-control-input single-checkbox" value="'.$row["cn"].'" id="customCheck'.$id.'" name="candid[]">';

                                                        echo '<label class="custom-control-label" for="customCheck'.$id.'">'.$row["name"].'</label>';
    
                                                        echo '</div>';
                                                        $id+=1;
                                                        
                                                    }
                                                }

                                            ?>
                                        </div>


                                        <div class="col-md-4" id="col12021b">
                                            <?php 
                                                    $sql = "SELECT ClassNumber as cn ,Name as name from tblVoter where ClassNumber Between 25 and 48";
                                                    $id = 25;	
                                                    $result = $link->query($sql);
                                                    if ($result->num_rows > 0) {

                                                        while ($row = $result->fetch_assoc()) {
                                                            echo '<div class="custom-control custom-checkbox">';

                                                            echo '<input type="checkbox" class="custom-control-input single-checkbox" value="'.$row["cn"].'" id="customCheck'.$id.'" name="candid[]">';

                                                            echo '<label class="custom-control-label" for="customCheck'.$id.'">'.$row["name"].'</label>';

                                                            echo '</div>';
                                                            $id+=1;		
                                                        }
                                                    }
                                                ?>
                                        </div>
                                        <div class="col-md-4" id="col12021c">
                                            <?php 
                                                $sql = "SELECT ClassNumber as cn ,Name as name from tblVoter where ClassNumber Between 49 and 72";
                                                $id = 49;	
                                                $result = $link->query($sql);
                                                if ($result->num_rows > 0) {

                                                    while ($row = $result->fetch_assoc()) {
                                                        echo '<div class="custom-control custom-checkbox">';
                                                        echo "";
                                                        echo '<input type="checkbox" class="custom-control-input single-checkbox" value="'.$row["cn"].'" id="customCheck'.$id.'" name="candid[]">';
                                                        echo "";
                                                        echo '<label class="custom-control-label" for="customCheck'.$id.'">'.$row["name"].'</label>';
                                                        echo "";
                                                        echo '</div>';
                                                        $id+=1;
                                                    }
                                                }
                                                $link->close(); 
                                                ?>
                                        </div>
                                    </div>
                                    <br>
                                    <!-- Modal footer -->
                                    <div class="modal-footer">
                                        <input type="button" id="tbl2" value="confirm" class="btn btn-primary subd">
                                    </div>
                                </form>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
    <br>
    <br>
    <br>
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
                    <a class="btn btn-primary" href="logout.php">Logout</a>
                </div>
            </div>
        </div>
    </div>

    <?php
        if ($_SESSION["user"] == "1styrEducators"){

        echo "<script>$('.tbl2').hide()</script>";                                                         
        }else if  ($_SESSION["user"] == "2ndYrEducators"){
        echo "<script>$('.tbl1').hide()</script>";                                                         
        }
        
    ?>
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>
    <script src="js/sb-admin.min.js"></script>
    <script>
    $(document).ready(function() {

        // function formIt(min, max, col, url) {

        //     $.getJSON(url, function(data) {
        //         // var min = min;
        //         // var max = max;
        //         var cols = col;
        //         var div = '<div class="custom-control custom-checkbox">';
        //         var input =
        //             '<input type="checkbox" class="custom-control-input single-checkbox" name="candid[]">'; //id="customCheck'.$id.'"
        //         var label = '<label class="custom-control-label" ></label>' //for="customCheck'.$id.'"
        //             if (data.length != 0) {
        //                 for (var i = (min - 1); i < max; i++) {
        //                     var ids = "customCheck" + (data[i].ClassNumber);
        //                     // $(input);
        //                     // // $(label).attr('for', ids);
        //                     // console.log($(label))
        //                     $(div).append($(input).attr('id', ids).val(i+1),$(label).html(data[i].Name).attr('for',ids)).appendTo($(cols))

        //                 }
        //             }
        //     });
        // }
        // formIt(1, 24, '#col12021', 'configs/2021list.php');
        // formIt(25, 48, '#col12021b', 'configs/2021list.php');
        // formIt(49, 72, '#col12021c', 'configs/2021list.php');

        $('.deleteRow').click(function() {
            var url = 'deleteCandidates.php';
            var num = this.id.split('_');
            if (num[0] == '1st') {
                url = 'del2.php';
            }

            var row = this;
            $.ajax({
                url: url,
                type: 'POST',
                data: {
                    id: num[1],
                    cn: num[2],

                },
                success: function(response) {

                    if (response == 1) {
                        swal("Success!",
                            "Candidate Deleted Successfully!",
                            "success");
                        $(row)
                            .closest('tr')
                            .css('background', 'skyblue')
                        $(row)
                            .closest('tr')
                            .fadeOut(800, function() {
                                $(row).remove()
                                location.reload();
                            })
                    } else {

                    }
                }
            })
        });

        var count = 0;
        var truth = false;

        $('.single-checkbox').on('change', function() {
            count = $('.single-checkbox:checked').length;
            if (count > 18) {
                this.checked = false;
                swal("Stop!", "You can only choose up to 18 Candidates!", "warning");
            }
        });
        
        $('.subd').click(function() {
            var form = "." + $(this).attr("id");
            swal({
                title: 'Confirmation',
                text: "This following students will be added to Candidated' list! in ",
                icon: "warning",
                buttons: ['Cancel', 'Submit'],
                dangerMode: true,

            })
            $(".swal-button--danger").click(
                function() {
                    if (count > 0) {
                        $(form).submit();
                        swal("Added Successfully!", "Selected Candidated are added Successfully!",
                            "success")
                    } else {
                        swal("Error!", "Must Chooste at least 1!", "error");
                    }
                });
        });
    });
    </script>
</body>

</html>
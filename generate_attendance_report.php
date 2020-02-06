<!DOCTYPE html>
<?php     
    require_once 'db.php';
    require_once 'dbconfig.php';
    
    session_start();
    $role = $_SESSION['sess_userrole'];
    if(!isset($_SESSION['sess_username']) && $role!="instructor"){
      header('Location: login.php?err=2');
    }
?>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>ASTU Student Attendance System</title>

    <link rel="icon" type="image/gif" href="logo.png" />
    <!-- Bootstrap Core CSS -->
    <link href="bower_components/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- MetisMenu CSS -->
    <link href="bower_components/metisMenu/dist/metisMenu.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="dist/css/sb-admin-2.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="bower_components/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

    <link href="vendors/datatables.net-bs/css/dataTables.bootstrap.min.css" rel="stylesheet">
    <link href="vendors/datatables.net-buttons-bs/css/buttons.bootstrap.min.css" rel="stylesheet">
    <link href="vendors/datatables.net-fixedheader-bs/css/fixedHeader.bootstrap.min.css" rel="stylesheet">
    <link href="vendors/datatables.net-responsive-bs/css/responsive.bootstrap.min.css" rel="stylesheet">
    <link href="vendors/datatables.net-scroller-bs/css/scroller.bootstrap.min.css" rel="stylesheet">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>
    <div id="wrapper">

        <!-- Navigation -->
        <nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
          <a class="navbar-brand" href="home.php" style="padding-left:00px; padding-top:0px;"> <h3 align="left"><img src="2.jpg" width="300" height="30"></h3></a>
            </div>
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav navbar-right">
                 <li><a href="teachertable.php">Teacher Table</a></li>
                <li><a href="studenttable.php">Student Table</a></li>
               
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#"  >
                        <i class="fa fa-user fa-fw" style="padding-right:20px;"></i> <?php echo $_SESSION['sess_username'];?>
                    </a>
                    <ul class="dropdown-menu dropdown-user" style="padding-right:50px;">
                        <li><a href="#"><i class="fa fa-user fa-fw" ></i> User Profile</a>
                        </li>
                        <li class="divider"></li>
                        <li><a href="logout.php"><i class="fa fa-sign-out fa-fw"></i> Signout</a>
                        </li>
                    </ul>
                    <!-- /.dropdown-user -->
                </li>
              </ul>
            </div>
            <!-- /.navbar-static-side -->
        </nav>

  <div class="container">
  <div class="row">      
  <p>
        <h4>Attendance for</h4>
        <hr>
      <ul>
          <li>Department: <b><?php echo $_POST['dep'] ?></b></li>
          <li>Stream: <b><?php echo $_POST['stream'] ?></b></li>
          <li>Course: <b>
          <?php 
                  $sqlc = "SELECT * FROM course where ccode=".$_POST['course'];
                 
                  $resultc = $con->query($sqlc);

                  if ($resultc->num_rows > 0) {
                      // output data of each row
                      
                      while($row = $resultc->fetch_assoc()) {
                          
                          echo $row['cname']."(".$row['ccode'].")";
                      }
                  }

                  ?></b>
          </li>
          <li>Month: <b><?php 
            $dateObj= DateTime::createFromFormat('!m',$_POST['date']);
            echo $dateObj->format('F');
          ?></b></li>
      </ul>
  </p>        
        <table class="display compact" id="dte" border="1" style="width: 100%;">
        <thead>
            <tr>

                <th>Id</th>
                <th>Student name</th>
                <?php
                    $d = cal_days_in_month(CAL_GREGORIAN,$_POST['date'],2018);
                    for ($i=1; $i <= $d; $i++) { 
                        echo "<th>".$i."</th>";
                    }
                    
                ?>
            </tr>
        </thead>
        <tbody>
            <?php
            $sql = "SELECT * from student where student.dep ='".$_POST['dep']."' and student.stream = '".$_POST['stream']."'";                   
            $result = $con->query($sql);

            if ($result->num_rows > 0) {
                // output data of each row
                
                while($row = $result->fetch_assoc()) {
                    echo "<tr>";
                    echo "<td>".$row['s_Id']."</td>";
                    echo "<td>".$row['fname']." ".$row['mname']." ".$row['lname']."</td>";

                    
                    $dd = cal_days_in_month(CAL_GREGORIAN,$_POST['date'],date("Y"));
                    for ($j=1; $j <= $dd; $j++) { 

                        $ddt=mktime(10, 10, 10, $_POST['date'], $j, date("Y"));
                        // echo "Created date is " . date("Y-m-d", $d);

                        $sqlz = "SELECT * FROM attendance where ccode=".$_POST['course']." and attendance.date= '".date("Y-m-d", $ddt)."' and s_Id = ".$row['s_Id'];
                        
                        $resultz = $con->query($sqlz);

                        if ($resultz->num_rows > 0) {
                            echo "<td>p</td>";
                        }
                        else{
                            echo "<td>-</td>";
                        }
                    }

                echo "</tr>";
                }
            }
            $con->close();
            ?>
        </tbody> 
      </table>
    </div>
</div>

        <!-- /#page-wrapper -->
        

    </div>
    <!-- /#wrapper -->

    <!-- jQuery -->
    <script src="vendors/jquery/dist/jquery.min.js"></script>
    <!-- Bootstrap -->
    <script src="vendors/bootstrap/dist/js/bootstrap.min.js"></script>
    <!-- FastClick -->
    <script src="vendors/fastclick/lib/fastclick.js"></script>
    <!-- NProgress -->
    <script src="vendors/nprogress/nprogress.js"></script>
    <!-- iCheck -->
    <script src="vendors/iCheck/icheck.min.js"></script>
    <!-- Datatables -->
    <script src="vendors/datatables.net/js/jquery.dataTables.min.js"></script>
    <script src="vendors/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
    <script src="vendors/datatables.net-buttons/js/dataTables.buttons.min.js"></script>
    <script src="vendors/datatables.net-buttons-bs/js/buttons.bootstrap.min.js"></script>
    <script src="vendors/datatables.net-buttons/js/buttons.flash.min.js"></script>
    <script src="vendors/datatables.net-buttons/js/buttons.print.min.js"></script>
    <script src="vendors/datatables.net-fixedheader/js/dataTables.fixedHeader.min.js"></script>
    <script src="vendors/datatables.net-keytable/js/dataTables.keyTable.min.js"></script>
    <script src="vendors/datatables.net-responsive/js/dataTables.responsive.min.js"></script>
    <script src="vendors/datatables.net-responsive-bs/js/responsive.bootstrap.js"></script>
    <script src="vendors/datatables.net-scroller/js/dataTables.scroller.min.js"></script>

    <script src="js/jszip.min.js"></script>
    <script src="vendors/pdfmake/build/pdfmake.min.js"></script>
    <script src="vendors/pdfmake/build/vfs_fonts.js"></script>
    <script src="vendors/datatables.net-buttons/js/buttons.html5.min.js"></script>


    <!-- Custom Theme Scripts -->
    <!-- <script src="build/js/custom.min.js"></script> -->


    <!-- Page-Level Demo Scripts - Tables - Use for reference -->
    <script>
    $(document).ready(function() {
        $('#dte').DataTable({
            "ordering": false,
            dom: 'Bfrtip',
            buttons: [
                'excelHtml5',
                'csvHtml5',
                'pdfHtml5'
            ]
        });
    });
    </script>

</body>

</html>

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

        <div id="container">
            <div class="row">
              <div id="container">
              <br><br><br>
                <div class="col-md-6 col-md-offset-3">
                
                  <h4>Generate attendance report based on the following filters</h4>
                  <hr>
                    <form action="generate_attendance_report.php" method="POST" role="form"> 

                    <?php
                    $sql = "SELECT * FROM course";
                    $result = $con->query($sql);

                    if ($result->num_rows > 0) {
                        // output data of each row
                        echo "<div class='form-group'>";
                        echo "<label>Course</label>";
                        echo "<select name='course' class='form-control' required>";
                        while($row = $result->fetch_assoc()) {
                            // echo "id: " . $row["cname"]. " - Name: ";
                            echo "<option value=".$row['ccode'].">".$row['cname']."</option>";
                        }
                        echo "</select>";
                        echo "</div>";
                    }

                     $sqld = "SELECT distinct dep FROM student";
                    $resultd = $con->query($sqld);

                    if ($resultd->num_rows > 0) {
                        // output data of each row
                        echo "<div class='form-group'>";
                        echo "<label>Department</label>";
                        echo "<select name='dep' class='form-control' required>";
                        while($row = $resultd->fetch_assoc()) {
                            // echo "id: " . $row["cname"]. " - Name: ";
                            echo "<option value=".$row['dep'].">".$row['dep']."</option>";
                        }
                        echo "</select>";
                        echo "</div>";
                    }

                     $sqls = "SELECT distinct stream FROM student";
                    $results = $con->query($sqls);

                    if ($results->num_rows > 0) {
                        // output data of each row
                        echo "<div class='form-group'>";
                        echo "<label>Stream</label>";
                        echo "<select name='stream' class='form-control' required>";
                        while($row = $results->fetch_assoc()) {
                            // echo "id: " . $row["cname"]. " - Name: ";
                            echo "<option value=".$row['stream'].">".$row['stream']."</option>";
                        }
                        echo "</select>";
                        echo "</div>";
                    }

                    $con->close();
                    ?> 
                    
              
                    <div class="form-group">
                        <label>Month</label>
                        <select name="date" class="form-control" required="">
                          <option value="1">January</option>
                          <option value="2">February</option>
                          <option value="3">March</option>
                          <option value="4">April</option>
                          <option value="5">May</option>
                          <option value="6">June</option>
                          <option value="7">July</option>
                          <option value="8">August</option>
                          <option value="9">September</option>
                          <option value="10">October</option>
                          <option value="11">November</option>
                          <option value="12">December</option>
                        </select> 
                    </div>
                    <button class="btn btn-sm btn-primary" type="submit">Generate</button>
                </form>
                </div>
              </div>
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
    <script src="vendors/datatables.net-buttons/js/buttons.html5.min.js"></script>
    <script src="vendors/datatables.net-buttons/js/buttons.print.min.js"></script>
    <script src="vendors/datatables.net-fixedheader/js/dataTables.fixedHeader.min.js"></script>
    <script src="vendors/datatables.net-keytable/js/dataTables.keyTable.min.js"></script>
    <script src="vendors/datatables.net-responsive/js/dataTables.responsive.min.js"></script>
    <script src="vendors/datatables.net-responsive-bs/js/responsive.bootstrap.js"></script>
    <script src="vendors/datatables.net-scroller/js/dataTables.scroller.min.js"></script>
    <script src="vendors/jszip/dist/jszip.min.js"></script>
    <script src="vendors/pdfmake/build/pdfmake.min.js"></script>
    <script src="vendors/pdfmake/build/vfs_fonts.js"></script>

    <!-- Custom Theme Scripts -->
    <script src="build/js/custom.min.js"></script>
</body>

</html>
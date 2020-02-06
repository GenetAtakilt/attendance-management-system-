<!DOCTYPE html>
<?php 
    error_reporting( ~E_NOTICE ); // avoid notice
    
    require_once 'db.php';
    require_once 'dbconfig.php';
    
    session_start();
    $role = $_SESSION['sess_userrole'];
    if(!isset($_SESSION['sess_username']) && $role!="helpdesk"){
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

    <title>EBC Help Desk</title>

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
                <a class="navbar-brand" href="index.php" style="padding-left:50px; padding-top:0px;"><h3><b>EBC</b></h3></a>
            </div>
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav navbar-right">

                <li><a href="attendance_report.php">Generate Attendance report</a></li>
                <li><a href="helpdesk.php">Help Desk</a></li>
                <li><a href="admintable.php">Admin Table</a></li>
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                        <i class="fa fa-user fa-fw"></i> <?php echo $_SESSION['sess_username'];?>
                    </a>
                    <ul class="dropdown-menu dropdown-user">
                        <li><a href="#"><i class="fa fa-user fa-fw"></i> User Profile</a>
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
              <div class="col-md-10 col-md-offset-1 col-sm-10 col-xs-10">
                <h2 class="page-header">Services Panels</h2>
                <div class="col-md-4 col-sm-6">
                  <div class="panel panel-default text-center">
                    <div class="panel-heading">
                        <span class="fa-stack fa-5x">
                              <i class="fa fa-circle fa-stack-2x text-primary"></i>
                              <i class="fa fa-user fa-stack-1x fa-inverse"></i>
                        </span>
                    </div>
                    <div class="panel-body">
                        <h4>ICT Department</h4>
                        <p>Kebede Nega</p>
                        <p><i class="fa fa-phone"></i><abbr title="Phone"> P</abbr>: 011 2 99 45 26</p>
                        <p><i class="fa fa-clock-o"></i><abbr title="Hours"> H</abbr>: ከሰኞ - ቅዳሜ: ከጠዋቱ 3:00 እስከ 11:00</p>
                        <a href="icttable.php" class="btn btn-primary">Detail</a>
                    </div>
                </div>
              </div>
              <div class="col-md-4 col-sm-6">
                  <div class="panel panel-default text-center">
                    <div class="panel-heading">
                        <span class="fa-stack fa-5x">
                              <i class="fa fa-circle fa-stack-2x text-primary"></i>
                              <i class="fa fa-user fa-stack-1x fa-inverse"></i>
                        </span>
                    </div>
                    <div class="panel-body">
                        <h4>Manager</h4>
                        <p>Brook Abera</p>
                        <p><i class="fa fa-phone"></i><abbr title="Phone"> P</abbr>: 09 40 27 28 79</p>
                        <p><i class="fa fa-clock-o"></i><abbr title="Hours"> H</abbr>: ከሰኞ - አርብ: ከጠዋቱ 3:00 እስከ 11:00</p>
                        <a href="#" class="btn btn-primary">Detail</a>
                    </div>
                </div>
              </div>
              <div class="col-md-4 col-sm-6">
                  <div class="panel panel-default text-center">
                    <div class="panel-heading">
                        <span class="fa-stack fa-5x">
                              <i class="fa fa-circle fa-stack-2x text-primary"></i>
                              <i class="fa fa-user fa-stack-1x fa-inverse"></i>
                        </span>
                    </div>
                    <div class="panel-body">
                        <h4>Finance</h4>
                        <p>Jenberu Abdi</p>
                        <p><i class="fa fa-phone"></i><abbr title="Phone"> P</abbr>: 09 12 88 33 45</p>
                        <p><i class="fa fa-clock-o"></i><abbr title="Hours"> H</abbr>: ከሰኞ - አርብ: ከጠዋቱ 3:00 እስከ 11:00</p>
                        <a href="#" class="btn btn-primary">Detail</a>
                    </div>
                </div>
              </div>
            </div>
            <div class="col-md-10 col-md-offset-1 col-sm-10 col-xs-10">
                <div class="col-md-4 col-sm-6">
                  <div class="panel panel-default text-center">
                    <div class="panel-heading">
                        <span class="fa-stack fa-5x">
                              <i class="fa fa-circle fa-stack-2x text-primary"></i>
                              <i class="fa fa-user fa-stack-1x fa-inverse"></i>
                        </span>
                    </div>
                    <div class="panel-body">
                        <h4>TV</h4>
                        <p>Lensa Abera</p>
                        <p><i class="fa fa-phone"></i><abbr title="Phone"> P</abbr>: 09 23 27 41 73</p>
                        <p><i class="fa fa-clock-o"></i><abbr title="Hours"> H</abbr>: ከሰኞ - አርብ: ከጠዋቱ 3:00 እስከ 11:00</p>
                        <a href="#" class="btn btn-primary">Detail</a>
                    </div>
                </div>
              </div>
              <div class="col-md-4 col-sm-6">
                  <div class="panel panel-default text-center">
                    <div class="panel-heading">
                        <span class="fa-stack fa-5x">
                              <i class="fa fa-circle fa-stack-2x text-primary"></i>
                              <i class="fa fa-user fa-stack-1x fa-inverse"></i>
                        </span>
                    </div>
                    <div class="panel-body">
                        <h4>Radio</h4>
                        <p>Mubark Kemal</p>
                        <p><i class="fa fa-phone"></i><abbr title="Phone"> P</abbr>: 09 12 74 53 00</p>
                        <p><i class="fa fa-clock-o"></i><abbr title="Hours"> H</abbr>: ከሰኞ - አርብ: ከጠዋቱ 3:00 እስከ 11:00</p>
                        <a href="#" class="btn btn-primary">Detail</a>
                    </div>
                </div>
              </div>
              <div class="col-md-4 col-sm-6">
                  <div class="panel panel-default text-center">
                    <div class="panel-heading">
                        <span class="fa-stack fa-5x">
                              <i class="fa fa-circle fa-stack-2x text-primary"></i>
                              <i class="fa fa-user fa-stack-1x fa-inverse"></i>
                        </span>
                    </div>
                    <div class="panel-body">
                        <h4>Department 3</h4>
                        <p>Biruk Mebratu</p>
                        <p><i class="fa fa-phone"></i><abbr title="Phone"> P</abbr>: 09 20 45 22 95</p>
                        <p><i class="fa fa-clock-o"></i><abbr title="Hours"> H</abbr>: ከሰኞ - አርብ: ከጠዋቱ 3:00 እስከ 11:00</p>
                        <a href="#" class="btn btn-primary">Detail</a>
                    </div>
                </div>
              </div>
            </div>
            <div class="col-md-10 col-md-offset-1 col-sm-10 col-xs-10">
                <h2 class="page-header">Send Message</h2>
                <div class="col-md-6 col-sm-6">
                  <div class="panel panel-default text-center">
                    <form action="" method="POST">
                      <textarea rows="3" placeholder="" name="announce"></textarea><br/>

                      <input type="radio" name="tsk" value="announcement"/>Announcement
                      <input type="radio" name="tsk" value="task" />Task<br/>

                      <input type="radio" name="cls" value="cse101"/>ICT DEP.
                      <input type="radio" name="cls" value="cse102" />DEP. 1<br/>

                      <input type="submit" name="submit" value="Send" class="btn btn-success"/>
                    </form>

                    <?php 

                      $conn=mysqli_connect("localhost","root","","ebc");
                      if($conn){/*echo "Connected<br>";*/}
                      else die("could not connect".mysqli_error());
                        
                        date_default_timezone_set('Asia/Dhaka');
                        $dat = date("d-m-y h:i:sa");
                      //insert announcement in desire class table
                      if(isset($_POST['submit'])){
                        $ann = $_POST['announce'];
                        $tsk = $_POST['tsk'];
                        $cls = $_POST['cls']; 
                        $class_insert_qry = "insert into ".$cls."_ann (type,ann,date) values ('$tsk','$ann','$dat');";
                        if(mysqli_query($conn,$class_insert_qry)){
                          echo "<script>alert('Your maessage has been sent')</script>";
                        }
                        else die("error".mysqli_error($conn));


                        //then get the class student id and put the announcement in to student notifation table
                        $get_student="Select * from ".$cls."_student";
                        $get_id=mysqli_query($conn,$get_student);
                        while($r=mysqli_fetch_array($get_id)) {

                          $noti_query = "insert into ".$r['id']."_noti (type,ann,seen_unseen) values ('$tsk','$ann','u');";

                          mysqli_query($conn,$noti_query) or die ("Error".mysqli_error($conn));

                            }
                      }

                    ?>
                  </div>
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


    <!-- Page-Level Demo Scripts - Tables - Use for reference -->
    <script>
    $(document).ready(function() {
        $('#dataTables-example').DataTable({
                responsive: true
        });
    });
    </script>

</body>

</html>

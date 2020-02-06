<!DOCTYPE html>
<?php 
    include ("functions/functions.php");
    error_reporting( ~E_NOTICE ); // avoid notice
    
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

          
           
             <div class="col-md-10 col-md-offset-1 col-sm-10 col-xs-10">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Attendance Report<small></small></h2>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    <div class="col-lg-6">
                   <form role="form" method="post" enctype="multipart/form-data">
                       
                       
                        <div class="form-group">
                            <label>Department</label>
                            <input class="form-control" type="text" name="dep" placeholder="Department" required>
                        </div>
                        <div class="form-group">
                            <label>Stream</label>
                            <input class="form-control" type="text" name="stream" placeholder="Stream"  required>
                        </div>
                        
                         <div class="form-group">
                            <label>Group</label>
                           <input class="form-control" type="text" name="group" placeholder="Group" required>
                        </div>
                          
                        <div class="form-group">
                            <label>Date</label>
                            <input class="form-control" type="text" name="date" placeholder="Date"  required>
                        </div>
                        <div class="form-group">
                            <label>Course Code</label>
                            <input class="form-control" type="text" name="ccode" placeholder="Course Code"  required>
                        </div>
                           <button type="submit" name="insert_post" class="btn btn-primary">Generate Report</button>
                        <a href="teacher.php" class="btn btn-default">Cancel</a>
                    </form>
                                                
                     
                        <?php
                          require_once 'db.php';
    require_once 'dbconfig.php';
    
                        if(isset($_POST['insert_post'])) {
    
    $dep = $_POST['dep'];
    $stream = $_POST['stream'];
    $group = $_POST['group'];
       $ccode = $_POST['ccode'];                       
    $date = $_POST['date'];
                            $S="SELECT  student.fname,
  
  
sum(case when attendance.date =(select distinct attendance.date from attendance order by 1 limit 0,1) then 1 else 0 end) as '06/12/18',
  
sum(case when attendance.date =(select distinct attendance.date from attendance order by 1 limit 1,1) then 1 else 0 end) as 'date2',
sum(case when attendance.date =(select distinct attendance.date from attendance order by 1 limit 2,1) then 1 else 0 end) as 'date2',
sum(case when attendance.date =(select distinct attendance.date from attendance order by 1 limit 3,1) then 1 else 0 end) as 'date2',
sum(case when attendance.date =(select distinct attendance.date from attendance order by 1 limit 4,1) then 1 else 0 end) as 'date2',
sum(case when attendance.date =(select distinct attendance.date from attendance order by 1 limit 5,1) then 1 else 0 end) as 'date2',
sum(case when attendance.date =(select distinct attendance.date from attendance order by 1 limit 6,1) then 1 else 0 end) as 'date2',
  
sum(case when attendance.date =(select distinct attendance.date from attendance  order by 1 limit 7,1) then 1 else 0 end) as 'date3'

FROM attendance inner join student on student.s_Id = attendance.s_Id 

group by student.s_Id order by 1";
                            
                         
                            
                        
                            $result_q=mysqli_query($con, $S);
                             $resultcheck_q= mysqli_num_rows($result_q);
                             if( $resultcheck_q  > 0){
                                    //echo"ggggg"
                            
                                ?>
                        <br><br>
                          <div class="x_content">
                    <p class="text-muted font-13 m-b-30"></p>
                         <table id="datatable-buttons" class="table table-striped table-bordered">
 <thead>
                        <tr>
                           <th>Name</th>
                            <th>01/05/2018</th>
                            <th>02/05/2018</th>
                            <th>03/05/2018</th>
                            <th>05/05/2018</th>
                            <th>08/05/2018</th>
                            <th>11/05/2018</th>
                            <th>16/05/2018</th>
                         
                             
                      </tr>
                      </thead>
                                        <tbody>
                         
                              <?php
                            // $run_pro = mysqli_query($con, $s) or die(mysqli_error($con));
                           while ($row_pro=mysqli_fetch_array($result_q) ) {
                               
                                  $pro_id = $row_pro['s_Id'];
                                  $pro_fname = $row_pro['fname'];
                                  $pro_mname = $row_pro['mname'];
                                  $pro_lname = $row_pro['lname'];
                                  $pro_dep = $row_pro['dep'];
                                   $pro_sex = $row_pro['sex'];
                                  $pro_session = $row_pro['session'];
                                  $pro_phone = $row_pro['sphone'];
                                  $pro_email = $row_pro['email'];
                                  $pro_group = $row_pro['group'];  
                            $pro_stream = $row_pro['stream']; 
                   
                       echo "
                                        <tr class='odd gradeX'>
                                            <td>$pro_fname</td>
                                            <td>$row_pro[1]</td>
                                            <td>$row_pro[2]</td>
                                             <td>$row_pro[3]</td>
                                            <td>$row_pro[4]</td>
                                            <td>$row_pro[5]</td>
                                            <td class='center'>$row_pro[6]</td>
                                            <td>$row_pro[7]</td>
                                             <td$row_pro[8]</td>
                                              <
                                       </tr>
                                ";
                           }
                          
                           /*  } 
                            else
                         {
                               echo"no result found";
                           }*/
                       }
                            else
                        {
                            echo"no result found";
                        }
                        
                        }
                        
                                            ?>
                                        </tbody>
                    </table>
                        
                </div>
                <!-- /.col-lg-12 -->
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
                     
                     
                      <input type="submit" name="submit" value="Send" class="btn btn-success"/>
                    </form>

                    <?php 

                      $conn=mysqli_connect("localhost","root","","final");
                      if($conn){/*echo "Connected<br>";*/}
                      else die("could not connect".mysqli_error());
                        
                        date_default_timezone_set('Asia/Dhaka');
                        $dat = date("d-m-y h:i:sa");
                      //insert announcement in desire class table
                      if(isset($_POST['submit'])){
                        $ann = $_POST['announce'];
                        $tsk = $_POST['tsk'];
                        $cls = $_POST['cls']; 
                        $class_insert_qry = "insert into cse101_ann (type,ann,date) values ('$tsk','$ann','$dat');";
                        if(mysqli_query($conn,$class_insert_qry)){
                          echo "<script>alert('Your maessage has been sent')</script>";
                        }
                        else die("error".mysqli_error($conn));


                        //then get the class student id and put the announcement in to student notifation table
                        $get_student="Select * from cse101_student";
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
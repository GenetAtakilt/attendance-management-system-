<!DOCTYPE html>
<?php 
    error_reporting( ~E_NOTICE ); // avoid notice
    
    require_once 'db.php';
    require_once 'dbconfig.php';
    
    session_start();
    $role = $_SESSION['sess_userrole'];
    if(!isset($_SESSION['sess_username']) && $role!="kebede"){
      header('Location: login.php?err=2');
    }

    if(isset($_GET['delete_id']))
    {
        // it will delete an actual record from db
        $stmt_delete = $DB_con->prepare('DELETE FROM one WHERE name_id =:uid');
        $stmt_delete->bindParam(':uid',$_GET['delete_id']);
        $stmt_delete->execute();
        
        header("Location: ictdep.php");
    }

    $get_noti_qwr = "select * from 112_noti where seen_unseen = 'u'";
    $qry = mysqli_query($con,$get_noti_qwr);
    $count=mysqli_num_rows($qry);
  

?>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Student Attendance System</title>

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
                <a class="navbar-brand" href="ictdep.php" style="padding-left:50px; padding-top:0px;"><h3><b>HOME</b></h3></a>
            </div>
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav navbar-right">
                <li class="dropdown">
                   <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                   <span class="badge bg-green">
                                <?php
                                if($count > 0 ){
                            echo '('.$count.')';
                            } 
                                ?></span>
                   <span class="label label-pill label-danger count" style="border-radius:10px;"></span> 
                   <span class="glyphicon glyphicon-envelope" style="font-size:18px;"></span>Notification</a>
                   <ul id="menu1" class="dropdown-menu list-unstyled msg_list" role="menu">
                    <?php
                    global $con;
                $get_cats = "select * from cse101_ann ORDER BY sl DESC LIMIT 0,5";
              
                $run_cats = mysqli_query($con, $get_cats);
              
                while ($row_cats=mysqli_fetch_array($run_cats)){
                  $type = $row_cats['type'];
                  $ann = $row_cats['ann'];
                  $date = $row_cats['date'];

                  $fdate = strtotime($date);
                
                  echo "<li>
                                  <a>
                                    <span>$type</span><br>
                                    <span class='message'>$ann</span><br>
                                    <span class='time'>$fdate</span>
                                  </a>
                                </li>";
                }
                ?>
                   </ul>
                  </li>
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
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Ethiopian Broadcasting Corporation</h2>
                    <form action="" method="POST">
                    <input align="center" style="<?php 

                      if($count > 0 ){
                        echo "color: white;border:none;background-color: red;";
                      }

                     ?>" class="btn btn-sm btn-primary" type="submit" name="submit" value="Confirm <?php echo '('.$count.')' ?>"/>
                  </form><br>
                  <?php

                    if(isset($_POST['submit'])){
                  

                  while ($r=mysqli_fetch_array($qry)){


                    echo "<script>alert('YES')</script>";
                  }

                  $update_query = "update 112_noti SET seen_unseen='s' where seen_unseen='u';";
                  mysqli_query($con,$update_query);
                  
                  
                }

                ?>
                    <a href="ictform.php"><button class="btn btn-sm btn-primary" type="button"><i class="fa fa-plus"></i> FORM</button></a>
                  <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    <p class="text-muted font-13 m-b-30"></p>
                    <table id="datatable-buttons" class="table table-striped table-bordered">
                      <thead>
                        <tr>
                          <th>Name</th>
                          <th>Father Name</th>
                          <th>Grandfather Name</th>
                          <th>Group</th>
                         
                            <th>Batch</th>
                          <th>Course</th>
                          <th>Departement</th>
                        </tr>
                      </thead>


                      <tbody>
                        <?php 
                           require_once 'db.php';

                          $get_pro = "select one.*, catagories.* from student
                                      LEFT JOIN catagories ON (one.catagories=catagories.cat_id)
                                      where catagories='1' ORDER BY name_id DESC";
                          
                          $run_pro = mysqli_query($con, $get_pro);
                          
                          while ($row_pro=mysqli_fetch_array($run_pro)) {
                              
                                  $pro_id = $row_pro['name_id'];
                                  $pro_fname = $row_pro['fname'];
                                  $pro_mname = $row_pro['mname'];
                                  $pro_lname = $row_pro['lname'];
                                  $pro_phone = $row_pro['phone_no'];
                                  $pro_fdate = $row_pro['fdate'];
                                  $pro_ldate = $row_pro['ldate'];
                                  $pro_remain = $row_pro['ldate'];
                                  $pro_catagories = $row_pro['catagories'];
                                  $pro_catname = $row_pro['cat_title'];

                          $ffdate=strtotime($pro_fdate);//Converted to a PHP date (a second count)
                          $lldate=strtotime($pro_ldate);
                              
                            echo "
                                        <tr class='odd gradeX'>
                                            <td>$pro_fname</td>
                                            <td>$pro_mname</td>
                                            <td>$pro_lname</td>
                                            <td class='center'>$pro_phone</td>
                                            <td class='center'>$pro_fdate</td>
                                            <td class='center'>$pro_ldate</td>
                                            <td class='center'>$pro_catname</td>
                                            <td class='center'>
                                            <a href='ictedit.php?edit_id=$pro_id' onclick='return confirm(\"sure to edit ?\")'><button class='btn btn-sm btn-info' type='button'><i class='fa fa-edit'></i> EDIT</button></a>
                                            <a href='?delete_id=$pro_id' onclick='return confirm(\"sure to delete?\")'><button class='btn btn-sm btn-danger' type='button'><i class='fa fa-trash-o'></i> DELETE</button></a>
                                            </td>
                                        </tr>
                                ";
                              
                          }
          
                      ?>
                      </tbody>
                    </table>
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

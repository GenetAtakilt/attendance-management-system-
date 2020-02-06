<!DOCTYPE html>
<?php 
    error_reporting( ~E_NOTICE ); // avoid notice
    
    require_once 'dbconfig.php';
    
    session_start();
    $role = $_SESSION['sess_userrole'];
    if(!isset($_SESSION['sess_username']) && $role!="admin"){
      header('Location: login.php?err=2');
    }

    if(isset($_GET['edit_id']) && !empty($_GET['edit_id']))
    {
        $id = $_GET['edit_id'];
        $stmt_edit = $DB_con->prepare('SELECT fname, mname, lname, dep, phone, email, block, room FROM teacher WHERE tid =:uid');
        $stmt_edit->execute(array(':uid'=>$id));
        $edit_row = $stmt_edit->fetch(PDO::FETCH_ASSOC);
        extract($edit_row);
    }
    else
    {
        header("Location: administrator.php");
    }

    if(isset($_POST['btn_save_updates']))
    {
        $fname = $_POST['fname'];
        $mname = $_POST['mname'];
        $lname = $_POST['lname'];
        $dep = $_POST['dep'];
        $phone = $_POST['phone'];
        $email = $_POST['email'];
        $block = $_POST['block'];
        $room =  $_POST['room'];
                     
        
        // if no error occured, continue ....
        if(!isset($errMSG))
        {
            $stmt = $DB_con->prepare('UPDATE teacher 
                                         SET fname=:fname,
                                             mname=:mname,
                                             lname=:lname,
                                             dep=:dep,
                                             phone=:phone,
                                             email=:email,
                                             block=:block,
                                             room=:room 
                                       WHERE tid=:uid');
            $stmt->bindParam(':fname',$fname);
            $stmt->bindParam(':mname',$mname);
            $stmt->bindParam(':lname',$lname);
             $stmt->bindParam(':dep',$dep);
            $stmt->bindParam(':phone',$phone);
            $stmt->bindParam(':email',$email);
            $stmt->bindParam(':block',$block);
            $stmt->bindParam(':room',$room);
            $stmt->bindParam(':uid',$id);
                
            if($stmt->execute()){
                ?>
                <script>
              //  alert('Successfully Updated ...');
                window.location.href='administrator.php';
                </script>
                <?php
            }
            else{
                $errMSG = "Sorry Data Could Not Updated !";
            }
        
        }
        
                        
    }

    ?>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Form</title>

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
               <a class="navbar-brand" href="administrator.php" style="padding-left:00px; padding-top:0px;"> <h3 align="left"><img src="2.jpg" width="300" height="30"></h3></a>
            </div>
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav navbar-right">
                <li><a href="studenttable.php">Student Table</a></li>
               
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                        <i class="fa fa-user fa-fw"></i> <?php echo $_SESSION['sess_username'];?>
                    </a>
                    <ul class="dropdown-menu dropdown-user">
                        <li><a href="#"><i class="fa fa-user fa-fw"></i> User Profile</a>
                        </li>
                        <li class="divider"></li>
                        <li><a href="logout.php"><i class="fa fa-sign-out fa-fw"></i> Logout</a>
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
                    <h2>Form <small></small></h2>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    <div class="col-lg-6">
                    <form role="form" method="post" enctype="multipart/form-data">
                        <div class="form-group">
                            <label>First Name</label>
                            <input class="form-control" type="text" name="fname" value="<?php echo $fname; ?>" required>
                        </div>
                        <div class="form-group">
                            <label>Middle Name</label>
                            <input class="form-control" type="text" name="mname" value="<?php echo $mname; ?>" required>
                        </div>
                        <div class="form-group">
                            <label>Last name</label>
                            <input class="form-control" type="text" name="lname" value="<?php echo $lname; ?>" required>
                        </div>
                        <div class="form-group">
                            <label>Phone Number</label>
                            <input class="form-control" type="text" name="phone" value="<?php echo $phone; ?>" maxlength="14" required>
                        </div>
                        <div class="form-group">
                            <label>Departments</label>
                            <input class="form-control" type="text" name="dep" value="<?php echo $dep; ?>" required>
                        </div>
                        <div class="form-group">
                            <label>Email</label>
                            <input class="form-control" type="text" name="email" value="<?php echo $email; ?>" required>
                        </div>
                         <div class="form-group">
                            <label>Block</label>
                            <input class="form-control" type="text" name="block" value="<?php echo $block; ?>" required>
                        </div>
                         <div class="form-group">
                            <label>Room</label>
                            <input class="form-control" type="text" name="room" value="<?php echo $room; ?>" required>
                        </div>
                          <button type="submit" name="btn_save_updates" class="btn btn-primary">Save changes</button>
                        <a href="administrator.php" class="btn btn-default">Cancel</a>
                    </form>
                </div>
                <!-- /.col-lg-12 -->
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

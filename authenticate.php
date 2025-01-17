<?php
require 'dbconfig.php';

session_start();

    $username = "";
    $password = "";
    
    if(isset($_POST['username'])){
        $username = $_POST['username'];
    }
    if (isset($_POST['password'])) {
        $password = $_POST['password'];

    }
    
    echo $username ." : ".$password;

    $q = 'SELECT * FROM user WHERE username=:username AND password=:password';

    $query = $DB_con->prepare($q);

    $query->execute(array(':username' => $username, ':password' => $password));


    if($query->rowCount() == 0){
        header('Location: login.php?err=1');
    }else{

        $row = $query->fetch(PDO::FETCH_ASSOC);

        session_regenerate_id();
        $_SESSION['sess_user_id'] = $row['id'];
        $_SESSION['sess_username'] = $row['username'];
        $_SESSION['sess_userrole'] = $row['role'];

        echo $_SESSION['sess_userrole'];
        session_write_close();

        if( $_SESSION['sess_userrole'] == "instructor"){
            
            header('Location: home.php');
        }elseif( $_SESSION['sess_userrole'] == "helpdesk"){
            
            header('Location: index.php');
        }else{
            
            header('Location: administrator.php');
        }
        
        
    }
    
?>
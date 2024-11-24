<?php
    if(!isset($_SESSION)){
        session_start();
        require_once 'function.inc.php';
        require_once 'dbpdoconnect.inc.php';
    }

    if(isset($_POST['back'])){
        $_SESSION['menu']=0;
        header('location: ../index.php');
        exit();
    }
    $_SESSION['idgroup']=-1;
    $_SESSION['check']=0;
    $_SESSION['statustask']=1;
    
    if(isset($_POST['login'])){
        $login = $_POST['log'];
        $pass = $_POST['pass'];
        if(!EmptyFiled([$login,$pass])){
            header('location: ../index.php?error=emptyfiled');
            exit;
        }
        
        if (loginUser($pdo,$login,filter_var($login,FILTER_VALIDATE_EMAIL),$pass)){
            

        header('location: ../apptodo.php');
        }else{
            header('location: ../index.php?error=nopass');
        }
        exit();
    }
?>
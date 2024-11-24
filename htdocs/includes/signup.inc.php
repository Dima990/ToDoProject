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
    if(isset($_POST['signup'])){
        $name = $_POST['name'];
        $surname = $_POST['surname'];
        $email = $_POST['email'];
        $login = $_POST['log'];
        $pass = $_POST['pass'];
        $hash = password_hash($pass, PASSWORD_DEFAULT);

        if(!EmptyFiled([$name,$surname,$email,$login,$pass])){
            header('location: ../index.php?error=emptyfiled');
            exit;
        }
        if (!CheckLogin($pdo, $login)){
            header('location: ../index.php?error=nologin');
            exit;
        }
        if(!filter_var($email,FILTER_VALIDATE_EMAIL)){
            header('location: ../index.php?error=erroremail');
            exit;
        }
        if (!Checkemail($pdo, $email)){
            header('location: ../index.php?error=noemail');
            exit;
        }
        
        CreateUser($pdo, $name,$surname,$email,$login,$hash);
            
        $_SESSION['menu']=1;        
        header('location: ../index.php');
        exit();
    };
?>
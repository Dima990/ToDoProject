<?php
    if(!isset($_SESSION)){
        session_start();
    }

    if(isset($_POST['login'])){
        $_SESSION['menu']=1;
        header('location:/index.php');
        exit();
    }
    if(isset($_POST['signup'])){
        $_SESSION['menu']=2;
        header('location:/index.php');
        exit();
    }
?>
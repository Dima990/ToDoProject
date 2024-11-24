<?php
    if(!isset($_SESSION)){
        session_start();
    }
    if(isset($_POST['plus'])){
        $_SESSION['zametk']++;
        header('location: ../apptodo.php');
        exit();
    }
?>
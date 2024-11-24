<?php
    if(!isset($_SESSION)){
        session_start();
        if(empty($_SESSION['zametk'])){
            $_SESSION['zametk']=0;
        }
        if(!isset($_SESSION['user'])){
            header('location: includes/logout.inc.php');
        }
    }
?>
<html lang="ru">
    <head>
        <meta charset="Utf-8">
        <link rel="stylesheet" href="css/main.css" type="text/css">   
        <link rel="stylesheet" href="css/div.css" type="text/css"> 
        <title> To Do List </title>
    </head>
<header>
    <div class="divfot1">
        <div class="div11">
            <img width="61" height="61" src="/picture/444.png">
                <span><?php echo $_SESSION['user']['login_user']; ?></span>
        </div>
        <div>
            <form action="includes/logout.inc.php" method="POST">
                <input type="submit" value="Выход">
            </form>
        </div>
    </div>
</header>
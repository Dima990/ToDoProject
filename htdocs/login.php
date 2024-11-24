<?php
    if (isset($_GET['error'])) {
        switch($_GET['error']){
            case 'nopass':{
                echo '<span style = "color: red"> неправильный логин или пароль</span>';
                break;
            }
        }
    }
?>
<form action="includes/login.inc.php" method="POST">
    почта или логин <br>
    <input name="log"> <br>
    пароль <br>
    <input name="pass" type="password" > <br>
    <button name="back" type="submit">назад</button>
    <button name="login" type="submit">вход</button>
<form>
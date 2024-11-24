<?php
    if (isset($_GET['error'])) {
        switch($_GET['error']){
            case 'emptyfiled':{
                echo '<span style = "color: red"> заполните все поля</span>';
                break;
            }
            case 'nologin':{
                echo '<span style = "color: red">данный логин занят</span>';
                break;
            }
            case 'noemail':{
                echo '<span style = "color: red">почта занята</span>';
                break;
            }
            case 'erroremail':{
                echo '<span style = "color: red">почта указана некорректно</span>';
                break;
            }
            case 'none':{
                echo '<span style = "color: green">Вы успешно зарегестрировались!!!</span>';
                break;
            }
        }
    }
?>

<form action="includes/signup.inc.php" method="POST">
    имя <br>
    <input name="name" > <br>
    фамилия <br>
    <input name="surname" > <br>
    почта <br>
    <input name="email" > <br>
    логин <br>
    <input name="log"> <br>
    пароль <br>
    <input name="pass" type="password"> <br>
    <button name="back" type="submit">назад</button>
    <button name="signup" type="submit">регистрация</button>
<form>
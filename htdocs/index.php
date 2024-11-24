<?php
    if(!isset($_SESSION)){
        session_start();
    }
?>
<!DOCTYPE html>
<html lang="ru">
    <head><meta charset="Utf-8">
    <link rel="stylesheet" href="css/main.css" type="text/css">   
        <link rel="stylesheet" href="css/div.css" type="text/css"> 
        <title> To Do List </title>
        <div class="div1">
            <ul><h1>To Do</h1></ul>
        </div>
    </head>
    <body>
        <div class="divALL">
            <div class="div2 s mar">
                <div class="divbut ne">
                    <?php
                        if(empty($_SESSION['menu']) || $_SESSION['menu']==0){
                            include_once 'menu.php';
                        }
                        elseif($_SESSION['menu']==1){
                            include_once 'login.php';
                        }
                        elseif($_SESSION['menu']==2){
                            include_once 'signup.php';
                        }
                    ?>
                </div>
                <div class="div2 ne">
                    Представляем ToDo List — лучший инструмент повышения производительности для людей всех возрастов. Благодаря своей кросс-платформенной совместимости и доступности с любого устройства, ToDo List позволяет вам легко оставаться в курсе ваших задач, независимо от того, где вы находитесь и какое устройство используете. Находитесь ли вы на работе, дома или в пути, вы можете легко получить доступ к своему списку дел со своего компьютера, ноутбука, планшета или смартфона.
                </div>
            </div>
            <div class="div2 s mar">
                <div class="div2 ne">
                    <img width="350" height="450" src="/picture/111.png">
                </div>
                <div class="div2 ne">
                    Одним из ключевых преимуществ ToDo List является простота использования. В отличие от других приложений для повышения производительности, требующих сложного обучения или сложной настройки, ToDo List интуитивно понятен и удобен для пользователя. Благодаря понятному и простому интерфейсу вы можете легко добавлять и упорядочивать задачи, устанавливать сроки выполнения и напоминания, а также классифицировать задачи по проектам или приоритетам. Еще одним важным преимуществом ToDo List является универсальность сайта. Независимо от того, предпочитаете ли вы использовать веб-браузер или специальное приложение, вы можете легко получить доступ к списку задач с любого устройства с подключением к Интернету. А поскольку ToDo List — это веб-приложение, вам не нужно ничего скачивать или беспокоиться об обновлениях — все делается автоматически в облаке. 
                </div>
            </div>
            <div class="div2 s mar">
                <div class="div2 ne">
                    Но что действительно отличает ToDo List от других инструментов повышения производительности, так это его система уведомлений. Благодаря обновлениям и уведомлениям в режиме реального времени вы больше никогда не пропустите важную задачу или крайний срок. Будь то напоминание о предстоящей встрече или уведомление о том, что член команды выполнил задачу, вы всегда будете в курсе событий. Так зачем ждать? Начните использовать ToDo List сегодня и возьмите под контроль свою продуктивность. Благодаря своей кросс-платформенной совместимости, доступности, простоте использования, универсальности сайта и мощной системе уведомлений, ToDo List является непревзойденным инструментом повышения производительности для людей всех возрастов.
                </div>
                <div class="div2 ne">
                    <img width="350" height="450" src="/picture/222.png">
                </div>
            </div>
        </div>
    </body>
    <footer>
        <div class="divfot">
            <div>            
                Разработчики <br>
                Дима
            </div>
            <div>            
                Дизайнеры<br>
                Дима
            </div>
            <div>            
                Дизайнеры<br>
                Дима
            </div>
            <div>            
                Спонсоры<br>
                Дима    
            </div>
            <div>            
                Помощники (чуть-чуть)<br>
                Александр  
            </div>
        </div>
        <div class="divfot2">
            <div>            
                Контактный номер телефона: +7965XXXXXXX
            </div>
            <div>            
                Мой дискордик Нечто#2701
            </div>
        </div>
    </footer>
</html>

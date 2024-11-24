<?php    

    include_once 'header.php';

    if(empty($_SESSION['load'])){
        header('location: includes/apptodo.inc.php');
    }

?>
<body >
    <div class="tripleall">
        <div class="left">
            <div class="kat">
                <h1>категории</h1>
            </div>
            <form action="includes/apptodo.inc.php" method="POST" class="form1">
                <input name="namekat">
                <button name="createkatkat">добавить</button>
            
            <!-- Категории -->
            <?php
                if(!$_SESSION['groups']){
                    echo 'Категорий нет';
                } else {
                    echo $_SESSION['groups'];  
                }
            ?>
            </form>
        </div>
        <div class="right">
            
            <form action="includes/apptodo.inc.php" method="POST">
                <div class="kat">
                    <button name="act" class="but1">активные</button>
                    <button name="zav" class="but2">завершенные</button>
                </div>
            </form>
            
            <div>
                <?php
                if (isset($_GET['error'])) {
                    switch($_GET['error']){
                        case 'emptyname':{
                            echo '<span style = "color: red"> Укажите название </span>';
                            break;
                        }
                    }
                }
                ?>
            </div>
                    <form action="includes/apptodo.inc.php" method="POST" class="div101 kat2"> 
                    <?php
                        if($_SESSION['check']==0){
                            echo '<button name="plus" class="i">+</button>';                            
                        }
                    ?> 
                    <div class="div100">

                        <?php
                            if($_SESSION['check']==0){
                                echo $_SESSION['tasks'];
                            }elseif($_SESSION['check']==1){    
                                echo $_SESSION['task'];
                            }
                        ?> 
                    </form>
                    </div>                 
        </div>            
    </div>
</body>
</html>
<?php 
$_SESSION['load']=false;
?>
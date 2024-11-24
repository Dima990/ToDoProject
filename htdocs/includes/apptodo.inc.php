<?php
    function bildhtmlgroups(array $groups){
        $html='';
        foreach($groups as $id => $name){
            $html.='<div class="kat1">';
            $html.='<button class="but" name ="butgroup" value='.$id.'>'.$name.'</button>';
            $html.='</div>';
        }
        return $html;
    }
    function bildhtmltask(array $tasks){
        $html='';
        foreach($tasks as $id => $name){
            $html.='<button class="but3" name="viev" value='.$id.'><div class="bit"><div >'.$name.'</div><div"></div> <bit></button>';
        }
        return $html;
    }
    function bildhtmltaskviev($id, $name, $description, $date_start, $date_finish){
        $html='';
        $html.='название <input name="nametask" class="input1" value="'.$name.'"><br><br> Напишите Заметку<textarea name="description" class="input">'.$description.'</textarea>';
        $html.='<button name="back">back</button>';
        $html.='начало <br> <input type="date" name="nach" value="'.$date_start.'"> конец <br> <input type="date" name="finish" value="'.$date_finish.'">';
        $html.='<button name="save" value="'.$id.'">save</button>';
        $html.='<button name="savestatus" value="'.$id.'">изменить статус</button>';
        return $html;
    }

    $error=false;


    if(!isset($_SESSION)){
        session_start();
        require_once 'function.inc.php';
        require_once 'dbpdoconnect.inc.php';
    }
    // if(count($_SESSION['groups']) != 0){
        
    //     header('location: ../apptodo.php');
    // }
    if(isset($_POST['createkatkat'])){
        $user_id =$_SESSION['user']['id_user'];
        $name = $_POST['namekat'];
        Createcat($pdo,$name,$user_id);
    }
    if(isset($_POST['plus'])){
        $_SESSION['check']=1;
        $_SESSION['task'] = bildhtmltaskviev(-1, '', '', '', '', '');
        $_SESSION['status'] = false;
    }
    if(isset($_POST['back'])){
        $_SESSION['check']=0;
    }
    // if(isset($_POST['plus'])){
    //     $user_id =$_SESSION['user']['id_user'];
    //     $name = $_POST['nametask'];
    //     if(empty($name)){
    //         header('location: ../apptodo.php?error=emptyname');
    //         $error=true;
    //     } else {
    //     $description = $_POST['description'];
    //     $date_start = $_POST['nach'];
    //     $date_finish = $_POST['finish'];
    //     $_SESSION['check']=0;

    //     }
    // }
    if(isset($_POST['save'])){
        $id =$_SESSION['user']['id_user'];
        $id_group = $_SESSION['idgroup'];
        $name = $_POST['nametask'];
        if(empty($name)){
            header('location: ../apptodo.php?error=emptyname');
            $error=true;
        } else {
        $description = $_POST['description'];
        $date_start = $_POST['nach'];
        $date_finish = $_POST['finish'];
        if ($_SESSION['status']){
            updatetask($pdo,$name,$description,$date_start,$date_finish,$_POST['save']);
        } else {
            Createtask($pdo,$name,$id, $description,$date_start,$date_finish,$id_group,$_SESSION['statustask']);
        }
        $_SESSION['check']=0;

        }
    }
    if(isset($_POST['savestatus'])){
        updatestatus($pdo, $_SESSION['statustask'], $_POST['savestatus']);
    }
    $_SESSION['groups'] = kategoriinal($pdo, $_SESSION['user']['id_user']);
    if (count($_SESSION['groups']) > 0){
        $_SESSION['groups'] = bildhtmlgroups($_SESSION['groups']);
    } else {
        $_SESSION['groups'] = false;
    }
    $_SESSION['tasks'] = tasknal($pdo,$_SESSION['user']['id_user'],$_SESSION['idgroup'],$_SESSION['statustask']);
    if (count($_SESSION['tasks']) > 0){
        $_SESSION['tasks'] = bildhtmltask($_SESSION['tasks']);
    } else {
        $_SESSION['tasks'] = false;
    }
    if(isset($_POST['butgroup'])){
        $_SESSION['idgroup']=$_POST['butgroup'];
        header('location: ../apptodo.php');
        exit;
    }
    if(isset($_POST['act'])){
        $_SESSION['statustask']=1;
        header('location: ../apptodo.php');
        exit;
    }
    if(isset($_POST['zav'])){
        $_SESSION['statustask']=0;
        header('location: ../apptodo.php');
        exit;
    }

    if(isset($_POST['viev'])){
        $_SESSION['check']=1;
        $_SESSION['status'] = true;
        $task = gettaskforid($pdo,$_POST['viev']);
        $_SESSION['task'] = bildhtmltaskviev($_POST['viev'], $task['name'], $task['description'], $task['date_start'], $task['date_finish']);
        header('location: ../apptodo.php');
        exit;
    }


    $_SESSION['load']=true;
    if($error==false){

        header('location: ../apptodo.php');
    }
?>

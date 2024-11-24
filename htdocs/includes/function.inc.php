<?php
    function EmptyFiled(array $files){
        foreach($files as $file){
            if(empty($file)){
                return false;
                exit();
            }
        }
        return true;
    }
    function CreateUser(PDO $pdo, string $name, string $surname, string $email, string $login, string $pass){
        $sql='INSERT into users(name,surname,email,login,pass) values (?,?,?,?,?)';
        try{
            $stmt = $pdo -> prepare($sql);
            // $stmt -> execute([$name,$surname,$email,$login,$pass]);
            return $stmt -> execute([$name,$surname,$email,$login,$pass]);
        }
        catch(PDOException $e){
            header("location ...index.php?error=stmt8 mesenge=". $e -> getMessage());
        }

    }
    function CheckLogin(PDO $pdo, string $login){
        $sql ='SELECT * from users where login = ?';
        try{
            $stmt = $pdo -> prepare($sql);
            $stmt -> execute([$login]);
            $result = $stmt -> fetch();
            if($result === false){
                return true;
            }
            else{
                return false;
            }
        }
        catch(PDOException $e){
            header("location ...index.php?error=stmt8 mesenge=". $e -> getMessage());
        }
    }
    function Checkemail(PDO $pdo, string $email){
        $sql ='SELECT * from users where email = ?';
        try{
            $stmt = $pdo -> prepare($sql);
            $stmt -> execute([$email]);
            $result = $stmt -> fetch();
            if($result === false){
                return true;
            }
            else{
                return false;
            }
        }
        catch(PDOException $e){
            header("location ...index.php?error=stmt8 mesenge=". $e -> getMessage());
        }
    }
    function loginUser(PDO $pdo, string $login, bool $isemail, string $pass ){
        $sql ='select * from users where ? = ?';
        if($isemail){
            $sql = str_replace('? =','email=',$sql);
        }
        else{
            $sql = str_replace('? =','login=',$sql);
        }
        try{
            $stmt = $pdo -> prepare($sql);
            $stmt -> execute([$login]);
            $row= $stmt -> fetch(PDO::FETCH_LAZY);
            if (!$row){
                return false;
                exit();
            }
            
            if(password_verify($pass, $row -> pass)){
                $_SESSION['user'] = [];
                $_SESSION['user']['id_user'] = $row -> id;
                $_SESSION['user']['name_user']= $row -> name;
                $_SESSION['user']['surname_user_']= $row -> surname;
                $_SESSION['user']['login_user']= $row -> login;
                $_SESSION['user']['email_user']= $row -> email;
                $_SESSION['task']=0;
                return true;
            }
            else{
                return false;
            }
        }
        catch(PDOException $e){
            header("location ...index.php?error=stmt8 mesenge=". $e -> getMessage());
        }
    }
    function kategoriinal(PDO $pdo, int $user_id){
        $sql='select id,name from groups where id_user=?';
        try{
            $groups=[];
            $stmt = $pdo -> prepare($sql);
            $stmt -> execute([$user_id]);
            while($group=$stmt->fetch()){
                $groups[$group['id']]=$group['name'];
            }
            return $groups;
        }
        catch(PDOException $e){
            header("location ...index.php?error=stmt8 mesenge=". $e -> getMessage());
        }
    }
    function Createcat(PDO $pdo, string $name,int $user_id){
        $sql='INSERT into groups(name, id_user) values (?,?)';
        try{
            $stmt = $pdo -> prepare($sql);
            return $stmt -> execute([$name,$user_id]);
        }
        catch(PDOException $e){
            header("location ...index.php?error=stmt8 mesenge=". $e -> getMessage());
        }

    }
    function tasknal(PDO $pdo, int $user_id, int $group_id, int $status_id){
        $sql='select id,name from tasks where id_user=? and id_group =? and status_id =?';
        try{
            $tasks=[];
            $stmt = $pdo -> prepare($sql);
            $stmt -> execute([$user_id, $group_id, $status_id]);
            while($task=$stmt->fetch()){
                $tasks[$task['id']]=$task['name'];
            }
            return $tasks;
        }
        catch(PDOException $e){
            header("location ...index.php?error=stmt8 mesenge=". $e -> getMessage());
        }
    }
    function Createtask(PDO $pdo, string $name,int $user_id, string $description,string $date_start,string $date_finish, string $id_group, string $status_id){
        $sql='INSERT into tasks(id_user,name,description,date_start,date_finish,id_group,status_id) values (?,?,?,?,?,?,?)';
        try{
            $stmt = $pdo -> prepare($sql);
            return $stmt -> execute([$user_id,$name,$description,$date_start,$date_finish,$id_group,$status_id]);
        }
        catch(PDOException $e){
            header("location ...index.php?error=stmt8 mesenge=". $e -> getMessage());
        }

    }
    function gettaskforid(PDO $pdo, int $id){
        $sql = 'SELECT name,description,date_start,date_finish from tasks where id=?';
        try{
            $stmt = $pdo -> prepare($sql);
            $stmt -> execute([$id]);
            $task = $stmt -> fetch();
            return $task;
        }
        catch(PDOException $e){
            header("location ...index.php?error=stmt8 mesenge=". $e -> getMessage());
        }
    }
    function updatetask(PDO $pdo, string $name,string $description,string $date_start,string $date_finish,int $id){
        $sql='UPDATE tasks set name = ?,description = ?,date_start = ?, date_finish = ? where id = ?';
        try{
            $stmt = $pdo -> prepare($sql);
            return $stmt->execute([$name,$description,$date_start,$date_finish,$id]);
        }
        catch(PDOException $e){
            header("location ...index.php?error=stmt8 mesenge=". $e -> getMessage());
        }

    }
    function updatestatus(PDO $pdo, $status_id, $id){
        $sql='UPDATE tasks set status_id = ? where id = ?';
        try{
            $stmt = $pdo -> prepare($sql);
            return $stmt->execute([$status_id,$id]);
        }
        catch(PDOException $e){
            header("location ...index.php?error=stmt8 mesenge=". $e -> getMessage());
        }

    }
?>
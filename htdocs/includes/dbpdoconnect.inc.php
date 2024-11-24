<?php
   $servername = "localhost";
   $dbusername = "user";
   $dbpassword = "12345";
   $dbname = "todo";
   $dsn = "mysql:host=$servername; dbname=$dbname; charset=utf8";
   $opt = [
      PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
      PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
      PDO::ATTR_EMULATE_PREPARES => false,
   ];
   try {
      $pdo = new PDO($dsn, $dbusername, $dbpassword, $opt);
   }
   catch(PDOException $e){
      echo "Error!: .$e -> getMessage()";
      die();
   }
?> 
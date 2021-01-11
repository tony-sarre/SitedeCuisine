
<?php
  session_start();
    $servername = 'mysql:host=localhost;dbname=bd_monsite';
    $user = 'root';
    $pass = '';
    $dsn = 'mysql:host=localhost;dbname=base de données1;port=3307;charset=utf8';
    try{
       
        $connection = new PDO($dsn, $user, $pass);
        $connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $email = $_POST['email'];
        
        $message = $_POST['message'];
        $req = $connection->exec("INSERT INTO table1( email, message) VALUES ( '$email', '$message')");
        echo $req ? "tuple inséré" : "problèmed'insertion";
        if($req == "tuple inséré")
        {
          print "Vous avez réussi, vous pouvez vous connecter";
          header('location:index.html');
        }
        else header('location:index.html');
    } 
     catch(PDOException $e)
       {
         print "Erreur : ".$e ->getMessage()."/br" ;
       }
     // On ferme la conection
     $connection=null;
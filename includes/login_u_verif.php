<?php 
  
if($_SERVER["REQUEST_METHOD"] == "POST"){
    $usuario = $_POST["usuario"];
    $senha = $_POST["senha"];
    
    
    
    try{
        require "dbh.inc.php";
        $query="SELECT id, username from users where username = :username AND pw = :pw";
        $stmt= $pdo->prepare($query);
        $stmt->bindParam(":username",$usuario);
        $stmt->bindParam(":pw",$senha);
        $stmt->execute();
        $user= $stmt->fetch(PDO::FETCH_ASSOC);
        if(isset($user['username'])==1){
             session_start();
             $_SESSION['user_id']=$user['id'];
             $_SESSION['username']=$user['username'];
            header('Location:../index.php');
            
        } else{
            $stmt=null;
            echo '<script>alert("Usuário ou senha incorretos! Não identificado!")</script>';
            header('Refresh:0; URL:../login_u.php');
            die();
        }

        

    } catch(PDOException $e){
            echo "Erro: ".$e;
    }

}
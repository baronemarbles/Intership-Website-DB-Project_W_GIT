<?php

#patrimonio,numero_de_serie,marca,modelo,categoria,localizacao, status_device,observacao
session_start();
if(!isset($_SESSION['username'])) {
    header('Location: login_u.php');
    exit();
}

if($_SERVER["REQUEST_METHOD"] == "POST") {
        if(isset($_POST["verif_certeza"]) == 1){

        
            $patrimonio = $_POST["patrimonio"];
            #$numero_de_serie = $_POST["numero_de_serie"];
            $localizacao = $_POST["localizacao"];
            #$observacao = $_POST["observacao"];
            $username=$_SESSION['username'];

            
        
            

        try{
            require_once "dbh.inc.php";
            
            $query = "DELETE from testedb WHERE patrimonio = :patrimonio AND localizacao=:localizacao;";
            
            $stmt= $pdo->prepare($query);
            
            $stmt->bindParam(":patrimonio", $patrimonio);
            #$stmt->bindParam(":numero_de_serie",$pwd);
            $stmt->bindParam(":localizacao",$localizacao);
            #$stmt->bindParam(":observacao",$observacao);
            


            $stmt->execute();
            
            $pdo = null;
            $stmt = null;

            header("Location: ../index.php");    

        }   catch(PDOException $e) {
            die("Query falhou: " .$e->getMessage());

        }
    } else {
        die("Você não confirmou a exlusão!");
        
    }
} else {
    header("Location: ../index.php");
}
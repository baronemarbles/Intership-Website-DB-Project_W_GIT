<?php
session_start();
if(!isset($_SESSION['username'])) {
    header('Location: login_u.php');
    exit();
}
#patrimonio,numero_de_serie,marca,modelo,categoria,localizacao, status_device,observacao




if($_SERVER["REQUEST_METHOD"] == "POST") {
        $patrimonio = $_POST["patrimonio"];
        $numero_de_serie = $_POST["numero_de_serie"];
        $marca = $_POST["marca"];
        $modelo = $_POST["modelo"];
        $categoria = $_POST["categoria"];
        $localizacao = $_POST["localizacao"];
        $status_device = $_POST["status_device"];
        $observacao = $_POST["observacao"];
        $username=$_SESSION['username'];
       
        

    try{
        require "dbh.inc.php";
        
        $query = "INSERT INTO testedb(patrimonio, numero_de_serie, marca, modelo, categoria, localizacao, status_device, observacao,username) VALUES(:patrimonio, :numero_de_serie, :marca, :modelo, :categoria, :localizacao, :status_device, :observacao,:username);";
        
        $stmt= $pdo->prepare($query);
        
        $stmt->bindParam(":patrimonio", $patrimonio);
        $stmt->bindParam(":numero_de_serie",$numero_de_serie);
        $stmt->bindParam(":marca",$marca);
        $stmt->bindParam(":modelo",$modelo);
        $stmt->bindParam(":categoria",$categoria);
        $stmt->bindParam(":localizacao",$localizacao);
        $stmt->bindParam(":status_device",$status_device);
        $stmt->bindParam(":observacao",$observacao);
        $stmt->bindParam(":username",$username);
        
        


        $stmt->execute();


        $pdo = null;
        $stmt = null;

        header("Location: ../index.php");    
        die();
    }   catch(PDOException $e) {
        die("Query falhou: " .$e->getMessage());

    }
} else {
    header("Location: ../index.php");
}
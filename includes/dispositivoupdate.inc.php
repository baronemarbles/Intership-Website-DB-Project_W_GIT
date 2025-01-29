<?php

#patrimonio,numero_de_serie,marca,modelo,categoria,localizacao, status_device,observacao

if($_SERVER["REQUEST_METHOD"] == "POST") {
        $campo = $_POST["campo"];
        $val_atual = $_POST["val_atual"];
        $val_novo = $_POST["val_novo"];
        $patrimonio = $_POST["patrimonio"];
        
       
        

        try{
            require "dbh.inc.php";
            $query = "SELECT $campo from testedb where patrimonio = :patrimonio;";
            #$check_campo_antigo = "SELECT :campo from testedb where :campo = :val_atual AND patrimonio = $get_patrimonio;";
        
            $stmt= $connection-> $pdo->prepare($query);
            $stmt->bindParam(":patrimonio",$patrimonio);
            $stmt->execute();
            $results = $stmt->fetch(PDO::FETCH_ASSOC);
            
            if($results&& $results[$campo] == $val_atual){
                $update = "UPDATE testedb SET $campo= :val_novo where patrimonio= :patrimonio";
                $updt= $pdo->prepare($update);
                $updt->bindParam(":val_novo",$val_novo);
                $updt->bindParam(":patrimonio",$patrimonio);
                $updt->execute();
                echo"<style>background-image:url('../imgs/testtt.png'); 
                    #worked{
                    text-align:center;
                    margin-inline:auto;}
                </style>";
                echo"<h2 id='worked'>Atualização bem-sucedida!<h2>";
              
            } else{
                echo "Dados não coincidem ou dispositivos não foram encontrado";
            }
           
            /*
                if($get_patrimonio==$val_atual){
                    $query = "UPDATE testedb SET :valor_atual = :val_novo;";


                    $stmt=$pdo->prepare($query);

                    $stmt->bindParam(":valor_atual", $val_atual);
                    $stmt->bindParam(":val_novo",$val_novo);
        

                    $stmt->execute();

                    $pdo = null;
                    $stmt = null;

                    header("//location:index.php");
                }   else{ die();
                        }
    
        */
        
        
    
    
        
            $pdo = null;
            $stmt = null;
            $updt =null;

          /* header("Location: ../index.php");*/
            die();
        } catch(PDOException $e) {
            die("Query falhou: " .$e->getMessage());

                }
} else {
    header("Location: ../index.php");
}
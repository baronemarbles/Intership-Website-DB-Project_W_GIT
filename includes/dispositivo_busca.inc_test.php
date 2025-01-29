<?php

#patrimonio,numero_de_serie,marca,modelo,categoria,localizacao, status_device,observacao

if($_SERVER["REQUEST_METHOD"] == "POST") {
        $identificador = $_POST["identificador"];
        $valor_identificador = $_POST["valor_identificador"];

        strtolower($identificador);
        strtolower($valor_identificador);

               
        

    try{
        require "dbh.inc.php";
        
        $query = "SELECT * FROM `testedb` WHERE :identificador = ':valor_identificador';";
        
        $stmt= $pdo->prepare($query);
        
        $stmt->bindParam(":identificador",$identificador);
        $stmt->bindParam(":valor_identificador",$valor_identificador);
        


        $stmt->execute();
        
        $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
         }   catch(PDOException $e) {
        die("Query falhou: " .$e->getMessage());

        }
} else {
    header("Location: ../index.php");
}

        ?>
        
        <!DOCTYPE HTML>

        <html>
            <head>
            </head>
        <body>  
        <?php
        if(empty($results)){
            echo "<div>";
            echo "<p>Não há dados sobre o dispositivo especificado</p>";
            echo "</div>";
        } else{
            foreach($results as $row){
                echo "<div class='bloco_resultados>";
                switch($identificador){
                    
                    case "numero_de_serie":
                        echo "<p class='p_resultados'>".htmlspecialchars($row["numero_de_serie"])."</p>";
                        echo "<br>";
                        break;

                    case "marca":
                        echo "<p class='p_resultados'>".htmlspecialchars($row["marca"])."</p>";
                        echo "<br>";
                        break;

                    case "modelo":
                        echo "<p class='p_resultados'>".htmlspecialchars($row["modelo"])."</p>";
                        echo "<br>";
                        break;

                    case "categoria":
                        echo "<p class='p_resultados'>".htmlspecialchars($row["categoria"])."</p>";
                        echo "<br>";        
                        break;

                    case "localizacao": 
                        echo "<p class='p_resultados'>".htmlspecialchars($row["localizacao"])."</p>";
                        echo "<br>";
                        break;

                    case "status_device":
                        echo "<p class='p_resultados'>".htmlspecialchars($row["status_device"])."</p>";
                        echo "<br>";
                        break;

                    case "observacao":
                        echo "<p class='p_resultados'>".htmlspecialchars($row["observacao"])."</p>";
                        echo "<br>";
                        break;

                    default: 
                        header("Location: ../index.php");

                        
                }
                /*-echo "<h4>".htmlspecialchars($row["patrimonio"])."</h4>";
                echo "<p class='p_resultados'>".htmlspecialchars($row["numero_de_serie"])."</p>";
                echo "<p class='p_resultados'>".htmlspecialchars($row["marca"])."</p>";
                echo "<p class='p_resultados'>".htmlspecialchars($row["modelo"])."</p>";
                echo "<p class='p_resultados'>".htmlspecialchars($row["categoria"])."</p>";
                echo "<p class='p_resultados'>".htmlspecialchars($row["localizacao"])."</p>";
                echo "<p class='p_resultados'>".htmlspecialchars($row["status_device"])."</p>";
                echo "<p class='p_resultados'>".htmlspecialchars($row["observacao"])."</p>";
                echo "<br>";
                

               
                */ 
                echo "</div>";
#patrimonio,numero_de_serie,marca,modelo,categoria,localizacao, status_device,observacao                
            }
        }
        

        $pdo = null;
        $stmt = null;

        
   
?>
</body>
</html>
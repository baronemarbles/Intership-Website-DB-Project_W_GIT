
<?php
#patrimonio,numero_de_serie,marca,modelo,categoria,localizacao, status_device,observacao

if($_SERVER["REQUEST_METHOD"] == "POST") {
    $identificador = $_POST["identificador"];
    $valor_identificador = $_POST["valor_identificador"];

    strtolower($identificador);
    strtolower($valor_identificador);

           
    

try{
    require "dbh.inc.php";
    
    $query = "SELECT * FROM `testedb` WHERE $identificador = :valor_identificador;";
    
    $stmt= $pdo->prepare($query);
    
    $stmt->bindParam(":valor_identificador",$valor_identificador);
    


    $stmt->execute();
    
    $results = $stmt->fetch(PDO::FETCH_ASSOC);
            $arr_dispositivo_e[8];
            $arr_dispositivo_e[0]=$results['patrimonio'];
            $arr_dispositivo_e[1]=$results['numero_de_serie'];
            $arr_dispositivo_e[2]=$results['marca'];
            $arr_dispositivo_e[3]=$results['modelo'];
            $arr_dispositivo_e[4]=$results['categoria'];
            $arr_dispositivo_e[5]=$results['localizacao'];
            $arr_dispositivo_e[6]=$results['status_device'];
            $arr_dispositivo_e[7]=$results['observacao'];



    $pdo = null;
    $stmt = null;

    
}   catch(PDOException $e) {
    die("Query falhou: " .$e->getMessage());

}

} else {
    header("Location: ../index.php");
}

?>



<!DOCTYPE HTML>
<html lang="pt-br">
    <head>
        <meta charset="utf8-br">
        <meta name="viewport" content="width=device-width,initial-scale=1.0">
        <title>Resultados</title>
        <link rel="stylesheet" href="../css/teste_processaform.css">
    </head>
 
<body>
    <img id="logo_on_page"src="../imgs\logo.png" alt="Logotipo da SBT">
        <h1 class="bebas-neue-regular ">Resultados: </h1>

        <!--Resultados-->
    <br>
   


        <h3>Dispositivo encontrado</h3>

        <!--patrimonio,numero_de_serie,marca,modelo,categoria,localizacao, status_device,observacao -->
        <div class="centralized">
            <form action = "includes/dispositivo.inc.php" class ="form"method = "POST">
                    <label class="label" for="patrimonio">Patrimonio:</label>    
                    <input type = "text" name="patrimonio" id="patrimonio" placeholder="Patrimônio" value="<?php echo $arr_dispositivo_e[0]; ?>">
                    
                    <label class="label" for="numero_de_serie">Numero de Série:</label>    
                    <input type ="text" name="numero_de_serie" id= "numero_de_serie" placeholder="Número de Série" value="<?php echo $arr_dispositivo_e[1];?>">
                    
                    <label class="label" for="marca">Marca:</label>    
                    <input type ="text" name="marca" id="marca" placeholder="Marca" value="<?php echo $arr_dispositivo_e[2]; ?>">
                    
                    <label class="label"for="modelo">Modelo:</label>    
                    <input type ="text" name="modelo" id= "modelo" placeholder="Modelo" value="<?php echo $arr_dispositivo_e[3];  ?>">
                    
                    <label class="label" for="categoria">Categoria:</label>    
                    <input type ="text" name="categoria" id="categoria" placeholder="Categoria" value="<?php echo $arr_dispositivo_e[4]; ?>">
                    
                    <label class="label" for="localizacao">Localização:</label>    
                    <input type ="text" name="localizacao" id="localizacao" placeholder="Localização" value="<?php echo $arr_dispositivo_e[5]; ?>">
                    
                    <label class="label" for="status_device">Estado do dispositivo:</label>    
                    <input type ="text" name="status_device" id="status_device" placeholder="Estado do dispositivo" value="<?php echo $arr_dispositivo_e[6] ;?>">
                    
                    <label class="label" for="observacao">observacao:</label>    
                    <input type ="text" name="observacao" id="observacao" placeholder="Observação" value="<?php echo $arr_dispositivo_e[7] ?>">

                    <div  id="buttns_container">
                    <button class="buttn"id="bttn_update">Atualizar</button>
                    <button class="buttn" id="bttn_deletar">Deletar</button>
                    </div>
            </form>
        </div>


        <br>

        
            <br>
            <div id="back_buttn"><a href="../index.php"><button id="bk_buttn">Voltar</button></a></div>
            

    </body>
    
    <footer></footer>
</html>

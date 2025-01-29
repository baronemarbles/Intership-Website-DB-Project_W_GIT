<!DOCTYPE HTML>
<html lang="pt-br">
    <head>
        <meta charset="utf8-br">
        <meta name="viewport" content="width=device-width,initial-scale=1.0">
        <title>Buscar Dispositivos | Dispositivos VTV</title>
        <link rel="logo" href="/imgs/logo.png" type="image/png" sizes="16x16">
        <link rel="stylesheet" href="css/index.css">
        <script src="/javascript/navmenu.js"></script>
    </head>
    
    <body>
        
        <img id="logo_on_page"src="imgs\logo.png" alt="Logotipo da SBT">
        <h1 class="bebas-neue-regular ">Dispositivos vtv</h1>
        
        
        <!-- Criando o menu de navegação-->

        <div class="navmenu" id="firstnavmenu">
            <a class=".bebas-neue-regular" href="index.php" class="active" id="registrar">Registrar</a>
            <a class=".bebas-neue-regular" href="update.php" id="atuaizar">Atualizar</a>
            <a class=".bebas-neue-regular" href="delete.php" id="deletar">Deletar</a>
            <a class=".bebas-neue-regular" href="search.php" id="buscar">Buscar</a>
            <a href="javascript:void(0);" class="icon" onclick="myFunction()">
                <i class="fa fa-bars"></i>
            </a>
        </div>


        <!--Criando o formulário de registro -->

        <h3>É esse o seu dispositivo ?</h3>

        <?php 
        
         require "dbh.inc.php";
         require "search_h.php";
        
        ?>

        <!--patrimonio,numero_de_serie,marca,modelo,categoria,localizacao, status_device,observacao -->
         <div class="centralized">
            <form action = "includes/search_h.php" class ="form"method = "POST">
                <input type = "text" name="patrimonio" placeholder="Patrimônio">
                <input type ="text" name="numero_de_serie" placeholder="Número de Série">
                <input type ="text" name="marca" placeholder="Marca">
                <input type ="text" name="modelo" placeholder="Modelo">
                <input type ="text" name="categoria" placeholder="Categoria">
                <input type ="text" name="localizacao" placeholder="Localização">
                <input type ="text" name="status_device" placeholder="Estado do dispositivo">
                <input type ="text" name="observacao" placeholder="Observação">
                <button class="buttn">Registrar</button>
            </form>
        </div>
   

        <br>


        <?php
            $con = mysqli_connect("127.0.0.1","root","","vtdb_controle","3306");
            

        ?> 
    </body>
    
    <footer></footer>
</html>
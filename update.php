<?php
session_start();
if(!isset($_SESSION['username'])) {
    header('Location: login_u.php');
    exit();
}
?>



<!DOCTYPE HTML>
<html lang="pt-br">
    <head>
        <meta charset="utf8-br">
        <meta name="viewport" content="width=device-width,initial-scale=1.0">
        <title>Dispositivos VTV</title>
        <link rel="stylesheet" href="css/teste_atualizar.css">
        <script src="/javascript/navmenu.js"></script>
    </head>
    
    <body>
        

         <!--Criação do menu do usuário-->

         <div class='accountMenuContainer'>
            <div class='icon_container'>
                <div class= 'icon'> <img class='items_icons'src='imgs\user_icon.png'><?($_SESSION['username']);?>
                    <span class='icone_esq'></span>
                    <span class='icone_dir'></span>

                    <div class='items'>
                        <a href='index.php' style='--i:1;'><span></span><img class='items_icons'src='imgs\home.svg'>Início</a>
                        <a href='account_config.php' style='--i:2;'><img class='items_icons'src='imgs\gear.svg'>Configurações</a>
                        <a href='includes/logout.php' style='--i:3;'><img class='items_icons'src='imgs\logout.svg'>Logout</a>
                    </div>
                        
                </div>
            </div>
        </div>




        <img id="logo_on_page"src="imgs\VTV_SBT_LOGO_MONO.svg" alt="Logotipo da SBT">
        <h1 class="bebas-neue-regular ">Dispositivos vtv</h1>
        
        
        <!-- Criando o menu de navegação-->

        <div class="navmenu" id="firstnavmenu">
            <a class=".bebas-neue-regular" href="index.php" class="active" id="registrar">Registrar</a>
            <a class=".bebas-neue-regular" href="update.php" id="atualizar">Atualizar</a>
            <a class=".bebas-neue-regular" href="delete.php" id="deletar">Deletar</a>
            <a class=".bebas-neue-regular" href="search.php" id="buscar">Buscar</a>
            <a href="javascript:void(0);" class="icon" onclick="myFunction()">
                <i class="fa fa-bars"></i>
            </a>
        </div>

        
        <br>

 <!--Criando o menu de busca-->
        <div class="centralized">
        <form action = "includes/processaform_update.php" method = "POST">
                <p>Encontre o dispositivo a ser alterado  <a id="Highlights"></a><br>
                <pre id="highlight_search_example" >E depois faça suas alterações.</pre> 
                </p>
                <div id=box_form>
                <input type ="text" name="patrimonio" placeholder="Patrimônio" required>
                <div id=""> <button class= "buttn">Encontrar</button></div>
            </form>
        </div>


    <!-- Criação do Script para não permitir--->
    <!-- que não envie o formulário váizio. -->     
    <script>
                    const form = document.querySelector('form');
                    const input =  document.querySelector('input');

                    form.addEventListener('submit',function(event) {
                        event.preventDefault();

                        if(input.value.trim()===''){
                            alert('Por favor preencha os campos!');
                        } else {
                            form.submit();
                        }
                        
                    });

                    const botao_icon = document.querySelector('.icon_container');

                    botao_icon.addEventListener('click',()=>{
                    botao_icon.classList.toggle('active');
                    });
                </script>        
                    

    </body>
    
    <footer></footer>
</html>
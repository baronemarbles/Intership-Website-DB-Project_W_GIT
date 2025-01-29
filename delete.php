<!DOCTYPE HTML>
<html lang="pt-br">
    <head>
        <meta charset="utf8-br">
        <meta name="viewport" content="width=device-width,initial-scale=1.0">
        <title>Dispositivos VTV</title>
        <link rel="stylesheet" href="css/delete.css">
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
            <a class=".bebas-neue-regular" href="update.php" id="atuaizar">Atualizar</a>
            <a class=".bebas-neue-regular" href="delete.php" id="deletar">Deletar</a>
            <a class=".bebas-neue-regular" href="search.php" id="buscar">Buscar</a>
            <a href="javascript:void(0);" class="icon" onclick="myFunction()">
            <i class="fa fa-bars"></i>
            </a>
        </div>

        <br>
        

        

        <!--patrimonio,numero_de_serie,marca,modelo,categoria,localizacao, status_device,observacao -->
        <div class="centralized">
            <h3>Delete o dispositivo</h3>
        
            <form action = "includes/deletedispositivo.inc.php" method = "POST">
                <input type = "text" name="patrimonio" placeholder="Patrimônio" required>
                <input type ="text" name="localizacao" placeholder="Localização" required>
                <div id="div_verif_certeza"><input type="checkbox" name="verif_certeza" id="verif_certeza" value="1"><label for="verif_certeza" id="label_verif_certeza">Tem certeza que deseja deletar todas as informações do dispositivo ?</label> </div>
                <button type="submit" class="buttn">Deletar</button>
            </form>
        </div>
        
        <br>

            

        <?php
            $con = mysqli_connect("127.0.0.1","root","","vtdb_controle","3306");
            
        ?> 

        <!-- Criação do Script para não permitir--->
        <!-- que não envie o formulário váizio. -->
        <script>
            const form = document.querySelector('form');
            const input =  document.querySelector('input');

            form.addEventListener('submit',function(event) {
                event.preventDefault();

                if(input.value.trim()===''){
                    header('URL:login_u.php');
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
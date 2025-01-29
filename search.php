<!DOCTYPE HTML>
<html lang="pt-br">
    <head>
        <meta charset="utf8-br">
        <meta name="viewport" content="width=device-width,initial-scale=1.0">
        <link rel="stylesheet" href="css/search_correct.css">
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



        <!--Criando o menu de busca-->
    <br>


    <div class="centralized">
       <form action = "includes/search_h.php" method = "POST">
            <p>Insira o filtro que você deseja e valor dele. <br> <a id="Highlights">Os filtros devem ser passados exatamente como listados abaixo!</a></p>
                <pre><a id="highlight_search_example">patrimonio | numero_de_serie | marca | modelo | categoria | localizacao | status_device | observacao</a></pre> 

            </p>
            <div id=box_form>
                <br>
                <input type ="text" name="identificador" placeholder="Filtro" >
                <input type ="text" name="valor_identificador" placeholder="Valor,ou número,ou sérial etc" >
                <div class="checkbox_container"></div>
                <hr id="hr_ou">
                
                <input type="checkbox" name="check_tudo" value="1" id="check_tabela_toda"> <label for="check_tabela_toda">Exibir a tabela inteira sem filtro</label>
            </div>
            
            <button class= "buttn">Buscar</button>
            
        </form>
    </div>

    <script>
         const botao_icon = document.querySelector('.icon_container');

        botao_icon.addEventListener('click',()=>{
        botao_icon.classList.toggle('active');
});
    </script>    


    </body>
    
    <footer></footer>
</html>
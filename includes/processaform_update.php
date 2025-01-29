
<?php
#patrimonio,numero_de_serie,marca,modelo,categoria,localizacao, status_device,observacao
session_start();
if(!isset($_SESSION['username'])) {
    header('Location: login_u.php');
    exit();
}

if($_SERVER["REQUEST_METHOD"] == "POST") {
    $patrimonio = $_POST["patrimonio"];
    $username=$_SESSION['username'];
    #echo empty($_POST["patrimoio"]);    
       
        

        strtolower($patrimonio);


            
        

    try{
        require "dbh.inc.php";
        
        $query = "SELECT * FROM `testedb` WHERE patrimonio = :patrimonio;";
        
        $stmt= $pdo->prepare($query);
        
        $stmt->bindParam(":patrimonio",$patrimonio);
        


        $stmt->execute();
        
        $results = $stmt->fetch(PDO::FETCH_ASSOC);

        if(empty($results)){
            $stmt=null;
            $pdo=null;
            header('Location: ../update.php');
            echo '<script>alert("Dispositivo não identificado!")</script>';
            die();
        }
        $arr_dispositivo_e=array_fill(0, 8, null);

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

    <!--Criação do menu do usuário-->

    <div class='accountMenuContainer'>
            <div class='icon_container'>
                <div class= 'icon'> <img class='items_icons'src='..\imgs\user_icon.png'><?($_SESSION['username']);?>
                    <span class='icone_esq'></span>
                    <span class='icone_dir'></span>

                    <div class='items'>
                        <a href='index.php' style='--i:1;'><span></span><img class='items_icons'src='..\imgs\home.svg'>Início</a>
                        <a href='account_config.php' style='--i:2;'><img class='items_icons'src='..imgs\gear.svg'>Configurações</a>
                        <a href='includes/logout.php' style='--i:3;'><img class='items_icons'src='..\imgs\logout.svg'>Logout</a>
                    </div>
                        
                </div>
            </div>
        </div>


    <img id="logo_on_page"src="../imgs\logo.png" alt="Logotipo da SBT">
        <h1 class="bebas-neue-regular ">Resultados: </h1>

        
    <br>
   
        


        <!--Resultados parciais da busca do dispisitivo-->

        <!--patrimonio,numero_de_serie,marca,modelo,categoria,localizacao, status_device,observacao -->
        <div class="centralized">
            <h3>Dispositivo encontrado</h3>
            <form action = "updatefpreennchido.php" class ="form"method = "POST">
                    <label class="label" for="patrimonio">Patrimonio:</label>    
                    <input type = "text" name="patrimonio" id="patrimonio" placeholder="Patrimônio" value="<?php echo $arr_dispositivo_e[0]; ?>" required>
                    
                    <label class="label" for="numero_de_serie">Numero de Série:</label>    
                    <input type ="text" name="numero_de_serie" id= "numero_de_serie" placeholder="Número de Série" value="<?php echo $arr_dispositivo_e[1];?>" required>
                    
                    <label class="label" for="marca">Marca:</label>    
                    <input type ="text" name="marca" id="marca" placeholder="Marca" value="<?php echo $arr_dispositivo_e[2]; ?>" required>
                    
                    <label class="label"for="modelo">Modelo:</label>    
                    <input type ="text" name="modelo" id= "modelo" placeholder="Modelo" value="<?php echo $arr_dispositivo_e[3];  ?>" required>
                    
                    <label class="label" for="categoria">Categoria:</label>    
                    <input type ="text" name="categoria" id="categoria" placeholder="Categoria" value="<?php echo $arr_dispositivo_e[4]; ?>" required>
                    
                    <label class="label" for="localizacao">Localização:</label>    
                    <input type ="text" name="localizacao" id="localizacao" placeholder="Localização" value="<?php echo $arr_dispositivo_e[5]; ?>" required>
                    
                    <label class="label" for="status_device">Estado do dispositivo:</label>    
                    <input type ="text" name="status_device" id="status_device" placeholder="Estado do dispositivo" value="<?php echo $arr_dispositivo_e[6] ;?>" required>
                    
                    <label class="label" for="observacao">observacao:</label>    
                    <input type ="text" name="observacao" id="observacao" placeholder="Observação" value="<?php echo $arr_dispositivo_e[7] ?>" required>
                    <!--Criação da checkbox-->
                    <!--<div id="div_verif_certeza"><input type="checkbox" name="verif_certeza" id="verif_certeza" value="1"><label for="verif_certeza" id="label_verif_certeza">Tem certeza ?</label> </div>-->

                    <div  id="buttns_container">
                    <button class="buttn"id="bttn_update">Atualizar</button>
                    <!--<button class="buttn" id="bttn_deletar">Deletar</button>-->
                    </div>
            </form>
        </div>


        <br>

        
            <br>
            <div id="back_buttn"><a href="../index.php"><button id="bk_buttn">Voltar</button></a></div>
        
            
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

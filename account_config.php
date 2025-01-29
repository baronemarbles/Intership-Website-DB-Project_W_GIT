<?php

try{
    require "includes/dbh.inc.php";
    session_start();
    $account_info = array_fill(0,4,null);
    $query = "SELECT * FROM users WHERE username = :username";
    $stmt= $pdo->prepare($query);
    $stmt->bindParam(":username",$_SESSION['username']);
    $stmt->execute();
    $account_info=$stmt->fetch(PDO::FETCH_ASSOC);
    echo "<!DOCTYPE HTML>";
        echo "<html>";
            echo "<head>";
                echo "<meta chartype='UTF8-br'>";
                echo "<meta name='viewport' content='width=device-width, initial-scale=1.0'>";
                echo "<link rel='stylesheet' href='css/account_config.css'>";
            echo "</head>";
            
            echo "<body>";
            /*foreach ($account_info as $ai){*/
                /*echo $_SESSION["username"];*/

            
            
                /*começo nav menu conta*/ 

                echo "<div class='accountMenuContainer'>";
                    echo"<div class='icon_container'>";
                        echo "<div class= 'icon'> <img class='items_icons'src='imgs\user_icon.png'>(".$_SESSION['username'].")";
                            echo "<span class='icone_esq'></span>";
                            echo "<span class='icone_dir'></span>";
                  

                            echo "<div class='items'>";
                                echo"<a href='index.php' style='--i:1;'><span></span><img class='items_icons'src='imgs\home.svg'>Início</a>";
                                echo"<a href='account_settings.php' style='--i:2;'><img class='items_icons'src='imgs\gear.svg'>Configurações</a>";
                                echo"<a href='includes/logout.php' style='--i:3;'><img class='items_icons'src='imgs\logout.svg'>Logout</a>";
                            echo "</div>";
                        echo"</div>";
                    echo "</div>";
                echo "</div>";


                /*Começo form*/ 

                echo "<form class= 'centralized'  method='POST'>";
                echo "<label class='label' for='username'>Nome de Usuário</label>";
                echo "<input type ='text' name='username' value='".htmlspecialchars($account_info["username"])."' required>";
        
                echo "<label class='label' for='email'>Email Vinculado</label>";
                echo "<input type ='text' name='email' value='".htmlspecialchars($account_info["email"])."' required>";

                echo "<label class='label' for='password'>Senha</label><img id ='eye_opened_svg'src='imgs/eye_open.svg'>";
                echo "<input id='input_password' type ='text' name='password' value='".htmlspecialchars($account_info["pw"])."' required>";
                
                echo "<button class='bttn'>Voltar</button>";
                echo "</form>";
        
                echo "<script src='javascript/account_config.js'></script>";
            echo "</body>";
        echo "</html>";
    
   
    
} catch(PDOException $e){
    echo "Erro: ".$e;
}
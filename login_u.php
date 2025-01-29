<!DOCTYPE HTML>
<html>
    <head>
        <meta charset = "UTF-8">
        <meta name = "viewport" content= "width= device-width, initial.scale = 1.0">
        <link rel="stylesheet" href="css/login_u.css">
    </head>
    
    <body>
    <!--criação form-->


        <div class="centralized">
            <h1 class="unna-bold">LogIn</h1>
            <br>
            
            <!--<img class= "mini_icons" src="imgs/user_icon.png" alt="icone_user">-->

            <form action = "includes/login_u_verif.php" class ="form"method = "POST">
                <span class="icon"></span>
                <input type ="text" name="usuario" placeholder="Usuário" required>
                <span class="icon"></span>
                <input type ="password" name="senha" placeholder="Senha" required>
                <button class="buttn">Login</button>
            </form>
        </div>
       
   

        <br>
    </body>
    <footer></footer>
</html>
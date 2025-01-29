<?php 
  session_start();
  if(!isset($_SESSION['username'])) {
      header('Location: login_u.php');
      exit();
  }

if($_SERVER["REQUEST_METHOD"] == "POST"){
        $vet=array_fill(0, 8, null);
        $vet[0] = $_POST["patrimonio"];
        $vet[1] = $_POST["numero_de_serie"];
        $vet[2] = $_POST["marca"];
        $vet[3] = $_POST["modelo"];
        $vet[4] = $_POST["categoria"];
        $vet[5] = $_POST["localizacao"];
        $vet[6] = $_POST["status_device"];
        $vet[7] = $_POST["observacao"];
        $username = $_SESSION['username'];
        

    try{
        require "dbh.inc.php";
    /** Começo criação vetor com dados do bd afim de verirficar*/
            $verif_query = "SELECT * FROM testedb WHERE patrimonio = :patrimonio;";
            $vet_verif=array_fill(0, 8, null);;
            
            $stmt= $pdo->prepare($verif_query);
            $stmt->bindParam(":patrimonio",$vet[0]);
            $stmt->execute();
            
            $verif=$stmt->fetch (PDO::FETCH_ASSOC);
            if(empty($verif)){
                echo "tá vázio";
                die();
            } else{
                $vet_verif[0]= htmlspecialchars($verif["patrimonio"]);
                $vet_verif[1]= htmlspecialchars($verif["numero_de_serie"]);
                $vet_verif[2]= htmlspecialchars($verif["marca"]);
                $vet_verif[3]= htmlspecialchars($verif["modelo"]);
                $vet_verif[4]= htmlspecialchars($verif["categoria"]);
                $vet_verif[5]= htmlspecialchars($verif["localizacao"]);
                $vet_verif[6]= htmlspecialchars($verif["status_device"]);
                $vet_verif[7]= htmlspecialchars($verif["observacao"]);

                
                
            }
            
        
        

            $upd = "UPDATE testedb SET '' = :val_novo where patrimonio = :patrimonio";
            
            
            if(isset($vet_verif)&&is_array($vet_verif)){
                for($i=0;$i<8;$i++){
                    if($vet_verif[$i]!=$vet[$i]){
                        switch($i){
                            case 0:
                                    $campo_mod = 'patrimonio';
                                    $upd = "UPDATE testedb SET patrimonio = :val_novo where patrimonio = :patrimonio";
                                    break;
                        
                            case 1:
                                    $campo_mod = 'numero_de_serie';
                                    $upd = "UPDATE testedb SET numero_de_serie = :val_novo where patrimonio = :patrimonio";
                                    break;
                                
                            case 2:
                                    $campo_mod = 'marca';
                                    $upd = "UPDATE testedb SET marca = :val_novo where patrimonio = :patrimonio";
                                    break;
                                
                            case 3:
                                    $campo_mod = 'modelo';
                                    $upd = "UPDATE testedb SET modelo = :val_novo where patrimonio = :patrimonio";
                                    break;

                            case 4:
                                    $campo_mod = 'categoria';
                                    $upd = "UPDATE testedb SET categoria = :val_novo where patrimonio = :patrimonio";
                                    break;

                            case 5:
                                    $campo_mod = 'localizacao';
                                    $upd = "UPDATE testedb SET localizacao = :val_novo where patrimonio = :patrimonio";
                                    break;

                            case 6:
                                    $campo_mod = 'status_device';
                                    $upd = "UPDATE testedb SET status_device = :val_novo where patrimonio = :patrimonio";
                                    break;

                            case 7:
                                    $campo_mod = 'observacao'; 
                                    $upd = "UPDATE testedb SET observacao = :val_novo where patrimonio = :patrimonio";
                                    break;
                        
                        }
                        $stmt= $pdo->prepare($upd);
                        $stmt->bindParam(":val_novo",$vet[$i]);
                        $stmt->bindParam(":patrimonio",$vet_verif[0]);
                        $stmt->execute();







                            /*echo "<br>";
                            echo $upd;*/
                    
                    } /*else{
                        echo "<style>
                                p{
                                
                                text-align:center;
                                    }

                                #p_container{
                                display:flex;
                                height:fit-content;
                                width:fit-content;
                                border: 2px solid red;
                                align-self:center;
                                margin: left 100px;
                                    }

                                #back_buttn{
                                    display:flex;
                                    height: 48px;
                                    width:98px;
                                    margin-left: auto;
                                    margin-right:auto;
                                    margin-top:auto;
                                    margin-bottom:auto;
                                }

                                #bk_buttn{
                                    height:48px;
                                    width:98px;
                                    border: 2px solid white;
                                    border-radius: 42px;
                                    transition: background-color .2s ease-in-out; 
                                }

                            #bk_buttn:hover{
                                    background-color: gainsboro;
                                    scale:100.5%;
                                } 
                            </style>"; 
                        echo "<div id='p_container'><p>Não houve alterações no campo para que houvesse alteração</p></div>";
                        echo "<div id='back_buttn'><a href='../index.php'><button id='bk_buttn'>Voltar</button></a></div></style";
                        $pdo=null;
                        $stmt=null;
                        die();
                            }*/
                } 
                $pdo = null;
                $stmt = null;
                echo "<style>   #back_buttn{
                                    display:flex;
                                    height: 48px;
                                    width:98px;
                                    margin-left: auto;
                                    margin-right:auto;
                                    margin-top:auto;
                                    margin-bottom:auto;
                                }

                                #bk_buttn{
                                    height:48px;
                                    width:98px;
                                    border: 2px solid white;
                                    border-radius: 42px;
                                    transition: background-color .2s ease-in-out; 
                                }

                            #bk_buttn:hover{
                                    background-color: gainsboro;
                                    scale:100.5%;
                                } 
                    </style>";
            echo "<div id='back_buttn'><a href='../index.php'><button id='bk_buttn'>Voltar</button></a></div></style";
            echo "<script>alert(Alteração realizada com êxito!)</script>";
            
        } else{
            throw new Exception("Os dados do dispositivo anterior não estão disponíveis ou não são uma array.");
            }

    } catch(PDOException $e) {
            die("Query falhou: " .$e->getMessage());
            } catch(Exception $e){
                die("Erro: ".$e->getMessage());
            }
}





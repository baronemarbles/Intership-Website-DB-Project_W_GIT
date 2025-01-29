<?



try{
require '../dbh.inc.php';

} catch(PDOException $e){
    echo "Erro: $e";
}
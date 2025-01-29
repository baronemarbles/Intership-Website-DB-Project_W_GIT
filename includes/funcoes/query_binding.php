<!--<#?php




function query_binding($q, $placeholder_1, $placeholder_2){
    try{
        require "../dbh.inc.php";
        $stmt= $pdo->prepare($q);
        $stmt->bindParam($placeholder_1,)
    
    } catch(PDOException $e){
        ;
    }
}*/





<?php
try{

    require '../dbh.inc.php';

    $triggerQuery = " DELIMITER $$ 
            CREATE TRIGGER after_insert_testedb 
            AFTER INSERT ON testedb 
            FOR EACH ROW 
            BEGIN 
                DECLARE user_email VARCHAR(255);
                SELECT email INTO user_email FROM Users WHERE username = NEW.username; 
                INSERT INTO log_s (id_device, username, email, modified_at) 
                VALUES (NEW.id, NEW.username, user_email, NOW()); 
                END $$ 
                DELIMITER ; ";
            
        $stmt= $connection->$pdo->exec($triggerQuery);
        $pdo=null;
        $stmt=null;
        die();


} catch(PDOException $e){
    echo "Erro: $e";
}

?>

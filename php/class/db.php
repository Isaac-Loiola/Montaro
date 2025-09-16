<?php 
    function getConnection() : PDO{ // retorna um objeto PDO
        static $pdo;
        if( $pdo === null){
            $pdo = new PDO(
                "mysql:host=10.91.47.77;dbname=modelophp_db", 
                "root", 
                "123",
                [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION, 
                PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC]
            );

        }
        return $pdo;
    }
?>
<?php 
    function getConnection() : PDO{ // retorna um objeto PDO
        static $pdo;
        if( $pdo === null){
            $pdo = new PDO(
                // senha desktop
                // "mysql:host=127.0.0.1;dbname=tdszuphpdb01", 
                // "root", 

                // senha senac
                // "adsz..XcW21034",
                // "mysql:host=10.91.47.77;dbname=tdszuphpdb01", 
                // "root", 
                // "123",

                // senha notebook
                "mysql:host=127.0.0.1;dbname=tdszuphpdb01", 
                "root", 
                "adsz..XcW21034",
                [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION, 
                PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC]
            );
        }
        return $pdo;
    }
<?php
    define('HOST','localhost');
    define('DB_NAME','SIMFAST');
    define('USER','root');
    define('PASS','q4ToTaeWRz3QHd3V');

    try{
        $db = new PDO("mysql:host=" . HOST . ";dbname=" . DB_NAME,USER,PASS);
        $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        // echo "Connect > OK !";
    } catch(PDOException $e){
        echo $e;
    }
?>

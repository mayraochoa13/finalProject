<?php   
    function connecToDB() {
             $host = "localhost";
             $username = "mayochoa13";
             $password = "pulpO1013";
             $dbname = 'myPlace'; 
        // heroku info
         // $host = "us-cdbr-iron-east-05.cleardb.net";
         // $dbname = $dbName;
         // $username = "b6c4f6e311039e";
         // $password = "99eed8ab";
        
        
        $dsn = "mysql:host=$host; dbname=$dbname";
        $opt = [
            PDO::ATTR_ERRMODE    => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE    => PDO::FETCH_ASSOC,
            PDO::ATTR_EMULATE_PREPARES    => false,
        ];
        $pdo = new PDO($dsn,$username,$password,$opt);
        return $pdo;
    
    try {
        //Creates a database connection
        $dbConn = new PDO("mysql:host=$host;dbname=$dbName", $username, $password);
    
        // Setting Errorhandling to Exception
        $dbConn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); 
    }
    catch (PDOException $e) {
       echo "Problems connecting to database!";
       exit();
    }
    }
   ?>
<?php   
    function connecToDB() {
            //  $host = "localhost";
            //  $username = "mayochoa13";
            //  $password = "pulpO1013";
            //  $dbname = 'myPlace'; 
             
             //mysql://b992a7a74538f5:52272d6a@us-cdbr-iron-east-04.cleardb.net/heroku_64fb8dc07334924?reconnect=true
            //heroku info mysql://b992a7a74538f5:52272d6a@us-cdbr-iron-east-04.cleardb.net/heroku_64fb8dc07334924?reconnect=true
              $host = "us-cdbr-iron-east-04.cleardb.net";
              $dbname = "heroku_64fb8dc07334924";
              $username = "b992a7a74538f5";
              $password = "52272d6a";
        
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
<?php   
    function connecToDB() {
            //  $host = "localhost";
            //  $username = "mayochoa13";
            //  $password = "pulpO1013";
            //  $dbname = 'myPlace'; 
             //mysql://b992a7a74538f5:52272d6a@us-cdbr-iron-east-04.cleardb.net/heroku_64fb8dc07334924?reconnect=true
        //heroku info
          $host = "us-cdbr-iron-east-04.cleardb.net";
          $dbname = "heroku_64fb8dc07334924";
          $username = "b992a7a74538f5";
          $password = "52272d6a";
        
    if  (strpos($_SERVER['HTTP_HOST'], 'herokuapp') !== false) {
        $url = parse_url(getenv("CLEARDB_DATABASE_URL"));
        $host = $url["host"];
        $dbName = substr($url["path"], 1);
        $username = $url["user"];
        $password = $url["pass"];
    } 
    
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
    
    
    return $dbConn;
    }
   ?>
<?php
    session_start();
    include 'dbConnection.php';
    $connect = connecToDB();
    
    $sql = "SELECT AVG(num_members) as volunteersAvg FROM ministry";
    $statement= $connect->prepare($sql);
    $statement->execute();
    $result = $statement->fetch(PDO::FETCH_ASSOC);
    echo json_encode($result);

?>
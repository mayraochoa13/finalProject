<?php
    session_start();
    include 'dbConnection.php';
    if(isset($_POST['member_name'])){
        echo "PASSED";
        echo $_POST['member_name'];
        updateLicense($_POST['member_name']);
    }
    if(isset($_POST['delete_name'])){
        echo "Hello";
        deleteVolunteer($_POST['delete_name']);
    }
    if(isset($_POST['name']) && isset($_POST['lname']) && isset($_POST['volunteer_age']) && isset($_POST['volunteer_role']) && isset($_POST['safety_license'])){
    
        echo $_POST['name'];
        insertVolunteer($_POST['name'], $_POST['lname'], $_POST['volunteer_age'], $_POST['volunteer_role'], $_POST['safety_license']);
    }
    function deleteVolunteer($name){
        $con = connecToDB();
        $sql = "SELECT * FROM `member` WHERE name='$name';";
        $statement = $con->prepare($sql);
        $statement->execute();
        if($statement->rowCount()>0){
            $sql = "DELETE FROM `member` WHERE name='$name';";
         } 
        $statement = $con->prepare($sql);
        $statement->execute();
    }
    function insertVolunteer($name, $lastname, $age, $role, $license){
        $con = connecToDB();
        $sql = "INSERT INTO `member`(name, lastname, age, role, license) VALUES('$name', '$lastname', '$age', '$role', '$license')";
        $statementmt = $con->prepare($sql);
        $statementmt->execute();

    }
    function updateLicense($name){
        $con = connecToDB();
        $sql = "SELECT * FROM `member` WHERE name='$name';";
        $statement = $con->prepare($sql);
        $statement->execute();
        if($statement->rowCount()>0){
            $sql = "UPDATE `member` SET license = 'Y' WHERE `name` IN ('$name');";
         } else{
             echo "Fail!";
         }
        $statement = $con->prepare($sql);
        $statement->execute();
        
     }
     
     function displayInfo(){
       
        $connect = connecToDB();
     
        $sql = "SELECT * FROM `member`";
        
        $statement = $connect->prepare($sql);
        $statement->execute();
    
        if($statement->rowCount()>0){
            echo "</br></br>";
            echo "<table width='800' height='700' style='background-color:#f0fff7;' align = 'left' >";
            echo "<tr>";
            echo " <td><strong>Name</strong></td>";
            echo " <td><strong>Last Name</stron></td>";
            echo " <td><strong>Age</strong></td>";
            echo " <td><strong>Ministry</strong></td>";
            echo " <td><strong>Safe Enviroment License</strong></td>";
            echo "</tr>";
             while($row = $statement ->fetch(PDO::FETCH_ASSOC)){
                echo"<tr>";
                echo "<td>".$row['name']."</td>";
                echo "<td>".$row['lastname']."</td>";
                echo "<td>".$row['age']."</td>";
                echo "<td>".$row['role']."</td>";
                echo "<td>".$row['license']."</td>";
                echo"</tr>";
            }
            echo "</table>";
            
        } 
    }
     
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
        <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
        <link href="style.css" rel="stylesheet" type="text/css" />
        <title>Volunteer Team</title>
    </head>
    
    <body background="images/green2.jpg">
         <div class='container'>
            <div class='text-center'>
                
                <!-- Bootstrap Navagation Bar -->
                <nav class='navbar navbar-default - navbar-fixed-top'>
                    <div class='container-fluid'>
                        <div class='navbar-header'>
                            <a class='navbar-brand' href='#'> St Mary of the Nativity: <strong>where faith and service meet.</strong></a>
                        </div>
                        <ul class='nav navbar-nav'>
                        <li><a href='home.php'>Church Ministries</a></li>
                        <li><a href='team.php'>Volunteers</a></li>
                        </ul>
                    </div>
                </nav>
            </d>
            </br></br></br></br><font color = "#008080" size="5"><strong>Welcome Admin to our volunteer space.</strong></br></font>
            <font color = "#008080" size="3">Here you can find the private information of each volunteer as well insert and delete volunteers or update if any of the volunteers have their SE license.  </font>
            <?=displayInfo()?> 
        <form method="post">
            </br></br>
            <strong>Update Safe Environment License by name.</strong>
            <br>(Only if they obtained their SE License.)</br>
            <input id="member_name" type="text" name = "member_name" placeholder="Name" ></input>
            <input type="submit" name = "submit"  value = "Update"></input>
        </form>
           <form method="post">
            </br>
            <strong>Insert a new volunteer</strong></br>
            <input id="name" type="text" name = "name" placeholder="Name"></input></br>
            <input id="lname" type="text" name = "lname" placeholder="Last Name"></input></br>
            <input id="volunteer_age" type="text" name = "volunteer_age" placeholder="Age" ></input></br>
            <input id="volunteer_role" type="text" name = "volunteer_role" placeholder = "Role" ></input></br>
            <input id="safety_license" type="text" name = "safety_license" placeholder="Safety Enviroment License" ></input></br>
            <input type="submit" name = "submit"  value = "Insert"></input>
        </form>
           <form method="post">
            </br></br>
              <strong>Delete a volunteer by name:</strong>
            <input id="delete_name" type="text" name = "delete_name" ></input>
            <input type="submit" name = "submit"  value = "Delete"></input>
        </form>
        <footer>
                </br></br></br>
                <figure id="quote">
                <img width = "300" height = "150" alt="affective" src = "images/quote.png"/><br/>
        </footer>
    </body>
</html>
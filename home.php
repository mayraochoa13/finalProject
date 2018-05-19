<?php
    function displayInfo(){
        include 'dbConnection.php';
        $connect = connecToDB();
     
        $sql = "SELECT * FROM `ministry`";
        
        $statement = $connect->prepare($sql);
        $statement->execute();
    
        if($statement->rowCount()>0){
            echo "</br></br>";
            echo "<table width='550' height='210'>";
            echo "<tr>";
            echo " <td><strong>Ministry Name</strong></td>";
            echo " <td><strong>Team number</stron></td>";
            echo " <td><strong>Age Range Service</strong></td>";
            echo "</tr>";
             while($row = $statement ->fetch(PDO::FETCH_ASSOC)){
                echo"<tr>";
                echo "<td>".$row['role']."</td>";
                echo "<td>".$row['num_members']."</td>";
                echo "<td>".$row['age_range']."</td>";;
                echo"</tr>";
            }
            echo "</table>";
        } 
            if(isset($_POST['logout'])) {
                session_unset();
                session_destroy();
                header("Location: index.php");
            // echo "Thank you! click <a href='logIn.php'>here!</a> to continue.";
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
        <title>Community</title>
        
    </head>
    
    <body background="images/green2.jpg" >
         <div class='container'>
            <div class='text-center'>
                <nav class='navbar navbar-default - navbar-fixed-top'>
                    <div class='container-fluid'>
                        <div class='navbar-header'>
                            <a class='navbar-brand' href='#'> St Mary of the Nativity: <strong>where faith and service meet.</strong></a>
                        </div>
                        <ul class='nav navbar-nav'>
                        <li><a href='home.php'> Church Ministries</a></li>
                        <li><a href='team.php'>Active Members</a></li>
                        </ul>
                    </div>
                </nav>
            </div>
        </div>
         <form method="post" align="right">
            <br/><br/><br/>
            <font color = "#008080" size="2"><strong>To go out the system click on here!</strong></br></font>
            <input type="submit" layout = "right" name ="logout" value="Logout"/>
        </form>
        <font color = "#008080" size="5"><strong>Welcome Admin our ministry space.</strong></br></font>
        <font color = "#008080" size="3">Here you are able to view all the ministries for this church, the average of the volunteers and logout of the system. </font>
         <?=displayInfo()?> 
         
        </br><hr>
        <font color = "#008080" size="5"><strong>Volunteers Average.</strong></br></font>
        <font  size="3"> St Mary of Nativity is one of the only churches that offer to people </br> 
                                                    from all ages the oportunity to be part of different ministries. </font></br>
        <span id="report"></span>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
        <script type="text/javascript"  src="js/report.js"></script>
         <footer align="right">
                <figure ><img width = "300" height = "150" alt="affective"  src = "images/quote.png"/><br/></figure>
        </footer>
            
    </body>
</html>
<?php
    session_start();
    function display(){
        if(isset($_SESSION['username'])){
            header("Location: home.php");
        }
    else{
            header("Location: index.php");
        }
    }
    if(isset($_POST['login'])){
        header("Location: logIn.php");
    }

?>
<!DOCTYPE html>
<html>
    <head>
     
    </head>
    
    <body background="images/green2.jpg">
        <form method="post" align="right">
           <font color = "#008080" size="5">Administrator Login</font>
            <input type="submit" name="login"  value="Log-in"/>
        </form>
        <hr>
       <h1><font color = "#008080" size="12"><strong> Welcome to St. Mary of the Nativity Volunteer Page!</strong></font></h1>
       <font color = "#008080" size="5"> Please take a look of all the ministries that we have for you to volunteer. </strong></font>
        <div class="search-container">
        <form method="post">
            <input type="text" name="searchM" placeholder="Search Ministry">
            <select name="colum">
                <option value="">Select One</option>
                <option value="num_members">Number of volunteer</option>
                <option value="role">Ministry Name</option>
                <option value="age_range">Service Range Age</option>
                <option value="all">All</option>
            </select>
            <input type="submit" name="searchMin" value="Search"/>
            <?php
                    include 'dbConnection.php';
                    $input= $_POST['colum'];
                    $con = connecToDB();
                   
                if(isset($_POST['colum']) && empty($_POST['searchM'])){
                    $sql = "SELECT * FROM `ministry`;";
                    $statement = $con->prepare($sql);
                    $statement->execute();
                    //Check forms
                    if($input=="all"){
                        if($statement->rowCount()>0){
                            echo "</br>";
                            echo "<table width='550' height='150' style='background-color:#f0fff7;'>";
                            echo "<tr>";
                            echo " <td><strong>Ministry Name</strong></td>";
                            echo " <td><strong>Number of members</strong></td>";
                            echo " <td><strong>Age range to provide service</strong></td>";
                            echo "</tr>";
                             while($row = $statement ->fetch(PDO::FETCH_ASSOC)){
                                echo"<tr>";
                                echo "<td>".$row['role']."</td>";
                                echo "<td>".$row['num_members']."</td>";
                                echo "<td>".$row['age_range']."</td>";
                                echo"</tr>";
                            }
                            echo "</table>";
                        }
                    }
              
                    if($statement->rowCount()>0){
                      echo "</br></br>";
                        if($input=="role"){
                             echo "<strong> Name of different ministries</strong></br></br>";
                            while($row = $statement ->fetch(PDO::FETCH_ASSOC)){
                                echo $row['role']."</br>";
                            }
                        }
                        if($input=="num_members"){
                            echo "<strong> Number of members</strong></br></br>";
                             while($row = $statement ->fetch(PDO::FETCH_ASSOC)){
                                echo $row['num_members']."</br>";
                            }
                        }
                        if($input=="age_range"){
                             echo "<strong>Ages that each group can provide service.</strong></br></br>";
                              while($row = $statement ->fetch(PDO::FETCH_ASSOC)){
                                    echo $row['age_range']."</br>";
                                }
                            
                            }
                        }
                    }
                    if(empty($_POST['colum']) && isset($_POST['searchM'])){
                            $min = $_POST['searchM'];

                            $sql = "SELECT * FROM `ministry` WHERE role='$min';";
                            $statement = $con->prepare($sql);
                            $statement->execute();
                            if($statement->rowCount()>0){
                            echo "</br>";
                            echo "<table width='500' height='50' style='background-color:#f0fff7;'>";
                            echo "<tr>";
                            echo " <td><strong>Ministry Name</strong></td>";
                            echo " <td><strong>Number of members</strong></td>";
                            echo " <td><strong>Age range to provide service</strong></td>";
                            echo "</tr>";
                             while($row = $statement ->fetch(PDO::FETCH_ASSOC)){
                                echo"<tr>";
                                echo "<td>".$row['role']."</td>";
                                echo "<td>".$row['num_members']."</td>";
                                echo "<td>".$row['age_range']."</td>";
                                echo"</tr>";
                            }
                            echo "</table>";
                        }
                            
                    }
            ?>
        </form>
         <footer align="right">
             </br></br></br></br></br></br></br></br></br></br></br></br></br></br></br></br></br>
                <figure ><img width = "180" height = "150" alt="affective"  src = "images/serve.png"/><br/></figure>
        </footer>

    </body>
</html>
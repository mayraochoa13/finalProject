<?php
    session_start();
    if(isset($_POST['goBack'])){
        header("Location: index.php");
    }
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Login</title>
        <link href="style.css" rel="stylesheet" type="text/css" />
    </head>
    <body background="images/green2.jpg">
        <h1><font color = "#008080" size="12"><strong>Login</strong></br></font></h1>
        <p><font color = "#008080" size="4"><strong></strong>You can log in using username <strong>admin</strong>. The password is <strong>password</strong>.</font></p>
        
        <!--Form to enter credentials-->
        <form method="post" action="checkUser.php">
            <input type="text"name="username" placeholder="Username"/><br/>
            <input type="password"name="password" placeholder="Password"/><br/>
            <input type="submit" name="submit" value="Login"/>
         </form>
         </br><form method="post">
            <input type="submit" name="goBack" value="Back"/>
         </form>
         

    </body>
</html>
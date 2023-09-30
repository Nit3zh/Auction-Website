<?php
    $login = false;
    $showError = false;
    if($_SERVER["REQUEST_METHOD"]=="POST"){
        require_once './includes/config.php';
        $aemail = $_POST["aemail"];
        $apword = $_POST["apword"];

        $sql = "SELECT * FROM admin WHERE aemail='$aemail' AND apword='$apword'";
        $result = $conn->query($sql);
        if($result->num_rows==1){
            $login = true;
            session_start();
            $_SESSION['loggedin'] = true;
            $_SESSION['aemail'] = $aemail;
            header("location: aindex.php");
        }
        else{
            $showError = "Password Didn't Match!!!";
        }
        
    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <?php 
        require './partials.navbarcss.php';
    ?>
    <link rel="stylesheet" href="./css/style.css">
</head>
<body>
    <?php
        require './partials.navbar.php';
    ?>
    <?php
        if(isset($_POST['submit'])){
            if($login==true){
                echo "You Are Logged in Successfuly";
            }
            else{
                echo "Incorrect Password";
            }
        }
        
    ?>
    <main>
        <form action="/coin_auction/adminlogin.php" method="post">
            <table>
                <h3 class="tablehead">Admin Login</h3>
                <br>
                <tr>
                    <td><label for="aemail">Email:</label></td>
                    <td><input type="email" name="aemail"></td>
                </tr>
                <tr>
                    <td><label for="apword">Password:</label></td>
                    <td><input type="password" name="apword"></td>
                </tr>
                <tr>
                    <td colspan="2" class="subtn">
                        <button type="submit" name="submit">Login</button>
                    </td>
                </tr>
            </table>
        </form>
    </main>
    <?php
        require './partials.navbarjs.php';
    ?>
</body>
</html>
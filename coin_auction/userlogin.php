<?php
    $login = false;
    $showError = false;
    if($_SERVER["REQUEST_METHOD"]=="POST"){
        require_once './includes/config.php';
        $uemail = $_POST["uemail"];
        $upword = $_POST["upword"];

        $sql = "SELECT * FROM user WHERE uemail='$uemail' AND upword='$upword'";
        $result = $conn->query($sql);
        if($result->num_rows==1){
            $login = true;
            session_start();
            $rec = $result->fetch_assoc();
            $_SESSION['uid'] = $rec['uid'];
            $_SESSION['ufname'] = $rec['ufname'];
            $_SESSION['ulname'] = $rec['ulname'];
            $_SESSION['uemail'] = $rec['uemail'];
            $_SESSION['uphone'] = $rec['uphone'];
            $_SESSION['loggedin'] = true;
            $_SESSION['uemail'] = $uemail;
            header("location: uindex.php");
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
        <form action="/coin_auction/userlogin.php" method="post">
            <table>
                <h3 class="tablehead">User Login</h3>
                <br>
                <tr>
                    <td><label for="uemail">Email:</label></td>
                    <td><input type="email" name="uemail"></td>
                </tr>
                <tr>
                    <td><label for="upword">Password:</label></td>
                    <td><input type="password" name="upword"></td>
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
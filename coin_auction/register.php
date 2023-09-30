<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <?php 
        require './partials.navbarcss.php';
    ?>
    <link rel="stylesheet" href="./css/register.css">
</head>
<body>
    <?php
        require './partials.navbar.php';
    ?>
    <main>
        <form action="confirmreg.php" method="post" enctype="multipart/form-data">
            <table>
                <h3 class="tablehead">Register</h3>
                <br>
                <tr>
                    <td><label for="ufname">First Name:</label></td>
                    <td><input type="text" name="ufname" required></td>
                </tr>
                <tr>
                    <td><label for="ulname">Last Name:</label></td>
                    <td><input type="text" name="ulname" required></td>
                </tr>
                <tr>
                    <td><label for="uemail">Email:</label></td>
                    <td><input type="text" name="uemail" required></td>
                </tr>
                <tr>
                    <td><label for="uphone">Phone No:</label></td>
                    <td><input type="tel" name="uphone" required></td>
                </tr>
                <tr>
                    <td><label for="upword">Password:</label></td>
                    <td><input type="password" name="upword" required></td>
                </tr>
                <tr>
                    <td colspan="2" class="subtn">
                        <button type="submit" name="submit" id="myBtn">Submit</button>
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
<?php
    require './includes/config.php';

    if(isset($_POST['submit'])){
        $ufname = $_POST['ufname'];
        $ulname = $_POST['ulname'];
        $uemail = $_POST['uemail'];
        $uphone = $_POST['uphone'];
        $upword = $_POST['upword'];
        
        $isql = "INSERT INTO `user` (`cid`, `ufname`, `ulname`, `uemail`, `uphone`, `upword`, `created`, `modified`) VALUES (NULL, '$ufname', '$ulname', '$uemail', '$uphone', '$upword', current_timestamp(), NULL)";

        // send query to the database to add values and confirm if successful    
        if($conn->query($isql)===TRUE){
            echo "Upload successful";
        }
        else{
            echo "Error: ".$sql ."<br>" . $conn->error;
        } 

        $conn->close();
    }
?>
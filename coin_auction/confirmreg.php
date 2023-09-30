<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <?php 
        require './partials.navbarcss.php';
    ?>
    <style>
        h1{
            width: 80%;
            margin: 0 auto;
            text-align: center;
        }
    </style>
</head>
<body>
    <?php
        require './partials.navbar.php';
    ?>
    <?php
        require './includes/config.php';

        if(isset($_POST['submit'])){
            $ufname = $_POST['ufname'];
            $ulname = $_POST['ulname'];
            $uemail = $_POST['uemail'];
            $uphone = $_POST['uphone'];
            $upword = $_POST['upword'];

            $isql = "INSERT INTO user (`uid`, `ufname`, `ulname`, `uemail`, `uphone`, `upword`, `created`, `modified`) VALUES (NULL, '$ufname', '$ulname', '$uemail', '$uphone', '$upword', current_timestamp(), NULL)";

            // send query to the database to add values and confirm if successful    
            if($conn->query($isql)===TRUE){?>
                <h1>Sign Up Successful</h1>
                <h1>You May Login Now</h1>
            <?php }
            else{
                echo "Error: ".$sql ."<br>" . $conn->error;
            } 

            $conn->close();
    }
    ?>
    <?php
        require './partials.navbarjs.php';
    ?>
</body>
</html>
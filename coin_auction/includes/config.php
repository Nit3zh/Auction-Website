<?php
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "coin_auction";

    // Creating Connection
    $conn = new mysqli($servername,$username,$password,$dbname);

    // Check Connection
    if($conn->connect_error)
    {
        die("Connection Failed:".$conn->connect_error);
    }

    // echo "Connected Successfully!!!";
?>

<?php
    require_once './includes/config.php';
    session_start();

    if(!isset($_SESSION['loggedin']) || $_SESSION['loggedin']!=true){
        header("location: adminlogin.php");
        exit;
    }
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bhartiya Mudra| Home</title>
    <?php 
        require './partials.navbarcss.php';
    ?>
    
</head>

<body>
    <?php
        require './partials.anavbar.php';
    ?>

    <!-- The Main Sections Starts Here -->
    <main>
        <h1>Welcome</h1>
        <h1>This is The HomePage</h1>
        <h1>The Auction Feed Feature Will Be Released Soon</h1>
        <h1>Please Be Patient</h1>
        <h1>Coming Soon</h1>
        <h1>Coming Soon</h1>
        <h1>Coming Soon</h1>
    </main>
    <!-- The Main Sections Ends Here -->
    <?php
        require './partials.navbarjs.php';
    ?>
    
</body>

</html>
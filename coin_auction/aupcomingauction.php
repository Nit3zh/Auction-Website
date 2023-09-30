<?php
    require_once './includes/config.php';
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
    <link rel="stylesheet" href="./css/upcomingauction.css">
</head>
<body>
    <?php
        require './partials.anavbar.php';
    ?>
    <main>
        <h1>Upcoming Auctions</h1>
        <div class="upauction">
        <?php
            $ssql = "SELECT * FROM `scheduledauction`";
            $result = $conn->query($ssql);

            if($result->num_rows>0){
                while ($rec = $result->fetch_assoc()){
                    echo "<div class=`log` style=\"border:1px solid black; margin:10px;\">
                            <div class=`crec` style=\"text-align:left; width:60%; display:inline-block\">
                                <h4 class=`cname`>Coin Name: ".$rec["cname"]."</h4>
                                <h5 class=`cage`>Coin Age: ".$rec["cage"]." Years</h5>
                                <h5 class=`adate`>Auction Date: ".$rec["date"]."</h5>
                                <h5 class=`atime`>Auction Time: ".$rec["time"]."</h5>
                            </div>
                            <div class=`cprice` style=\"width:20%; display:inline-block;\">
                                <h4>Starting From Price: ".$rec["ciprice"]."Rs</h4>
                            </div>
                            <div class=`cdetails` style=\"margin:0 auto;width:80%;\">
                                <p style=\"text-align:justify;\">".$rec["cdetails"]."</p>
                            </div>
                          </div>";
                }
            }
            $conn->close();
            ?>
        </div>
    </main>
    <?php
        require './partials.navbarjs.php';
    ?>
</body>
</html>
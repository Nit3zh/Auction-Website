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
    <link rel="stylesheet" href="./css/managecoins.css">
</head>
<body>
    <?php
        require './partials.anavbar.php';
    ?>
    <main>
        <h1>Manage Coins</h1>
        <div class="opmenu">
            <div class="add"><a href="./addcoins.php">Add Coins</a></div>
            <div class="edt"><a href="./edtcoins.php">Edit Coins</a></div>
            <div class="dlt"><a href="./dltcoins.php">Delete Coins</a></div>
        </div>
        <div class="coinlog">

        <?php
        $ssql = "SELECT * FROM `coin`";
        $result = $conn->query($ssql);

        if($result->num_rows>0){
            while ($rec = $result->fetch_assoc()){
                echo "<div class=`rec` style=\"border:2px solid black; margin:10px;\">
                        <div class=`crec` style=\"text-align:left; width:80%;margin:0 auto;display:inline-block\">
                            <h4 class=`cname`>".$rec["cname"]."</h4>
                            <div class=`crec-btm`>
                                <div class=`cage`>
                                    <h6>Age: ".$rec["cage"]." Years</h6>
                                </div>
                                <div class=`cquan`>
                                    <h6>Quantity: ".$rec["cquantity"]."</h6>
                                </div>
                            </div>
                        </div>
                        <div class=`cprice` style=\"width:18%; display:inline-block;\">
                            <p>Price: ".$rec["ciprice"]."</p>
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
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
    <link rel="stylesheet" href="./css/coinlog.css">
</head>
<body>
    <?php
        require './partials.anavbar.php';
    ?>
    <main>
        <h1>Coin Log</h1>
        <div class="coinlog">
        <?php
        $ssql = "SELECT * FROM `coinlog`";
        $result = $conn->query($ssql);

        if($result->num_rows>0){
            while ($rec = $result->fetch_assoc()){
                echo "<div class=`log` style=\"border:1px solid black; margin:10px;\">
                        <div class=`crec` style=\"text-align:left; width:60%; display:inline-block\">
                            <h4 class=`uname` style=\"text-align:left\">".$rec["ufname"]." ".$rec['ulname']."</h4>
                            <h4 class=`cname`>".$rec["cname"]."</h4>
                            <h5 class=`odate`>".$rec["odate"]."</h5>
                            <div class=`daddr`>
                                <p>".$rec["daddr"]."</p>
                            </div>
                            <p class=`odate`>".$rec["odate"]."</p>
                        </div>
                        <div class=`cprice` style=\"width:20%; display:inline-block;\">
                            <h4>Price: ".$rec["cbprice"]."</h4>
                        </div>
                      </div>";
            }
        }
        $conn->close();
        ?>
            <!-- <div class="log">
                <div class="crec">
                    <h1 class="uname">Lorem ipsum</h1>
                    <h2 class="cname">Lorem ipsum dolor sit.</h2>
                    <h3 class="odate">21/12/2000</h3>
                    <div class="daddr">
                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Odit doloribus esse eum quaerat saepe nam dignissimos magni. Hic nostrum illum totam quis rem deleniti ex unde laborum nobis tempore? Possimus.</p>
                    </div>
                    <h3 class="phone">8520456753</h3>
                </div>
                <div class="cprice">
                    <p>Price: 500000000</p>
                </div>
            </div> -->
        </div>
    </main>
    <?php
        require './partials.navbarjs.php';
    ?>
</body>
</html>
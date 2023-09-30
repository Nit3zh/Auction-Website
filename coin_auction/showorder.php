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
    <link rel="stylesheet" href="./css/showorder.css">
</head>
<body>


    <?php
        require './partials.anavbar.php';
        if(isset($_GET['delivered'])){
            $orderId = $_GET['orderId'];
            echo $orderId;
            $isql = "INSERT INTO coinlog (cname, ufname, ulname, daddr,odate,cbprice) SELECT cname, ufname, ulname, daddr,odate,cbprice FROM uorder WHERE oid=$orderId";
            if ($conn->query($isql) === true) {
                echo "Record inserted successfully into 'coinlog' table.";
            } else {
                // echo "Error inserting record: " . $conn->error;
            }
            $dsql = "DELETE FROM uorder WHERE oid=$orderId";
            if ($conn->query($dsql) === true) {
                echo "Record Deleted successfully from 'uorder' table.";
            } else {
                // echo "Error Deleting record: " . $conn->error;
            }
        }
    ?>
    <main>
        <h1>Orders</h1>
        <div class="orders">
        <?php
        $ssql = "SELECT * FROM `uorder`";
        $result = $conn->query($ssql);

        if($result->num_rows>0){
            while ($rec = $result->fetch_assoc()){
                // $Oid = $rec['oid'];
                echo '<div class=`log` style="border:1px solid black; margin:10px;">
                        Order ID:  '. $rec["oid"] .'<br>
                            <div class=`crec` style="text-align:left; width:60%; display:inline-block">
                                <h4 class=`uname`>'.$rec["ufname"].' '.$rec["ulname"].'</h4>
                                <h4 class=`cname`>'.$rec["cname"].'.</h4>
                                <h5 class=`odate`>'.$rec["odate"].'</h5>
                                <div class=`daddr`>
                                    <p>'.$rec["daddr"].'</p>
                                </div>
                                <h4 class=`phone`>'.$rec["uphone"].'</h4>
                            </div>
                            <div class=`cprice` style="width:20%; display:inline-block;">
                                <h4 >Price: '.$rec["cbprice"].'</h4>
                                <form method="get" action="">
                                    <input type=`number` name="orderId" value="'.$rec['oid'].'" style="display:none;">
                                    <input type="submit" name="delivered" value="Delivered">
                                </form>
                                
                            </div>
                     </div>';
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
<?php
    require './includes/config.php';
    session_start();

    if(!isset($_SESSION['loggedin']) || $_SESSION['loggedin']!=true){
        header("location: userlogin.php");
        exit;
    }

    if(!isset($_SESSION['acid'])){
        header("location: upcomingauction.php");
        exit;
    }

    $cbid = isset($_COOKIE['nbid']) ? $_COOKIE['nbid'] : $cbid;
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
    <style>
        *{
            text-align: justify;
        }

        #main {
            /* width: 80%; */
            background-color: #d1dbde;
            margin-top: 20vh;
            left: 10px;
        }

        #main .maintop, #main .mainbtm{
            display: block;
            width: 90%;
            margin: 0 auto;
        }

        .cimg,.cspec,.bidbtn{
            display: inline-block;
        }

        .cimg{
            width: 25%;
            margin-top: -20px;
        }

        .cimg img{
            width: 100%;
            padding: 10px;
            display: block;
            margin-left: auto;
            margin-right: auto;
            margin-top: 20px;
        }

        .cspec{
            width: 54%;
            padding: 10px 0;
        }

        .bidbtn{
            width: 15%;
            margin-top: 125px;
            position: absolute;
        }

        .bidbtn button{
            font-size: xx-large;
            padding: 20px;
            border-radius: 50%;
        }
    </style>
</head>

<body>
    <?php
        $acid = $_SESSION['acid'];
        $ssql = "SELECT * FROM scheduledauction WHERE acid=$acid";
        $result = $conn->query($ssql);
        $rec = $result->fetch_assoc();

        $cname = $rec['cname'];
        $cage = $rec['cage'];
        $ciprice = $rec['ciprice'];
        $cdetails = $rec['cdetails'];
        $time = $rec['time'];
        $date = $rec['date'];

        $ibid = 10*$ciprice/100;
        $cbid = $ciprice;
    ?>
    <main id="main">
        <div class="maintop">
            <div class="cimg">
                <img src="./images/samplecoin.jpeg" alt="coin-image">
            </div>
            <div class="cspec">
                <h3>Coin Name: <?php echo $cname ?></h3>
                <h3>Coin Age: <?php echo $cage ?></h3>
                <h3>Starting Price: <?php echo $ciprice ?></h3>
                <h3>Bid Increment Price: <?php echo $ibid ?></h3>
            </div>
            <div class="bidbtn">
                <h4 align:"justify">Current Highest Bid:</h4>
                <h4 id="cbid"><?php echo $cbid ?></h4>
                <button name="bid" id="bid" onclick="bid()">BID</button>
            </div>
        </div>
        <div class="mainbtm">
            <div class="cdetails">
                <p style="font-size: 1.2em;"><?php echo $cdetails ?></p>
            </div>
        </div>
    </main>
    <script type="text/javascript">
        var cbid = <?php echo $cbid; ?>;
        var ibid = <?php echo $ibid; ?>;
        function bid(cbid,ibid){
            cbid = cbid + ibid;
            const nbid = document.getElementById('cbid');
            nbid.innerHTML = cbid;
        }
    </script>
    <?php
    require './partials.navbarjs.php';
    ?>
</body>

</html>
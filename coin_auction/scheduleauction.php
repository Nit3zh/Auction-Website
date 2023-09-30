<?php
    require_once './includes/config.php';
    
    // if(isset($_POST['submit'])){
    //     $cname = $_POST['cname'];
    //     $date = $_POST['date'];
    //     $time = $_POST['time'];

    //     $ssql = "SELECT * FROM coin WHERE cname = '$cname'";
    //     $result = $conn->query($ssql); 
    //     echo $result;       

    //     // $isql = "INSERT INTO `scheduledauction` (`acid`, `cname`, `cage`, `ciprice`, `cdetails`, `time`,`date`, `created`, `modified`) VALUES (NULL, '$cname', '$ulname', '$uemail', '$uphone', '$upword', current_timestamp(), NULL)";
    // }
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
        require './partials.anavbar.php';
    ?>
    <main>
        <form action="./scheduleauction.php" method="post">
            <table>
                <h3 class="tablehead">Schedule Coin Auction</h3>
                <br>
                <tr>
                    <td><label for="cname">Coin Name:</label></td>
                    <td>
                        <select name="cname" id="cname" style="width:100%;">
                            <option value="">--Select Coin--</option>
                            <?php
                                $ssql = "SELECT `cname` FROM `coin`";
                                $result = $conn->query($ssql);
                
                                if($result->num_rows>0){
                                    while ($rec = $result->fetch_assoc()){
                                        echo '
                                            <option value="'.$rec["cname"].'">'.$rec["cname"].'</option>
                                        ';
                                    }
                                }
                            ?>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td><label for="date">Date:</label></td>
                    <td><input type="date" name="date"></td>
                </tr>
                <tr>
                    <td><label for="time">Time:</label></td>
                    <td><input type="time" name="time"></td>
                </tr>
                <tr>
                    <td colspan="2" class="subtn">
                        <button type="submit" name="submit">Submit</button>
                    </td>
                </tr>
            </table>
        </form>
    </main>
    <?php
    if(isset($_POST['submit'])){
        $cname = $_POST['cname'];
        $date = $_POST['date'];
        $time = $_POST['time'];

        // echo $cname,"<br>";
        // echo $date,"<br>";
        // echo $time,"<br>";
        
        $ssql = "SELECT * FROM coin WHERE cname = '$cname'";

        $result = $conn->query($ssql); 
        if($result->num_rows>0){
            $rec = $result->fetch_assoc();
            $cage = $rec['cage'];
            $ciprice = $rec['ciprice'];
            $cdetails = $rec['cdetails'];
        }      

        $isql = "INSERT INTO `scheduledauction` (`acid`, `cname`, `cage`, `ciprice`, `cdetails`, `time`,`date`) VALUES (NULL, '$cname', '$cage', '$ciprice', '$cdetails', '$time', '$date')";

        if($conn->query($isql)){
            echo "Data Inserted Successfully";
        }
        else{
            echo "Data Failed To Insert",$conn->error;
        }
    }
    ?>
    <?php
        require './partials.navbarjs.php';
        $conn->close();
    ?>
</body>
</html>
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
        <form action="./dltcoins.php" method="post">
            <table>
                <h3 class="tablehead">Delete Coins</h3>
                <br>
                <tr>
                    <td><label for="cname">Name:</label></td>
                    <td><input type="text" name="cname"></td>
                </tr>
                <tr>
                    <td><label for="cquan">Quantity:</label></td>
                    <td><input type="number" name="cquan"></td>
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
    require './partials.navbarjs.php';
    ?>
</body>

</html>
<?php
require './includes/config.php';

if (isset($_POST['submit'])) {
    $cname = $_POST['cname'];
    $cquan = $_POST['cquan'];

    $ssql = "SELECT `cquantity` FROM `coin` WHERE cname='$cname'";
    $result = $conn->query($ssql);
    
    // Check if there are any results
    if ($result->num_rows > 0) {
        // Fetch data and store it in a variable
        $data = $result->fetch_assoc();
    
        // Access individual fields by column name
        $tcquan = $data['cquantity'];
    
        // Display the fetched data
        echo "Field: ".$tcquan;
    } else {
        echo "No results found.";
    }

    if ($cquan < $tcquan){
        $tcquan = $tcquan - $cquan;
        echo $tcquan;
        $usql = "UPDATE coin SET cquantity = '$tcquan' WHERE cname = '$cname'";
        if($conn->query($usql)===TRUE){
            echo "Update Successful";
        }
        else{
            echo "Error: ".$usql ."<br>" . $conn->error;
        }
    }
    elseif($cquan == $tcquan){
        $dsql = "DELETE FROM coin WHERE cname = '$cname'";
        if($conn->query($dsql)===TRUE){
            echo "Delete Successful";
        }
        else{
            echo "Error: ".$dsql ."<br>" . $conn->error;
        }
    }
    else{
        echo "You Have Entered More Quantity Than Stored in Our Inventory.";
    }
    $conn->close();
}
?>
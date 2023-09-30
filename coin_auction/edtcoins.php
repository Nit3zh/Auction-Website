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
        <form action="./edtcoins.php" method="post">
            <table>
                <h3 class="tablehead">Edit Coin Details</h3>
                <br>
                <tr>
                    <td><label for="cname">Name:</label></td>
                    <td><input type="text" name="cname"></td>
                </tr>
                <tr>
                    <td><label for="cage">Age:</label></td>
                    <td><input type="number" name="cage"></td>
                </tr>
                <tr>
                    <td><label for="cquan">Quantity:</label></td>
                    <td><input type="number" name="cquan"></td>
                </tr>
                <tr>
                    <td><label for="cprice">Price:</label></td>
                    <td><input type="number" name="cprice"></td>
                </tr>
                <tr>
                    <td><label for="cdetails">Description:</label></td>
                    <td><textarea name="cdetails" id="" cols="55" rows="10"></textarea></td>
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
    $cage = $_POST['cage'];
    $ciprice = $_POST['cprice'];
    $cquan = $_POST['cquan'];
    $cdetails = $_POST['cdetails'];

    // Update record
    $usql = "UPDATE coin SET cage = '$cage', ciprice = '$ciprice',cquantity = '$cquan', cdetails = '$cdetails' WHERE cname = '$cname'";

    if ($conn->query($usql) === TRUE) {
        echo "Record updated successfully.";
    } else {
        echo "Error updating record: " . $conn->error;
    }

    $conn->close();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <?php 
        require './partials.navbarcss.php';?>
    <link rel="stylesheet" href="./css/style.css">
</head>
<body>
    <?php
        require './partials.anavbar.php';
    ?>
    <main>
        <form action="./addcoins.php" method="post" enctype="multipart/form-data">
            <table>
                <h3 class="tablehead">Add Coins</h3>
                <br>
                <tr>
                    <td><label for="cname">Name:</label></td>
                    <td><input type="text" name="cname" required></td>
                </tr>
                <tr>
                    <td><label for="cage">Age:</label></td>
                    <td><input type="number" name="cage" required></td>
                </tr>
                <tr>
                    <td><label for="cquan">Quantity:</label></td>
                    <td><input type="number" name="cquan" required></td>
                </tr>
                <tr>
                    <td><label for="cprice">Price:</label></td>
                    <td><input type="number" name="cprice" required></td>
                </tr>
                <tr>
                    <td><label for="cdetails">Description:</label></td>
                    <td><textarea name="cdetails" id="" cols="55" rows="10" required></textarea></td>
                </tr>
                <tr>
                    <td><label for="cimage">Image:</label></td>
                    <td><input type="file" name="cimage" required></td>
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
        // require './partials.footer.php';
        require './partials.navbarjs.php';
    
        require './includes/config.php';

        if(isset($_POST['submit'])){
            $cname = $_POST['cname'];
            $cage = $_POST['cage'];
            $ciprice = $_POST['cprice'];
            $cquan = $_POST['cquan'];
            $cdetails = $_POST['cdetails'];
        
            $src = $_FILES['cimage']['tmp_name'];
            $dest = 'images/'.$_FILES['cimage']['name'];
            $cimage = '';

            if(move_uploaded_file($src, $dest))
            {
                $cimage = $_FILES['cimage']['name'];
            }
        

            $isql = "INSERT INTO `coin` (`cid`, `cname`, `cage`, `cdetails`, `ciprice`, `cimage`, `cquantity`, `created`, `modified`) VALUES (NULL, '$cname', '$cage', '$cdetails', '$ciprice', '$cimage','$cquan', current_timestamp(), NULL)";

            // send query to the database to add values and confirm if successful    
            if($conn->query($isql)===TRUE){
                echo "Upload successful";
            }
            else{
                echo "Error: ".$sql ."<br>" . $conn->error;
            } 

            $conn->close();
        }
    ?>
</body>
</html>

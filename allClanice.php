<?php
session_start();
include_once ("db.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $oib = test_input($_POST['oib']);
    $ime = utf8_encode(test_input($_POST['ime']));
    $prezime = utf8_encode(test_input($_POST['prezime']));
    $datumR = test_input($_POST['datum_rodjenja']);
    $opis = utf8_encode(test_input($_POST['opis']));
    $mobitel = test_input($_POST['mobitel']);
    $kucni = test_input($_POST['kucni']);
    $email = test_input($_POST['email']);

    $sql = "INSERT INTO ck.pacijent VALUES (NULL,'".$oib."', '".$ime."', '".$prezime."','".$datumR."','".$opis."','".$mobitel."','".$kucni."','".$email."')";

    if ($conn->query($sql) === TRUE) {
        echo "New record created successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Članice</title>
    <?php include_once ("head.php");?>
</head>
<body>
<?php include_once ("header.php");

$sql = "SELECT * FROM ck.pacijent ORDER BY prezime";
$result = $conn->query($sql);
$brClanice = 1;
?>
<div class="w3-container w3-padding w3-center" style="width: 40%; margin:auto">
    <div class="w3-bar">
        <button class="w3-pink w3-button w3-bar-item w3-opacity-min w3-left" id="myButton"><i
                    class="fas fa-plus fa-2x"></i></button>
        <div class="search-container w3-bar-item w3-right w3-large">
            <form method="post" action="prezime.php">
                <input type="text" placeholder="Pretraži po prezimenu" name="search">
                <button type="submit"><i class="fas fa-search"></i></button>
            </form>
        </div>
    </div>
</div>
<div class="w3-container w3-padding">
<table class="w3-table w3-centered w3-striped w3-bordered" style="width: 70%; margin:auto; font-size: 18px;">
    <thead class="w3-pink w3-opacity-min">
    <th>Redni br.</th>
    <th>Prezime</th>
    <th>Ime</th>
    <th>Datum rođenja</th>
    <th></th>
    <th></th>
    <th></th>
    </thead>
    <tbody>
    <?php while($row = mysqli_fetch_array($result)){
        $datumR = $row['datum_rodjenja'];
        $datumR = explode("-", $datumR);
        ?>
    <tr>
        <td><?php echo $brClanice ?>.</td>
        <td><?php echo utf8_decode($row['prezime'])?></td>
        <td><?php echo $row['ime'] ?></td>
        <td><?php echo $datumR[2] . "." . $datumR[1] . "." . $datumR[0] . "." ?></td>
        <td>
            <form method="GET" action="updateClanice.php">
                <input type="hidden" value="<?php echo $row['oib'] ?>" name="oib">
                <button type="submit" name="submit"><i class='fas fa-edit'></i></button>
            </form>
        </td>
        <td>
            <form method="GET" action="deleteClanice.php">
                <input type="hidden" value="<?php echo $row['oib'] ?>" name="oib">
                <button type="submit" name="submit"><i class='fas fa-trash'></i></button>
            </form>
        </td>
        <td>
            <form method="GET" action="viewClanice.php">
                <input type="hidden" value="<?php echo $row['oib'] ?>" name="oib">
                <button type="submit" name="submit"><i class='fas fa-eye'></i></button>
            </form>
        </td>
    </tr>
        <?php
        $brClanice += 1;
    }
    ?>
    </tbody>
</table>
</div>
<?php
include_once ("footer.php");
?>
<script type="text/javascript">
    document.getElementById("myButton").onclick = function () {
        location.href = "addClanice.php";
    };
</script>
</body>
</html>
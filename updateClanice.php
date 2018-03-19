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

    $sql = "UPDATE ck.pacijent SET oib='$oib',ime='$ime',prezime='$prezime',datum_rodjenja='$datumR',opis='$opis',telefon='$mobitel',kucni='$kucni',email='$email' WHERE oib='$oib'";
    $result = $conn->query($sql);
    var_dump($sql);
    if ($conn->query($sql) == false) {
        echo 'Error:' . mysqli_error($conn);
    } else {
        header("Location: allClanice.php");
    }
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Izmjena</title>
    <?php include_once ("head.php");?>
</head>
<body>
<?php include_once ("header.php");
$oib = $_GET['oib'];

$sql = "SELECT * FROM ck.pacijent WHERE oib='$oib'";
$result = $conn->query($sql);

while ($row = mysqli_fetch_array($result)){
?>
<div class="w3-container w3-center" style="width: 50%; margin: auto;">
    <form method="POST" action="updateClanice.php" >
        <div class="w3-section">
            <input class="w3-input w3-center" type="text" name="prezime" value="<?php echo utf8_decode($row['prezime']) ?>" required>
            <label>Prezime</label>
        </div>
        <div class="w3-section">
            <input class="w3-input w3-center" type="text" name="ime" value="<?php echo $row['ime'] ?>" required>
            <label>Ime</label>
        </div>
        <div class="w3-section">
            <input class="w3-input w3-center" type="text" name="oib" value="<?php echo $row['oib'] ?>" required>
            <label>OIB</label>
        </div>
        <div class="w3-section">
            <input class="w3-input w3-center" type="date" name="datum_rodjenja" value="<?php echo $row['datum_rodjenja'] ?>" required>
            <label>Datum rođenja</label>
        </div>
        <div class="w3-section">
            <input class="w3-input w3-center" type="text" name="opis" value="<?php echo utf8_decode($row['opis']) ?>">
            <label>Opis</label>
        </div>
        <div class="w3-section">
            <input class="w3-input w3-center" type="text" name="mobitel" value="<?php echo $row['telefon'] ?>">
            <label>Mobilni telefon</label>
        </div>
        <div class="w3-section">
            <input class="w3-input w3-center" type="text" name="kucni" value="<?php echo $row['kucni'] ?>">
        </div>
        <div class="w3-section">
            <input class="w3-input w3-center" type="text" name="email" value="<?php echo $row['email'] ?>">
            <label>E-mail</label>
        </div>
        <div class="w3-padding w3-center">
            <button class="w3-button w3-white w3-xlarge w3-round-large w3-hover-pink" type="submit" name="submit"><i class="fas fa-check fa-5x" style="font-size:50px"></i></button>
        </div>
    </form>
    <?php
    }
    ?>
</div>
<?php
include_once ("footer.php");
?>
</body>
</html>
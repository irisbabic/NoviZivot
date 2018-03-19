<?php session_start();
include_once("db.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id_eventa = $_POST['id_eventa'];
    $datumE = test_input($_POST['datum_eventa']);
    $opis = utf8_encode(test_input($_POST['opis']));

    $sql = "UPDATE ck.events SET opis='$opis',datum_eventa='$datumE' WHERE id_eventa='$id_eventa'";
    $result = $conn->query($sql);

    if ($conn->query($sql) == false) {
        echo 'Error:' . mysqli_error($conn);
    } else {
        header("Location: allEvents.php");
    }
}

?>
<!DOCTYPE html>
<html>
<head>
    <title>Izmjena</title>
    <?php include_once("head.php"); ?>
</head>
<body>
<?php include_once("header.php");
$id_eventa = $_GET['id_eventa'];
$sql = "SELECT * FROM ck.events WHERE id_eventa='$id_eventa'";
$result = $conn->query($sql);

if ($conn->query($sql) != TRUE) {
    echo "Error: " . $sql . "<br>" . $conn->error;
}
?>
<div class="w3-container w3-center" style="width: 50%; margin: auto;">
    <form method="POST" action="updateEvents.php">
        <?php
        while ($row = mysqli_fetch_array($result)){
        ?>
        <div class="w3-section">
            <input class="w3-input w3-center" type="date" name="datum_eventa" required
                   value="<?php echo $row['datum_eventa'] ?>">
            <label>Datum događaja</label>
        </div>
        <div class="w3-section">
            <textarea name="opis" placeholder="Unesite opis događaja" rows="7" style="width: 100%"><?php echo utf8_decode($row['opis']) ?></textarea>
            <label>Opis događaja</label>
        </div>
        <input type="hidden" name="id_eventa" value="<?php echo $id_eventa ?>">
        <div class="w3-padding w3-center">
            <button class="w3-button w3-white w3-xlarge w3-round-large w3-hover-pink" type="submit" name="submit"><i class="fas fa-check fa-5x" style="font-size:50px"></i></button>
        </div>
        <?php } ?>
    </form>
</div>
<?php
include_once("footer.php");
mysqli_free_result($result);
$conn->close();
?>
</body>
</html>


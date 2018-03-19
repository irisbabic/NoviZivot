<?php session_start();
include_once("db.php");
$sql = "SELECT prezime, ime FROM ck.pacijent ORDER BY prezime";
$result = $conn->query($sql);

if ($conn->query($sql) != TRUE) {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

?>
<!DOCTYPE html>
<html>
<head>
    <title>Dodavanje</title>
    <?php include_once("head.php"); ?>
</head>
<body>
<?php include_once("header.php"); ?>
<div class="w3-container w3-center" style="width: 50%; margin: auto;">
    <form method="POST" action="allRadionice.php" enctype="multipart/form-data">
        <div class="w3-section">
            <input class="w3-input w3-center" type="date" name="datum_radionice" required
                   placeholder="Unesite datum radionice">
            <label>Datum radionice</label>
        </div>
        <div class="w3-section">
            <textarea name="opis" placeholder="Unesite opis radionice" rows="7" style="width: 100%"></textarea>
            <label>Opis</label>
        </div>
        <div class="w3-section w3-center">
            Označite prisutne: <br>
            <ul style="list-style-type: none;">
                <?php
                while ($row = mysqli_fetch_array($result)){
                ?>
                <li><input class="w3-check" type="checkbox" name="prisutni[]"
                           value="<?php echo $row['prezime'] . ' ' . $row['ime']; ?>">
                    <label><?php echo utf8_decode($row['prezime']) . ' ' . $row['ime']; ?></label></li>

        <?php
        }
        ?>
        </ul>
        </div>
        <div class="w3-padding w3-center">
            <button class="w3-button w3-white w3-xlarge w3-round-large w3-hover-pink" type="submit" name="submit"><i class="fas fa-check fa-5x" style="font-size:50px"></i></button>
        </div>
    </form>
</div>
<?php
include_once("footer.php");
mysqli_free_result($result);
$conn->close();
?>
</body>
</html>


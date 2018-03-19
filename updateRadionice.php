<?php session_start();
include_once("db.php");
$sql = "SELECT prezime, ime FROM ck.pacijent ORDER BY prezime";
$result = $conn->query($sql);

if ($conn->query($sql) != TRUE) {
    echo "Error: " . $sql . "<br>" . $conn->error;
}


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id_sastanka = $_POST['id_sastanka'];
    $datumR = test_input($_POST['datum_radionice']);
    $opis = utf8_encode(test_input($_POST['opis']));
    $prisutni = implode(",",$_POST['prisutni']);

    $sql3 = "UPDATE ck.sastanak SET opis='$opis',datum_sastanka='$datumR',evidencija='$prisutni' WHERE id_sastanka='$id_sastanka'";
    $result3 = $conn->query($sql3);

    if ($conn->query($sql3) == false) {
        echo 'Error:' . mysqli_error($conn);
    } else {
        header("Location: allRadionice.php");
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
$id_sastanka = $_GET['id_sastanka'];
$sql2 = "SELECT * FROM ck.sastanak WHERE id_sastanka='$id_sastanka'";
$result2 = $conn->query($sql2);

if ($conn->query($sql2) != TRUE) {
    echo "Error: " . $sql2 . "<br>" . $conn->error;
}
?>
<div class="w3-container w3-center" style="width: 50%; margin: auto;">
    <form method="POST" action="updateRadionice.php" enctype="multipart/form-data">
        <?php
        while ($row2 = mysqli_fetch_array($result2)){
        ?>
        <div class="w3-section">
            <input class="w3-input w3-center" type="date" name="datum_radionice" required
                   value="<?php echo $row2['datum_sastanka'] ?>">
            <label>Datum radionice</label>
        </div>
        <div class="w3-section">
            <textarea name="opis" placeholder="Unesite opis radionice" rows="7" style="width: 100%"><?php echo utf8_decode($row2['opis']) ?></textarea>
            <label>Opis</label>
        </div>
        <div class="w3-section w3-center">
            Označite prisutne: <br>
            <ul style="list-style-type: none;">
                <?php
                $prisutni = explode(",",utf8_decode($row2['evidencija']));

                while ($row = mysqli_fetch_array($result)) {
                    $naziv = utf8_decode($row['prezime']).' '.$row['ime'];
                    if(in_array($naziv,$prisutni)){
                    ?>
                    <li><input class="w3-check" type="checkbox" name="prisutni[]"
                               value="<?php echo $row['prezime'] . ' ' . $row['ime']; ?>" checked>
                        <label><?php echo utf8_decode($row['prezime']) . ' ' . $row['ime']; ?></label></li>
                    <?php
                    }
                    else{
                        ?>
                        <li><input class="w3-check" type="checkbox" name="prisutni[]"
                                   value="<?php echo $row['prezime'] . ' ' . $row['ime']; ?>">
                            <label><?php echo utf8_decode($row['prezime']) . ' ' . $row['ime']; ?></label></li>
                        <?php
                    }
                }
                }
                ?>
            </ul>
        </div>
        <input type="hidden" name="id_sastanka" value="<?php echo $id_sastanka ?>">
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


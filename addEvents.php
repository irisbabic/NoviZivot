<?php session_start();?>
<!DOCTYPE html>
<html>
<head>
    <title>Dodavanje</title>
    <?php include_once("head.php"); ?>
</head>
<body>
<?php include_once("header.php"); ?>
<div class="w3-container w3-center" style="width: 50%; margin: auto;">
    <form method="POST" action="allEvents.php">
        <div class="w3-section">
            <input class="w3-input w3-center" type="date" name="datum_eventa" required
                   placeholder="Unesite datum događaja">
            <label>Datum događaja</label>
        </div>
        <div class="w3-section">
            <textarea name="opis" placeholder="Unesite opis događaja" rows="7" style="width: 100%"></textarea>
            <label>Opis događaja</label>
        </div>
        <div class="w3-padding w3-center">
            <button class="w3-button w3-white w3-xlarge w3-round-large w3-hover-pink" type="submit" name="submit"><i class="fas fa-check fa-5x" style="font-size:50px"></i></button>
        </div>
    </form>
</div>
<?php
include_once("footer.php");
?>
</body>
</html>


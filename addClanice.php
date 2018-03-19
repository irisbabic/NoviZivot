<?php session_start(); ?>
<!DOCTYPE html>
<html>
<head>
    <title>Dodavanje</title>
    <?php include_once ("head.php");?>
</head>
<body>
<?php include_once ("header.php");?>
<div class="w3-container w3-center" style="width: 50%; margin: auto;">
    <form method="POST" action="allClanice.php" >
        <div class="w3-section">
            <input class="w3-input w3-center" type="text" name="prezime" placeholder="Unesite prezime članice">
            <label>Prezime</label>
        </div>
        <div class="w3-section">
            <input class="w3-input w3-center" type="text" name="ime" placeholder="Unesite ime članice">
            <label>Ime</label>
        </div>
        <div class="w3-section">
            <input class="w3-input w3-center" type="text" name="oib" placeholder="Unesite OIB članice (11 znamenki)">
            <label>OIB</label>
        </div>
        <div class="w3-section">
            <input class="w3-input w3-center" type="date" name="datum_rodjenja" required placeholder="Unesite datum rođenja">
            <label>Datum rođenja</label>
        </div>
        <div class="w3-section">
            <input class="w3-input w3-center" type="text" name="opis" placeholder="Unesite opis">
            <label>Opis</label>
        </div>
        <div class="w3-section">
            <input class="w3-input w3-center" type="text" name="mobitel" placeholder="Unesite broj mobilnog telefona">
            <label>Mobilni telefon</label>
        </div>
        <div class="w3-section">
            <input class="w3-input w3-center" type="text" name="kucni" placeholder="Unesite broj kućnog telefona">
            <label>Kućni telefon</label>
        </div>
        <div class="w3-section">
            <input class="w3-input w3-center" type="text" name="email" placeholder="Unesite email adresu članice">
            <label>E-mail</label>
        </div>
        <div class="w3-padding w3-center">
            <button class="w3-button w3-white w3-xlarge w3-round-large w3-hover-pink" type="submit" name="submit"><i class="fas fa-check fa-5x" style="font-size:50px"></i></button>
        </div>


    </form>
</div>
<?php
include_once ("footer.php");
?>
</body>
</html>


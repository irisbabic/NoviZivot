<?php
session_start();
include_once ("db.php");
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $kor_ime = test_input($_POST['username']);
    $zaporka = test_input($_POST['password']);
    $sql = "SELECT * FROM ck.korisnik WHERE zaporka='$zaporka'";

    $result = $conn->query($sql);
    while($row = mysqli_fetch_array($result)){
        session_start();
        $_SESSION['loggedin'] = true;
        $_SESSION['username'] = $kor_ime;
        header("Location: admin.php");
    }
    if (!$result) {
        printf("Error: %s", mysqli_error($conn));
        exit();
    }
    mysqli_free_result($result);
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Izbornik</title>
    <?php include_once ("head.php");?>
</head>
<body>
<header class="w3-display-container" id="home">
    <div class="w3-hide-small w3-center" style="color: black; font-size: 40px"><h1>Klub žena Liburnije liječenih od raka dojke  <span class="w3-padding w3-pink w3-opacity-min" style="fill-opacity: 0.5"><b>Novi život</b></span></h1></div>

    <div class="w3-center"><img class="w3-image" src="img/logo.png" alt="volontiranje"></div>
</header>
<br>
<br>
<hr class="w3-opacity-min">
<div class="w3-row content">
    <div class="w3-col l3 w3-center"><button class="w3-btn w3-padding-large w3-xxxlarge w3-round-xxlarge w3-pink w3-opacity-min"><a href="dogadjaji.php" class="onhover">Događaji</a></button></div>
    <div class="w3-col l3 w3-center"><button class="w3-btn w3-padding-large w3-xxxlarge w3-round-xxlarge w3-pink w3-opacity-min"><a href="allClanice.php">Radionice</a></button></div>
    <div class="w3-col l3 w3-center"><button class="w3-btn w3-padding-large w3-xxxlarge w3-round-xxlarge w3-pink w3-opacity-min"><a href="allClanice.php">Članice</a></button></div>
    <div class="w3-col l3 w3-center"><button class="w3-btn w3-padding-large w3-xxxlarge w3-round-xxlarge w3-pink w3-opacity-min"><a href="galerija.php">Galerija</a></button></div>
</div>
<?php
include_once ("footer.php");
?>
</body>
</html>
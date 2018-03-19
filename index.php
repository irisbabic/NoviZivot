<?php
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
    <title>Početna</title>
    <?php include_once ("head.php");?>
</head>
<body>
<?php include_once ("header.php");?>
<div class="w3-display-container">
    <div class="w3-center" style="margin:0;">
        <h2 class="w3-center">Aktivnosti</h2>
        <ul class="list-group">
            <div class="row">
                <div class="col-md-4"></div>
                <div class="col-xs-12 col-md-4">
                    <li class="list-group-item">
                        Individualna savjetovanja sa stručnjacima uže specijaliziranim za bolesti dojke
                    </li>
                </div>
                <div class="col-md-4"></div>
            </div>
            <div class="row">
                <div class="col-md-4"></div>
                <div class="col-xs-12 col-md-4">
                    <li class="list-group-item"> Grupno savjetovalište
                    </li>
                </div>
                <div class="col-md-4"></div>
            </div>

            <div class="row">
                <div class="col-md-4"></div>
                <div class="col-xs-12 col-md-4">
                    <li class="list-group-item"> Edukacije
                    </li>
                </div>
                <div class="col-md-4"></div>
            </div>
            <div class="row">
                <div class="col-md-4"></div>
                <div class="col-xs-12 col-md-4">
                    <li class="list-group-item"> Predavanja
                    </li>
                </div>
                <div class="col-md-4"></div>
            </div>
            <div class="row">
                <div class="col-md-4"></div>
                <div class="col-xs-12 col-md-4">
                    <li class="list-group-item"> Stručne radionice
                    </li>
                </div>
                <div class="col-md-4"></div>
            </div>
            <div class="row">
                <div class="col-md-4"></div>
                <div class="col-xs-12 col-md-4">
                    <li class="list-group-item"> Psihosocijalna pomoć
                    </li>
                </div>
                <div class="col-md-4"></div>
            </div>
            <div class="row">
                <div class="col-md-4"></div>
                <div class="col-xs-12 col-md-4">
                    <li class="list-group-item"> Psihosocijalna pomoć
                    </li>
                </div>
                <div class="col-md-4"></div>
            </div>
            <div class="row">
                <div class="col-md-4"></div>
                <div class="col-xs-12 col-md-4">
                    <li class="list-group-item"> Zdravstveni pregledi
                    </li>
                </div>
                <div class="col-md-4"></div>
            </div>
            <div class="row">
                <div class="col-md-4"></div>
                <div class="col-xs-12 col-md-4">
                    <li class="list-group-item"> Tjelesna aktivnost uz stručno vodstvo fizioterapeuta
                    </li>
                </div>
                <div class="col-md-4"></div>
            </div>
            <div class="row">
                <div class="col-md-4"></div>
                <div class="col-xs-12 col-md-4">
                    <li class="list-group-item"> Radionice zdravog kuhanja
                    </li>
                </div>
                <div class="col-md-4"></div>
            </div>
        </ul>
    </div>
</div>
<br>
<div class="container w3-padding">
    <form action="index.php" method="post">
        <div class="form-group">
            <div class="row">
                <div class="col-xs-12 col-md-4" align="center"><label for="username">Korisničko ime: </label></div>
                <div class="col-xs-12 col-md-4" align="center"><input type="text" class="form-control"
                                                                      name="username"
                                                                      placeholder="Unesite korisničko ime">
                </div>
            </div>
            <P></P>
        </div>
        <div class="form-group">
            <div class="row">
                <div class="col-xs-12 col-md-4" align="center"><label for="password">Lozinka: </label></div>
                <div class="col-xs-12 col-md-4" align="center"><input type="password" class="form-control"
                                                                      name="password"
                                                                      placeholder="Unesite lozinku"></div>
            </div>
        </div>
        <div class="w3-center w3-padding"><button class="w3-button w3-round-large w3-pink w3-padding" type="submit">Login</button></div>
    </form>
</div>
<?php
include_once ("footer.php");
?>
</body>
</html>


<?php
session_start();
include_once ("db.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $datumR = test_input($_POST['datum_radionice']);
    $opis = utf8_encode(test_input($_POST['opis']));
    $prisutni = implode(",",$_POST['prisutni']);

    $sql = "INSERT INTO ck.sastanak VALUES (NULL,'".$opis."', '".$datumR."', '".$prisutni."')";

    if ($conn->query($sql) != TRUE) {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Radionice</title>
    <?php include_once ("head.php");?>
</head>
<body>
<?php include_once ("header.php");

$sql = "SELECT * FROM ck.sastanak ORDER BY datum_sastanka DESC";
$result = $conn->query($sql);
$sql2 = "SELECT * FROM ck.sastanak ORDER BY datum_sastanka DESC";
$result2 = $conn->query($sql2);
$brRadionice = 1;
?>
<div class="w3-container w3-padding w3-center" style="width: 40%; margin:auto">
    <div class="w3-bar">
        <button class="w3-pink w3-button w3-bar-item w3-opacity-min w3-left" id="myButton"><i
                class="fas fa-plus fa-2x"></i></button>
    </div>
</div>
<div class="w3-container w3-padding">
    <table class="w3-table w3-centered w3-striped w3-bordered" style="width: 80%; margin:auto; font-size: 18px;">
        <thead class="w3-pink w3-opacity-min">
        <th>Redni br.</th>
        <th>Datum</th>
        <th>Opis</th>
        <th></th>
        <th></th>
        <th></th>
        <th></th>
        </thead>
        <tbody>
        <?php while($row = mysqli_fetch_array($result)){
            $datumR = $row['datum_sastanka'];
            $datumR = explode("-", $datumR);
            if($datumR[0]>2017) {
                ?>
                <tr>
                    <td><?php echo $brRadionice ?>.</td>
                    <td><?php echo $datumR[2] . "." . $datumR[1] . "." . $datumR[0] . "." ?></td>
                    <td><?php echo nl2br(utf8_decode($row['opis'])) ?></td>
                    <td>
                        <form method="GET" action="updateRadionice.php">
                            <input type="hidden" value="<?php echo $row['id_sastanka'] ?>" name="id_sastanka">
                            <button type="submit" name="submit"><i class='fas fa-edit'></i></button>
                        </form>
                    </td>
                    <td>
                        <form method="GET" action="deleteRadionice.php">
                            <input type="hidden" value="<?php echo $row['id_sastanka'] ?>" name="id_sastanka">
                            <button type="submit" name="submit"><i class='fas fa-trash'></i></button>
                        </form>
                    </td>
                    <td>
                        <form method="GET" action="viewRadionice.php">
                            <input type="hidden" value="<?php echo $row['id_sastanka'] ?>" name="id_sastanka">
                            <button type="submit" name="submit"><i class='fas fa-eye'></i></button>
                        </form>
                    </td>
                    <td>
                        <form method="GET" action="galerija.php">
                            <input type="hidden" value="<?php echo $row['id_sastanka'] ?>" name="id_sastanka">
                            <button type="submit" name="submit"><i class='far fa-image'></i></button>
                        </form>
                    </td>
                </tr>
                <?php
                $brRadionice += 1;
            }
        }
        ?>
        </tbody>
    </table>
</div>
<br>
<div class="w3-container w3-center w3-padding">
    <button onclick="myFunc('Demo1')" class="w3-button w3-pink w3-opacity-min w3-large">
        Otvori arhiv</button>
    <div id="Demo1" class="w3-hide w3-padding">
        <table class="w3-table w3-centered w3-striped w3-bordered" style="width: 80%; margin:auto; font-size: 18px;">
            <thead class="w3-pink w3-opacity-min">
            <th>Redni br.</th>
            <th>Datum</th>
            <th>Opis</th>
            <th></th>
            <th></th>
            <th></th>
            <th></th>
            </thead>
            <tbody>
            <?php while($row2 = mysqli_fetch_array($result2)){
                $datumR = $row2['datum_sastanka'];
                $datumR = explode("-", $datumR);
                if($datumR[0]<2018) {
                    ?>
                    <tr>
                        <td><?php echo $brRadionice ?>.</td>
                        <td><?php echo $datumR[2] . "." . $datumR[1] . "." . $datumR[0] . "." ?></td>
                        <td><?php echo nl2br(utf8_decode($row2['opis'])) ?></td>
                        <td>
                            <form method="GET" action="updateRadionice.php">
                                <input type="hidden" value="<?php echo $row2['id_sastanka'] ?>" name="id_sastanka">
                                <button type="submit" name="submit"><i class='fas fa-edit'></i></button>
                            </form>
                        </td>
                        <td>
                            <form method="GET" action="deleteRadionice.php">
                                <input type="hidden" value="<?php echo $row2['id_sastanka'] ?>" name="id_sastanka">
                                <button type="submit" name="submit"><i class='fas fa-trash'></i></button>
                            </form>
                        </td>
                        <td>
                            <form method="GET" action="viewRadionice.php">
                                <input type="hidden" value="<?php echo $row2['id_sastanka'] ?>" name="id_sastanka">
                                <button type="submit" name="submit"><i class='fas fa-eye'></i></button>
                            </form>
                        </td>
                        <td>
                            <form method="GET" action="galerija.php">
                                <input type="hidden" value="<?php echo $row2['id_sastanka'] ?>" name="id_sastanka">
                                <button type="submit" name="submit"><i class='far fa-image'></i></button>
                            </form>
                        </td>
                    </tr>
                    <?php
                    $brRadionice += 1;
                }
            }
            ?>
            </tbody>
        </table>
    </div>
</div>
<?php
include_once ("footer.php");

?>
<script type="text/javascript">
    document.getElementById("myButton").onclick = function () {
        location.href = "addRadionice.php";
    };
</script>
<script>
    function myFunc(id) {
        var x = document.getElementById(id);
        if (x.className.indexOf("w3-show") === -1) {
            x.className += " w3-show";
        } else {
            x.className = x.className.replace(" w3-show", "");
        }
    }
</script>
</body>
</html>
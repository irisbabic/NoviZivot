<?php
session_start();
include_once("db.php");
?>
<!DOCTYPE html>
<html>
<head>
    <title>Članice</title>
    <?php include_once("head.php"); ?>
</head>
<body>
<?php include_once("header.php");
$oib = $_GET['oib'];
$sql = "SELECT * FROM ck.pacijent WHERE oib='$oib'";
$result = $conn->query($sql);
if ($conn->query($sql) != TRUE) {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$sql2 = "SELECT datum_sastanka,evidencija FROM ck.sastanak";

$result2 = $conn->query($sql2);
if ($conn->query($sql2) != TRUE) {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

?>

<div class="w3-container w3-padding w3-center" style="width: 40%; margin:auto">
    <div class="w3-bar">
        <button class="w3-pink w3-button w3-bar-item w3-opacity-min" id="myButton"><i
                    class="fas fa-angle-left fa-3x"></i></button>
    </div>
</div>
<div class="w3-container w3-padding">
    <table class="w3-table w3-centered w3-striped w3-bordered" style="width: 80%; margin:auto; font-size: 17px;">
        <thead class="w3-pink w3-opacity-min">
        <th>Redni br.</th>
        <th>Prezime</th>
        <th>Ime</th>
        <th>Datum rođenja</th>
        <th>OIB</th>
        <th>Opis</th>
        <th>Mobitel</th>
        <th>Telefon</th>
        <th>E-mail</th>
        <th>Prisutstvo</th>
        </thead>
        <tbody>
        <?php while ($row = mysqli_fetch_array($result)){
        $clanica = $row['prezime'] . " " . $row['ime'];
        $datumR = $row['datum_rodjenja'];
        $datumR = explode("-", $datumR);
$a = array();
        while ($row2 = mysqli_fetch_array($result2)) {
            $datumRadionice = $row2['datum_sastanka'];
            $datumRadionice = explode("-", $datumRadionice);
            $datumRadionice = $datumRadionice[2].'.'.$datumRadionice[1].'.'.$datumRadionice[0].'.';
            $evidencija = explode(",",$row2['evidencija']);
            foreach ($evidencija as $osoba) {
                if ($osoba == $clanica) {
                    array_push($a,$datumRadionice);
                }
            }
            $prisutstvo = implode(", ",$a);
        }
        ?>
        <tr>
            <td>1.</td>
            <td><?php echo utf8_decode($row['prezime']) ?></td>
            <td><?php echo $row['ime'] ?></td>
            <td><?php echo $datumR[2] . "." . $datumR[1] . "." . $datumR[0] . "." ?></td>
            <td><?php echo $row['oib'] ?></td>
            <td><?php echo $row['opis'] ?></td>
            <td><?php echo $row['telefon'] ?></td>
            <td><?php echo $row['kucni'] ?></td>
            <td><?php echo $row['email'] ?></td>
            <td><?php echo $prisutstvo ?></td>
            <?php

            $brClanice += 1;
            }
            ?>
        </tbody>
    </table>
</div>
<?php
include_once("footer.php");
mysqli_free_result($result);
$conn->close();
?>
<script type="text/javascript">
    document.getElementById("myButton").onclick = function () {
        location.href = "allClanice.php";
    };
</script>
</body>
</html>
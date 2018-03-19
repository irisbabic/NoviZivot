<?php
session_start();
include_once ("db.php");
?>
<!DOCTYPE html>
<html>
<head>
    <title>Radionice</title>
    <?php include_once ("head.php");?>
</head>
<body>
<?php include_once ("header.php");
$id_eventa = $_GET['id_eventa'];
$sql = "SELECT * FROM ck.events WHERE id_eventa='$id_eventa'";
$result = $conn->query($sql);
$brRadionice = 1;
?>
<div class="w3-container w3-padding w3-center" style="width: 40%; margin:auto">
    <div class="w3-bar">
        <button class="w3-pink w3-button w3-bar-item w3-opacity-min w3-left" id="myButton"><i
                class="fas fa-angle-left fa-2x"></i></button>
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
        </thead>
        <tbody>
        <?php while($row = mysqli_fetch_array($result)){
            $datumR = $row['datum_eventa'];
            $datumR = explode("-", $datumR);
            ?>
            <tr>
                <td><?php echo $brRadionice ?>.</td>
                <td><?php echo $datumR[2] . "." . $datumR[1] . "." . $datumR[0] . "." ?></td>
                <td><?php echo nl2br(utf8_decode($row['opis'])); ?></td>
            </tr>
            <?php
        }
        ?>
        </tbody>
    </table>
    <br>
</div>
<?php
include_once ("footer.php");
?>
<script type="text/javascript">
    document.getElementById("myButton").onclick = function () {
        location.href = "allEvents.php";
    };
</script>

</body>
</html>
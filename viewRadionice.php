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
$id_sastanka = $_GET['id_sastanka'];
$sql = "SELECT * FROM ck.sastanak WHERE id_sastanka='$id_sastanka'";
$result = $conn->query($sql);
$sql2 = "SELECT name FROM ck.slike WHERE id_radionice='$id_sastanka'";
$result2 = $conn->query($sql2);
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
        <th>Prisutstvo</th>
        <th></th>
        <th></th>
        <th></th>
        </thead>
        <tbody>
        <?php while($row = mysqli_fetch_array($result)){
            $datumR = $row['datum_sastanka'];
            $datumR = explode("-", $datumR);
            ?>
            <tr>
                <td><?php echo $brRadionice ?>.</td>
                <td><?php echo $datumR[2] . "." . $datumR[1] . "." . $datumR[0] . "." ?></td>
                <td><?php echo utf8_decode($row['opis']) ?></td>
                <td><?php echo utf8_decode($row['evidencija']) ?></td>
            </tr>
            <?php
        }
        ?>
        </tbody>
    </table>
    <br>
</div>
<div class="w3-container w3-padding">
    <div class="w3-row-padding">
        <?php
        $brojac = 1;
        while($row2 = mysqli_fetch_array($result2)){?>
        <div class="w3-cell w3-third gallery">
                <img src="<?php echo $row2['name']; ?>" alt="picture" width="100%" style="max-height: 300px"  onclick="document.getElementById('modal0<?php echo $brojac?>').style.display='block'">
        </div>
        <div id="modal0<?php echo $brojac?>" class="w3-modal" onclick="this.style.display='none'">
            <span class="w3-button w3-hover-red w3-xlarge w3-display-topright">&times;</span>
            <div class="w3-modal-content w3-animate-zoom">
                <img src="<?php echo $row2['name']; ?>" style="width:100%; height:100%;">
            </div>
        </div>
    </div>
        <?php } ?>
    </div>
</div>
<?php
include_once ("footer.php");
?>
<script type="text/javascript">
    document.getElementById("myButton").onclick = function () {
        location.href = "allRadionice.php";
    };
</script>

</body>
</html>
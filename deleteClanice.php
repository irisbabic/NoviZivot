<?php
session_start();
include_once ("db.php");
$oib = test_input($_GET['oib']);
$sql = "DELETE FROM ck.pacijent WHERE oib='$oib'";

$result = $conn->query($sql);

if ($conn->query($sql) === TRUE) {
    echo "Record deleted successfully";
    header("Location: allClanice.php");
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}
mysqli_free_result($result);
$conn->close();
?>
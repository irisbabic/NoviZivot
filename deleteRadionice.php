<?php
session_start();
include_once ("db.php");
$id = test_input($_GET['id_sastanka']);
$sql = "DELETE FROM ck.sastanak WHERE id_sastanka='$id'";

$result = $conn->query($sql);

if ($conn->query($sql) === TRUE) {
    echo "Record deleted successfully";
    header("Location: allRadionice.php");
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}
mysqli_free_result($result);
$conn->close();
?>
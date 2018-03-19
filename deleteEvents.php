<?php
session_start();
include_once ("db.php");
$id = test_input($_GET['id_eventa']);
$sql = "DELETE FROM ck.events WHERE id_eventa='$id'";

$result = $conn->query($sql);

if ($conn->query($sql) === TRUE) {
    header("Location: allEvents.php");
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}
mysqli_free_result($result);
$conn->close();
?>
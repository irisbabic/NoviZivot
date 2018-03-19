<?php
session_start();
include_once ("db.php");
$id_radionice = $_GET['id_sastanka']
?>
    <!DOCTYPE html>
    <html>
<head>
    <title>Dodavanje</title>
    <?php include_once ("head.php");?>
</head>
<body>
<?php include_once ("header.php"); ?>

<div class="w3-container content">
    <form action="uploadImage.php" method="post" enctype="multipart/form-data">
        Select image to upload:
        <input type="file" name="fileToUpload" id="fileToUpload">
        <input type="hidden" name="id_radionice" value="<?php echo $id_radionice?>">
        <input type="submit" value="Upload Image" name="submit">
    </form>
</div>


<?php
include_once ("footer.php");
?>

</body>
</html>
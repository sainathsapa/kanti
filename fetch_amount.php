<?php
require('inc/db.php');
$post=$_POST['id'];

$QRY="SELECT * FROM posts WHERE `postStName`='$post'";
$rslt = $conn->query($QRY);
$result = $rslt->fetch_assoc();

echo $result['amount'];



?>
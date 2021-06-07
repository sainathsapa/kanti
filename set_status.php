<?php
require('inc/nav.php');
$app_num=$_POST['app_num'];
$postStatus=$_POST['status'];
$updateStatus="UPDATE  `customer` SET `status`='$postStatus' WHERE `app_num`='$app_num'";
if(!$runQru=$conn->query($updateStatus))
{
    echo "Failed to Update";
}
else
{
    header('Location:list_app.php');
}
<?php
require('inc/nav.php');
$delId=$_GET['id'];
$DELETE_qry="DELETE FROM `posts` WHERE `id`=$delId";
if($delRun=$conn->query($DELETE_qry))
{
    header('Location:view_posts.php?msg=del');
    
}
else
{
    echo "err".mysqli_error($conn);
}
?>

<?php
require('inc/nav.php');
require('admin_nav.php');


?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View or Edit Posts</title>
</head>

<body>
<div class="conainer bg-white table-responsive-sm">
    <br>
<table class="table table-striped table-light p-1 table-sm table-bordered"id="view_posts_tbl">
            <thead class="table-dark">
                <th>S.I.</th>
                <th>Short Name</th>
                <th>Job Name</th>
                <th>Description</th>
                <th>Amount</th>
                <th>Actions</th>
            </thead>
            <tbody>

<?php 
$SELECT_POSTS="SELECT * FROM posts";
$runQuery=$conn->query($SELECT_POSTS);
while($row=$runQuery->fetch_assoc())
{
    ?>


                <tr>
                    <td><?php echo $row['id'];?></td>
                    <td><?php echo $row['postStName'];?></td>
                    <td><?php echo $row['postName'];?></td>
                    <td><?php echo $row['description'];?></td>
                    <td><?php echo $row['amount'];?></td>
                    <td><a href="<?php echo 'del_post.php?id='.$row['id'];?>" class="btn btn-danger">Delete</a></td>
                </tr>
                <?php } ?>
            </tbody>
        </table>
        <br>
    </div>


</body>

</html>
<script>
    $(document).ready(function() {
        $('#view_posts_tbl').DataTable();
    });
</script>
<?php
if(isset($_GET['msg']))
{
    if($_GET['msg']=='del')
    {
        echo "
        <script>
        alert('deleted');
        </script>
        ";
    }
}
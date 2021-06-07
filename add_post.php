<?php
require('inc/nav.php');
require('admin_nav.php');


if(isset($_POST['submit']))
{
    //Variables
    $postStName=$_POST['postStName'];
    $postName=$_POST['postName'];
    $postDesc=$_POST['postDescription'];
    $post_amount=$_POST['amount'];

    $insertNewPost="INSERT INTO posts (`postStName`,`postName`,`description`,`amount`) VALUES ('$postStName','$postName','$postDesc','$post_amount')";
    $runInsertQry=$conn->query($insertNewPost);
    if(!$runInsertQry)
    {
        echo "errr".mysqli_error($conn);
    }
    else
    {
        echo "<script>alert('New Job Added');</script>";
    }

}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add New Post</title>
</head>

<body>
<br>
<br>

    <form class="form table table-bordered table-stripped card col-md-6 container" action="#" method="post">

        <div class="col">
            <h2>Add New Post</h2>
            <hr>
            <div class="row col-sm-12 col-md-12">
                <div class="col-md-12 col-sm-12">
                    <h6 class="text-grey">Post ShortName : </h6>
                    <input class="col-md-6 form-control" type="text" name="postStName" placeholder="test">
                 
                    <h6 class="text-grey">Post Name : </h6>
                    <input class="col-md-6 form-control" type="text" name="postName" placeholder="Test Job">
              
                    <h6 class="text-grey">Post Description : </h6>
                    <input class="col-md-6 form-control" type="text" name="postDescription" placeholder="Test Job">
                

                    <h6 class="text-grey">Amount : </h6>
                    <input class="col-md-6 form-control" type="text" name="amount" placeholder="Rs.">
                    
                    <br>
                    <input class="col-md-6" type="submit" name="submit" value="Add Post">
                    <br><br>
                </div>
            
            </div>

        </div>

    </form>
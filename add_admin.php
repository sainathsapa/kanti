<?php
require('inc/nav.php');

if(isset($_POST['submit']))
{
    //Variables
    $userName=$_POST['username'];
    $pwd=$_POST['pwd'];
   

    $addAdmin="INSERT INTO `admin` (`user_name`,`pwd`) VALUES ('$userName','$pwd')";
    $runInsertQry=$conn->query($addAdmin);
    if(!$runInsertQry)
    {
        echo "errr".mysqli_error($conn);
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

    <form class="form table table-bordered table-stripped card col-md-6 container" action="#" method="post">

        <div class="col">
            <h2>Add New Post</h2>
            <hr>
            <div class="row">
                <div class="col-md-6">
                    <h6 class="text-grey">Post ShortName : </h6>
                    <input class="col-md-8 form-control" type="text" name="postStName" placeholder="test">
                 
                    <h6 class="text-grey">Post Name : </h6>
                    <input class="col-md-8 form-control" type="text" name="postName" placeholder="Test Job">
              
                    <h6 class="text-grey">Post Description : </h6>
                    <input class="col-md-8 form-control" type="text" name="postDescription" placeholder="Test Job">
                

                    <h6 class="text-grey">Amount : </h6>
                    <input class="col-md-8 form-control" type="text" name="amount" placeholder="Rs.">
                    
                    <br>
                    <input class="col-md-8" type="submit" name="submit" value="Add Post">
                    <br><br>
                </div>
                <div class="col-md-6">
                    <img src="assets/images/add_post.png" height="150px"/>
                </div>
            </div>

        </div>

    </form>
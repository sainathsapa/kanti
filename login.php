<?php
require('inc/nav.php');
if(isset($_POST['login']))
{
    $usrName=$_POST['user-name'];
    $pwd=$_POST['user-pass'];
    $saved_pass="admin@123";
    $saved_hash=password_hash($saved_pass,PASSWORD_DEFAULT);
    $saved_userNamer="admin";

    if((password_verify($pwd,$saved_hash))&&($usrName==$saved_userNamer))
    {

        $_SESSION['admin']=$saved_userNamer;
        header('Location:dash.php');
    }
    else
    {
        header('Location: ?msg=fail');
        exit();
    }

    
   

    
}

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login | Kanti & Sons OutSourcing Pvt. Ltd. | DSK Solutions Pvt. Ltd. 2020</title>
</head>
<body>
    <br>
    <br>
    <div class="container col-md-12 col-sm-12">
        <div class="card container col-sm-6 col-md-6">
            <center><img class="col-md-8 col-sm-8"src="assets/images/cmp_logo.jpg"/></center>
            <form class="form" name="Login" action="login.php" method="POST">
                <label for="user-name">User Name :</label>
                <input class="form-control" type="text" name="user-name" placeholder="UserName">
                <br>
                <label for="password">Password :</label>
                <input class="form-control" type="password" name="user-pass" placeholder="Password"> <br>
                <input class="btn btn-danger" type="submit" name="login" value="Login">
            </form>
        </div>
    </div>
    
</body>
</html>
<?php
if(isset($_GET['msg']))
{
    if($_GET['msg']=='fail')
    {
        echo "
        <script>
        alert('Failed to Login');
        </script>
        ";
    }
}
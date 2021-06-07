<?php
require('inc/nav.php');

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Application Print | DSK Solutions</title>
</head>

<body class="bg-dark">
    <div class="col-md-8 container ">


        <form class="form table table-bordered table-stripped card container " id="tbl_status" action="print_app.php" method="post">
            <center><a href="index.php"><img class="img text-center col-sm-6" src="assets/images/cmp_logo.jpg"></a></center>

            <h2>Print Application</h2>
            <hr>

            <label for="AppNum">Application Number : </label>
            <input class="col-md-5 form-control " type="text" name="appNum" required>
            <br>
            <?php
            if (isset($_GET['msg'])) {
                if ($_GET['msg'] == "err") {
                    echo '
                        <h5 class="text-danger">Re Enter Application Number</h5>
               
                        ';
                }
            } ?>
            <input class="col-md-3 form-control btn btn-success" type="submit" name="submit" value="Print";
                                                                                                                    } ?>
           







</body>

</html>
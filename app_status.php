<?php
require('inc/nav.php');

?>
<?php
if (isset($_POST['submit'])) {
    $passedAppNumber = $_POST['app_num'];
    strtoupper($passedAppNumber);
    $selectDataFromCustomers = "SELECT * FROM `customer` WHERE `app_num`= '$passedAppNumber'";
    $runSelectQuery = $conn->query($selectDataFromCustomers);
    if (!$fetchedCustomerData = $runSelectQuery->fetch_array()) {
        header('Location:?msg=app_not_found');
    }


    $selectDataFromPayments = "SELECT * FROM `payments` WHERE `app_num`='$passedAppNumber'";
    $runSelectQuery_Payments = $conn->query($selectDataFromPayments);
    $fetchDataFromPayments = $runSelectQuery_Payments->fetch_array();
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Check Application Status</title>
</head>

<body class="bg-dark">
    <div class="col-md-8 container ">


        <form class="form table table-bordered table-stripped card container " id="tbl_status" action="app_status.php" method="post" enctype="multipart/form-data">
        <center><a href="index.php"><img class="img text-center col-sm-6"src="assets/images/cmp_logo.jpg"></a></center>

            <h2>Check Application Status</h2>
            <hr>

            <label for="AppNum">Application Number : </label>
            <input class="col-md-5 form-control " type="text" name="app_num" value="<?php if (isset($_POST['submit'])) {
                                                                                        echo $_POST['app_num'];
                                                                                    } ?>" placeholder="Application Number" <?php if (isset($_POST['submit'])) {
                                                                                                                                echo "readonly";
                                                                                                                            } ?>>
            <br>
            <?php
            if (isset($_GET['msg'])) {
                if ($_GET['msg'] == "app_not_found") {
                    echo '
                        <h5 class="text-danger">Re Enter Application Number</h5>
               
                        ';
                }
            } ?>
            <input class="col-md-3 form-control btn btn-success" type="submit" name="submit" value="Get Details" <?php if (isset($_POST['submit'])) {
                                                                                                                        echo "hidden";
                                                                                                                    } ?>>
            <br>
            <?php if (isset($_POST['submit'])) {
            ?>



                <center>
                    <div class="bg-success text-white">
                        <h1 class="m-2 p-2 ">Application Status</h1>
                    </div>
                </center> <br>
                <div class="row col-md-12 col-sm-12 " id="customers">
                    <div class="col-md-6 col-sm-12">

                        <div class="row">
                            <div class="col-md-5 col-sm-6">
                                <b>Post Applied for : </b>
                            </div>
                            <div class="col-md-5 col-sm-6">
                                <b class="text-danger"><?php echo $fetchedCustomerData['post_applied']; ?></b>
                            </div>

                        </div>

                        <div class="row">
                            <div class="col-md-5">
                                <b>Status : </b>
                            </div>
                            <div class="col-md-5">

                                <b class="text-danger"><?php echo $fetchedCustomerData['status']; ?></b>
                            </div>

                        </div>

                        <div class="row">
                            <div class="col-md-5">

                                <b> Name : </b>
                            </div>
                            <div class="col-md-7"><?php echo $fetchedCustomerData['custFName'] . " " . $fetchedCustomerData['custLName'];
                                                    ?> </div>
                        </div>

                        <div class="row">
                            <div class="col-md-5">

                                <b> Father Name : </b>
                            </div>
                            <div class="col-md-6"><?php echo $fetchedCustomerData['custFatherName']; ?> </div>

                        </div>
                        <div class="row">
                            <div class="col-md-5">

                                <b>Mother Name : </b>
                            </div>
                            <div class="col-md-5"><?php echo $fetchedCustomerData['custMotherName']; ?></div>
                        </div>
                        <div class="row">
                            <div class="col-md-5">

                                <b>Date of Birth : </b>
                            </div>
                            <div class="col-md-5"><?php echo $fetchedCustomerData['custDOB']; ?></div>
                        </div>

                        <div class="row">
                            <div class="col-md-5">

                                <b>Gender : </b>
                            </div>
                            <div class="col-md-5"><?php echo $fetchedCustomerData['gender']; ?></div>
                        </div>
                        <div class="row">
                            <div class="col-md-5">

                                <b>Email : </b>
                            </div>
                            <div class="col-md-6"><?php echo $fetchedCustomerData['custEmail']; ?></div>
                        </div>
                        <div class="row">
                            <div class="col-md-5">

                                <b>Mobile : </b>
                            </div>
                            <div class="col-md-5"><?php echo $fetchedCustomerData['custMobile']; ?></div>
                        </div>
                        <div class="row">
                            <div class="col-md-5">

                                <b>Amount : </b>
                            </div>
                            <div class="col-md-5">Rs. <?php echo $fetchedCustomerData['custPayment']; ?> </div>
                        </div>

                        <?php
                        if ($fetchDataFromPayments['razorpay_id']) {

                        ?>
                            <div class="row">
                                <div class="col-md-5">

                                    <b>Transaction ID : </b>
                                </div>
                                <div class="col-md-7"><?php echo $fetchDataFromPayments['razorpay_id']; ?></div>
                            </div>






                    </div>
                </div>
                <br>

                <center>

                    <button type="button" name="btn" class="btn btn-primary" onclick="window.print()">Print</button>
                </center> <br>
                <br>
                <br>
                
            <?php } ?>


        </form>
    </div>
    </div>

    <?php
                if (!$fetchDataFromPayments['razorpay_id']) {

    ?>



        <form action="doPayment.php" method="post">

            <input type="hidden" name="app_num" value="<?php echo $fetchedCustomerData['app_num']; ?>" required>
            <center>

                <input class="btn btn-primary form-control bg-danger text-bold" type="submit" name="submit" value="Do Payment"> </center> <br>
        </form>
    <?php } ?>


<?php }  ?>





</body>

</html>
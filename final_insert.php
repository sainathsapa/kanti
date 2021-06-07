<?php
require('inc/nav.php');
if (!isset($_POST['submit'])) {

    echo '<div class="container card"><h2>';
    echo "Page Can't Accessable kindly check URL </h2></div>";
} else {
    //VARIABLES
    $postApplied = $_POST['post'];
    $postDescription = $_POST['description'];

    $fName = $_POST['fname'];
    $lName = $_POST['lname'];

    $fatherName = $_POST['fatherName'];
    $motherName = $_POST['motherName'];

    $dateOfBirth = $_POST['dob'];
    $gender = $_POST['gender'];
    $marrialStatus = $_POST['marrial_status'];

    $catogery = $_POST['catogery'];
    $aadhar = $_POST['aadhar'];

    $address = $_POST['address'];
    $city = $_POST['city'];
    $dist = $_POST['dist'];
    $state = $_POST['state'];
    $pinCode = $_POST['pincode'];

    $email = $_POST['email'];
    $mobile = $_POST['mobile'];

    $amount = $_POST['amount'];


    $qualification = $_POST['qualification'];
    $boardUniversity = $_POST['university'];
    $passingYear = $_POST['passing_year'];
    $total_mark = $_POST['total_marks'];
    $obtainedMarks = $_POST['obt_marks'];
    $percentage = $_POST['percentage'];

    $lastID = "SELECT app_num, id FROM customer ORDER BY id DESC LIMIT 1  ";
    $rslt = $conn->query($lastID);
    $result = $rslt->fetch_assoc();
    $LastInsertCustID = $result['id'] + 1;

    $UpperPostApplied = strtoupper($postApplied);

    $newAppNumber = "KANTI2020" . $UpperPostApplied . "00" . $LastInsertCustID;
    $_SESSION['app_num']=$newAppNumber;

    $SQL_postName = "SELECT * FROM posts WHERE postStname='$postApplied'";
    $run_postGet = $conn->query($SQL_postName);
    $fetchPostName = $run_postGet->fetch_assoc();
    $finalPostName = $fetchPostName['postName'];


    //GETTING PHOTOS
    //PASSPORT SIZE PHOTO

    $PassPorstSizePhoto_Name = $_FILES['custPhoto']['name'];
    $PassPorstSizePhoto_Size = $_FILES['custPhoto']['size'];
    $PassPorstSizePhoto_temp = $_FILES['custPhoto']['tmp_name'];
    $PassPorstSizePhoto_type = $_FILES['custPhoto']['type'];
    $PassPorstSizePhoto_file_ext_temp = explode('.', $_FILES['custPhoto']['name']);

    $PassPorstSizePhoto_file_ext = strtolower(end($PassPorstSizePhoto_file_ext_temp));


    $customerSignature_Name = $_FILES['custSign']['name'];
    $customerSignature_Size = $_FILES['custSign']['size'];
    $customerSignature_temp = $_FILES['custSign']['tmp_name'];
    $customerSignature_type = $_FILES['custSign']['type'];
    $customerSignature_file_ext_temp = explode('.', $_FILES['custPhoto']['name']);
    $customerSignature_file_ext = strtolower(end($customerSignature_file_ext_temp));



    $extensions = array("jpeg", "jpg", "png");

    if (in_array($PassPorstSizePhoto_file_ext, $extensions) === false) {
        echo "File Type Error";
    } else {
        move_uploaded_file($PassPorstSizePhoto_temp, "uploads/custPassportSizePhoto/" . $newAppNumber . "." . $PassPorstSizePhoto_file_ext);

        move_uploaded_file($customerSignature_temp, "uploads/custSignature/" . $newAppNumber . "." . $customerSignature_file_ext);

        $uploadStatus = 1;
        $passPassPortSizePhotoAddress = "uploads/custPassportSizePhoto/" . $newAppNumber . "." . $PassPorstSizePhoto_file_ext;
        $passcustomerSignatureAddress = "uploads/custSignature/" . $newAppNumber . "." . $customerSignature_file_ext;
    }
















    if ($uploadStatus == 1) {



        $SQL_insert_qry = "INSERT INTO `customer`(`app_num`, `aadhar_num`, `custFName`, `custLName`, `custFatherName`, `custMotherName`, `marrial_status`, `gender`, `category`, `custDOB`, `custEmail`, `custMobile`, `custAddress`, `custCity`, `custDist`, `custPinCode`, `custState`, `custPayment`, `custPhoto`,`custSign`, `post_applied`, `status`) VALUES ('$newAppNumber','$aadhar','$fName','$lName','$fatherName','$motherName','$marrialStatus','$gender','$catogery','$dateOfBirth','$email','$mobile','$address','$city','$dist','$pinCode','$state','$amount','$passPassPortSizePhotoAddress','$passcustomerSignatureAddress','$finalPostName','Payment Pending')";

        $runInsertQuery = $conn->query($SQL_insert_qry);




        if (!$runInsertQuery) {
            echo "Failed to Insert" . mysqli_error($conn);
        } else {



            $getInsertedDetails = " SELECT * FROM customer WHERE `app_num`='$newAppNumber'";
            $rslt = $conn->query($getInsertedDetails);
            $result = $rslt->fetch_assoc();



            $i = 0;
            $qla_num = sizeof($_POST['qualification']);
            $appNewQlfID=$result['app_num'];
    
    
            while ($i < $qla_num) {
    
    $writeInsertQuery="INSERT INTO `custedu` (`custID`,`qualification`,`board`,`passing_yr`,`total_marks`,`obt_marks`,`percentage`) VALUES('$appNewQlfID','$qualification[$i]','$boardUniversity[$i]','$passingYear[$i]','$total_mark[$i]','$obtainedMarks[$i]','$percentage[$i]')";
    $runQlfInsert=$conn->query($writeInsertQuery);
    
                $i++;
            }



?>

            <!DOCTYPE html>
            <html lang="en">

            <head>
                <meta charset="UTF-8">
                <meta name="viewport" content="width=device-width, initial-scale=1.0">
                <title>Application Form</title>
            </head>

            <body class="bg-dark">
                <div class="col-md-8 container bg-white card table-responsive">
<form action="doPayment.php" method="POST">
                    <table class="table table-borderd table-striped table-sm-12 table-md-12">
                        
                        </thead>
                        <tbody>
                            <tr>
                                <td> <b>Application Number :</b> </td>
                                <td><?php echo $result['app_num']; ?></td>
                            </tr>

                            <tr>
                                <td> <b>Post Applied for :</b> </td>
                                <td><?php echo $result['post_applied']; ?></td>
                            </tr>
                            <tr>
                                <td> <b>Name :</b> </td>
                                <td><?php echo $result['custFName']." ".$result['custLName']; ?></td>
                            </tr>
                            <tr>
                                <td> <b>Amount to Pay :</b> </td>
                                <td><?php echo $result['custPayment']; ?></td>
                            </tr>
                        </tbody>
                    </table>
                    <input class="center btn btn-primary" type="submit" name="submit" value="Pay">

                </div>
                <input type="hidden" name="app_num" value="<?php echo $result['app_num'];?>">
        </form>
            </body>

            </html>

<?php

        }
    }
}
?>
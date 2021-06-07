<?php

require("inc/nav.php");

if (!isset($_POST['submit'])) {
    header('Location:index.php');
} else {
    $app_num = $_POST['appNum'];
    $select_app_details = "SELECT * FROM customer WHERE `app_num`='$app_num'";
    $runQry = $conn->query($select_app_details);
    if (!$getDetails = $runQry->fetch_assoc()) {
        header('Location:print.php?msg=err');
    }
    //VARIABLES
    $postApplied = $getDetails['post_applied'];

    $fName = $getDetails['custFName'];
    $lName = $getDetails['custLName'];

    $fatherName = $getDetails['custFatherName'];
    $motherName = $getDetails['custMotherName'];

    $dateOfBirth = $getDetails['custDOB'];
    $gender = $getDetails['gender'];
    $marrialStatus = $getDetails['marrial_status'];

    $catogery = $getDetails['category'];
    $aadhar = $getDetails['aadhar_num'];

    $address = $getDetails['custAddress'];
    $city = $getDetails['custCity'];
    $dist = $getDetails['custDist'];
    $state = $getDetails['custState'];
    $pinCode = $getDetails['custPinCode'];

    $email = $getDetails['custEmail'];
    $mobile = $getDetails['custMobile'];

    $amount = $getDetails['custPayment'];







?>

    <div class="form table table-bordered table-stripped card col-md-8 container">

        <br>
        <br>
        <div class="col-md-12">
            <div class="row">
                <div class="col">
                    <center><img src="assets/images/cmp_logo.jpg" height="200px" width="450px"></center>

                </div>
                <div class="col">
                    <p align="right"><img class="image img " id="custImage" src="<?php echo $getDetails['custPhoto']; ?>" type="hidden" height="200px"/>

                </div>
            </div>
        </div>

        <h2>Personal Details</h2>
        <hr>
        <center>
            <h5><b>Application No :</b> <?php echo $app_num; ?></h5>
        </center>


        <div class="form-row col-md-12">

            <div class="col">


                <label for="post">Post Applying for :</label>
                <select class="custom-select form-control" "post" id="postid" onchange="change_select();" readonly>



                    ?>
                    <option value="<?php echo $postApplied; ?>" selected><?php echo  $postApplied; ?> </option>

                </select>

            </div>

            <div class="col-md-6">


                <label for="post">Description :</label>

                <input class="form-control" type="text" "description" id="desc_select" value="
                <?php

                $sql_query = "SELECT * FROM posts WHERE postName='$postApplied'"; //QUERY TO SELECT the user input related content
                $rslt = $conn->query($sql_query); //EXECUTE THE QUERY
                $result = $rslt->fetch_assoc();

                echo $result['description']; ?>
                " readonly>




            </div>

        </div>
        <br>


        <div class="form-row col-md-12">
            <div class="col">
                <label for="fname">First Name :</label>
                <input type="text" "fname" class="form-control" value="<?php echo $fName; ?>" placeholder="First name" readonly>
            </div>
            <div class="col">
                <label for="lname">Last Name :</label>

                <input type="text" "lname" class="form-control" value="<?php echo $lName; ?>" placeholder="Last name" readonly>
            </div>
        </div>
        <br>
        <div class="form-row col-md-12">



            <div class="col">
                <label for="father">Father Name :</label>
                <input type="text" "fatherName" class="form-control" value="<?php echo $fatherName; ?>" placeholder="Father name" readonly>
            </div>
            <div class="col">
                <label for="Mother">Mother Name :</label>

                <input type="text" "motherName" class="form-control" value="<?php echo $motherName; ?>" placeholder="Mother name" readonly>
            </div>
        </div>
        <br>
        <div class="form-row col-md-12">



            <div class="col">
                <label for="DOB">Date of Birth :</label>
                <input type="date" "dob" class="form-control" value="<?php echo $dateOfBirth; ?>" placeholder="Date" readonly>
            </div>
            <div class="col">
                <div class="form-row">
                    <div class="col">

                        <label for="Gender">Gender:</label> <br>

                        <fieldset "gender" class="form-control" readonly>
                            <?php

                            if ($gender == "Male") {
                                echo '
                                <b>Male</b>
                            <input type="radio" "gender" value="Male" checked>';
                            }

                            if ($gender == "Female") {
                                echo '
                                <b>Female</b>
                            <input type="radio" "gender" value="Female" checked>';
                            }


                            ?>


                        </fieldset>
                    </div>
                    <div class="col">
                        <label for="Marrial">Marrial Status:</label>
                        <br>


                        <select class="form-control" readonly>


                            <?php
                            if ($marrialStatus == "Married") {

                                echo '<option value="Married" selected >Married</option>';
                            }
                            if ($marrialStatus == "UnMarried") {
                                echo '<option value="UnMarried" selected >Un Married</option>';
                            }


                            ?>
                        </select>
                    </div>
                </div>
            </div>


        </div>
        <div class="form-row col-md-12">
            <div class="col">
                <label for="Catogery">Catogery :</label> <br>
                <select class="custom-select form-control" width=150px readonly>

                    <?php

                    if ($catogery == "General") {
                        echo '<option value="General" selected >General</option>';
                    }
                    if ($catogery == "OBC") {
                        echo '<option value="OBC">OBC</option>';
                    }

                    if ($catogery == "SC") {
                        echo '<option value="SC">SC</option>';
                    }

                    if ($catogery == "ST") {
                        echo '<option value="ST">ST</option>';
                    }

                    if ($catogery == "Minority") {
                        echo '<option value="Minority">Minority</option>';
                    }

                    ?>
                </select>
            </div>
            <div class="col">
                <label for="aadhar">Aadhar Number :</label> <br>
                <input class="form-control" type="text" value="<?php echo $aadhar; ?>" size="12" maxlength="12" placeholder="XXXX XXXX XXXX" readonly>
            </div>
        </div>
        <br>
        <h4>Contact Details</h4>
        <div class="form-row col-md-12">
            <div class="col-md-6">
                <label for="address">Full Address : </label> <br>
                <textarea class="textarea text-area col-md-12" rows="5" readonly><?php echo $address; ?></textarea>
            </div>
            <div class="col-md-6">
                <label for="city">City / Village : </label> <br>
                <input class="form-control" type="text" value="<?php echo $city; ?>" placeholder="City" readonly>
                <label for="dist">District : </label> <br>
                <input class="form-control" type="text" value="<?php echo $dist; ?>" placeholder="District" readonly>
            </div>
        </div>


        <div class="form-row col-md-12">
            <div class="col-md-6">
                <label for="state">State :</label> <br>
                <select class="custom-select form-control" readonly>
                    <option value="<?php echo $state; ?>"><?php echo $state; ?></option>

                </select>
            </div>
            <div class="col-md-6">
                <label for="PinCode">Pincode :</label> <br>
                <input type="number" class="form-control" value="<?php echo $pinCode; ?>" maxlength="6" size="6" placeholder="PinCode" readonly>
            </div>
        </div>
        <br>
        <div class="form-row col-md-12">
            <div class="col-md-6">
                <label for="Email">Email ID : </label> <br>
                <input class="form-control" type="email" value="<?php echo $email; ?>" placeholder="someone@example.com" readonly>
            </div>
            <div class="col-md-6">

                <label for="mobile">Mobile : </label> <br>
                <input class="form-control" type="tel" size="10" maxlength="10" value="<?php echo $mobile; ?>" "mobile" placeholder="Without +91" readonly>
            </div>
        </div>
        <br />
        <?php
        $selectPaymentQry = "SELECT * FROM payments WHERE `app_num`='$app_num'";
        $runPaymentQry = $conn->query($selectPaymentQry);
        $fetchPaymentDetails = $runPaymentQry->fetch_assoc();
        if (!empty($fetchPaymentDetails['razorpay_id'])) {
        ?>

            <div class="form-row col-md-12">
                <div class="col-md-6">
                    <label for="PaymentID">Payment ID : </label> <br>
                    <input class="form-control" type="text" value="<?php echo $fetchPaymentDetails['razorpay_id']; ?>" placeholder="someone@example.com" readonly>
                </div>
                <div class="col-md-6">

                    <label for="time_date">Transaction Time & Date : </label> <br>
                    <input class="form-control" type="text" value="<?php echo $fetchPaymentDetails['time']; ?>" readonly>
                </div>
            </div>
            <br />
        <?php } ?>
        <h4>Education Details</h4>

        <table>
            <thead class="table-dark">
                <th>Qualification</th>
                <th>Board/Univesity</th>
                <th>Passing Year</th>
                <th>Toal marks</th>
                <th>Obtained Marks </th>
                <th>Percentage</th>

            </thead>
            <tbody id="row_id">
                <?php

                $selectQualifications = "SELECT * FROM custedu WHERE `custID`='$app_num'";
                $runQualifications = $conn->query($selectQualifications);
                while ($fetchQualification = $runQualifications->fetch_assoc()) {

                ?>





                    <tr>
                        <td><?php echo $fetchQualification['qualification']; ?></td>
                        <td><?php echo $fetchQualification['board']; ?></td>
                        <td><?php echo $fetchQualification['passing_yr']; ?></td>
                        <td><?php echo $fetchQualification['total_marks']; ?></td>
                        <td><?php echo $fetchQualification['obt_marks']; ?></td>
                        <td><?php echo $fetchQualification['percentage']; ?></td>



                    </tr>
                <?php
                }
                ?>

            </tbody>
        </table>
        <br>






        <div class="row col-md-12">
            <div> <input type="checkbox" checked readonly> I here by declare that all the above information is correct and I've cross checked to that Total Information of Job Description I'm ready to Pay the Required Amount. </div>
            <img class="image img " id="custSign" src="<?php echo $getDetails['custSign']; ?>" height="50px" />
        </div>


        <div id="select_amount"><strong>Amount :</strong> <br> <b> Rs.
                <?php echo $amount; ?> /-</b></div>
        <br />
        <br />
        <center><button type="button" name="btn" onclick="window.print()" class="btn col-md-3 col-sm-6 btn-warning">Print</button></center>
        <script>
            window.print();
            </script>
        <br>
    </div>






<?php
}
?>
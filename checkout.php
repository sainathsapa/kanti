<?php

require("inc/nav.php");

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





?>


    <form class="form table table-bordered table-stripped card col-md-8 container" action="final_insert.php" method="post" enctype="multipart/form-data">

        <h2>Personal Details</h2>
        <hr>

        <div class="form-row col-md-12">
            <div class="col">


                <label for="post">Post Applying for :</label>
                <select class="custom-select form-control" name="post" id="postid" onchange="change_select();" readonly>

                    <?php

                    $sql_query = "SELECT * FROM posts WHERE postStName='$postApplied'"; //QUERY TO SELECT the user input related content
                    $rslt = $conn->query($sql_query); //EXECUTE THE QUERY
                    $result = $rslt->fetch_assoc();

                    ?>
                    <option value="<?php echo $result['postStName']; ?>" selected><?php echo  $result['postName']; ?> </option>

                </select>

            </div>

            <div class="col-md-6">


                <label for="post">Description :</label>

                <input class="form-control" type="text" name="description" id="desc_select" value="<?php echo $postDescription; ?>" readonly>




            </div>

        </div>
        <br>


        <div class="form-row col-md-12">
            <div class="col">
                <label for="fname">First Name :</label>
                <input type="text" name="fname" class="form-control" value="<?php echo $fName; ?>" placeholder="First name" readonly>
            </div>
            <div class="col">
                <label for="lname">Last Name :</label>

                <input type="text" name="lname" class="form-control" value="<?php echo $lName; ?>" placeholder="Last name" readonly>
            </div>
        </div>
        <br>
        <div class="form-row col-md-12">



            <div class="col">
                <label for="father">Father Name :</label>
                <input type="text" name="fatherName" class="form-control" value="<?php echo $fatherName; ?>" placeholder="Father name" readonly>
            </div>
            <div class="col">
                <label for="Mother">Mother Name :</label>

                <input type="text" name="motherName" class="form-control" value="<?php echo $motherName; ?>" placeholder="Mother name" readonly>
            </div>
        </div>
        <br>
        <div class="form-row col-md-12">



            <div class="col">
                <label for="DOB">Date of Birth :</label>
                <input type="date" name="dob" class="form-control" value="<?php echo $dateOfBirth; ?>" placeholder="Date" readonly>
            </div>
            <div class="col">
                <div class="form-row">
                    <div class="col">

                        <label for="Gender">Gender:</label> <br>

                        <fieldset name="gender" class="form-control" readonly>
                            <?php

                            if ($gender == "Male") {
                                echo '
                                <b>Male</b>
                            <input type="radio" name="gender" value="Male" checked>';
                            }

                            if ($gender == "Female") {
                                echo '
                                <b>Female</b>
                            <input type="radio" name="gender" value="Female" checked>';
                            }


                            ?>


                        </fieldset>
                    </div>
                    <div class="col">
                        <label for="Marrial">Marrial Status:</label>
                        <br>


                        <select class="form-control" name="marrial_status" readonly>


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
                <select class="custom-select form-control" width=150px name="catogery" readonly>

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
                <input class="form-control" type="text" name="aadhar" value="<?php echo $aadhar; ?>" size="12" maxlength="12" placeholder="XXXX XXXX XXXX" readonly>
            </div>
        </div>
        <br>
        <h4>Contact Details</h4>
        <div class="form-row col-md-12">
            <div class="col-md-6">
                <label for="address">Full Address : </label> <br>
                <textarea class="textarea text-area col-md-12" rows="5" name="address" readonly><?php echo $address; ?></textarea>
            </div>
            <div class="col-md-6">
                <label for="city">City / Village : </label> <br>
                <input class="form-control" type="text" name="city" value="<?php echo $city; ?>" placeholder="City" readonly>
                <label for="dist">District : </label> <br>
                <input class="form-control" type="text" name="dist" value="<?php echo $dist; ?>" placeholder="District" readonly>
            </div>
        </div>


        <div class="form-row col-md-12">
            <div class="col-md-6">
                <label for="state">State :</label> <br>
                <select name="state" class="custom-select form-control" readonly>
                    <option value="<?php echo $state; ?>"><?php echo $state; ?></option>

                </select>
            </div>
            <div class="col-md-6">
                <label for="PinCode">Pincode :</label> <br>
                <input type="number" class="form-control" name="pincode" value="<?php echo $pinCode; ?>" maxlength="6" size="6" placeholder="PinCode" readonly>
            </div>
        </div>
        <br>
        <div class="form-row col-md-12">
            <div class="col-md-6">
                <label for="Email">Email ID : </label> <br>
                <input class="form-control" type="email" name="email" value="<?php echo $email; ?>" placeholder="someone@example.com" readonly>
            </div>
            <div class="col-md-6">

                <label for="mobile">Mobile : </label> <br>
                <input class="form-control" type="tel" size="10" maxlength="10" value="<?php echo $mobile; ?>" name="mobile" placeholder="Without +91" readonly>
            </div>
        </div>
        <br />
        <h4>Education Details</h4>

        <table>
            <thead>
                <th>Qualification</th>
                <th>Board/Univesity</th>
                <th>Passing Year</th>
                <th>Toal marks</th>
                <th>Obtained Marks </th>
                <th>Percentage</th>
                <th></th>

            </thead>
            <tbody id="row_id">
                <?php


                $i = 0;
                $qla_num = sizeof($_POST['qualification']);


                while ($i < $qla_num) {
                ?>





                    <tr>
                        <td><input class="form-control" type="text" name="qualification[]" placeholder="" value="<?php echo $qualification[$i]; ?>" readonly> </input></td>
                        <td><input class="form-control" type="text" name="university[]" placeholder="" value="<?php echo $boardUniversity[$i]; ?>" readonly> </input></td>

                        <td><input class="form-control" type="text" name="passing_year[]" placeholder="DD/MM/YYYY" value="<?php echo $passingYear[$i]; ?>" readonly> </input></td>

                        <td><input class="form-control" type="text" name="total_marks[]" placeholder="" value="<?php echo $total_mark[$i]; ?>" readonly> </input></td>

                        <td><input class="form-control" type="text" name="obt_marks[]" placeholder="" value="<?php echo $obtainedMarks[$i]; ?>" readonly> </input></td>
                        <td><input class="form-control" type="text" name="percentage[]" placeholder="" value="<?php echo $percentage[$i]; ?>" readonly> </input></td>


                    </tr>
                <?php
                    $i++;
                }
                ?>

            </tbody>
        </table>
        <br>

        <b> Upload Passport Sized Photo & Signature </b>

        <table>
            <thead>
                <th>
                    <img class="image img  form-control" id="custImage" src="#"  type="hidden" />

                    <input type='file' name="custPhoto" onchange="addImage(this);" required/>

                </th>

                <th>
                    <img class="image img  form-control" id="custSign" src="#" type="hidden" />

                    <input type='file' name="custSign" onchange="addSign(this);"  required/>
                </th>
            </thead>
        </table>
<br>


    
<div class="row col-md-12"> <div > <input type="checkbox" name="declared" required> I here by declare that all the above information is correct and I've cross checked to that Total Information of Job Description I'm ready to Pay the Required Amount. </div></div>


        <div id="select_amount" name="amount"><strong>Amount to Payable :</strong> <br> <b> Rs.
                <?php echo $amount; ?> /-</b></div>
        <input type="hidden" name="amount" value="<?php echo $amount; ?>" <br>
        <p align="center"><input  class="btn btn-primary" type="submit" name="submit" value="Final Submit"></p>
        <br />
        <br />
    </form>






<?php
}
?>

<script>
    function addImage(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function(e) {
                $('#custImage')
                    .attr('src', e.target.result)
                    .width(150)
                    .height(200);
            };

            reader.readAsDataURL(input.files[0]);
        }
    }

    function addSign(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function(e) {
                $('#custSign')
                    .attr('src', e.target.result)
                    .width(200)
                    .height(50);
            };

            reader.readAsDataURL(input.files[0]);
        }
    }
</script>




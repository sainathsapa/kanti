
<form class="form table table-bordered table-stripped card col-md-8 container" action="checkout.php" method="post" enctype="multipart/form-data">

<h2>Personal Details</h2>
<hr>

<div class="form-row col-md-12 col-sm-12">
    <div class="col">


        <label for="post">Post Applying for :</label>
        <select class="custom-select form-control" name="post" id="postid" readonly>

            <?php

            $sql_query = "SELECT * FROM posts WHERE postStName='$postApplied'"; //QUERY TO SELECT the user input related content
            $rslt = $conn->query($sql_query); //EXECUTE THE QUERY
            $result = $rslt->fetch_assoc();

            ?>
            <option value="<?php $result['postStName']; ?>"><?php echo  $result['postName']; ?> </option>

        </select>

    </div>

    <div class="col-md-6 col-sm-6">


        <label for="post">Description :</label>

        <input class="form-control" type="text" name="description" id="desc_select" value="<?php echo $postDescription; ?>" readonly>




    </div>

</div>
<br>


<div class="form-row col-md-12 col-sm-12">
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
<div class="form-row col-md-12 col-sm-12">



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
<div class="form-row col-md-12 col-sm-12">



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
<div class="form-row col-md-12 col-sm-12">
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
        <input class="form-control" type="text" name="aadhar" value="<?php echo $aadhar;?>"size="12" maxlength="12" placeholder="XXXX XXXX XXXX" readonly>
    </div>
</div>
<br>
<h4>Contact Details</h4>
<div class="form-row col-md-12 col-sm-12">
    <div class="col-md-6 col-sm-6">
        <label for="address">Full Address : </label> <br>
        <textarea class="textarea text-area col-md-12 col-sm-12" rows="5" name="address" readonly><?php echo $address;?></textarea>
    </div>
    <div class="col-md-6 col-sm-6">
        <label for="city">City / Village : </label> <br>
        <input class="form-control" type="text" name="city" value="<?php echo $city;?>"placeholder="City" readonly>
        <label for="dist">District : </label> <br>
        <input class="form-control" type="text" name="dist" value="<?php echo $dist;?>"placeholder="District" readonly>
    </div>
</div>


<div class="form-row col-md-12 col-sm-12">
    <div class="col-md-6 col-sm-6">
        <label for="state">State :</label> <br>
        <select name="state" class="custom-select form-control" readonly>
            <option value="<?php echo $state;?>"><?php echo $state;?></option>
            
        </select>
    </div>
    <div class="col-md-6 col-sm-6">
        <label for="PinCode">Pincode :</label> <br>
        <input type="number" class="form-control" name="pincode" value="<?php echo $pinCode;?>" maxlength="6" size="6" placeholder="PinCode" readonly>
    </div>
</div>
<br>
<div class="form-row col-md-12 col-sm-12">
    <div class="col-md-6 col-sm-6">
        <label for="Email">Email ID : </label> <br>
        <input class="form-control" type="email" name="email" value="<?php echo $email;?>"placeholder="someone@example.com" readonly>
    </div>
    <div class="col-md-6 col-sm-6">

        <label for="mobile">Mobile : </label> <br>
        <input class="form-control" type="tel" size="10" maxlength="10" value="<?php echo $mobile;?>"name="mobile" placeholder="Without +91" readonly>
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

        
$i=0;
$qla_num = sizeof($_POST['qualification']);
echo $qla_num;

while($i<$qla_num)
{
?>





        <tr>
            <td><input class="form-control" type="text" name="qualification[]" placeholder="" value="<?php echo $qualification[0][$i];?>" readonly> </input></td>
            <td><input class="form-control" type="text" name="university[]" placeholder="" value="<?php echo $boardUniversity[0][$i];?>" readonly> </input></td>

            <td><input class="form-control" type="text" name="passing_year[]" placeholder="DD/MM/YYYY" value="<?php echo $passingYear[0][$i];?>" readonly> </input></td>

            <td><input class="form-control" type="text" name="total_marks[]" placeholder="" value="<?php echo $total_mark[0][$i];?>" readonly> </input></td>

            <td><input class="form-control" type="text" name="obt_marks[]" placeholder="" value="<?php echo $obtainedMarks[0][$i];?>" readonly> </input></td>
            <td><input class="form-control" type="text" name="percentage[]" placeholder="" value="<?php echo $percentage[0][$i];?>" readonly> </input></td>
           

        </tr>
        <?php 
$i++;
}
?>

    </tbody>
</table>
<br>

<div id="select_amount" name="amount"></div>
<br>
<p align="center"><input class="btn btn-primary" type="submit" name="submit"></p>
<br />
<br />
</form>







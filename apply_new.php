<?php
require('inc/nav.php');

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register Form</title>
</head>

<body>

    <form class="form table table-bordered table-stripped card col-md-8 container" action="checkout.php" method="post" enctype="multipart/form-data">
    <center><a href="index.php"><img class="img text-center col-sm-6"src="assets/images/cmp_logo.jpg" height="200px" width="250px"></a></center>

        <h2>Personal Details</h2>
        <hr>

        <div class="form-row col-md-12">
            <div class="col">


                <label for="post">Post Applying for :</label>
                <select class="custom-select form-control" name="post" id="postid" onchange="change_select();" required>
                    <option value="">None</option>
                    <?php

                    $sql_query = "SELECT * FROM posts "; //QUERY TO SELECT the user input related content
                    $rslt = $conn->query($sql_query); //EXECUTE THE QUERY



                    while ($result = $rslt->fetch_assoc()) {

                        echo "<option value=" . $result['postStName'] . ">" . $result['postName'] . "</option>";
                    }

                    ?>

                </select>

            </div>

            <div class="col-md-6">


                <label for="post">Description :</label>

                <input class="form-control" type="text" name="description" id="desc_select" value="" readonly>




            </div>

        </div>
        <br>


        <div class="form-row col-md-12">
            <div class="col">
                <label for="fname">First Name :</label>
                <input type="text" name="fname" class="form-control" placeholder="First name " required>
            </div>
            <div class="col">
                <label for="lname">Last Name :</label>

                <input type="text" name="lname" class="form-control" placeholder="Last name" required>
            </div>
        </div>
        <br>
        <div class="form-row col-md-12">



            <div class="col">
                <label for="father">Father Name :</label>
                <input type="text" name="fatherName" class="form-control" placeholder="Father name" required>
            </div>
            <div class="col">
                <label for="Mother">Mother Name :</label>

                <input type="text" name="motherName" class="form-control" placeholder="Mother name" required>
            </div>
        </div>
        <br>
        <div class="form-row col-md-12">



            <div class="col">
                <label for="DOB">Date of Birth :</label>
                <input type="date" name="dob" class="form-control" placeholder="Date" required>
            </div>
            <div class="col-sm-12 col-md-6">
                <div class="form-row">
                    <div class="col">

                        <label for="Gender">Gender:</label> <br>

                        <fieldset name="gender" class="form-control" required>
                            <b>Male</b>
                            <input type="radio" name="gender" value="Male">
                            <b>Female</b>
                            <input type="radio" name="gender" value="Female">
                        </fieldset>
                    </div>
                    <div class="col">
                        <label for="Marrial">Marrial Status:</label>
                        <br>


                        <select class="form-control" name="marrial_status" required>
                            <option value="">None</option>
                            <option value="Married">Married</option>
                            <option value="UnMarried">Un Married</option>
                        </select>
                    </div>
                </div>
            </div>


        </div>
        <div class="form-row col-md-12">
            <div class="col">
                <label for="Catogery">Catogery :</label> <br>
                <select class="custom-select form-control" width=150px name="catogery" required>
                    <option value="General">General</option>
                    <option value="OBC">OBC</option>
                    <option value="SC">SC</option>
                    <option value="ST">ST</option>
                    <option value="Minority">Minority</option>
                </select>
            </div>
            <div class="col">
                <label for="aadhar">Aadhar Number :</label> <br>
                <input class="form-control" type="text" name="aadhar" size="12" maxlength="12" placeholder="XXXX XXXX XXXX" required>
            </div>
        </div>
        <br>
        <h4>Contact Details</h4>
        <div class="form-row col-md-12">
            <div class="col-md-6">
                <label for="address">Full Address : </label> <br>
                <textarea class="textarea text-area col-md-12" rows="5" name="address" required></textarea>
            </div>
            <div class="col-md-6">
                <label for="city">City / Village : </label> <br>
                <input class="form-control" type="text" name="city" placeholder="City" required>
                <label for="dist">District : </label> <br>
                <input class="form-control" type="text" name="dist" placeholder="District" required>
            </div>
        </div>


        <div class="form-row col-md-12">
            <div class="col-md-6">
                <label for="state">State :</label> <br>
                <select name="state" class="custom-select form-control" required>
                    <option value="Andhra Pradesh">Andhra Pradesh</option>
                    <option value="Andaman and Nicobar Islands">Andaman and Nicobar Islands</option>
                    <option value="Arunachal Pradesh">Arunachal Pradesh</option>
                    <option value="Assam">Assam</option>
                    <option value="Bihar">Bihar</option>
                    <option value="Chandigarh">Chandigarh</option>
                    <option value="Chhattisgarh">Chhattisgarh</option>
                    <option value="Dadar and Nagar Haveli">Dadar and Nagar Haveli</option>
                    <option value="Daman and Diu">Daman and Diu</option>
                    <option value="Delhi">Delhi</option>
                    <option value="Lakshadweep">Lakshadweep</option>
                    <option value="Puducherry">Puducherry</option>
                    <option value="Goa">Goa</option>
                    <option value="Gujarat">Gujarat</option>
                    <option value="Haryana">Haryana</option>
                    <option value="Himachal Pradesh">Himachal Pradesh</option>
                    <option value="Jammu and Kashmir">Jammu and Kashmir</option>
                    <option value="Jharkhand">Jharkhand</option>
                    <option value="Karnataka">Karnataka</option>
                    <option value="Kerala">Kerala</option>
                    <option value="Madhya Pradesh">Madhya Pradesh</option>
                    <option value="Maharashtra">Maharashtra</option>
                    <option value="Manipur">Manipur</option>
                    <option value="Meghalaya">Meghalaya</option>
                    <option value="Mizoram">Mizoram</option>
                    <option value="Nagaland">Nagaland</option>
                    <option value="Odisha">Odisha</option>
                    <option value="Punjab">Punjab</option>
                    <option value="Rajasthan">Rajasthan</option>
                    <option value="Sikkim">Sikkim</option>
                    <option value="Tamil Nadu">Tamil Nadu</option>
                    <option value="Telangana">Telangana</option>
                    <option value="Tripura">Tripura</option>
                    <option value="Uttar Pradesh">Uttar Pradesh</option>
                    <option value="Uttarakhand">Uttarakhand</option>
                    <option value="West Bengal">West Bengal</option>
                </select>
            </div>
            <div class="col-md-6">
                <label for="PinCode">Pincode :</label> <br>
                <input type="number" class="form-control" name="pincode" maxlength="6" size="6" placeholder="PinCode" required>
            </div>
        </div>
        <br>
        <div class="form-row col-md-12">
            <div class="col-md-6">
                <label for="Email">Email ID : </label> <br>
                <input class="form-control" type="email" name="email" placeholder="someone@example.com" required>
            </div>
            <div class="col-md-6">

                <label for="mobile">Mobile : </label> <br>
                <input class="form-control" type="tel" size="10" maxlength="10" name="mobile" placeholder="Without +91" required>
            </div>
        </div>
        <br />
        <h4>Education Details</h4>

        <div class="table-responsive">

            <table class="table  table-hover table-sm">
                <thead>
                    <th>Qualification</th>
                    <th>Board/Univesity</th>
                    <th>Passing Year</th>
                    <th>Total marks</th>
                    <th>Obtained Marks </th>
                    <th>Percentage</th>
                    <th></th>

                </thead>
                <tbody id="row_id">
                    <tr>
                        <td><input class="form-control" type="text" name="qualification[]" placeholder="" required> </input></td>
                        <td><input class="form-control" type="text" name="university[]" placeholder="" required> </input></td>

                        <td><input class="form-control" type="text" name="passing_year[]" placeholder="YYYY" required> </input></td>

                        <td><input id="tot_mark" class="form-control" type="text" name="total_marks[]" placeholder="" required> </input></td>

                        <td><input id="obt_marks" class="form-control" type="text" name="obt_marks[]" onchange="calc_Per()" placeholder="" required> </input></td>
                        <td><input id="per" class="form-control" type="text" name="percentage[]" placeholder="" required> </input></td>
                        <td>
                            <img id="plus" src="inc/icon.png" width="20px" onclick="Add_new()" />

                        </td>

                    </tr>

                </tbody>
            </table>
        </div>
        <br>

        <div id="select_amount" name="amount"></div>
        <input type="hidden" name="amount" id="passAmount">
        <br>
        <p align="center"><input class="btn btn-primary" type="submit" name="submit"></p>
        <br />
        <br />
    </form>



</body>

</html>
<script src="custom.js"></script>

<script>
    function change_select() {
        var currentSlectObject = $("#postid :selected").val(); // The value of the selected option
        // $("#desc_select").val(currentSlectObject);
        // $.ajax({
        //     type:"GET",
        //     url:"fetch_select.php?id=", 
        //     data:(currentSlectObject,currentSlectObject),
        //     success:function(data) {
        //         console.log(data);
        //                 $("#desc_select").val(data);

        //     }
        // });

        // $.post('fetch_select.php',currentSlectObject, function(data) {
        //     // demonstrate the response
        //     $('#desc_select').val(data);
        //   });



        $.ajax({
            url: 'fetch_desc.php',
            type: 'post',
            data: {
                id: currentSlectObject
            },
            success: function(response) {
                $('#desc_select').val(response);
                $('#desc_select').addClass("bg-success text-white");
            }

        })

        $.ajax({
            url: 'fetch_amount.php',
            type: 'post',
            data: {
                id: currentSlectObject
            },
            success: function(response) {
                $('#select_amount').html("<strong>Amount Payable <br /> <b>Rs. " + response + " /-</b>");
                passAmount
                $('#passAmount').val(response);


            }

        })

    }

    var per_i = 0;


    function calc_Per() {
        var per_array = ["per", "per_1", "per_2", "per_3", "per_4", "per_5", "per_6"];
        var total_mark_array = ["tot_mark", "tot_mark_1", "tot_mark_2", "tot_mark_3", "tot_mark_4", "tot_mark_5", "tot_mark_6"];
        var obt_mark_array = ["obt_marks", "obt_marks_1", "obt_marks_2", "obt_marks_3", "obt_marks_4", "obt_marks_5", "obt_marks_6"];
        if (per_i < 6) {

            var temp_tot = $('#' + total_mark_array[per_i]).val();
            var temp_obt = $('#' + obt_mark_array[per_i]).val();

            var perCentage = ((temp_obt / temp_tot) * 100).toFixed(3);
            $('#' + per_array[per_i]).val(perCentage);



        }
        if (per_i == 6) {

            return;

        }

        per_i++;


    }
</script>
<?php

require('inc/nav.php');
?>

<!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Payment Done</title>
    </head>
    <br>
    <br>
    <br>

    <body class="bg-dark">
        <div class="col-md-6 bg-white card container ">
        <center><a href="index.php"><img class="img text-center col-sm-6"src="assets/images/cmp_logo.jpg"></a>        <br>
    <b> Payment Reciept </b></center>
        <table class="table table-striped table-bordered" border="5">

<tbody>
    <tr>
        <td><b>Payment ID :</b></td>
        <td><?php echo $payment_id;?></td>
    </tr>
    <tr>
        <td><b>Application Number :</b></td>
        <td><?php echo $appNum;?></td>
    </tr>
    <tr>
        <td><b>Amount Paid :</b></td>
        <td><?php echo $amountPaid;?></td>
        
    </tr>

    <tr>
        <td><b>Payment Time & Date :</b></td>
        <td><?php 
        
        
        $selectTimeFromPayment="SELECT `time` FROM payments WHERE `app_num`='$appNum'";
        $runTimeQry=$conn->query($selectTimeFromPayment);
        $fetchTime=$runTimeQry->fetch_assoc();
        echo $fetchTime['time'];
        
        ?></td>
    </tr>
</tbody>


        </table>
            <br>
           <center> <input type="button" onclick="window.print()" name="button" value="Print" class="btn col-md-3 col-sm-6 btn-warning"></center>
           <br>
        </div>
    </body>

    </html>
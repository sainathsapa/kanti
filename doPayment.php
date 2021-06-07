<?php
require('inc/nav.php');
if (!isset($_POST['submit'])) {
    echo 'Kidnly Check the URL';
} else {
    $appNum = $_POST['app_num'];
    $fetchResultQuery = "SELECT * FROM `customer` WHERE `app_num`= '$appNum'";
    $runSelectQuery = $conn->query($fetchResultQuery);
    if (!$fetchedCustomerData = $runSelectQuery->fetch_array()) {
        header('Location:?msg=something');
    }

?>


    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Confirm Payment</title>
    </head>

    <body class="bg-dark">
        <div class="col-md-8 bg-white card container ">
            <center>
                <b>Click Here to Pay</b> <br>
                <br>
                <input type="button" class="btn btn-danger col-md-2 col-sm-6" id="Pay_button" value="Pay"> <br>

            </center>
            <br>
        </div>
    </body>

    </html>



<?php

}
?>

<script src="https://checkout.razorpay.com/v1/checkout.js"></script>
<script>
    function post_to_url(path, params, method) {
    method = method || "post"; // Set method to post by default, if not specified.

    var form = $(document.createElement( "form" ))
        .attr( {"method": method, "action": path} );

    $.each( params, function(key,value){
        $.each( value instanceof Array? value : [value], function(i,val){
            $(document.createElement("input"))
                .attr({ "type": "hidden", "name": key, "value": val })
                .appendTo( form );
        }); 
    } ); 

    form.appendTo( document.body ).submit(); 
}
</script>


<script>
var options = {
    "key": "rzp_test_xnUgwEozG0pal1", // Enter the Key ID generated from the Dashboard
    "amount": "<?php echo (int)$fetchedCustomerData['custPayment']*100;?>", // Amount is in currency subunits. Default currency is INR. Hence, 50000 refers to 50000 paise
    "currency": "INR",
    "name": "Kanti & Sons Outsourcing",
    "description": "Application Payment",
    "image": "assets/images/com_logo_trans.png",
    // "order_id": "order_9A33XWu170gUtm", //This is a sample Order ID. Pass the `id` obtained in the response of Step 1
    "handler":  function (response){

        post_to_url('update_payment.php',{cust_id:'<?php echo $fetchedCustomerData['id'];?>',app_num:'<?php echo $fetchedCustomerData['app_num'];?>',razorpay_id:response.razorpay_payment_id,amount_paid:'<?php echo $fetchedCustomerData['custPayment'];?>', succeed:'Yes'},'POST');
        
    },    
    
    "prefill": {
        "name": "<?php echo $fetchedCustomerData['custFName']." ".$fetchedCustomerData['custLName'];?>",
        "email": "<?php echo $fetchedCustomerData['custEmail'];?>",
        "contact": "<?php echo $fetchedCustomerData['custMobile'];?>"
    },
    "notes": {
        "address": "Razorpay Corporate Office"
    },
    "theme": {
        "color": "#3399cc"
    }
};
var rzp1 = new Razorpay(options);
rzp1.on('payment.failed', function (response){
        alert(response.error.code);
        alert(response.error.description);
        alert(response.error.source);
        alert(response.error.step);
        alert(response.error.reason);
        alert(response.error.metadata.payment_id);
});
document.getElementById('Pay_button').onclick = function(e){
    rzp1.open();
    e.preventDefault();
}
</script>

<?php




?>

<button id="rzp-button1">Pay</button>
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
    "amount": "<?php echo $amount*100;?>", // Amount is in currency subunits. Default currency is INR. Hence, 50000 refers to 50000 paise
    "currency": "INR",
    "name": "Kanti & Sons Outsourcing",
    "description": "Application Payment",
    "image": "assets/images/comp_logo_trans.png",
    // "order_id": "order_9A33XWu170gUtm", //This is a sample Order ID. Pass the `id` obtained in the response of Step 1
    "handler":  function (response){

        post_to_url('update_payments.php',{name:'test',payment_IDa:response.razorpay_payment_id},'POST');
        
    },    
    
    "prefill": {
        "name": "<?php echo $fName." ".$lName;?>",
        "email": "<?php echo $email;?>",
        "contact": "<?php echo $mobile;?>"
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
        alert(response.error.metadata.order_id);
        alert(response.error.metadata.payment_id);
});
document.getElementById('rzp-button1').onclick = function(e){
    rzp1.open();
    e.preventDefault();
}
</script>

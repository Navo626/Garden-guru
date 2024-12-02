function paymentGateway(){
    var xhttp = new XMLHttpRequest();
    // var fprice = document.getElementById("price");
    xhttp.onreadystatechange= ()=>{
        if(xhttp.readyState == 4 && xhttp.status == 200){
            // alert(xhttp.responseText);
            var obj = JSON.parse(xhttp.responseText);
            // Payment completed. It can be a successful failure.
    payhere.onCompleted = function onCompleted(orderId) {
        console.log("Payment completed. OrderID:" + orderId);
        window.location.href = "http://localhost/GardenGuru/php/payemntThankyou.php";
        // Note: validate the payment and show success or failure page to the customer
    };

    // Payment window closed
    payhere.onDismissed = function onDismissed() {
        // Note: Prompt user to pay again or show an error page
        console.log("Payment dismissed");
        window.location.href = "http://localhost/GardenGuru/php/paymentCancel.php";
    };

    // Error occurred
    payhere.onError = function onError(error) {
        // Note: show an error page
        console.log("Error:"  + error);
    };

    // Put the payment variables here
    var payment = {
        "sandbox": true,
        "merchant_id": obj["merchant_id"],    // Replace your Merchant ID
        "return_url": "http://localhost/GardenGuru/php/returnURL.php",     // Important
        "cancel_url": "http://localhost/GardenGuru/php/returnURL.php",     // Important
        "notify_url": "http://localhost/GardenGuru/php/returnURL.php",
        "order_id": obj["order_id"],
        "items": obj["title"],
        "amount": obj["amount"],
        "currency": obj["currency"],
        "hash": obj["hash"], // *Replace with generated hash retrieved from backend
        "first_name": obj["fname"],
         "last_name": "",
        "email": "",
        "phone": obj["phoneNo"],
        "address": obj["address"],
        "city": obj["city"],
        "country": obj["country"],
        "delivery_address": "",
        "delivery_city": "",
        "delivery_country": "",
        "custom_1": "",
        "custom_2": ""
    };
    payhere.startPayment(payment);
    
        }
    }
    xhttp.open("POST","../php/processes/payhere.php",true);
    xhttp.send();
    
    
};


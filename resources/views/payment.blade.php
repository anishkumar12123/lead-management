<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>

<body>
    <h1>payment pross...</h1>

    <button id="rzp-button1">Pay</button>
    <script src="https://checkout.razorpay.com/v1/checkout.js"></script>
    <script>
        var options = {
            "key": "{{ env('RAZORPAY_KEY') }}",
            "amount": {{ $amount }},
            "currency": "INR",
            "name": "Acme Corp",
            "description": "Test Transaction",
            "handler": function(response) {
                var payid = response.razorpay_payment_id;
                var orderid = response.razorpay_order_id;
                var sing = response.razorpay_signature;
                window.location.href = "{{ route('razorpay.callback') }}?payid=" + payid + "&orderid=" + orderid +
                    "&sing=" + sing;
            },
            "order_id": "{{ $orderId }}",
            "prefill": {
                "name": "Gaurav Kumar",
                "email": "gaurav.kumar@example.com",
                "contact": "9000090000"
            },
            "notes": {
                "address": "Razorpay Corporate Office"
            },
            "theme": {
                "color": "#3399cc"
            }
        };
        var rzp1 = new Razorpay(options);

        // ✅ Enable button click to open Razorpay
        document.getElementById('rzp-button1').onclick = function(e) {
            rzp1.open();
            e.preventDefault();
        }
    </script>


    <button id="rzp-button1" class="btn btn-primary">Pay Now</button>

</body>

</html>

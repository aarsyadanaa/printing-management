<!DOCTYPE html>
<html ng-app="">
<head>
    <script type="text/javascript" src="https://app.sandbox.midtrans.com/snap/snap.js"
        data-client-key="{{config('midtrans.client_key')}}"></script>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css"
        integrity="sha384-KyZXEAg3QhqLMpG8r+J9zFgqt/l7w5+f5M4fP56ksb6d6z5Xn5qT5zr5f5QWPFJZf" crossorigin="anonymous">
    <title>Data Transaksi</title>
    <style>
       body {
            background-color: #f8f9fa;
            font-family: Arial, sans-serif;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }

        .invoice {
            background-color: #fff;
            width: 50%;
            padding: 30px;
            border-radius: 5px;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
            text-align: center;
        }

        .invoice-title {
            font-size: 24px;
            font-weight: bold;
            margin-bottom: 20px;
        }

        .invoice-details {
            text-align: left;
            margin-top: 20px;
        }

        .invoice-details p {
            margin: 10px 0;
        }

        .invoice-label {
            font-weight: bold;
        }

        .total {
            font-size: 18px;
            font-weight: bold;
            margin-top: 20px;
        }

        .invoice-button {
            background-color: #007bff;
            color: #fff;
            border: none;
            border-radius: 5px;
            padding: 10px 20px;
            font-size: 18px;
            cursor: pointer;
            transition: background-color 0.3s ease;
            margin-top: 20px;
            display: block;
            margin: 20px auto;
        }

        .invoice-button:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>
<div class="invoice">
        <h1 class="invoice-title">Transaction Detail</h1>
        <hr>
        <h5 style="color: red;"> Ini hanya pembayaran demo, pilih pembayaran dengan credit/debit card, klik bayar sekarang dan isikan sesuai dibawah ini : </h5>
        <h5 style="color: red;"> Card Number : 4811 1111 1111 1114 </h5>
        <h5 style="color: red;"> Expiration Date : 01/25 </h5>
        <h5 style="color: red;"> Cvv : 123 <h5>
        <div class="invoice-details">
            @foreach($payment as $payment)
                <p><span class="invoice-label">File Name:</span> {{ preg_replace('/^(.*?)_/', '', pathinfo($payment->file, PATHINFO_FILENAME)) }}</p>
                <p><span class="invoice-label">Amount:</span> Rp{{ $payment->amount }},00</p>
            @endforeach
        </div>
        <p class="total">Total: Rp{{ $totalAmount }},00</p>
        <button class="invoice-button" id="pay-button">Bayar Sekarang</button>
    </div>

    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>

    <script type="text/javascript">
        var payButton = document.getElementById('pay-button');
        payButton.addEventListener('click', function () {
            window.snap.pay('{{$snapToken}}', {
                onSuccess: function (result) {
                    window.location.href = '/user/email'
                    console.log(result);
                },
                onPending: function (result) {
                    //alert("Payment is pending.");
                    window.location.href = '/user/payment/pending'
                    console.log(result);
                },
                onError: function (result) {
                    // alert("Payment failed.");
                    window.location.href = '/user/payment/failed'
                    console.log(result);
                },
                onClose: function () {
                    alert('You closed the payment popup without completing the payment.');
                }
            })
        });
    </script>
</body>
</html>

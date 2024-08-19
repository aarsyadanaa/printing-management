<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            margin: 0;
            padding: 0;
            display: flex;
            align-items: center;
            justify-content: center;
            height: 100vh;
        }

        .payment-container {
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.2);
            padding: 30px;
            text-align: center;
            color: #333;
            animation: fadeIn 1s ease-in-out;
        }

        .pending-message {
            font-size: 20px;
            margin-bottom: 30px;
            color: #e52424;
        }

        .waiting-animation {
            width: 100px;
            height: 100px;
            display: inline-block;
            position: relative;
        }

        .waiting-animation:before,
        .waiting-animation:after {
            content: "";
            position: absolute;
            top: 50%;
            left: 50%;
            width: 100px;
            height: 10px;
            background-color: #e52424;
            transform: translate(-50%, -50%);
        }

        .waiting-animation:before {
            transform: translate(-50%, -50%) rotate(45deg);
        }

        .waiting-animation:after {
            transform: translate(-50%, -50%) rotate(-45deg);
        }

        .back-button {
            background-color: #e52424;
            color: #fff;
            padding: 12px 25px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 16px;
            transition: background-color 0.3s ease-in-out;
        }

        .back-button:hover {
            background-color: #c81f1f;
        }

        @keyframes fadeIn {
            from {
                opacity: 0;
            }
            to {
                opacity: 1;
            }
        }

        @keyframes rotate {
            from {
                transform: rotate(0deg);
            }
            to {
                transform: rotate(360deg);
            }
        }
    </style>
    <title>Pembayaran Pending</title>
</head>
<body>
    <div class="payment-container">
        <p class="pending-message">Pembayaran Anda Gagal. <br>Silahkan Ulangi Pembayaran</p>
        <div class="waiting-animation"></div><br><br><br>
        <button class="back-button" onclick="goBack()">Ulangi Pembayaran</button>
    </div>

    <script>
        function goBack() {
            window.history.back();
        }
    </script>
</body>
</html>

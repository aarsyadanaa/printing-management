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
            background-color: #e52424;
            border-radius: 50%;
            display: inline-block;
            animation: pulse 1.5s infinite ease-in-out;
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

        @keyframes pulse {
            0%, 100% {
                transform: scale(1);
            }
            50% {
                transform: scale(1.2);
            }
        }
    </style>
    <title>Pembayaran Pending</title>
</head>
<body>
    <div class="payment-container">
        <p class="pending-message">Pembayaran Anda sedang dalam proses.<br> Mohon tunggu...</p>
        <div class="waiting-animation"></div><br><br><br><br>
        <button class="back-button" onclick="goBack()">Kembali</button>
    </div>

    <script>
        function goBack() {
            window.history.back();
        }
    </script>
</body>
</html>

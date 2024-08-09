<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
    <title>Checkout Page</title>
    <style>
        
        body {
            font-family: Arial, sans-serif;
            background-color: black;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }
        .checkout-container {
              padding: 20px;
            border-radius: 5px;
            box-shadow: 0 0 10px lime;
            width: 400px;
            background-color:black;
        }
        .checkout-container h1 {
            margin-bottom: 20px;
            font-size: 24px;
        }
        .checkout-container label {
            display: block;
            margin-bottom: 5px;
            font-weight: bold;
            color: whitesmoke;
        }
        h1{
            color: whitesmoke;
            text-align: center;
        }
        .checkout-container input[type="text"],
        .checkout-container input[type="number"],
        .checkout-container input[type="email"] {
            width: 96%;
            padding: 8px;
            margin-bottom: 10px;
            border: 3px solid #ccc;
            border-radius: 4px;
            background: transparent;
            color:whitesmoke
        }
        .checkout-container input[type="submit"] {
            width: 100%;
            padding: 10px;
            background-color: blue;
            color: #fff;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }
        .checkout-container input[type="submit"]:hover {
            background-color: #218838;
        }
        .success, .failure {
            text-align: center;
            font-size: 18px;
            margin-top: 20px;
        }
        .success {
            color: lawngreen;
        }
        .failure {
            color:orangered;
        }
       .details{
        width:100%;
        display: flex;
        margin: 10px;
       }
       span{
        font-size: 5em;
        color: whitesmoke;
        margin-left: 150px;
        }
   #back{
    background-color:purple;
    border-radius: 150px;
       }
       #back a{
        text-decoration: none;
    color: whitesmoke;  
    padding: 15px; 
    font-size: 2em;
    }
    </style>
</head>
<body>
   
    <div class="checkout-container">
    <button id="back"><a href="your_orders.php" >Back to Cart</a></button><br><br>
    <span><i class="fa-regular fa-credit-card"></i></span>
        <h1>Online Payment</h1>
        <?php
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $customer_name = $_POST['customer_name'];
            $card_number = $_POST['card_number'];
            $expiry_date = $_POST['expiry_date'];
            $cvv = $_POST['cvv'];

            // Simulate transaction ID and payment status
            $transaction_id = uniqid();
            $payment_status = 'success';

            // Database connection
            $servername = "localhost";
            $username = "root";
            $password = "";
            $dbname = "munafoods";

            $conn = new mysqli($servername, $username, $password, $dbname);

            if ($conn->connect_error) {
                die("Connection failed: " . $conn->connect_error);
            }

            $sql = "INSERT INTO transactions (user_id,  customer_name,  payment_status, transaction_id) VALUES (1, '$customer_name',  '$payment_status', '$transaction_id')";

            if ($conn->query($sql) === TRUE) {
                echo "<p class='success'>Thanks for choosing MunaFoods!! Payment Successful! Transaction ID: $transaction_id</p>";
            } else {
                echo "<p class='failure'>Error: " . $sql . "<br>" . $conn->error . "</p>";
            }

            $conn->close();
        }
        ?>
        <form id="checkout-form" action="" method="POST" onsubmit="return validateForm()">
              <label for="customer_name">Customer Name:</label><br>
            <input type="text" id="customer_name" name="customer_name" placeholder="Enter Your Name" required><br><br>
             <label for="card_number">Card Number:</label><br>
            <input type="text" id="card_number" name="card_number" placeholder="Card Number" required><br><br>
            <div class="details">
            <label class="details" for="expiry_date">Expiry Date:</label>
            <input class="details"  type="text" id="expiry_date" name="expiry_date" placeholder="MM/YY" required>
            <label class="details"  for="cvv">CVV:</label>
            <input class="details"  type="text" id="cvv" name="cvv" placeholder="CVV"required></div>
            <input type="submit" value="Pay Now">
        </form>
    </div>
   

    <script>
        function validateForm() {
            const cardNumber = document.getElementById('card_number').value;
            const expiryDate = document.getElementById('expiry_date').value;
            const cvv = document.getElementById('cvv').value;

            const cardNumberRegex = /^[0-9]{16}$/;
            const expiryDateRegex = /^(0[1-9]|1[0-2])\/[0-9]{2}$/;
            const cvvRegex = /^[0-9]{3,4}$/;

            if (!cardNumberRegex.test(cardNumber)) {
                alert('Please enter a valid 16-digit card number.');
                return false;
            }

            if (!expiryDateRegex.test(expiryDate)) {
                alert('Please enter a valid expiry date in MM/YY format.');
                return false;
            }

            if (!cvvRegex.test(cvv)) {
                alert('Please enter a valid CVV.');
                return false;
            }

            return true;
        }
    </script>
</body>
</html>

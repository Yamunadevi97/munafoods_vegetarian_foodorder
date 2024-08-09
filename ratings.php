<?php
// Create a database connection
$servername = "localhost";
$username = "root"; // Replace with your MySQL username
$password = ""; // Replace with your MySQL password
// Create connection
$conn = new mysqli($servername, $username, $password);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
// Close the database connection
$conn->close();
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
<title>Munafood||Food Rating Form</title>
<style>
 body {
       font-family: Arial, sans-serif;
        margin: 20px;
        background-color: black;
      }
 .rating-row {
        display: flex;
        flex-wrap: wrap;
        align-items: center;
        margin-bottom: 15px;
   }
 h1,label{
       color: whitesmoke;
       font-size: 2em;
   }
 .rating-row label {
        margin-right: 10px;
        width: 150px;
    }
.rating-row input,select,textarea{
       width:50%;
       border: 3px solid whitesmoke;
       background: transparent;
       line-height: 4em;
       color: blue;
        font-size: 1.5em;
    }
.rating-row select {
        width: 150px;
       }
 .submit{
        background-color: orangered;
        color: whitesmoke;
        padding:10px;
        border-radius: 150px;
       margin-top: 25px;
        width:40%;
       margin-left: 250px;
  }
 /* Media queries for responsiveness */
 @media screen and (max-width: 600px) {
   .rating-row label {
     width: 100%;
     margin-bottom: 5px;
      }
 .rating-row select,textarea,input {
    width: 90%;
   font-size: 2em;
      }
   .submit{
        margin-left: -10px;
          width: 10em;
     } }
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
    p{
        color: whitesmoke;
    }
  </style></head>
<body>
<button id="back"><a href="your_orders.php" >Back to Cart</a></button><br>
    <h1><i class="fa-solid fa-star"></i> Rate Your Order <i class="fa-solid fa-star"></i></h1>
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
        <div class="rating-row">
            <label for="restaurant_name">Restaurant Name:</label>
            <input type="text" id="restaurant_name" name="restaurant_name" required>
        </div>
        <div class="rating-row">
            <label for="taste">Taste:</label>
            <select id="taste" name="taste" required>
                <option value="">Select</option>
                <option value="5">Excellent</option>
                <option value="4">Very Good</option>
                <option value="3">Good</option>
                <option value="2">Fair</option>
                <option value="1">Poor</option>
            </select></div>
        <!-- Repeat the above block for other categories like Presentation, Portion Size, etc. -->
        <div class="rating-row">
            <label for="comments">Additional Comments:</label>
            <textarea id="comments" name="comments"></textarea>
        </div>
        <input class="submit" type="submit" value="Submit Rating">
    </form>
    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Process form data
        $servername = "localhost";
        $username = "root"; // Replace with your MySQL username
        $password = ""; // Replace with your MySQL password
        $dbname = "munafoods";
        // Create connection
       $conn = new mysqli($servername, $username, $password, $dbname);
        // Check connection
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }
        // Escape user inputs for security
        $restaurant_name = $conn->real_escape_string($_POST['restaurant_name']);
        $taste = $conn->real_escape_string($_POST['taste']);
        $comments = $conn->real_escape_string($_POST['comments']);
        // Insert data into database
        $sql = "INSERT INTO ratings (restaurant_name, taste, comments) VALUES ('$restaurant_name', '$taste', '$comments')";
        if ($conn->query($sql) === TRUE) {
            echo "<p>Rating recorded successfully</p>";
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
        $conn->close();
    }
    ?></body></html>

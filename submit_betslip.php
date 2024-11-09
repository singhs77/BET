<?php
// Database connection details
$servername = "localhost";
$username = "root"; // Default for local servers
$password = ""; // Default for local servers
$dbname = "bets_db";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Retrieve form data
$bettor_id = $_POST['bettor_id'];
$name = $_POST['name'];
$bet_description = $_POST['bet_description'];
$sport = $_POST['sport'];
$date = $_POST['date'];
$odds = $_POST['odds'];
$amount_wagered = $_POST['amount_wagered'];
$total_payout = $_POST['total_payout'];
$profit = $_POST['profit'];

// Insert data into the database
$sql = "INSERT INTO betslips (bettor_id, name, bet_description, sport, date, odds, amount_wagered, total_payout, profit)
VALUES ('$bettor_id', '$name', '$bet_description', '$sport', '$date', '$odds', '$amount_wagered', '$total_payout', '$profit')";

if ($conn->query($sql) === TRUE) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

// Close connection
$conn->close();
?>

<?php
// Establish a database connection (replace with your database credentials)
$host = 'localhost';
$username = 'your_username';
$password = 'your_password';
$database = 'your_database';

$conn = new mysqli($host, $username, $password, $database);

// Check if the connection was successful
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Check if the form was submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Handle checkbox responses
    if (isset($_POST["car_options"])) {
        $selectedOptions = implode(", ", $_POST["car_options"]);

        // Store the selected options in the database
        $sql = "INSERT INTO car_responses (selected_options) VALUES ('$selectedOptions')";

        if ($conn->query($sql) === TRUE) {
            echo "Response submitted successfully!";
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    }
}

// Close the database connection
$conn->close();
?>

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    // Database connection
    $conn = new mysqli("localhost", "25n_4822", "jF)sq9sR!auA*PR.", "25n_4822");

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Sanitize input
    $name = $conn->real_escape_string($_POST['name']);
    $email = $conn->real_escape_string($_POST['email']);
    $message = $conn->real_escape_string($_POST['message']);

    // Insert into database
    $sql = "INSERT INTO messages (name, email, message)
            VALUES ('$name', '$email', '$message')";

    if ($conn->query($sql) === TRUE) {
        echo "Message saved successfully!";
    } else {
        echo "Error: " . $conn->error;
    }

    $conn->close();
}
?>
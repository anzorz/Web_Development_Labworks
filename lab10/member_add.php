<?php
// Database connection details
$servername = "feenix-mariadb.swin.edu.au";
$username = "s102849043";
$password = "031201";
$dbname = "s102849043_db";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Create the vipmembers table if it doesn't exist
$sql = "CREATE TABLE IF NOT EXISTS vipmembers (
    member_id INT AUTO_INCREMENT PRIMARY KEY,
    fname VARCHAR(40) NOT NULL,
    lname VARCHAR(40) NOT NULL,
    gender VARCHAR(1) NOT NULL,
    email VARCHAR(40) NOT NULL,
    phone VARCHAR(20) NOT NULL
)";

if ($conn->query($sql) === TRUE) {
    // Table created or already exists
} else {
    echo "Error creating table: " . $conn->error;
}

// Insert the submitted form data into the vipmembers table
$fname = $_POST['fname'];
$lname = $_POST['lname'];
$gender = $_POST['gender'];
$email = $_POST['email'];
$phone = $_POST['phone'];

$sql = "INSERT INTO vipmembers (fname, lname, gender, email, phone)
VALUES ('$fname', '$lname', '$gender', '$email', '$phone')";

if ($conn->query($sql) === TRUE) {
    echo "New member added successfully!";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

// Close the connection
$conn->close();
?>

<a href="vip_member.html">Back to Home</a>

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

// Select all records from the vipmembers table
$sql = "SELECT member_id, fname, lname FROM vipmembers";
$result = $conn->query($sql);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Display VIP Members</title>
</head>
<body>
    <h1>VIP Members List</h1>

    <?php
    if ($result->num_rows > 0) {
        echo "<table border='1'>";
        echo "<tr><th>Member ID</th><th>First Name</th><th>Last Name</th></tr>";

        // Output data of each row
        while($row = $result->fetch_assoc()) {
            echo "<tr><td>" . $row["member_id"]. "</td><td>" . $row["fname"]. "</td><td>" . $row["lname"]. "</td></tr>";
        }
        echo "</table>";
    } else {
        echo "No members found.";
    }

    // Close the connection
    $conn->close();
    ?>

    <a href="vip_member.html">Back to Home</a>
</body>
</html>

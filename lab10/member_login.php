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

$loginResult = '';
if (isset($_POST['member_id']) && isset($_POST['lname'])) {
    $member_id = $_POST['member_id'];
    $lname = $_POST['lname'];

    // Use prepared statements to prevent SQL injection
    $stmt = $conn->prepare("SELECT member_id, fname, lname, email FROM vipmembers WHERE member_id = ? AND lname = ?");
    $stmt->bind_param("is", $member_id, $lname); // 'i' for integer, 's' for string
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $loginResult = "<table border='1'>";
        $loginResult .= "<tr><th>Member ID</th><th>First Name</th><th>Last Name</th><th>Email</th></tr>";

        // Output data of each row
        while ($row = $result->fetch_assoc()) {
            $loginResult .= "<tr><td>" . $row["member_id"]. "</td><td>" . $row["fname"]. "</td><td>" . $row["lname"]. "</td><td>" . $row["email"]. "</td></tr>";
        }
        $loginResult .= "</table>";
    } else {
        $loginResult = "No members found.";
    }

    // Close the prepared statement
    $stmt->close();
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Member Log-in</title>
</head>
<body>
    <h1>Member Log-in</h1>

    <form method="post" action="member_login.php">
        <label for="member_id">Member ID:</label>
        <input type="number" id="member_id" name="member_id" required><br><br>

        <label for="lname">Last Name:</label>
        <input type="text" id="lname" name="lname" required><br><br>

        <button type="submit">Log In</button>
    </form>

    <br>
    <?php echo $loginResult; ?>

    <a href="vip_member.html">Back to Home</a>
</body>
</html>

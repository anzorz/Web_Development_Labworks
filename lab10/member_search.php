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

$searchResult = '';
if (isset($_POST['lname'])) {
    $lname = $_POST['lname'];

    // Search for members by last name
    $sql = "SELECT member_id, fname, lname, email FROM vipmembers WHERE lname LIKE '%$lname%'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $searchResult = "<table border='1'>";
        $searchResult .= "<tr><th>Member ID</th><th>First Name</th><th>Last Name</th><th>Email</th></tr>";

        // Output data of each row
        while($row = $result->fetch_assoc()) {
            $searchResult .= "<tr><td>" . $row["member_id"]. "</td><td>" . $row["fname"]. "</td><td>" . $row["lname"]. "</td><td>" . $row["email"]. "</td></tr>";
        }
        $searchResult .= "</table>";
    } else {
        $searchResult = "No members found.";
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Search VIP Members</title>
</head>
<body>
    <h1>Search VIP Members by Last Name</h1>

    <form method="post" action="member_search.php">
        <label for="lname">Last Name:</label>
        <input type="text" id="lname" name="lname" required>
        <button type="submit">Search</button>
    </form>

    <br>
    <?php echo $searchResult; ?>

    <a href="vip_member.html">Back to Home</a>
</body>
</html>

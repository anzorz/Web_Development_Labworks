<?php
// Include the settings file for database connection
include('settings.php');

// Create a connection to the database
$conn = @mysqli_connect($host, $user, $pwd, $sql_db);

// Check if the connection was successful
if (!$conn) {
    echo "<p>Database connection failure</p>";
} else {
    // Get the form data
    $make = mysqli_real_escape_string($conn, $_POST['make']);
    $model = mysqli_real_escape_string($conn, $_POST['model']);
    $price = mysqli_real_escape_string($conn, $_POST['price']);
    $yom = mysqli_real_escape_string($conn, $_POST['yom']);

    // Create the SQL query to insert the new car record
    $query = "INSERT INTO cars (make, model, price, yom) VALUES ('$make', '$model', $price, $yom)";

    // Execute the query
    $result = mysqli_query($conn, $query);

    // Check if the query was successful
    if ($result) {
        echo "<p>New car added successfully</p>";
    } else {
        echo "<p>Error adding new car</p>";
    }

    // Close the database connection
    mysqli_close($conn);
}
?>

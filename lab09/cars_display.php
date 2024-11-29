<?php
// Include the settings file
include('settings.php');

// Create a connection to the database
$conn = @mysqli_connect($host, $user, $pwd, $sql_db);

// Check if the connection was successful
if (!$conn) {
    echo "<p>Database connection failure</p>";
} else {
    // Prepare the SQL query to retrieve make, model, and price from the cars table
    $query = "SELECT make, model, price FROM cars";

    // Execute the query
    $result = mysqli_query($conn, $query);

    // Check if there are any results
    if ($result) {
        // Display the records in a table
        echo "<table border='1'>";
        echo "<tr><th>Make</th><th>Model</th><th>Price</th></tr>";

        // Fetch and display each row of data
        while ($row = mysqli_fetch_assoc($result)) {
            echo "<tr>";
            echo "<td>{$row['make']}</td>";
            echo "<td>{$row['model']}</td>";
            echo "<td>{$row['price']}</td>";
            echo "</tr>";
        }

        echo "</table>";
    } else {
        echo "<p>No records found</p>";
    }

    // Close the database connection
    mysqli_close($conn);
}
?>

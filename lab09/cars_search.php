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

    // Create the SQL query to search for cars based on make
    $query = "SELECT make, model, price, yom FROM cars WHERE make LIKE '%$make%'";

    // Execute the query
    $result = mysqli_query($conn, $query);

    // Check if any results were found
    if (mysqli_num_rows($result) > 0) {
        // Display the records in a table
        echo "<table border='1'>";
        echo "<tr><th>Make</th><th>Model</th><th>Price</th><th>Year of Manufacture</th></tr>";

        // Fetch and display each row of data
        while ($row = mysqli_fetch_assoc($result)) {
            echo "<tr>";
            echo "<td>{$row['make']}</td>";
            echo "<td>{$row['model']}</td>";
            echo "<td>{$row['price']}</td>";
            echo "<td>{$row['yom']}</td>";
            echo "</tr>";
        }

        echo "</table>";
    } else {
        echo "<p>No cars found matching your search criteria.</p>";
    }

    // Close the database connection
    mysqli_close($conn);
}
?>

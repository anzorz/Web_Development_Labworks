<!DOCTYPE html>
<html lang="en">
<head>
    <title>Booking Confirmation</title>
    <meta charset="utf-8"/>
</head>
<body>

<h1>Rohirrim Tour Booking Confirmation</h1>

<?php
// Step 3: Check if form is submitted
if (isset($_POST["firstname"])) {
    // Retrieve form data
    $firstname = $_POST["firstname"];
    $lastname = isset($_POST["lastname"]) ? $_POST["lastname"] : "Not provided";
    $age = isset($_POST["age"]) ? $_POST["age"] : "Not provided";
    $food = isset($_POST["food"]) ? $_POST["food"] : "Not provided";
    $partySize = isset($_POST["partySize"]) ? $_POST["partySize"] : "Not provided";

    // Step 4: Handle radio button and checkboxes
    $species = isset($_POST["species"]) ? $_POST["species"] : "Not specified";
    $tours = [];
    if (isset($_POST["1day"])) $tours[] = "1 Day Tour";
    if (isset($_POST["4day"])) $tours[] = "4 Day Tour";
    if (isset($_POST["10day"])) $tours[] = "10 Day Tour";

    // Format selected tours
    $selectedTours = implode(", ", $tours);

    // Step 5: Sanitise input
    function sanitise_input($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }

    // Sanitise the inputs
    $firstname = sanitise_input($firstname);
    $lastname = sanitise_input($lastname);
    $species = sanitise_input($species);
    $age = sanitise_input($age);
    $food = sanitise_input($food);
    $partySize = sanitise_input($partySize);

    // Step 6: Validate using regular expressions
    if (!preg_match("/^[a-zA-Z]*$/", $firstname)) {
        echo "<p>Invalid first name. Only letters allowed.</p>";
    } elseif (!preg_match("/^[a-zA-Z-]*$/", $lastname)) {
        echo "<p>Invalid last name. Only letters and hyphens allowed.</p>";
    } elseif (!is_numeric($age) || $age < 18 || $age > 10000) {
        echo "<p>Invalid age. Age must be a number between 18 and 10,000.</p>";
    } else {
        // Step 4.3: Confirmation message
        echo "<p>Welcome $firstname $lastname!</p>";
        echo "<p>You are now booked on the $selectedTours.</p>";
        echo "<p>Species: $species</p>";
        echo "<p>Age: $age</p>";
        echo "<p>Meal Preference: $food</p>";
        echo "<p>Number of travellers: $partySize</p>";
    }
} else {
    // Step 7: Redirection if no form submission
    header("Location: register.html");
}
?>

</body>
</html>

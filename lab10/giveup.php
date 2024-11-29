<?php
session_start();

// Check if the random number is set
if (isset($_SESSION['randomNumber'])) {
    $randomNumber = $_SESSION['randomNumber'];
} else {
    $randomNumber = 'No game in progress!';
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Give Up</title>
</head>
<body>
    <h1>Give Up</h1>
    <p>The random number was: <?php echo $randomNumber; ?></p>
    <a href="guessinggame.php">Back to Game</a>
</body>
</html>

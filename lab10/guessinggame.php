<?php
session_start();

// Check if the random number has been set, if not, set it
if (!isset($_SESSION['randomNumber'])) {
    $_SESSION['randomNumber'] = rand(1, 100);
    $_SESSION['guessCount'] = 0; // Initialize guess count
}

// Handle the user's guess
$message = '';
if (isset($_POST['guess'])) {
    $guess = (int)$_POST['guess'];
    $_SESSION['guessCount']++; // Increment guess count

    if ($guess > $_SESSION['randomNumber']) {
        $message = "Too high!";
    } elseif ($guess < $_SESSION['randomNumber']) {
        $message = "Too low!";
    } else {
        $message = "Congratulations! You've guessed the number!";
    }
}

// Check if the user has given up
if (isset($_GET['giveup']) && $_GET['giveup'] == 'yes') {
    $message = "The random number was: " . $_SESSION['randomNumber'];
    $showForm = false; // Hide the guessing form
} else {
    $showForm = true;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Guessing Game</title>
</head>
<body>
    <h1>Guess the number between 1 and 100!</h1>

    <?php if ($showForm): ?>
    <form method="post" action="guessinggame.php">
        <input type="number" name="guess" required>
        <button type="submit">Submit Guess</button>
    </form>
    <?php endif; ?>

    <p><?php echo $message; ?></p>
    <p>Guesses made: <?php echo $_SESSION['guessCount']; ?></p>

    <a href="guessinggame.php?giveup=yes">Give Up</a>
    <a href="startover.php">Start Over</a>
</body>
</html>

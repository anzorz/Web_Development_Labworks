<?php
session_start();

// Destroy the session to reset the game
session_unset();
session_destroy();

// Redirect back to guessinggame.php
header("Location: guessinggame.php");
exit();

<!DOCTYPE html>
<html>
<head>
    <title>Dice Game</title>
</head>
<body>

<form method="post">
    <input type="submit" value="Throw Dice" name="submit">
    <input type="submit" value="Reset Game" name="reset">
</form>

<?php
require_once 'Game.php'; 

session_start();

if (isset($_POST['submit'])) {
    $game = isset($_SESSION['game']) ? $_SESSION['game'] : new Game();

    $game->play();

    $_SESSION['game'] = $game;

    if ($game->isGameOver()) {
        echo "<h2>Game Over</h2>";
        $game->displayScoreboard();
        unset($_SESSION['game']);
    }
} elseif (isset($_POST['reset'])) {
    unset($_SESSION['game']);
    header("Location: index.php");
    exit();
}
?>

</body>
</html>

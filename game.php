<?php

require_once 'Dice.php'; 

class Game { 

private $players;
private $dice;
private $scores;
private $totalTurns;
private $currentTurn;

public function __construct($totalTurns = 6) { 
    $this->players = 2; // Fixed number of players (2)
    $this->totalTurns = $totalTurns;
    $this->currentTurn = 0;
    // Initialize dice and scores for each player
    for ($i = 1; $i <= $this->players; $i++) {
        $this->dice[$i] = array();
        for ($j = 0; $j < 6; $j++) {
            $this->dice[$i][$j] = new Dice();
        }
        $this->scores[$i] = 0;
    }
} 

public function play() {
    $this->currentTurn++;
    echo "<h3>Turn " . $this->currentTurn . "</h3>";
    // Count occurrences of each dice face value
    $countDice = array();
    foreach ($this->dice as $player => $dice) {
        foreach ($dice as $die) {
            $faceValue = $die->getFaceValue();
            if (!isset($countDice[$faceValue])) {
                $countDice[$faceValue] = 0;
            }
            $countDice[$faceValue]++;
        }
    }
    // Display dice and update scores
    foreach ($this->dice as $player => $dice) {
        echo "<p>Player $player:</p>";
        foreach ($dice as $die) {
            $faceValue = $die->getFaceValue();
            echo $die->getFaceSVG($countDice[$faceValue]);
            $this->scores[$player] += $faceValue; // Update scores
        }
        echo "<br/>";
    }
    echo "<br/>";
    $this->displayScoreboard();
}


public function displayScoreboard() {
    echo "<h3>Scoreboard</h3>";
    foreach ($this->scores as $player => $score) {
        echo "Player $player: $score<br/>";
    }
    echo "<br/>";
}

public function isGameOver() {
    return $this->currentTurn >= $this->totalTurns;
}

public function reset() {
    $this->currentTurn = 0;
    $this->scores = array_fill(1, $this->players, 0);
    for ($i = 1; $i <= $this->players; $i++) {
        for ($j = 0; $j < 6; $j++) {
            $this->dice[$i][$j]->throwDice(); // Reset the dice
        }
    }
}
}

?>
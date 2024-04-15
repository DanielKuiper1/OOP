
<?php
class Dice { 

const NUMBER_OF_SIDES = 6; 

private $faceValue; 

public function throwDice() { 
    $this->faceValue = rand(1, self::NUMBER_OF_SIDES); 
} 

public function getFaceValue() { 
    return $this->faceValue; 
} 

public function getFaceSVG($count = 1) {
    $filePath = "images/dice{$this->faceValue}.svg";
    if (file_exists($filePath)) {
        $svg = file_get_contents($filePath);
        // Add additional styling if there are 2 or more dice with the same value
        if ($count >= 2) {
            $svg = str_replace('<rect', '<rect style="fill:gold"', $svg);
        }
        return $svg;
    } else {
        return "<p>Error: SVG file not found for dice face value {$this->faceValue}</p>";
    }
}
} 

?>
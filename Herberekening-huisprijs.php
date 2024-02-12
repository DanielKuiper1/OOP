<?php

class House {
    private $floors;
    private $rooms = [];

    public function __construct($floors) {
        $this->floors = $floors;
    }

    public function addRoom($room) {
        $this->rooms[] = $room;
    }

    public function calculateTotalSize() {
        $totalSize = 0;
        foreach ($this->rooms as $room) {
            $totalSize += $room->calculateVolume();
        }
        return $totalSize;
    }

    public function calculatePrice() {
        $totalSize = $this->calculateTotalSize();
        $price = $totalSize * 1500; 
        return $price;
    }

    public function generateOutput() {
        $totalVolume = $this->calculateTotalSize();
        $price = $this->calculatePrice();

        echo "Dit huis heeft {$this->floors} Verdiepingen, " .
             count($this->rooms) . " kamers en heeft een volume van {$totalVolume} m3.\n";
        echo "De prijs van het huis is {$price}.\n";
    }
}

class Room {
    private $length;
    private $width;
    private $height;

    public function __construct($length, $width, $height) {
        $this->length = $length;
        $this->width = $width;
        $this->height = $height;
    }

    public function calculateVolume() {
        return $this->length * $this->width * $this->height;
    }
}

$house1 = new House(2);

$room1 = new Room(5, 4, 3);
$room2 = new Room(6, 4, 3);

$house1->addRoom($room1);
$house1->addRoom($room2);

$house1->generateOutput();
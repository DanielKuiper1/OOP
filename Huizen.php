<?php

class huis
{
    public $width;
    public $depth;
    public $height;
    public $rooms;
    public $floors;
    public $volume;
    public $price;

    public function setvolume()
    {
        $this->volume = $this->width * $this->depth * $this->height;
        return number_format($this->volume);
    }

    public function getprice()
    {
        $this->price = $this->setvolume() * 3000;
        return number_format($this->price);
    }

    public function __construct()
    {
        return "Dit huis heeft " . $this->floors . " verdiepingen, " . $this->rooms . " kamers en heeft een volume van " . $this->setvolume() . " m3" . "</br>" 
        . "De prijs van het huis is:" . $this->getprice();
    }
}

$huis_1 = new huis;
$huis_1->width = 100;
$huis_1->depth = 10;
$huis_1->height = 10;
$huis_1->floors = 3;
$huis_1->rooms = 10;

echo $huis_1->__construct();

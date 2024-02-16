<?php

abstract class Product
{
    public $naam;
    public $inkoopPrijs;
    public $btw;
    public $omschrijving;

    public function __construct($naam, $inkoopPrijs, $btw, $omschrijving)
    {
        $this->naam = $naam;
        $this->inkoopPrijs = $inkoopPrijs;
        $this->btw = $btw;
        $this->omschrijving = $omschrijving;
    }

    public function getNaam()
    {
        return $this->naam;
    }

    public function getInkoopPrijs()
    {
        return $this->inkoopPrijs;
    }

    public function getBtw()
    {
        return $this->btw;
    }

    public function getOmschrijving()
    {
        return $this->omschrijving;
    }

    abstract public function getInfo();
}

class Muziek extends Product
{
    public $artiest;
    public $nummers = [];

    public function __construct($naam, $inkoopPrijs, $btw, $omschrijving, $artiest, $nummers)
    {
        parent::__construct($naam, $inkoopPrijs, $btw, $omschrijving);
        $this->artiest = $artiest;
        $this->nummers = $nummers;
    }

    public function getInfo()
    {
        return "Artiest: {$this->artiest}, Nummers: " . implode(", ", $this->nummers);
    }
}

class Film extends Product
{
    public $kwaliteit;

    public function __construct($naam, $inkoopPrijs, $btw, $omschrijving, $kwaliteit)
    {
        parent::__construct($naam, $inkoopPrijs, $btw, $omschrijving);
        $this->kwaliteit = $kwaliteit;
    }

    public function getInfo()
    {
        return "{$this->kwaliteit}";
    }
}

class Spel extends Product
{
    public $genre;
    public $minimaleHardwareVereisten;

    public function __construct($naam, $inkoopPrijs, $btw, $omschrijving, $genre, $minimaleHardwareVereisten)
    {
        parent::__construct($naam, $inkoopPrijs, $btw, $omschrijving);
        $this->genre = $genre;
        $this->minimaleHardwareVereisten = $minimaleHardwareVereisten;
    }

    public function getInfo()
    {
        return "Genre: {$this->genre}, Minimale hardwarevereisten: {$this->minimaleHardwareVereisten}";
    }
}

class ProductLijst
{
    public $producten = [];

    public function voegProductToe(Product $product)
    {
        $this->producten[] = $product;
    }

    public function toonProducten()
    {
        echo "<table border='1'>";
        echo "<tr><th>Categorie</th><th>Naam</th><th>Verkoopprijs</th><th>Info</th></tr>";
        foreach ($this->producten as $product) {
            echo "<tr>";
            echo "<td>" . get_class($product) . "</td>";
            echo "<td>" . $product->getNaam() . "</td>";
            echo "<td>" . $product->getInkoopPrijs() . "</td>";
            echo "<td>" . $product->getInfo() . "</td>";
            echo "</tr>";
        }
        echo "</table>";
    }
}

// Voorbeeldgebruik
$muziekProduct = new Muziek("Greatest Hits", 10.0, 2.0, "Beschrijving", "Michael Jackson", ["Billie Jean", "Thriller", "Beat It"]);
$filmProduct = new Film("Avatar", 20.0, 4.0, "Beschrijving", "DVD");
$spelProduct = new Spel("Fortnite", 30.0, 6.0, "Beschrijving", "FPS", "8gb geheugen, 970 RTX");

$productLijst = new ProductLijst();
$productLijst->voegProductToe($muziekProduct);
$productLijst->voegProductToe($filmProduct);
$productLijst->voegProductToe($spelProduct);

$productLijst->toonProducten();
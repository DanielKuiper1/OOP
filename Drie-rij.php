<?php

abstract class figure 
{
    public $color;

    public function __construct($color) {
        $this->color = $color;
    }

    function setColor($color)
    {
        return $this->color;
    }

    abstract public function draw() : string;
}

class triangle extends figure
{
    Public $height;
    Public $width;

    public function __construct($width, $height, $color) 
    {
        parent::__construct($color);
        $this->width = $width;
        $this->height = $height;
    }
    public function draw() : string 
{
    return "<svg xmlns='http://www.w3.org/2000/svg'
    xmlns:xlink='http://www.w3.org/1999/xlink' width='$this->width' height='$this->height' viewBox='0 0 100 100' fill='$this->color'>
    <polygon points='50 0, 100 100, 0 100'/>
    </svg>";
}
}

class square extends figure
{
    Public $length;

    public function __construct($length, $color) 
    {
        parent::__construct($color);
        $this->length = $length;
    }

    public function draw() : string 
{
    return "<svg width='$this->length' height='$this->length' xmlns='http://www.w3.org/2000/svg'>
    <rect width='$this->length' height='$this->length' fill='$this->color' />
  </svg>";
}
}

class rectangle extends figure
{
Public $height;
Public $width;

public function __construct($width, $height, $color) 
{
    parent::__construct($color);
    $this->width = $width;
    $this->height = $height;
}
public function draw() : string 
{
    return "<svg width='$this->width' height='$this->height' xmlns='http://www.w3.org/2000/svg'>
    <rect width='$this->width' height='$this->height' fill='$this->color' />
  </svg>";
}
}

class circle extends figure
{
    public $length;
    public $height;

    public function __construct($length, $color) 
    {
        parent::__construct($color);
        $this->length = $length;
        $this->getHeight();
    }

    public function getHeight() 
    {
        $this->height = $this->length / 2;
    }
    public function draw() : string 
{
    return "<svg width='$this->length' height='$this->length' xmlns='http://www.w3.org/2000/svg'>
    <circle r='$this->height' cx='50%' cy='50%' stroke='$this->color' fill='$this->color' />
  </svg>";
}
}

$triangle = new triangle(100, 100, "blue");
echo $triangle->draw();

$square = new square(100, "green");
echo $square->draw();

$rectangle = new rectangle(100, 50, "red");
echo $rectangle->draw();

$circle = new circle(100, "yellow");
echo $circle->draw();
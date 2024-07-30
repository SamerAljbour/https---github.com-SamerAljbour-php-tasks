<?php 
abstract class Shape {
    protected $M_PI = 3.14;
    abstract public function calculateArea();
}

class Circle extends Shape {
    private $radius;

    public function __construct($radius) {
        $this->radius = $radius;
    }

    public function calculateArea() {
        $area = $this->M_PI * $this->radius * $this->radius;
        return $area;
    }
}

class Rectangle extends Shape {
    private $width;
    private $height;

    public function __construct($width, $height) {
        $this->width = $width;
        $this->height = $height;
    }

    public function calculateArea() {
        $area = $this->width * $this->height;
        return $area;
    }
}

// Example usage
$circle = new Circle(5);
echo "Circle area: " . $circle->calculateArea() . "<br>";

$rectangle = new Rectangle(4, 6);
echo "Rectangle area: " . $rectangle->calculateArea() . "<br>";
?>

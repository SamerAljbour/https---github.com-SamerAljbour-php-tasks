<?php 
class Vehicle {
    private $type;
    public function __construct($type){
        $this->type = $type;


    }
    function move(){
        echo "moved";
    }
}
class Car extends Vehicle{
    function move(){
        echo "moved Car";
    }
}
class Bike extends Vehicle{
    function move(){
        echo "moved Bike";
    }
}
$car = new Car("car");
echo $car->move();
echo "<br>";
$bike = new Bike("bike");
echo $bike->move();
?>
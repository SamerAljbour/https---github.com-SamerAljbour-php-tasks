<?php 
class Car {
    private $make;
    private $model;
    private $year;
    public function __construct($make,$model ,$year){
        $this->make = $make;
        $this->model = $model;
        $this->year = $year;
    }
    function setMake ($make){
        $this->make = $make;
    }
    function getMake(){
        return $this->make;
    }
    function setModel ($model){
        $this->model = $model;
    }
    function getModel(){
        return $this->model;
    }
    function setYear($year){
        $this->year = $year;
    }
    function getYear(){
        return $this->year;
    }
}
$bwm =new Car("bwm","e36",2000);

echo $bwm -> getMake();
echo "<br>";
echo $bwm -> getModel();
echo "<br>";
echo $bwm -> getYear();
echo "<br>";
?>
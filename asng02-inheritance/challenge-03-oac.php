<?php

class Bike {

  public $brand;
  public $model;
  public $year;
  public $description = 'Used bicycle';
  private $weight_kg = 0.0;
  protected $wheels = 2;
  
  // Name
  public function name() {
    return $this->brand . " " . $this->model . " (" . $this->year . ")";
  }

  //KG functions
  public function weightKG() {
    return $this->weight_kg . ' kgs';
  }

  public function setWeightKG($i) {
    $this->weight_kg = $i;
  }

  // LB functions
  public function weight_lbs() {
   $weight_lbs = $this->weight_kg * 2.2046226218;
    return $weight_lbs . ' lbs';
  }

  function set_weight_lbs($j) {
    $this->weight_kg = $j / 2.2046226218;

  }

  // Wheels Details

  public function wheelInfo() {
    $wheelSentence = $this->wheels == 1 ? "1 wheel" : "{$this->wheels} wheels";
    return "It has " . $wheelSentence . ".";
  }

}

//Unicycle Subclass. Child of Bike

class Unicycle extends Bike {
  protected $wheels = 1;
}

// Creates a bicycle

$trek = new Bike;
$trek->brand = 'Trek';
$trek->model = 'Emonda';
$trek->year = '2017';

// creates a unicycle
$unicycle = new Unicycle; 

echo "<b>Bicycle: </b>" . $trek->wheelInfo() . "<br />";
echo "<b>Unicycle: </b>" . $unicycle->wheelInfo() . "<br />";
echo "<hr>";

echo"<b>Weight in Kilograms: </b> </br>";
echo $trek->setWeightKG(5);
echo $trek->weightKG() . "</br>";
echo $trek->weight_lbs() . "</br>";
echo "<hr>";

echo"<b>Weight in Pounds: </b> </br>";
echo $trek->set_weight_lbs(11);
echo $trek->weight_lbs() . "</br>";
echo $trek->weightKG(), 2 . "</br>";


?>

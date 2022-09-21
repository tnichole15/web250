<?php

  class Bike {
    public static $instance_count = 0;


    public $brand;
    public $model;
    public $year;
    public $description = 'Used bicycle';
    public $category;
    private $weight_kg = 0.0;
    protected static $wheels = 2;
    
    public const arr_categories = ['Road ', 'Mountain', 'Hybrid', 'Cruiser', 'City', 'BMX'];

    public static function create() {
      $class = get_called_class();
      $bike = new $class; 

      self::$instance_count++;
      return $bike;
    }
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

    public static function wheelInfo() {
      $wheelSentence = static::$wheels == 1 ? "1 wheel" : static::$wheels . " wheels";
      return "It has " . $wheelSentence . ".";
    }

  }

  //Unicycle Subclass. Child of Bike

  class Unicycle extends Bike {
    protected static $wheels = 1;
  }

  // Creates a bicycle

  $trek = new Bike;
  $trek->category = Bike::arr_categories[2];
  $trek->brand = 'Trek';
  $trek->model = 'Emonda';
  $trek->year = '2017';


  // creates a unicycle
  $unicycle = new Unicycle; 

  // First Count Statement Test
  echo "<h3>Bike Count Test 1</h3>";
    echo 'Bike Count: ' . Bike::$instance_count . '</br>';
    echo 'Unicycle Count: ' . Unicycle::$instance_count . '</br>';
  echo "<hr>";

  // Using the instance creators 
    $bike = Bike::create();
    $unicycle2 = Unicycle::create();

  // Second count statmenet -- after using the instance creators
  echo "<h3>Bike Count Test 2</h3>";
    echo 'Bike Count: ' . Bike::$instance_count . '</br>';
    echo 'Unicycle Count: ' . Unicycle::$instance_count . '</br>';
  echo "<hr>";

  echo "<h3>Wheel Info</h3>";
  echo "<b>Bicycle: </b>" . $trek->wheelInfo() . "<br />";
  echo "<b>Unicycle: </b>" . $unicycle->wheelInfo() . "<br />";
  echo "<hr>";

  // Printing the categories array
  echo "<h3> Categories </h3>";
  echo "Categories Array: " . implode(', ', Bike::arr_categories) . '</br>';
  echo "Category: " . $trek->category . "</br>";


  // Weight Information 

  echo "<hr>";
  echo "<h3> Pounds and Kilos </h3>";

  echo"<b>Weight in Kilograms: </b> </br>";
  echo $trek->setWeightKG(5);
  echo $trek->weightKG() . "</br>";
  echo $trek->weight_lbs() . "</br>";


  echo"<b>Weight in Pounds: </b> </br>";
  echo $trek->set_weight_lbs(11);
  echo $trek->weight_lbs() . "</br>";
  echo $trek->weightKG(), 2 . "</br>";

?>

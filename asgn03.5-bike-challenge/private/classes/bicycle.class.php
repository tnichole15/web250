<?php
  class Bicycle {
    public $brand; 
    public $model; 
    public $year; 
    public $category;
    public $color; 
    public $desc; 
    public $gender; 
    public $price; 
    protected $weightKg; 
    protected $conditionID; 

    public const CATEGORIES = ['Road', 'Mountain', 'Hybrid', 'Cruiser', 'City', 'BMX']; 

    public const GENDER = ['Men', 'Women', 'UniSex'];

    protected const CONDITION_OPTIONS = [
      1 => 'Beat Up', 2 => 'Decent', 3 => 'Good', 4 => 'Great', 5 => 'Like New'
    ];
  

    public function __construct($arguments=[]) { 
      $this->brand = $arguments['brand'] ?? '';
      $this->model = $arguments['model'] ?? '';
      $this->year = $arguments['year'] ?? '';
      $this->category = $arguments['category'] ?? '';
      $this->color = $arguments['color'] ?? '';
      $this->desc = $arguments['desc'] ?? '';
      $this->gender = $arguments['gender'] ?? '';
      $this->price = $arguments['price'] ?? 0;
      $this->weightKg = $arguments['weightKg'] ?? 0;
      $this->conditionID = $arguments['conditionID'] ?? 3;
    }

    /*foreach($arguments as $i => $j) {
      if(property_exists($this, $i)) {
        $this->$i = $j;
      }
    }*/
    
    public function weightKG() {
      return number_format($this->weightKg, 2) . 'kg';
    }

    public function setWeightKG($val) {
      $this->weightKg = floatval($val);
    }

    public function weightLBS() {
      $weightLB = floatval($this->weightKg) * 2.2046226218;
      return number_format($weightLB, 2) . 'lbs';
    }

    public function setWeightLB($val) {
      $this->weightKg = floatval($val) / 2.2046226218;
    }

    public function condition() {
      if($this->conditionID > 0) {
        return self::CONDITION_OPTIONS[$this->conditionID]; 
      }
      else {
        return 'Unknown';
      }
    }

  }


?>
<?php
  class Bird {
    public $commonName; 
    public $habitat; 
    public $food; 
    public $nestPlace;
    public $behavior; 
    public $conservation; 
    public $backyard; 
    protected $conservationID;


    public const CONSERVATION_OPTIONS = [1 => 'low', 2=> 'moderate', 3 => 'high', 4 => 'extreme']; 
  

    public function __construct($arguments=[]) { 
      $this->commonName = $arguments['commonName'] ?? '';
      $this->habitat = $arguments['habitat'] ?? '';
      $this->food = $arguments['food'] ?? '';
      $this->nestPlace = $arguments['nestPlace'] ?? '';
      $this->behavior = $arguments['behavior'] ?? '';
      $this->conservation = $arguments['conservation'] ?? '';
      $this->backyard = $arguments['backyard'] ?? '';
      $this->conservationID = $arguments['conservationID'] ?? '';
    }

    /*foreach($arguments as $i => $j) {
      if(property_exists($this, $i)) {
        $this->$i = $j;
      }
    }*/

    public function conservationLevel() {
      if($this->conservationID > 0) {
        return self::CONSERVATION_OPTIONS[$this->conservationID]; 
      }
      else {
        return 'Unknown';
      }
    }

  }

?>

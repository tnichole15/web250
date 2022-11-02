<?php
  class Bird extends DatabaseObject {

    static protected $tableName = 'bird';
    static protected $db_columns = ['id', 'common_name', 'habitat', 'food', 'conservation_id', 'backyard_tips'];

    public $id;
    public $common_name; 
    public $habitat; 
    public $food; 
    public $conservation_id; 
    public $backyard_tips; 
    
    protected $conservationID;


    public const CONSERVATION_OPTIONS = [1 => 'low', 2=> 'moderate', 3 => 'high', 4 => 'extreme']; 
  

    public function __construct($arguments=[]) { 
      $this->common_name = $arguments['common_name'] ?? '';
      $this->habitat = $arguments['habitat'] ?? '';
      $this->food = $arguments['food'] ?? '';
      $this->conservation_id = $arguments['conservation_id'] ?? '';
      $this->backyard_tips = $arguments['backyard_tips'] ?? '';
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


    // NEW - VALIDATE FUNCTION
    protected function validate() {
      //Ensuring errors array starts out empty
      $this->errors = [];
  
      if(is_blank($this->common_name)) {
        $this->errors[] = "Common Name Cannot Be Blank!";
      }
  
      return $this->errors;
    }

  }

?>

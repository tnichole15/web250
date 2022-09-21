<?php

  class Bird {

    public static $instance_count = 0;
    public static $egg_num = 0;

    var $habitat;
    var $food;
    var $nesting = "tree";
    var $conservation;
    var $song = "chirp";
    var $flying = "yes";
      
    public static function create() {
      $class = get_called_class();
      $bird = new $class;
        
      self::$instance_count++;
      return $bird;
    }
      
    function can_fly() {
      // Ternary Operation to replace If Else statment
      $this->flying == "yes" ? $flying_string = "can fly" : $flying_string = "is stuck on the ground";
        
      return  $flying_string ;
    }
  }
    
  class YellowBelliedFlyCatcher extends Bird {
    var $name = "yellow-bellied flycatcher";
    var $diet = "mostly insects.";
    var $song = "flat chilk";
    public static $egg_num = "3, 4, sometimes 5";
  }

  class Kiwi extends Bird {
    var $name = "kiwi";
    var $diet = "omnivorous";
    var $flying = "no";
  }


  /// Count before Create 
  echo '<b>Bird Count:</b> ' . Bird::$instance_count . '<br />';
  echo '<b>Kiwi Count:</b> ' . Kiwi::$instance_count . '<br />';
  echo '<b>Yellow-Bellied Fly Catcher Count:</b> ' . YellowBelliedFlyCatcher::$instance_count . '<br />';

  // Create 
  $bird = Bird::create();
  $kiwi = Kiwi::create();
  $yellow = YellowBelliedFlyCatcher::create();

  // Instance Counter After Create 
  echo '<b>Bird Count:</b> ' . Bird::$instance_count . '<br />';
  echo '<b>Kiwi Count:</b> ' . Kiwi::$instance_count . '<br />';
  echo '<b>Yellow-Bellied Fly Catcher Count:</b> ' . YellowBelliedFlyCatcher::$instance_count . '<br />';

?>

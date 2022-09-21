<?php
  // Parent Class (Animal)

  class Animal {
    var $commonName;
    var $scientificName;
    var $conservationEffort;
    var $isAquatic = false; 
    var $isAerial = false; 
    var $isTerrestrial = true; 
    
    function threatStatus() {
      if($this->conservationEffort == 'Red') {
        return 'Critical';
      }elseif ($this->conservationEffort == 'Orange') {
        return 'Endangered';
      } elseif($this->conservationEffort == 'Yellow') {
        return "Vulnerable";
      }else {
        return 'Least Concern';
      }
    }
  

  }

  //Subclass Bird (extends animal)
  class Bird extends Animal {
    var $isTerrestrial = false;
    var $isAerial = true;
  }

  //Subclass Fish (extends animal)
  class Fish extends Animal {
    var $isTerrestrial = false;
    var $isAerial = false;
    var $isAquatic = true;
  }

  // Elephant. Base animal. Not part of subclass. 

  $elephant = new Animal;
  $elephant->commonName = 'African Elephant';
  $elephant->scientificName = 'Loxodonta';
  $elephant->conservationEffort = 'Orange';

  echo '<h2>Animal 1</h2>';
  echo '<b>Common Name: </b> ' . $elephant->commonName . "<br>";
  echo '<b>Scientific Name: </b> ' . $elephant->scientificName . "<br>";
  echo '<b>Conservation Status: </b> ' . $elephant->conservationEffort . "<br>";
  echo '<b>IUCN Status: </b> ' . $elephant->threatStatus() . "<br>";
  echo '<b>Terrestrial: </b> ' . $elephant->isTerrestrial . "<br>";
  echo '<b>Aerial: </b> ' . $elephant->isAerial . "<br>";
  echo '<b>Aquatic: </b> ' . $elephant->isAquatic . "<br>";

  // Flamingo. Part of bird subclass
  $flamingo = new Bird;
  $flamingo->commonName = 'Flamingo';
  $flamingo->scientificName = 'Phoenicopterus roseus';
  $flamingo->conservationEffort = 'Green';
  $flamingo->isAquatic = True;

  echo '<h2>Animal 2</h2>';
  echo '<b>Common Name: </b> ' . $flamingo->commonName . "<br>";
  echo '<b>Scientific Name: </b> ' . $flamingo->scientificName . "<br>";
  echo '<b>Conservation Status: </b> ' . $flamingo->conservationEffort . "<br>";
  echo '<b>IUCN Status: </b> ' . $flamingo->threatStatus() . "<br>";
  echo '<b>Terrestrial: </b> ' . $flamingo->isTerrestrial . "<br>";
  echo '<b>Aerial: </b> ' . $flamingo->isAerial . "<br>";
  echo '<b>Aquatic: </b> ' . $flamingo->isAquatic . "<br>";

  //Tuna. Part of Fish Subclass.
  $bfTuna = new Fish; 
  $bfTuna->commonName = 'Bluefin Tuna';
  $bfTuna->scientificName = 'Thunnus thynnus';
  $bfTuna->conservationEffort = 'Orange';

  echo '<h2>Animal 3</h2>';
  echo '<b>Common Name: </b> ' . $bfTuna->commonName . "<br>";
  echo '<b>Scientific Name: </b> ' . $bfTuna->scientificName . "<br>";
  echo '<b>Conservation Status: </b> ' . $bfTuna->conservationEffort . "<br>";
  echo '<b>IUCN Status: </b> ' . $bfTuna->threatStatus() . "<br>";
  echo '<b>Terrestrial: </b> ' . $bfTuna->isTerrestrial . "<br>";
  echo '<b>Aerial: </b> ' . $bfTuna->isAerial . "<br>";
  echo '<b>Aquatic: </b> ' . $bfTuna->isAquatic . "<br>";


?>
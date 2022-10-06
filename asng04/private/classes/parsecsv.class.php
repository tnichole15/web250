<?php

  class ParseCSV {

    public static $delimiter = ',';

    private $fname;
    private $header;
    private $data = [];
    private $row_count = 0;

    public function __construct($fname='') {
      if($fname != '') {
        $this->file($fname);
      }
    }

    public function file($fname) {
      if(!file_exists($fname)) {
        echo "Non-existent file.";
        return false;
      } elseif(!is_readable($fname)) {
        echo "File unreadable.";
        return false;
      }
      $this->fname = $fname;
      return true;
    }

    public function parse() {
      if(!isset($this->fname)) {
        echo "File not set.";
        return false;
      }

      // clear any previous results
      
      $this->reset();
      $file = fopen($this->fname, 'r');

      while(!feof($file)) {
        $row = fgetcsv($file, 0, self::$delimiter);
        if($row == [NULL] || $row === FALSE) { continue; }
        
        if(!$this->header) {
          $this->header = $row;
        } 
        else {
          $this->data[] = array_combine($this->header, $row);
          $this->row_count++;
        }
      }

      fclose($file);
      return $this->data;
    }

    public function last_results() {
      return $this->data;
    }

    public function row_count() {
      return $this->row_count;
    }

    private function reset() {
      $this->header = NULL;
      $this->data = [];
      $this->row_count = 0;
    }

  }

?>

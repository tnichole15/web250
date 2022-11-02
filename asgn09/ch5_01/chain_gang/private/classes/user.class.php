<?php

class User extends DatabaseObject {

  //In phpmyadmin, to change table name I used the command:
    // ALTER TABLE admins RENAME users;

  static protected $table_name = "users";
  static protected $db_columns = ['id', 'first_name', 'last_name', 'email', 'username', 'hashed_password', 'user_level'];

  public $id;
  public $first_name;
  public $last_name;
  public $email;
  public $username;
  public $user_level;
  protected $hashed_password;
  public $password;
  public $confirm_password;
  protected $password_required = true;

  public function __construct($args=[]) {
    $this->first_name = $args['first_name'] ?? '';
    $this->last_name = $args['last_name'] ?? '';
    $this->email = $args['email'] ?? '';
    $this->username = $args['username'] ?? '';
    $this->user_level = $args['user_level'] ?? '';
    $this->password = $args['password'] ?? '';
    $this->confirm_password = $args['confirm_password'] ?? '';
  }

  public function full_name() {
    return $this->first_name . " " . $this->last_name;
  }

  /**
   * Function set_hashed_password()
   * protected. 
   * No needed @param
   * Encrypts passwords as they're saved using BCRYPT (blowfish). 
    */
  protected function set_hashed_password(){
    $this->hashed_password = password_hash($this->password, PASSWORD_BCRYPT);
  }

  /**
   * Function Create()
   * Protected.
   * No needed @param. 
   * Hash the password and call the original version when creating ((new))
   */

  protected function create() {
    $this->set_hashed_password();
    return parent::create();
  }

  /**
   * Function - Update()
   * Protected
   * No needed @param
   * Hash the password, and call the original version for return when updating
   */
  protected function update() {
    if($this->password != ''){
      //validate password
      $this->set_hashed_password();
    }
    else {
      /* Skip pw hash and validation. PW not present*/
      $this->password_required = false; 
    }
    return parent::update();
  }

  /**
   * Function validate()
   * Protected
   * Validation methods for USER class. 
   * IF 'x' is blank, add appropriate strings to the error array.
   */
  protected function validate() {
    $this->errors = [];

    /**
     * First Name/Last Name validation. Must be/have: 
     *  2 Character minimum
     *  255 character maximum
     */
    if(is_blank($this->first_name)) {
      $this->errors[] = "First name cannot be blank.";
    } elseif (!has_length($this->first_name, array('min' => 2, 'max' => 255))) {
      $this->errors[] = "First name must be between 2 and 255 characters.";
    }

    if(is_blank($this->last_name)) {
      $this->errors[] = "Last name cannot be blank.";
    } elseif (!has_length($this->last_name, array('min' => 2, 'max' => 255))) {
      $this->errors[] = "Last name must be between 2 and 255 characters.";
    }

    /**
     * Email Validation. Must be/have:
     *  Less than 255 characters
     *  Valid format (characters '@' domain 'dot com')
     */
    if(is_blank($this->email)) {
      $this->errors[] = "Email cannot be blank.";
    } elseif (!has_length($this->email, array('max' => 255))) {
      $this->errors[] = "Last name must be less than 255 characters.";
    } elseif (!has_valid_email_format($this->email)) {
      $this->errors[] = "Email must be a valid format.";
    }

    /**
     * Username Validation. Must be/have:
     *  At least 8 characters
     *  No more than 254 characters
     */
    if(is_blank($this->username)) {
      $this->errors[] = "Username cannot be blank.";
    } elseif (!has_length($this->username, array('min' => 8, 'max' => 255))) {
      $this->errors[] = "Username must be between 8 and 255 characters.";
    }

    /**
     * Password checks. IF the password is required, it must be/have:
     *  >= 12 characters
     *  >= 1 Uppercase letter
     *  >= 1 lowercase letter
     *  >= 1 number
     *  >= 1 special character/symbol
    */
    if($this->password_required){
      if(is_blank($this->password)) {
        $this->errors[] = "Password cannot be blank.";
      } elseif (!has_length($this->password, array('min' => 12))) {
        $this->errors[] = "Password must contain 12 or more characters";
      } elseif (!preg_match('/[A-Z]/', $this->password)) {
        $this->errors[] = "Password must contain at least 1 uppercase letter";
      } elseif (!preg_match('/[a-z]/', $this->password)) {
        $this->errors[] = "Password must contain at least 1 lowercase letter";
      } elseif (!preg_match('/[0-9]/', $this->password)) {
        $this->errors[] = "Password must contain at least 1 number";
      } elseif (!preg_match('/[^A-Za-z0-9\s]/', $this->password)) {
        $this->errors[] = "Password must contain at least 1 symbol";
      }
    }

    /**
     * Confirm password validation:
     *  Used to ensure that the user doesn't enter the wrong 
     *    password, such as mismatched passwords or misspelled 
     *    passwords, that may lock them out. 
     *  Users must enter the same password twice in order to 
     *    validate. 
     */
    if(is_blank($this->confirm_password)) {
      $this->errors[] = "Confirm password cannot be blank.";
    } elseif ($this->password !== $this->confirm_password) {
      $this->errors[] = "Password and confirm password must match.";
    }

    return $this->errors;
  }

}

?>

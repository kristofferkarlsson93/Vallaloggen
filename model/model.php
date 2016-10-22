<?php
  include ("model/database_commands.php");

  Class Model {
    private $database_commands;
    function __construct(){
      //såhär burkar jag göra klass objekt
      //du kommer åt den överallt i klassen genom att skriva $database_commands->method();
      $this->database_commands = new Database_commands();
    }

    function register_user($username, $firstname, $lastname, $mail, $passw_1,
    $passw_2) {
      if ($this->check_username($username)) {
        if ($this->match_passwords($passw_1, $passw_2)) {
          $hashed_pass = $this->hash_password($passw_1);
          $this->database_commands->add_user($username, $firstname,
          $lastname, $mail, $hashed_pass);
          return true;
        }
      }
      return false;
    }

    private function hash_password($password) {
      $hashed_passw = password_hash($password, PASSWORD_BCRYPT, array (
      "cost" => 12));
      return $hashed_passw;
    }

    private function match_passwords($passw_1, $passw_2) {
      if ($passw_1 == $passw_2) {
        return true;
      }else {
        return false;
      }
    }

    private function check_username($username) {
      $users_with_name = $this->database_commands->get_username_by_username($username);
      if (sizeof($users_with_name) > 0) {
        return false;
      }else {
        return true;
      }

    }
    function check_loged_in() {
      //kolla session om inloggad
      //retunera true om inloggad annars false
      return False;
    }

    function try_username_and_password($username, $password){
      if($this->username_password_rules($username, $password)){

      }
    }
    private function username_password_rules($username, $password){
      //privat metod för den används bara av den här klassen
      //kolla username och password regler
      // inte för långt/kort
      // inte tomt
      // kanske mer om du kommer på
      //retunera true/false
    }
  }

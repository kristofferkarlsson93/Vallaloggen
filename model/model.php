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

    function check_user_info($username, $passw) {
      if (strlen($username) > 0 && strlen($passw) > 0) {
        $check_username = $this->database_commands->get_username_by_username(
        $username);
        if (sizeof($check_username) > 0) {
          $stored_passw = $this->database_commands->get_password_by_username(
          $username);
          if (password_verify($passw, $stored_passw[0])) {
            return true;
          }
        }
      }
      return false;
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

    function check_strlen($string) {
      if (strlen($string) > 0) {
        return true;
      }
      return false;
    }

    function check_loged_in() {
      //kolla session om inloggad
      //retunera true om inloggad annars false
      return False;
    }


  }

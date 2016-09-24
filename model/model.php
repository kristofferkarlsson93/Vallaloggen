<?php
  include ("model/database_commands.php");

  Class Model {
    private $database_commands;
    function __construct(){
      //såhär burkar jag göra klass objekt
      //du kommer åt den överallt i klassen genom att skriva $database_commands->method();
      $database_commands = new database_commands();
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

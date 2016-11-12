<?php


  class Sessions {

    public function set_logged_in() {
      $_SESSION["logged_in"] = true;
    }

    public function check_logged_in() {
      if(isset($_SESSION["logged_in"])){
        if($_SESSION["logged_in"] == true) {
          return true;
        }
      }
      return false;
    }
    
    public function logg_out() {
      session_unset();
      session_destroy();
    }
  }













?>

<?php
  include ("model/model.php");
  include ("view/startpage.php");
  include ("view/registerpage.php");
  include ("view/searchview.php");
  include ("view/logged_in_startpage.php");
  include ("view/confirm_reg.php");
  include ("view/add_report.php");
  include ("model/sessions.php");


  Class Controller {

    function __construct(){
      $this->startpage = new Startpage("Vallaloggen");
      $this->registerpage = new Registerpage();
      $this->searchview = new Searchview();
      $this->model = new Model();
      $this->logged_in_startpage = new logged_in_startpage();
      $this->confirm_reg = new Confirm_reg();
      $this->add_report = new Add_report();
      $this->sessions = new Sessions();
    }

    function login($username, $passw) {
      if ($this->model->check_user_info($username, $passw)){
        $this->sessions->set_logged_in();
        $html = $this->logged_in_startpage->build_page();
        return $html;
      }else {
        $html = $this->startpage->build_page();
        return $html;
      }

    }

    function search() {
      //Skicka värdena till modell som kollar om det är korrekt inskrivet
      // Sen skickar model till database_commands som anropar databasen
      $temp_type = $this->searchview->get_temp_type();
      $temp = $this->searchview->get_temp();
      $air_hum = $this->searchview->get_air_hum();
      $snow_type = $this->searchview->get_snow_type();
      return "Söksidan";
    }

    function register () {
      if ($this->registerpage->try_register()) {
        $username = $this->registerpage->get_username();
        $firstname = $this->registerpage->get_firstname();
        $lastname = $this->registerpage->get_lastname();
        $mail = $this->registerpage->get_mail();
        $passw_1 = $this->registerpage->get_passw_1();
        $passw_2 = $this->registerpage->get_passw_2();

        $check = $this->model->register_user($username, $firstname, $lastname,
         $mail, $passw_1, $passw_2);
       }else {
         $check = false;
       }

      if ($check == true) {
        $html = $this->confirm_reg->build_page(); //Ersätt med nya loged in sidan.

      }
      else {
      $html = $this->registerpage->build_page();

      }
      return $html;
    }

    function html() {
      if ($this->sessions->check_logged_in()) {
        if($this->startpage->isPOST()){
          if($this->add_report->would_add_report()){
              $html = $this->add_report->build_page();
          }//if post[logout}
            //model->lougout som destroy session
          else{
              $html = $this->logged_in_startpage->build_page();
          }

        }else {
          $html = $this->logged_in_startpage->build_page();
        }
      }elseif($this->sessions->check_logged_in() == false){
        if($this->startpage->isPOST()){
          if ($this->startpage->try_login()) {
            $username = $this->startpage->get_username();
            $passw = $this->startpage->get_password();
            $html = $this->login($username, $passw);
          }
          elseif ($this->registerpage->would_register()) {
            $html = $this->register();
          }
        }else{
          $html = $this->startpage->build_page();
        }

      }
      if ($this->searchview->try_search())  {
          $html = $this->search();
          }

      return $html;
    }
  }

?>

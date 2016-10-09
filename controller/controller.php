<?php
  include ("model/model.php");
  include ("view/startpage.php");
  include ("view/registerpage.php");
  include ("view/searchview.php");


  Class Controller {

    function __construct(){
      $this->startpage = new Startpage("Vallaloggen");
      $this->registerpage = new Registerpage();
      $this->searchview = new Searchview();
      $this->model = new Model();
    }

    function login($username, $passw) {
      //skicka in username och password till model.php och gör checken där
      if (strlen($username)> 0 && strlen($passw) > 0) {
        //Här ska databasanrop och return av ny html-sida ske
        return "Sidan för inloggade
        $username, $passw";
      }
      else {
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
      //Här ska registeringsbehandling initialt ske. en registeringssida ska
      //retuneras.

      //Sen kan du inte i register() kolla om du klickat på den knappen för denna
      // functionen kallas bara när du klickar på register knappen från startsidan
      if ($this->registerpage->try_register()) {
        //skicka skiten till model.
        $username = $this->registerpage->get_username();
        $firstname = $this->registerpage->get_firstname();
        $lastname = $this->registerpage->get_lastname();
        $mail = $this->registerpage->get_mail();
        $passw_1 = $this->registerpage->get_passw_1();
        $passw_2 = $this->registerpage->get_passw_2();
        $check = $this->model->register_user($username, $firstname, $lastname,
         $mail, $passw_1, $passw_2);
        $check = True; //Här kommer true eller false bli av model sen.
      }
      else {
        $check = False;
      }

      if ($check == True) {
        $html = "Du är registerad";

      }
      else {
      $html = $this->registerpage -> build_page();

      }
      return $html;
    }

    function html() {
      //1: kolla om en post har skett
      if($this->startpage->isPOST()){
        //1: kolla om du förösker logga in
        if ($this->startpage->try_login()) {
          $username = $this->startpage->get_username();
          $passw = $this->startpage->get_password();
          $html = $this->login($username, $passw);
        }
        //2: kolla om sökning skett.
        elseif ($this->searchview->try_search())  {
          $html = $this->search();
        }
        //3: kolla om du ska visa registersidan
          //
        elseif ($this->registerpage->would_register()) {
          $html = $this->register();
        }
        //4: kolla om du försöker registrera
          //du lär behöva en check här sen

        //5: annars startsidan/loginsida
        else {
          $startpage = new Startpage("Vallaloggen");
          $html = $startpage->build_page();
        }
      }else {
        //retunerar startsida/loginsidan ifallingen post har skett
        $startpage = new Startpage("Vallaloggen");
        $html = $startpage->build_page();
        return $html;
      }
      // retunera html till index som echo ut skitN
      return $html;
    }
  }

?>

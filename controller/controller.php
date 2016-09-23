<?php
  include ("model/database_commands.php");
  include ("view/startpage.php");
  include ("view/registerpage.php");
  Class Controller {

    function login($username, $passw) {
      if (strlen($username)> 0 && strlen($passw) > 0) {
        //Här ska databasanrop och return av ny html-sida ske
        return "Sidan för inloggade";
      }
      else {
        $startpage = new Startpage("Vallaloggen");
        $html = $startpage->build_page();
        return $html;
      }

    }

    function search($temp_type, $temp, $air_hum, $snow_type) {
      //Här ska uttag ur databasen göras senare och en html-sida med
      //resultat returneras.
      return "Söksidan";
    }

    function register () {
      //Här ska registeringsbehandling initialt ske. en registeringssida ska
      //retuneras.
      $registerpage = new Registerpage();
      if (isset($_POST["register"]) && isset($_POST["username"]) &&
      isset($_POST["firstname"]) && isset($_POST["lastname"]) &&
      isset($_POST["email"]) && isset($_POST["passw_1"]) &&
      isset($_POST["passw_2"])) {
        //skicka skiten till model.
        //$check = databasfunktionen
        $check = False; //Här kommer true eller false bli av model sen.
      }
      else {
        $check = False;
      }

      if ($check == True) {
        $html = "Du är registerad";

      }
      else {
      $html = $registerpage -> build_page();

      }
      return $html;
    }

    function html() {
      //sen; anropa modell. checkloged in. om in, anropa loged n wiev. hela sidan.ny fil.

      if ($_SERVER['REQUEST_METHOD'] == 'POST') {

        if (isset($_POST["username"]) && isset($_POST["passw"])) {
          $username = $_POST["username"];
          $passw = $_POST["passw"];
          $html = $this->login($username, $passw);

        }

        elseif (isset($_POST["temp_type"]) && isset($_POST["temperature"]) &&
          isset($_POST["air_humidity"]) && isset($_POST["snow_type"])) {
          $temp_type = $_POST["temp_type"];
          $temp = $_POST["temperature"];
          $air_hum = $_POST["air_humidity"];
          $snow_type = $_POST["snow_type"];
          $html = $this->search($temp_type, $temp, $air_hum, $snow_type);
        }

        elseif (isset($_POST["register"])) {
          $html = $this->register();
        }

        else {
          $startpage = new Startpage("Vallaloggen");
          $html = $startpage->build_page();
        }
      }

      else {
        $startpage = new Startpage("Vallaloggen");
        $html = $startpage->build_page();
        return $html;
      }
      return $html;

    }
  }

?>

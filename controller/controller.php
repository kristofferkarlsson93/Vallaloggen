<?php
  include ("model/database_commands.php");
  include ("view/startpage.php");
  include ("view/registerpage.php");
  Class Controller {

    function html() {
      //sen; anropa modell. checkloged in. om in, anropa loged n wiev. hela sidan.ny fil.

      $startpage = new Startpage("Vallaloggen");

      if ($_SERVER['REQUEST_METHOD'] == 'POST') {

        if (isset($_POST["username"]) && isset($_POST["passw"]) &&
          strlen($_POST["username"])>0 && strlen($_POST["passw"])>0) {
          $username = $_POST["username"];
          $passw = $_POST["passw"];
          echo "$username";
          return "inlogg";
        }

        elseif (isset($_POST["temp_type"]) && isset($_POST["temperature"]) &&
          isset($_POST["air_humidity"]) && isset($_POST["snow_type"])) {

          $temp_type = $_POST["temp_type"];
          $temp = $_POST["temperature"];
          $air_hum = $_POST["air_humidity"];
          $snow_type = $_POST["snow_type"];
          return "Söken";
        }

        elseif (isset($_POST["register"])) {
          $registerpage = new Registerpage();
          $html = $registerpage -> build_page();
          return $html;
        }

        else {
          $html = $startpage->build_page();
          return $html;
        }
      }

      else {
        $html = $startpage->build_page();
        return $html;
      }

    }
  }

?>

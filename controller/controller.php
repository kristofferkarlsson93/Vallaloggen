<?php
  include ("model/model.php");
  include ("view/startpage.php");
  include ("view/registerpage.php");
  Class Controller {
    private $startpage;
    private $registerpage;
    function __construct(){
      //såhär brukar jag göra klass objekt
      $this->startpage = new Startpage("Vallaloggen");
      $this->registerpage = new Registerpage();
    }
    function login($username, $passw) {
      //skicka in username och password till model.php och gör checken där
      if (strlen($username)> 0 && strlen($passw) > 0) {
        //Här ska databasanrop och return av ny html-sida ske
        return "Sidan för inloggade";
      }
      else {
        $html = $this->startpage->build_page();
        return $html;
      }

    }

    function search($temp_type, $temp, $air_hum, $snow_type) {
      //Skicka värdena till modell som kollar om det är korrekt inskrivet
      // Sen skickar model till database_commands som anropar databasen
      //Här ska uttag ur databasen göras senare och en html-sida med
      //resultat returneras.
      return "Söksidan";
    }

    function register () {
      //Här ska registeringsbehandling initialt ske. en registeringssida ska
      //retuneras.

      // detta ska kollas i view
      //Sen kan du inte i register() kolla om du klickat på den knappen för denna
      // functionen kallas bara när du klickar på register knappen från startsidan
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
      $html = $this->registerpage -> build_page();

      }
      return $html;
    }

    function html() {
      //1: kolla om en post har skett
      if($this->startpage->isPOST()){
        //1: kolla om du förösker logga in
          //bryt ut denna if till startpage
        if (isset($_POST["username"]) && isset($_POST["passw"])) {
          //hämta username och password från view (typ från startpage). ex: $username = $this->startpage->getUsername som retunerar $_POST["username"]
          $username = $_POST["username"];
          $passw = $_POST["passw"];

          $html = $this->login($username, $passw);
        }
        //2: kolla denna if i view
        elseif (isset($_POST["temp_type"]) && isset($_POST["temperature"]) &&
          isset($_POST["air_humidity"]) && isset($_POST["snow_type"])) {
            //hämta dessa posts värden från view
          $temp_type = $_POST["temp_type"];
          $temp = $_POST["temperature"];
          $air_hum = $_POST["air_humidity"];
          $snow_type = $_POST["snow_type"];

          $html = $this->search($temp_type, $temp, $air_hum, $snow_type);
        }
        //3: kolla om du ska visa registersidan
          //även denna if i view
        elseif (isset($_POST["register"])) {
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

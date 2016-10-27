<?php

  class Registerpage {


    function would_register() {
      if (isset($_POST["register"])) {
      return true;
      }else {
        return false;
      }
    }

    function try_register() {
      if (isset($_POST["username"]) && isset($_POST["firstname"]) &&
      isset($_POST["lastname"]) && isset($_POST["email"])
      && isset($_POST["passw_1"]) && isset($_POST["passw_2"])) {
        return true;
      }else {
        return false;
      }
    }

    function get_username() {
      return $_POST["username"];
    }

    function get_firstname() {
      return $_POST["firstname"];
    }

    function get_lastname() {
      return $_POST["lastname"];
    }

    function get_mail() {
      return $_POST["email"];
    }

    function get_passw_1() {
      return $_POST["passw_1"];
    }

    function get_passw_2() {
      return $_POST["passw_2"];
    }

    function build_page() {
      return "
      <!DOCTYPE html>
      <html lang = 'SV'>
        <head>
          <meta charset='UTF-8'>
          <title>Registera</title>
        </head>
        <body>
          <div id='container'>
            <div id ='center_div'>
              <h1>Registera dig</h1><br>
              <div id='register_form'>
                <form action = ? method = 'post'>
                  <input type='text' name='username' value='Användarnamn'>
                  </br>
                  <input type='text' name='firstname' value='Förnamn'>
                  <input type='text' name='lastname' value='Efternamn'>
                  </br>
                  <input type='email' name='email' value='E-post@gmail.com'>
                  </br>
                  <input type='password' name='passw_1' value='Lösenord'>
                  </br>
                  <input type='password' name='passw_2' value='Upprepa lösenord'>
                  <input type='hidden' name='register' value='register'>
                  </br>
                  <input type='submit' value = 'Registera dig'>
                </form>
              </div>
            </div>
          </div>
        </body>
      </html>
        ";
    }
  }





?>

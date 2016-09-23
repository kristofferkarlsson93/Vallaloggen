<?php

  class Registerpage {

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
                <form action = ? methos = 'post'>
                  <input type='text' name='username' placeholder='Användarnamn'>
                  </br>
                  <input type='text' name='firstname' placeholder='Förnamn'>
                  <input type='text' name='lastname' placeholder='Efternamn'>
                  </br>
                  <input type='email' name='email' placeholder='E-post'>
                  </br>
                  <input type='password' name='passw_1' placeholder='Lösenord'>
                  </br>
                  <input type='password' name='passw_2' placeholder='Upprepa lösenord'>
                  </br>
                  <input type='submit' value = 'Registera dig'>
                </form>
              </div>
            </div>
          </div>
        </body>
        ";
    }
  }





?>

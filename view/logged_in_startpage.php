<?php
// In progress. Not in use

class Logged_in_startpage {

  function build_page() {
    return "
    <!DOCTYPE html>
    <html lang = 'SV'>
      <head>
        <meta charset='UTF-8'>
        <link rel='stylesheet' type='text/css' href='/view/style.php'>
        <title> Inloggad </title>
      </head>
      <body>
        <div id='container'>
          <div id='login_div'>
            <h3>Logga in</h3>
            <form action='index.php' method='post'>
              <input type='text' name='username' placeholder='användarnamn'>
              </br>
              <input type='password' name='passw' placeholder ='lösenord'>
              </br>
              <input type='submit' value='Logga in'>
            </form>
            <div id='register'>
              <form action='index.php' method = 'post'>
                <input type='hidden' name='register' value = 'register'>
                <input type='submit' value='registrera ny användare'>
              </form>
          </div>
          </div>

          <div id='center_div'>
            </br></br>
            <h2>Inloggad vy </h2>

            <div id='search'>
              <div class='search_row'>
                <div class='item'>Välj temperatur</div>
                <div class='item'> Luftfuktighet</div>
                <div class='item'> Snötyp</div>
              </div>

              <div class='clear'></div>
              <form action='index.php' method='post'>
                <div class='search_row'>

                  <div class='item'>
                    <input type='radio' name='temp_type' value='air' checked>Luft
                    <input type='radio' name='temp_type' value='snow'>Snö
                  </div>
                  <div class='item'>
                    <select name='air_humidity'>
                      <option value='humidity'>luftfuktighet</option>
                      </select>
                      </div>
                  <div class='item'>
                    <select name='snow_type'>
                      <option value='snowtype'>Snötyp</option>
                    </select>
                  </div>

                </div>
              <div class='clear'></div>
              <div class='search_row'>
                <div class='item'>
                  <select name='temperature'>
                    <option>temperatur</option>
                    <option value='-1'>-1</option>
                  </select>
                </div>
                <div class='clear'></div>
                <div class='search_row'>
                  <div class='item'></div>
                  <div class='item'>
                    <input type='submit'>
                  </div>
                </div>

              </form>

            </div>
          </div
        </div>
        </body>
    </html>";
  }
}











?>

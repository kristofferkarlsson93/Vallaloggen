<?php
// In progress. Not in use

class Logged_in_startpage {

  public function would_logg_out() {
    if (isset($_POST["logg_out_button"])) {
      return true;
    }
    return false;
  }

  public function build_page() {
    return "
    <!DOCTYPE html>
    <html lang = 'SV'>
      <head>
        <meta charset='UTF-8'>
        <link rel='stylesheet' type='text/css' href='/view/style.css'>
        <title> Inloggad </title>
      </head>
      <body>
        <div id='container'>
        <div id='add_report_button'>
          <form action='index.php' method='post'>
            <input type='hidden' name='add_report' value='add_report'>
            <input type='submit' value='Lägg till vallarapport'>
          </form>
          </div>
          <div id='logg_out'>
            <form action='index.php' method='post'>
              <input type='hidden' name='logg_out_button' value='logg_out_button'>
              <input type='submit' value='Logga ut'>
            </form>
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

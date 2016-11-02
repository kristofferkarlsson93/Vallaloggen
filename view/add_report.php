<?php

// I will start to add a few brands, and then brands + products.

class Add_report {

  function would_add_report(){
    if(isset($_POST["add_report"])){
      return true;
    }else {
      return false;
    }
  }

  function build_page() {
    return "
    <!DOCTYPE html>
    <html lang = 'SV'>
      <head>
        <meta charset='UTF-8'>
        <title>Rapportera</title>
      </head>
      <body>
        <form action='index.php' method='post'>
          <input type='text' name='brand'>
          <input type='submit' value='lägg till'
        </form>

      </body>
    </html>";
  }
}
















?>

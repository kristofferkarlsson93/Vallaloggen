<?php


  class Superwebpage
  {

    function __construct($title) {
      $this->title = $title;
    }

    function build_page() {
      $this->build_head();
      $this->build_body();
      $this->build_footer();
      $this->close_script();
    }

    function build_head() {
      echo "
      <!DOCTYPE html>
      <html lang = 'SV'>
        <head>
          <meta charset='UTF-8'>
          <link rel='stylesheet' type='text/css' href='/view/startpage/style.php'>
          <title> $this->title</title>
        </head>";
    }
    function build_body() {

    }

    function build_footer() {

    }

    function close_script() {
      echo"
        </body>
      </html>";
    }

  }







?>

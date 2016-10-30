<?php
  include ("controller/controller.php");
  session_start();
  $controller = new Controller();
  $html = $controller->html();
  echo $html;


?>

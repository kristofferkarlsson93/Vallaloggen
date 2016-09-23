<?php
  include ("controller/controller.php");

  $controller = new Controller();
  $html = $controller->html();
  echo $html;


?>

<?php


class Searchview
{

  function try_search() {
    if (isset($_POST["temp_type"]) && isset($_POST["temperature"]) &&
      isset($_POST["air_humidity"]) && isset($_POST["snow_type"])) {
        return true;
    }else{
      return false;
    }
  }

  function get_temp_type(){
    return $_POST["temp_type"];
  }

  function get_temp() {
    return $_POST["temperature"];
  }

  function get_air_hum() {
    return $air_hum = $_POST["air_humidity"];
  }

  function get_snow_type() {
    return $_POST["snow_type"];
  }
}

















?>

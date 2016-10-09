<?php

  //bra practice att ha class namnet samma namn om filnamnet oc alltid stor bokstav
  Class Database_Commands {

    function db_conn(){
      $servername = "127.0.0.1";
      $username = "root";
      $password = "Hattbojen1";
      $database = "Vallaloggen";
      return mysqli_connect($servername, $username, $password, $database);
    }

    function check_username_and_password($username, $password) {
      //TODO sql kod som kollar om usernmae och password stämmer
      // retunera true eller false beroende på
      return False;
    }

    function get_username_by_username($username) {
      $conn = $this->db_conn();
      $sql = "CALL check_user_existence($username)";
      $result = $conn->query($sql);
      $conn->close();
      return $result->fetch_object();
    }
  }





?>

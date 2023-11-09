<?php
require "calendar.php";

if (isset($_POST["req"])) {
  // (A) LOAD LIBRARY  
  switch ($_POST["req"]) {
      // (B) GET DATES & EVENTS FOR SELECTED PERIOD
    case "get":
      echo json_encode($_CAL->get($_POST["month"], $_POST["year"]));
      break;

      // // (C) SAVE EVENT
    case "save":
      echo $_CAL->save(
        $_POST["status"],
        isset($_POST["id"]) ? $_POST["id"] : null
      ) ? "OK" : $_CAL->error;
      break;

      // // (D) DELETE EVENT
    case "del":
      echo $_CAL->del(
        $_POST["status"],
        isset($_POST['id']) ? $_POST["id"] : null
      ) ? "OK" : $_CAL->error;
      break;
  }
}

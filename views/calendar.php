<?php
class Calendar
{
  // (A) CONSTRUCTOR - CONNECT TO DATABASE
  private $pdo = null;
  private $stmt = null;
  public $error = "";
  function __construct()
  {
    $this->pdo = new PDO(
      "mysql:host=" . DB_HOST . ";dbname=" . DB_NAME . ";charset=" . DB_CHARSET,
      DB_USER,
      DB_PASSWORD,
      [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
      ]
    );
  }

  // (B) DESTRUCTOR - CLOSE DATABASE CONNECTION
  function __destruct()
  {
    if ($this->stmt !== null) {
      $this->stmt = null;
    }
    if ($this->pdo !== null) {
      $this->pdo = null;
    }
  }

  // (C) HELPER - RUN SQL QUERY
  function query($sql, $data = null)
  {
    $this->stmt = $this->pdo->prepare($sql);
    $this->stmt->execute($data);
  }


  // (D) SAVE EVENT

  // (F) GET EVENTS FOR SELECTED PERIOD
  function get($month, $year)
  {
    // (F1) DATE RANGE CALCULATIONS
    $month = $month < 10 ? "0$month" : $month;
    $daysInMonth = cal_days_in_month(CAL_GREGORIAN, $month, $year);
    $dateYM = "{$year}-{$month}-";
    $start = $dateYM . "01 00:00:00";
    $end = $dateYM . $daysInMonth . " 23:59:59";


    $this->query("SELECT * FROM appointment WHERE (
      (`appointment_date_start` BETWEEN ? AND ?)
      OR (`appointment_date_end` BETWEEN ? AND ?)
      OR (`appointment_date_start` <= ? AND `appointment_date_end` >= ?)
    )", [$start, $end, $start, $end, $start, $end]);


    $events = [];
    while ($r = $this->stmt->fetch()) {
      $events[$r["id"]] = [
        "s" => $r["appointment_date_start"], "e" => $r["appointment_date_end"]
      ];
    }

    // (F3) RESULTS
    return count($events) == 0 ? false : $events;
  }
}

// (G) DATABASE SETTINGS - CHANGE TO YOUR OWN!

define("DB_HOST", "localhost");
define("DB_NAME", "doctor_appointment");
define("DB_CHARSET", "utf8mb4");
define("DB_USER", "root");
define("DB_PASSWORD", "");


// (H) NEW CALENDAR OBJECT
$_CAL = new Calendar();

<?php
session_start();
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

  // C) GET EVENTS FOR SELECTED PERIOD
  function get($month, $year)
  {
    // C1) DATE RANGE CALCULATIONS
    $month = $month < 10 ? "0$month" : $month;
    $daysInMonth = cal_days_in_month(CAL_GREGORIAN, $month, $year);
    $dateYM = "{$year}-{$month}-";
    $start = $dateYM . "01 00:00:00";
    $end = $dateYM . $daysInMonth . " 23:59:59";
    $user_id_session = $_SESSION['id'];


    $this->query("SELECT *,
    DATE_FORMAT(appointment_date_start, '%b %d, %Y') AS appointment_date_start
    FROM appointment
    WHERE (
      (`appointment_date_start` BETWEEN ? AND ?)
      OR (`appointment_date_end` BETWEEN ? AND ?)
      OR (`appointment_date_start` <= ? AND `appointment_date_end` >= ?)
    )", [$start, $end, $start, $end, $start, $end]);


    $events = [];
    while ($r = $this->stmt->fetch()) {
      $events[$r["id"]] = [
        "user_id" => $r["user_id"],
        "s" => $r["appointment_date_start"],
        "e" => $r["appointment_date_end"],
        "name" => $r['name'],
        "type" => $r['type'],
        "status" => $r['appointment_status'],
        "user_id_session" => $user_id_session
      ];
    }

    // C3) RESULTS
    return count($events) == 0 ? false : $events;
  }

  function save($status, $id = null)
  {
    if ($id != null) {
      $status = 'APPROVED';
      $sql = "UPDATE `appointment` SET `appointment_status` = ? WHERE `id`= ?";
      $data = [$status, $id];
    }
    $this->query($sql, $data);
    return true;
  }

  function del($status, $id = null){
    if($id != null){
      $status = "REJECTED";
      $sql = "UPDATE `appointment` 
              SET `appointment_status` = ?
              WHERE `id`= ?";
      $data = [$status, $id];
    }
    $this->query($sql, $data);
    return true;
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

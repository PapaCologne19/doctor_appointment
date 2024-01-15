<?php
session_start();
include '../model/connect.php';
include '../model/authenticate.php';


date_default_timezone_set('Asia/Hong_Kong');
$datenow = date("j/m/Y");
$timenow = date("h:i:s A");

// echo $_SESSION['username'];
if (!isset($_SESSION['username'], $_SESSION['password'])) {
  session_start();
  session_destroy();
  header("Location: ../index.php");
  exit(0);

} else {
}


?>


<?php
$database = new Database();
$connect = $database->connect();

$users = new User($connect);
$user = $users->select_bd1();

$bd1 = 0;
$bd2 = 0;
$bd3 = 0;
$hrd = 0;
$finance = 0;
$ppi = 0;
$strat = 0;
$bsg = 0;
$execom = 0;



while ($row = $user->fetch(PDO::FETCH_ASSOC)) {

  if ($row['divisionnya'] == 'BD1' and $row['track'] == '1') {
    $bd1 = $bd1 + 1;
  }

  if ($row['divisionnya'] == 'BD2' and $row['track'] == '1') {
    $bd2 = $bd2 + 1;
  }

  if ($row['divisionnya'] == 'BD3' and $row['track'] == '1') {
    $bd3 = $bd3 + 1;
  }

  if ($row['divisionnya'] == 'HRD' and $row['track'] == '1') {
    $hrd = $hrd + 1;
  }

  if ($row['divisionnya'] == 'FINANCE' and $row['track'] == '1') {
    $finance = $finance + 1;
  }

  if ($row['divisionnya'] == 'STRAT' and $row['track'] == '1') {
    $strat = $strat + 1;
  }

  if ($row['divisionnya'] == 'PPI' and $row['track'] == '1') {
    $ppi = $ppi + 1;
  }
  if ($row['divisionnya'] == 'EXECOM' and $row['track'] == '1') {
    $execom = $execom + 1;
  }
  if ($row['divisionnya'] == 'BSG' and $row['track'] == '1') {
    $bsg = $bsg + 1;
  }



} ?>



<!DOCTYPE html>
<html lang="en">

<head>
  <?php include '../components/header.php'; ?>
  <title></title>
  <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
</head>


<body>
  <?php

  // echo $_SESSION['username'];
  if (!isset($_SESSION['username'], $_SESSION['password'])) {
    session_start();
    session_destroy();
    header("Location: ../index.php");
    exit(0);

  } else {
  }

  if (isset($_SESSION['successMessage'])) { ?>
    <script>
      Swal.fire({
        icon: 'success',
        title: "<?php echo $_SESSION['successMessage']; ?>",
      })
    </script>
    <?php unset($_SESSION['successMessage']);
  } ?>

  <?php
  if (isset($_SESSION['errorMessage'])) { ?>
    <script>
      Swal.fire({
        icon: 'error',
        title: "<?php echo $_SESSION['errorMessage']; ?>",
      })
    </script>
    <?php unset($_SESSION['errorMessage']);
  }
  ?>
  <div class="layout-wrapper layout-content-navbar">
    <div class="layout-container">
      <?php include '../components/sidebar.php'; ?>

      <!-- Main page -->
      <div class="layout-page">
        <?php include '../components/navbar.php'; ?>

        <!-- Content -->
        <div class="content-wrapper mt-3">
          <div class="container">
            <div class="card">
              <img src="../assets/img/icons/brands/pcn_logo.jpg" alt="" sizes="" srcset="" style="max-width:150px">
              <center>
                <div class="card-body">
                  <ul class="nav nav-tabs nav-tabs-bordered">

                    <li class="nav-item">
                      <button class="nav-link active" data-bs-toggle="tab"
                        data-bs-target="#employee-profile-summary">Employee Profile Summary</button>
                    </li>

                    <li class="nav-item">
                      <button class="nav-link" data-bs-toggle="tab"
                        data-bs-target="#employee-profile-summary-count">Details</button>
                    </li>

                  </ul>
                </div>
              </center>

              <div class="tab-content pt-2">
                <div class="tab-pane fade show active employee-profile-summary" id="employee-profile-summary">
                  <div class="container">
                    <form action="profile_info.php" class="form-group" method="POST">
                      <div class="container table-responsive">
                        <hr>
                        <div class="title justify-content-center align-items-center mx-auto text-center">
                          <h4 class="fs-4">
                            EMPLOYEE PROFILE SUMMARY
                          </h4>
                        </div>
                        <hr>

                        <table class="table table-sm" id="example">
                          <thead>
                            <tr>
                              <th style="text-align:center">DIVISION</th>
                              <th style="text-align:center">EMPLOYEE COUNT</th>
                              <th style="text-align:center">COUNT WITH PROFILE</th>
                              <th style="text-align:center">% SHARE</th>
                            </tr>
                          </thead>
                          <tbody>
                            <tr>
                              <td class="text-center">BD1</td>
                              <td style="text-align:center">31</td>
                              <td style="text-align:center">
                                <?php echo $bd1; ?>
                              </td>
                              <td style="text-align:center">
                                <?php echo round((float) $bd1 / 31 * 100) . '%'; ?>
                              </td>


                            </tr>
                            <tr>
                              <td class="text-center">BD2</td>
                              <td style="text-align:center">19</td>
                              <td style="text-align:center">
                                <?php echo $bd2; ?>
                              </td>
                              <td style="text-align:center">
                                <?php echo round((float) $bd2 / 19 * 100) . '%'; ?>
                              </td>
                            </tr>
                            <tr>
                              <td class="text-center">BD3</td>
                              <td style="text-align:center">11</td>
                              <td style="text-align:center">
                                <?php echo $bd3; ?>
                              </td>
                              <td style="text-align:center">
                                <?php echo round((float) $bd3 / 11 * 100) . '%'; ?>
                              </td>
                            </tr>

                            <tr>
                              <td class="text-center">BSG</td>
                              <td style="text-align:center">23</td>
                              <td style="text-align:center">
                                <?php echo $bsg; ?>
                              </td>
                              <td style="text-align:center">
                                <?php echo round((float) $bsg / 23 * 100) . '%'; ?>
                              </td>
                            </tr>

                            <tr>
                              <td class="text-center">FINANCE</td>
                              <td style="text-align:center">26</td>
                              <td style="text-align:center">
                                <?php echo $finance; ?>
                              </td>
                              <td style="text-align:center">
                                <?php echo round((float) $finance / 26 * 100) . '%'; ?>
                              </td>
                            </tr>

                            <tr>
                              <td class="text-center">HRD</td>
                              <td style="text-align:center">19</td>
                              <td style="text-align:center">
                                <?php echo $hrd; ?>
                              </td>
                              <td style="text-align:center">
                                <?php echo round((float) $hrd / 19 * 100) . '%'; ?>
                              </td>
                            </tr>

                            <tr>
                              <td class="text-center">STRAT</td>
                              <td style="text-align:center">9</td>
                              <td style="text-align:center">
                                <?php echo $strat; ?>
                              </td>
                              <td style="text-align:center">
                                <?php echo round((float) $strat / 9 * 100) . '%'; ?>
                              </td>
                            </tr>


                            <tr>
                              <td class="text-center">PPI</td>
                              <td style="text-align:center">3</td>
                              <td style="text-align:center">
                                <?php echo $ppi; ?>
                              </td>
                              <td style="text-align:center">
                                <?php echo round((float) $ppi / 3 * 100) . '%'; ?>
                              </td>

                            </tr>

                            <tr>
                              <td class="text-center">EXECOM</td>
                              <td style="text-align:center">2</td>
                              <td style="text-align:center">
                                <?php echo $execom; ?>
                              </td>
                              <td style="text-align:center">
                                <?php echo round((float) $execom / 2 * 100) . '%'; ?>
                              </td>

                            </tr>

                          </tbody>
                          <!-- <tr>
                        <h2 class="fs-6">
                          <th style="text-align:center">DIVISION</th>
                          <th style="text-align:center">EMPLOYEE COUNT</th>
                          <th style="text-align:center">COUNT WITH PROFILE</th>
                          <th style="text-align:center">% SHARE</th>


                      </tr> -->

                          <tfoot>
                            <tr>
                              <th class="text-center">TOTAL</th>
                              <td style="text-align:center">152</td>
                              <td style="text-align:center">
                                <?php echo $ppi + $strat + $hrd + $finance + $bd3 + $bd2 + $bd1 + $bsg + $execom; ?>
                              </td>
                              <td style="text-align:center">
                                <?php echo round((float) ($ppi + $strat + $hrd + $finance + $bd3 + $bd2 + $bd1 + $bsg + $execom) / 152 * 100) . '%'; ?>
                              </td>
                            </tr>
                          </tfoot>




                        </table>
                      </div>
                  </div>
                </div>
                <div class="tab-pane fade" id="employee-profile-summary-count">
                  <div class="container table-responsive">
                    <hr>
                    <div class="title justify-content-center align-items-center mx-auto text-center">
                      <h4 class="fs-4">
                        EMPLOYEE PROFILE SUMMARY
                      </h4>
                    </div>
                    <hr>
                    <table class="table table-sm">
                      <thead>
                        <tr>
                          <th>Illness</th>
                          <th class="text-center">Number of YES</th>
                          <th class="text-center">Number of NO</th>
                          <th class="text-center">Total</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php
                        $database = new Database();
                        $connect = $database->connect();
                        $users = new User($connect);

                        $tubercolosis_yes = $users->tubercolosis_yes();
                        $tubercolosis_no = $users->tubercolosis_no();
                        $hypertension_yes = $users->hypertension_yes();
                        $hypertension_no = $users->hypertension_no();
                        $diabetes_mellittus_yes = $users->diabetes_mellittus_yes();
                        $diabetes_mellittus_no = $users->diabetes_mellittus_no();
                        $heart_trouble_yes = $users->heart_trouble_yes();
                        $heart_trouble_no = $users->heart_trouble_no();
                        $endocrine_diseases_yes = $users->endocrine_diseases_yes();
                        $endocrine_diseases_no = $users->endocrine_diseases_no();
                        $cancer_tumor_yes = $users->cancer_tumor_yes();
                        $cancer_tumor_no = $users->cancer_tumor_no();
                        $mental_disorder_yes = $users->mental_disorder_yes();
                        $mental_disorder_no = $users->mental_disorder_no();
                        $frequent_headache_yes = $users->frequent_headache_yes();
                        $frequent_headache_no = $users->frequent_headache_no();
                        $chronic_cough_yes = $users->chronic_cough_yes();
                        $chronic_cough_no = $users->chronic_cough_no();
                        $std_yes = $users->std_yes();
                        $std_no = $users->std_no();
                        $hepa_a_yes = $users->hepa_a_yes();
                        $hepa_a_no = $users->hepa_a_no();
                        $hepa_b_yes = $users->hepa_b_yes();
                        $hepa_b_no = $users->hepa_b_no();
                        $aids_hiv_yes = $users->aids_hiv_yes();
                        $aids_hiv_no = $users->aids_hiv_no();
                        $covid19_yes = $users->covid19_yes();
                        $covid19_no = $users->covid19_no();
                        $asthma_yes = $users->asthma_yes();
                        $asthma_no = $users->asthma_no();
                        $rheumatism_yes = $users->rheumatism_yes();
                        $rheumatism_no = $users->rheumatism_no();
                        $physical_injury_yes = $users->physical_injury_yes();
                        $physical_injury_no = $users->physical_injury_no();
                        $hernia_yes = $users->hernia_yes();
                        $hernia_no = $users->hernia_no();
                        $typhoid_yes = $users->typhoid_yes();
                        $typhoid_no = $users->typhoid_no();
                        $stomach_abdomina_yes = $users->stomach_abdomina_yes();
                        $stomach_abdomina_no = $users->stomach_abdomina_no();
                        $kidney_bladder_yes = $users->kidney_bladder_yes();
                        $kidney_bladder_no = $users->kidney_bladder_no();
                        $dizziness_yes = $users->dizziness_yes();
                        $dizziness_no = $users->dizziness_no();
                        $allergies_yes = $users->allergies_yes();
                        $allergies_no = $users->allergies_no();
                        $others_yes = $users->others_yes();
                        $others_no = $users->others_no();
                        $total_yes = $tubercolosis_yes + $hypertension_yes + $diabetes_mellittus_yes + $heart_trouble_yes +
                          $endocrine_diseases_yes + $cancer_tumor_yes + $mental_disorder_yes + $frequent_headache_yes +
                          $chronic_cough_yes + $std_yes + $hepa_a_yes + $hepa_b_yes + $aids_hiv_yes + $covid19_yes + $asthma_yes +
                          $rheumatism_yes + $physical_injury_yes + $hernia_yes + $typhoid_yes + $stomach_abdomina_yes + $kidney_bladder_yes +
                          $dizziness_yes + $allergies_yes + $others_yes;

                        $total_no = $tubercolosis_no + $hypertension_no + $diabetes_mellittus_no + $heart_trouble_no +
                          $endocrine_diseases_no + $cancer_tumor_no + $mental_disorder_no + $frequent_headache_no +
                          $chronic_cough_no + $std_no + $hepa_a_no + $hepa_b_no + $aids_hiv_no + $covid19_no + $asthma_no +
                          $rheumatism_no + $physical_injury_no + $hernia_no + $typhoid_no + $stomach_abdomina_no + $kidney_bladder_no +
                          $dizziness_no + $allergies_no + $others_no;

                        $overall_total = $tubercolosis_yes + $hypertension_yes + $diabetes_mellittus_yes + $heart_trouble_yes +
                          $endocrine_diseases_yes + $cancer_tumor_yes + $mental_disorder_yes + $frequent_headache_yes +
                          $chronic_cough_yes + $std_yes + $hepa_a_yes + $hepa_b_yes + $aids_hiv_yes + $covid19_yes + $asthma_yes +
                          $rheumatism_yes + $physical_injury_yes + $hernia_yes + $typhoid_yes + $stomach_abdomina_yes + $kidney_bladder_yes +
                          $dizziness_yes + $allergies_yes + $others_yes + $tubercolosis_no + $hypertension_no + $diabetes_mellittus_no + $heart_trouble_no +
                          $endocrine_diseases_no + $cancer_tumor_no + $mental_disorder_no + $frequent_headache_no +
                          $chronic_cough_no + $std_no + $hepa_a_no + $hepa_b_no + $aids_hiv_no + $covid19_no + $asthma_no +
                          $rheumatism_no + $physical_injury_no + $hernia_no + $typhoid_no + $stomach_abdomina_no + $kidney_bladder_no +
                          $dizziness_no + $allergies_no + $others_no;
                        ?>
                        <tr>
                          <td>TUBERCOLOSIS</td>
                          <td class="text-center"><a href="detailed_report.php?illness=tubercolosis&status=YES">
                              <?php echo $tubercolosis_yes ?>
                            </a>
                          </td>
                          <td class="text-center">
                            <a href="detailed_report.php?illness=tubercolosis&status=NO">
                              <?php echo $tubercolosis_no ?>
                            </a>
                          </td>
                          <td class="text-center">
                            <?php echo $tubercolosis_yes + $tubercolosis_no ?>
                          </td>
                        </tr>
                        <tr>
                          <td>HYPERTENSION</td>
                          <td class="text-center">
                            <a href="detailed_report.php?illness=hypertension&status=YES">
                              <?php echo $hypertension_yes ?>
                            </a>
                          </td>
                          <td class="text-center">
                            <a href="detailed_report.php?illness=hypertension&status=NO">
                              <?php echo $hypertension_no ?>
                            </a>
                          </td>
                          <td class="text-center">
                            <?php echo $hypertension_yes + $hypertension_no ?>
                          </td>
                        </tr>
                        <tr>
                          <td>DIABETES MELLITTUS</td>
                          <td class="text-center">
                            <a href="detailed_report.php?illness=diabetes_mellittus&status=YES">
                              <?php echo $diabetes_mellittus_yes ?>
                            </a>
                          </td>
                          <td class="text-center">
                            <a href="detailed_report.php?illness=diabetes_mellittus&status=NO">
                              <?php echo $diabetes_mellittus_no ?>
                            </a>
                          </td>
                          <td class="text-center">
                            <?php echo $diabetes_mellittus_yes + $diabetes_mellittus_no ?>
                          </td>
                        </tr>
                        <tr>
                          <td>HEART TROUBLE</td>
                          <td class="text-center">
                            <a href="detailed_report.php?illness=heart_trouble&status=YES">
                              <?php echo $heart_trouble_yes ?>
                            </a>
                          </td>
                          <td class="text-center">
                            <a href="detailed_report.php?illness=heart_trouble&status=NO">
                              <?php echo $heart_trouble_no ?>
                            </a>
                          </td>
                          <td class="text-center">
                            <?php echo $heart_trouble_yes + $heart_trouble_no ?>
                          </td>
                        </tr>
                        <tr>
                          <td>ENDOCRINE DISEASES</td>
                          <td class="text-center">
                            <a href="detailed_report.php?illness=endocrine_diseases&status=YES">
                              <?php echo $endocrine_diseases_yes ?>
                            </a>
                          </td>
                          <td class="text-center">
                            <a href="detailed_report.php?illness=endocrine_diseases&status=NO">
                              <?php echo $endocrine_diseases_no ?>
                            </a>
                          </td>
                          <td class="text-center">
                            <?php echo $endocrine_diseases_yes + $endocrine_diseases_no ?>
                          </td>

                        </tr>
                        <tr>
                          <td>CANCER TUMOR</td>
                          <td class="text-center">
                            <a href="detailed_report.php?illness=cancer_tumor&status=YES">
                              <?php echo $cancer_tumor_yes ?>
                            </a>
                          </td>
                          <td class="text-center">
                            <a href="detailed_report.php?illness=cancer_tumor&status=NO">
                              <?php echo $cancer_tumor_no ?>
                            </a>
                          </td>
                          <td class="text-center">
                            <?php echo $cancer_tumor_yes + $cancer_tumor_no ?>
                          </td>
                        </tr>

                        <tr>
                          <td>MENTAL DISORDER</td>
                          <td class="text-center">
                            <a href="detailed_report.php?illness=mental_disorder&status=YES">
                              <?php echo $mental_disorder_yes ?>
                            </a>
                          </td>
                          <td class="text-center">
                            <a href="detailed_report.php?illness=mental_disorder&status=NO">
                              <?php echo $mental_disorder_no ?>
                            </a>
                          </td>
                          <td class="text-center">
                            <?php echo $mental_disorder_yes + $mental_disorder_no ?>
                          </td>
                        </tr>
                        <tr>
                          <td>FREQUENT HEADACHE</td>
                          <td class="text-center">
                            <a href="detailed_report.php?illness=frequent_headache&status=YES">
                              <?php echo $frequent_headache_yes ?>
                            </a>
                          </td>
                          <td class="text-center">
                            <a href="detailed_report.php?illness=frequent_headache&status=NO">
                              <?php echo $frequent_headache_no ?>
                            </a>
                          </td>
                          <td class="text-center">
                            <?php echo $frequent_headache_yes + $frequent_headache_no ?>
                          </td>
                        </tr>
                        <tr>
                          <td>CHRONIC COUGH</td>
                          <td class="text-center">
                            <a href="detailed_report.php?illness=chronic_cough&status=YES">
                              <?php echo $chronic_cough_yes ?>
                            </a>
                          </td>
                          <td class="text-center">
                            <a href="detailed_report.php?illness=chronic_cough&status=NO">
                              <?php echo $chronic_cough_no ?>
                            </a>
                          </td>
                          <td class="text-center">
                            <?php echo $chronic_cough_yes + $chronic_cough_no ?>
                          </td>
                        </tr>
                        <tr>
                          <td>STD</td>
                          <td class="text-center">
                            <a href="detailed_report.php?illness=std&status=YES">
                              <?php echo $std_yes ?>
                            </a>
                          </td>
                          <td class="text-center">
                            <a href="detailed_report.php?illness=std&status=NO">
                              <?php echo $std_no ?>
                            </a>
                          </td>
                          <td class="text-center">
                            <?php echo $std_yes + $std_no ?>
                          </td>
                        </tr>

                        <tr>
                          <td>HEPA A</td>
                          <td class="text-center">
                            <a href="detailed_report.php?illness=hepa_a&status=YES">
                              <?php echo $hepa_a_yes ?>
                            </a>
                          </td>
                          <td class="text-center">
                            <a href="detailed_report.php?illness=hepa_a&status=NO">
                              <?php echo $hepa_a_no ?>
                            </a>
                          </td>
                          <td class="text-center">
                            <?php echo $hepa_a_yes + $hepa_a_no ?>
                          </td>
                        </tr>

                        <tr>
                          <td>HEPA B</td>
                          <td class="text-center">
                            <a href="detailed_report.php?illness=hepa_b&status=YES">
                              <?php echo $hepa_b_yes ?>
                            </a>
                          </td>
                          <td class="text-center">
                            <a href="detailed_report.php?illness=hepa_b&status=NO">
                              <?php echo $hepa_b_no ?>
                            </a>
                          </td>
                          <td class="text-center">
                            <?php echo $hepa_b_yes + $hepa_b_no ?>
                          </td>
                        </tr>

                        <tr>
                          <td>AIDS HIV</td>
                          <td class="text-center">
                            <a href="detailed_report.php?illness=aids_hiv&status=YES">
                              <?php echo $aids_hiv_yes ?>
                            </a>
                          </td>
                          <td class="text-center">
                            <a href="detailed_report.php?illness=aids_hiv&status=NO">
                              <?php echo $aids_hiv_no ?>
                            </a>
                          </td>
                          <td class="text-center">
                            <?php echo $aids_hiv_yes + $aids_hiv_no ?>
                          </td>
                        </tr>

                        <tr>
                          <td>COVID 19</td>
                          <td class="text-center">
                            <a href="detailed_report.php?illness=covid19&status=YES">
                              <?php echo $covid19_yes ?>
                            </a>
                          </td>
                          <td class="text-center">
                            <a href="detailed_report.php?illness=covid19&status=NO">
                              <?php echo $covid19_no ?>
                            </a>
                          </td>
                          <td class="text-center">
                            <?php echo $covid19_yes + $covid19_no ?>
                          </td>
                        </tr>

                        <tr>
                          <td>ASTHMA</td>
                          <td class="text-center">
                            <a href="detailed_report.php?illness=asthma&status=YES">
                              <?php echo $asthma_yes ?>
                            </a>
                          </td>
                          <td class="text-center">
                            <a href="detailed_report.php?illness=asthma&status=NO">
                              <?php echo $asthma_no ?>
                            </a>
                          </td>
                          <td class="text-center">
                            <?php echo $asthma_yes + $asthma_no ?>
                          </td>
                        </tr>

                        <tr>
                          <td>RHEUMATISM</td>
                          <td class="text-center">
                            <a href="detailed_report.php?illness=rheumatism&status=YES">
                              <?php echo $rheumatism_yes ?>
                            </a>
                          </td>
                          <td class="text-center">
                            <a href="detailed_report.php?illness=rheumatism&status=NO">
                              <?php echo $rheumatism_no ?>
                            </a>
                          </td>
                          <td class="text-center">
                            <?php echo $rheumatism_yes + $rheumatism_no ?>
                          </td>
                        </tr>

                        <tr>
                          <td>PHYSICAL INJURY</td>
                          <td class="text-center">
                            <a href="detailed_report.php?illness=physical_injury&status=YES">
                              <?php echo $physical_injury_yes ?>
                            </a>
                          </td>
                          <td class="text-center">
                            <a href="detailed_report.php?illness=physical_injury&status=NO">
                              <?php echo $physical_injury_no ?>
                            </a>
                          </td>
                          <td class="text-center">
                            <?php echo $physical_injury_yes + $physical_injury_no ?>
                          </td>
                        </tr>

                        <tr>
                          <td>HERNIA</td>
                          <td class="text-center">
                            <a href="detailed_report.php?illness=hernia&status=YES">
                              <?php echo $hernia_yes ?>
                            </a>
                          </td>
                          <td class="text-center">
                            <a href="detailed_report.php?illness=hernia&status=NO">
                              <?php echo $hernia_no ?>
                            </a>
                          </td>
                          <td class="text-center">
                            <?php echo $hernia_yes + $hernia_no ?>
                          </td>
                        </tr>

                        <tr>
                          <td>TYPHOID</td>
                          <td class="text-center">
                            <a href="detailed_report.php?illness=typhoid&status=YES">
                              <?php echo $typhoid_yes ?>
                            </a>
                          </td>
                          <td class="text-center">
                            <a href="detailed_report.php?illness=typhoid&status=NO">
                              <?php echo $typhoid_no ?>
                            </a>
                          </td>
                          <td class="text-center">
                            <?php echo $typhoid_yes + $typhoid_no ?>
                          </td>
                        </tr>

                        <tr>
                          <td>STOMACH ABDOMINA</td>
                          <td class="text-center">
                            <a href="detailed_report.php?illness=stomach_abdomina&status=YES">
                              <?php echo $stomach_abdomina_yes ?>
                            </a>
                          </td>
                          <td class="text-center">
                            <a href="detailed_report.php?illness=stomach_abdomina&status=NO">
                              <?php echo $stomach_abdomina_no ?>
                            </a>
                          </td>
                          <td class="text-center">
                            <?php echo $stomach_abdomina_yes + $stomach_abdomina_no ?>
                          </td>
                        </tr>

                        <tr>
                          <td>KIDNEY BLADDER</td>
                          <td class="text-center">
                            <a href="detailed_report.php?illness=kidney_bladder&status=YES">
                              <?php echo $kidney_bladder_yes ?>
                            </a>
                          </td>
                          <td class="text-center">
                            <a href="detailed_report.php?illness=kidney_bladder&status=NO">
                              <?php echo $kidney_bladder_no ?>
                            </a>
                          </td>
                          <td class="text-center">
                            <?php echo $kidney_bladder_yes + $kidney_bladder_no ?>
                          </td>
                        </tr>

                        <tr>
                          <td>DIZZINESS</td>
                          <td class="text-center">
                            <a href="detailed_report.php?illness=dizziness&status=YES">
                              <?php echo $dizziness_yes ?>
                            </a>
                          </td>
                          <td class="text-center">
                            <a href="detailed_report.php?illness=dizziness&status=NO">
                              <?php echo $dizziness_no ?>
                            </a>
                          </td>
                          <td class="text-center">
                            <?php echo $dizziness_yes + $dizziness_no ?>
                          </td>
                        </tr>

                        <tr>
                          <td>ALLERGIES</td>
                          <td class="text-center">
                            <a href="detailed_report.php?illness=allergies&status=YES">
                              <?php echo $allergies_yes ?>
                            </a>
                          </td>
                          <td class="text-center">
                            <a href="detailed_report.php?illness=allergies&status=NO">
                              <?php echo $allergies_no ?>
                            </a>
                          </td>
                          <td class="text-center">
                            <?php echo $allergies_yes + $allergies_no ?>
                          </td>
                        </tr>

                        <tr>
                          <td>OTHERS</td>
                          <td class="text-center">
                            <a href="detailed_report.php?illness=othersv&status=YES">
                              <?php echo $others_yes ?>
                            </a>
                          </td>
                          <td class="text-center">
                            <a href="detailed_report.php?illness=othersv&status=NO">
                              <?php echo $others_no ?>
                            </a>
                          </td>
                          <td class="text-center">
                            <?php echo $others_yes + $others_no ?>
                          </td>
                        </tr>
                      </tbody>
                      <tfoot>
                        <td></td>
                        <th class="text-center">Total:
                          <?php echo $total_yes ?>
                        </th>
                        <th class="text-center">Total:
                          <?php echo $total_no ?>
                        </th>
                        <th class="text-center">Total:
                          <?php echo $overall_total ?>
                        </th>
                      </tfoot>
                    </table>

                    <hr>
                    <div class="title justify-content-center align-items-center mx-auto text-center">
                      <h4 class="fs-4">
                        VITALS
                      </h4>
                    </div>
                    <hr>
                    <table class="table">
                      <thead>
                        <tr>
                          <th>Vitals</th>
                          <th>Total</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php
                        $blood_pressure = $users->blood_pressure();
                        $bmi = $users->bmi();
                        ?>
                        <tr>
                          <td>BLOOD PRESSURE</td>
                          <td>
                            <a href="vital_information.php?vitals=blood_presure">
                              <?php echo $blood_pressure ?>
                            </a>
                          </td>
                        </tr>
                        <tr>
                          <td>BMI</td>
                          <td>
                            <a href="vital_information.php?vitals=bmi">
                              <?php echo $bmi ?>
                            </a>
                          </td>
                        </tr>
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>

            </div>
            <center>
              <div class="col-md-12 mt-4 mb-5">
                <!-- <button type="submit" name="submit_profile" class="btn btn-info">Submit</button> -->
                <button type="button" class="btn btn-danger"
                  onclick="location.href = 'calendar_doctor.php'">Exit</button>
              </div>
            </center>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
  </div>
  <?php include '../components/footer.php'; ?>
</body>

</html>
<?php
session_start();
include '../model/connect.php';
include '../model/authenticate.php';
?>
<!DOCTYPE html>
<html lang="en">



<head>
    <?php include '../components/header.php'; ?>
    <title></title>
</head>

<body>
    <?php
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
                            <div class="container">
                                <hr>
                                <div class="title justify-content-center align-items-center mx-auto text-center">
                                    <h4 class="fs-4">
                                        MEDICAL PROFILE
                                    </h4>
                                </div>
                                <hr>
                                <div class="container px-5">
                                    <?php

                                    if (isset($_POST['submit_profile'])) {
                                        $database = new Database();
                                        $connect = $database->connect();
                                        $id = $_POST['transfer'];

                                        $users = new User($connect);
                                        $user = $users->select_profile2($id);


                                        $row = $user->fetch(PDO::FETCH_ASSOC);
                                        ?>
                                                <form action="action.php" class="form-group" method="POST">
                                                    <h2 class="fs-6">NAME : <?php echo $row['LAST_NAME'] . ", " . $row['FIRST_NAME'] . " " . $row['MIDDLE_NAME'] ?></h2>
                                                    <h2 class="fs-6">ID NUMBER # : <?php echo $row['ID_NUMBER'] ?></h2>
                                                    <h2 class="fs-6">CONTACT # : <?php echo $row['MOBILE_NUMBER'] ?></h2>

                                                    <input type="hidden" name="vital_id" id="" value="<?php echo $row['ID'] ?>">
                                                    <input type="hidden" name="vname" id="" value="<?php echo $row['LAST_NAME'] . ", " . $row['FIRST_NAME'] . " " . $row['MIDDLE_NAME'] ?>">
                                                    <input type="hidden" name="vid" id="" value="<?php echo $row['ID_NUMBER'] ?>">
                                                    <input type="hidden" name="vcontact" id="" value="<?php echo $row['divisionnya'] ?>">
                                                    <HR>

                                                <div class="row mt-1">
                                                        <div class="col-md-3">
                                                            <label for="" class="form-label">Tubercolosis</label>
                                                        </div>
                                                        <div class="col-md-1">
                                                                        <div class="form-check">
                                                                            <input class="form-check-input" type="radio" value="NO" name="tubercolosis" id="tubercolosis1" checked>
                                                                            <label class="form-check-label" for="tubercolosis1">
                                                                                NO
                                                                            </label>
                                                                        </div>
                                                        </div>
                                                        <div class="col-md-2">

                                                                        <div class="form-check mb-3">
                                                                            <input class="form-check-input" type="radio" value="YES" name="tubercolosis" id="tubercolosis2">
                                                                            <label class="form-check-label" for="tubercolosis2">
                                                                                YES
                                                                            </label>
                                                                        </div>
                                                         </div>   
                                           
                                                        <div class="col-md-6">
                                                        <input type="text" name="tubercolosisv" id="tubercolosisv" class="form-control" >
                                        
                                                        </div>
                                                    </div>

                                         <hr>


                                         <div class="row mt-1">
                                                        <div class="col-md-3">
                                                            <label for="" class="form-label">Hypertension</label>
                                                        </div>
                                                        <div class="col-md-1">
                                                                        <div class="form-check">
                                                                            <input class="form-check-input" type="radio" value="NO" name="hypertension" id="hypertension1" checked>
                                                                            <label class="form-check-label" for="hypertension1">
                                                                                NO
                                                                            </label>
                                                                        </div>
                                                        </div>
                                                        <div class="col-md-2">

                                                                        <div class="form-check mb-3">
                                                                            <input class="form-check-input" type="radio" value="YES" name="hypertension" id="hypertension2">
                                                                            <label class="form-check-label" for="hypertension2">
                                                                                YES
                                                                            </label>
                                                                        </div>
                                                         </div>   
                                           
                                                        <div class="col-md-6">
                                                        <input type="text" name="hypertensionv" id="hypertensionv" class="form-control" >
                                        
                                                        </div>
                                                    </div>

                                         <hr>

                                         <div class="row mt-1">
                                                        <div class="col-md-3">
                                                            <label for="" class="form-label">Diabetes Mellittus</label>
                                                        </div>
                                                        <div class="col-md-1">
                                                                        <div class="form-check">
                                                                            <input class="form-check-input" type="radio" value="NO" name="diabetes_mellittus" id="diabetes_mellittus1" checked>
                                                                            <label class="form-check-label" for="diabetes_mellittus1">
                                                                                NO
                                                                            </label>
                                                                        </div>
                                                        </div>
                                                        <div class="col-md-2">

                                                                        <div class="form-check mb-3">
                                                                            <input class="form-check-input" type="radio" value="YES" name="diabetes_mellittus" id="diabetes_mellittus2">
                                                                            <label class="form-check-label" for="diabetes_mellittus2">
                                                                                YES
                                                                            </label>
                                                                        </div>
                                                         </div>   
                                           
                                                        <div class="col-md-6">
                                                        <input type="text" name="diabetes_mellittusv" id="diabetes_mellittusv" class="form-control" >
                                        
                                                        </div>
                                                    </div>

                                         <hr>

                             
                                         <div class="row mt-1">
                                                        <div class="col-md-3">
                                                            <label for="" class="form-label">Heart Trouble</label>
                                                        </div>
                                                        <div class="col-md-1">
                                                                        <div class="form-check">
                                                                            <input class="form-check-input" type="radio" value="NO" name="heart_trouble" id="heart_trouble1" checked>
                                                                            <label class="form-check-label" for="heart_trouble1">
                                                                                NO
                                                                            </label>
                                                                        </div>
                                                        </div>
                                                        <div class="col-md-2">

                                                                        <div class="form-check mb-3">
                                                                            <input class="form-check-input" type="radio" value="YES" name="heart_trouble" id="heart_trouble2">
                                                                            <label class="form-check-label" for="heart_trouble2">
                                                                                YES
                                                                            </label>
                                                                        </div>
                                                         </div>   
                                           
                                                        <div class="col-md-6">
                                                        <input type="text" name="heart_troublev" id="heart_troublev" class="form-control" >
                                        
                                                        </div>
                                                    </div>

                                         <hr>


                                         <div class="row mt-1">
                                                        <div class="col-md-3">
                                                            <label for="" class="form-label">Endocrine Diseases</label>
                                                        </div>
                                                        <div class="col-md-1">
                                                                        <div class="form-check">
                                                                            <input class="form-check-input" type="radio" value="NO" name="endocrine_deseases" id="endocrine_deseases1" checked>
                                                                            <label class="form-check-label" for="endocrine_deseases1">
                                                                                NO
                                                                            </label>
                                                                        </div>
                                                        </div>
                                                        <div class="col-md-2">

                                                                        <div class="form-check mb-3">
                                                                            <input class="form-check-input" type="radio" value="YES" name="endocrine_deseases" id="endocrine_deseases2">
                                                                            <label class="form-check-label" for="endocrine_deseases2">
                                                                                YES
                                                                            </label>
                                                                        </div>
                                                         </div>   
                                           
                                                        <div class="col-md-6">
                                                        <input type="text" name="endocrine_deseasesv" id="endocrine_deseasesv" class="form-control" >
                                        
                                                        </div>
                                                    </div>

                                         <hr>

                                         <div class="row mt-1">
                                                        <div class="col-md-3">
                                                            <label for="" class="form-label">Cancer / Tumor</label>
                                                        </div>
                                                        <div class="col-md-1">
                                                                        <div class="form-check">
                                                                            <input class="form-check-input" type="radio" value="NO" name="cancel_tumor" id="cancel_tumor1" checked>
                                                                            <label class="form-check-label" for="cancel_tumor1">
                                                                                NO
                                                                            </label>
                                                                        </div>
                                                        </div>
                                                        <div class="col-md-2">

                                                                        <div class="form-check mb-3">
                                                                            <input class="form-check-input" type="radio" value="YES" name="cancel_tumor" id="cancel_tumor2">
                                                                            <label class="form-check-label" for="cancel_tumor2">
                                                                                YES
                                                                            </label>
                                                                        </div>
                                                         </div>   
                                           
                                                        <div class="col-md-6">
                                                        <input type="text" name="cancel_tumorv" id="cancel_tumorv" class="form-control" >
                                        
                                                        </div>
                                                    </div>

                                         <hr>

                                         <div class="row mt-1">
                                                        <div class="col-md-3">
                                                            <label for="" class="form-label">Mental Disorder</label>
                                                        </div>
                                                        <div class="col-md-1">
                                                                        <div class="form-check">
                                                                            <input class="form-check-input" type="radio" value="NO" name="mental_disorder" id="mental_disorder1" checked>
                                                                            <label class="form-check-label" for="mental_disorder1">
                                                                                NO
                                                                            </label>
                                                                        </div>
                                                        </div>
                                                        <div class="col-md-2">

                                                                        <div class="form-check mb-3">
                                                                            <input class="form-check-input" type="radio" value="YES" name="mental_disorder" id="mental_disorder2">
                                                                            <label class="form-check-label" for="mental_disorder2">
                                                                                YES
                                                                            </label>
                                                                        </div>
                                                         </div>   
                                           
                                                        <div class="col-md-6">
                                                        <input type="text" name="mental_disorderv" id="mental_disorderv" class="form-control" >
                                        
                                                        </div>
                                                    </div>

                                         <hr>

                             
                                         <div class="row mt-1">
                                                        <div class="col-md-3">
                                                            <label for="" class="form-label">Frequent Headache</label>
                                                        </div>
                                                        <div class="col-md-1">
                                                                        <div class="form-check">
                                                                            <input class="form-check-input" type="radio" value="NO" name="frequent_headache" id="frequent_headache1" checked>
                                                                            <label class="form-check-label" for="frequent_headache1">
                                                                                NO
                                                                            </label>
                                                                        </div>
                                                        </div>
                                                        <div class="col-md-2">

                                                                        <div class="form-check mb-3">
                                                                            <input class="form-check-input" type="radio" value="YES" name="frequent_headache" id="frequent_headache2">
                                                                            <label class="form-check-label" for="frequent_headache2">
                                                                                YES
                                                                            </label>
                                                                        </div>
                                                         </div>   
                                           
                                                        <div class="col-md-6">
                                                        <input type="text" name="frequent_headachev" id="frequent_headachev" class="form-control" >
                                        
                                                        </div>
                                                    </div>

                                         <hr>

                                         <div class="row mt-1">
                                                        <div class="col-md-3">
                                                            <label for="" class="form-label">Chronic Cough</label>
                                                        </div>
                                                        <div class="col-md-1">
                                                                        <div class="form-check">
                                                                            <input class="form-check-input" type="radio" value="NO" name="chronic_cough" id="chronic_cough1" checked>
                                                                            <label class="form-check-label" for="chronic_cough1">
                                                                                NO
                                                                            </label>
                                                                        </div>
                                                        </div>
                                                        <div class="col-md-2">

                                                                        <div class="form-check mb-3">
                                                                            <input class="form-check-input" type="radio" value="YES" name="chronic_cough" id="chronic_cough2">
                                                                            <label class="form-check-label" for="chronic_cough2">
                                                                                YES
                                                                            </label>
                                                                        </div>
                                                         </div>   
                                           
                                                        <div class="col-md-6">
                                                        <input type="text" name="chronic_coughv" id="chronic_coughv" class="form-control" >
                                        
                                                        </div>
                                                    </div>

                                         <hr>
                             
                                         <div class="row mt-1">
                                                        <div class="col-md-3">
                                                            <label for="" class="form-label">STD</label>
                                                        </div>
                                                        <div class="col-md-1">
                                                                        <div class="form-check">
                                                                            <input class="form-check-input" type="radio" value="NO" name="std" id="std1" checked>
                                                                            <label class="form-check-label" for="std1">
                                                                                NO
                                                                            </label>
                                                                        </div>
                                                        </div>
                                                        <div class="col-md-2">

                                                                        <div class="form-check mb-3">
                                                                            <input class="form-check-input" type="radio" value="YES" name="std" id="std2">
                                                                            <label class="form-check-label" for="std2">
                                                                                YES
                                                                            </label>
                                                                        </div>
                                                         </div>   
                                           
                                                        <div class="col-md-6">
                                                        <input type="text" name="stdv" id="stdv" class="form-control" >
                                        
                                                        </div>
                                                    </div>

                                         <hr>

                                         <div class="row mt-1">
                                                        <div class="col-md-3">
                                                            <label for="" class="form-label">HEPA B</label>
                                                        </div>
                                                        <div class="col-md-1">
                                                                        <div class="form-check">
                                                                            <input class="form-check-input" type="radio" value="NO" name="hepa_b" id="hepa_b1" checked>
                                                                            <label class="form-check-label" for="hepa_b1">
                                                                                NO
                                                                            </label>
                                                                        </div>
                                                        </div>
                                                        <div class="col-md-2">

                                                                        <div class="form-check mb-3">
                                                                            <input class="form-check-input" type="radio" value="YES" name="hepa_b" id="hepa_b2">
                                                                            <label class="form-check-label" for="hepa_b2">
                                                                                YES
                                                                            </label>
                                                                        </div>
                                                         </div>   
                                           
                                                        <div class="col-md-6">
                                                        <input type="text" name="hepa_bv" id="hepa_bv" class="form-control" >
                                        
                                                        </div>
                                                    </div>

                                         <hr>


                                         <div class="row mt-1">
                                                        <div class="col-md-3">
                                                            <label for="" class="form-label">HEPA A</label>
                                                        </div>
                                                        <div class="col-md-1">
                                                                        <div class="form-check">
                                                                            <input class="form-check-input" type="radio" value="NO" name="hepa_a" id="hepa_a1" checked>
                                                                            <label class="form-check-label" for="hepa_a1">
                                                                                NO
                                                                            </label>
                                                                        </div>
                                                        </div>
                                                        <div class="col-md-2">

                                                                        <div class="form-check mb-3">
                                                                            <input class="form-check-input" type="radio" value="YES" name="hepa_a" id="hepa_a2">
                                                                            <label class="form-check-label" for="hepa_a2">
                                                                                YES
                                                                            </label>
                                                                        </div>
                                                         </div>   
                                           
                                                        <div class="col-md-6">
                                                        <input type="text" name="hepa_av" id="hepa_av" class="form-control" >
                                        
                                                        </div>
                                                    </div>

                                         <hr>
                             
                                         <div class="row mt-1">
                                                        <div class="col-md-3">
                                                            <label for="" class="form-label">AIDS / HIV</label>
                                                        </div>
                                                        <div class="col-md-1">
                                                                        <div class="form-check">
                                                                            <input class="form-check-input" type="radio" value="NO" name="aids_hiv" id="aids_hiv1" checked>
                                                                            <label class="form-check-label" for="aids_hiv1">
                                                                                NO
                                                                            </label>
                                                                        </div>
                                                        </div>
                                                        <div class="col-md-2">

                                                                        <div class="form-check mb-3">
                                                                            <input class="form-check-input" type="radio" value="YES" name="aids_hiv" id="aids_hiv2">
                                                                            <label class="form-check-label" for="aids_hiv2">
                                                                                YES
                                                                            </label>
                                                                        </div>
                                                         </div>   
                                           
                                                        <div class="col-md-6">
                                                        <input type="text" name="aids_hivv" id="aids_hivv" class="form-control" >
                                        
                                                        </div>
                                                    </div>

                                         <hr>

                                         <div class="row mt-1">
                                                        <div class="col-md-3">
                                                            <label for="" class="form-label">COVID 19</label>
                                                        </div>
                                                        <div class="col-md-1">
                                                                        <div class="form-check">
                                                                            <input class="form-check-input" type="radio" value="NO" name="covid19" id="covid191" checked>
                                                                            <label class="form-check-label" for="covid191">
                                                                                NO
                                                                            </label>
                                                                        </div>
                                                        </div>
                                                        <div class="col-md-2">

                                                                        <div class="form-check mb-3">
                                                                            <input class="form-check-input" type="radio" value="YES" name="covid19" id="covid192">
                                                                            <label class="form-check-label" for="covid192">
                                                                                YES
                                                                            </label>
                                                                        </div>
                                                         </div>   
                                           
                                                        <div class="col-md-6">
                                                        <input type="text" name="covid19v" id="covid19v" class="form-control" >
                                        
                                                        </div>
                                                    </div>

                                         <hr>


                                         <div class="row mt-1">
                                                        <div class="col-md-3">
                                                            <label for="" class="form-label">ASTHMA</label>
                                                        </div>
                                                        <div class="col-md-1">
                                                                        <div class="form-check">
                                                                            <input class="form-check-input" type="radio" value="NO" name="asthma" id="asthma1" checked>
                                                                            <label class="form-check-label" for="asthma1">
                                                                                NO
                                                                            </label>
                                                                        </div>
                                                        </div>
                                                        <div class="col-md-2">

                                                                        <div class="form-check mb-3">
                                                                            <input class="form-check-input" type="radio" value="YES" name="asthma" id="asthma2">
                                                                            <label class="form-check-label" for="asthma2">
                                                                                YES
                                                                            </label>
                                                                        </div>
                                                         </div>   
                                           
                                                        <div class="col-md-6">
                                                        <input type="text" name="asthmav" id="asthmav" class="form-control" >
                                        
                                                        </div>
                                                    </div>

                                         <hr>


                             

                                         <div class="row mt-1">
                                                        <div class="col-md-3">
                                                            <label for="" class="form-label">RHEUMATISM</label>
                                                        </div>
                                                        <div class="col-md-1">
                                                                        <div class="form-check">
                                                                            <input class="form-check-input" type="radio" value="NO" name="rheumatism" id="rheumatism1" checked>
                                                                            <label class="form-check-label" for="rheumatism1">
                                                                                NO
                                                                            </label>
                                                                        </div>
                                                        </div>
                                                        <div class="col-md-2">

                                                                        <div class="form-check mb-3">
                                                                            <input class="form-check-input" type="radio" value="YES" name="rheumatism" id="rheumatism2">
                                                                            <label class="form-check-label" for="rheumatism2">
                                                                                YES
                                                                            </label>
                                                                        </div>
                                                         </div>   
                                           
                                                        <div class="col-md-6">
                                                        <input type="text" name="rheumatismv" id="rheumatismv" class="form-control" >
                                        
                                                        </div>
                                                    </div>

                                         <hr>


                                         <div class="row mt-1">
                                                        <div class="col-md-3">
                                                            <label for="" class="form-label">PHYSICAL INJURY</label>
                                                        </div>
                                                        <div class="col-md-1">
                                                                        <div class="form-check">
                                                                            <input class="form-check-input" type="radio" value="NO" name="physical_injury" id="physical_injury1" checked>
                                                                            <label class="form-check-label" for="physical_injury1">
                                                                                NO
                                                                            </label>
                                                                        </div>
                                                        </div>
                                                        <div class="col-md-2">

                                                                        <div class="form-check mb-3">
                                                                            <input class="form-check-input" type="radio" value="YES" name="physical_injury" id="physical_injury2">
                                                                            <label class="form-check-label" for="physical_injury2">
                                                                                YES
                                                                            </label>
                                                                        </div>
                                                         </div>   
                                           
                                                        <div class="col-md-6">
                                                        <input type="text" name="physical_injuryv" id="physical_injuryv" class="form-control" >
                                        
                                                        </div>
                                                    </div>

                                         <hr>



                                         <div class="row mt-1">
                                                        <div class="col-md-3">
                                                            <label for="" class="form-label">HERNIA</label>
                                                        </div>
                                                        <div class="col-md-1">
                                                                        <div class="form-check">
                                                                            <input class="form-check-input" type="radio" value="NO" name="hernia" id="hernia1" checked>
                                                                            <label class="form-check-label" for="hernia1">
                                                                                NO
                                                                            </label>
                                                                        </div>
                                                        </div>
                                                        <div class="col-md-2">

                                                                        <div class="form-check mb-3">
                                                                            <input class="form-check-input" type="radio" value="YES" name="hernia" id="hernia2">
                                                                            <label class="form-check-label" for="hernia2">
                                                                                YES
                                                                            </label>
                                                                        </div>
                                                         </div>   
                                           
                                                        <div class="col-md-6">
                                                        <input type="text" name="herniav" id="herniav" class="form-control" >
                                        
                                                        </div>
                                                    </div>

                                         <hr>

                                         <div class="row mt-1">
                                                        <div class="col-md-3">
                                                            <label for="" class="form-label">TYPHOID</label>
                                                        </div>
                                                        <div class="col-md-1">
                                                                        <div class="form-check">
                                                                            <input class="form-check-input" type="radio" value="NO" name="typhoid" id="typhoid1" checked>
                                                                            <label class="form-check-label" for="typhoid1">
                                                                                NO
                                                                            </label>
                                                                        </div>
                                                        </div>
                                                        <div class="col-md-2">

                                                                        <div class="form-check mb-3">
                                                                            <input class="form-check-input" type="radio" value="YES" name="typhoid" id="typhoid2">
                                                                            <label class="form-check-label" for="typhoid2">
                                                                                YES
                                                                            </label>
                                                                        </div>
                                                         </div>   
                                           
                                                        <div class="col-md-6">
                                                        <input type="text" name="typhoidv" id="typhoidv" class="form-control" >
                                        
                                                        </div>
                                                    </div>

                                         <hr>

                             
                                         <div class="row mt-1">
                                                        <div class="col-md-3">
                                                            <label for="" class="form-label">STOMACH OR ABDOMINAL PAIN</label>
                                                        </div>
                                                        <div class="col-md-1">
                                                                        <div class="form-check">
                                                                            <input class="form-check-input" type="radio" value="NO" name="stomach_abdominal" id="stomach_abdominal1" checked>
                                                                            <label class="form-check-label" for="stomach_abdominal1">
                                                                                NO
                                                                            </label>
                                                                        </div>
                                                        </div>
                                                        <div class="col-md-2">

                                                                        <div class="form-check mb-3">
                                                                            <input class="form-check-input" type="radio" value="YES" name="stomach_abdominal" id="stomach_abdominal2">
                                                                            <label class="form-check-label" for="stomach_abdominal2">
                                                                                YES
                                                                            </label>
                                                                        </div>
                                                         </div>   
                                           
                                                        <div class="col-md-6">
                                                        <input type="text" name="stomach_abdominalv" id="stomach_abdominalv" class="form-control" >
                                        
                                                        </div>
                                                    </div>

                                         <hr>


                                         <div class="row mt-1">
                                                        <div class="col-md-3">
                                                            <label for="" class="form-label">KIDNEY OR ABDOMINAL PAIN</label>
                                                        </div>
                                                        <div class="col-md-1">
                                                                        <div class="form-check">
                                                                            <input class="form-check-input" type="radio" value="NO" name="kidney_bladder" id="kidney_bladder1" checked>
                                                                            <label class="form-check-label" for="kidney_bladder1">
                                                                                NO
                                                                            </label>
                                                                        </div>
                                                        </div>
                                                        <div class="col-md-2">

                                                                        <div class="form-check mb-3">
                                                                            <input class="form-check-input" type="radio" value="YES" name="kidney_bladder" id="kidney_bladder2">
                                                                            <label class="form-check-label" for="kidney_bladder2">
                                                                                YES
                                                                            </label>
                                                                        </div>
                                                         </div>   
                                           
                                                        <div class="col-md-6">
                                                        <input type="text" name="kidney_bladderv" id="kidney_bladderv" class="form-control" >
                                        
                                                        </div>
                                                    </div>

                                         <hr>

                                         <div class="row mt-1">
                                                        <div class="col-md-3">
                                                            <label for="" class="form-label">DIZZINESS</label>
                                                        </div>
                                                        <div class="col-md-1">
                                                                        <div class="form-check">
                                                                            <input class="form-check-input" type="radio" value="NO" name="dizzeness" id="dizzeness1" checked>
                                                                            <label class="form-check-label" for="dizzeness1">
                                                                                NO
                                                                            </label>
                                                                        </div>
                                                        </div>
                                                        <div class="col-md-2">

                                                                        <div class="form-check mb-3">
                                                                            <input class="form-check-input" type="radio" value="YES" name="dizzeness" id="dizzeness2">
                                                                            <label class="form-check-label" for="dizzeness2">
                                                                                YES
                                                                            </label>
                                                                        </div>
                                                         </div>   
                                           
                                                        <div class="col-md-6">
                                                        <input type="text" name="dizzenessv" id="dizzenessv" class="form-control" >
                                        
                                                        </div>
                                                    </div>

                                         <hr>


                             
                                         <div class="row mt-1">
                                                        <div class="col-md-3">
                                                            <label for="" class="form-label">ALLERGIES</label>
                                                        </div>
                                                        <div class="col-md-1">
                                                                        <div class="form-check">
                                                                            <input class="form-check-input" type="radio" value="NO" name="allergies" id="allergies1" checked>
                                                                            <label class="form-check-label" for="allergies1">
                                                                                NO
                                                                            </label>
                                                                        </div>
                                                        </div>
                                                        <div class="col-md-2">

                                                                        <div class="form-check mb-3">
                                                                            <input class="form-check-input" type="radio" value="YES" name="allergies" id="allergies2">
                                                                            <label class="form-check-label" for="allergies2">
                                                                                YES
                                                                            </label>
                                                                        </div>
                                                         </div>   
                                           
                                                        <div class="col-md-6">
                                                        <input type="text" name="allergiesv" id="allergiesv" class="form-control" >
                                        
                                                        </div>
                                                    </div>

                                         <hr>

                                         <div class="row mt-1">
                                                        <div class="col-md-3">
                                                            <label for="" class="form-label">OTHERS : </label>
                                                            <input type="text" name="othersv" id="othersv" class="form-control" >
                                                        </div>
                                                        <div class="col-md-1">
                                                                        <div class="form-check">
                                                                            <input class="form-check-input" type="radio" value="NO" name="others" id="others1" checked>
                                                                            <label class="form-check-label" for="others1">
                                                                                NO
                                                                            </label>
                                                                        </div>
                                                        </div>
                                                        <div class="col-md-2">

                                                                        <div class="form-check mb-3">
                                                                            <input class="form-check-input" type="radio" value="YES" name="others" id="others2">
                                                                            <label class="form-check-label" for="others2">
                                                                                YES
                                                                            </label>
                                                                        </div>
                                                         </div>   
                                           
                                                        <div class="col-md-6">
                                                        <input type="text" name="othersv1" id="othersv1" class="form-control" >
                                        
                                                        </div>
                                                    </div>

                                         <hr>

                                         <h3>VITAL SIGNS</h3>
                                         <div class="row mt-1">
                                                        <div class="col-md-3">
                                                            <label for="" class="form-label">HEIGHT : </label>
                                              
                                                        </div>
                                                        <div class="col-md-3">
                                                                        <div class="form-check">
                                                                      <input type="text" name="heightv" id="heightv" class="form-control" required>
                                                                        </div>
                                                        </div>
                               
                                           
                                                        <div class="col-md-6">
                                                        <input type="text" name="heightv1" id="heightv1" class="form-control" >
                                        
                                                        </div>
                                                    </div>

                                         <hr>

                                         <div class="row mt-1">
                                                        <div class="col-md-3">
                                                            <label for="" class="form-label">WEIGHT : </label>
                                              
                                                        </div>
                                                        <div class="col-md-3">
                                                                        <div class="form-check">
                                                                      <input type="text" name="weightv" id="weightv" class="form-control" required>
                                                                        </div>
                                                        </div>
                               
                                           
                                                        <div class="col-md-6">
                                                        <input type="text" name="weightv1" id="weightv1" class="form-control" >
                                        
                                                        </div>
                                                    </div>

                                         <hr>


                                         <div class="row mt-1">
                                                        <div class="col-md-3">
                                                            <label for="" class="form-label">TEMPERATURE : </label>
                                              
                                                        </div>
                                                        <div class="col-md-3">
                                                                        <div class="form-check">
                                                                      <input type="text" name="tempv" id="tempv" class="form-control" required>
                                                                        </div>
                                                        </div>
                               
                                           
                                                        <div class="col-md-6">
                                                        <input type="text" name="tempv1" id="tempv1" class="form-control" >
                                        
                                                        </div>
                                                    </div>

                                         <hr>


                                         <div class="row mt-1">
                                                        <div class="col-md-3">
                                                            <label for="" class="form-label">BLOOD PRESSURE : </label>
                                              
                                                        </div>
                                                        <div class="col-md-3">
                                                                        <div class="form-check">
                                                                      <input type="text" name="blood_presurev" id="blood_presurev" class="form-control" required>
                                                                        </div>
                                                        </div>
                               
                                           
                                                        <div class="col-md-6">
                                                        <input type="text" name="blood_presurev1" id="blood_presurev1" class="form-control" >
                                        
                                                        </div>
                                                    </div>

                                         <hr>


                             
                                         <div class="row mt-1">
                                                        <div class="col-md-3">
                                                            <label for="" class="form-label">PULSE RATE : </label>
                                              
                                                        </div>
                                                        <div class="col-md-3">
                                                                        <div class="form-check">
                                                                      <input type="text" name="pulse_ratev" id="pulse_ratev" class="form-control" required>
                                                                        </div>
                                                        </div>
                               
                                           
                                                        <div class="col-md-6">
                                                        <input type="text" name="pulse_ratev1" id="pulse_ratev1" class="form-control" >
                                        
                                                        </div>
                                                    </div>

                                         <hr>


                                         <div class="row mt-1">
                                                        <div class="col-md-3">
                                                            <label for="" class="form-label">RESPIRATORY RATE : </label>
                                              
                                                        </div>
                                                        <div class="col-md-3">
                                                                        <div class="form-check">
                                                                      <input type="text" name="respi_ratev" id="respi_ratev" class="form-control" required>
                                                                        </div>
                                                        </div>
                               
                                           
                                                        <div class="col-md-6">
                                                        <input type="text" name="respi_ratev1" id="respi_ratev1" class="form-control" >
                                        
                                                        </div>
                                                    </div>

                                         <hr>


                                         <div class="row mt-1">
                                                        <div class="col-md-3">
                                                            <label for="" class="form-label">BMI : </label>
                                              
                                                        </div>
                                                        <div class="col-md-3">
                                                                        <div class="form-check">
                                                                      <input type="text" name="bmiv" id="bmiv" class="form-control" required>
                                                                        </div>
                                                        </div>
                               
                                           
                                                        <div class="col-md-6">
                                                        <input type="text" name="bmiv1" id="bmiv1" class="form-control" >
                                        
                                                        </div>
                                                    </div>

                                         <hr>

                                         <h3>PHYSICAL APPEARANCE</h3>
                                         <div class="row mt-1">
                                                        <div class="col-md-3">
                                                            <label for="" class="form-label">SKIN : </label>
                                                            <!-- <input type="text" name="othersv" id="othersv" class="form-control" required> -->
                                                        </div>
                                                        <div class="col-md-1">
                                                                        <div class="form-check">
                                                                            <input class="form-check-input" type="radio" value="NO" name="skin" id="skin1" checked>
                                                                            <label class="form-check-label" for="skin1">
                                                                                NO
                                                                            </label>
                                                                        </div>
                                                        </div>
                                                        <div class="col-md-2">

                                                                        <div class="form-check mb-3">
                                                                            <input class="form-check-input" type="radio" value="YES" name="skin" id="skin2">
                                                                            <label class="form-check-label" for="skin2">
                                                                                YES
                                                                            </label>
                                                                        </div>
                                                         </div>   
                                           
                                                        <div class="col-md-6">
                                                        <input type="text" name="skinv" id="skinv" class="form-control" >
                                        
                                                        </div>
                                                    </div>

                                         <hr>

                                         <div class="row mt-1">
                                                        <div class="col-md-3">
                                                            <label for="" class="form-label">ENT : </label>
                                                            <!-- <input type="text" name="othersv" id="othersv" class="form-control" required> -->
                                                        </div>
                                                        <div class="col-md-1">
                                                                        <div class="form-check">
                                                                            <input class="form-check-input" type="radio" value="NO" name="ent" id="ent1" checked>
                                                                            <label class="form-check-label" for="ent1">
                                                                                NO
                                                                            </label>
                                                                        </div>
                                                        </div>
                                                        <div class="col-md-2">

                                                                        <div class="form-check mb-3">
                                                                            <input class="form-check-input" type="radio" value="YES" name="ent" id="ent2">
                                                                            <label class="form-check-label" for="ent2">
                                                                                YES
                                                                            </label>
                                                                        </div>
                                                         </div>   
                                           
                                                        <div class="col-md-6">
                                                        <input type="text" name="entv" id="entv" class="form-control" >
                                        
                                                        </div>
                                                    </div>

                                         <hr>


                                         <div class="row mt-1">
                                                        <div class="col-md-3">
                                                            <label for="" class="form-label">HEAD : </label>
                                                            <!-- <input type="text" name="othersv" id="othersv" class="form-control" required> -->
                                                        </div>
                                                        <div class="col-md-1">
                                                                        <div class="form-check">
                                                                            <input class="form-check-input" type="radio" value="NO" name="head" id="head1" checked>
                                                                            <label class="form-check-label" for="head1">
                                                                                NO
                                                                            </label>
                                                                        </div>
                                                        </div>
                                                        <div class="col-md-2">

                                                                        <div class="form-check mb-3">
                                                                            <input class="form-check-input" type="radio" value="YES" name="head" id="head2">
                                                                            <label class="form-check-label" for="head2">
                                                                                YES
                                                                            </label>
                                                                        </div>
                                                         </div>   
                                           
                                                        <div class="col-md-6">
                                                        <input type="text" name="headv" id="headv" class="form-control" >
                                        
                                                        </div>
                                                    </div>

                                         <hr>


                                         <div class="row mt-1">
                                                        <div class="col-md-3">
                                                            <label for="" class="form-label">CHEST : </label>
                                                            <!-- <input type="text" name="othersv" id="othersv" class="form-control" required> -->
                                                        </div>
                                                        <div class="col-md-1">
                                                                        <div class="form-check">
                                                                            <input class="form-check-input" type="radio" value="NO" name="chest" id="chest1" checked>
                                                                            <label class="form-check-label" for="head1">
                                                                                NO
                                                                            </label>
                                                                        </div>
                                                        </div>
                                                        <div class="col-md-2">

                                                                        <div class="form-check mb-3">
                                                                            <input class="form-check-input" type="radio" value="YES" name="chest" id="chest2">
                                                                            <label class="form-check-label" for="chest2">
                                                                                YES
                                                                            </label>
                                                                        </div>
                                                         </div>   
                                           
                                                        <div class="col-md-6">
                                                        <input type="text" name="chestv" id="chestv" class="form-control" >
                                        
                                                        </div>
                                                    </div>

                                         <hr>


                                         <div class="row mt-1">
                                                        <div class="col-md-3">
                                                            <label for="" class="form-label">BACK : </label>
                                                            <!-- <input type="text" name="othersv" id="othersv" class="form-control" required> -->
                                                        </div>
                                                        <div class="col-md-1">
                                                                        <div class="form-check">
                                                                            <input class="form-check-input" type="radio" value="NO" name="back" id="back1" checked>
                                                                            <label class="form-check-label" for="back1">
                                                                                NO
                                                                            </label>
                                                                        </div>
                                                        </div>
                                                        <div class="col-md-2">

                                                                        <div class="form-check mb-3">
                                                                            <input class="form-check-input" type="radio" value="YES" name="back" id="back2">
                                                                            <label class="form-check-label" for="back2">
                                                                                YES
                                                                            </label>
                                                                        </div>
                                                         </div>   
                                           
                                                        <div class="col-md-6">
                                                        <input type="text" name="backv" id="backv" class="form-control" >
                                        
                                                        </div>
                                                    </div>

                                         <hr>


                                         <div class="row mt-1">
                                                        <div class="col-md-3">
                                                            <label for="" class="form-label">GENITALS : </label>
                                                            <!-- <input type="text" name="othersv" id="othersv" class="form-control" required> -->
                                                        </div>
                                                        <div class="col-md-1">
                                                                        <div class="form-check">
                                                                            <input class="form-check-input" type="radio" value="NO" name="genitals" id="genitals1" checked>
                                                                            <label class="form-check-label" for="genitals1">
                                                                                NO
                                                                            </label>
                                                                        </div>
                                                        </div>
                                                        <div class="col-md-2">

                                                                        <div class="form-check mb-3">
                                                                            <input class="form-check-input" type="radio" value="YES" name="genitals" id="genitals2">
                                                                            <label class="form-check-label" for="genitals2">
                                                                                YES
                                                                            </label>
                                                                        </div>
                                                         </div>   
                                           
                                                        <div class="col-md-6">
                                                        <input type="text" name="genitalsv" id="genitalsv" class="form-control" >
                                        
                                                        </div>
                                                    </div>

                                         <hr>

                             
                                         <div class="row mt-1">
                                                        <div class="col-md-3">
                                                            <label for="" class="form-label">RECTAL : </label>
                                                            <!-- <input type="text" name="othersv" id="othersv" class="form-control" required> -->
                                                        </div>
                                                        <div class="col-md-1">
                                                                        <div class="form-check">
                                                                            <input class="form-check-input" type="radio" value="NO" name="rectal" id="rectal1" checked>
                                                                            <label class="form-check-label" for="rectal1">
                                                                                NO
                                                                            </label>
                                                                        </div>
                                                        </div>
                                                        <div class="col-md-2">

                                                                        <div class="form-check mb-3">
                                                                            <input class="form-check-input" type="radio" value="YES" name="rectal" id="rectal2">
                                                                            <label class="form-check-label" for="rectal2">
                                                                                YES
                                                                            </label>
                                                                        </div>
                                                         </div>   
                                           
                                                        <div class="col-md-6">
                                                        <input type="text" name="rectalv" id="rectalv" class="form-control" >
                                        
                                                        </div>
                                                    </div>

                                         <hr>

                                         <h3>EMERGENCY CONTACTS</h3>
                                         <div class="row mt-1">
                                                        <div class="col-md-3">
                                                            <label for="" class="form-label">NAME : </label>
                                                            <input type="text" name="enamev" id="enamev" class="form-control" required>
                                                        </div>
                                     
                                                    </div>

                             
                                         <div class="row mt-1">
                                                        <div class="col-md-6">
                                                            <label for="" class="form-label">ADDRESS : </label>
                                                            <input type="text" name="eaddressv" id="eaddressv" class="form-control" required>
                                                        </div>
                                     
                                                    </div>

                                                     <div class="row mt-1">
                                                        <div class="col-md-6">
                                                            <label for="" class="form-label">CONTACT NUMBER : </label>
                                                            <input type="text" name="enumberv" id="enumberv" class="form-control" required>
                                                        </div>
                                     
                                                    </div>

                                                    <div class="row mt-1">
                                                        <div class="col-md-6">
                                                            <label for="" class="form-label">RELATIONSHIP : </label>
                                                            <input type="text" name="erelationv" id="erelationv" class="form-control" required>
                                                        </div>
                                     
                                                    </div>

                                         <hr>

                                         <h3>LIFE STYLE</h3>
                                         <div class="row mt-1">
                                                        <div class="col-md-6">
                                                            <label for="" class="form-label">DRINKING ALCOHOL : </label>
                                                            <input type="text" name="l_drinkingv" id="l_drinkingv" class="form-control"  required>
                                                        </div>
                                     
                                                    </div>

                             
                                         <div class="row mt-1">
                                                        <div class="col-md-6">
                                                            <label for="" class="form-label">SMOKING : </label>
                                                            <input type="text" name="l_smokingv" id="l_smokingv" class="form-control" required>
                                                        </div>
                                     
                                                    </div>

                                                     <div class="row mt-1">
                                                        <div class="col-md-6">
                                                            <label for="" class="form-label">EXERCISE : </label>
                                                            <input type="text" name="l_exercisev" id="l_exercisev" class="form-control" required>
                                                        </div>
                                     
                                                    </div>
                                                <hr>
                                                    <center>
                                                    <div class="col-md-12 mt-4 mb-5">
                                                        <button type="submit" name="submit_profile1" class="btn btn-info">Submit</button>
                                                        <button type="button" class="btn btn-secondary" onclick="location.href = 'calendar_doctor.php'">Cancel</button>
                                                    </div>
                                                    </center>
                                                </form>
                                    <?php } ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php include '../components/footer.php'; ?>
</body>

</html>
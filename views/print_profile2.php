<?php 
session_start();
include '../model/connect.php';
include '../model/authenticate.php';
?>
<!DOCTYPE html>
<html lang="en">


<style>
    @media print {  
 
        html, body {
   

       /* height:100%;  */
    margin: 0 !important; 
    padding: 0 !important;
 
  }
 
  body {
    margin: 0;
    color: #000;
    background-color: #fff;
    font-size: 12pt;
    font-family: Arial, sans-serif;
  }

 
  @page {


    size:22cm 32cm ;

    /* size:290mm 297mm ; portrait */
    /* you can also specify margins here: */
    /* margin: 25mm;
    margin-right: 45mm; for compatibility with both A4 and Letter */
  }
}
</style>

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
                                    <button type="button" class="btn btn-danger" id="printbtn_cancel" style="float:right" onclick="location.href = 'calendar_doctor.php'">Exit</button>
                                    <button onclick="printPage();" id="printbtn" style="float:right;margin-right:5px"  class="btn btn-info " >Print</button>
                                
                                </div>
                                <hr>
                                <div class="container px-5">
                                    <?php 
                                    
                                        if(isset($_POST['submit_profile'])){
                                            $database = new Database();
                                            $connect = $database->connect();
                                            $id = $_POST['transfer'];

                                            $users = new User($connect);
                                            $user = $users->select_profile4($id);
                                            

                                            $row =  $user->fetch(PDO::FETCH_ASSOC);



                                            $database = new Database();
                                            $connect = $database->connect();
                                            $id1 = $_POST['transfer'];

                                            $users1 = new User($connect);
                                            $user1 = $users1->select_profile5($id1);
                                            

                                            $rowp =  $user1->fetch(PDO::FETCH_ASSOC);



                                    ?>
                                    <form action="action.php" class="form-group" method="POST">
                                        <h2 class="fs-6">NAME : <?php echo $row['LAST_NAME'].", ".$row['FIRST_NAME']." ".$row['MIDDLE_NAME']    ?></h2>
                                        <h2 class="fs-6">ID NUMBER # : <?php echo $row['ID_NUMBER']   ?></h2>
                                        <h2 class="fs-6">CONTACT # : <?php echo $row['MOBILE_NUMBER']   ?></h2>

                                        <input type="hidden" name="vital_id" id="" value="<?php echo $row['ID']?>">
                                        <input type="hidden" name="vname" id="" value="<?php echo $row['LAST_NAME'].", ".$row['FIRST_NAME']." ".$row['MIDDLE_NAME']?>">
                                        <input type="hidden" name="vid" id="" value="<?php echo $row['ID_NUMBER']?>">
                                        <input type="hidden" name="vcontact" id="" value="<?php echo $row['MOBILE_NUMBER']?>">


                          

                                    <div class="row mt-1">
                                            <div class="col-md-3">
                                                <label for="" class="form-label">Tubercolosis</label>
                                            </div>
                                            <div class="col-md-1">
                                                            <div class="form-check">
                                                                <input class="form-check-input" type="radio" value="NO" name="tubercolosis" id="tubercolosis1" >
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
                                            <input type="text" name="tubercolosisv" id="tubercolosisv" value="<?php echo $rowp['tubercolosisv']?>" class="form-control" >
                                        
                                            </div>
                                        </div>

                         

                           
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
                                            <input type="text" name="hypertensionv" id="hypertensionv" value="<?php echo $rowp['hypertensionv']?>" class="form-control" >
                                        
                                            </div>
                                        </div>

                          

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
                                            <input type="text" name="diabetes_mellittusv" id="diabetes_mellittusv" value="<?php echo $rowp['diabetes_mellittusv']?>" class="form-control" >
                                        
                                            </div>
                                        </div>

                       

                             
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
                                            <input type="text" name="heart_troublev" id="heart_troublev"  value="<?php echo $rowp['heart_troublev']?>" class="form-control" >
                                        
                                            </div>
                                        </div>

                       


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
                                            <input type="text" name="endocrine_deseasesv" id="endocrine_deseasesv" value="<?php echo $rowp['endocrine_diseasesv']?>" class="form-control" >
                                        
                                            </div>
                                        </div>

                        

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
                                            <input type="text" name="cancel_tumorv" id="cancel_tumorv"  value="<?php echo $rowp['cancer_tumorv']?>" class="form-control" >
                                        
                                            </div>
                                        </div>

                        

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
                                            <input type="text" name="mental_disorderv" id="mental_disorderv"  value="<?php echo $rowp['mental_disorderv']?>" class="form-control" >
                                        
                                            </div>
                                        </div>

                          

                             
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
                                            <input type="text" name="frequent_headachev" id="frequent_headachev" value="<?php echo $rowp['frequent_headachev']?>" class="form-control" >
                                        
                                            </div>
                                        </div>

                      

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
                                            <input type="text" name="chronic_coughv" id="chronic_coughv" value="<?php echo $rowp['chronic_coughv']?>" class="form-control" >
                                        
                                            </div>
                                        </div>

                           
                             
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
                                            <input type="text" name="stdv" id="stdv" value="<?php echo $rowp['stdv']?>" class="form-control" >
                                        
                                            </div>
                                        </div>

               

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
                                            <input type="text" name="hepa_bv" id="hepa_bv"  value="<?php echo $rowp['hepa_bv']?>" class="form-control" >
                                        
                                            </div>
                                        </div>

                     


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
                                            <input type="text" name="hepa_av" id="hepa_av" value="<?php echo $rowp['hepa_av']?>" class="form-control" >
                                        
                                            </div>
                                        </div>

                  
                             
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
                                            <input type="text" name="aids_hivv" id="aids_hivv" value="<?php echo $rowp['aids_hivv']?>" class="form-control" >
                                        
                                            </div>
                                        </div>

                     

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
                                            <input type="text" name="covid19v" id="covid19v" value="<?php echo $rowp['covid19v']?>" class="form-control" >
                                        
                                            </div>
                                        </div>

                      


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
                                            <input type="text" name="asthmav" id="asthmav" value="<?php echo $rowp['asthmav']?>" class="form-control" >
                                        
                                            </div>
                                        </div>

                     


                             

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
                                            <input type="text" name="rheumatismv" id="rheumatismv" value="<?php echo $rowp['rheumatismv']?>" class="form-control" >
                                        
                                            </div>
                                        </div>

                     


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
                                            <input type="text" name="physical_injuryv" id="physical_injuryv" value="<?php echo $rowp['physical_injuryv']?>" class="form-control" >
                                        
                                            </div>
                                        </div>

                   



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
                                            <input type="text" name="herniav" id="herniav" value="<?php echo $rowp['herniav']?>" class="form-control" >
                                        
                                            </div>
                                        </div>

                        

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
                                            <input type="text" name="typhoidv" id="typhoidv" value="<?php echo $rowp['typhoidv']?>" class="form-control" >
                                        
                                            </div>
                                        </div>

                        

                             
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
                                            <input type="text" name="stomach_abdominalv" id="stomach_abdominalv" value="<?php echo $rowp['stomach_abdominav']?>" class="form-control" >
                                        
                                            </div>
                                        </div>

                 


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
                                            <input type="text" name="kidney_bladderv" id="kidney_bladderv" value="<?php echo $rowp['kidney_bladderv']?>" class="form-control" >
                                        
                                            </div>
                                        </div>

               

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
                                            <input type="text" name="dizzenessv" id="dizzenessv" value="<?php echo $rowp['dizzinessv']?>" class="form-control" >
                                        
                                            </div>
                                        </div>

                   


                             
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
                                            <input type="text" name="allergiesv" id="allergiesv" value="<?php echo $rowp['allergiesv']?>" class="form-control" >
                                        
                                            </div>
                                        </div>

                         

                             <div class="row mt-1">
                                            <div class="col-md-3">
                                                <label for="" class="form-label">OTHERS : </label>
                                                <input type="text" name="othersv" id="othersv" value="<?php echo $rowp['others']?>" class="form-control" >
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
                                            <input type="text" name="othersv1" id="othersv1" value="<?php echo $rowp['othersv1']?>" class="form-control" >
                                        
                                            </div>
                                        </div>

            

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
                                            <input type="text" name="heightv1" id="heightv1" value="<?php echo $rowp['heightv']?>" class="form-control" >
                                        
                                            </div>
                                        </div>

                   

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
                                            <input type="text" name="weightv1" id="weightv1" value="<?php echo $rowp['weightv']?>" class="form-control" >
                                        
                                            </div>
                                        </div>

                


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
                                            <input type="text" name="tempv1" id="tempv1" value="<?php echo $rowp['tempv']?>" class="form-control" >
                                        
                                            </div>
                                        </div>

            


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
                                            <input type="text" name="blood_presurev1" id="blood_presurev1" value="<?php echo $rowp['blood_presurev']?>" class="form-control" >
                                        
                                            </div>
                                        </div>



                             
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
                                            <input type="text" name="pulse_ratev1" id="pulse_ratev1" value="<?php echo $rowp['pulse_ratev']?>" class="form-control" >
                                        
                                            </div>
                                        </div>

                 

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
                                            <input type="text" name="respi_ratev1" id="respi_ratev1" value="<?php echo $rowp['respiv']?>" class="form-control" >
                                        
                                            </div>
                                        </div>

                  

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
                                            <input type="text" name="bmiv1" id="bmiv1" value="<?php echo $rowp['bmiv']?>"  class="form-control" >
                                        
                                            </div>
                                        </div>

                        

                             <h3>PHYSICAL APPEARANCE</h3>
                             <div class="row mt-1">
                                            <div class="col-md-3">
                                                <label for="" class="form-label">SKIN : </label>
                                              
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
                                            <input type="text" name="skinv" id="skinv" value="<?php echo $rowp['skinv']?>" class="form-control" >
                                        
                                            </div>
                                        </div>


                             <div class="row mt-1">
                                            <div class="col-md-3">
                                                <label for="" class="form-label">ENT : </label>
                                             
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
                                            <input type="text" name="entv" id="entv"  value="<?php echo $rowp['entv']?>" class="form-control" >
                                        
                                            </div>
                                        </div>

                    


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
                                            <input type="text" name="headv" id="headv" value="<?php echo $rowp['headv']?>" class="form-control" >
                                        
                                            </div>
                                        </div>

                   


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
                                            <input type="text" name="chestv" id="chestv" value="<?php echo $rowp['chestv']?>" class="form-control" >
                                        
                                            </div>
                                        </div>



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
                                            <input type="text" name="backv" id="backv"  value="<?php echo $rowp['backv']?>" class="form-control" >
                                        
                                            </div>
                                        </div>



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
                                            <input type="text" name="genitalsv" id="genitalsv" value="<?php echo $rowp['genitalsv']?>" class="form-control" >
                                        
                                            </div>
                                        </div>


                             
                             <div class="row mt-1">
                                            <div class="col-md-3">
                                                <label for="" class="form-label">RECTAL : </label>
                                     
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
                                            <input type="text" name="rectalv" id="rectalv" value="<?php echo $rowp['rectalv']?>" class="form-control" >
                                        
                                            </div>
                                        </div>

          



                             <h3>EMERGENCY CONTACTS</h3>
                             <div class="row mt-1">
                                            <div class="col-md-3">
                                                <label for="" class="form-label">NAME : </label>
                                                <input type="text" name="enamev" id="enamev" value="<?php echo $rowp['ename']?>" class="form-control" required>
                                            </div>
                                     
                                        </div>

                             
                             <div class="row mt-1">
                                            <div class="col-md-3">
                                                <label for="" class="form-label">ADDRESS : </label>
                                                <input type="text" name="eaddressv" id="eaddressv" value="<?php echo $rowp['eaddress']?>" class="form-control" required>
                                            </div>
                                     
                                        </div>

                                         <div class="row mt-1">
                                            <div class="col-md-3">
                                                <label for="" class="form-label">CONTACT NUMBER : </label>
                                                <input type="text" name="enumberv" id="enumberv" value="<?php echo $rowp['econtact']?>" class="form-control" required>
                                            </div>
                                     
                                        </div>

                                        <div class="row mt-1">
                                            <div class="col-md-3">
                                                <label for="" class="form-label">RELATIONSHIP : </label>
                                                <input type="text" name="erelationv" id="erelationv" value="<?php echo $rowp['erelation']?>" class="form-control" required>
                                            </div>
                                     
                                        </div>

                   

                             <h3>LIFE STYLE</h3>
                             <div class="row mt-1">
                                            <div class="col-md-3">
                                                <label for="" class="form-label">DRINKING ALCOHOL : </label>
                                                <input type="text" name="l_drinkingv" id="l_drinkingv" value="<?php echo $rowp['drinking']?>" class="form-control" required>
                                            </div>
                                     
                                        </div>

                             
                             <div class="row mt-1">
                                            <div class="col-md-3">
                                                <label for="" class="form-label">SMOKING : </label>
                                                <input type="text" name="l_smokingv" id="l_smokingv" value="<?php echo $rowp['smoking']?>"  class="form-control" required>
                                            </div>
                                     
                                        </div>

                                         <div class="row mt-1">
                                            <div class="col-md-3">
                                                <label for="" class="form-label">EXERCISE : </label>
                                                <input type="text" name="l_exercisev" id="l_exercisev" value="<?php echo $rowp['exercise']?>"  class="form-control" required>
                                            </div>
                                     
                                        </div>

                                    

           
                                        <center>
                                        <div class="col-md-12 mt-4 mb-5">
                                            <!-- <button type="submit" name="submit_profile1" class="btn btn-info">Submit</button> -->
                                            <!-- <button type="button" class="btn btn-secondary" onclick="location.href = 'calendar_doctor.php'">Cancel</button> -->
                                        </div>
                                        </center>

                                        
                                    </form>
                                    <?php }?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>


<?php
                                         if($rowp['tubercolosis']=="NO")
                                         {

                                            echo "<script> document.getElementById('tubercolosis1').checked=true;</script>;";
                                            // echo '<input class="form-check-input" type="radio" value="NO" name="tubercolosis" id="tubercolosis1" checked>';
                                        
                                         } 
                                         else{
                                            echo "<script> document.getElementById('tubercolosis2').checked=true;</script>;";

                                         }


                                         if($rowp['hypertension']=="NO")
                                         {

                                            echo "<script> document.getElementById('hypertension1').checked=true;</script>;";
                                            // echo '<input class="form-check-input" type="radio" value="NO" name="tubercolosis" id="tubercolosis1" checked>';
                                        
                                         } 
                                         else{
                                            echo "<script> document.getElementById('hypertension2').checked=true;</script>;";

                                         }

                                         if($rowp['diabetes_mellittus']=="NO")
                                         {

                                            echo "<script> document.getElementById('diabetes_mellittus1').checked=true;</script>;";
                                            // echo '<input class="form-check-input" type="radio" value="NO" name="tubercolosis" id="tubercolosis1" checked>';
                                        
                                         } 
                                         else{
                                            echo "<script> document.getElementById('diabetes_mellittus2').checked=true;</script>;";

                                         }


                                         if($rowp['heart_trouble']=="NO")
                                         {

                                            echo "<script> document.getElementById('heart_trouble1').checked=true;</script>;";
                                            // echo '<input class="form-check-input" type="radio" value="NO" name="tubercolosis" id="tubercolosis1" checked>';
                                        
                                         } 
                                         else{
                                            echo "<script> document.getElementById('heart_trouble2').checked=true;</script>;";

                                         }

                                         if($rowp['endocrine_diseases']=="NO")
                                         {

                                            echo "<script> document.getElementById('endocrine_deseases1').checked=true;</script>;";
                                            // echo '<input class="form-check-input" type="radio" value="NO" name="tubercolosis" id="tubercolosis1" checked>';
                                        
                                         } 
                                         else{
                                            echo "<script> document.getElementById('endocrine_deseases2').checked=true;</script>;";

                                         }

                                         if($rowp['cancer_tumor']=="NO")
                                         {

                                            echo "<script> document.getElementById('cancel_tumor1').checked=true;</script>;";
                                            // echo '<input class="form-check-input" type="radio" value="NO" name="tubercolosis" id="tubercolosis1" checked>';
                                        
                                         } 
                                         else{
                                            echo "<script> document.getElementById('cancel_tumor2').checked=true;</script>;";

                                         }

                                         
                                         if($rowp['mental_disorder']=="NO")
                                         {

                                            echo "<script> document.getElementById('mental_disorder1').checked=true;</script>;";
                                            // echo '<input class="form-check-input" type="radio" value="NO" name="tubercolosis" id="tubercolosis1" checked>';
                                        
                                         } 
                                         else{
                                            echo "<script> document.getElementById('mental_disorder2').checked=true;</script>;";

                                         }

                                         if($rowp['frequent_headache']=="NO")
                                         {

                                            echo "<script> document.getElementById('frequent_headache1').checked=true;</script>;";
                                            // echo '<input class="form-check-input" type="radio" value="NO" name="tubercolosis" id="tubercolosis1" checked>';
                                        
                                         } 
                                         else{
                                            echo "<script> document.getElementById('frequent_headache2').checked=true;</script>;";

                                         }

                                         
                                         if($rowp['chronic_cough']=="NO")
                                         {

                                            echo "<script> document.getElementById('chronic_cough1').checked=true;</script>;";
                                            // echo '<input class="form-check-input" type="radio" value="NO" name="tubercolosis" id="tubercolosis1" checked>';
                                        
                                         } 
                                         else{
                                            echo "<script> document.getElementById('chronic_cough2').checked=true;</script>;";

                                         }

                                         
                                         if($rowp['std']=="NO")
                                         {

                                            echo "<script> document.getElementById('std1').checked=true;</script>;";
                                            // echo '<input class="form-check-input" type="radio" value="NO" name="tubercolosis" id="tubercolosis1" checked>';
                                        
                                         } 
                                         else{
                                            echo "<script> document.getElementById('std2').checked=true;</script>;";

                                         }

                                         if($rowp['hepa_b']=="NO")
                                         {

                                            echo "<script> document.getElementById('hepa_b1').checked=true;</script>;";
                                            // echo '<input class="form-check-input" type="radio" value="NO" name="tubercolosis" id="tubercolosis1" checked>';
                                        
                                         } 
                                         else{
                                            echo "<script> document.getElementById('hepa_b2').checked=true;</script>;";

                                         }

                                         if($rowp['hepa_a']=="NO")
                                         {

                                            echo "<script> document.getElementById('hepa_a1').checked=true;</script>;";
                                            // echo '<input class="form-check-input" type="radio" value="NO" name="tubercolosis" id="tubercolosis1" checked>';
                                        
                                         } 
                                         else{
                                            echo "<script> document.getElementById('hepa_a1').checked=true;</script>;";

                                         }

                                         if($rowp['aids_hiv']=="NO")
                                         {

                                            echo "<script> document.getElementById('aids_hiv1').checked=true;</script>;";
                                            // echo '<input class="form-check-input" type="radio" value="NO" name="tubercolosis" id="tubercolosis1" checked>';
                                        
                                         } 
                                         else{
                                            echo "<script> document.getElementById('aids_hiv1').checked=true;</script>;";

                                         }

                                         if($rowp['covid19']=="NO")
                                         {

                                            echo "<script> document.getElementById('covid191').checked=true;</script>;";
                                            // echo '<input class="form-check-input" type="radio" value="NO" name="tubercolosis" id="tubercolosis1" checked>';
                                        
                                         } 
                                         else{
                                            echo "<script> document.getElementById('covid192').checked=true;</script>;";

                                         }

                                         if($rowp['asthma']=="NO")
                                         {

                                            echo "<script> document.getElementById('asthma1').checked=true;</script>;";
                                            // echo '<input class="form-check-input" type="radio" value="NO" name="tubercolosis" id="tubercolosis1" checked>';
                                        
                                         } 
                                         else{
                                            echo "<script> document.getElementById('asthma2').checked=true;</script>;";

                                         }

                                         if($rowp['rheumatism']=="NO")
                                         {

                                            echo "<script> document.getElementById('rheumatism1').checked=true;</script>;";
                                            // echo '<input class="form-check-input" type="radio" value="NO" name="tubercolosis" id="tubercolosis1" checked>';
                                        
                                         } 
                                         else{
                                            echo "<script> document.getElementById('rheumatism2').checked=true;</script>;";

                                         }

                                         if($rowp['physical_injury']=="NO")
                                         {

                                            echo "<script> document.getElementById('physical_injury1').checked=true;</script>;";
                                            // echo '<input class="form-check-input" type="radio" value="NO" name="tubercolosis" id="tubercolosis1" checked>';
                                        
                                         } 
                                         else{
                                            echo "<script> document.getElementById('physical_injury2').checked=true;</script>;";

                                         }

                                         if($rowp['hernia']=="NO")
                                         {

                                            echo "<script> document.getElementById('hernia1').checked=true;</script>;";
                                            // echo '<input class="form-check-input" type="radio" value="NO" name="tubercolosis" id="tubercolosis1" checked>';
                                        
                                         } 
                                         else{
                                            echo "<script> document.getElementById('hernia2').checked=true;</script>;";

                                         }

                                         if($rowp['typhoid']=="NO")
                                         {

                                            echo "<script> document.getElementById('typhoid1').checked=true;</script>;";
                                            // echo '<input class="form-check-input" type="radio" value="NO" name="tubercolosis" id="tubercolosis1" checked>';
                                        
                                         } 
                                         else{
                                            echo "<script> document.getElementById('typhoid2').checked=true;</script>;";

                                         }

                                         if($rowp['stomach_abdomina']=="NO")
                                         {

                                            echo "<script> document.getElementById('stomach_abdominal1').checked=true;</script>;";
                                            // echo '<input class="form-check-input" type="radio" value="NO" name="tubercolosis" id="tubercolosis1" checked>';
                                        
                                         } 
                                         else{
                                            echo "<script> document.getElementById('stomach_abdominal2').checked=true;</script>;";

                                         }

                                         if($rowp['kidney_bladder']=="NO")
                                         {

                                            echo "<script> document.getElementById('kidney_bladder1').checked=true;</script>;";
                                            // echo '<input class="form-check-input" type="radio" value="NO" name="tubercolosis" id="tubercolosis1" checked>';
                                        
                                         } 
                                         else{
                                            echo "<script> document.getElementById('kidney_bladder2').checked=true;</script>;";

                                         }

                                         if($rowp['dizziness']=="NO")
                                         {

                                            echo "<script> document.getElementById('dizzeness1').checked=true;</script>;";
                                            // echo '<input class="form-check-input" type="radio" value="NO" name="tubercolosis" id="tubercolosis1" checked>';
                                        
                                         } 
                                         else{
                                            echo "<script> document.getElementById('dizzeness2').checked=true;</script>;";

                                         }

                                         if($rowp['allergies']=="NO")
                                         {

                                            echo "<script> document.getElementById('allergies1').checked=true;</script>;";
                                            // echo '<input class="form-check-input" type="radio" value="NO" name="tubercolosis" id="tubercolosis1" checked>';
                                        
                                         } 
                                         else{
                                            echo "<script> document.getElementById('allergies2').checked=true;</script>;";

                                         }


                                         
                                         if($rowp['othersv']=="NO")
                                         {

                                            echo "<script> document.getElementById('others1').checked=true;</script>;";
                                            // echo '<input class="form-check-input" type="radio" value="NO" name="tubercolosis" id="tubercolosis1" checked>';
                                        
                                         } 
                                         else{
                                            echo "<script> document.getElementById('others2').checked=true;</script>;";

                                         }




                                         if($rowp['skin']=="NO")
                                         {

                                            echo "<script> document.getElementById('skin1').checked=true;</script>;";
                                            // echo '<input class="form-check-input" type="radio" value="NO" name="tubercolosis" id="tubercolosis1" checked>';
                                        
                                         } 
                                         else{
                                            echo "<script> document.getElementById('skin2').checked=true;</script>;";

                                         }


                                         if($rowp['ent']=="NO")
                                         {

                                            echo "<script> document.getElementById('ent1').checked=true;</script>;";
                                            // echo '<input class="form-check-input" type="radio" value="NO" name="tubercolosis" id="tubercolosis1" checked>';
                                        
                                         } 
                                         else{
                                            echo "<script> document.getElementById('ent2').checked=true;</script>;";

                                         }

                                         if($rowp['head']=="NO")
                                         {

                                            echo "<script> document.getElementById('head1').checked=true;</script>;";
                                            // echo '<input class="form-check-input" type="radio" value="NO" name="tubercolosis" id="tubercolosis1" checked>';
                                        
                                         } 
                                         else{
                                            echo "<script> document.getElementById('head2').checked=true;</script>;";

                                         }


                                         if($rowp['chest']=="NO")
                                         {

                                            echo "<script> document.getElementById('chest1').checked=true;</script>;";
                                            // echo '<input class="form-check-input" type="radio" value="NO" name="tubercolosis" id="tubercolosis1" checked>';
                                        
                                         } 
                                         else{
                                            echo "<script> document.getElementById('chest2').checked=true;</script>;";

                                         }



                                         if($rowp['back']=="NO")
                                         {

                                            echo "<script> document.getElementById('back1').checked=true;</script>;";
                                            // echo '<input class="form-check-input" type="radio" value="NO" name="tubercolosis" id="tubercolosis1" checked>';
                                        
                                         } 
                                         else{
                                            echo "<script> document.getElementById('back2').checked=true;</script>;";

                                         }

                                         if($rowp['genitals']=="NO")
                                         {

                                            echo "<script> document.getElementById('genitals1').checked=true;</script>;";
                                            // echo '<input class="form-check-input" type="radio" value="NO" name="tubercolosis" id="tubercolosis1" checked>';
                                        
                                         } 
                                         else{
                                            echo "<script> document.getElementById('genitals2').checked=true;</script>;";

                                         }




                                         
                                         if($rowp['rectal']=="NO")
                                         {

                                            echo "<script> document.getElementById('rectal1').checked=true;</script>;";
                                            // echo '<input class="form-check-input" type="radio" value="NO" name="tubercolosis" id="tubercolosis1" checked>';
                                        
                                         } 
                                         else{
                                            echo "<script> document.getElementById('rectal2').checked=true;</script>;";

                                         }

                                ?>

<script language="javascript">
    function printPage() {
     
//alert("print");

           document.getElementById("printbtn_cancel").style.display = "none";
             document.getElementById("printbtn").style.display = "none";
        
         window.print();
        self.location.replace('calendar_doctor.php');
                    document.getElementById("printbtn_cancel").style.display = "Block";
    document.getElementById("printbtn").style.display = "Block";
    }
</script>
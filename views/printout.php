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
    height:100%; 
    margin: 0 !important; 
    padding: 0 !important;
    overflow: hidden;
        zoom: 82%;
        width:100%;
  }

 
  @page {
    size:22cm 32cm 
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
       
   <form>
                <!-- Content -->
                <!-- <div class="content-wrapper mt-3">
                    <div class="container">
                 
                            <div class="container"> -->
                            <div class="" style="float:right">
                          


                                             <button onclick="printPage();" id="printbtn" class="btn btn-info " >Print</button>
                            
                                            <!-- <button type="submit" name="submit_print" class="btn btn-info">PRINT</button> -->
                                            <button type="button" id="printbtn_cancel" class="btn btn-secondary" onclick="location.href = 'calendar_doctor.php'">Cancel</button>
                                        </div>

                                <hr>
                                <div class="title justify-content-center align-items-center mx-auto text-center">
                                     <!-- <img src="pcn_logo.jpg" style="width:130px"  class="logo"> -->
                                    <h4 class="fs-4">
                                    INCIDENT INFORMATION
                                    </h4>

                               
                                   
                                      

                                </div>
                                <hr>
                                <div class="container px-5">
                                    <?php 
                                    
                                        if(isset($_POST['submit_pre'])){
                                            $database = new Database();
                                            $connect = $database->connect();
                                            $id = $_POST['transfer'];

                                            $users = new User($connect);
                                            $user = $users->select_datas2($id);
                                            

                                            $row =  $user->fetch(PDO::FETCH_ASSOC);
                                    ?>
                                    <form action="action.php" class="form-group" method="POST">
                                        <h2 class="fs-6">PRIMARY INFORMATION </h2>
                                      
                                        <!-- HTML FOR PRINT OUT  -->


                                        <div class="row mt-1">
                                            <div class="col-md-4">
                                                <label for="" class="form-label"><strong>NAME :</strong></label>
                                                <label for="" class="form-label" style="padding-left:1em"> : <?php echo $row['patient_lastname'] .", " . $row['patient_firstname'] ." " . $row['patient_middlename']    ?> </label><br>
                                            

                                                <label for="" class="form-label"><strong>AGE :</strong></label>
                                                <label for="" class="form-label" style="padding-left:1em"> : <?php echo $row['patient_age']    ?> </label><br>
                                            
                                                <label for="" class="form-label"><strong>GENDER :</strong></label>
                                                <label for="" class="form-label" style="padding-left:1em"> : <?php echo $row['patient_gender']   ?> </label><br>
                                            
                                                <label for="" class="form-label"><strong>STATUS :</strong></label>
                                                <label for="" class="form-label" style="padding-left:1em"> : <?php echo $row['patient_status']    ?> </label><br>
                                            
                                                <label for="" class="form-label"><strong>ADDRESS :</strong></label>
                                                <label for="" class="form-label" style="padding-left:1em"> : <?php echo $row['patient_address']   ?> </label><br>
                                            
                                                <label for="" class="form-label"><strong>VACCINATION :</strong></label>
                                                <label for="" class="form-label" style="padding-left:1em"> : <?php echo $row['patient_vac']   ?> </label><br>
                                            
                                            </div>
                                            
                                            <div class="col-md-4">
                                            <label for="" class="form-label"><strong>COMPANION INFORMATION</strong></label><br>


                                                <label for="" class="form-label"><strong>NAME :</strong></label>
                                                <label for="" class="form-label" style="padding-left:1em"> : <?php echo $row['companion_name']    ?> </label><br>
                                            

                                                <label for="" class="form-label"><strong>CONTACT NUMBER :</strong></label>
                                                <label for="" class="form-label" style="padding-left:1em"> : <?php echo $row['companion_contact_number']    ?> </label><br>
                                            
                                                <label for="" class="form-label"><strong>ADDRESS :</strong></label>
                                                <label for="" class="form-label" style="padding-left:1em"> : <?php echo $row['companion_address']     ?> </label><br>
                                            
                                                <label for="" class="form-label"><strong>RELATIONSHIP :</strong></label>
                                                <label for="" class="form-label" style="padding-left:1em"> : <?php echo $row['companion_relationship']    ?> </label><br>
                                            
                                             
                                            </div>            
                                            
                                            <div class="col-md-4">

                                            <label for="" class="form-label"><strong>INCIDENT INFORMATION</strong></label><br>
                                                <label for="" class="form-label" style="padding-left:1em">DATE : <?php echo $row['info_date']?> </label><br>
                                                <label for="" class="form-label" style="padding-left:1em">TIME : <?php echo $row['info_time']?> </label><br>
                                                <label for="" class="form-label" style="padding-left:1em">LOCATION : <?php echo $row['info_location']?> </label><br>

                                                <label for="" class="form-label"><strong>NATURE OF INCIDENT</strong></label>
                                                <label for="" class="form-label" style="padding-left:1em">* : <?php echo $row['nature_of_incident']?> </label><br>

                                                <label for="" class="form-label"><strong>TYPE OF INCIDENT</strong></label>
                                                <label for="" class="form-label" style="padding-left:1em">* : <?php echo $row['type_of_incident']?> </label><br>

                                                
                                                <label for="" class="form-label"><strong>TRANSFER</strong></label>
                                                <label for="" class="form-label" style="padding-left:1em">* : <?php echo $row['transfer_info']?> </label>
                                            </div>  
                                        </div>    
                    <hr>

                    <div class="row mt-1">
                    <h2 class="fs-6">PATIENT'S CONDITION</h2>
                                       <!-- <div class="col-md-2">
                                        </div>    -->
                                       
                                        <div class="col-md-4">
                                                <label for="" class="form-label"><strong>INITIAL IMPRESSION :</strong></label>
                                                <label for="" class="form-label" style="padding-left:1em"> : <?php echo $row['patient_lastname'] .", " . $row['patient_firstname'] ." " . $row['patient_middlename']    ?> </label><br>
                                            

                                                <label for="" class="form-label"><strong>CHIEF COMPLAINT :</strong></label>
                                                <label for="" class="form-label" style="padding-left:1em"> : <?php echo $row['patient_age']    ?> </label><br>
                                            
                                                <label for="" class="form-label"><strong>SYMPTOMS :</strong></label>
                                                <label for="" class="form-label" style="padding-left:1em"> : <?php echo $row['patient_gender']   ?> </label><br>
                                            
                                                <label for="" class="form-label"><strong>ALLERGY :</strong></label>
                                                <label for="" class="form-label" style="padding-left:1em"> : <?php echo $row['patient_status']    ?> </label><br>
                                            
                                                <label for="" class="form-label"><strong>MEDICATION :</strong></label>
                                                <label for="" class="form-label" style="padding-left:1em"> : <?php echo $row['patient_address']   ?> </label><br>
                                            
                                                <label for="" class="form-label"><strong>VACCINATION :</strong></label>
                                                <label for="" class="form-label" style="padding-left:1em"> : <?php echo $row['patient_vac']   ?> </label><br>
                                            
                                            </div>
                                            
                                            <div class="col-md-4">
                                            <!-- <label for="" class="form-label"><strong>COMPANION INFORMATION</strong></label><br> -->


                                                <label for="" class="form-label"><strong>PAST MEDICAL HISTORY :</strong></label>
                                                <label for="" class="form-label" style="padding-left:1em"> : <?php echo $row['companion_name']    ?> </label><br>
                                            

                                                <label for="" class="form-label"><strong>LAST ORAL INTAKE :</strong></label>
                                                <label for="" class="form-label" style="padding-left:1em"> : <?php echo $row['companion_contact_number']    ?> </label><br>
                                            
                                                <label for="" class="form-label"><strong>EVENTS LEADING TO INJURY :</strong></label>
                                                <label for="" class="form-label" style="padding-left:1em"> : <?php echo $row['companion_address']     ?> </label><br>
                                            
                                           
                                             
                                            </div>            
                                            <div class="col-md-4">
                                            <label for="" class="form-label"><strong>LOC :</strong></label>
                                                <label for="" class="form-label" style="padding-left:1em"> : <?php echo $row['patient_lastname'] .", " . $row['patient_firstname'] ." " . $row['patient_middlename']    ?> </label><br>
                                            

                                                <label for="" class="form-label"><strong>MEDICAL CONDITION :</strong></label>
                                                <label for="" class="form-label" style="padding-left:1em"> : <?php echo $row['patient_age']    ?> </label><br>
                                            
                                                <label for="" class="form-label"><strong>OXYGENATION :</strong></label>
                                                <label for="" class="form-label" style="padding-left:1em"> : <?php echo $row['patient_gender']   ?> </label><br>
                                            
                                                <label for="" class="form-label"><strong>GLASGOW COMA SCALE :</strong></label>
                                                <label for="" class="form-label" style="padding-left:1em"> : <?php echo $row['patient_status']    ?> </label><br>
                                            
                                                <label for="" class="form-label"><strong>ASSESSMENT NARRATIVE :</strong></label>
                                                <label for="" class="form-label" style="padding-left:1em"> : <?php echo $row['patient_address']   ?> </label><br>
                                            
                                                <label for="" class="form-label"><strong>TREAMENT APPLIED :</strong></label>
                                                <label for="" class="form-label" style="padding-left:1em"> : <?php echo $row['patient_vac']   ?> </label><br>
                                            
                                        </div>   
                                      
                            </div>    




                            <hr>



                

<h2 class="fs-6 mt-5">VITAL SIGNS</h2>
                                        <div class="row mt-1">
                                            <div class="col-md-2">
                                                <label for="" class="form-label" style="padding-top:3em">Blood Pressure</label>
                                            </div>
                                            
                                            <div class="col-md-2">
                                                <label for="" class="form-label">1st</label>
                                                <input type="text" name="bp1" id="bp1" value="<?php echo $row['bp1']?>" class="form-control">
                                            </div>            
                                              
                                            <div class="col-md-2">
                                                <label for="" class="form-label">2nd</label>
                                                <input type="text" name="bp2" id="bp2"  value="<?php echo $row['bp2']?>" class="form-control">
                                            </div>      

                                            <div class="col-md-2">
                                                <label for="" class="form-label">3rd</label>
                                                <input type="text" name="bp3" id="bp3" value="<?php echo $row['bp3']?>" class="form-control">
                                            </div>

                                            <div class="col-md-2">
                                                <label for="" class="form-label">4th</label>
                                                <input type="text" name="bp4" id="bp4" value="<?php echo $row['bp4']?>" class="form-control">
                                            </div>   

                                            <div class="col-md-2">
                                                <label for="" class="form-label">5th</label>
                                                <input type="text" name="bp5" id="bp5" value="<?php echo $row['bp5']?>" class="form-control">
                                            </div>  
                                          
                                           
                                        </div>
                                    <hr>

                                        <div class="row mt-1">
                                            <div class="col-md-2">
                                                <label for="" class="form-label"  style="padding-top:3em">Pulse Rate</label>
                                                </div>
                                            
                                            <div class="col-md-2">
                                                <label for="" class="form-label">1st</label>
                                                <input type="text" name="pr1" id="pr1" value="<?php echo $row['pr1']?>" class="form-control">
                                            </div>            
                                            
                                            <div class="col-md-2">
                                                <label for="" class="form-label">2nd</label>
                                                <input type="text" name="pr2" id="pr2" value="<?php echo $row['pr2']?>" class="form-control">
                                            </div>      

                                            <div class="col-md-2">
                                                <label for="" class="form-label">3rd</label>
                                                <input type="text" name="pr3" id="pr3" value="<?php echo $row['pr3']?>" class="form-control">
                                            </div>

                                            <div class="col-md-2">
                                                <label for="" class="form-label">4th</label>
                                                <input type="text" name="pr4" id="pr4" value="<?php echo $row['pr4']?>" class="form-control">
                                            </div>   

                                            <div class="col-md-2">
                                                <label for="" class="form-label">5th</label>
                                                <input type="text" name="pr5" id="pr5" value="<?php echo $row['pr5']?>" class="form-control">
                                            </div>  
                                        </div>

                                        <hr>
                                        <div class="row mt-1">
                                            <div class="col-md-2">

                                                <label for="" class="form-label"  style="padding-top:3em">Respiratory Rate</label>
                                                </div>
                                            
                                            <div class="col-md-2">
                                                <label for="" class="form-label">1st</label>
                                                <input type="text" name="rr1" id="rr1" value="<?php echo $row['rr1']?>" class="form-control">
                                            </div>            
                                            
                                            <div class="col-md-2">
                                                <label for="" class="form-label">2nd</label>
                                                <input type="text" name="rr2" id="rr2" value="<?php echo $row['rr2']?>" class="form-control">
                                            </div>      

                                            <div class="col-md-2">
                                                <label for="" class="form-label">3rd</label>
                                                <input type="text" name="rr3" id="rr3" value="<?php echo $row['rr3']?>" class="form-control">
                                            </div>

                                            <div class="col-md-2">
                                                <label for="" class="form-label">4th</label>
                                                <input type="text" name="rr4" id="r4" value="<?php echo $row['rr4']?>" class="form-control">
                                            </div>   

                                            <div class="col-md-2">
                                                <label for="" class="form-label">5th</label>
                                                <input type="text" name="rr5" id="rr5" value="<?php echo $row['rr5']?>" class="form-control">
                                            </div>  
                                        </div>

                                        <hr>
                                        <div class="row mt-1">
                                            <div class="col-md-2">
                                                <label for="" class="form-label"  style="padding-top:3em">Temperature</label>
                                                </div>
                                            
                                            <div class="col-md-2">
                                                <label for="" class="form-label">1st</label>
                                                <input type="text" name="temp1" id="temp1" value="<?php echo $row['temp1']?>" class="form-control">
                                            </div>            
                                            
                                            <div class="col-md-2">
                                                <label for="" class="form-label">2nd</label>
                                                <input type="text" name="temp2" id="temp2" value="<?php echo $row['temp2']?>" class="form-control">
                                            </div>      

                                            <div class="col-md-2">
                                                <label for="" class="form-label">3rd</label>
                                                <input type="text" name="temp3" id="temp3" value="<?php echo $row['temp3']?>" class="form-control">
                                            </div>

                                            <div class="col-md-2">
                                                <label for="" class="form-label">4th</label>
                                                <input type="text" name="temp4" id="temp4" value="<?php echo $row['temp4']?>" class="form-control">
                                            </div>   

                                            <div class="col-md-2">
                                                <label for="" class="form-label">5th</label>
                                                <input type="text" name="temp5" id="temp5" value="<?php echo $row['temp5']?>" class="form-control">
                                            </div>  
                                        </div>

                                        <hr>
                                        <div class="row mt-1">
                                            <div class="col-md-2">
                                                <label for="" class="form-label"  style="padding-top:3em">O2 Saturation</label>
                                                </div>
                                            
                                            <div class="col-md-2">
                                                <label for="" class="form-label">1st</label>
                                                <input type="text" name="os1" id="os1" value="<?php echo $row['os1']?>" class="form-control">
                                            </div>            
                                            
                                            <div class="col-md-2">
                                                <label for="" class="form-label">2nd</label>
                                                <input type="text" name="os2" id="os2" value="<?php echo $row['os2']?>" class="form-control">
                                            </div>      

                                            <div class="col-md-2">
                                                <label for="" class="form-label">3rd</label>
                                                <input type="text" name="os3" id="os3" value="<?php echo $row['os3']?>" class="form-control">
                                            </div>

                                            <div class="col-md-2">
                                                <label for="" class="form-label">4th</label>
                                                <input type="text" name="os4" id="os4" value="<?php echo $row['os4']?>" class="form-control">
                                            </div>   

                                            <div class="col-md-2">
                                                <label for="" class="form-label">5th</label>
                                                <input type="text" name="os5" id="os5" value="<?php echo $row['os5']?>" class="form-control">
                                            </div>  
                                        </div>
                  
                


<br>
<hr>

                                  

                                        
                                    </form>
                                    <?php }?>
                                </div>
                            </div>
                     
                    <!-- </div>
                </div>
            </div> -->
        </div>
    </div>
</body>

</html>

<script language="javascript">
    function printPage() {
     
//alert("print");

           document.getElementById("printbtn_cancel").style.display = "none";
             document.getElementById("printbtn").style.display = "none";
        
         window.print();
        self.location.replace('index.php');
                    document.getElementById("printbtn_cancel").style.display = "Block";
    document.getElementById("printbtn").style.display = "Block";
    }
</script>
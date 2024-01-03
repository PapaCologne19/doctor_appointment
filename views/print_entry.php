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
// echo $_SESSION['username'];
if (!isset($_SESSION['username'], $_SESSION['password'])) {
    session_start();
    session_destroy();
    header("Location: ../index.php");
    exit(0);
    
}
else{}


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
                                        PRINT AN ENTRY
                                    </h4>
                                </div>
                                <hr>
                                <div class="container px-5">
                                    <form action="printout.php" class="form-group" method="POST">
                                        <h2 class="fs-6">SELECT PATIENT</h2>


                                        <div class="row mt-1">
                                            <!-- <div class="col-md-2">
                                                <label for="" class="form-label">TRANSER</label>
                                            </div> -->
                                            <div class="col-md-6">
                                            <center>
                                                <select name="transfer" id="transfer" class="form-select" required>
                                                    </center>
                                            <?php
                                            $database = new Database();
                                            $connect = $database->connect();

                                            $users = new User($connect);
                                            $user = $users->select_datas();

                                            while($row = $user->fetch(PDO::FETCH_ASSOC)){
 
                                             ?>
                                             <option value="<?php echo $row['id']?>"><?php echo $row['patient_firstname']?></option>
                                            <?php } ?>
                                                </select>
                                            </div>
                                        </div>




                                        <!-- <div class="row mt-1">
                                            <div class="col-md-2">
                                                <label for="" class="form-label">Date</label>
                                            </div>
                                            <div class="col-md-6">
                                                <input type="date" name="incident_date" id="incident_date" class="form-control" required>
                                            </div>
                                        </div>
                                        <div class="row mt-1">
                                            <div class="col-md-2">
                                                <label for="" class="form-label">Time</label>
                                            </div>
                                            <div class="col-md-6">
                                                <input type="time" name="incident_time" id="incident_time" class="form-control" required>
                                            </div>
                                        </div>
                                        <div class="row mt-1">
                                            <div class="col-md-2">
                                                <label for="" class="form-label">Location</label>
                                            </div>
                                            <div class="col-md-6">
                                                <input type="text" name="incident_location" id="incident_location" class="form-control" required>
                                            </div>
                                        </div>
                                        <div class="row mt-1">
                                            <div class="col-md-2">
                                                <label for="" class="form-label">Nature of Incident</label>
                                            </div>
                                            <div class="col-md-6">
                                                <input class="form-control" list="nature_of_incidents" name="nature_of_incident">
                                                <datalist id="nature_of_incidents" name="nature_of_incident">
                                                    <option value="FIRE">FIRE</option>
                                                    <option value="VEHICULAR ACCIDENT">VEHICULAR ACCIDENT</option>
                                                    <option value="STRUCTURAL COLLAPSE">STRUCTURAL COLLAPSE</option>
                                                    <option value="OTHER">OTHER</option>
                                                </datalist>
                                            </div>
                                        </div>
                                        <div class="row mt-1">
                                            <div class="col-md-2">
                                                <label for="" class="form-label">Type of Incident</label>
                                            </div>
                                            <div class="col-md-6">
                                                <select name="type_of_incident" id="type_of_incident" class="form-select" required>
                                                    <option value="">Select</option>
                                                    <option value="TRAUMA">TRAUMA</option>
                                                    <option value="MEDICAL">MEDICAL</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="row mt-1">
                                            <div class="col-md-2">
                                                <label for="" class="form-label">TRANSER</label>
                                            </div>
                                            <div class="col-md-6">
                                                <select name="transfer" id="transfer" class="form-select" required>
                                                    <option value="">Select</option>
                                                    <option value="YES">YES</option>
                                                    <option value="NO">NO</option>
                                                </select>
                                            </div>
                                        </div>
                                        <h2 class="fs-6 mt-5">PATIENT'S INFORMATION</h2>
                                        <div class="row mt-1">
                                            <div class="col-md-2">
                                                <label for="" class="form-label">First Name</label>
                                            </div>
                                            <div class="col-md-6">
                                                <input type="text" name="patient_firstname" id="patient_firstname" class="form-control" required>
                                            </div>
                                        </div>
                                        <div class="row mt-1">
                                            <div class="col-md-2">
                                                <label for="" class="form-label">Middle Name</label>
                                            </div>
                                            <div class="col-md-6">
                                                <input type="text" name="patient_middlename" id="patient_middlename" class="form-control" required>
                                            </div>
                                        </div>
                                        <div class="row mt-1">
                                            <div class="col-md-2">
                                                <label for="" class="form-label">Last Name</label>
                                            </div>
                                            <div class="col-md-6">
                                                <input type="text" name="patient_lastname" id="patient_lastname" class="form-control" required>
                                            </div>
                                        </div>
                                        <div class="row mt-1">
                                            <div class="col-md-2">
                                                <label for="" class="form-label">Age</label>
                                            </div>
                                            <div class="col-md-2">
                                                <input type="number" name="patient_age" id="patient_age" class="form-control" required>
                                            </div>

                                            <label for="" class="form-label mt-3">Gender</label>
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" value="Male" name="flexRadioDefault" id="flexRadioDefault1" checked>
                                                <label class="form-check-label" for="flexRadioDefault1">
                                                    Male
                                                </label>
                                            </div>
                                            <div class="form-check mb-3">
                                                <input class="form-check-input" type="radio" value="Female" name="flexRadioDefault" id="flexRadioDefault2">
                                                <label class="form-check-label" for="flexRadioDefault2">
                                                    Female
                                                </label>
                                            </div>
                                        </div>
                                        <div class="row mt-1">
                                            <div class="col-md-2">
                                                <label for="" class="form-label">Status</label>
                                            </div>
                                            <div class="col-md-6">
                                                <input type="text" name="patient_status" id="patient_status" class="form-control" required>
                                            </div>
                                        </div>
                                        <div class="row mt-1">
                                            <div class="col-md-2">
                                                <label for="" class="form-label">Address</label>
                                            </div>
                                            <div class="col-md-6">
                                                <input type="text" name="patient_address" id="patient_address" class="form-control" required>
                                            </div>
                                        </div>
                                        <div class="row mt-1">
                                            <div class="col-md-2">
                                                <label for="" class="form-label">Vaccinated</label>
                                            </div>
                                            <div class="col-md-6">
                                                <input type="text" name="patient_vaccinated" id="patient_vaccinated" class="form-control" required>
                                            </div>
                                        </div>

                                        <h2 class="fs-6 mt-5">COMPANION'S INFORMATION</h2>
                                        <div class="row mt-1">
                                            <div class="col-md-2">
                                                <label for="" class="form-label">Name</label>
                                            </div>
                                            <div class="col-md-6">
                                                <input type="text" name="companion_name" id="companion_name" class="form-control" required>
                                            </div>
                                        </div>
                                        <div class="row mt-1">
                                            <div class="col-md-2">
                                                <label for="" class="form-label">Contact Number</label>
                                            </div>
                                            <div class="col-md-6">
                                                <input type="number" name="companion_contact_number" id="companion_contact_number" class="form-control" required>
                                            </div>
                                        </div>
                                        <div class="row mt-1">
                                            <div class="col-md-2">
                                                <label for="" class="form-label">Address</label>
                                            </div>
                                            <div class="col-md-6">
                                                <input type="text" name="companion_address" id="companion_address" class="form-control" required>
                                            </div>
                                        </div>
                                        <div class="row mt-1">
                                            <div class="col-md-2">
                                                <label for="" class="form-label">Relationship</label>
                                            </div>
                                            <div class="col-md-6">
                                                <input type="text" name="companion_relationship" id="companion_relationship" class="form-control" required>
                                            </div>
                                        </div>
                                        <h2 class="fs-6 mt-5">PATIENT'S CONDITION</h2>
                                        <div class="row mt-1">
                                            <div class="col-md-2">
                                                <label for="" class="form-label">Initial Impression</label>
                                            </div>
                                            <div class="col-md-6">
                                                <input type="text" name="initial_impression" id="initial_impression" class="form-control" required>
                                            </div>
                                        </div>
                                        <div class="row mt-1">
                                            <div class="col-md-2">
                                                <label for="" class="form-label">Chief Complaint</label>
                                            </div>
                                            <div class="col-md-6">
                                                <input type="text" name="chief_complaint" id="chief_complaint" class="form-control" required>
                                            </div>
                                        </div>
                                        <div class="row mt-1">
                                            <div class="col-md-2">
                                                <label for="" class="form-label">Symptoms</label>
                                            </div>
                                            <div class="col-md-6">
                                                <input type="text" name="symptoms" id="symptoms" class="form-control" required>
                                            </div>
                                        </div>
                                        <div class="row mt-1">
                                            <div class="col-md-2">
                                                <label for="" class="form-label">Past Medical History</label>
                                            </div>
                                            <div class="col-md-6">
                                                <input type="text" name="past_medical_history" id="past_medical_history" class="form-control" required>
                                            </div>
                                        </div>
                                        <div class="row mt-1">
                                            <div class="col-md-2">
                                                <label for="" class="form-label">Allergy</label>
                                            </div>
                                            <div class="col-md-6">
                                                <input type="text" name="allergy" id="allergy" class="form-control" required>
                                            </div>
                                        </div>
                                        <div class="row mt-1">
                                            <div class="col-md-2">
                                                <label for="" class="form-label">Last Oral Intake</label>
                                            </div>
                                            <div class="col-md-6">
                                                <input type="text" name="last_oral_intake" id="last_oral_intake" class="form-control" required>
                                            </div>
                                        </div>
                                        <div class="row mt-1">
                                            <div class="col-md-2">
                                                <label for="" class="form-label">Medication</label>
                                            </div>
                                            <div class="col-md-6">
                                                <input type="text" name="medication" id="medication" class="form-control" required>
                                            </div>
                                        </div>
                                        <div class="row mt-1">
                                            <div class="col-md-2">
                                                <label for="" class="form-label">Events Leading to Injury</label>
                                            </div>
                                            <div class="col-md-6">
                                                <input type="text" name="events_leading_to_injury" id="events_leading_to_injury" class="form-control" required>
                                            </div>
                                        </div> -->

                                        <!-- <h2 class="fs-6 mt-5">VITAL SIGNS</h2>
                                        <div class="row mt-1">


                                            <div class="col-md-2">
                                                <label for="" class="form-label">Blood Pressure</label>
                                            </div>
                                            
                                            <div class="col-md-2">
                                                <label for="" class="form-label">1st</label>
                                                <input type="text" name="bp1" id="bp1" class="form-control">
                                            </div>            
                                            
                                            <div class="col-md-2">
                                                <label for="" class="form-label">2nd</label>
                                                <input type="text" name="bp2" id="bp2" class="form-control">
                                            </div>      

                                            <div class="col-md-2">
                                                <label for="" class="form-label">3rd</label>
                                                <input type="text" name="bp3" id="bp3" class="form-control">
                                            </div>

                                            <div class="col-md-2">
                                                <label for="" class="form-label">4th</label>
                                                <input type="text" name="bp4" id="bp4" class="form-control">
                                            </div>   

                                            <div class="col-md-2">
                                                <label for="" class="form-label">5th</label>
                                                <input type="text" name="bp5" id="bp5" class="form-control">
                                            </div>  
                                          
                                           
                                        </div>

                                        <div class="row mt-1">
                                            <div class="col-md-2">
                                                <label for="" class="form-label">Pulse Rate</label>
                                                </div>
                                            
                                            <div class="col-md-2">
                                                <label for="" class="form-label">1st</label>
                                                <input type="text" name="pr1" id="pr1" class="form-control">
                                            </div>            
                                            
                                            <div class="col-md-2">
                                                <label for="" class="form-label">2nd</label>
                                                <input type="text" name="pr2" id="pr2" class="form-control">
                                            </div>      

                                            <div class="col-md-2">
                                                <label for="" class="form-label">3rd</label>
                                                <input type="text" name="pr3" id="pr3" class="form-control">
                                            </div>

                                            <div class="col-md-2">
                                                <label for="" class="form-label">4th</label>
                                                <input type="text" name="pr4" id="pr4" class="form-control">
                                            </div>   

                                            <div class="col-md-2">
                                                <label for="" class="form-label">5th</label>
                                                <input type="text" name="pr5" id="pr5" class="form-control">
                                            </div>  
                                        </div>
                                        <div class="row mt-1">
                                            <div class="col-md-2">

                                                <label for="" class="form-label">Respiratory Rate</label>
                                                </div>
                                            
                                            <div class="col-md-2">
                                                <label for="" class="form-label">1st</label>
                                                <input type="text" name="rr1" id="r1" class="form-control">
                                            </div>            
                                            
                                            <div class="col-md-2">
                                                <label for="" class="form-label">2nd</label>
                                                <input type="text" name="rr2" id="rr2" class="form-control">
                                            </div>      

                                            <div class="col-md-2">
                                                <label for="" class="form-label">3rd</label>
                                                <input type="text" name="rr3" id="rr3" class="form-control">
                                            </div>

                                            <div class="col-md-2">
                                                <label for="" class="form-label">4th</label>
                                                <input type="text" name="rr4" id="r4" class="form-control">
                                            </div>   

                                            <div class="col-md-2">
                                                <label for="" class="form-label">5th</label>
                                                <input type="text" name="rr5" id="rr5" class="form-control">
                                            </div>  
                                        </div>
                                        <div class="row mt-1">
                                            <div class="col-md-2">
                                                <label for="" class="form-label">Temperature</label>
                                                </div>
                                            
                                            <div class="col-md-2">
                                                <label for="" class="form-label">1st</label>
                                                <input type="text" name="temp1" id="temp1" class="form-control">
                                            </div>            
                                            
                                            <div class="col-md-2">
                                                <label for="" class="form-label">2nd</label>
                                                <input type="text" name="temp2" id="temp2" class="form-control">
                                            </div>      

                                            <div class="col-md-2">
                                                <label for="" class="form-label">3rd</label>
                                                <input type="text" name="temp3" id="temp3" class="form-control">
                                            </div>

                                            <div class="col-md-2">
                                                <label for="" class="form-label">4th</label>
                                                <input type="text" name="temp4" id="temp4" class="form-control">
                                            </div>   

                                            <div class="col-md-2">
                                                <label for="" class="form-label">5th</label>
                                                <input type="text" name="temp5" id="temp5" class="form-control">
                                            </div>  
                                        </div>
                                        <div class="row mt-1">
                                            <div class="col-md-2">
                                                <label for="" class="form-label">O2 Saturation</label>
                                                </div>
                                            
                                            <div class="col-md-2">
                                                <label for="" class="form-label">1st</label>
                                                <input type="text" name="os1" id="os1" class="form-control">
                                            </div>            
                                            
                                            <div class="col-md-2">
                                                <label for="" class="form-label">2nd</label>
                                                <input type="text" name="os2" id="os2" class="form-control">
                                            </div>      

                                            <div class="col-md-2">
                                                <label for="" class="form-label">3rd</label>
                                                <input type="text" name="os3" id="os3" class="form-control">
                                            </div>

                                            <div class="col-md-2">
                                                <label for="" class="form-label">4th</label>
                                                <input type="text" name="os4" id="os4" class="form-control">
                                            </div>   

                                            <div class="col-md-2">
                                                <label for="" class="form-label">5th</label>
                                                <input type="text" name="os5" id="os5" class="form-control">
                                            </div>  
                                        </div> -->
                                        <!-- <br> -->
                                        <!-- <div class="row mt-1">
                                            <div class="col-md-2">
                                                <label for="" class="form-label">LOC</label>
                                            </div>
                                            <div class="col-md-6">
                                                <input type="text" name="loc" id="loc" class="form-control">
                                            </div>
                                        </div>
                                        <div class="row mt-1">
                                            <div class="col-md-2">
                                                <label for="" class="form-label">Medical Condition</label>
                                            </div>
                                            <div class="col-md-6">
                                                <input type="text" name="medical_condition" id="medical_condition" class="form-control">
                                            </div>
                                        </div>
                                        <div class="row mt-1">
                                            <div class="col-md-2">
                                                <label for="" class="form-label">Oxygenation</label>
                                            </div>
                                            <div class="col-md-6">
                                                <input type="text" name="oxygenation" id="oxygenation" class="form-control">
                                            </div>
                                        </div>
                                        <div class="row mt-1">
                                            <div class="col-md-2">
                                                <label for="" class="form-label">Glasgow Coma Scale</label>
                                            </div>
                                            <div class="col-md-6">
                                                <input type="text" name="glasgow_coma_scale" id="glasgow_coma_scale" class="form-control">
                                            </div>
                                        </div>
                                        <div class="row mt-1">
                                            <div class="col-md-2">
                                                <label for="" class="form-label">Assessment Narrative</label>
                                            </div>
                                            <div class="col-md-6">
                                                <textarea name="assessment_narrative" id="assessment_narrative" class="form-control" cols="30" rows="5"></textarea>
                                            </div>
                                        </div>

                                        <div class="row mt-1">
                                            <div class="col-md-2">
                                                <label for="" class="form-label">Treatment Applied</label>
                                            </div>
                                            <div class="col-md-6">
                                                <textarea name="treatment_applied" id="treatment_applied" class="form-control" cols="30" rows="5"></textarea>
                                            </div>
                                        </div> -->


                                        <center>
                                        <div class="col-md-12 mt-4 mb-5">
                                            <button type="submit" name="submit_pre" class="btn btn-info">Submit</button>
                                             
                                            <button type="button" class="btn btn-secondary" onclick="location.href = 'calendar_doctor.php'">Cancel</button>
                                        </div>
                                        </center>

                                        
                                    </form>
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


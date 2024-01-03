<?php
session_start();
include '../model/connect.php';
include '../model/authenticate.php';

date_default_timezone_set('Asia/Hong_Kong');
$datenow=date("j/m/Y"); 
$timenow=date("h:i:s A"); 



    $database = new Database();
    $connect = $database->connect();
    
    $User = new User($connect);
    
// FOR LOGIN 
if (isset($_POST['login-submit'])) {
    $User->username = $_POST['username'];
    $password = $_POST['password'];

    $stmt = $User->login();

    if($stmt->rowCount() > 0) {
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        $hashedPassword = $row['password'];


        if (password_verify($password, $hashedPassword)) {
            if($row['user_type'] === "USER"){
                $_SESSION['id'] = $row['id'];
                $_SESSION['username'] = $row['username'];
                $_SESSION['password'] = $row['password'];
                $_SESSION['firstname'] = $row['firstname'];
                $_SESSION['lastname'] = $row['lastname'];
                $_SESSION['user_type'] = $row['user_type'];
                
                header("Location: calendar_doctor.php");
                $_SESSION['successMessage'] = "Welcome, " .$row['firstname'];
            } elseif($row['user_type'] === "ADMIN"){
                $_SESSION['id'] = $row['id'];
                $_SESSION['username'] = $row['username'];
                $_SESSION['password'] = $row['password'];
                $_SESSION['firstname'] = $row['firstname'];
                $_SESSION['lastname'] = $row['lastname'];
                $_SESSION['user_type'] = $row['user_type'];
                
                header("Location: calendar_doctor.php");
                $_SESSION['successMessage'] = "Welcome, Admin " .$row['firstname'];
            }
        }
        else{
            $_SESSION['errorMessage'] = "Wrong username or password";
            header("Location: ../index.php");
        }
    } else {
        $_SESSION['errorMessage'] = "No user found";
        header("Location: ../index.php");
        exit(0);
    }
}

// FOR REGISTRATION
if (isset($_POST['register'])) {
    if($_POST['password'] === $_POST['confirmpassword']){
        $User = new User($connect);

    $select = "SELECT * FROM user WHERE username = ?";
    $stmt = $connect->prepare($select);
    $stmt->bindParam(1, $_POST['username']);
    $stmt->execute();

    $row = $stmt->fetch(PDO::FETCH_ASSOC);
        $username = $row['username'];

        if($_POST['username'] !== $username){
            $register = $User->signup($_POST['idnumber'], $_POST['firstName'], $_POST['middleName'], $_POST['lastName'], $_POST['email'], $_POST['contactNumber'], $_POST['division'], $_POST['username'], $_POST['password']);
    
            if ($register) {
                $_SESSION['successMessage'] = "Successfully Created";
            } else {
                $_SESSION['errorMessage'] = "Error in creating an account";
            }
        }
        else{
            $_SESSION['errorMessage'] = 'Username is already exist';
        }
    
        
    }
    else{
        $_SESSION['errorMessage'] = "Password doesn't match";
    }
    
    header("Location: ../index.php");
    exit(0);
}

// FOR SET APPOINTMENT
if(isset($_POST['appoint_btn'])){
    $user_id = $_SESSION['id'];
    $appoint_date = $_POST['appointment_date'];
    $name = $_SESSION['firstname'] . " " . $_SESSION['lastname'];
    $type = $_SESSION['user_type'];

    if(!empty($appoint_date)){
        $add_appoint = $User->appoint_date($user_id, $appoint_date, $appoint_date, $name, $type);

        if($add_appoint){
            $_SESSION['successMessage'] = "Successfully Appointted";
        }
        else{
            $_SESSION['errorMessage'] = "Error in creating appointment";
        }  
    }
    else{
        $_SESSION['errorMessage'] = "No set appointment date";
    }
    header("Location: index.php");
    exit(0);
}

if(isset($_POST['appoint_btn_doctor'])){
    $user_id = $_SESSION['id'];
    $appoint_date = $_POST['appointment_date'];
    $name = $_SESSION['firstname'] . " " . $_SESSION['lastname'];
    $type = $_SESSION['user_type'];

    if(!empty($appoint_date)){
        $add_appoint = $User->appoint_date($user_id, $appoint_date, $appoint_date, $name, $type);

        if($add_appoint){
            $_SESSION['successMessage'] = "Successfully Appoint";
        }
        else{
            $_SESSION['errorMessage'] = "Error in creating appointment";
        }  
    }
    else{
        $_SESSION['errorMessage'] = "No set appointment date";
    }
    header("Location: calendar_doctor.php");
    exit(0);
}




// FOR PRE-HOSPITAL CARE REPORT
//insert data to pre_hospital_info
if (isset($_POST['submit_pre'])) {

 $incident_date = $_POST['incident_date'];
 $info_time = $_POST['incident_time'];
 $info_location = $_POST['incident_location'];
 $nature_of_incident = $_POST['nature_of_incident'];
 $type_of_incident = $_POST['type_of_incident'];
 $transfer = $_POST['transfer'];
 $patient_firstname = $_POST['patient_firstname'];
 $patient_middlename = $_POST['patient_middlename'];
 $patient_lastname = $_POST['patient_lastname'];
 $patient_age = $_POST['patient_age'];
 $patient_gender = $_POST['flexRadioDefault'];
 $patient_status = $_POST['patient_status'];
 $patient_address = $_POST['patient_address'];
 $patient_vac = $_POST['patient_vaccinated'];
 $companion_name = $_POST['companion_name'];
 $companion_contact_number = $_POST['companion_contact_number'];
 $companion_address = $_POST['companion_address'];
 $companion_relationship = $_POST['companion_relationship'];
 $initial_impression = $_POST['initial_impression'];
 $chief_complaint = $_POST['chief_complaint'];
 $symptoms = $_POST['symptoms'];
 $allergy = $_POST['allergy'];
 $medication = $_POST['medication'];
 $past_medical_history = $_POST['past_medical_history'];
 $last_oral_intake = $_POST['last_oral_intake'];
 $events_leading_to_injury = $_POST['events_leading_to_injury'];
 $loc = $_POST['loc'];
 $medical_condition = $_POST['medical_condition'];
 $oxygenation = $_POST['oxygenation'];
 $glasgow_coma_scale = $_POST['glasgow_coma_scale'];
 $assessment_narative = $_POST['assessment_narrative'];
 $treatment_applied = $_POST['treatment_applied'];
//  $safety_marshal = $_POST['safety_marshal'];
//  $endorsed_to = $_POST['endorsed_to'];

// $bp1= $_POST[''];
// $bp2= $_POST[''];
// $bp3= $_POST[''];
// $bp4= $_POST[''];
// $bp5= $_POST[''];

// $pr1= $_POST[''];
// $pr2= $_POST[''];
// $pr3= $_POST[''];
// $pr4= $_POST[''];
// $pr5= $_POST[''];

// $rr1= $_POST[''];
// $rr2= $_POST[''];
// $rr3= $_POST[''];
// $rr4= $_POST[''];
// $rr5= $_POST[''];

// $temp1= $_POST[''];
// $temp2= $_POST[''];
// $temp3= $_POST[''];
// $temp4= $_POST[''];
// $temp5= $_POST[''];

// $os1
// $os2
// $os3
// $os4
// $os5


 $safety_marshal ="safety Marshal";
 $endorsed_to = "endorsed to";
 


 $User = new User($connect);
	$sql = "INSERT INTO pre_hospital_info (info_date,info_time,info_location,nature_of_incident,type_of_incident,transfer_info,patient_firstname, patient_middlename,patient_lastname,patient_age,patient_gender,patient_status,patient_address,patient_vac,companion_name,companion_contact_number,companion_address,companion_relationship,initial_impression,chief_complaint,symptoms,allergy,medication,past_medical_history,last_oral_intake,events_leading_to_injury,loc,medical_condition,oxygenation,glasgow_coma_scale, assessment_narative,treatment_applied,safety_marshal,endorsed_to  ) VALUES ( '$incident_date','$info_time','$info_location','$nature_of_incident','$type_of_incident','$transfer','$patient_firstname','$patient_middlename','$patient_lastname','$patient_age','$patient_gender','$patient_status','$patient_address','$patient_vac','$companion_name','$companion_contact_number','$companion_address','$companion_relationship','$initial_impression','$chief_complaint','$symptoms','$allergy','$medication','$past_medical_history','$last_oral_intake','$events_leading_to_injury','$loc','$medical_condition','$oxygenation','$glasgow_coma_scale','$assessment_narative','$treatment_applied','$safety_marshal','$endorsed_to')";
	$pdo_statement = $connect->prepare( $sql );
    $result = $pdo_statement->execute();

    if (!empty($result) ){

        $_SESSION['successMessage'] = "Insert Successfull";
        // header("Location: ../index.php");
        header("Location: calendar_doctor.php");
      }
      else{

        
        $_SESSION['successMessage'] = "Invalid";
      }
}

if(isset($_POST['submit_vitals'])){
    $vitalID = $_POST['vital_id'];
    $bp1 = $_POST['bp1'];
    $bp2 = $_POST['bp2'];
    $bp3 = $_POST['bp3'];
    $bp4 = $_POST['bp4'];
    $bp5 = $_POST['bp5'];

    $pr1= $_POST['pr1'];
    $pr2= $_POST['pr2'];
    $pr3= $_POST['pr3'];
    $pr4= $_POST['pr4'];
    $pr5= $_POST['pr5'];

    $rr1= $_POST['rr1'];
    $rr2= $_POST['rr2'];
    $rr3= $_POST['rr3'];
    $rr4= $_POST['rr4'];
    $rr5= $_POST['rr5'];

    $temp1= $_POST['temp1'];
    $temp2= $_POST['temp2'];
    $temp3= $_POST['temp3'];
    $temp4= $_POST['temp4'];
    $temp5= $_POST['temp5'];

    $os1= $_POST['os1'];
    $os2= $_POST['os2'];
    $os3= $_POST['os3'];
    $os4= $_POST['os4'];
    $os5= $_POST['os5'];



    $query = "UPDATE pre_hospital_info 
    SET bp1 = ?, bp2 = ?,  bp3 = ?, bp4 = ?, bp5 = ?,
        pr1 = ?, pr2 = ?,  pr3 = ?, pr4 = ?, pr5 = ?,
        rr1 = ?, rr2 = ?,  rr3 = ?, rr4 = ?, rr5 = ?,
        temp1 = ?, temp2 = ?,  temp3 = ?, temp4 = ?, temp5 = ?,
        os1 = ?, os2 = ?,  os3 = ?, os4 = ?, os5 = ?
               
    WHERE id = ?";
    
    $stmt = $connect->prepare($query);
    $stmt->bindParam(1, $bp1);
    $stmt->bindParam(2, $bp2);
    $stmt->bindParam(3, $bp3);
    $stmt->bindParam(4, $bp4);
    $stmt->bindParam(5, $bp5);

    $stmt->bindParam(6, $pr1);
    $stmt->bindParam(7, $pr2);
    $stmt->bindParam(8, $pr3);
    $stmt->bindParam(9, $pr4);
    $stmt->bindParam(10, $pr5);

    $stmt->bindParam(11, $rr1);
    $stmt->bindParam(12, $rr2);
    $stmt->bindParam(13, $rr3);
    $stmt->bindParam(14, $rr4);
    $stmt->bindParam(15, $rr5);

    $stmt->bindParam(16, $temp1);
    $stmt->bindParam(17, $temp2);
    $stmt->bindParam(18, $temp3);
    $stmt->bindParam(19, $temp4);
    $stmt->bindParam(20, $temp5);

    $stmt->bindParam(21, $os1);
    $stmt->bindParam(22, $os2);
    $stmt->bindParam(23, $os3);
    $stmt->bindParam(24, $os4);
    $stmt->bindParam(25, $os5);    

    $stmt->bindParam(26, $vitalID);
    
    if($stmt->execute()){
        $_SESSION['successMessage'] = "Success";
    }
    header("Location: select_patient.php");
    exit(0);
}



if(isset($_POST['submit_profile1'])){
    $vitalID = $_POST['vital_id'];
     $profile_name=$_POST['vname'];
    $profile_id=$_POST['vid'];
    $profile_division=$_POST['vcontact'];
    $tubercolosis=$_POST['tubercolosis'];
    $tubercolosisv=$_POST['tubercolosisv'];
    $hypertension=$_POST['hypertension'];
    $hypertensionv=$_POST['hypertensionv'];
    $diabetes_mellittus=$_POST['diabetes_mellittus'];
    $diabetes_mellittusv=$_POST['diabetes_mellittusv'];
    $heart_trouble=$_POST['heart_trouble'];
    $heart_troublev=$_POST['heart_troublev'];
    $endocrine_diseases=$_POST['endocrine_deseases'];
    $endocrine_diseasesv=$_POST['endocrine_deseasesv'];
    $cancer_tumor=$_POST['cancel_tumor'];
    $cancer_tumorv=$_POST['cancel_tumorv'];
    $mental_disorder=$_POST['mental_disorder'];
    $mental_disorderv=$_POST['mental_disorderv'];
    $frequent_headache=$_POST['frequent_headache'];
    $frequent_headachev=$_POST['frequent_headachev'];
    $chronic_cough=$_POST['chronic_cough'];
    $chronic_coughv=$_POST['chronic_coughv'];
    $std=$_POST['std'];
    $stdv=$_POST['stdv'];
    $hepa_b=$_POST['hepa_b'];
    $hepa_bv=$_POST['hepa_bv'];
    $hepa_a=$_POST['hepa_a'];
    $hepa_av=$_POST['hepa_av'];
    $aids_hiv=$_POST['aids_hiv'];
    $aids_hivv=$_POST['aids_hivv'];
    $covid19=$_POST['covid19'];
    $covid19v=$_POST['covid19v'];
    $asthma=$_POST['asthma'];
    $asthmav=$_POST['asthmav'];
    $rheumatism=$_POST['rheumatism'];
    $rheumatismv=$_POST['rheumatismv'];
    $physical_injury=$_POST['physical_injury'];
    $physical_injuryv=$_POST['physical_injuryv'];
    $hernia=$_POST['hernia'];
    $herniav=$_POST['herniav'];
    $typhoid=$_POST['typhoid'];
    $typhoidv=$_POST['typhoidv'];
    $stomach_abdomina=$_POST['stomach_abdominal'];
    $stomach_abdominav=$_POST['stomach_abdominalv'];
    $kidney_bladder=$_POST['kidney_bladder'];
    $kidney_bladderv=$_POST['kidney_bladderv'];
    $dizziness=$_POST['dizzeness'];
    $dizzinessv=$_POST['dizzenessv'];
    $allergies=$_POST['allergies'];
    $allergiesv=$_POST['allergiesv'];
    $others=$_POST['othersv'];
    $othersv=$_POST['others'];
    $othersv1=$_POST['othersv1'];
    
    $height=$_POST['heightv'];
    $heightv=$_POST['heightv1'];
    $weight=$_POST['weightv'];
    $weightv=$_POST['weightv1'];
    $temp=$_POST['tempv'];
    $tempv=$_POST['tempv1'];
    $blood_presure=$_POST['blood_presurev'];
    $blood_presurev=$_POST['blood_presurev1'];
    $pulse_rate=$_POST['pulse_ratev'];
    $pulse_ratev=$_POST['pulse_ratev1'];
    $respi=$_POST['respi_ratev'];
    $respiv=$_POST['respi_ratev1'];
    $bmi=$_POST['bmiv'];
    $bmiv=$_POST['bmiv1'];
    $skin=$_POST['skin'];
    $skinv=$_POST['skinv'];
    $ent=$_POST['ent'];
    $entv=$_POST['entv'];
    $head=$_POST['head'];
    $headv=$_POST['headv'];
    $chest=$_POST['chest'];
    $chestv=$_POST['chestv'];
    $back=$_POST['back'];
    $backv=$_POST['backv'];
    $genitals=$_POST['genitals'];
    $genitalsv=$_POST['genitalsv'];
    $rectal=$_POST['rectal'];
    $rectalv=$_POST['rectalv'];
    $ename=$_POST['enamev'];
    $eaddress=$_POST['eaddressv'];
    $econtact=$_POST['enumberv'];
    $erelation=$_POST['erelationv'];
    $drinking=$_POST['l_drinkingv'];
    $smoking=$_POST['l_smokingv'];
    $exercise=$_POST['l_exercisev'];




    $User = new User($connect);
	$sql = "INSERT INTO profile1 (
                emp_id,
                profile_name,
                profile_id,
                profile_division,
                tubercolosis,
                tubercolosisv,
                hypertension,
                hypertensionv,
                diabetes_mellittus,
                diabetes_mellittusv,
                heart_trouble,
                heart_troublev,
                endocrine_diseases,
                endocrine_diseasesv,
                cancer_tumor,
                cancer_tumorv,
                mental_disorder,
                mental_disorderv,
                frequent_headache,
                frequent_headachev,
                chronic_cough,
                chronic_coughv,
                std,
                stdv,
                hepa_b,
                hepa_bv,
                hepa_a,
                hepa_av,
                aids_hiv,
                aids_hivv,
                covid19,
                covid19v,
                asthma,
                asthmav,
                rheumatism,
                rheumatismv,
                physical_injury,
                physical_injuryv,
                hernia,
                herniav,
                typhoid,
                typhoidv,
                stomach_abdomina,
                stomach_abdominav,
                kidney_bladder,
                kidney_bladderv,
                dizziness,
                dizzinessv,
                allergies,
                allergiesv,
                others,
                othersv,
                othersv1,
                height,
                heightv,
                weightd,
                weightv,
                temp,
                tempv,
                blood_presure,
                blood_presurev,
                pulse_rate,
                pulse_ratev,
                respi,
                respiv,
                bmi,
                bmiv,
                skin,
                skinv,
                ent,
                entv,
                head,
                headv,
                chest,
                chestv,
                back,
                backv,
                genitals,
                genitalsv,
                rectal,
                rectalv,
                ename,
                eaddress,
                econtact,
                erelation,
                drinking,
                smoking,
                exercise

    ) 
    VALUES ( 
        $vitalID,
        '$profile_name',
'$profile_id',
'$profile_division',
'$tubercolosis',
'$tubercolosisv',
'$hypertension',
'$hypertensionv',
'$diabetes_mellittus',
'$diabetes_mellittusv',
'$heart_trouble',
'$heart_troublev',
'$endocrine_diseases',
'$endocrine_diseasesv',
'$cancer_tumor',
'$cancer_tumorv',
'$mental_disorder',
'$mental_disorderv',
'$frequent_headache',
'$frequent_headachev',
'$chronic_cough',
'$chronic_coughv',
'$std',
'$stdv',
'$hepa_b',
'$hepa_bv',
'$hepa_a',
'$hepa_av',
'$aids_hiv',
'$aids_hivv',
'$covid19',
'$covid19v',
'$asthma',
'$asthmav',
'$rheumatism',
'$rheumatismv',
'$physical_injury',
'$physical_injuryv',
'$hernia',
'$herniav',
'$typhoid',
'$typhoidv',
'$stomach_abdomina',
'$stomach_abdominav',
'$kidney_bladder',
'$kidney_bladderv',
'$dizziness',
'$dizzinessv',
'$allergies',
'$allergiesv',
'$others',
'$othersv',
'$othersv1',
'$height',
'$heightv',
'$weight',
'$weightv',
'$temp',
'$tempv',
'$blood_presure',
'$blood_presurev',
'$pulse_rate',
'$pulse_ratev',
'$respi',
'$respiv',
'$bmi',
'$bmiv',
'$skin',
'$skinv',
'$ent',
'$entv',
'$head',
'$headv',
'$chest',
'$chestv',
'$back',
'$backv',
'$genitals',
'$genitalsv',
'$rectal',
'$rectalv',
'$ename',
'$eaddress',
'$econtact',
'$erelation',
'$drinking',
'$smoking',
'$exercise'


    )";




	$pdo_statement = $connect->prepare( $sql );
    $result = $pdo_statement->execute();

    if ($result){


                $val="1";


                    $query = "UPDATE emp 
                    SET track = ?    WHERE id = ?";

                $stmt = $connect->prepare($query);
                $stmt->bindParam(1, $val);
                $stmt->bindParam(2, $vitalID);

                if($stmt->execute()){
                    $_SESSION['successMessage'] = "Success";


        // $_SESSION['successMessage'] = "Insert Successfull";
        // header("Location: ../index.php");
        // header("Location: calendar_doctor.php");
      }
      else{

        
        $_SESSION['errorMessage']= "Invalid";
      }




    }

    else{
        $_SESSION['errorMessage'] = "Invalid Insert";
    }

      header("Location: calendar_doctor.php");
exit(0);


    
}


if(isset($_POST['submit_profile_edit'])){

    $vitalID = $_POST['vital_id'];
     $profile_name=$_POST['vname'];
    $profile_id=$_POST['vid'];
    $profile_division=$_POST['vcontact'];
    $tubercolosis=$_POST['tubercolosis'];
    $tubercolosisv=$_POST['tubercolosisv'];
    $hypertension=$_POST['hypertension'];
    $hypertensionv=$_POST['hypertensionv'];
    $diabetes_mellittus=$_POST['diabetes_mellittus'];
    $diabetes_mellittusv=$_POST['diabetes_mellittusv'];
    $heart_trouble=$_POST['heart_trouble'];
    $heart_troublev=$_POST['heart_troublev'];
    $endocrine_diseases=$_POST['endocrine_deseases'];
    $endocrine_diseasesv=$_POST['endocrine_deseasesv'];
    $cancer_tumor=$_POST['cancel_tumor'];
    $cancer_tumorv=$_POST['cancel_tumorv'];
    $mental_disorder=$_POST['mental_disorder'];
    $mental_disorderv=$_POST['mental_disorderv'];
    $frequent_headache=$_POST['frequent_headache'];
    $frequent_headachev=$_POST['frequent_headachev'];
    $chronic_cough=$_POST['chronic_cough'];
    $chronic_coughv=$_POST['chronic_coughv'];
    $std=$_POST['std'];
    $stdv=$_POST['stdv'];
    $hepa_b=$_POST['hepa_b'];
    $hepa_bv=$_POST['hepa_bv'];
    $hepa_a=$_POST['hepa_a'];
    $hepa_av=$_POST['hepa_av'];
    $aids_hiv=$_POST['aids_hiv'];
    $aids_hivv=$_POST['aids_hivv'];
    $covid19=$_POST['covid19'];
    $covid19v=$_POST['covid19v'];
    $asthma=$_POST['asthma'];
    $asthmav=$_POST['asthmav'];
    $rheumatism=$_POST['rheumatism'];
    $rheumatismv=$_POST['rheumatismv'];
    $physical_injury=$_POST['physical_injury'];
    $physical_injuryv=$_POST['physical_injuryv'];
    $hernia=$_POST['hernia'];
    $herniav=$_POST['herniav'];
    $typhoid=$_POST['typhoid'];
    $typhoidv=$_POST['typhoidv'];
    $stomach_abdomina=$_POST['stomach_abdominal'];
    $stomach_abdominav=$_POST['stomach_abdominalv'];
    $kidney_bladder=$_POST['kidney_bladder'];
    $kidney_bladderv=$_POST['kidney_bladderv'];
    $dizziness=$_POST['dizzeness'];
    $dizzinessv=$_POST['dizzenessv'];
    $allergies=$_POST['allergies'];
    $allergiesv=$_POST['allergiesv'];
    $others=$_POST['othersv'];
    $othersv=$_POST['others'];
    $othersv1=$_POST['othersv1'];
    
    $height=$_POST['heightv'];
    $heightv=$_POST['heightv1'];
    $weight=$_POST['weightv'];
    $weightv=$_POST['weightv1'];
    $temp=$_POST['tempv'];
    $tempv=$_POST['tempv1'];
    $blood_presure=$_POST['blood_presurev'];
    $blood_presurev=$_POST['blood_presurev1'];
    $pulse_rate=$_POST['pulse_ratev'];
    $pulse_ratev=$_POST['pulse_ratev1'];
    $respi=$_POST['respi_ratev'];
    $respiv=$_POST['respi_ratev1'];
    $bmi=$_POST['bmiv'];
    $bmiv=$_POST['bmiv1'];
    $skin=$_POST['skin'];
    $skinv=$_POST['skinv'];
    $ent=$_POST['ent'];
    $entv=$_POST['entv'];
    $head=$_POST['head'];
    $headv=$_POST['headv'];
    $chest=$_POST['chest'];
    $chestv=$_POST['chestv'];
    $back=$_POST['back'];
    $backv=$_POST['backv'];
    $genitals=$_POST['genitals'];
    $genitalsv=$_POST['genitalsv'];
    $rectal=$_POST['rectal'];
    $rectalv=$_POST['rectalv'];
    $ename=$_POST['enamev'];
    $eaddress=$_POST['eaddressv'];
    $econtact=$_POST['enumberv'];
    $erelation=$_POST['erelationv'];
    $drinking=$_POST['l_drinkingv'];
    $smoking=$_POST['l_smokingv'];
    $exercise=$_POST['l_exercisev'];

    $query = "UPDATE profile1 
    SET
          emp_id=?,
        profile_name= ?,
        profile_id= ?,
        profile_division= ?,
        tubercolosis= ?,
        tubercolosisv= ?,
        hypertension= ?,
        hypertensionv= ?,
        diabetes_mellittus= ?,
        diabetes_mellittusv= ?,
        heart_trouble= ?,
        heart_troublev= ?,
        endocrine_diseases= ?,
        endocrine_diseasesv= ?,
        cancer_tumor= ?,
        cancer_tumorv= ?,
        mental_disorder= ?,
        mental_disorderv= ?,
        frequent_headache= ?,
        frequent_headachev= ?,
        chronic_cough= ?,
        chronic_coughv= ?,
        std= ?,
        stdv= ?,
        hepa_b= ?,
        hepa_bv= ?,
        hepa_a= ?,
        hepa_av= ?,
        aids_hiv= ?,
        aids_hivv= ?,
        covid19= ?,
        covid19v= ?,
        asthma= ?,
        asthmav= ?,
        rheumatism= ?,
        rheumatismv= ?,
        physical_injury= ?,
        physical_injuryv= ?,
        hernia= ?,
        herniav= ?,
        typhoid= ?,
        typhoidv= ?,
        stomach_abdomina= ?,
        stomach_abdominav= ?,
        kidney_bladder= ?,
        kidney_bladderv= ?,
        dizziness= ?,
        dizzinessv= ?,
        allergies= ?,
        allergiesv= ?,
        others= ?,
        othersv= ?,
        othersv1= ?,
        
        height= ?,
        heightv= ?,
        weightd= ?,
        weightv= ?,
        temp= ?,
        tempv= ?,
        blood_presure= ?,
        blood_presurev= ?,
        pulse_rate= ?,
        pulse_ratev= ?,
        respi= ?,
        respiv= ?,
        bmi= ?,
        bmiv= ?,
        skin= ?,
        skinv= ?,
        ent= ?,
        entv= ?,
        head= ?,
        headv= ?,
        chest= ?,
        chestv= ?,
        back= ?,
        backv= ?,
        genitals= ?,
        genitalsv= ?,
        rectal= ?,
        rectalv= ?,
        ename= ?,
        eaddress= ?,
        econtact= ?,
        erelation= ?,
        drinking= ?,
        smoking= ?,
        exercise= ?

               
    WHERE emp_id = ?";

$stmt = $connect->prepare($query);
$stmt->bindParam(1, $vitalID);
$stmt->bindParam(2,$profile_name);
$stmt->bindParam(3,$profile_id);
$stmt->bindParam(4,$profile_division);
$stmt->bindParam(5,$tubercolosis);
$stmt->bindParam(6,$tubercolosisv);
$stmt->bindParam(7,$hypertension);
$stmt->bindParam(8,$hypertensionv);
$stmt->bindParam(9,$diabetes_mellittus);
$stmt->bindParam(10,$diabetes_mellittusv);
$stmt->bindParam(11,$heart_trouble);
$stmt->bindParam(12,$heart_troublev);
$stmt->bindParam(13,$endocrine_diseases);
$stmt->bindParam(14,$endocrine_diseasesv);
$stmt->bindParam(15,$cancer_tumor);
$stmt->bindParam(16,$cancer_tumorv);
$stmt->bindParam(17,$mental_disorder);
$stmt->bindParam(18,$mental_disorderv);
$stmt->bindParam(19,$frequent_headache);
$stmt->bindParam(20,$frequent_headachev);
$stmt->bindParam(21,$chronic_cough);
$stmt->bindParam(22,$chronic_coughv);
$stmt->bindParam(23,$std);
$stmt->bindParam(24,$stdv);
$stmt->bindParam(25,$hepa_b);
$stmt->bindParam(26,$hepa_bv);
$stmt->bindParam(27,$hepa_a);
$stmt->bindParam(28,$hepa_av);
$stmt->bindParam(29,$aids_hiv);
$stmt->bindParam(30,$aids_hivv);
$stmt->bindParam(31,$covid19);
$stmt->bindParam(32,$covid19v);
$stmt->bindParam(33,$asthma);
$stmt->bindParam(34,$asthmav);
$stmt->bindParam(35,$rheumatism);
$stmt->bindParam(36,$rheumatismv);
$stmt->bindParam(37,$physical_injury);
$stmt->bindParam(38,$physical_injuryv);
$stmt->bindParam(39,$hernia);
$stmt->bindParam(40,$herniav);
$stmt->bindParam(41,$typhoid);
$stmt->bindParam(42,$typhoidv);
$stmt->bindParam(43,$stomach_abdomina);
$stmt->bindParam(44,$stomach_abdominav);
$stmt->bindParam(45,$kidney_bladder);
$stmt->bindParam(46,$kidney_bladderv);
$stmt->bindParam(47,$dizziness);
$stmt->bindParam(48,$dizzinessv);
$stmt->bindParam(49,$allergies);
$stmt->bindParam(50,$allergiesv);
$stmt->bindParam(51,$others);
$stmt->bindParam(52,$othersv);
$stmt->bindParam(53,$othersv1);

$stmt->bindParam(54,$height);
$stmt->bindParam(55,$heightv);
$stmt->bindParam(56,$weight);
$stmt->bindParam(57,$weightv);
$stmt->bindParam(58,$temp);
$stmt->bindParam(59,$tempv);
$stmt->bindParam(60,$blood_presure);
$stmt->bindParam(61,$blood_presurev);
$stmt->bindParam(62,$pulse_rate);
$stmt->bindParam(63,$pulse_ratev);
$stmt->bindParam(64,$respi);
$stmt->bindParam(65,$respiv);
$stmt->bindParam(66,$bmi);
$stmt->bindParam(67,$bmiv);
$stmt->bindParam(68,$skin);
$stmt->bindParam(69,$skinv);
$stmt->bindParam(70,$ent);
$stmt->bindParam(71,$entv);
$stmt->bindParam(72,$head);
$stmt->bindParam(73,$headv);
$stmt->bindParam(74,$chest);
$stmt->bindParam(75,$chestv);
$stmt->bindParam(76,$back);
$stmt->bindParam(77,$backv);
$stmt->bindParam(78,$genitals);
$stmt->bindParam(79,$genitalsv);
$stmt->bindParam(80,$rectal);
$stmt->bindParam(81,$rectalv);
$stmt->bindParam(82,$ename);
$stmt->bindParam(83,$eaddress);
$stmt->bindParam(84,$econtact);
$stmt->bindParam(85,$erelation);
$stmt->bindParam(86,$drinking);
$stmt->bindParam(87,$smoking);
$stmt->bindParam(88,$exercise);
$stmt->bindParam(89, $vitalID);

if($stmt->execute()){
    $_SESSION['successMessage'] = "Success";

    header("Location: calendar_doctor.php");
}
}



//insert to vitals database for revital
if (isset($_POST['submit_revitals'])) {

    $vital_id1 = $_POST['vital_id'];
     $vital_name1 = $_POST['vital_name']; 

     $bp1 = $_POST['bp1'];
     $pr1 = $_POST['pr1']; 
     $rr1 = $_POST['rr1'];
     $temp1 = $_POST['temp1'];
     $os1 = $_POST['os1'];
     $sugar1 = $_POST['sugar1'];
     $height1 = $_POST['height1'];
     $weight1 = $_POST['weight1'];

   
   
    $User = new User($connect);
       $sql = "INSERT INTO vitals (info_date,info_time,info_id,patient_name,bp1,pr1,rr1,temp1,os1,sugar,heightd,weightd)
        VALUES ( '$datenow','$timenow','$vital_id1','$vital_name1','$bp1','$pr1','$rr1','$temp1','$os1','$sugar1','$height1','$weight1')";
       $pdo_statement = $connect->prepare( $sql );
       $result = $pdo_statement->execute();
   
       if (!empty($result) ){
   
           $_SESSION['successMessage'] = "Insert Successfull";
           // header("Location: ../index.php");
           header("Location: calendar_doctor.php");
         }
         else{
   
           
           $_SESSION['successMessage'] = "Invalid";
         }
   }
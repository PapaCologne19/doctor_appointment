<?php 
session_start();
include '../model/connect.php';
include '../model/authenticate.php';
?>
<!DOCTYPE html>
<html lang="en">


<style>
    p{
        color:black;
    }
    @media print {  
 
        html, body {
   
          background-color: white;
       /* height:100%;  */
    margin: 0 !important; 
    padding: 0 !important;
    Zoom:75%;
 
  }
 
  body {
    margin: 0;
    color: #000;
    background-color: white;
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



table {
  font-family: arial, sans-serif;
  border-collapse: collapse;
  width: 100%;
  color:black;

}

td, th {
  /* border: 0.5px solid #dddddd; */
  text-align: left;
  padding: 0.5px;
color:black;
  border-collapse: collapse;
}

tr:nth-child(even) {
  background-color: #dddddd;
}
</style>

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
      

                <!-- Content -->
                <!-- <div class="content-wrapper mt-3">
                    <div class="container">
                        <div class="card">
                            <div class="container"> -->
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


                          



                                        
<h5>Medical History</h5>

<table>
  <tr>
    <th>ITEM</th>
    <th>INFO</th>
    <th>REMARKS</th>
  </tr>
  <tr>
    <td>Tubercolosis</td>
    <td><?php echo $rowp['tubercolosis']?></td>
    <td><?php echo $rowp['tubercolosisv']?></td>
  </tr>
  <tr>
    <td>hypertension</td>
    <td><?php echo $rowp['hypertension']?></td>
    <td><?php echo $rowp['hypertensionv']?></td>
  </tr>
  <tr>
    <td> Diabetes Mellittus</td>
    <td><?php echo $rowp['diabetes_mellittus']?></td>
    <td><?php echo $rowp['diabetes_mellittusv']?></td>
  </tr>
  <tr>
    <td> Heart trouble</td>
    <td><?php echo $rowp['heart_trouble']?></td>
    <td><?php echo $rowp['heart_troublev']?></td>
  </tr>
  <tr>
    <td> Endocrine Diseases</td>
    <td><?php echo $rowp['endocrine_diseases']?></td>
    <td><?php echo $rowp['endocrine_diseasesv']?></td>
  </tr>
  <tr>
    <td> Cancer/Tumor</td>
    <td><?php echo $rowp['cancer_tumor']?></td>
    <td><?php echo $rowp['cancer_tumorv']?></td>
  </tr>

  <td> Mental Disorder</td>
    <td><?php echo $rowp['mental_disorder']?></td>
    <td><?php echo $rowp['mental_disorderv']?></td>
  </tr>

      <td> Frequent Headache</td>
    <td><?php echo $rowp['frequent_headache']?></td>
    <td><?php echo $rowp['frequent_headachev']?></td>
  </tr>

    <td> Chronic Cough</td>
    <td><?php echo $rowp['chronic_cough']?></td>
    <td><?php echo $rowp['chronic_coughv']?></td>
  </tr>
  <td> Sexually Transmitted</td>
    <td><?php echo $rowp['std']?></td>
    <td><?php echo $rowp['stdv']?></td>
  </tr>

  <td> Hepa B</td>
    <td><?php echo $rowp['hepa_b']?></td>
    <td><?php echo $rowp['hepa_bv']?></td>
  </tr>

  <td> Hepa A</td>
    <td><?php echo $rowp['hepa_a']?></td>
    <td><?php echo $rowp['hepa_av']?></td>
  </tr>

  <td>AIDS / HIV</td>
    <td><?php echo $rowp['aids_hiv']?></td>
    <td><?php echo $rowp['aids_hivv']?></td>
  </tr>

  <td>Covid 19</td>
    <td><?php echo $rowp['covid19']?></td>
    <td><?php echo $rowp['covid19v']?></td>
  </tr>

  <td>Asthma</td>
    <td><?php echo $rowp['asthma']?></td>
    <td><?php echo $rowp['asthmav']?></td>
  </tr>

  <td>Rheumatism</td>
    <td><?php echo $rowp['rheumatism']?></td>
    <td><?php echo $rowp['rheumatismv']?></td>
  </tr>

  
  <td>Physical Injury</td>
    <td><?php echo $rowp['physical_injury']?></td>
    <td><?php echo $rowp['physical_injuryv']?></td>
  </tr>

  
  <td>Hernia</td>
    <td><?php echo $rowp['hernia']?></td>
    <td><?php echo $rowp['herniav']?></td>
  </tr>

  
  <td> Typhoid</td>
    <td><?php echo $rowp['typhoid']?></td>
    <td><?php echo $rowp['typhoidv']?></td>
  </tr>

  
  <td>Stomach or abdominal</td>
    <td><?php echo $rowp['stomach_abdomina']?></td>
    <td><?php echo $rowp['stomach_abdominav']?></td>
  </tr>

  
  <td>Kidney or bladder</td>
    <td><?php echo $rowp['kidney_bladder']?></td>
    <td><?php echo $rowp['kidney_bladderv']?></td>
  </tr>

    
  <td>Dizziness</td>
    <td><?php echo $rowp['dizziness']?></td>
    <td><?php echo $rowp['dizzinessv']?></td>
  </tr>

  <td>Allergies</td>
    <td><?php echo $rowp['allergies']?></td>
    <td><?php echo $rowp['allergiesv']?></td>
  </tr>

    
  <td>Others</td>
    <td><?php echo $rowp['othersv']?></td>
    <td><?php echo $rowp['othersv1']?></td>
  </tr>


</table>

             <hr>                           
<h5>Vital Signs</h5>

<table>
  <tr>
    <th>ITEM</th>
    <th>INFO</th>
    <th>REMARKS</th>
  </tr>
  <tr>
    <td>Height, H  (must be in cm)</td>
    <td><?php echo $rowp['height']?></td>
    <td><?php echo $rowp['heightv']?></td>
  </tr>
  <tr>
    <td>Weight, W  (must be in kg)</td>
    <td><?php echo $rowp['weightd']?></td>
    <td><?php echo $rowp['weightv']?></td>
  </tr>
  <tr>
    <td>Temperature (36,5-37.0 degrees C)</td>
    <td><?php echo $rowp['temp']?></td>
    <td><?php echo $rowp['tempv']?></td>
  </tr>
  <tr>
    <td>Blood Presssure (120/80mmhg)</td>
    <td><?php echo $rowp['blood_presure']?></td>
    <td><?php echo $rowp['blood_presurev']?></td>
  </tr>
  <tr>
    <td>Pulse Rate (60-100 beats/min)</td>
    <td><?php echo $rowp['pulse_rate']?></td>
    <td><?php echo $rowp['pulse_ratev']?></td>
  </tr>
  <tr>
    <td>Respiratory Rate (16-20 breaths/min)</td>
    <td><?php echo $rowp['respi']?></td>
    <td><?php echo $rowp['respiv']?></td>
  </tr>

  <td>BMI  Automatic computation =W/H2</td>
    <td><?php echo $rowp['bmi']?></td>
    <td><?php echo $rowp['bmiv']?></td>
  </tr>
                                        </table>
                                        <hr>                           
<h5>Physical Appearance</h5>
                                        <table>
  <tr>
    <th>ITEM</th>
    <th>INFO</th>
    <th>REMARKS</th>
  </tr>
  <tr>
    <td>Skin</td>
    <td><?php echo $rowp['skin']?></td>
    <td><?php echo $rowp['skinv']?></td>
  </tr>

  <tr>
    <td>ENT</td>
    <td><?php echo $rowp['ent']?></td>
    <td><?php echo $rowp['entv']?></td>
  </tr>

  <tr>
    <td>HEAD</td>
    <td><?php echo $rowp['head']?></td>
    <td><?php echo $rowp['headv']?></td>
  </tr>

  <tr>
  <td>CHEST</td>
    <td><?php echo $rowp['chest']?></td>
    <td><?php echo $rowp['chestv']?></td>
  </tr>

  <tr>
  <td>BACK</td>
    <td><?php echo $rowp['back']?></td>
    <td><?php echo $rowp['backv']?></td>
  </tr>

  <tr>
  <td>GENITALS</td>
    <td><?php echo $rowp['genitals']?></td>
    <td><?php echo $rowp['genitalsv']?></td>
  </tr>

  <tr>
  <td>RECTAL</td>
    <td><?php echo $rowp['rectal']?></td>
    <td><?php echo $rowp['rectalv']?></td>
  </tr>
                                        </table>
                                
                                        <hr>                           
<h5>EMERGENCY CONTACTS</h5>
                                        <table>
  <tr>
    <th>ITEM</th>
   
    <th>REMARKS</th>
  </tr>
  <tr>
    <td>NAME</td>
    <td><?php echo $rowp['ename']?></td>

  </tr>

  <tr>
    <td>ADDRESS</td>
    <td><?php echo $rowp['eaddress']?></td>
    
  </tr>

  <tr>
    <td>CONTACT NUMBER</td>
    <td><?php echo $rowp['econtact']?></td>
   
  </tr>

  <tr>
  <td>RELATIONSHIP</td>
    <td><?php echo $rowp['erelation']?></td>
  
  </tr>

 
                                        </table>      

<HR>

                                        <h5>LIFE STYLE</h5>
                                        <table>
  <tr>
    <th>ITEM</th>
    
    <th>REMARKS</th>
  </tr>
  <tr>
    <td>DRINKING ALCOHOL</td>
    <td><?php echo $rowp['drinking']?></td>
   
  </tr>

  <tr>
    <td>SMOKING</td>
    <td><?php echo $rowp['smoking']?></td>
   
  </tr>

  <tr>
    <td>EXERCISE</td>
    <td><?php echo $rowp['exercise']?></td>
   
  </tr>


 
                                        </table>                                      
                   
                                        
                   <p>I hereby state that the above information is true and correct to the best of my knowledge.  </p>                     
                 <p>_________________________________</p>
                   <p>Signature over printed name</p>
                <p>Date: ________________________</p> 
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
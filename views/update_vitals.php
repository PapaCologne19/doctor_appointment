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
                                        PREHOSPITAL CARE REPORT
                                    </h4>
                                </div>
                                <hr>
                                <div class="container px-5">
                                    <?php 
                                    
                                        if(isset($_POST['submit_profile'])){
                                            $database = new Database();
                                            $connect = $database->connect();
                                            $id = $_POST['transfer'];

                                            $users = new User($connect);
                                            $user = $users->select_datas3($id);
                                            

                                            $row =  $user->fetch(PDO::FETCH_ASSOC);
                                    ?>
                                    <form action="action.php" class="form-group" method="POST">
                                        <h2 class="fs-6">UPDATE VITAL INFORMATION (<?php echo $row['profile_name']?>)</h2>
                                       
                                            
                                                  <input type="hidden" name="vital_name" id="" value="<?php echo $row['profile_name']?>"> 
                                                     <input type="hidden" name="vital_id" id="" value="<?php echo $row['emp_id']?>"> 
                                                                  
                                        
                           






                                        <h2 class="fs-6 mt-5">VITAL SIGNS</h2>
                                        <div class="row mt-1">


                                            <div class="col-md-2">
                                                <label for="" class="form-label" style="padding-top:1em">Blood Pressure</label>
                                            </div>
                                            
                                            <div class="col-md-2">
                                                <!-- <label for="" class="form-label">1st</label> -->
                                                <input type="text" name="bp1" id="bp1"  class="form-control">
                                            </div>            
                                              
                              
                                          
                                           
                                        </div>
                                    <hr>

                                        <div class="row mt-1">
                                            <div class="col-md-2">
                                                <label for="" class="form-label"  style="padding-top:1em">Pulse Rate</label>
                                            </div>
                                            
                                            <div class="col-md-2">
                                                <!-- <label for="" class="form-label">1st</label> -->
                                                <input type="text" name="pr1" id="pr1"  class="form-control">
                                            </div>            
                                            
                                  
                                        </div>

                                        <hr>
                                        <div class="row mt-1">
                                            <div class="col-md-2">

                                                <label for="" class="form-label"  style="padding-top:1em">Respiratory Rate</label>
                                            </div>
                                            
                                            <div class="col-md-2">
                                                <!-- <label for="" class="form-label">1st</label> -->
                                                <input type="text" name="rr1" id="rr1"  class="form-control">
                                            </div>            
                                            
                             
                                        </div>

                                        <hr>
                                        <div class="row mt-1">
                                            <div class="col-md-2">
                                                <label for="" class="form-label"  style="padding-top:1em">Temperature</label>
                                            </div>
                                            
                                            <div class="col-md-2">
                                                <!-- <label for="" class="form-label">1st</label> -->
                                                <input type="text" name="temp1" id="temp1"  class="form-control">
                                            </div>            
                                            
                           
                                        </div>

                                        <hr>
                                        <div class="row mt-1">
                                            <div class="col-md-2">
                                                <label for="" class="form-label"  style="padding-top:1em">O2 Saturation</label>
                                            </div>
                                            
                                            <div class="col-md-2">
                                                <!-- <label for="" class="form-label">1st</label> -->
                                                <input type="text" name="os1" id="os1" class="form-control">
                                            </div>            
                                            
                           
                                        </div>
                                        <hr>
                                        
                                        <div class="row mt-1">
                                            <div class="col-md-2">
                                                <label for="" class="form-label"  style="padding-top:1em">Sugar Level</label>
                                            </div>
                                            
                                            <div class="col-md-2">
                                                <!-- <label for="" class="form-label">1st</label> -->
                                                <input type="text" name="sugar1" id="sugar1" class="form-control">
                                            </div>            
                                            
                           
                                        </div>
                                        

                                        <hr>
                                        <div class="row mt-1">
                                            <div class="col-md-2">
                                                <label for="" class="form-label"  style="padding-top:1em">Height</label>
                                            </div>
                                            
                                            <div class="col-md-2">
                                                <!-- <label for="" class="form-label">1st</label> -->
                                                <input type="text" name="height1" id="height1" class="form-control">
                                            </div>            
                                            
                           
                                        </div>
                                        <hr>

                                        <hr>
                                        <div class="row mt-1">
                                            <div class="col-md-2">
                                                <label for="" class="form-label"  style="padding-top:1em">Weight</label>
                                            </div>
                                            
                                            <div class="col-md-2">
                                                <!-- <label for="" class="form-label">1st</label> -->
                                                <input type="text" name="weight1" id="weight1" class="form-control">
                                            </div>            
                                            
                           
                                        </div>
                                        <hr>

                                        <hr>
                                        <div class="row mt-1">
                                            <div class="col-md-2">
                                                <label for="" class="form-label" style="padding-top:1em">BMI</label>
                                            </div>
                                            <div class="col-md-2">
                                                <input type="text" name="bmi" id="bmi" class="form-control">
                                            </div>            
                                        </div>
                                        <hr>
                                        


                                        <center>
                                        <div class="col-md-12 mt-4 mb-5">
                                            <button type="submit" name="submit_revitals" class="btn btn-info">Submit</button>
                                            <button type="button" class="btn btn-secondary" onclick="location.href = 'calendar_doctor.php'">Cancel</button>
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
    <?php include '../components/footer.php'; ?>
</body>

</html>
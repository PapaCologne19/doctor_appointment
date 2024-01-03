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
                                        PROFILE
                                    </h4>
                                </div>
                                <hr>
                                <div class="container px-5">
                                    <form action="profile_info.php" class="form-group" method="POST">
                                        <h2 class="fs-6">SELECT PROFILE</h2>


                                        <div class="row mt-1">
                                            <!-- <div class="col-md-2">
                                                <label for="" class="form-label">TRANSER</label>
                                            </div> -->
                                            <div class="col-md-6">
                                            <center>
                                                <select name="transfer" id="transfer" class="form-select" required>
                                                    </center>
                                                    <option value="" >Select One</option>
                                            <?php
                                            $database = new Database();
                                            $connect = $database->connect();

                                            $users = new User($connect);
                                            $user = $users->select_profile();

                                            while($row = $user->fetch(PDO::FETCH_ASSOC)){

                                             ?>
                                       
                                             <option value="<?php echo $row['ID']?>"><?php echo $row['LAST_NAME'].", ".$row['FIRST_NAME']?></option>
                                            <?php } ?>
                                                </select>
                                            </div>
                                        </div>




                                       


                                        <center>
                                        <div class="col-md-12 mt-4 mb-5">
                                            <button type="submit" name="submit_profile" class="btn btn-info">Submit</button>
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
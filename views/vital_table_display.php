<?php
session_start();
include '../model/connect.php';
include '../model/authenticate.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <?php include '../components/header.php'; ?>
    <title>View Vital</title>
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
                            <div class="container">
                                <hr>
                                <div class="title justify-content-center align-items-center mx-auto text-center">
                                    <h4 class="fs-4">
                                        MEDICAL PROFILE
                                    </h4>
                                </div>
                                <hr>

                                <div class="container table-responsive">
                                    <?php

                                    if (isset($_POST['submit_profilevital'])) {
                                        $database = new Database();
                                        $connect = $database->connect();
                                        $id = $_POST['transfer'];

                                        $users = new User($connect);
                                        $user = $users->select_profile6($id);

                                        $database = new Database();
                                        $connect = $database->connect();
                                        $id1 = $_POST['transfer'];

                                        $users1 = new User($connect);
                                        $user1 = $users1->select_profile6($id1);

                                        $rowd = $user1->fetch(PDO::FETCH_ASSOC);
                                        ?>
                                        <div class="mb-4">
                                            <button type="button" class="btn btn-dark" onclick="location.href = 'print_vitals.php?patient_name=<?php echo $rowd['patient_name'];?>'">Print</button>
                                        </div>
                                        <form action="action.php" class="form-group" method="POST">
                                            <h2 class="fs-6">NAME :
                                                <?php echo $rowd['patient_name'] ?>
                                            </h2>
                                            <table class="table" id="example">
                                                <thead>
                                                    <tr>
                                                        <th> Date </th>
                                                        <th> Time </th>
                                                        <th> Blood Presure </thh>
                                                        <th> Pulse Rate </th>
                                                        <th> Respiratory Rate </th>
                                                        <th> Temp </th>
                                                        <th> Sugar </th>
                                                        <th> Height </th>
                                                        <th> Weight </th>
                                                        <th> BMI </th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php
                                                    while ($row = $user->fetch(PDO::FETCH_ASSOC)) {
                                                        echo ' <tr> ';
                                                        echo '  <td>  ' . $row['info_date'] . '   </td> ';
                                                        echo '  <td>  ' . $row['info_time'] . '   </td> ';
                                                        echo '  <td>  ' . $row['bp1'] . '   </td> ';
                                                        echo '  <td>  ' . $row['pr1'] . '   </td> ';
                                                        echo '  <td>  ' . $row['rr1'] . '   </td> ';
                                                        echo '  <td>  ' . $row['temp1'] . '   </td> ';
                                                        echo '  <td>  ' . $row['sugar'] . '   </td> ';
                                                        echo '  <td>  ' . $row['heightd'] . '   </td> ';
                                                        echo '  <td>  ' . $row['weightd'] . '   </td> ';
                                                        echo '  <td>  ' . $row['bmi'] . '   </td> ';
                                                        echo ' </tr> ';
                                                    } ?>
                                                </tbody>
                                            </table>
                                            <center>
                                                <div class="col-md-12 mt-4 mb-5">
                                                    <button type="button" class="btn btn-danger"
                                                        onclick="location.href = 'calendar_doctor.php'">Exit</button>
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
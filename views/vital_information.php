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
                            <?php
                            $vitals = $_GET['vitals'];
                            ?>
                            <div class="container">
                                <hr>
                                <div class="title justify-content-center align-items-center mx-auto text-center">
                                    <h4 class="fs-4">
                                        VITAL INFORMATION
                                    </h4>
                                </div>
                                <hr>
                                <div class="container mb-4">
                                    <button type="button" class="btn btn-primary"
                                        onclick="location.href = 'report.php'">Back</button>
                                </div>
                                <div class="col-md-4 mb-4">
                                    <form action="" method="POST" class="form-group">
                                        <div class="col-md-5">
                                            <label for="" class="form-label">Filter by Division</label>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-7">
                                                <select name="profile_division" id="" class="form-select" required>
                                                    <option value="" selected disabled>Select</option>
                                                    <option value="HRD">HRD</option>
                                                    <option value="BD1">BD1</option>
                                                    <option value="BD2">BD2</option>
                                                    <option value="BD3">BD3</option>
                                                    <option value="BSG">BSG</option>
                                                    <option value="PPI">PPI</option>
                                                    <option value="STRAT">STRAT</option>
                                                    <option value="FINANCE">FINANCE</option>
                                                    <option value="EXECOM">EXECOM</option>
                                                </select>
                                            </div>
                                            <div class="col-md-5">
                                                <button type="submit" name="submit" class="btn btn-info">Filter</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>

                                <?php
                                if (isset($_POST['submit'])) {
                                    $division = $_POST['profile_division'];
                                    ?>
                                    <table class="table table-sm" id="example">
                                        <thead>
                                            <tr>
                                                <th>Name</th>
                                                <th>Division</th>
                                                <th><?php echo $vitals; ?></th>
                                                <th>Description</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $database = new Database();
                                            $connect = $database->connect();
                                            $users = new User($connect);

                                            $vital = $users->vitals_detail_division($vitals, $division);
                                            while ($row = $vital->fetch(PDO::FETCH_ASSOC)) {
                                                ?>
                                                <tr>
                                                    <td>
                                                        <?php echo $row['profile_name']; ?>
                                                    </td>
                                                    <td>
                                                        <?php echo $row['profile_division']; ?>
                                                    </td>
                                                    <td>
                                                        <?php echo $row[$vitals]; ?>
                                                    </td>
                                                    <td>
                                                        <?php echo $row[$vitals . 'v']; ?>
                                                    </td>
                                                </tr>

                                            <?php } ?>
                                        </tbody>
                                    </table>
                                <?php } else { ?>
                                    <table class="table table-sm" id="example">
                                        <thead>
                                            <tr>
                                                <th>Name</th>
                                                <th>Division</th>
                                                <th><?php echo $vitals; ?></th>
                                                <th>Description</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $database = new Database();
                                            $connect = $database->connect();
                                            $users = new User($connect);

                                            $vital = $users->vitals_detail($vitals);
                                            while ($row = $vital->fetch(PDO::FETCH_ASSOC)) {
                                                ?>
                                                <tr>
                                                    <td>
                                                        <?php echo $row['profile_name']; ?>
                                                    </td>
                                                    <td>
                                                        <?php echo $row['profile_division']; ?>
                                                    </td>
                                                    <td>
                                                        <?php echo $row[$vitals]; ?>
                                                    </td>
                                                    <td>
                                                        <?php echo $row[$vitals . 'v']; ?>
                                                    </td>
                                                </tr>
                                            <?php }
                                            ?>
                                        </tbody>
                                    </table>
                                <?php } ?>
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
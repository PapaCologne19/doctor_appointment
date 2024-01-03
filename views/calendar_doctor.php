<?php
session_start();
include '../model/connect.php';
include '../model/authenticate.php';

$database = new Database();
$connect = $database->connect();



if (isset($_SESSION['username'], $_SESSION['password'])) {
?>

    <!DOCTYPE html>
    <html lang="en">

<style>
    .centerme {
  margin: 0;
  position: absolute;
  top: 50%;
  left: 50%;
  -ms-transform: translate(-50%, -50%);
  transform: translate(-50%, -50%);
}
</style>

    <head>
        <?php include '../components/header.php' ?>
        <title>PCN CLINIC</title>
    </head>
    <body  >

        <!-- Sweet Alert Messages -->
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
        if (isset($_SESSION['error'])) { ?>
            <script>
                Swal.fire({
                    icon: 'error',
                    title: "<?php echo $_SESSION['error']; ?>",
                })
            </script>
        <?php unset($_SESSION['error']);
        } ?>
        <?php
        if (isset($_SESSION['warning'])) { ?>
            <script>
                Swal.fire({
                    icon: 'warning',
                    title: "<?php echo $_SESSION['warning']; ?>",
                })
            </script>
        <?php unset($_SESSION['warning']);
        } ?>


        <!-- CALENDAR START HERE -->
        <div class="layout-wrapper layout-content-navbar">
            <div class="layout-container">
                <?php include '../components/sidebar.php'; ?>

                <!-- Main page -->
                <div class="layout-page">
                    <?php include '../components/navbar.php'; ?>

                    <!-- Content -->
                    <div class="content-wrapper mt-3">
                        <div class="containers">
                            <div class="card">
                
        


        <!-- CALENDAR ENDS HERE -->
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>

        <?php include '../components/footer.php' ?>
    </body>

    </html>
<?php
} else {
    header("Location: ../index.php");
    // session_unset();
    exit(0);
}
?>
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

    <head>
        <?php include '../components/header.php' ?>
        <title>Calendar</title>
    </head>

    <body>
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

        <?php
        // CALENDAR INITIATION (DAYS MONTHS YEAR)
        $months = [
            1 => "January", 2 => "Febuary", 3 => "March", 4 => "April",
            5 => "May", 6 => "June", 7 => "July", 8 => "August",
            9 => "September", 10 => "October", 11 => "November", 12 => "December"
        ];
        $monthNow = date("m");
        $yearNow = date("Y");
        ?>

        <!-- (1) CALENDAR HEAD -->
        <div id="calHead">
            <div id="calPeriod">
                <select id="calMonth">
                    <?php foreach ($months as $m => $mth) {
                        printf(
                            "<option value='%u'%s>%s</option>",
                            $m,
                            $m == $monthNow ? " selected" : "",
                            $mth
                        );
                    } ?>
                </select>
                <input id="calYear" type="number" value="<?= $yearNow ?>">
                <input id="calBack" type="button" class="mi" value="&lt;">
                <input id="calNext" type="button" class="mi" value="&gt;">
            </div>

            <input class="btn" id="calAdd" type="hidden" value="+">&nbsp;
            <button type="button" class="gbutton btn btn-default " data-bs-toggle="modal" id="calButton" data-bs-target="#addAppointment" style="float:right;">Make an Appointment</button> &nbsp; &nbsp; &nbsp;
            <button type="button" class="btn btn-default" onclick="location.href = 'logout.php';" id="calButtonLogout">Logout</button>
        </div>

        <!-- (2) CALENDAR BODY -->
        <div id="calWrap" style="padding:0px 10px 0px 10px ">
            <div id="calDays"></div>
            <div id="calBody"></div>
        </div>

        <!-- (3) CALENDAR FORM -->
        <dialog id="calForm">
            <form method="dialog">
                <div id="evtCX">&times;</div>
                <h2 class="evt100">CALENDAR EVENT</h2>
                <input type="hidden" class="form-control" name="evtUserID" id="evtUserID">
                <input type="text" class="form-control" name="evtStatus" id="evtStatus" readonly>
                <div class="evt100">
                    <label for="" class="form-label">Appointment Date</label>
                    <input type="text" class="form-control" name="evtStart" id="evtStart" readonly>
                </div>
                <div class="evt100">
                    <input type="text" class="form-control" name="evtStart" id="evtStart" readonly>
                    <input type="hidden" class="form-control" name="evtEnd" id="evtEnd" readonly>
                </div>
                <div class="evt100">
                    <label for="evtTitle">Event Title:</label>
                    <input type="text" class="form-control" name="evtStart" id="evtStart" readonly>
                    <input type="text" class="form-control" name="evtType" id="evtType" readonly>
                </div>
                <div class="evt100">
                    <input type="hidden" id="evtID">
                    <input type="hidden" class="btn btn-dark" name="evtCancel" id="evtCancel" value="Cancel">
                    <input class="btn btn-danger" type="submit" id="evtDel" name="evtDel" value="Reject">
                    <input class="btn btn-primary" type="submit" id="evtSave" name="evtSave" value="Approve">
                </div>

            </form>
        </dialog>


        <!-- MODAL FOR ADDING APPOINTMENT -->
        <div class="modal fade zoom-out" id="addAppointment" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="exampleModalLabel">Modal title</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="container">
                            <form action="action.php" method="POST" class="form-group row">
                                <label for="" class="form-label">Appointment Date</label>
                                <input type="date" name="appointment_date" id="appointment_date" class="form-control" required>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" name="appoint_btn" class="btn btn-primary">Save changes</button>
                    </div>
                    </form>
                </div>
            </div>
        </div>



        <!-- CALENDAR ENDS HERE -->
    </body>

    </html>
<?php
} else {
    header("Location: ../index.php");
    session_unset();
    exit(0);
}
?>
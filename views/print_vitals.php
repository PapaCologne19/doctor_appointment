<?php
session_start();
include '../model/connect.php';
include '../model/authenticate.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <?php include '../components/header.php'; ?>
    
</head>

<body>
    <div class="container-fluid mt-5">
        <?php
        $patient_name = $_GET['patient_name'];
        ?>
        <div class="logo">
            <img src="../assets/img/elements/pcn.png" alt="" class="img-responsive" width="20%">
        </div>
        <div class="title text-center">
            <h4><strong>VITAL INFORMATION</strong></h4>
        </div>
        <div class="patient_name mt-5">
            <h5>Name:
                <?php echo $patient_name; ?>
            </h5>
        </div>
        <table class="table table-bordered table-sm mt-3">
            <thead>
                <tr>
                    <th class="text-center fs-4" colspan="10">MEDICAL PROFILE</th>
                </tr>
                <tr>
                    <th>Date</th>
                    <th>Time</th>
                    <th>Blood Pressure</th>
                    <th>Pulse Rate</th>
                    <th>Respiratory Rate</th>
                    <th>Temperature</th>
                    <th>Sugar Level</th>
                    <th>Height</th>
                    <th>Weight</th>
                    <th>BMI</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $database = new Database();
                $connect = $database->connect();

                $users = new User($connect);
                $user = $users->print_vitals($patient_name);

                while ($row = $user->fetch(PDO::FETCH_ASSOC)) {
                    ?>
                    <tr>
                        <td>
                            <?php echo $row['info_date']; ?>
                        </td>
                        <td>
                            <?php echo $row['info_time']; ?>
                        </td>
                        <td>
                            <?php echo $row['bp1']; ?>
                        </td>
                        <td>
                            <?php echo $row['pr1']; ?>
                        </td>
                        <td>
                            <?php echo $row['rr1']; ?>
                        </td>
                        <td>
                            <?php echo $row['temp1']; ?>
                        </td>
                        <td>
                            <?php echo $row['sugar']; ?>
                        </td>
                        <td>
                            <?php echo $row['heightd']; ?>
                        </td>
                        <td>
                            <?php echo $row['weightd']; ?>
                        </td>
                        <td>
                            <?php echo $row['bmi']; ?>
                        </td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
    <script>
        // Function to print and close the window after printing
        function printAndClose() {
            window.print();
        }

        // Add an event listener for the onafterprint event
        window.addEventListener("afterprint", function () {
            window.close();
        });

        // Trigger the print function
        printAndClose();

        // Function to handle the cancel action
        window.addEventListener("afterprint", function () {
            // Handle the cancellation of the print dialog here
            // For example, you can navigate back to the previous page:
            location.href = 'view_vitals_table.php';
        });
    </script>
</body>

</html>
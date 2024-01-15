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
        $illness = $_GET['illness'];
        $status = $_GET['status'];
        ?>
        <div class="logo">
            <img src="../assets/img/elements/pcn.png" alt="" class="img-responsive" width="20%">
        </div>
        <div class="title text-center">
            <h4><strong>PROFILE SUMMARY</strong></h4>
        </div>
        <table class="table table-bordered table-sm mt-3">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Division</th>
                    <th>Answer</th>
                    <th>Description</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $database = new Database();
                $connect = $database->connect();

                $users = new User($connect);
                $user = $users->illness_detail($illness, $status);

                while ($row = $user->fetch(PDO::FETCH_ASSOC)) {
                    ?>
                    <tr>
                        <td>
                            <?php echo $row['profile_name']; ?>
                        </td>
                        <td>
                            <?php echo $row['profile_division']; ?>
                        </td>
                        <td>
                            <?php echo $row[$illness]; ?>
                        </td>
                        <?php
                        if ($illness === 'othersv') {
                            ?>
                            <td>
                                <?php echo $row[$illness . '1']; ?>
                            </td>
                            <?php
                        } else {
                            ?>
                            <td>
                                <?php echo $row[$illness . 'v']; ?>
                            </td>
                            <?php
                        }
                        ?>
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
            window.history.go(-1);
        });
    </script>
</body>

</html>
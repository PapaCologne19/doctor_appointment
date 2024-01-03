
<?php
session_start();
include '../model/connect.php';
include '../model/authenticate.php';

date_default_timezone_set('Asia/Hong_Kong');
$datenow=date("j/m/Y"); 
$timenow=date("h:i:s A"); 

// echo $_SESSION['username'];
if (!isset($_SESSION['username'], $_SESSION['password'])) {
    session_start();
    session_destroy();
    header("Location: ../index.php");
    exit(0);
    
}
else{}


    ?>


<?php
                                            $database = new Database();
                                            $connect = $database->connect();

                                            $users = new User($connect);
                                            $user = $users->select_bd1();

                                                $bd1=0;
                                                $bd2=0;
                                                $bd3=0;
                                                $hrd=0;
                                                $finance=0;
                                                $ppi=0;
                                                $strat=0;
                                                $bsg=0;




                                            while($row = $user->fetch(PDO::FETCH_ASSOC)){
                                     
                                                if ($row['divisionnya']=='BD1' and $row['track']=='1')
                                                {
                                                 $bd1=$bd1+1 ;
                                                }

                                                if ($row['divisionnya']=='BD2' and $row['track']=='1')
                                                {
                                                 $bd2=$bd2+1 ;
                                                }

                                                if ($row['divisionnya']=='BD3' and $row['track']=='1')
                                                {
                                                 $bd3=$bd3+1 ;
                                                }

                                                if ($row['divisionnya']=='HRD' and $row['track']=='1')
                                                {
                                                 $hrd=$hrd+1 ;
                                                }

                                                if ($row['divisionnya']=='FINANCE' and $row['track']=='1')
                                                {
                                                 $finance=$finance+1 ;
                                                }

                                                if ($row['divisionnya']=='STRAT' and $row['track']=='1')
                                                {
                                                 $strat=$strat+1 ;
                                                }

                                                if ($row['divisionnya']=='PPI' and $row['track']=='1')
                                                {
                                                 $ppi=$ppi+1 ;
                                                }

                                                   
                                     
                                          } ?>

 
 
   
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<body>

<div class="w3-container">

<img src="../assets/img/icons/brands/pcn_logo.jpg" alt="" sizes="" srcset="" style="max-width:220px">
  <h2>EMPLOYEE PROFILE SUMMARY</h2>

  <table class="w3-table w3-striped w3-bordered" style="width:60%">
    <tr>
    <h2 class="fs-6">
      <th>DIVISION</th>
      <th>EMPLOYEE COUNT</th>
      <th>COUNT WITH PPROFILE</th>
      <th>% SHARE</th>
      
      
    </tr>
    <tr>
      <td>BD1</td>
      <td>32</td>
      <td><?php echo $bd1;?></td>
      <td><?php echo round((float)$bd1/32 * 100 ) . '%';?></td>
 
      
    </tr>
    <tr>
      <td>BD2</td>
      <td>22</td>
      <td><?php echo $bd2;?></td>
      <td><?php echo round((float)$bd2/22 * 100 ) . '%';?></td>
    </tr>
    <tr>
      <td>BD3</td>
      <td>15</td>
      <td><?php echo $bd3;?></td>
      <td><?php echo round((float)$bd3/15 * 100 ) . '%';?></td>
    </tr>

    <tr>
      <td>BSG</td>
      <td>23</td>
      <td><?php echo $bsg;?></td>
      <td><?php echo round((float)$bsg/23 * 100 ) . '%';?></td>
    </tr>

    <tr>
      <td>FINANCE</td>
      <td>27</td>
      <td><?php echo $finance;?></td>
      <td><?php echo round((float)$finance/27 * 100 ) . '%';?></td>
    </tr>

    <tr>
      <td>HRD</td>
      <td>20</td>
      <td><?php echo $hrd;?></td>
      <td><?php echo round((float)$hrd/20 * 100 ) . '%';?></td>
    </tr>

    <tr>
      <td>STRAT</td>
      <td>8</td>
      <td><?php echo $strat;?></td>
      <td><?php echo round((float)$bd3/8 * 100 ) . '%';?></td>
    </tr>


    <tr>
      <td>PPI</td>
      <td>3</td>
      <td><?php echo $ppi;?></td>
      <td><?php echo round((float)$ppi/3 * 100 ) . '%';?></td>
      
    </tr>

    <tr>
      <td>TOTAL</td>
      <td>152</td>
      <td><?php echo $ppi+$strat+$hrd+$finance+$bd3+$bd2+$bd1+$bsg;?></td>
      <td><?php echo round((float)($ppi+$strat+$hrd+$finance+$bd3+$bd2+$bd1+$bsg)/152 * 100 ) . '%';?></td>
      
    </tr>


  </table>
</div>

</body>
</html>

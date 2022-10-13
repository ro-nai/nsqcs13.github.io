<?php
include 'Connections.php';

if (isset($_POST['submit']))
{
    $d_received = $_POST['d_received'];
    $sg_name = $_POST['sg_name'];
    $sg_add = $_POST['sg_add'];
	$d_sampled = $_POST['d_sampled'];
	$d_planted = $_POST['d_planted'];
	$d_harvested = $_POST['d_harvested'];
	$variety = $_POST['variety'];
	$no_of_bags = $_POST['no_of_bags'];
	$kg = $_POST['kg'];
	$area = $_POST['area'];
	$lot_no = $_POST['lot_no'];
	$s_class = $_POST['s_class']; 
	$ficr_no = $_POST['ficr_no'];
	$d_inspected = $_POST['d_inspected'];
	$s_inspector = $_POST['s_inspector'];
	$program = $_POST['program'];
	$coop = $_POST['coop'];

    $sql="INSERT INTO `rsc` (lab_no,sg_name,sg_add,d_sampled,d_planted,d_harvested,variety,no_of_bags,kg,area,lot_no,s_class,ficr_no,d_inspected,s_inspector,program,coop) 
    values ('$lab_no','$sg_name','$sg_add','$d_sampled','$d_planted','$d_harvested','$variety','$no_of_bags','$kg','$area','$lot_no','$s_class', '$ficr_no', '$d_inspected', '$s_inspector','$program','$coop')";
    $result=mysqli_query($con,$sql);
    if ($result) {
        // echo "Data Inserted Successfully";
        header('location: receiving_rsc.php'); 
    }else {
        die(mysqli_error($con));
    }
}


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Receiving Database</title>
    <link rel="stylesheet" href="./css/bootstrap.min.css">
    <!-- <link rel="stylesheet" href="./DataTables (1)/DataTables-1.12.1/css/dataTables.bootstrap5.min.css"> -->
    <link rel="stylesheet" href="//cdn.datatables.net/1.12.1/css/jquery.dataTables.min.css">

    
</head>
<body>


    <div class="container-fluid">
        <nav>
        <button class="btn btn-primary"> <a href="receiving_rsc_new.php" class="text-light">New Record</a></button>
        <button class="btn btn-primary"> <a href="mc_rsc.php" class="text-light">Moisture Content</a></button>
        <button class="btn btn-primary"> <a href="purity_rsc_new.php" class="text-light">Physical Purity</a></button>
        <button class="btn btn-primary"> <a href="varietal_rsc.php" class="text-light">Varietal</a></button>
        <button class="btn btn-primary"> <a href="germination_rsc.php" class="text-light">Germination</a></button>
        <input type="search" name="lab_no" id="lab_no" placeholder="Search">
        </nav>
    <table id="receiving" name="receiving" class="table table-bordered table-striped-columns">
        <tbody>
        <tr>
        <th>Lab. No.</th>
        <th>Date Received</th>
        <th>Name</th>
        <th>Address</th>
        <th>Date Sampled</th>
        <th>Date Planted</th>
        <th>Date Harvested</th>
        <th>Variety</th>
        <th>No. of bags</th>
        <th>Kg</th>
        <th>Area</th>
        <th>Lot No.</th>
        <th>Seed Class</th>
        <th>FICR no.</th>
        <th>Date Inspected</th>
        <th>Seed Inspector</th>
        <th>Program</th>
        <th>Cooperative</th>
        <th>Operations</th>

        </tr>
        <tr>
        <?php
        $sql="SELECT * FROM `rsc`";
        $result=mysqli_query($con,$sql);
        if ($result) {
            
            while ($row=mysqli_fetch_assoc($result)) {
                $lab_no= $row['lab_no'];
                $d_received=$row['d_received'];
                $sg_name = $row['sg_name'];
                $sg_add = $row['sg_add'];
                $d_sampled = $row['d_sampled'];
                $d_planted = $row['d_planted'];
                $d_harvested = $row['d_harvested'];
                $variety = $row['variety'];
                $no_of_bags = $row['no_of_bags'];
                $kg = $row['kg'];
                $area = $row['area'];
                $lot_no = $row['lot_no'];
                $s_class = $row['s_class']; 
                $ficr_no = $row['ficr_no'];
                $d_inspected = $row['d_inspected'];
                $s_inspector = $row['s_inspector'];
                $program = $row['program'];
                $coop = $row['coop'];
                
                echo '<tr>
                <th scope="row">'.$lab_no.'</th>
                <td>'.$d_received.'</td>
                <td>'.$sg_name.'</td>
                <td>'.$sg_add.'</td>
                <td>'.$d_sampled.'</td>
                <td>'.$d_planted.'</td>
                <td>'.$d_harvested.'</td>
                <td>'.$variety.'</td>
                <td>'.$no_of_bags.'</td>
                <td>'.$kg.'</td>
                <td>'.$area.'</td>
                <td>'.$lot_no.'</td>
                <td>'.$s_class.'</td>
                <td>'.$ficr_no.'</td>
                <td>'.$d_inspected.'</td>
                <td>'.$s_inspector.'</td>
                <td>'.$program.'</td>
                <td>'.$coop.'</td>

                <td><button class="btn btn-primary"><a class="text-light" href="receiving_update_rsc.php?updaterec='.$lab_no.'">Update</a></button></td>
                </tr>';
            }
        }
        ?>
        </tr>
        </tbody>

    </table>
    </div>
    

<!-- <script src="./js/bootstrap.min.js"></script>
<script src="./jquery.min.js"></script>
<script src="./DataTables (1)/DataTables-1.12.1/js/jquery.dataTables.min.js"></script>
<script src="./DataTables (1)/DataTables-1.12.1/js/dataTables.bootstrap5.min.js"></script> -->
<script src="//cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>

<script>
       $(document).ready( function () {
    $('#receiving').DataTable();
} );
    </script>
</body>
</html>



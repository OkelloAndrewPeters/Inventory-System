<?php 

$con = mysqli_connect("localhost", "root", "", "inventory");

if(!$con) {
    echo "problem with database connection..."  .mysqli_error();
} else {
    $sql = "SELECT * FROM inventory_list";
    $result = mysqli_query($con, $sql);
    $chart_data = "";

    while($row = mysqli_fetch_array($result)) {
        $item[] = $row['Item Name'];
        $total[] = $row['Total'];
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inventory</title>
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
<body>

<div class="w3-sidebar w3-bar-block w3-collapse w3-card" style="width:200px;" id="mySidebar">
  <button class="w3-bar-item w3-button w3-hide-large"
  onclick="w3_close()">Close &times;</button>
  <a href="inventory.html" class="w3-bar-item w3-button" style="text-decoration: none; color: black;">Create Inventory</a>
  <a href="dashboard.php" class="w3-bar-item w3-button" style="text-decoration: none; color: black;">View Inventory</a>
  <a href="logout.php" class="w3-bar-item w3-button" style="text-decoration: none; color: black;">Logout</a>
</div>

<div class="w3-main" style="margin-left:200px">

<div class="w3-teal">
  <button class="w3-button w3-teal w3-xlarge" onclick="w3_open()">&#9776;</button>
  <div class="w3-container">
    <h2>INVENTORY DASHBOARD</h2>
  </div>
  </div>
</div>

<div class="row" style="margin-top: 80px;">
        <div class="col-md-8 offset-md-2">
            <div class="card">
            <div class="card-header bg">
                <h4>Current Item Status in the System</h4>
            </div>
            <div class="card-body">
                
                <canvas id="bargraph"></canvas>

            </div>
            </div>
        </div>

<script>
function w3_open() {
  document.getElementById("mySidebar").style.display = "block";
}

function w3_close() {
  document.getElementById("mySidebar").style.display = "none";
}
</script>

<script type="text/javascript" src="//cdnjs.cloudflare.com/ajax/libs/Chart.js/2.4.0/Chart.min.js"></script>
<script src="assets/js/jquery.min.js"></script>
<script src="css/bootstrap.min.css"></script>

<script type="text/javascript">
    
    var ctx = document.getElementById("bargraph").getContext('2d');
    var myChart = new Chart(ctx, {
        type: 'bar',
        data: {
            labels: <?php echo json_encode($item); ?>,
            datasets: [{
                backgroundcolor: [
                "#ffd322",
                "#5945fd",
                "#25d5f2",
                "#2ec551",
                "#ff344e",
                ],
               data: <?php echo json_encode($total); ?>
            }]
        },
        options: {
            legend: {
                display: true,
                position: 'bottom',
                labels: {
                    fontColor: '#71748d',
                    fontFamily: 'Circular Std Book',
                    fontSize: 14,
                }
            },
        }
    });

</script>

</body>
</html>
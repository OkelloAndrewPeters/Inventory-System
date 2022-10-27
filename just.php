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
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bar Graph</title>
    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
</head>
<body>
    <div class="row">
        <div class="col-md-8 offset-md-2">
            <div class="card">
            <div class="card-header bg">
                <h1>Bar-graph</h1>
            </div>
            <div class="card-body">
                
                <canvas id="bargraph"></canvas>

            </div>
            </div>
        </div>
        
    </div>

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




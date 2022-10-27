<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Database Records</title>
    <link rel="stylesheet" type="text/css" href="css/bootstrap.css">
    <style>
        table{
            width: 70%;
            margin: auto;
            font-family: Arial, Helvetica, sans-serif;
        }
        table, tr, th, td{
            border: 1px solid #d4d4d4;
            border-collapse: collapse;
            padding: 12px;
        }
        th, td{
            text-align: left;
            vertical-align: top;
        }
        tr:nth-child(even){
            background-color: #e7e9eb;
        }
    </style>
<body>

    <p class="h4">Table of Items</p>
   
<?php

//creating connection to database
    $con = mysqli_connect("localhost", "root", "", "inventory");
    //checking if connection is working or not
   
    //Output Form Entries from the Database
    $sql = "SELECT * FROM inventory_list";
    //fire query
    $result = mysqli_query($con, $sql);


    if(mysqli_num_rows($result) > 0)
    {
       echo ' <table class="table">
              <thead class="thead-dark">
                <tr>
                  <th scope="col">Item Name</th>
                  <th scope="col">Modal</th>
                  <th scope="col">Status</th>
                  <th scope="col">Date Created</th>
                  <th scope="col">Total</th>
                </tr>
              </thead>
              ';
       while($row = mysqli_fetch_assoc($result)){
         // to output mysql data in HTML table format
           echo '<tbody>
           <tr > 
           <td>' . $row["Item Name"] . '</td>
           <td>' . $row["Modal"] . '</td>
           <td> ' . $row["Status"] . '</td>
           <td>' . $row["date"] . '</td> 
           <td>' . $row["Total"] . '</td>
           </tr>
           <tbody>';
       } 
       echo '</table>';
    }
    else
    {
        echo "0 results";
    }
    // closing connection
    mysqli_close($con);

?>

<button type="button" class="btn btn-primary"><a href="sidebar.php" style="text-decoration: none; color: white;">Back to Dashboard</a></button>

</body>
</html>
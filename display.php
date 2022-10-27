<?php

     $con = new mysqli("localhost", "root", "", "inventory");
    //checking if connection is working or not
    if(!$con)
    {
        die("Connection failed!" . mysqli_connect_error());
    }
    else 
    {
        echo "Successfully Connected! <br>";
    }

    $sql = "SELECT * FROM inventory_list";

    $result = mysqli_query($con, $sql);

    if(mysqli_num_rows($result) > 0)
	{
	 while($row = mysqli_fetch_assoc($result)){
	   echo "Item Name: " . $row["item Name"]. " - Modal: " . $row["Modal"]. " Status: ". $row["Status"]. "Date: ". $row["Date"] . "<br>";
	}
	}
	else
	{
	  echo "0 results";
	}


?>
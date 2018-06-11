<?php
	
	$host = "icts-db-mysqldb2.icts.kuleuven.be";
	$username = "www_drsolitaire";
	$password = "JMmS7YxI5kO2pxeU";
	$db_name = "www_drsolitaire";
	
	$userName = $_GET['username'];
	$pswrd = $_GET['password'];
	
	
	$con=mysqli_connect($host,$username,$password,$db_name);

	if (mysqli_connect_errno($con)) {
		echo "Failed to connect to MySQL: " . mysqli_connect_error();
	}
	
   
	mysqli_query($con,"UPDATE Person SET password='$pswrd' WHERE username = '$userName'");

	$username = mysql_real_escape_string($username);	

	$result = mysqli_query($con,"SELECT * FROM Person WHERE username='".$userName."'");
	$row = mysqli_fetch_array($result);
	$myObj[0] = $row;
	$myJSON2 = json_encode($myObj);

	echo $myJSON2;
		
	mysqli_close($con);
	
	
?>
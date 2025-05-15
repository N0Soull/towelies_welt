<?php

	$server= "localhost";
	$user= "root";
	$pass= "";
	$db= "towelies_welt";
	echo "blablabal";
	
	$vorn=$_POST["vorname"];
	$nachn=$_POST["nachname"];
	$email=$_POST["email"];
	$gb=$_POST["geburtstag"];
	$handyn=$_POST["handynummer"];
	$pass=$_POST["regPass"];
	
	
	
	$con = mysqli_connect($server,$user,$pass,$db);
	mysqli_select_db($con,$db);
	
	$sql = "INSERT INTO kunde(Vorname,Nachname) VALUES
			('$vorn','$nachn')";
	mysqli_query($con, $sql);
	
	echo mysqli_error($con);
	echo "hallo";
		
	
?>
<!-- für die kundendaten übertragung von web auf das datenbank.-->

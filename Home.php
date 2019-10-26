<!--

This is the home page for Devin Hopkins and Tristan Hess' database management term project.

-->

<html>
	<head>
		<meta charset = "utf-8">
		<title> Home Page </title>
		<style type = "text/css">
		td, th, table {border: thin solid black; }
		</style>
	</head>
<body>

<script>

	// Global variables for the help page
	var helpPage = "<h1> Help Page </h1>";
	var helpWindow = null;
	
	function openHelpPage()
	{
		// Making sure the help page isn't already open, and if it is, close it
		if (helpPage != null)
		{
			helpPage.close();
		}
		
		// To do
	}

</script>

<!-- Functions -->
<?php

	// This function takes in a website filename and finds it locally on the machine. It then manipulates the filename so it can be displayed on the web browser
	function getLocation($file_name)
	{
		// Getting the absolute path of the file
		$absolute_path = realpath($file_name);
		
		$string_position = strpos($absolute_path, "htdocs");
		
		$website_path = substr($absolute_path, $string_position + 6);
		
		// Returning the path to make it properly display on the web browser
		return $website_path;
	}
	
?>

<center><h1>
	Telecom Logging Crux (TLC)
</h1></center>

<!-- Button to go the TLC page -->
<?php
	print "<div id=\"button\" align=\"center\"><a href=" . getLocation("TLC.php") . "><button>Go to TLC Page</button></a></div>";
?>

</body>
</html>
<!--

This is the page containing the advanced functions for Devin Hopkins and Tristan Hess' database management term project.

-->

<!-- Included files. -->
<?php

    include 'DatabaseOperations.php';
	include 'FunctionsForAll.php';

?>

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
	var helpPage = "<h1><center> Help Page </center></h1>";
	var helpWindow = null;
	
	function openHelpPage()
	{
		// Making sure the help page isn't already open, and if it is, close it
		if (helpWindow != null)
		{
			helpWindow.close();
		}
		
		// WRITE WHAT WE WANT THE HELP WINDOW TO DISPLAY HERE, STILL NEED TO DO
		
		// This is opening the new window with all of the differences added
		helpWindow = window.open("", "Help Page", "width=2000,height=500");
		helpWindow.document.write(helpPage);
		
		// This resets the page variable, and thus resets the window
		helpPage = "<h1><center> Help Page </center></h1>";
	}

</script>

<center><h1>
	Advanced Database Interaction Page
</h1></center>

<!-- Buttons -->
<?php

	// Button to go the Home page
	print "<div id=\"button\" align=\"center\"><a href=" . getLocation("Home.php") . "><button>Go to Home Page</button></a></div>";

	// Making sure there's some space
	print "<br>";

	// Button to go the Advanced Database Interaction page
	print "<div id=\"button\" align=\"center\"><a href=" . getLocation("DatabaseInteraction.php") . "><button>Go to Advanced Database Page</button></a></div>";

?>

</body>
</html>
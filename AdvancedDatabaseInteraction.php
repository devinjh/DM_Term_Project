<!--

    This is the page containing the advanced functions for Devin Hopkins and Tristan Hess' database management term project.

-->

<!-- Included files. -->
<?php

    include 'DatabaseOperations.php';
	include 'FunctionsForAll.php';

?>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.0.0-alpha1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-csv/0.71/jquery.csv-0.71.min.js"></script>

<html>
	<head>
		<meta charset = "utf-8">
		<title> Advanced Database </title>
		<style type = "text/css">
			td, th, table {
				border: thin solid black;
			}
		</style>
	</head>
<body>

<script>

	// Global variables for the help page
	var helpPage = "<h1><center> Help Page </center></h1>";
    var helpWindow = null;
    
    // Enum for the operations (in case we want to add more)
	const OperationEnum = Object.freeze({
		FindClose: 0,
        FindPattern: 1,
        UploadInformation: 2
	});
	
	function openHelpPage()
	{
		// Making sure the help page isn't already open, and if it is, close it
		if (helpWindow != null)
		{
			helpWindow.close();
		}
		
		// WRITE WHAT WE WANT THE HELP WINDOW TO DISPLAY HERE, STILL NEED TO DO
		
		// This is opening the new window with all of the differences added
		helpWindow = window.open("", "Help Page", "width=1000,height=500");
		helpWindow.document.write(helpPage);
		
		// This resets the page variable, and thus resets the window
		helpPage = "<h1><center> Help Page </center></h1>";
    }
    
    function updateInformation(e)
    {
        // If the selected function is not upload information
        if (e != OperationEnum.UploadInformation)
        {
            // Make the break hidden so the formatting still looks good
            document.getElementById("br_1").hidden = true;

            // Make the information textbox visible so the user can enter in information
			document.getElementById("information_textbox").hidden = false;
			
			// The operation is to find a close extension
			if (e == OperationEnum.FindClose)
			{
				// The range is necessary since they want a close extension
				document.getElementById("extension_range_textbox").hidden = false;
			}
			// The operation is to find a pattern matching the extension given
			else
			{
				// Since there's nothing needed about the range, make that hidden too
				document.getElementById("extension_range_textbox").hidden = true;
			}
						
			document.getElementById("upload_information").hidden = true;
			document.getElementById("output").hidden = true;
        }
        // If the selected function is upload information
        else
        {
            // Make the break visible so the formatting still looks good
            document.getElementById("br_1").hidden = false;

            // Make the information textbox hidden since it doesn't have anything to do with uploading information
			document.getElementById("information_textbox").hidden = true;
			
			// Since there's nothing needed about the range, make that hidden too
			document.getElementById("extension_range_textbox").hidden = true;

            // ADD ANYTHING ELSE THAT NEEDS TO HAPPEN
			document.getElementById("upload_information").hidden = false;
			document.getElementById("output").hidden = false;
						
        }
	}
		
	// function to upload file data
	function uploadData()
	{
		var filename = "rawdata/" + document.getElementById("myFile").files[0].name;
		var xhttp = new XMLHttpRequest();
		var i = 0, j = 0; // loop vars
		xhttp.onreadystatechange = function()
		{
			if (this.readyState == 4 && this.status == 200)
			{
				// This will write the entire contents of the selected file to the "output" element on the page
				// CURRENTLY ONLY WORKS ON THE "export_station" DATA FILE

				var test = this.responseText;
				test = test.replace(/\n/g, ",") // replaces \n with , so it can be stored in an array properly
				
				var text = $.csv.toArray(test);
				var lines = text.length / 9 - 1; // last line the future loop reads is all undefined so -1
				var htmlOut = "INSERT INTO `export`(`extension`, `type`, `port`, `name`, `room`, `jack`, `cable`, `floor`, `building`) VALUES ";
				
				//
				// VALUES ([value-1],[value-2],[value-3],[value-4],[value-5],[value-6],[value-7],[value-8],[value-9]),
				//        ([value-10],[value-11],[value-12],[value-13],[value-14],[value-15],[value-16],[value-17],[value-18]);
				
				for (j = 1; j < lines-1; j++) { // skip line 0 because this file has the headers as line 0 // j < lines
				  htmlOut += "(";
					for (i = 0; i < 8; i++) { // i < 8 for all but last column
						htmlOut += "'" + text[9*j+i].replace('\'','').replace('\\','') + "',";
					}
					htmlOut += "'" + text[9*j+8].replace('\'','') + "'),";
					htmlOut += "<br>";
				}
				// need to add last line separately to add on the delimeter ";"
				htmlOut += "(";
				for (i = -1; i < 7; i++) { // i < 8 for all but last column
					htmlOut += "'" + text[9*lines+i].replace('\'','') + "',";
				}
				htmlOut += "'" + text[9*lines+7].replace('\'','') + "');";
				document.getElementById("output").innerHTML = htmlOut;
			}
		};
		xhttp.open("GET", filename, true);
		xhttp.send();
  }

</script>

<!-- Variables. -->
<?php

    // Setting all of the variables in case they aren't defined
	$extension_number = "DNE";
	$extension_range = "DNE";
	
	// This section goes through and grabs all of the variables that are defined (not including the updated ones)
	// extension_number
	if (isset($_POST["extension_number"]))
	{
		$extension_number = $_POST["extension_number"];
	}
	// extension_range
	if (isset($_POST["extension_range"]))
	{
		$extension_range = $_POST["extension_range"];
	}

	// Setting the variables in case they aren't defined
	$operation = "DNE";

	// operation
	if (isset($_POST["operation"]))
	{
		$operation = $_POST["operation"];
	}

?>

<!-- Functions. -->
<?php

	// Determines the operation being performed and performs it
	function determineOperation()
	{
		// Using the global variable operation and the array of search checkboxes in this function
		global $operation;
		
		// Making sure they actually selected an operation
		if (strcmp($operation, "DNE") != 0)
		{
			if (strcmp($operation, "find_close") == 0)
			{
				// Performs the find close operation
				findCloseExtension();
			}
			else if (strcmp($operation, "find_pattern") == 0)
			{
				// Performs the find pattern operation
				findPattern();
			}
			else if (strcmp($operation, "upload_information") == 0)
			{
				// Performs the upload information function
				// TO DO
			}
		}
	}

	// Function that returns available extensions that are close to the given extension
	function findCloseExtension()
	{
		// Using the global variable $extension_number and extension_range
		global $extension_number, $extension_range;

		// Making the array that will hold all of the extnension numbers and filling it with all the used extensions
		$used_extension_array = array();
		$used_extension_array = getUsedExtensions();

		// This is how far the extension can go down
		$extension_range_down = $extension_range;

		// Making sure that the range the user offered doesn't take it below zero (since that's impossible)
		if ($extension_number - $extension_range < 0)
		{
			// If it does, then the max amount it can decrease is by the extension numbr itself
			$extension_range_down = $extension_number;
		}

		print "<p>Available Extensions:</p><p>";

		// Printing out all of the extensions and showing them in their proper spot
		for ($extension = $extension_number - $extension_range_down; $extension < $extension_number + $extension_range; $extension++)
		{
			// The extension isn't being used
			if (binarySearch($used_extension_array, 0, sizeof($used_extension_array), $extension) == -1)
			{
				print $extension . ", ";
			}
			// The extension is being used
			else
			{
				// Nothing happens
			}
		}

		print "</p>";
	}

	// Function that finds extensions with similar patterns of the given extension
	function findPattern()
	{
		// Using the global variable $extension_number
		global $extension_number;

		// Getting all of the table names
		$table_names = getTableNames();

		// Making the array that will hold all of the extnension numbers and filling it with all the used extensions
		$used_extension_array = array();
		$used_extension_array = getUsedExtensions();

		// Creating the array of available extensions and filling it with every possible extension
		$available_extension_array = array();
		for ($i = 0; $i <= 99999; $i++)
		{
			array_push($available_extension_array, $i);
		}

		// Removing all of the extensions that have been taken
		for ($i = 0; $i < count($used_extension_array); $i++)
		{
			// If the extension is in the used extensions array and in the available extension array, it's removed from the available extensions array
			if (($key = array_search($used_extension_array[$i], $available_extension_array)) !== false)
			{
				unset($available_extension_array[$key]);
			}
		}
		// Now making sure all of the elements are indexed properly
		$available_extension_array = array_values($available_extension_array);

		print "<p>Available Extensions with a Pattern:</p><p>";

		// Next, we make a number of patterns that we're looking for. We loop through each pattern and try it
		$num_of_patterns = 4;

		// Going through each of the available extensions
		for ($i = 0; $i < $num_of_patterns; $i++)
		{
			// Gets a pattern (a regex) based on the length of the extension and the pattern integer we're looking for
			$pattern = getPattern($extension_number, $i);
			print "<br><br>" . $pattern . "<br><br>";

			// Making sure the pattern is a valid pattern and not the default "DNE"
			if (strcmp($pattern, "DNE") != 0)
			{
				// Going through the entire array of avialable extensions
				for ($x = 0; $x < count($available_extension_array); $x++)
				{
					// If the extension matches the pattern, it's displayed
					if (preg_match_all($pattern, ((string)$available_extension_array[$x]), $the_match))
					{
						print "available_extension_array[x]: " . $available_extension_array[$x] . "<br>";
					}
				}
			}
		}

		// TESTING
		for ($i = 0; $i < count($available_extension_array); $i++)
		{
			//print $available_extension_array[$i] . ", ";
		}

		print "</p>";
	}

?>

<center>
    
    <h1>
	    Advanced Database Interaction Page
    </h1>

    <!-- Displaying the changes/information the user wanted. -->
	<?php

        // Simply call this method to do the operation and display the results (if applicable)
        determineOperation();

        // This is the form headers that gathers all the information and relaunches the page
        print "<form action=" . getLocation("AdvancedDatabaseInteraction.php") . " method='post'>";

    ?>

    	<!-- Figuring out what operation they would like to perform. -->
    	<p>
    	    What operation would you like to do?
    	</p>

    	<!-- The operation radio buttons. -->
    	<input type="radio" name="operation" value="find_close" onclick="updateInformation(OperationEnum.FindClose)" checked>Find a Close Extension
    	<input type="radio" name="operation" value="find_pattern" onclick="updateInformation(OperationEnum.FindPattern)">Find an Extension Matching a Pattern
    	<input type="radio" name="operation" value="upload_information" onclick="updateInformation(OperationEnum.UploadInformation)">Upload Information

    	<!-- Making sure the next attribute isn't too close to the radio buttons. -->
    	<br id="br_1" hidden>

    	<!-- The textboxes that gather all of the appropriate information. -->
    	<p id="information_textbox">
    	    Extension: <input type="text" name="extension_number">
    	</p>

		<p id="extension_range_textbox">
			Range: <input type="text" name="extension_range">
		</p>

		<p id="upload_information" hidden="true">
				<input type="file" id="myFile">
				<button type="button" onclick="uploadData()"> Upload! </button>
		</p>

		<p id="output"> </p>

    	<!-- Submit button. -->
    	<br><input type="submit">

    </form>

</center>

<!-- Button to bring up the help page. -->
<div align="center" onclick="openHelpPage()">
	<button> Help Page </button>
</div>

<!-- Making sure the Help Button isn't too close to the next button. -->
<br>

<!-- Buttons -->
<?php

	// Button to go the Home page
	print "<div id=\"button\" align=\"center\"><a href=" . getLocation("Home.php") . "><button>Go to Home Page</button></a></div>";

	// Making sure there's some space
	print "<br>";

	// Button to go the Advanced Database Interaction page
	print "<div id=\"button\" align=\"center\"><a href=" . getLocation("DatabaseInteraction.php") . "><button>Go to Basic Database Page</button></a></div>";

?>

</body>
</html>
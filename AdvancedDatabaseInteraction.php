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
	function uploadData() {
	var filename = "rawdata/" + document.getElementById("myFile").files[0].name;
  var xhttp = new XMLHttpRequest();
  xhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
      document.getElementById("output").innerHTML = this.responseText;
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

		// Getting all of the table names
		$table_names = getTableNames();

		// Making the array that will hold all of the extnension numbers
		$extension_array = array();

		// Searching and displaying the results of each table, one at a time
		for ($x = 0; $x < count($table_names); $x++)
		{			
			// Construct the specific query needed
			$result = performQuery("SELECT extension FROM " . $table_names[$x]);
			
			// This gets the array of the first row of data in the table
			$row = mysqli_fetch_array($result);

			// This gets the number of fields in the table
			$num_fields = mysqli_num_fields($result);

			// If the result of the query was nothing, then nothing needs to be displayed
			if (!empty($row))
			{
				// This gets all of the keys, but not the data, from the row
				$keys = array_keys($row);

				// Getting the number of rows from our table
				$num_rows = mysqli_num_rows($result);

				// Going through each row and displaying all of the data
				for ($row_num = 0; $row_num < $num_rows; $row_num++)
				{

					// Getting the values, but not the keys, from the row
					$values = array_values($row);

					// Looping through the data to display all of the values
					for ($index = 0; $index < $num_fields; $index++)
					{
						// Displaying all of the values in the rows
						// Using 2 * $index is required because every other value is an integer with the corresponding column number, and we don't care about that
						// Using the + 1 is required because the first index is the integer, and the index following it is the value and then adding it to the array
						array_push($extension_array, htmlspecialchars($values[2 * $index + 1]));
					}

					// Getting the next row
					$row = mysqli_fetch_array($result);
				}
			}
		}

		// Sorting the array
		sort($extension_array);

		// TESTING
		// Prints out the contents of the array
		/*for ($i = 0; $i < sizeof($extension_array); $i++)
		{
			print "<p>" . $extension_array[$i] . "</p>";
		}
		print "<p></p>";*/
		// END TESTING

		$extension_range_down = $extension_range;

		if ($extension_number - $extension_range < 0)
		{
			$extension_range_down = $extension_number;
		}

		print "<p>Available Extensions:</p><p>";

		// Printing out all of the extensions and showing them in their proper spot
		for ($extension = $extension_number - $extension_range_down; $extension < $extension_number + $extension_range; $extension++)
		{
			// The extension isn't being used
			if (binarySearch($extension_array, 0, sizeof($extension_array), $extension) == -1)
			{
				print $extension . ", ";
			}
			// The extension is being used
			else
			{
				// Empty
			}
		}

		print "</p>";
	}

	// Function that finds extensions with similar patterns of the given extension
	function findPattern()
	{
		// TESTING
		print "<p> findPattern </p>";
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
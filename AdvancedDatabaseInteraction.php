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
	<!-- Bootstrap include. -->
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
		
    <meta charset="utf-8">
    <title> Advanced Database </title>
    <style type="text/css">
    td,
    th,
    table {
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

    function openHelpPage() {
        // Making sure the help page isn't already open, and if it is, close it
        if (helpWindow != null) {
            helpWindow.close();
        }

        // WRITE WHAT WE WANT THE HELP WINDOW TO DISPLAY HERE, STILL NEED TO DO

        // This is opening the new window with all of the differences added
        helpWindow = window.open("", "Help Page", "width=1000,height=500");
        helpWindow.document.write(helpPage);

        // This resets the page variable, and thus resets the window
        helpPage = "<h1><center> Help Page </center></h1>";
    }

    function updateInformation(e) {
        // If the selected function is not upload information
        if (e != OperationEnum.UploadInformation) {
            // Make the break hidden so the formatting still looks good
            document.getElementById("br_1").hidden = true;

            // Make the information textbox visible so the user can enter in information
            document.getElementById("information_textbox").hidden = false;

            // The operation is to find a close extension
            if (e == OperationEnum.FindClose) {
                // The range is necessary since they want a close extension
                document.getElementById("extension_range_textbox").hidden = false;
            }
            // The operation is to find a pattern matching the extension given
            else {
                // Since there's nothing needed about the range, make that hidden too
                document.getElementById("extension_range_textbox").hidden = true;
            }

            document.getElementById("upload_information").hidden = true;
            document.getElementById("output").hidden = true;
        }
        // If the selected function is upload information
        else {
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
        var i = 0,
            j = 0; // loop vars
        xhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                if (filename[8] == 'e') {
                    var test = this.responseText;
                    test = test.replace(/\n/g, ","); // replaces \n with , so it can be stored in an array properly

                    var text = $.csv.toArray(test);
                    var lines = text.length / 9 - 1; // last line the future loop reads is all undefined so -1
                    var htmlOut =
                        "INSERT INTO `export`(`extension`, `type`, `port`, `name`, `room`, `jack`, `cable`, `floor`, `building`) <br> VALUES ";

                    for (j = 1; j < lines -
                        1; j++) { // skip line 0 because this file has the headers as line 0 // j < lines
                        htmlOut += "(";
                        for (i = 0; i < 8; i++) { // i < 8 for all but last column
                            htmlOut += "'" + text[9 * j + i].replace('\'', '').replace('\\', '') + "',";
                        }
                        htmlOut += "'" + text[9 * j + 8].replace('\'', '') + "'),";
                        htmlOut += "<br>";
                    }
                    // need to add last line separately to add on the delimeter ";"
                    htmlOut += "(";
                    for (i = -1; i < 7; i++) { // i < 8 for all but last column
                        htmlOut += "'" + text[9 * lines + i].replace('\'', '') + "',";
                    }
                    htmlOut += "'" + text[9 * lines + 7].replace('\'', '') + "');";

                    var myWindow = window.open("", "QueryOut");
                    myWindow.document.write(htmlOut);

                } else if (filename[8] == 'r') {
                    var test = this.responseText;
                    test = test.replace(/\n/g, ","); // replaces \n with , so it can be stored in an array properly

                    var text = $.csv.toArray(test);
                    var lines = (text.length - 3) / 8; // first 2 and last line is not important data
                    var htmlOut =
                        "INSERT INTO `akron`(`extension`, `type`, `cor`, `tn`, `coverpath`, `name`, `cos`) <br> VALUES ";

                    for (j = 0; j < lines - 1; j++) {
                        htmlOut += "(";
                        for (i = 2; i < 8; i++) { // i < 7 for all but last column
                            htmlOut += "'" + text[8 * j + i].replace('\'', '').replace('\\', '') + "',";
                        }
                        htmlOut += "'" + text[8 * j + 8].replace('\'', '') + "'),";
                        htmlOut += "<br>";
                    }
                    // need to add last line separately to add on the delimeter ";"
                    j = 8 * lines - 1;
                    htmlOut += "(";
                    for (i = -5; i < 1; i++) {
                        htmlOut += "'" + text[j + i].replace('\'', '') + "',";
                    }
                    htmlOut += "'" + text[j + 1].replace('\'', '') + "');";

                    var myWindow = window.open("", "QueryOut");
                    myWindow.document.write(htmlOut);
                } else if (filename[8] == 'W') {
                    var test = this.responseText;
                    test = test.replace(/\n/g, ","); // replaces \n with , so it can be stored in an array properly

                    var text = $.csv.toArray(test);
                    var lines = (text.length - 3) / 8; // first 2 and last line is not important data
                    var htmlOut =
                        "INSERT INTO `wayne`(`extension`, `type`, `name`, `cor`, `tn`, `coverpath`, `cos`) <br> VALUES ";

                    for (j = 0; j < lines - 1; j++) {
                        htmlOut += "(";
                        for (i = 2; i < 8; i++) { // i < 7 for all but last column
                            htmlOut += "'" + text[8 * j + i].replace('\'', '').replace('\\', '') + "',";
                        }
                        htmlOut += "'" + text[8 * j + 8].replace('\'', '') + "'),";
                        htmlOut += "<br>";
                    }
                    // need to add last line separately to add on the delimeter ";"
                    j = 8 * lines - 1;
                    htmlOut += "(";
                    for (i = -5; i < 1; i++) {
                        htmlOut += "'" + text[j + i].replace('\'', '') + "',";
                    }
                    htmlOut += "'" + text[j + 1].replace('\'', '') + "');";

                    var myWindow = window.open("", "QueryOut");
                    myWindow.document.write(htmlOut);
                } else
                    window.alert("Wrong data file type");
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
			// If it does, then the max amount it can decrease is by the extension number itself
			$extension_range_down = $extension_number;
		}

		// Letting the user know what's being displayed
		print "<p>Available Extensions:</p><p>";

		// Printing out all of the extensions and showing them in their proper spot
		$bottom = $extension_number - $extension_range_down;
		$top = $extension_number + $extension_range;
		$difference = $top - $bottom;
		$tier_one = array();
		$tier_two = array();
		$tier_three = array();
		$tier_four = array();
		$tier_five = array();
		for ($extension = $bottom; $extension < $top; $extension++)
		{
			// The extension isn't being used
			if (binarySearch($used_extension_array, 0, sizeof($used_extension_array), $extension) == -1)
			{
				//print $extension . ",";
				switch ($extension){
					case ($extension < $bottom + ($difference / 5)):
						array_push($tier_one, $extension);
					break;
					case ($extension < $bottom + (2 * $difference / 5)):
						array_push($tier_two, $extension);
					break;
					case ($extension < $bottom + (3 * $difference / 5)):
						array_push($tier_three, $extension);
					break;
					case ($extension < $bottom + (4 * $difference / 5)):
						array_push($tier_four, $extension);
					break;
					case ($extension < $bottom + $difference):
						array_push($tier_five, $extension);
					break;
				}
			}
			// The extension is being used
			else
			{
				// Nothing happens
			}
		}
		// Displaying all of the available extensions in an orderly, clean fashion
		print "<table width=80%>";

		// Displaying the table headers
		print "<tr>";
		$max = -1;
		for ($i = 0; $i < 5; $i++)
		{
			// Displaying what percentage of extensions the user is seeing
			print "<th>";
			switch ($i){
				case 0:
					print "0-20%";
				break;
				case 1:
					print "21-40%";
				break;
				case 2:
					print "41-60%";
				break;
				case 3:
					print "61-80%";
				break;
				case 4:
					print "81-100%";
				break;
			}
			print "</th>";

			// We also want to see which array is the largest
			switch ($i){
				case 0:
					if (count($tier_one) > $max)
					{
						$max = count($tier_one);
					}
				break;
				case 1:
					if (count($tier_two) > $max)
					{
						$max = count($tier_two);
					}
				break;
				case 2:
					if (count($tier_three) > $max)
					{
						$max = count($tier_three);
					}
				break;
				case 3:
					if (count($tier_four) > $max)
					{
						$max = count($tier_four);
					}
				break;
				case 4:
					if (count($tier_five) > $max)
					{
						$max = count($tier_five);
					}
				break;
			}
		}
		print "</tr>";

		// Displaying all of the data
		$i = 0;
		while ($i < $max)
		{
			print "<tr>";
			for ($x = 0; $x < 5; $x++)
			{
				print "<td align='center'>";
				switch ($x){
					case 0:
						if ($i < count($tier_one))
						{
							print $tier_one[$i];
						}
						else
						{
							print "";
						}
					break;
					case 1:
						if ($i < count($tier_two))
						{
							print $tier_two[$i];
						}
						else
						{
							print "";
						}
					break;
					case 2:
						if ($i < count($tier_three))
						{
							print $tier_three[$i];
						}
						else
						{
							print "";
						}
					break;
					case 3:
						if ($i < count($tier_four))
						{
							print $tier_four[$i];
						}
						else
						{
							print "";
						}
					break;
					case 4:
						if ($i < count($tier_five))
						{
							print $tier_five[$i];
						}
						else
						{
							print "";
						}
					break;
				}
				print "</td>";
			}
			print "</tr>";

			// Incrementing $i
			$i++;
		}

		// End of the table
		print "</table>";

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

		print "<p>Available Extensions with a Pattern<br><br>" .
			"Your Extension Number: " . $extension_number . "<br><br>" .
			"(an 'x' denotes any digit)</p><p>";

		// Next, we make a number of patterns that we're looking for. We loop through each pattern and try it
		$num_of_patterns = 4;

		// Creating an array of arrays to store all of the available functions
		$sorted_extension_data = array();
		for ($i = 0; $i < $num_of_patterns; $i++)
		{
			array_push($sorted_extension_data, array());
		}

		// Creating an array to store all of the pattern names
		$pattern_names = array();

		// Creating an array to stoer the size of the other array
		$size_array = array();

		// Going through each of the available extensions
		for ($i = 0; $i < $num_of_patterns; $i++)
		{
			// Gets a pattern (a regex) based on the length of the extension and the pattern integer we're looking for
			$pattern = getPattern($extension_number, $i);

			// Getting and pushing the pattern name onto the array of pattern names
			array_push($pattern_names, getPatternName($extension_number, $i));

			// Making sure the pattern is a valid pattern and not the default "DNE"
			if (strcmp($pattern, "DNE") != 0)
			{
				// Going through the entire array of avialable extensions
				for ($x = 0; $x < count($available_extension_array); $x++)
				{
					// If the extension matches the pattern, it's pushed into the proper array
					if (preg_match_all($pattern, ((string)$available_extension_array[$x]), $the_match))
					{
						array_push($sorted_extension_data[$i], $available_extension_array[$x]);
					}
				}
			}
		}

		// Displaying all of the available extensions in an orderly, clean fashion
		print "<table width=80%>";

		// Displaying the table headers
		print "<tr>";
		$max = -1;
		for ($i = 0; $i < $num_of_patterns; $i++)
		{
			// Displaying the pattern. If there isn't a pattern, displaying so
			print "<th>";
			if (strcmp("DNE", $pattern_names[$i]) != 0)
			{
				print $pattern_names[$i];
			}
			else
			{
				print "No Pattern";
			}
			print "</th>";

			// We also get the size of each array from the sorted extension data (for use later)
			array_push($size_array, sizeof($sorted_extension_data[$i]));

			// We also want to see if it's the largest one we have. If so, store it
			if ($size_array[$i] > $max)
			{
				$max = $size_array[$i];
			}
		}
		print "</tr>";

		// Displaying all of the data
		$i = 0;
		while ($i < $max)
		{
			print "<tr>";
			for ($x = 0; $x < $num_of_patterns; $x++)
			{
				print "<td align='center'>";
				// If there's still an extension to be displayed, this will be true
				if ($i < $size_array[$x])
				{
					print $sorted_extension_data[$x][$i];
				}
				// If not, there's nothing to display
				else
				{
					print "";
				}
				print "</td>";
			}
			print "</tr>";

			// Incrementing $i
			$i++;
		}

		// End of the table
		print "</table>";

		// End of the paragraph
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
        <input type="radio" name="operation" value="find_close" onclick="updateInformation(OperationEnum.FindClose)"
            checked>Find a Close Extension
        <input type="radio" name="operation" value="find_pattern"
            onclick="updateInformation(OperationEnum.FindPattern)">Find an Extension Matching a Pattern
        <input type="radio" name="operation" value="upload_information"
            onclick="updateInformation(OperationEnum.UploadInformation)">Upload Information

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

    <p id="output" align='center'> </p>
</body>

</html>
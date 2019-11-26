<!--

	This is the home page for Devin Hopkins and Tristan Hess' database management term project.

-->

<!-- Included files. -->
<?php

	include 'DatabaseOperations.php'

?>

<!-- Functions -->
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

		// Making sure $extension_number is not 0. If it is, a message is displayed to tell the user their mistake and the function stops
		if ($extension_number == 0)
		{
			print "<p> Error! Please input an extension number. </p>";
			return;
		}

		// Making sure $extension_range is not 0. If it is, a message is displayed to tell the user their mistake and the function stops
		if ($extension_range == 0)
		{
			print "<p> Error! Please input an extension range. </p>";
			return;
		}

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
		print "<p style=\"color: gold\">Available Extensions:</p><p>";

		// Printing out all of the extensions and showing them in their proper spot
		$bottom = $extension_number - $extension_range_down;
		$top = $extension_number + $extension_range + 1;
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
		print "<table align =\"center\" class=\"table table-striped table-dark\">";

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
				print "<td>";
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

		// Making sure $extension_number is not 0. If it is, a message is displayed to tell the user their mistake and the function stops
		if ($extension_number == 0)
		{
			print "<p> Error! Please input an extension number. </p>";
			return;
		}

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

		print "<p style=\"color: gold\">Available Extensions with a Pattern<br><br>" .
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
		print "<table align =\"center\" class=\"table table-striped table-dark\">";

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
				print "<td>";
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







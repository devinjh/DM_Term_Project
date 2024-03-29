<!--

	These are functions that each of the websites might use but aren't related to the database. So, to prevent code duplication, it's moved in here.

-->

<!-- Functions -->
<?php

	// This function takes in a website filename and finds it locally on the machine. It then manipulates the filename so it can be displayed on the web browser
	function getLocation($file_name)
	{
		// Getting the absolute path of the file
		$absolute_path = realpath($file_name);
		
		// This finds the position of the directory "htdocs" in the long absoulte path
		$string_position = strpos($absolute_path, "htdocs");
		
		// This string is the file path from the directory from "htdocs" and onwards (not including the "htdocs")
		$website_path = substr($absolute_path, $string_position + 6);
		
		// Returning the path to make it properly display on the web browser
		return $website_path;
	}

	// Tells if the column header is part of the given tables
	function isApplicable($table, $column_header)
	{
		// The table is akron or wayne
		if (strcmp($table, "akron") == 0 || strcmp($table, "wayne") == 0)
		{
			// extension
			if (strcmp($column_header, "extension") == 0)
			{
				return true;
			}
			// type
			else if (strcmp($column_header, "type") == 0)
			{
				return true;
			}
			// cor
			else if (strcmp($column_header, "cor") == 0)
			{
				return true;
			}
			// tn
			else if (strcmp($column_header, "tn") == 0)
			{
				return true;
			}
			// coverpath
			else if (strcmp($column_header, "coverpath") == 0)
			{
				return true;
			}
			// name
			else if (strcmp($column_header, "name") == 0)
			{
				return true;
			}
			// cos
			else if (strcmp($column_header, "cos") == 0)
			{
				return true;
			}
			// the box isn't checked
			else if (strcmp($column_header, "DNE") == 0)
			{
				return true;
			}
			// If it's none of the above, then the column header isn't a part of the table
			else
			{
				return false;
			}
		}
		// The table is export
		else if (strcmp($table, "export") == 0)
		{
			// extension
			if (strcmp($column_header, "extension") == 0)
			{
				return true;
			}
			// type
			else if (strcmp($column_header, "type") == 0)
			{
				return true;
			}
			// port
			else if (strcmp($column_header, "port") == 0)
			{
				return true;
			}
			// name
			else if (strcmp($column_header, "name") == 0)
			{
				return true;
			}
			// room
			else if (strcmp($column_header, "room") == 0)
			{
				return true;
			}
			// jack
			else if (strcmp($column_header, "jack") == 0)
			{
				return true;
			}
			// cable
			else if (strcmp($column_header, "cable") == 0)
			{
				return true;
			}
			// floor
			else if (strcmp($column_header, "floor") == 0)
			{
				return true;
			}
			// building
			else if (strcmp($column_header, "building") == 0)
			{
				return true;
			}
			// the box isn't checked
			else if (strcmp($column_header, "DNE") == 0)
			{
				return true;
			}
			// If it's none of the above, then the column header isn't a part of the table
			else
			{
				return false;
			}
		}
		// If they're trying to access every table
		else if (strcmp($table, "all") == 0)
		{
			// extension
			if (strcmp($column_header, "extension") == 0)
			{
				return true;
			}
			// type
			else if (strcmp($column_header, "type") == 0)
			{
				return true;
			}
			// name
			else if (strcmp($column_header, "name") == 0)
			{
				return true;
			}
			// the box isn't checked
			else if (strcmp($column_header, "DNE") == 0)
			{
				return true;
			}
			// If it's none of the above, then the column header isn't a part of the table
			else
			{
				return false;
			}
		}

		// This means some random table has made it in
		return false;
	}
  
	// Binary search
	function binarySearch($arr, $l, $r, $x) 
	{
		// If the right is greater than or equal to the left
		if ($r >= $l) 
		{
			// Finding the middle element
        	$mid = ceil($l + ($r - $l) / 2); 
  
        	// If the element is present at the middle itself
        	if ($arr[$mid] == $x)
        	{
        		// Return that element
        		return floor($mid);
        	}
  
        	// If element is smaller than mid, then it can only be present in left subarray
        	if ($arr[$mid] > $x)
        	{
        		// Call the binary search again, but search only the left subarray
        		return binarySearch($arr, $l, $mid - 1, $x);
        	}
  
        	// Else the element can only be present in right subarray
        	return binarySearch($arr, $mid + 1, $r, $x);
		} 
  
		// The element is not in the array
		return -1; 
	}

	// Returns an array with all of the used extensions
	function getUsedExtensions()
	{
		// Making the array that will hold all of the extnension numbers
		$extension_array = array();

		// Getting all of the table names
		$table_names = getTableNames();

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

		// Returning the extension array
		return $extension_array;
	}

	// This function returns a regex (pattern) based on an extension given and an integer indicating which pattern
	function getPattern($extension, $pattern_num)
	{
		// The pattern
		$pattern = "DNE";

		// The pattern number can only be 0 - 3
		// Too low, make it 0
		if ($pattern_num < 0)
		{
			$pattern_num = 0;
		}
		// Too high, make it 3
		else if ($pattern_num > 3)
		{
			$pattern_num = 3;
		}
		
		// We want to find an extension number that matches certain patterns of the given extension. First, we get the number of digits in the extension
		$num_of_digits = strlen((string)$extension);

		// Extension is a single digit
		if ($num_of_digits == 1)
		{
			// Figuring out which pattern is wanted and creating a regex for it
			switch ($pattern_num) {
				// Gets all single digit extensions available
				case 0:
					$pattern = "/(?=(^[0-9]{1}))" . /* Gets all the single digits. */
								"(?!([0-9]{2,}))/"; /* Makes sure that only single digit extensions are retreived. */
				break;
				// No second pattern
				case 1:
					$pattern = "DNE";
				break;
				// No third pattern
				case 2:
					$pattern = "DNE";
				break;
				// No fourth pattern
				case 3:
					$pattern = "DNE";
				break;
			}
		}
		// Extension is two digits
		else if ($num_of_digits == 2)
		{
			// Figuring out which pattern is wanted and creating a regex for it
			switch ($pattern_num) {
				// Matches the first number
				case 0:
					// Getting the first digit of the number
					$first_digit = substr((string)$extension, 0, 1);

					$pattern = "/(?=(^[" . $first_digit . "][0-9]{1}))" . /* Matches the first number and allows for any second number. */
								"(?!([0-9]{3,}))/"; /* Makes sure that two digit extensions are retreived. */
				break;
				// Matches the second number
				case 1:
					// Getting the second digit of the number
					$second_digit = substr((string)$extension, 1, 1);

					$pattern = "/(?=(^[0-9]{1}[" . $second_digit . "]))" . /* Matches the first number and allows for any second number. */
								"(?!([0-9]{3,}))/"; /* Makes sure that two digit extensions are retreived. */
				break;
				// No third pattern
				case 2:
					$pattern = "DNE";
				break;
				// No fourth pattern
				case 3:
					$pattern = "DNE";
				break;
			}
		}
		// Extension is three digits
		else if ($num_of_digits == 3)
		{
			// Figuring out which pattern is wanted and creating a regex for it
			switch ($pattern_num) {
				// Matches the first number
				case 0:
					// Getting the first digit of the number
					$first_digit = substr((string)$extension, 0, 1);

					$pattern = "/(?=(^[" . $first_digit . "][0-9]{2}))" . /* Matches the first number and allows for any last two numbers. */
								"(?!([0-9]{4,}))/"; /* Makes sure that three digit extensions are retreived. */
				break;
				// Matches the first and third number
				case 1:
					// Getting the first and third digit of the number
					$first_digit = substr((string)$extension, 0, 1);
					$third_digit = substr((string)$extension, 2, 1);

					$pattern = "/(?=(^[" . $first_digit . "][0-9]{1}[" . $third_digit . "]))" . /* Matches the first and third number and allows for any middle number. */
								"(?!([0-9]{4,}))/"; /* Makes sure that three digit extensions are retreived. */
				break;
				// Matches the second and third number
				case 2:
					// Getting the second and third digit of the number
					$second_digit = substr((string)$extension, 1, 1);
					$third_digit = substr((string)$extension, 2, 1);

					$pattern = "/(?=(^[0-9]{1}[" . $second_digit . "][" . $third_digit . "]))" . /* Matches the second and third number and allows for any first number. */
								"(?!([0-9]{4,}))/"; /* Makes sure that three digit extensions are retreived. */
				break;
				// Matches the third number
				case 3:
					// Getting the third digit of the number
					$third_digit = substr((string)$extension, 2, 1);

					$pattern = "/(?=(^[0-9]{2}[" . $third_digit . "]))" . /* Matches the third number and allows for any first two numbers. */
								"(?!([0-9]{4,}))/"; /* Makes sure that three digit extensions are retreived. */
				break;
			}
		}
		// Extension is four digits
		else if ($num_of_digits == 4)
		{
			// Figuring out which pattern is wanted and creating a regex for it
			switch ($pattern_num) {
				// This matches the first two digits
				case 0:
					// Getting the first two digits of the number
					$first_digit = substr((string)$extension, 0, 1);
					$second_digit = substr((string)$extension, 1, 1);
					
					// Creating the regex expression that gets all extensions that start with the same first two digits that aren't longer than 4 digits themselves
					$pattern = "/(?=(^[" . $first_digit . "][" . $second_digit . "][0-9]{2}))" . /* This makes sure the first two digits are the same. */
								"(?!([0-9]{5,}))/"; /* This makes sure the extension isn't longer than 4 digits. */
				break;
				// Matches the last two digits
				case 1:
					// Getting the last two digits of the number
					$third_digit = substr((string)$extension, 2, 1);
					$fourth_digit = substr((string)$extension, 3, 1);
					
					// Creating the regex expression that gets all extensions that end with the same two digits that aren't longer than 4 digits themselves
					$pattern = "/(?=(^[0-9]{2}[" . $third_digit . "][" . $fourth_digit . "]))" . /* This makes sure the last two digits are the same. */
								"(?!([0-9]{5,}))/"; /* This makes sure the extension isn't longer than 4 digits. */
				break;
				// Matches the first and third digit
				case 2:
					// Getting the first and third digits of the number
					$first_digit = substr((string)$extension, 0, 1);
					$third_digit = substr((string)$extension, 2, 1);
					
					// Creating the regex expression that gets all extensions that end with the same two digits that aren't longer than 4 digits themselves
					$pattern = "/(?=(^[" . $first_digit . "][0-9][" . $third_digit . "][0-9]))" . /* This makes sure the first and third digits are the same. */
								"(?!([0-9]{5,}))/"; /* This makes sure the extension isn't longer than 4 digits. */
				break;
				// Matches the second and fourth digits of the number
				case 3:
					// Getting the second and fourth digits of the number
					$second_digit = substr((string)$extension, 1, 1);
					$fourth_digit = substr((string)$extension, 3, 1);
					
					// Creating the regex expression that gets all extensions that end with the same two digits that aren't longer than 4 digits themselves
					$pattern = "/(?=(^[0-9][" . $second_digit . "][0-9][" . $fourth_digit . "]))" . /* This makes sure the second and fourth digits are the same. */
								"(?!([0-9]{5,}))/"; /* This makes sure the extension isn't longer than 4 digits. */
				break;
			}
		}
		// Extension is five digits
		else if ($num_of_digits == 5)
		{
			// Figuring out which pattern is wanted and creating a regex for it
			switch ($pattern_num) {
				// This matches the first three digits
				case 0:
					// Getting the first three digits of the number
					$first_digit = substr((string)$extension, 0, 1);
					$second_digit = substr((string)$extension, 1, 1);
					$third_digit = substr((string)$extension, 2, 1);
					
					// Creating the regex expression that gets all extensions that start with the same first three digits that aren't longer than 5 digits themselves
					$pattern = "/(?=(^[" . $first_digit . "][" . $second_digit . "][" . $third_digit . "][0-9]{2}))/"; /* This makes sure the first three digits are the same. */
																					/* No digit limit is necessary since the max number of digits in an extension is five. */
				break;
				// Matches the last two digits
				case 1:
					// Getting the last three digits of the number
					$third_digit = substr((string)$extension, 2, 1);
					$fourth_digit = substr((string)$extension, 3, 1);
					$fifth_digit = substr((string)$extension, 4, 1);
					
					// Creating the regex expression that gets all extensions that start with the last three digits that aren't longer than 5 digits themselves
					$pattern = "/(?=(^[0-9]{2}[" . $third_digit . "][" . $fourth_digit . "][" . $fifth_digit . "]))/"; /* This makes sure the last three digits are the same. */
																					/* No digit limit is necessary since the max number of digits in an extension is five. */
				break;
				// Matches the first, third, and fifth digit
				case 2:
					// Getting the first, third, and fifth digits of the number
					$first_digit = substr((string)$extension, 0, 1);
					$third_digit = substr((string)$extension, 2, 1);
					$fifth_digit = substr((string)$extension, 4, 1);
					
					// Creating the regex expression that gets all extensions that end with the same first, third, and fifth digits that aren't longer than 5 digits themselves
					$pattern = "/(?=(^[" . $first_digit . "][0-9][" . $third_digit . "][0-9][" . $fifth_digit . "]))/"; /* This makes sure the first, third,a dn fifth digits are the same. */
																					/* No digit limit is necessary since the max number of digits in an extension is five. */
				break;
				// Matches the second and fourth digits of the number
				case 3:
					// Getting the second and fourth digits of the number
					$second_digit = substr((string)$extension, 1, 1);
					$fourth_digit = substr((string)$extension, 3, 1);
					
					// Creating the regex expression that gets all extensions that end with the same second and fourth digits that aren't longer than 5 digits themselves
					$pattern = "/(?=(^[0-9][" . $second_digit . "][0-9][" . $fourth_digit . "][0-9]))/"; /* This makes sure the second and fourth digits are the same. */
																					/* No digit limit is necessary since the max number of digits in an extension is five. */
				break;
			}
		}
		else
		{
			// The extension is too long or non-existant, so return the default "DNE" pattern
		}

		return $pattern;
	}

	// This function returns the name (or kind of a brief decsription) based on the extension given and the pattern number
	function getPatternName($extension, $pattern_num)
	{
		// The pattern
		$pattern_name = "DNE";

		// The pattern number can only be 0 - 3
		// Too low, make it 0
		if ($pattern_num < 0)
		{
			$pattern_num = 0;
		}
		// Too high, make it 3
		else if ($pattern_num > 3)
		{
			$pattern_num = 3;
		}
		
		// We want to find an extension number that matches certain patterns of the given extension. First, we get the number of digits in the extension
		$num_of_digits = strlen((string)$extension);

		// Extension is a single digit
		if ($num_of_digits == 1)
		{
			// Figuring out which pattern is wanted and creating a regex for it
			switch ($pattern_num) {
				// Gets all single digit extensions available
				case 0:
					$pattern_name = "x";
				break;
				// No second pattern
				case 1:
					$pattern_name = "DNE";
				break;
				// No third pattern
				case 2:
					$pattern_name = "DNE";
				break;
				// No fourth pattern
				case 3:
					$pattern_name = "DNE";
				break;
			}
		}
		// Extension is two digits
		else if ($num_of_digits == 2)
		{
			// Figuring out which pattern is wanted and creating a regex for it
			switch ($pattern_num) {
				// Matches the first number
				case 0:
					// Getting the first digit of the number
					$first_digit = substr((string)$extension, 0, 1);

					$pattern_name = $first_digit . "x";
				break;
				// Matches the second number
				case 1:
					// Getting the second digit of the number
					$second_digit = substr((string)$extension, 1, 1);

					$pattern_name = "x" . $second_digit;
				break;
				// No third pattern
				case 2:
					$pattern_name = "DNE";
				break;
				// No fourth pattern
				case 3:
					$pattern_name = "DNE";
				break;
			}
		}
		// Extension is three digits
		else if ($num_of_digits == 3)
		{
			// Figuring out which pattern is wanted and creating a regex for it
			switch ($pattern_num) {
				// Matches the first number
				case 0:
					// Getting the first digit of the number
					$first_digit = substr((string)$extension, 0, 1);

					$pattern_name = $first_digit . "x";
				break;
				// Matches the first and third number
				case 1:
					// Getting the first and third digit of the number
					$first_digit = substr((string)$extension, 0, 1);
					$third_digit = substr((string)$extension, 2, 1);

					$pattern_name = $first_digit . "x" . $third_digit;
				break;
				// Matches the second and third number
				case 2:
					// Getting the second and third digit of the number
					$second_digit = substr((string)$extension, 1, 1);
					$third_digit = substr((string)$extension, 2, 1);

					$pattern_name = "x" . $second_digit . $third_digit;
				break;
				// Matches the third number
				case 3:
					// Getting the third digit of the number
					$third_digit = substr((string)$extension, 2, 1);

					$pattern_name = "xx" . $third_digit;
				break;
			}
		}
		// Extension is four digits
		else if ($num_of_digits == 4)
		{
			// Figuring out which pattern is wanted and creating a regex for it
			switch ($pattern_num) {
				// This matches the first two digits
				case 0:
					// Getting the first two digits of the number
					$first_digit = substr((string)$extension, 0, 1);
					$second_digit = substr((string)$extension, 1, 1);
					
					// Creating the regex expression that gets all extensions that start with the same first two digits that aren't longer than 4 digits themselves
					$pattern_name = $first_digit . $second_digit . "xx";
				break;
				// Matches the last two digits
				case 1:
					// Getting the last two digits of the number
					$third_digit = substr((string)$extension, 2, 1);
					$fourth_digit = substr((string)$extension, 3, 1);
					
					// Creating the regex expression that gets all extensions that end with the same two digits that aren't longer than 4 digits themselves
					$pattern_name = "xx" . $third_digit . $fourth_digit;
				break;
				// Matches the first and third digit
				case 2:
					// Getting the first and third digits of the number
					$first_digit = substr((string)$extension, 0, 1);
					$third_digit = substr((string)$extension, 2, 1);
					
					// Creating the regex expression that gets all extensions that end with the same two digits that aren't longer than 4 digits themselves
					$pattern_name = $first_digit . "x" . $third_digit . "x";
				break;
				// Matches the second and fourth digits of the number
				case 3:
					// Getting the second and fourth digits of the number
					$second_digit = substr((string)$extension, 1, 1);
					$fourth_digit = substr((string)$extension, 3, 1);
					
					// Creating the regex expression that gets all extensions that end with the same two digits that aren't longer than 4 digits themselves
					$pattern_name = "x" . $second_digit . "x" . $fourth_digit;
				break;
			}
		}
		// Extension is five digits
		else if ($num_of_digits == 5)
		{
			// Figuring out which pattern is wanted and creating a regex for it
			switch ($pattern_num) {
				// This matches the first three digits
				case 0:
					// Getting the first three digits of the number
					$first_digit = substr((string)$extension, 0, 1);
					$second_digit = substr((string)$extension, 1, 1);
					$third_digit = substr((string)$extension, 2, 1);
					
					// Creating the regex expression that gets all extensions that start with the same first three digits that aren't longer than 5 digits themselves
					$pattern_name = $first_digit . $second_digit . $third_digit . "xx";
				break;
				// Matches the last two digits
				case 1:
					// Getting the last three digits of the number
					$third_digit = substr((string)$extension, 2, 1);
					$fourth_digit = substr((string)$extension, 3, 1);
					$fifth_digit = substr((string)$extension, 4, 1);
					
					// Creating the regex expression that gets all extensions that start with the last three digits that aren't longer than 5 digits themselves
					$pattern_name = "xx" . $third_digit . $fourth_digit . $fifth_digit;
				break;
				// Matches the first, third, and fifth digit
				case 2:
					// Getting the first, third, and fifth digits of the number
					$first_digit = substr((string)$extension, 0, 1);
					$third_digit = substr((string)$extension, 2, 1);
					$fifth_digit = substr((string)$extension, 4, 1);
					
					// Creating the regex expression that gets all extensions that end with the same first, third, and fifth digits that aren't longer than 5 digits themselves
					$pattern_name = $first_digit . "x" . $third_digit . "x" . $fifth_digit;
				break;
				// Matches the second and fourth digits of the number
				case 3:
					// Getting the second and fourth digits of the number
					$second_digit = substr((string)$extension, 1, 1);
					$fourth_digit = substr((string)$extension, 3, 1);
					
					// Creating the regex expression that gets all extensions that end with the same second and fourth digits that aren't longer than 5 digits themselves
					$pattern_name = "x" . $second_digit . "x" . $fourth_digit . "x";
				break;
			}
		}
		else
		{
			// The extension is too long or non-existant, so return the default "DNE" pattern
		}

		return $pattern_name;
	}

	// This function simply adds a set number of breaks to the bottom of a page (that the bottom contents aren't right up against the bottom)
	function addSpaceToBottom($number_of_breaks = 1)
	{
		// If the input isn't numeric, we just return without doing anything.
		// We also return if the number is negative or 0
		if (!is_numeric($number_of_breaks) || $number_of_breaks < 1)
		{
			return;
		}

		// Printing out the number of breaks that was sent in (default 1)
		for ($i = 0; $i < $number_of_breaks; ++$i)
		{
			print "<br>";
		}
	}

?>





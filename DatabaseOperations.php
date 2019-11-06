<!--

	This file contains all of the functions related to modifying or viewing the database.

-->

<!-- Include files. -->
<?php

	include 'OperationsHelperFunctions.php';

?>


<!-- Functions -->
<?php

	// This function displays the entire table given a table name
	function displayOrModifyTable($table_name, $specified_query = "DNE")
	{		
		// Getting the query
		$query = "";
		if (strcmp($specified_query, "DNE") == 0) // If there's no specified query, just get everything from the table
		{
			$query = "SELECT * FROM " . $table_name;
		}
		else // If there's a specified query, match it to do what the user wants
		{
			$query = $specified_query;
		}
		
		// Getting the result of the query
		$result = performQuery($query);
		// The query is already checked for an error in performQuery(), so we don't need to check it again (I think)
		
		// This section only matters if the query selected something. Otherwise, warning is thrown
		if (strcmp(substr($query, 0, 6), "SELECT") == 0)
		{
			// This gets the array of the first row of data in the table
			$row = mysqli_fetch_array($result);
			
			// This gets the number of fields in the table
			$num_fields = mysqli_num_fields($result);
		}
		
		// If the result of the query was nothing, then nothing needs to be displayed
		if (!empty($row))
		{
			// Display the table name
			print "<center><p>" . $table_name . "</p></center>";
			
			// This gets all of the keys, but not the data, from the row
			$keys = array_keys($row);
		
			// The start of our table
			print "<table align ='center'>";
			
			// Starting the first row of the table
			print "<tr align = 'center'>";
			
			// Looping through and displaying all of the column keys
			for ($index = 0; $index < $num_fields; $index++)
			{
				// Displaying all of the keys for the columns
				// Using 2 * $index is required because every other value is an integer with the corresponding column number, and we don't care about that
				// Using the + 1 is required because the first index is the integer, and the index following it is the column key
				print "<th>" . $keys[2 * $index + 1] . "</th>";
			}
			
			// Ending the row of column headers
			print "</tr>";
			
			// Getting the number of rows from our table
			$num_rows = mysqli_num_rows($result);

			// Going through each row and displaying all of the data
			for ($row_num = 0; $row_num < $num_rows; $row_num++)
			{
				// Aligning the rows to have the data in the center
				print "<tr align = 'center'>";

				// Getting the values, but not the keys, from the row
				$values = array_values($row);

				// Looping through the data to display all of the values
				for ($index = 0; $index < $num_fields; $index++)
				{
					// Displaying all of the values in the rows
					// Using 2 * $index is required because every other value is an integer with the corresponding column number, and we don't care about that
					// Using the + 1 is required because the first index is the integer, and the index following it is the value
					$value = htmlspecialchars($values[2 * $index + 1]);
					print "<th>" . $value . "</th> ";
				}

				// This marks the end of the table row
				print "</tr>";
				
				// Getting the next row
				$row = mysqli_fetch_array($result);
			}
			
			// Ending the table
			print "</table>";
		}
		
		// Make sure the next thing displayed isn't directly underneath the table
		print "<br>";
	}

	function performInsertOperation()
	{
		// Using all of these global variables
		global $table;
		
		// You can't perform an insert operation on every table (at least not currently), so we block it from happening
		if (strcmp($table, "all") == 0)
		{
			print "<p> Could not perform insert operation. You must select a specific table to insert to.</p>";
		}
		// They picked a specific table
		else
		{
			// Get the query
			$query = constructSpecificInsertQuery($table);
		
			// Perform the query
			displayOrModifyTable($table, $query);
		}
	}
	
	function performSearchOperation()
	{
		// Using the global variable table and the search checkboxes variables
		global $table, $extension_search_checkbox, $type_search_checkbox, $cor_search_checkbox, $tn_search_checkbox, $coverpath_search_checkbox, $name_search_checkbox, $cos_search_checkbox, $port_search_checkbox, $room_search_checkbox, $jack_search_checkbox, $cable_search_checkbox, $floor_search_checkbox, $building_search_checkbox;

		// Declaring the original query
		$originalQuery = "SELECT ";

		// Creating an array with all of the values of the checkboxe stored in it
		$array_of_checkboxes = array($extension_search_checkbox, $type_search_checkbox, $cor_search_checkbox, $tn_search_checkbox, $coverpath_search_checkbox, $name_search_checkbox, $cos_search_checkbox, $port_search_checkbox, $room_search_checkbox, $jack_search_checkbox, $cable_search_checkbox, $floor_search_checkbox, $building_search_checkbox);

		// Bollean value to flip after the first value is added
		$first_value_has_been_added = false;

		// This variable is to make sure they didn't enter anything they were'nt supposed to
		$go_on = true;

		// Going through and adding any to the selection query that were checked
		for ($i = 0; $i < count($array_of_checkboxes); $i = $i + 1)
		{
			// This means the value was changed
			if (strcmp($array_of_checkboxes[$i], "DNE") != 0 && isApplicable($table, $array_of_checkboxes[$i]))
			{
				// Seeing if it's the first value to go into the select statement
				if (!$first_value_has_been_added)
				{
					// Adding the value to the query
					$originalQuery = $originalQuery . $array_of_checkboxes[$i];

					// Setting the variable to say that the first value has already been added
					$first_value_has_been_added = true;
				}
				// This means that there is already a value in the query
				else
				{
					$originalQuery = $originalQuery . ", " . $array_of_checkboxes[$i];
				}
			}
			// If the code goes in here, they checked something they weren't supposed to
			else if (strcmp($array_of_checkboxes[$i], "DNE") == 0 && !isApplicable($table, $array_of_checkboxes[$i]))
			{
				$go_on = false;
			}
		}

		// If they're not meant to go on
		if (!$go_on)
		{
			print "<p> Error. You checked a box you weren't supposed to. </p>";
			return;
		}

		// If none of the checkboxes were selected
		if (!$first_value_has_been_added)
		{
			$originalQuery = "SELECT * FROM ";
		}
		// At least one box was checked
		else
		{
			$originalQuery = $originalQuery . " FROM ";
		}
		
		// The base of the query
		$query = $originalQuery;
		
		// They are searching every table
		if (strcmp($table, "all") == 0)
		{
			// Getting all of the table names
			$table_names = getTableNames();
			
			// Searching and displaying the results of each table, one at a time
			for ($x = 0; $x < count($table_names); $x++)
			{
				// Honing the query in on a specific table
				$query = $query . $table_names[$x];
				
				// Construct the specific query needed
				$query = constructSpecificViewOrDeleteOrUpdateQuery($table_names[$x], $query);
				
				// Getting the results of the query
				displayOrModifyTable($table_names[$x], $query);
				
				// Resetting $query
				$query = $originalQuery;
			}
		}
		// They are searching one table
		else
		{
			// Honing the query in on the correct table
			$query = $query . $table;
			
			// Construct the specific query needed
			$query = constructSpecificViewOrDeleteOrUpdateQuery($table, $query);
			
			// Getting the results of the query
			displayOrModifyTable($table, $query);
		}
	}
	
	function performDeleteOperation()
	{
		// Using the global variable table
		global $table;
		
		// The base of the query
		$query = "DELETE FROM ";
		
		// They are deleting something from every table
		if (strcmp($table, "all") == 0)
		{
			// Getting all of the table names
			$table_names = getTableNames();
			
			// Searching and displaying the results of each table, one at a time
			for ($x = 0; $x < count($table_names); $x++)
			{
				// Honing the query in on a specific table
				$query = $query . $table_names[$x];
				
				// Construct the specific query needed
				$query = constructSpecificViewOrDeleteOrUpdateQuery($table_names[$x], $query);
				
				// Getting the results of the query
				displayOrModifyTable($table, $query);
				
				// Resetting $query
				$query = "DELETE FROM ";
			}
		}
		// They are deleting from one table
		else
		{
			// Honing the query in on the correct table
			$query = $query . $table;
			
			// Construct the specific query needed
			$query = constructSpecificViewOrDeleteOrUpdateQuery($table, $query);
			
			// Getting the results of the query
			displayOrModifyTable($table, $query);
		}
	}
	
	function performUpdateOperation()
	{
		// Using the global variable table
		global $table;
		
		// The base of the query
		$query = "UPDATE ";
		
		// They are updating something from every table
		if (strcmp($table, "all") == 0)
		{
			// Getting all of the table names
			$table_names = getTableNames();
			
			// Searching and displaying the results of each table, one at a time
			for ($x = 0; $x < count($table_names); $x++)
			{
				// Honing the query in on the correct table
				$query = $query . $table_names[$x];
				
				// Construct the SET portion of the query
				$query = constructSetPortionOfUpdateQuery($table_names[$x], $query);
				
				// Construct the specific query needed
				$query = constructSpecificViewOrDeleteOrUpdateQuery($table_names[$x], $query);
				
				// If the query has the word "FALSE" in it, then they tried updating an attribute that wasn't in the table they specified
				if (strpos($query, "FALSE"))
				{
					print "<p> You tried to update something that wasn't in the table " . $table_names[$x] . ". Try again. </p>";
				}
				// Every attribute they tried updating was appropriate
				else
				{
					// Getting the results of the query
					displayOrModifyTable($table_names[$x], $query);
				}
				
				// Reset the query
				$query = "UPDATE ";
			}
		}
		// They are updating from one table
		else
		{
			// Honing the query in on the correct table
			$query = $query . $table;
			
			// Construct the SET portion of the query
			$query = constructSetPortionOfUpdateQuery($table, $query);
			
			// Construct the specific query needed
			$query = constructSpecificViewOrDeleteOrUpdateQuery($table, $query);
			
			// If the query has the word "FALSE" in it, then they tried updating an attribute that wasn't in the table they specified
			if (strpos($query, "FALSE"))
			{
				print "<p> You tried to update something that wasn't in the table " . $table . ". Try again. </p>";
			}
			// Every attribute they tried updating was appropriate
			else
			{
				// Getting the results of the query
				displayOrModifyTable($table, $query);
			}
		}
	}
	
	function performViewOperation()
	{
		// Using the global variable $table in this function
		global $table;
		
		// The base of the query
		$query = "SELECT * FROM ";
		
		// Making sure the $table variable has been modified
		if (isModified($table))
		{
			// Getting all of the table names
			$table_names = getTableNames();
			
			// The user wants to see every table
			if (strcmp($table, "all") == 0)
			{
				// Displaying each table, one at a time
				for ($x = 0; $x < count($table_names); $x++)
				{
					// Honing the query in on a specific table
					$query = $query . $table_names[$x];
					
					// Construct the specific query needed
					$query = constructSpecificViewOrDeleteOrUpdateQuery($table_names[$x], $query);
					
					// Getting the results of the query
					displayOrModifyTable($table_names[$x], $query);
					
					// Resetting $query
					$query = "SELECT * FROM ";
				}
			}
			// The user wants to see one specific table
			else
			{
				// Going through each table to find the one the user wants
				for ($x = 0; $x < count($table_names); $x++)
				{
					// If it's the table the user wants, display it. Otherwise, keep going
					if (strcmp($table, $table_names[$x]) == 0)
					{
						// Honing the query in on a specific table
						$query = $query . $table_names[$x];
						
						// Construct the specific query needed
						$query = constructSpecificViewOrDeleteOrUpdateQuery($table_names[$x], $query);
						
						// Getting the results of the query
						displayOrModifyTable($table_names[$x], $query);
					}
				}
			}
		}
	}

?>










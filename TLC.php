<!--

This is the TLC page for Devin Hopkins and Tristan Hess' database management term project.

-->

<html>
	<head>
		<meta charset = "utf-8">
		<title> TLC Page </title>
		<style type = "text/css">
		
			/* Our table border style */
			td, th, table {
				border: thin solid black;
			}
			
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
		
		// WRITE WHAT WE WANT THE HELP WINDOW TO DISPLAY HERE, STILL NEED TO DO
		
		// This is opening the new window with all of the differences added
		helpWindow = window.open("", "Help Page", "width=2000,height=500");
		helpWindow.document.write(helpPage);
		
		// This resets the page variable, and thus resets the window
		helpPage = "<h1> Help Page </h1>";
	}

</script>

<!-- Receiving previous page's information -->
<?php
	
	// Setting all of the variables in case they aren't defined
	$operation = "DNE";
	$table = "DNE";
	$extension = "DNE";
	$type = "DNE";
	$cor = "DNE";
	$tn = "DNE";
	$coverpath = "DNE";
	$name = "DNE";
	$cos = "DNE";
	$port = "DNE";
	$room = "DNE";
	$jack = "DNE";
	$cable = "DNE";
	$floor = "DNE";
	$building = "DNE";
	
	// This section goes through and grabs all of the variables that are defined (not including the updated ones)
	// operation
	if (isset($_POST["operation"]))
	{
		$operation = $_POST["operation"];
	}
	// table
	if (isset($_POST["table"]))
	{
		$table = $_POST["table"];
	}
	// extension
	if (isset($_POST["extension"]))
	{
		$extension = $_POST["extension"];
	}
	// type
	if (isset($_POST["type"]))
	{
		$type = $_POST["type"];
	}
	// cor
	if (isset($_POST["cor"]))
	{
		$cor = $_POST["cor"];
	}
	// tn
	if (isset($_POST["tn"]))
	{
		$tn = $_POST["tn"];
	}
	// coverpath
	if (isset($_POST["coverpath"]))
	{
		$coverpath = $_POST["coverpath"];
	}
	// name
	if (isset($_POST["name"]))
	{
		$name = $_POST["name"];
	}
	// cos
	if (isset($_POST["cos"]))
	{
		$cos = $_POST["cos"];
	}
	// port
	if (isset($_POST["port"]))
	{
		$port = $_POST["port"];
	}
	// room
	if (isset($_POST["room"]))
	{
		$room = $_POST["room"];
	}
	// jack
	if (isset($_POST["jack"]))
	{
		$jack = $_POST["jack"];
	}
	// cable
	if (isset($_POST["cable"]))
	{
		$cable = $_POST["cable"];
	}
	// floor
	if (isset($_POST["floor"]))
	{
		$floor = $_POST["floor"];
	}
	// building
	if (isset($_POST["building"]))
	{
		$building = $_POST["building"];
	}
	
	// Setting all of the update variables in case they aren't defined
	$extension_update = "DNE";
	$type_update = "DNE";
	$cor_update = "DNE";
	$tn_update = "DNE";
	$coverpath_update = "DNE";
	$name_update = "DNE";
	$cos_update = "DNE";
	$port_update = "DNE";
	$room_update = "DNE";
	$jack_update = "DNE";
	$cable_update = "DNE";
	$floor_update = "DNE";
	$building_update = "DNE";
	
	// This section goes through and grabs all of the variables that are defined (only the update ones)
	// extension_update
	if (isset($_POST["extension_update"]))
	{
		$extension_update = $_POST["extension_update"];
	}
	// type_update
	if (isset($_POST["type_update"]))
	{
		$type_update = $_POST["type_update"];
	}
	// cor_update
	if (isset($_POST["cor_update"]))
	{
		$cor_update = $_POST["cor_update"];
	}
	// tn_update
	if (isset($_POST["tn_update"]))
	{
		$tn_update = $_POST["tn_update"];
	}
	// coverpath_update
	if (isset($_POST["coverpath_update"]))
	{
		$coverpath_update = $_POST["coverpath_update"];
	}
	// name_update
	if (isset($_POST["name_update"]))
	{
		$name_update = $_POST["name_update"];
	}
	// cos_update
	if (isset($_POST["cos_update"]))
	{
		$cos_update = $_POST["cos_update"];
	}
	// port_update
	if (isset($_POST["port_update"]))
	{
		$port_update = $_POST["port_update"];
	}
	// room_update
	if (isset($_POST["room_update"]))
	{
		$room_update = $_POST["room_update"];
	}
	// jack_update
	if (isset($_POST["jack_update"]))
	{
		$jack_update = $_POST["jack_update"];
	}
	// cable_update
	if (isset($_POST["cable_update"]))
	{
		$cable_update = $_POST["cable_update"];
	}
	// floor_update
	if (isset($_POST["floor_update"]))
	{
		$floor_update = $_POST["floor_update"];
	}
	// building_update
	if (isset($_POST["building_update"]))
	{
		$building_update = $_POST["building_update"];
	}

	// TESTING
	// Use if you want to see the values of all of the variables gathered before the page displayed
	/*print "<p> operation:" . $operation . ":</p>";
	print "<p> table:" . $table . ":</p>";
	print "<p> extension:" . $extension . ":</p>";
	print "<p> type:" . $type . ":</p>";
	print "<p> cor:" . $cor . ":</p>";
	print "<p> tn:" . $tn . ":</p>";
	print "<p> coverpath:" . $coverpath . ":</p>";
	print "<p> name:" . $name . ":</p>";
	print "<p> cos:" . $cos . ":</p>";
	print "<p> port:" . $port . ":</p>";
	print "<p> room:" . $room . ":</p>";
	print "<p> jack:" . $jack . ":</p>";
	print "<p> cable:" . $cable . ":</p>";
	print "<p> floor:" . $floor . ":</p>";
	print "<p> building:" . $building . ":</p>";
	print "<p> operation_update:" . $operation_update . ":</p>";
	print "<p> table_update:" . $table_update . ":</p>";
	print "<p> extension_update:" . $extension_update . ":</p>";
	print "<p> type_update:" . $type_update . ":</p>";
	print "<p> cor_update:" . $cor_update . ":</p>";
	print "<p> tn_update:" . $tn_update . ":</p>";
	print "<p> coverpath:" . $coverpath . ":</p>";
	print "<p> name_update:" . $name_update . ":</p>";
	print "<p> cos_update:" . $cos_update . ":</p>";
	print "<p> port_update:" . $port_update . ":</p>";
	print "<p> room_update:" . $room_update . ":</p>";
	print "<p> jack_update:" . $jack_update . ":</p>";
	print "<p> cable_update:" . $cable_update . ":</p>";
	print "<p> floor_update:" . $floor_update . ":</p>";
	print "<p> building_update:" . $building_update . ":</p>";*/
	
?>

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
	
	// Determines the operation being performed and performs it
	function determineOperation()
	{
		// Using the global variable $operation in this function
		global $operation;
		
		// Making sure they actually selected an operation
		if (strcmp($operation, "DNE") != 0)
		{
			if (strcmp($operation, "view") == 0)
			{
				// Performs the view operation
				performViewOperation();
			}
			else if (strcmp($operation, "insert") == 0)
			{
				// Performs the insert operation
				performInsertOperation();
			}
			else if (strcmp($operation, "search") == 0)
			{
				// Performs the search operation
				performSearchOperation();
			}
			else if (strcmp($operation, "update") == 0)
			{
				// Performs the update operation
				performUpdateOperation();
			}
			else if (strcmp($operation, "delete") == 0)
			{
				// Performs the delete operation
				performDeleteOperation();
			}
		}
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
		// Using the global variable table
		global $table;
		
		// The base of the query
		$query = "SELECT * FROM ";
		
		if (strcmp($table, "all") == 0) // They are searching every table
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
				$query = "SELECT * FROM ";
			}
		}
		else // They are searching one table
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
		
		if (strcmp($table, "all") == 0) // They are deleting something from every table
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
		else // They are deleting from one table
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
		
		if (strcmp($table, "all") == 0) // They are updating something from every table
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
		else // They are updating from one table
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
			
			if (strcmp($table, "all") == 0) // The user wants to see every table
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
			else // The user wants to see one specific table
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
	
	function constructSetPortionOfUpdateQuery($table, $query)
	{
		// Using all of these global variables
		global $extension_update, $type_update, $cor_update, $tn_update, $coverpath_update, $name_update, $cos_update, $port_update, $room_update, $jack_update, $cable_update, $floor_update, $building_update;
		
		// Making sure we know when we've already done one addition to the query
		$first_addition = false;
		
		// The next part of the query
		$query = $query . " SET ";
		
		// extension_update
		if (isModified($extension_update))
		{
			$first_addition = true;
			$query = $query . "extension = " . $extension_update;
		}
		
		// type_update
		if(isModified($type_update))
		{
			if ($first_addition) // It's not the first addition
			{
				$query = $query . " AND type = \"" . $type_update . "\"";
			}
			else // It is the first addition
			{
				$first_addition = true;
				$query = $query . "type = \"" . $type_update . "\"";
			}
		}
		
		// cor_update
		if(isModified($cor_update) && strcmp($the_table, "export") != 0)
		{
			if ($first_addition) // It's not the first addition
			{
				$query = $query . " AND cor = " . $cor_update;
			}
			else // It is the first addition
			{
				$first_addition = true;
				$query = $query . "cor = " . $cor_update;
			}
		}
		else if (isModified($cor_update) && strcmp($the_table, "export") == 0) // If the issue was that the table doesn't contain the column searched for, the query is tanked
		{
			$query = $query . " FAKE ";
		}
		
		// tn_update
		if(isModified($tn_update) && strcmp($the_table, "export") != 0)
		{
			if ($first_addition) // It's not the first addition
			{
				$query = $query . " AND tn = " . $tn_update;
			}
			else // It is the first addition
			{
				$first_addition = true;
				$query = $query . "tn = " . $tn_update;
			}
		}
		else if (isModified($tn_update) && strcmp($the_table, "export") == 0) // If the issue was that the table doesn't contain the column searched for, the query is tanked
		{
			$query = $query . " FAKE ";
		}
		
		// coverpath_update
		if(isModified($coverpath_update) && strcmp($the_table, "export") != 0)
		{
			if ($first_addition) // It's not the first addition
			{
				$query = $query . " AND coverpath = \"" . $coverpath_update . "\"";
			}
			else // It is the first addition
			{
				$first_addition = true;
				$query = $query . "coverpath = \"" . $coverpath_update . "\"";
			}
		}
		else if (isModified($coverpath_update) && strcmp($the_table, "export") == 0) // If the issue was that the table doesn't contain the column searched for, the query is tanked
		{
			$query = $query . " FAKE ";
		}
		
		// name_update
		if(isModified($name_update))
		{
			if ($first_addition) // It's not the first addition
			{
				$query = $query . " AND name = \"" . $name_update . "\"";
			}
			else // It is the first addition
			{
				$first_addition = true;
				$query = $query . "name = \"" . $name_update . "\"";
			}
		}
		
		// cos_update
		if(isModified($cos_update) && strcmp($the_table, "export") != 0)
		{
			if ($first_addition) // It's not the first addition
			{
				$query = $query . " AND cos = " . $cos_update;
			}
			else // It is the first addition
			{
				$first_addition = true;
				$query = $query . "cos = " . $cos_update;
			}
		}
		else if (isModified($cos_update) && strcmp($the_table, "export") == 0) // If the issue was that the table doesn't contain the column searched for, the query is tanked
		{
			$query = $query . " FAKE ";
		}
		
		// port_update
		if(isModified($port_update) && strcmp($the_table, "akron") != 0 && strcmp($the_table, "wayne") != 0)
		{
			if ($first_addition) // It's not the first addition
			{
				$query = $query . " AND port = \"" . $port_update . "\"";
			}
			else // It is the first addition
			{
				$first_addition = true;
				$query = $query . "port = \"" . $port_update . "\"";
			}
		}
		else if (isModified($port_update) && (strcmp($the_table, "akron") == 0 || strcmp($the_table, "wayne") == 0)) // If the issue was that the table doesn't contain the column searched for, the query is tanked
		{
			$query = $query . " FAKE ";
		}
		
		// room_update
		if(isModified($room_update) && strcmp($the_table, "akron") != 0 && strcmp($the_table, "wayne") != 0)
		{
			if ($first_addition) // It's not the first addition
			{
				$query = $query . " AND room = \"" . $room_update . "\"";
			}
			else // It is the first addition
			{
				$first_addition = true;
				$query = $query . "room = \"" . $room_update . "\"";
			}
		}
		else if (isModified($room_update) && (strcmp($the_table, "akron") == 0 || strcmp($the_table, "wayne") == 0)) // If the issue was that the table doesn't contain the column searched for, the query is tanked
		{
			$query = $query . " FAKE ";
		}
		
		// jack_update
		if(isModified($jack_update) && strcmp($the_table, "akron") != 0 && strcmp($the_table, "wayne") != 0)
		{
			if ($first_addition) // It's not the first addition
			{
				$query = $query . " AND jack = \"" . $jack_update . "\"";
			}
			else // It is the first addition
			{
				$first_addition = true;
				$query = $query . "jack = \"" . $jack_update . "\"";
			}
		}
		else if (isModified($jack_update) && (strcmp($the_table, "akron") == 0 || strcmp($the_table, "wayne") == 0)) // If the issue was that the table doesn't contain the column searched for, the query is tanked
		{
			$query = $query . " FAKE ";
		}
		
		// cable_update
		if(isModified($cable_update) && strcmp($the_table, "akron") != 0 && strcmp($the_table, "wayne") != 0)
		{
			if ($first_addition) // It's not the first addition
			{
				$query = $query . " AND cable = \"" . $cable_update . "\"";
			}
			else // It is the first addition
			{
				$first_addition = true;
				$query = $query . "cable = \"" . $cable_update . "\"";
			}
		}
		else if (isModified($cable_update) && (strcmp($the_table, "akron") == 0 || strcmp($the_table, "wayne") == 0)) // If the issue was that the table doesn't contain the column searched for, the query is tanked
		{
			$query = $query . " FAKE ";
		}
		
		// floor_update
		if(isModified($floor_update) && strcmp($the_table, "akron") != 0 && strcmp($the_table, "wayne") != 0)
		{
			if ($first_addition) // It's not the first addition
			{
				$query = $query . " AND floor = \"" . $floor_update . "\"";
			}
			else // It is the first addition
			{
				$first_addition = true;
				$query = $query . "floor = \"" . $floor_update . "\"";
			}
		}
		else if (isModified($floor_update) && (strcmp($the_table, "akron") == 0 || strcmp($the_table, "wayne") == 0)) // If the issue was that the table doesn't contain the column searched for, the query is tanked
		{
			$query = $query . " FAKE ";
		}
		
		// building_update
		if(isModified($building_update) && strcmp($the_table, "akron") != 0 && strcmp($the_table, "wayne") != 0)
		{
			if ($first_addition) // It's not the first addition
			{
				$query = $query . " AND building = \"" . $building_update . "\"";
			}
			else // It is the first addition
			{
				$query = $query . "building = \"" . $building_update . "\"";
			}
		}
		else if (isModified($building_update) && (strcmp($the_table, "akron") == 0 || strcmp($the_table, "wayne") == 0)) // If the issue was that the table doesn't contain the column searched for, the query is tanked
		{
			$query = $query . " FAKE ";
		}
		
		// Return the constructed query
		return $query;
	}
	
	function constructSpecificInsertQuery($table)
	{
		// Using all of these global variables
		global $extension, $type, $cor, $tn, $coverpath, $name, $cos, $port, $room, $jack, $cable, $floor, $building;
		
		// Creating the beginning of the query (part 1)
		$query_part_one = "INSERT INTO " . $table . "(";

		// Creating the beginning of the second part of the query (part 2)
		$query_part_two = " VALUES (";
		
		// Keeping track of if anything was added
		$adding_something = false;

		// If they didn't specify something that was required, this keeps track of it
		$missing_required = false;
		
		if (strcmp($table, "akron") == 0) // Inserting into the akron table
		{
			// extension
			if (isModified($extension))
			{
				$adding_something = true;
				$query_part_one = $query_part_one . "extension,";
				$query_part_two = $query_part_two . $extension . ",";
			}
			else // They didn't insert a necessary piece of information
			{
				$missing_required = true;
			}
			
			// type
			if (isModified($type))
			{
				$adding_something = true;
				$query_part_one = $query_part_one . "type,";
				$query_part_two = $query_part_two . "\"" . $type . "\",";
			}else // They didn't insert a necessary piece of information
			{
				$missing_required = true;
			}
			
			// cor
			if (isModified($cor))
			{
				$adding_something = true;
				$query_part_one = $query_part_one . "cor,";
				$query_part_two = $query_part_two . $cor . ",";
			}
			
			// tn
			if (isModified($tn))
			{
				$adding_something = true;
				$query_part_one = $query_part_one . "tn,";
				$query_part_two = $query_part_two . $tn . ",";
			}
			
			// coverpath
			if (isModified($coverpath))
			{
				$adding_something = true;
				$query_part_one = $query_part_one . "coverpath,";
				$query_part_two = $query_part_two . "\"" . $coverpath . "\",";
			}
			
			// name
			if (isModified($name))
			{
				$adding_something = true;
				$query_part_one = $query_part_one . "name,";
				$query_part_two = $query_part_two . "\"" . $name . "\",";
			}
			
			// cos
			if (isModified($cos))
			{
				$adding_something = true;
				$query_part_one = $query_part_one . "cos,";
				$query_part_two = $query_part_two . $cos . ",";
			}
		}
		else if (strcmp($table, "wayne") == 0) // Inserting into the wayne table
		{
			// extension
			if (isModified($extension))
			{
				$adding_something = true;
				$query_part_one = $query_part_one . "extension,";
				$query_part_two = $query_part_two . $extension . ",";
			}
			else // They didn't insert a necessary piece of information
			{
				$missing_required = true;
			}
			
			// type
			if (isModified($type))
			{
				$adding_something = true;
				$query_part_one = $query_part_one . "type,";
				$query_part_two = $query_part_two . "\"" . $type . "\",";
			}
			else // They didn't insert a necessary piece of information
			{
				$missing_required = true;
			}
			
			// name
			if (isModified($name))
			{
				$adding_something = true;
				$query_part_one = $query_part_one . "name,";
				$query_part_two = $query_part_two . "\"" . $name . "\",";
			}
			
			// cor
			if (isModified($cor))
			{
				$adding_something = true;
				$query_part_one = $query_part_one . "cor,";
				$query_part_two = $query_part_two . $cor . ",";
			}
			
			// tn
			if (isModified($tn))
			{
				$adding_something = true;
				$query_part_one = $query_part_one . "tn,";
				$query_part_two = $query_part_two . $tn . ",";
			}
			
			// coverpath
			if (isModified($coverpath))
			{
				$adding_something = true;
				$query_part_one = $query_part_one . "coverpath,";
				$query_part_two = $query_part_two . "\"" . $coverpath . "\",";
			}
			
			// cos
			if (isModified($cos))
			{
				$adding_something = true;
				$query_part_one = $query_part_one . "cos,";
				$query_part_two = $query_part_two . $cos . ",";
			}
		}
		else if (strcmp($table, "export") == 0) // Inserting into the export table
		{
			// extension
			if (isModified($extension))
			{
				$adding_something = true;
				$query_part_one = $query_part_one . "extension,";
				$query_part_two = $query_part_two . $extension . ",";
			}
			else // They didn't insert a necessary piece of information
			{
				$missing_required = true;
			}
			
			// type
			if (isModified($type))
			{
				$adding_something = true;
				$query_part_one = $query_part_one . "type,";
				$query_part_two = $query_part_two . "\"" . $type . "\",";
			}
			else // They didn't insert a necessary piece of information
			{
				$missing_required = true;
			}
			
			// port
			if (isModified($port))
			{
				$adding_something = true;
				$query_part_one = $query_part_one . "port,";
				$query_part_two = $query_part_two . "\"" . $port . "\",";
			}
			
			// name
			if (isModified($name))
			{
				$adding_something = true;
				$query_part_one = $query_part_one . "name,";
				$query_part_two = $query_part_two . "\"" . $name . "\",";
			}
			
			// room
			if (isModified($room))
			{
				$adding_something = true;
				$query_part_one = $query_part_one . "room,";
				$query_part_two = $query_part_two . "\"" . $room . "\",";
			}
			
			// jack
			if (isModified($jack))
			{
				$adding_something = true;
				$query_part_one = $query_part_one . "jack,";
				$query_part_two = $query_part_two . "\"" . $jack . "\",";
			}
			
			// cable
			if (isModified($cable))
			{
				$adding_something = true;
				$query_part_one = $query_part_one . "cable,";
				$query_part_two = $query_part_two . "\"" . $cable . "\",";
			}
			
			// floor
			if (isModified($floor))
			{
				$adding_something = true;
				$query_part_one = $query_part_one . "floor,";
				$query_part_two = $query_part_two . "\"" . $floor . "\",";
			}
			
			// building
			if (isModified($building))
			{
				$adding_something = true;
				$query_part_one = $query_part_one . "building,";
				$query_part_two = $query_part_two . "\"" . $building . "\",";
			}
		}
		// They somehow are trying to edit a table that doesn't exist
		else
		{
			// Letting the user know what they did
			print "<p>A table that doesn't exist was provided for the \"Insert Query\" method.</p>";

			// Sets the query to a default query so the page doesn't error out
			$query = "SELECT * FROM akron";
		}
		
		// Finishing off the two query parts
		$query_part_one = substr($query_part_one, 0, strlen($query_part_one) - 1) . ")";
		$query_part_two = substr($query_part_two, 0, strlen($query_part_two) - 1) . ");";
		
		// Making sure everything is as it should be
		if (!$adding_something) // Nothing was actually added, the insert function was just called
		{
			// To prevent an error message
			$query_part_one = "SELECT * FROM";
			$query_part_two = " akron";
			
			// Letting the user know they didn't acutally give anything to insert
			print "<p> Nothing was filled out in the text boxes. Therefore, nothing was inserted. </p>";
		}
		else if ($missing_required) // They didn't insert a necessary piece of information
		{
			// To prevent an error message
			$query_part_one = "SELECT * FROM";
			$query_part_two = " akron";
			
			// Letting the user know they didn't acutally give anything to insert
			print "<p> Please make sure that both type and extension are given a value. </p>";
		}
		
		// Returning both parts put together as one big query
		return ($query_part_one . $query_part_two);
	}
	
	function constructSpecificViewOrDeleteOrUpdateQuery($the_table, $query)
	{
		// Using all of these global variables
		global $extension, $type, $cor, $tn, $coverpath, $name, $cos, $port, $room, $jack, $cable, $floor, $building;
		
		// Making sure we know when we've already done one addition to the query
		$first_addition = false;
		
		// extension
		if (isModified($extension))
		{
			$first_addition = true;
			$query = $query . " WHERE extension = " . $extension;
		}
		
		// type
		if(isModified($type))
		{
			if ($first_addition) // It's not the first addition
			{
				$query = $query . " AND type = \"" . $type . "\"";
			}
			else // It is the first addition
			{
				$first_addition = true;
				$query = $query . " WHERE type = \"" . $type . "\"";
			}
		}
		
		// cor
		if(isModified($cor) && strcmp($the_table, "export") != 0)
		{
			if ($first_addition) // It's not the first addition
			{
				$query = $query . " AND cor = " . $cor;
			}
			else // It is the first addition
			{
				$first_addition = true;
				$query = $query . " WHERE cor = " . $cor;
			}
		}
		else if (isModified($cor) && strcmp($the_table, "export") == 0) // If the issue was that the table doesn't contain the column searched for, the query is tanked
		{
			if ($first_addition) // It's not the first addition
			{
				$query = $query . " AND extension = -1";
			}
			else // It is the first addition
			{
				$first_addition = true;
				$query = $query . " WHERE extension = -1";
			}
		}
		
		// tn
		if(isModified($tn) && strcmp($the_table, "export") != 0)
		{
			if ($first_addition) // It's not the first addition
			{
				$query = $query . " AND tn = " . $tn;
			}
			else // It is the first addition
			{
				$first_addition = true;
				$query = $query . " WHERE tn = " . $tn;
			}
		}
		else if (isModified($tn) && strcmp($the_table, "export") == 0) // If the issue was that the table doesn't contain the column searched for, the query is tanked
		{
			if ($first_addition) // It's not the first addition
			{
				$query = $query . " AND extension = -1";
			}
			else // It is the first addition
			{
				$first_addition = true;
				$query = $query . " WHERE extension = -1";
			}
		}
		
		// coverpath
		if(isModified($coverpath) && strcmp($the_table, "export") != 0)
		{
			if ($first_addition) // It's not the first addition
			{
				$query = $query . " AND coverpath = \"" . $coverpath . "\"";
			}
			else // It is the first addition
			{
				$first_addition = true;
				$query = $query . " WHERE coverpath = \"" . $coverpath . "\"";
			}
		}
		else if (isModified($coverpath) && strcmp($the_table, "export") == 0) // If the issue was that the table doesn't contain the column searched for, the query is tanked
		{
			if ($first_addition) // It's not the first addition
			{
				$query = $query . " AND extension = -1";
			}
			else // It is the first addition
			{
				$first_addition = true;
				$query = $query . " WHERE extension = -1";
			}
		}
		
		// name
		if(isModified($name))
		{
			if ($first_addition) // It's not the first addition
			{
				$query = $query . " AND name = \"" . $name . "\"";
			}
			else // It is the first addition
			{
				$first_addition = true;
				$query = $query . " WHERE name = \"" . $name . "\"";
			}
		}
		
		// cos
		if(isModified($cos) && strcmp($the_table, "export") != 0)
		{
			if ($first_addition) // It's not the first addition
			{
				$query = $query . " AND cos = " . $cos;
			}
			else // It is the first addition
			{
				$first_addition = true;
				$query = $query . " WHERE cos = " . $cos;
			}
		}
		else if (isModified($cos) && strcmp($the_table, "export") == 0) // If the issue was that the table doesn't contain the column searched for, the query is tanked
		{
			if ($first_addition) // It's not the first addition
			{
				$query = $query . " AND extension = -1";
			}
			else // It is the first addition
			{
				$first_addition = true;
				$query = $query . " WHERE extension = -1";
			}
		}
		
		// port
		if(isModified($port) && strcmp($the_table, "akron") != 0 && strcmp($the_table, "wayne") != 0)
		{
			if ($first_addition) // It's not the first addition
			{
				$query = $query . " AND port = \"" . $port . "\"";
			}
			else // It is the first addition
			{
				$first_addition = true;
				$query = $query . " WHERE port = \"" . $port . "\"";
			}
		}
		else if (isModified($port) && (strcmp($the_table, "akron") == 0 || strcmp($the_table, "wayne") == 0)) // If the issue was that the table doesn't contain the column searched for, the query is tanked
		{
			if ($first_addition) // It's not the first addition
			{
				$query = $query . " AND extension = -1";
			}
			else // It is the first addition
			{
				$first_addition = true;
				$query = $query . " WHERE extension = -1";
			}
		}
		
		// room
		if(isModified($room) && strcmp($the_table, "akron") != 0 && strcmp($the_table, "wayne") != 0)
		{
			if ($first_addition) // It's not the first addition
			{
				$query = $query . " AND room = \"" . $room . "\"";
			}
			else // It is the first addition
			{
				$first_addition = true;
				$query = $query . " WHERE room = \"" . $room . "\"";
			}
		}
		else if (isModified($room) && (strcmp($the_table, "akron") == 0 || strcmp($the_table, "wayne") == 0)) // If the issue was that the table doesn't contain the column searched for, the query is tanked
		{
			if ($first_addition) // It's not the first addition
			{
				$query = $query . " AND extension = -1";
			}
			else // It is the first addition
			{
				$first_addition = true;
				$query = $query . " WHERE extension = -1";
			}
		}
		
		// jack
		if(isModified($jack) && strcmp($the_table, "akron") != 0 && strcmp($the_table, "wayne") != 0)
		{
			if ($first_addition) // It's not the first addition
			{
				$query = $query . " AND jack = \"" . $jack . "\"";
			}
			else // It is the first addition
			{
				$first_addition = true;
				$query = $query . " WHERE jack = \"" . $jack . "\"";
			}
		}
		else if (isModified($jack) && (strcmp($the_table, "akron") == 0 || strcmp($the_table, "wayne") == 0)) // If the issue was that the table doesn't contain the column searched for, the query is tanked
		{
			if ($first_addition) // It's not the first addition
			{
				$query = $query . " AND extension = -1";
			}
			else // It is the first addition
			{
				$first_addition = true;
				$query = $query . " WHERE extension = -1";
			}
		}
		
		// cable
		if(isModified($cable) && strcmp($the_table, "akron") != 0 && strcmp($the_table, "wayne") != 0)
		{
			if ($first_addition) // It's not the first addition
			{
				$query = $query . " AND cable = \"" . $cable . "\"";
			}
			else // It is the first addition
			{
				$first_addition = true;
				$query = $query . " WHERE cable = \"" . $cable . "\"";
			}
		}
		else if (isModified($cable) && (strcmp($the_table, "akron") == 0 || strcmp($the_table, "wayne") == 0)) // If the issue was that the table doesn't contain the column searched for, the query is tanked
		{
			if ($first_addition) // It's not the first addition
			{
				$query = $query . " AND extension = -1";
			}
			else // It is the first addition
			{
				$first_addition = true;
				$query = $query . " WHERE extension = -1";
			}
		}
		
		// floor
		if(isModified($floor) && strcmp($the_table, "akron") != 0 && strcmp($the_table, "wayne") != 0)
		{
			if ($first_addition) // It's not the first addition
			{
				$query = $query . " AND floor = \"" . $floor . "\"";
			}
			else // It is the first addition
			{
				$first_addition = true;
				$query = $query . " WHERE floor = \"" . $floor . "\"";
			}
		}
		else if (isModified($floor) && (strcmp($the_table, "akron") == 0 || strcmp($the_table, "wayne") == 0)) // If the issue was that the table doesn't contain the column searched for, the query is tanked
		{
			if ($first_addition) // It's not the first addition
			{
				$query = $query . " AND extension = -1";
			}
			else // It is the first addition
			{
				$first_addition = true;
				$query = $query . " WHERE extension = -1";
			}
		}
		
		// building
		if(isModified($building) && strcmp($the_table, "akron") != 0 && strcmp($the_table, "wayne") != 0)
		{
			if ($first_addition) // It's not the first addition
			{
				$query = $query . " AND building = \"" . $building . "\"";
			}
			else // It is the first addition
			{
				$query = $query . " WHERE building = \"" . $building . "\"";
			}
		}
		else if (isModified($building) && (strcmp($the_table, "akron") == 0 || strcmp($the_table, "wayne") == 0)) // If the issue was that the table doesn't contain the column searched for, the query is tanked
		{
			if ($first_addition) // It's not the first addition
			{
				$query = $query . " AND extension = -1";
			}
			else // It is the first addition
			{
				$first_addition = true;
				$query = $query . " WHERE extension = -1";
			}
		}
		
		// Adding the final ";" to the query
		$query = $query . ";";
		
		// Returning the complete query
		return $query;
	}
	
	function isModified($variable)
	{
		// If the string is equal to either of these, it hasn't been modified
		if (strcmp($variable, "DNE") == 0 || strcmp($variable, "") == 0)
		{
			// So, return false
			return false;
		}
		
		// Otherwise, it's been modified. So return true
		return true;
	}
	
	function performQuery($query)
	{
		// Connecting to the remote MySQL and verifying that we do
		// mysqli_connect("connection:port", "username", "password");
		$db = mysqli_connect("remotemysql.com:3306", "ITt7W4LVtm", "2RdcJaMtQp");
		if (!$db)
		{
			print "<p>Error - could not connect to MySQL.</p>";
			exit;
		}
		
		// Selecting which database we want and verifying that we do
		$er = mysqli_select_db($db, "ITt7W4LVtm");
		if (!$er)
		{
			print "<p>Error - could not connect to the database.</p>";
			exit;
		}
		
		// Performing the query. If anything is returned, it's stored in result
		$result = mysqli_query($db, $query);

		// If result is false, something went wrong
		if (!$result)
		{
			// Letting the user know and displaying the specifics of what went wrong
			print "<p>Error - the query could not be executed.</p>";
			$error = mysqli_error($db);
			print "<p>" . $error . "</p>";
			exit;
		}
		
		// Closing the database connection
		mysqli_close($db);
		
		// Returning the result
		return $result;
	}
	
	function getTableNames()
	{
		// Connecting to the remote MySQL and verifying that we do
		// mysqli_connect("connection:port", "username", "password");
		$db = mysqli_connect("remotemysql.com:3306", "ITt7W4LVtm", "2RdcJaMtQp");
		if (!$db)
		{
			print "<p>Error - could not connect to MySQL.</p>";
			exit;
		}
		
		// Selecting which database we want and verifying that we do
		$er = mysqli_select_db($db, "ITt7W4LVtm");
		if (!$er)
		{
			print "<p>Error - could not connect to the database.</p>";
			exit;
		}
		
		// This is the query used to get all of the table names
		$query = "SELECT TABLE_NAME
				FROM INFORMATION_SCHEMA.TABLES
				WHERE TABLE_TYPE = 'BASE TABLE' AND TABLE_SCHEMA='ITt7W4LVtm'";
		
		// Performs the query, storing the table names in results
		$result = mysqli_query($db, $query);

		// If result is false, something went wrong
		if (!$result)
		{
			// Letting the user know and displaying the specifics of what went wrong
			print "<p>Error - could not perform the query.</p>";
			$error = mysqli_error($db);
			print "<p>" . $error . "</p>";
			exit;
		}
		
		// This gets the array of the first row of data in the table
		$row = mysqli_fetch_array($result);
		
		// This gets the number of fields in the table
		$num_fields = mysqli_num_fields($result);
		
		// Getting the number of rows from our table
		$num_rows = mysqli_num_rows($result);
		
		// The array of table names (currently empty)
		$table_names = array();
		
		// Going through each row and displaying all of the data
		for ($row_num = 0; $row_num < $num_rows; $row_num++)
		{
			// Getting the values, but not the keys, from the row
			$values = array_values($row);

			// Looping through the data to display all of the values
			for ($index = 0; $index < $num_fields; $index++)
			{
				// Pushing the table names into an array
				// Using 2 * $index is required because every other value is an integer with the corresponding column number, and we don't care about that
				// Using the + 1 is required because the first index is the integer, and the index following it is the value
				$value = htmlspecialchars($values[2 * $index + 1]);
				array_push($table_names, $value);
			}
			
			// Getting the next row
			$row = mysqli_fetch_array($result);
		}
		
		// Closing the database connection
		mysqli_close($db);
		
		// Returning the array of table names
		return $table_names;
	}

?>

<center>

	<!-- Header -->
	<h1>
		TLC Information
	</h1>
	
	<!-- Displaying the changes/information the user wanted. -->
	<?php

		// Simply call this method to do the operation and display the results (if applicable)
		determineOperation();

	?>
	
	<!-- This form gathers all of the information necessary to perform what the user wants to do. -->
	<form action=<?php print getLocation("TLC.php"); ?> method="post">

		<!-- Figuring out what operation they would like to perform. -->
		<p>
			What operation would you like to do?
		</p>

		<!-- The operation radio buttons. -->
		<input type="radio" name="operation" value="view" checked>View
		<input type="radio" name="operation" value="insert">Insert
		<input type="radio" name="operation" value="search">Search
		<input type="radio" name="operation" value="update">Update
		<input type="radio" name="operation" value="delete">Delete<br><br>
	
		<!-- Figuring out which table they would like to perform it on. -->
		<p>
			What table would you like to perform that operation on?
		</p>

		<?php
			
			// Displaying the first radio button, making sure it's checked
			print "<input type=\"radio\" name=\"table\" value=\"all\" checked>All";
			
			// Getting the table names
			$table_names = getTableNames();
			
			// Displaying the table names with radio buttons
			for ($x = 0; $x < count($table_names); $x++)
			{
				print "<input type=\"radio\" name=\"table\" value=\"" . $table_names[$x] . "\">" . $table_names[$x];
			}
			
		?>
		
		<!-- Getting all of the necessary input to perform the operation. -->
		<!-- This is the explanation of what to do with the textboxes that gets displayed to the user. -->
		<p>
			Please enter all of the appropriate information to perform the operation.<br><br>

			NOTE: Use the right side only for values that will be updated!<br>
			Ex: If you want to update the name of every type "station-user"<br>
			to "worker station", you type in "station-user" in the left side<br>
			of the textboxes (in the "type" textbox) and type "worker station"<br>
			in the right side of the textboxes (int the "name" textbox).<br>
			If you use the right side for anything else, nothing will happen.<br><br>

			* = Required for inserting data, cannot have a duplicate in a table you<br>
			are inserting or updating in
		</p>
		

		<!-- The textboxes that gather all of the appropriate information. -->
		Extension*: <input type="text" name="extension"> - <input type="text" name="extension_update"><br>
		Type*: <input type="text" name="type"> - <input type="text" name="type_update"><br>
		Cor: <input type="text" name="cor"> - <input type="text" name="cor_update"><br>
		Tn: <input type="text" name="tn"> - <input type="text" name="tn_update"><br>
		Coverpath: <input type="text" name="coverpath"> - <input type="text" name="coverpath_update"><br>
		Name: <input type="text" name="name"> - <input type="text" name="name_update"><br>
		Cos: <input type="text" name="cos"> - <input type="text" name="cos_update"><br>
		Port: <input type="text" name="port"> - <input type="text" name="port_update"><br>
		Room: <input type="text" name="room"> - <input type="text" name="room_update"><br>
		Jack: <input type="text" name="jack"> - <input type="text" name="jack_update"><br>
		Cable: <input type="text" name="cable"> - <input type="text" name="cable_update"><br>
		Floor: <input type="text" name="floor"> - <input type="text" name="floor_update"><br>
		Building: <input type="text" name="building"> - <input type="text" name="building_update"><br>
	
		<!-- Submit button. -->
		<br><input type="submit">
	</form>
	
</center>

<p></p>

<!-- Button to go the TLC page -->
<?php
	print "<div id=\"button\" align=\"center\"><a href=" . getLocation("Home.php") . "><button>Go to Home Page</button></a></div>";
?>

</body>
</html>
<!--

	This file contains all of the functions related to modifying or viewing the database.

-->

<!-- Include files. -->
<?php

	include 'OperationsHelperFunctions.php';

?>


<!-- Functions -->
<?php

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

?>
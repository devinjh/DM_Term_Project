<!--

	This file contains all of the functions that help the operation function perform.

-->

<!-- Include files. -->
<?php

	include 'QueryBuilderFunctions.php';

?>

<?php
	
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
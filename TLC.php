<!--

This is the TLC page for Devin Hopkins and Tristan Hess' database management term project.

-->

<html>
	<head>
		<meta charset = "utf-8">
		<title> TLC Page </title>
		<style type = "text/css">
		
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

<!-- Functions -->
<?php

	// This function takes in a website filename and finds it locally on the machine. It then manipulates the filename so it can be displayed on the web browser
	function getLocation($file_name)
	{
		// Getting the absolute path of the file
		$absolute_path = realpath($file_name);
		
		$string_position = strpos($absolute_path, "htdocs");
		
		$website_path = substr($absolute_path, $string_position + 6);
		
		// Returning the path to make it properly display on the web browser
		return $website_path;
	}
	
	// This function displays the entire table given a table name
	function displayTable($table_name)
	{
		// Connecting to the remote MySQL and verifying that we do
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
		
		// Getting all the information from the Person table and verifying that we do
		$person_query = "SELECT * FROM " . $table_name;
		$result = mysqli_query($db, $person_query);
		if (!$result)
		{
			print "<p>Error - the query could not be executed.</p>";
			$error = mysqli_error($db);
			print "<p>" . $error . "</p>";
			exit;
		}
		
		// This gets the array of the first row of data in the table
		$row = mysqli_fetch_array($result);
		
		// This gets the number of fields in the table
		$num_fields = mysqli_num_fields($result);
		
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
		
		// Closing the database connection
		mysqli_close($db);
	}

?>

<!-- Displaying the tables of "akron", "export", and "wayne" -->
<?php
	/*displayTable("akron");
	print "<p></p>";
	displayTable("export");
	print "<p></p>";
	displayTable("wayne");
	print "<p></p>";*/
?>

<center>

	<h1>
		TLC Information (TLC)
	</h1>
	
	<form action = <?php print getLocation("TLC.php"); ?>>
		<!-- Figuring out what operation they would like to perform. -->
		<p>
			What operation would you like to do?
		</p>
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
			// Connecting to the remote MySQL and verifying that we do
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
			
			$query = "SELECT TABLE_NAME
					FROM INFORMATION_SCHEMA.TABLES
					WHERE TABLE_TYPE = 'BASE TABLE' AND TABLE_SCHEMA='ITt7W4LVtm'";
			
			$result = mysqli_query($db, $query);
			if (!$result)
			{
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
					// Using the + 1 is required because the first index is the integer, and the index following it is the value
					$value = htmlspecialchars($values[2 * $index + 1]);
					
					if ($row_num != 0) // Goes here if the radio button is not the first to be added
					{
						print "<input type=\"radio\" name=\"table\" value=\"" . $value . "\">" . $value;
					}
					else // Goes here if the radio button is the first radio button to be added
					{
						print "<input type=\"radio\" name=\"table\" value=\"" . $value . "\" checked>" . $value;
					}
				}
				
				// Getting the next row
				$row = mysqli_fetch_array($result);
			}
			
			print "<br><br>";
			
			// Closing the database connection
			mysqli_close($db);
		?>
		
		<!-- Getting all of the necessary input to perform the operation. -->
		<p>
			Please enter all of the appropriate information to perform the operation.
		</p>
		Extension: <input type="text" name="extension"><br>
		Type: <input type="text" name="type"><br>
		Cor: <input type="text" name="cor"><br>
		Tn: <input type="text" name="tn"><br>
		Coverpath: <input type="text" name="coverpath"><br>
		Name: <input type="text" name="name"><br>
		Cos: <input type="text" name="cos"><br>
		Port: <input type="text" name="port"><br>
		Room: <input type="text" name="room"><br>
		Jack: <input type="text" name="jack"><br>
		Cable: <input type="text" name="cable"><br>
		Floor: <input type="text" name="floor"><br>
		Building: <input type="text" name="building"><br>
	
		<input type="submit">
	</form>
	
</center>

<p></p>

<!-- Button to go the TLC page -->
<?php
	print "<div id=\"button\" align=\"center\"><a href=" . getLocation("Home.php") . "><button>Go to Home Page</button></a></div>";
?>

</body>
</html>
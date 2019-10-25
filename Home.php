<!--

This is the home page for Devin Hopkins and Tristan Hess' database management term project.

-->

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
	var helpPage = "<h1> Help Page </h1>";
	var helpWindow = null;
	
	function openHelpPage()
	{
		// Making sure the help page isn't already open, and if it is, close it
		if (helpPage != null)
		{
			helpPage.close();
		}
		
		// To do
	}

</script>

<?php

// Connecting to the remote MySQL and verifying that we do
$db = mysqli_connect("remotemysql.com:3306", "ITt7W4LVtm", "2RdcJaMtQp");
if (!$db)
{
	print "Error - could not connect to MySQL.";
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
$person_query = "SELECT * FROM Person";
$result = mysqli_query($db, $person_query);
if (!$result)
{
	print "Error - the query could not be executed.";
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

?>

<center><h1>
	Telecom Logging Crux (TLC)
</h1></center>

</body>
</html>
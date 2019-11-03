<!--

This is the TLC page for Devin Hopkins and Tristan Hess' database management term project.

-->

<!-- All of the files we must include. -->
<?php

	include 'DatabaseOperations.php';
	include 'FunctionsForAll.php';

?>

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

	// Enum for the operations (in case we want to add more)
	const OperationEnum = Object.freeze({
		View: 0,
		Insert: 1,
		Search: 2,
		Update: 3,
		Delete: 4
	});
	
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

	// This displays the information only needed for the update function
	function updateInformation(e)
	{
		// This first part is making sure all of the correct information is displayed (or hidden) to the user
		// If the function is the update function
		if (e == OperationEnum.Update)
		{
			// Showing the information paragraph above the textboxes
			document.getElementById("information_paragraph").hidden = false;

			// Showing the textboxes
			document.getElementById("extension_update_textbox").hidden = false;
			document.getElementById("type_update_textbox").hidden = false;
			document.getElementById("cor_update_textbox").hidden = false;
			document.getElementById("tn_update_textbox").hidden = false;
			document.getElementById("coverpath_update_textbox").hidden = false;
			document.getElementById("name_update_textbox").hidden = false;
			document.getElementById("cos_update_textbox").hidden = false;
			document.getElementById("port_update_textbox").hidden = false;
			document.getElementById("room_update_textbox").hidden = false;
			document.getElementById("jack_update_textbox").hidden = false;
			document.getElementById("cable_update_textbox").hidden = false;
			document.getElementById("floor_update_textbox").hidden = false;
			document.getElementById("building_update_textbox").hidden = false;
		}
		// If the function is anything but the update function
		else
		{
			// Hiding the information paragraph above the textboxes
			document.getElementById("information_paragraph").hidden = true;

			// Hiding the textboxes
			document.getElementById("extension_update_textbox").hidden = true;
			document.getElementById("type_update_textbox").hidden = true;
			document.getElementById("cor_update_textbox").hidden = true;
			document.getElementById("tn_update_textbox").hidden = true;
			document.getElementById("coverpath_update_textbox").hidden = true;
			document.getElementById("name_update_textbox").hidden = true;
			document.getElementById("cos_update_textbox").hidden = true;
			document.getElementById("port_update_textbox").hidden = true;
			document.getElementById("room_update_textbox").hidden = true;
			document.getElementById("jack_update_textbox").hidden = true;
			document.getElementById("cable_update_textbox").hidden = true;
			document.getElementById("floor_update_textbox").hidden = true;
			document.getElementById("building_update_textbox").hidden = true;
		}

		// This second part makes sure the asterick is properly labeled
		// If the operation is insert
		if (e == OperationEnum.Insert)
		{
			document.getElementById("required_paragraph").innerHTML = "* = This text field must be filled out";
		}
		// If the operation is update
		else if (e == OperationEnum.Update)
		{
			document.getElementById("required_paragraph").innerHTML = "* = This attribute can't have a duplicate. Keep that in mind when updating";
		}
		// The operation is anything other than insert or operate
		else
		{
			document.getElementById("required_paragraph").innerHTML = "* = Ignore the asterisk for this operation";
		}
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

		// This is the form headers that gathers all the information and relaunches the page
		print "<form action=" . getLocation("DatabaseInteraction.php") . " method='post'>";

	?>

		<!-- Figuring out what operation they would like to perform. -->
		<p>
			What operation would you like to do?
		</p>

		<!-- The operation radio buttons. -->
		<input type="radio" name="operation" value="view" onclick="updateInformation(OperationEnum.View)" id="view_operation" checked>View
		<input type="radio" name="operation" value="insert" onclick="updateInformation(OperationEnum.Insert)" id="insert_operation">Insert
		<input type="radio" name="operation" value="search" onclick="updateInformation(OperationEnum.Search)" id="search_operation">Search
		<input type="radio" name="operation" value="update" onclick="updateInformation(OperationEnum.Update)" id="update_operation">Update
		<input type="radio" name="operation" value="delete" onclick="updateInformation(OperationEnum.Delete)" id="delete_operation">Delete<br><br>
	
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

		<p>
			Please enter all of the appropriate information to perform the operation.
		</p>
		
		<!-- Getting all of the necessary input to perform the operation. -->
		<!-- This is the explanation of what to do with the textboxes that gets displayed to the user. -->
		<p id="information_paragraph" hidden>
			NOTE: Use the right side only for values that will be updated!<br>
			Ex: If you want to update the name of every type "station-user"<br>
			to "worker station", you type in "station-user" in the left side<br>
			of the textboxes (in the "type" textbox) and type "worker station"<br>
			in the right side of the textboxes (int the "name" textbox).<br>
			If you use the right side for anything else, nothing will happen.
		</p>

		<p id="required_paragraph">
			* = Ignore the asterisk for this operation
		</p>
		

		<!-- The textboxes that gather all of the appropriate information. -->
		Extension*: <input type="text" name="extension"> - <input type="text" name="extension_update" id="extension_update_textbox" hidden><br>
		Type*: <input type="text" name="type"> - <input type="text" name="type_update" id="type_update_textbox" hidden><br>
		Cor: <input type="text" name="cor"> - <input type="text" name="cor_update" id="cor_update_textbox" hidden><br>
		Tn: <input type="text" name="tn"> - <input type="text" name="tn_update" id="tn_update_textbox" hidden><br>
		Coverpath: <input type="text" name="coverpath"> - <input type="text" name="coverpath_update" id="coverpath_update_textbox" hidden><br>
		Name: <input type="text" name="name"> - <input type="text" name="name_update" id="name_update_textbox" hidden><br>
		Cos: <input type="text" name="cos"> - <input type="text" name="cos_update" id="cos_update_textbox" hidden><br>
		Port: <input type="text" name="port"> - <input type="text" name="port_update" id="port_update_textbox" hidden><br>
		Room: <input type="text" name="room"> - <input type="text" name="room_update" id="room_update_textbox" hidden><br>
		Jack: <input type="text" name="jack"> - <input type="text" name="jack_update" id="jack_update_textbox" hidden><br>
		Cable: <input type="text" name="cable"> - <input type="text" name="cable_update" id="cable_update_textbox" hidden><br>
		Floor: <input type="text" name="floor"> - <input type="text" name="floor_update" id="floor_update_textbox" hidden><br>
		Building: <input type="text" name="building"> - <input type="text" name="building_update" id="building_update_textbox" hidden><br>
	
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
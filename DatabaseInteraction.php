<!--

	This is the Basic Database Interaction page for Devin Hopkins and Tristan Hess' database management term project.

-->

<!-- All of the files we must include. -->
<?php

	include 'DatabaseOperations.php';
	include 'FunctionsForAll.php';

?>

<html>
	<head>
		<!-- Bootstrap include. -->
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
		
		<meta charset = "utf-8">
		<title> Basic Database </title>
	</head>

<body class="p-3 mb-2 bg-dark text-white">

<script>

	// Global variables for the help page
	var helpPage = "<h1><center> Help Page </center></h1>";
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
		if (helpWindow != null)
		{
			helpWindow.close();
		}
		
		// WRITE WHAT WE WANT THE HELP WINDOW TO DISPLAY HERE, STILL NEED TO DO
		
		// This is opening the new window with all of the differences added
		helpWindow = window.open("", "Help Page", "width=1000,height=500");
		helpWindow.document.write(helpPage);
		
		// This resets the page variable, and thus resets the window for the next time
		helpPage = "<h1><center> Help Page </center></h1>";
	}

	// This displays the information only needed for the update function
	function updateInformation(e)
	{
		// This first part is making sure all of the correct information is displayed (or hidden) to the user
		// If the operation is the update operation
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
		// If the operation is anything but the update operation
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

		// This third part makes sure the search checkboxes are correctly displayed or hidden
		// The search operation is selected
		if (e == OperationEnum.Search)
		{
			// They are switched to visible
			document.getElementById("search_checkboxes").hidden = false;
		}
		// The search operation is not selected
		else
		{
			// They are switched to hidden
			document.getElementById("search_checkboxes").hidden = true;
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

	// The array that holds all of the checkboxes
	//$search_checkbox_array = $_POST["search_checkbox"];

	// Setting all of the update variables in case they aren't defined
	$extension_search_checkbox = "DNE";
	$type_search_checkbox = "DNE";
	$cor_search_checkbox = "DNE";
	$tn_search_checkbox = "DNE";
	$coverpath_search_checkbox = "DNE";
	$name_search_checkbox = "DNE";
	$cos_search_checkbox = "DNE";
	$port_search_checkbox = "DNE";
	$room_search_checkbox = "DNE";
	$jack_search_checkbox = "DNE";
	$cable_search_checkbox = "DNE";
	$floor_search_checkbox = "DNE";
	$building_search_checkbox = "DNE";

	// This section goes through and grabs all of the variables that are defined (only the update ones)
	// extension_update
	if (isset($_POST["extension_search_checkbox"]))
	{
		$extension_search_checkbox = $_POST["extension_search_checkbox"];
	}
	// type_update
	if (isset($_POST["type_search_checkbox"]))
	{
		$type_search_checkbox = $_POST["type_search_checkbox"];
	}
	// cor_update
	if (isset($_POST["cor_search_checkbox"]))
	{
		$cor_search_checkbox = $_POST["cor_search_checkbox"];
	}
	// tn_update
	if (isset($_POST["tn_search_checkbox"]))
	{
		$tn_search_checkbox = $_POST["tn_search_checkbox"];
	}
	// coverpath_update
	if (isset($_POST["coverpath_search_checkbox"]))
	{
		$coverpath_search_checkbox = $_POST["coverpath_search_checkbox"];
	}
	// name_update
	if (isset($_POST["name_search_checkbox"]))
	{
		$name_search_checkbox = $_POST["name_search_checkbox"];
	}
	// cos_update
	if (isset($_POST["cos_search_checkbox"]))
	{
		$cos_search_checkbox = $_POST["cos_search_checkbox"];
	}
	// port_update
	if (isset($_POST["port_search_checkbox"]))
	{
		$port_search_checkbox = $_POST["port_search_checkbox"];
	}
	// room_update
	if (isset($_POST["room_search_checkbox"]))
	{
		$room_search_checkbox = $_POST["room_search_checkbox"];
	}
	// jack_update
	if (isset($_POST["jack_search_checkbox"]))
	{
		$jack_search_checkbox = $_POST["jack_search_checkbox"];
	}
	// cable_update
	if (isset($_POST["cable_search_checkbox"]))
	{
		$cable_search_checkbox = $_POST["cable_search_checkbox"];
	}
	// floor_update
	if (isset($_POST["floor_search_checkbox"]))
	{
		$floor_search_checkbox = $_POST["floor_search_checkbox"];
	}
	// building_update
	if (isset($_POST["building_search_checkbox"]))
	{
		$building_search_checkbox = $_POST["building_search_checkbox"];
	}
	
?>

<!-- Functions -->
<?php
	
	// Determines the operation being performed and performs it
	function determineOperation()
	{
		// Using the global variable operation and the array of search checkboxes in this function
		global $operation, $search_checkbox_array;
		
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

	<!-- Navigation bar. -->
	<nav class="navbar navbar-dark bg-dark">
		<form>
    		<button class="btn btn-primary" type="button" onclick=location.href="Home.php">Home</button>
    	</form>
		<form class="form-inline">
    		<button class="btn btn-primary" type="button" onclick=location.href="DatabaseInteraction.php">Basic Database</button>
    	</form>
    	<form>
    		<button class="btn btn-primary" type="button" onclick=location.href="AdvancedDatabaseInteraction.php">Advanced Database</button>
    	</form>
    	<form>
    		<button class="btn btn-primary" type="button" onclick="openHelpPage()">Help</button>
    	</form>
    </nav>

	<!-- Header -->
	<h1 style="color: gold">
		Basic Database
	</h1>
	
	<!-- Displaying the changes/information the user wanted. -->
	<?php

		// Simply call this method to do the operation and display the results (if applicable)
		determineOperation();

		// This is the form headers that gathers all the information and relaunches the page
		print "<form action=" . getLocation("DatabaseInteraction.php") . " method='post'>";

	?>

		<!-- Figuring out what operation they would like to perform. -->
		<p style="color: gold">
			What operation would you like to do?
		</p>

		<!-- Radio buttons for getting the operation. -->
		<div class="custom-control custom-radio custom-control-inline">
			<input type="radio" name="operation" value="view" onclick="updateInformation(OperationEnum.View)" id="view_operation" class="custom-control-input" checked>
				<label class="custom-control-label" for="view_operation">View</label>
		</div>
		<div class="custom-control custom-radio custom-control-inline">
			<input type="radio" name="operation" value="insert" onclick="updateInformation(OperationEnum.Insert)" id="insert_operation" class="custom-control-input">
				<label class="custom-control-label" for="insert_operation">Insert</label>
		</div>
		<div class="custom-control custom-radio custom-control-inline">
			<input type="radio" name="operation" value="search" onclick="updateInformation(OperationEnum.Search)" id="search_operation" class="custom-control-input">
				<label class="custom-control-label" for="search_operation">Search</label>
		</div>
		<div class="custom-control custom-radio custom-control-inline">
			<input type="radio" name="operation" value="update" onclick="updateInformation(OperationEnum.Update)" id="update_operation" class="custom-control-input">
				<label class="custom-control-label" for="update_operation">Update</label>
		</div>
		<div class="custom-control custom-radio custom-control-inline">
			<input type="radio" name="operation" value="delete" onclick="updateInformation(OperationEnum.Delete)" id="delete_operation" class="custom-control-input">
				<label class="custom-control-label" for="delete_operation">Delete</label>
		</div>

		<!-- To make sure spacing looks good. -->
		<br><br>

		<!-- Figuring out which table they would like to perform it on. -->
		<p style="color: gold">
			What table would you like to perform that operation on?
		</p>

		<?php

			// Getting all of the table names into an array
			$table_names = getTableNames();

			// Going through the array and displaying all of the table nams along with the "all" option
			for ($x = -1; $x < count($table_names); $x++)
			{
				// The "all" option
				if ($x == -1)
				{
					print "<div class=\"custom-control custom-radio custom-control-inline\">"; // Start of the div
					print "<input type=\"radio\" name=\"table\" value=\"all\" class=\"custom-control-input\" id=\"all\" checked>"; // The actual button with the name all in it
					print "<label class=\"custom-control-label\" for=\"all\">all</label>"; // The label associated with all
					print "</div>"; // The end of the div
				}
				// All individual table options
				else
				{
					print "<div class=\"custom-control custom-radio custom-control-inline\">"; // Start of the div
					print "<input type=\"radio\" name=\"table\" value=\"" . $table_names[$x] . "\" class=\"custom-control-input\" id=\"" . $table_names[$x] . "\">"; // The actual button with the table name in it
					print "<label class=\"custom-control-label\" for=\"" . $table_names[$x] . "\">" . $table_names[$x] . "</label>"; // The label associated with the table name
					print "</div>"; // The end of the div
				}
			}

		?>

		<p style="color: gold">
			Please enter all of the appropriate information to perform the operation.
		</p>

		<!-- Getting all of the necessary input to perform the operation. -->
		<!-- This is the explanation of what to do with the textboxes that gets displayed to the user. -->
		<p id="information_paragraph" style="color: gold" hidden>
			NOTE: Use the right side only for values that will be updated!<br>
			Ex: If you want to update the name of every type "station-user"<br>
			to "worker station", you type in "station-user" in the left side<br>
			of the textboxes (in the "type" textbox) and type "worker station"<br>
			in the right side of the textboxes (int the "name" textbox).<br>
			If you use the right side for anything else, nothing will happen.
		</p>

		<!-- The checkboxes that gather information on if they're searching for a specific column. Only shows up when the user has the"search" operation selected. -->
		<p id="search_checkboxes" style="color: gold" hidden>

			<!-- Little information explaining to the user what the checkboxes are for. -->
			If you would like to search for (a) specific column(s), please indicate which one(s). If not, leave them all blank.<br><br>

			** = Available for table selection of "all", "akron", "export", and "wayne"<br>
			^ = Available for table selection of "akron" and "wayne"<br>
			^^ = Available for table selection of "export"<br><br>

			<!-- The checkboxes. -->
			<input type="checkbox" name="extension_search_checkbox" value="extension" id="extension_checkbox"> Extension**
			<input type="checkbox" name="type_search_checkbox" value="type" id="type_checkbox">Type**
			<input type="checkbox" name="cor_search_checkbox" value="cor" id="cor_checkbox">Cor^
			<input type="checkbox" name="tn_search_checkbox" value="tn" id="tn_checkbox">Tn^
			<input type="checkbox" name="coverpath_search_checkbox" value="coverpath" id="coverpath_checkbox">Coverpath^
			<input type="checkbox" name="name_search_checkbox" value="name" id="name_checkbox">Name**
			<input type="checkbox" name="cos_search_checkbox" value="cos" id="cos_checkbox">Cos^
			<input type="checkbox" name="port_search_checkbox" value="port" id="port_checkbox">Port^^
			<input type="checkbox" name="room_search_checkbox" value="room" id="room_checkbox">Room^^
			<input type="checkbox" name="jack_search_checkbox" value="jack" id="jack_checkbox">Jack^^
			<input type="checkbox" name="cable_search_checkbox" value="cable" id="cable_checkbox">Cable^^
			<input type="checkbox" name="floor_search_checkbox" value="floor" id="floor_checkbox">Floor^^
			<input type="checkbox" name="building_search_checkbox" value="building" id="building_checkbox">Building^^

		</p>

		<!-- This simply tells the user what the asterisk is for. -->
		<p id="required_paragraph" style="color: gold">
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
		<br><button class="btn btn-success" type="submit">Submit</button>

	</form>
	
</center>

<!-- Buttons -->
<?php

	// Making sure everything is centered
	print "<center>";

	// Help Page button
	print "<button class=\"btn btn-primary\" onclick=\"openHelpPage()\"> Help Page </button>";

	// Making sure there's some space
	print "<br><br>";

	// Button to go the Home page
	//print "<div id=\"button\" align=\"center\"><a href=" . getLocation("Home.php") . "><button>Go to Home Page</button></a></div>"; // Old
	print "<button type=\"button\" class=\"btn btn-primary\" onclick=location.href='Home.php'>Go to Home Page</button>";

	// Making sure there's some space
	print "<br><br>";

	// Button to go the Basic Database Interaction page
	//print "<div id=\"button\" align=\"center\"><a href=" . getLocation("AdvancedDatabaseInteraction.php") . "><button>Go to Advanced Database Page</button></a></div>"; // Old
	print "<button type=\"button\" class=\"btn btn-primary\" onclick=location.href='AdvancedDatabaseInteraction.php'>Go to Advanced Database Page</button>";

	print "</center>";

	// If any space needs to be added to the bottom
	addSpaceToBottom(3);

?>

</body>
</html>
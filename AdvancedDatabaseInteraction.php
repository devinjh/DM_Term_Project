<!--

This is the page containing the advanced functions for Devin Hopkins and Tristan Hess' database management term project.

-->

<!-- Included files. -->
<?php

    include 'DatabaseOperations.php';
	include 'FunctionsForAll.php';

?>

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
	var helpPage = "<h1><center> Help Page </center></h1>";
    var helpWindow = null;
    
    // Enum for the operations (in case we want to add more)
	const OperationEnum = Object.freeze({
		FindClose: 0,
        FindPattern: 1,
        UploadInformation: 2
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
		
		// This resets the page variable, and thus resets the window
		helpPage = "<h1><center> Help Page </center></h1>";
    }
    
    function updateInformation(e)
    {
        // If the selected function is not upload information
        if (e != OperationEnum.UploadInformation)
        {
            // Make the break hidden so the formatting still looks good
            document.getElementById("br_1").hidden = true;

            // Make the information textbox visible so the user can enter in information
            document.getElementById("information_textbox").hidden = false;
        }
        // If the selected function is upload information
        else
        {
            // Make the break visible so the formatting still looks good
            document.getElementById("br_1").hidden = false;

            // Make the information textbox hidden since it doesn't have anything to do with uploading information
            document.getElementById("information_textbox").hidden = true;

            // ADD ANYTHING ELSE THAT NEEDS TO HAPPEN
        }
    }

</script>

<?php

    // This is currently an example for when we're ready to implement
    /*// Setting all of the variables in case they aren't defined
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
	}*/

?>

<center>
    
    <h1>
	    Advanced Database Interaction Page
    </h1>

    <!-- Displaying the changes/information the user wanted. -->
	<?php

        // Simply call this method to do the operation and display the results (if applicable)
        //determineOperation();

        // This is the form headers that gathers all the information and relaunches the page
        print "<form action=" . getLocation("AdvancedDatabaseInteraction.php") . " method='post'>";

    ?>

    <!-- Figuring out what operation they would like to perform. -->
    <p>
        What operation would you like to do?
    </p>

    <!-- The operation radio buttons. -->
    <input type="radio" name="operation" value="find_close" onclick="updateInformation(OperationEnum.FindClose)" checked>Find a Close Extension
    <input type="radio" name="operation" value="find_pattern" onclick="updateInformation(OperationEnum.FindPattern)">Find an Extension Matching a Pattern
    <input type="radio" name="operation" value="upload_information" onclick="updateInformation(OperationEnum.UploadInformation)">Upload Information

    <!-- Making sure the next attribute isn't too close to the radio buttons. -->
    <br id="br_1" hidden>

    <!-- The textboxes that gather all of the appropriate information. -->
    <p id="information_textbox">
        Extension: <input type="text" name="extension">
    </p>

    <!-- Submit button. -->
    <br><input type="submit">

    </form>

</center>

<!-- Button to bring up the help page. -->
<div align="center" onclick="openHelpPage()">
	<button> Help Page </button>
</div>

<!-- Making sure the Help Button isn't too close to the next button. -->
<br>

<!-- Buttons -->
<?php

	// Button to go the Home page
	print "<div id=\"button\" align=\"center\"><a href=" . getLocation("Home.php") . "><button>Go to Home Page</button></a></div>";

	// Making sure there's some space
	print "<br>";

	// Button to go the Advanced Database Interaction page
	print "<div id=\"button\" align=\"center\"><a href=" . getLocation("DatabaseInteraction.php") . "><button>Go to Basic Database Page</button></a></div>";

?>

</body>
</html>
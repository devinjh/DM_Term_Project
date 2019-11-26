<!--

    This is the page containing the advanced functions for Devin Hopkins and Tristan Hess' database management term project.

-->

<!-- All of the files we need to include. -->
<?php

    include 'AdvancedDatabaseOperations.php';
    include 'FunctionsForAll.php';

?>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.0.0-alpha1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-csv/0.71/jquery.csv-0.71.min.js"></script>

<html>

	<head>
		<!-- Bootstrap include. -->
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="	sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
		
    	<meta charset="utf-8">
    	<title> Advanced Database </title>
	</head>

<body class="p-3 mb-2 bg-dark text-white">

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

    function openHelpPage() {
        // Making sure the help page isn't already open, and if it is, close it
        if (helpWindow != null) {
            helpWindow.close();
        }

        // WRITE WHAT WE WANT THE HELP WINDOW TO DISPLAY HERE, STILL NEED TO DO

        // This is opening the new window with all of the differences added
        helpWindow = window.open("", "Help Page", "width=1000,height=500");
        helpWindow.document.write(helpPage);

        // This resets the page variable, and thus resets the window
        helpPage = "<h1><center> Help Page </center></h1>";
    }

    function updateInformation(e) {
        // If the selected function is not upload information
        if (e != OperationEnum.UploadInformation) {
            // Make the information textbox visible so the user can enter in information
            document.getElementById("information_textbox").hidden = false;

            // The operation is to find a close extension
            if (e == OperationEnum.FindClose) {
                // The range is necessary since they want a close extension
                document.getElementById("extension_range_textbox").hidden = false;
            }
            // The operation is to find a pattern matching the extension given
            else {
                // Since there's nothing needed about the range, make that hidden too
                document.getElementById("extension_range_textbox").hidden = true;
            }

            document.getElementById("upload_information").hidden = true;
            document.getElementById("output").hidden = true;
            document.getElementById("required_paragraph").hidden = false;
        }
        // If the selected function is upload information
        else {
            // Make the information textbox hidden since it doesn't have anything to do with uploading information
            document.getElementById("information_textbox").hidden = true;

            // Since there's nothing needed about the range, make that hidden too
            document.getElementById("extension_range_textbox").hidden = true;

            // ADD ANYTHING ELSE THAT NEEDS TO HAPPEN
            document.getElementById("upload_information").hidden = false;
            document.getElementById("output").hidden = false;
            document.getElementById("required_paragraph").hidden = true;
        }
    }

    // function to upload file data
    function uploadData() {
        var filename = "rawdata/" + document.getElementById("myFile").files[0].name;
        var xhttp = new XMLHttpRequest();
        var i = 0,
            j = 0; // loop vars
        xhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                if (filename[8] == 'e') {
                    var test = this.responseText;
                    test = test.replace(/\n/g, ","); // replaces \n with , so it can be stored in an array properly

                    var text = $.csv.toArray(test);
                    var lines = text.length / 9 - 1; // last line the future loop reads is all undefined so -1
                    var htmlOut =
                        "INSERT INTO `export`(`extension`, `type`, `port`, `name`, `room`, `jack`, `cable`, `floor`, `building`) <br> VALUES ";

                    for (j = 1; j < lines -
                        1; j++) { // skip line 0 because this file has the headers as line 0 // j < lines
                        htmlOut += "(";
                        for (i = 0; i < 8; i++) { // i < 8 for all but last column
                            htmlOut += "'" + text[9 * j + i].replace('\'', '').replace('\\', '') + "',";
                        }
                        htmlOut += "'" + text[9 * j + 8].replace('\'', '') + "'),";
                        htmlOut += "<br>";
                    }
                    // need to add last line separately to add on the delimeter ";"
                    htmlOut += "(";
                    for (i = -1; i < 7; i++) { // i < 8 for all but last column
                        htmlOut += "'" + text[9 * lines + i].replace('\'', '') + "',";
                    }
                    htmlOut += "'" + text[9 * lines + 7].replace('\'', '') + "');";

                    var myWindow = window.open("", "QueryOut");
                    myWindow.document.write(htmlOut);

                } else if (filename[8] == 'r') {
                    var test = this.responseText;
                    test = test.replace(/\n/g, ","); // replaces \n with , so it can be stored in an array properly

                    var text = $.csv.toArray(test);
                    var lines = (text.length - 3) / 8; // first 2 and last line is not important data
                    var htmlOut =
                        "INSERT INTO `akron`(`extension`, `type`, `cor`, `tn`, `coverpath`, `name`, `cos`) <br> VALUES ";

                    for (j = 0; j < lines - 1; j++) {
                        htmlOut += "(";
                        for (i = 2; i < 8; i++) { // i < 7 for all but last column
                            htmlOut += "'" + text[8 * j + i].replace('\'', '').replace('\\', '') + "',";
                        }
                        htmlOut += "'" + text[8 * j + 8].replace('\'', '') + "'),";
                        htmlOut += "<br>";
                    }
                    // need to add last line separately to add on the delimeter ";"
                    j = 8 * lines - 1;
                    htmlOut += "(";
                    for (i = -5; i < 1; i++) {
                        htmlOut += "'" + text[j + i].replace('\'', '') + "',";
                    }
                    htmlOut += "'" + text[j + 1].replace('\'', '') + "');";

                    var myWindow = window.open("", "QueryOut");
                    myWindow.document.write(htmlOut);
                } else if (filename[8] == 'W') {
                    var test = this.responseText;
                    test = test.replace(/\n/g, ","); // replaces \n with , so it can be stored in an array properly

                    var text = $.csv.toArray(test);
                    var lines = (text.length - 3) / 8; // first 2 and last line is not important data
                    var htmlOut =
                        "INSERT INTO `wayne`(`extension`, `type`, `name`, `cor`, `tn`, `coverpath`, `cos`) <br> VALUES ";

                    for (j = 0; j < lines - 1; j++) {
                        htmlOut += "(";
                        for (i = 2; i < 8; i++) { // i < 7 for all but last column
                            htmlOut += "'" + text[8 * j + i].replace('\'', '').replace('\\', '') + "',";
                        }
                        htmlOut += "'" + text[8 * j + 8].replace('\'', '') + "'),";
                        htmlOut += "<br>";
                    }
                    // need to add last line separately to add on the delimeter ";"
                    j = 8 * lines - 1;
                    htmlOut += "(";
                    for (i = -5; i < 1; i++) {
                        htmlOut += "'" + text[j + i].replace('\'', '') + "',";
                    }
                    htmlOut += "'" + text[j + 1].replace('\'', '') + "');";

                    var myWindow = window.open("", "QueryOut");
                    myWindow.document.write(htmlOut);
                } else
                    window.alert("Wrong data file type");
            }
        };
        xhttp.open("GET", filename, true);
        xhttp.send();
    }
</script>

<!-- Variables. -->
<?php

    // Setting all of the variables in case they aren't defined
	$extension_number = "DNE";
	$extension_range = "DNE";
	
	// This section goes through and grabs all of the variables that are defined (not including the updated ones)
	// extension_number
	if (isset($_POST["extension_number"]))
	{
		$extension_number = $_POST["extension_number"];
	}
	if (empty($extension_number))
	{
		$extension_number = 0;
	}
	// extension_range
	if (isset($_POST["extension_range"]))
	{
		$extension_range = $_POST["extension_range"];
	}
	if (empty($extension_range))
	{
		$extension_range = 0;
	}

	// Setting the variables in case they aren't defined
	$operation = "DNE";

	// operation
	if (isset($_POST["operation"]))
	{
		$operation = $_POST["operation"];
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

    <h1 style="color: gold">
        Advanced Database Interaction Page
    </h1>

    <!-- Displaying the changes/information the user wanted. -->
    <?php

        // Simply call this method to do the operation and display the results (if applicable)
        determineOperation();

        // This is the form headers that gathers all the information and relaunches the page
        print "<form action=" . getLocation("AdvancedDatabaseInteraction.php") . " method='post'>";

    ?>

    	<!-- Figuring out what operation they would like to perform. -->
    	<p style="color: gold">
        	What operation would you like to do?
    	</p>

        <!-- Radio buttons for getting the operation. -->
		<div class="custom-control custom-radio custom-control-inline">
			<input type="radio" name="operation" value="find_close" onclick="updateInformation(OperationEnum.FindClose)" id="find_close_operation" class="custom-control-input" checked>
				<label class="custom-control-label" for="find_close_operation">Find a Close Extension</label>
		</div>
		<div class="custom-control custom-radio custom-control-inline">
			<input type="radio" name="operation" value="find_pattern"
            onclick="updateInformation(OperationEnum.FindPattern)" id="find_pattern_operation" class="custom-control-input">
				<label class="custom-control-label" for="find_pattern_operation">Find an Extension Matching a Pattern</label>
		</div>
		<div class="custom-control custom-radio custom-control-inline">
			<input type="radio" name="operation" value="upload_information"
            onclick="updateInformation(OperationEnum.UploadInformation)" id="upload_operation" class="custom-control-input">
				<label class="custom-control-label" for="upload_operation">Upload Information</label>
		</div>

        <!-- Making sure the next attribute isn't too close to the radio buttons. -->
		<br><br>

		<p style="color: gold" id="required_paragraph">
			* = This text field must be filled out
		</p>

        <!-- The textboxes that gather all of the appropriate information. -->
        <p id="information_textbox">
            Extension*: <input type="text" name="extension_number">
        </p>

        <p id="extension_range_textbox">
            Range*: <input type="text" name="extension_range">
        </p>

        <p id="upload_information" hidden="true">
            <input type="file" id="myFile">
            <button type="button" onclick="uploadData()"> Upload! </button>
        </p>

        <!-- Submit button. -->
        <br><button class="btn btn-primary mb-2" type="submit">Submit</button>

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
	//print "<div id=\"button\" align=\"center\"><a href=" . getLocation("DatabaseInteraction.php") . "><button>Go to Basic Database Page</button></a></div>"; // Old
	print "<button type=\"button\" class=\"btn btn-primary\" onclick=location.href='DatabaseInteraction.php'>Go to Basic Database Page</button>";

	print "</center>";

?>

<p id="output" align='center'> </p>

<?php

	// If any space needs to be added to the bottom
	addSpaceToBottom(3);

?>

</body>

</html>
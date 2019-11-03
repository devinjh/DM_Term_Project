<!--

	These are functions that each of the websites might use. So, to prevent code duplication, it's moved in here.

-->

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

?>
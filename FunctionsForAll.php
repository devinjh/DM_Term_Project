<!--

	These are functions that each of the websites might use but aren't related to the database. So, to prevent code duplication, it's moved in here.

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

	function isApplicable($table, $column_header)
	{
		// The table is akron or wayne
		if (strcmp($table, "akron") == 0 || strcmp($table, "wayne") == 0)
		{
			/*switch ($column_header){
				case "extension" : return true;
				case "type" : return true;
				case "cor" : return true;
				case "tn" : return true;
				case "coverpath" : return true;
				case "name" : return true;
				case "cos" : return true;
				default: return false;
			}*/

			if (strcmp($column_header, "extension") == 0)
			{
				return true;
			}
			else if (strcmp($column_header, "type") == 0)
			{
				return true;
			}
			else if (strcmp($column_header, "cor") == 0)
			{
				return true;
			}
			else if (strcmp($column_header, "tn") == 0)
			{
				return true;
			}
			else if (strcmp($column_header, "coverpath") == 0)
			{
				return true;
			}
			else if (strcmp($column_header, "name") == 0)
			{
				return true;
			}
			else if (strcmp($column_header, "cos") == 0)
			{
				return true;
			}
			else
			{
				return false;
			}
		}
		// The table is export
		else if (strcmp($table, "export") == 0)
		{
			/*switch ($column_header){
				case "extension" : return true;
				case "type" : return true;
				case "port" : return true;
				case "name" : return true;
				case "room" : return true;
				case "jack" : return true;
				case "cable" : return true;
				case "floor" : return true;
				case "building" : return true;
				default: return false;
			}*/

			if (strcmp($column_header, "extension") == 0)
			{
				return true;
			}
			else if (strcmp($column_header, "type") == 0)
			{
				return true;
			}
			else if (strcmp($column_header, "port") == 0)
			{
				return true;
			}
			else if (strcmp($column_header, "name") == 0)
			{
				return true;
			}
			else if (strcmp($column_header, "room") == 0)
			{
				return true;
			}
			else if (strcmp($column_header, "jack") == 0)
			{
				return true;
			}
			else if (strcmp($column_header, "cable") == 0)
			{
				return true;
			}
			else if (strcmp($column_header, "floor") == 0)
			{
				return true;
			}
			else if (strcmp($column_header, "building") == 0)
			{
				return true;
			}
			else
			{
				return false;
			}
		}
		// If they're trying to access every table
		else if (strcmp($table, "all") == 0)
		{
			if (strcmp($column_header, "extension") == 0)
			{
				return true;
			}
			else if (strcmp($column_header, "type") == 0)
			{
				return true;
			}
			else if (strcmp($column_header, "name") == 0)
			{
				return true;
			}
			else
			{
				return false;
			}
		}

		// This means some random table has made it in
		return false;
	}
  
	// Binary search
	function binarySearch($arr, $l, $r, $x) 
	{
		// If the right is greater than or equal to the left
		if ($r >= $l) 
		{
			// Finding the middle element
        	$mid = ceil($l + ($r - $l) / 2); 
  
        	// If the element is present at the middle itself
        	if ($arr[$mid] == $x)
        	{
        		return floor($mid);
        	}
  
        	// If element is smaller than mid, then it can only be present in left subarray
        	if ($arr[$mid] > $x)
        	{
        		return binarySearch($arr, $l, $mid - 1, $x);
        	}
  
        	// Else the element can only be present in right subarray
        	return binarySearch($arr, $mid + 1, $r, $x);
		} 
  
		// The element is not in the array
		return -1; 
	}

?>





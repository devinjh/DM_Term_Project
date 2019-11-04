<!--

	This is the file that contains all of the functinos that build specific queries for different operations.

-->

<?php

	function constructSetPortionOfUpdateQuery($table, $query)
	{
		// Using all of these global variables
		global $extension_update, $type_update, $cor_update, $tn_update, $coverpath_update, $name_update, $cos_update, $port_update, $room_update, $jack_update, $cable_update, $floor_update, $building_update;
		
		// Making sure we know when we've already done one addition to the query
		$first_addition = false;
		
		// The next part of the query
		$query = $query . " SET ";
		
		// extension_update
		if (isModified($extension_update))
		{
			$first_addition = true;
			$query = $query . "extension = " . $extension_update;
		}
		
		// type_update
		if(isModified($type_update))
		{
			// It's not the first addition
			if ($first_addition)
			{
				$query = $query . " AND type = \"" . $type_update . "\"";
			}
			// It's the first addition
			else
			{
				$first_addition = true;
				$query = $query . "type = \"" . $type_update . "\"";
			}
		}
		
		// cor_update
		if(isModified($cor_update) && strcmp($the_table, "export") != 0)
		{
			// It's not the first addition
			if ($first_addition)
			{
				$query = $query . " AND cor = " . $cor_update;
			}
			// It's the first addition
			else
			{
				$first_addition = true;
				$query = $query . "cor = " . $cor_update;
			}
		}
		// If the issue was that the table doesn't contain the column searched for, the query is tanked
		else if (isModified($cor_update) && strcmp($the_table, "export") == 0)
		{
			$query = $query . " FAKE ";
		}
		
		// tn_update
		if(isModified($tn_update) && strcmp($the_table, "export") != 0)
		{
			// It's not the first addition
			if ($first_addition)
			{
				$query = $query . " AND tn = " . $tn_update;
			}
			// It's the first addition
			else
			{
				$first_addition = true;
				$query = $query . "tn = " . $tn_update;
			}
		}
		// If the issue was that the table doesn't contain the column searched for, the query is tanked
		else if (isModified($tn_update) && strcmp($the_table, "export") == 0)
		{
			$query = $query . " FAKE ";
		}
		
		// coverpath_update
		if(isModified($coverpath_update) && strcmp($the_table, "export") != 0)
		{
			// It's not the first addition
			if ($first_addition)
			{
				$query = $query . " AND coverpath = \"" . $coverpath_update . "\"";
			}
			// It's the first addition
			else
			{
				$first_addition = true;
				$query = $query . "coverpath = \"" . $coverpath_update . "\"";
			}
		}
		// If the issue was that the table doesn't contain the column searched for, the query is tanked
		else if (isModified($coverpath_update) && strcmp($the_table, "export") == 0)
		{
			$query = $query . " FAKE ";
		}
		
		// name_update
		if(isModified($name_update))
		{
			// It's not the first addition
			if ($first_addition)
			{
				$query = $query . " AND name = \"" . $name_update . "\"";
			}
			// It's the first addition
			else
			{
				$first_addition = true;
				$query = $query . "name = \"" . $name_update . "\"";
			}
		}
		
		// cos_update
		if(isModified($cos_update) && strcmp($the_table, "export") != 0)
		{
			// It's not the first addition
			if ($first_addition)
			{
				$query = $query . " AND cos = " . $cos_update;
			}
			// It's the first addition
			else
			{
				$first_addition = true;
				$query = $query . "cos = " . $cos_update;
			}
		}
		// If the issue was that the table doesn't contain the column searched for, the query is tanked
		else if (isModified($cos_update) && strcmp($the_table, "export") == 0)
		{
			$query = $query . " FAKE ";
		}
		
		// port_update
		if(isModified($port_update) && strcmp($the_table, "akron") != 0 && strcmp($the_table, "wayne") != 0)
		{
			// It's not the first addition
			if ($first_addition)
			{
				$query = $query . " AND port = \"" . $port_update . "\"";
			}
			// It's the first addition
			else
			{
				$first_addition = true;
				$query = $query . "port = \"" . $port_update . "\"";
			}
		}
		// If the issue was that the table doesn't contain the column searched for, the query is tanked
		else if (isModified($port_update) && (strcmp($the_table, "akron") == 0 || strcmp($the_table, "wayne") == 0))
		{
			$query = $query . " FAKE ";
		}
		
		// room_update
		if(isModified($room_update) && strcmp($the_table, "akron") != 0 && strcmp($the_table, "wayne") != 0)
		{
			// It's not the first addition
			if ($first_addition)
			{
				$query = $query . " AND room = \"" . $room_update . "\"";
			}
			// It's the first addition
			else
			{
				$first_addition = true;
				$query = $query . "room = \"" . $room_update . "\"";
			}
		}
		// If the issue was that the table doesn't contain the column searched for, the query is tanked
		else if (isModified($room_update) && (strcmp($the_table, "akron") == 0 || strcmp($the_table, "wayne") == 0))
		{
			$query = $query . " FAKE ";
		}
		
		// jack_update
		if(isModified($jack_update) && strcmp($the_table, "akron") != 0 && strcmp($the_table, "wayne") != 0)
		{
			// It's not the first addition
			if ($first_addition)
			{
				$query = $query . " AND jack = \"" . $jack_update . "\"";
			}
			// It's the first addition
			else
			{
				$first_addition = true;
				$query = $query . "jack = \"" . $jack_update . "\"";
			}
		}
		// If the issue was that the table doesn't contain the column searched for, the query is tanked
		else if (isModified($jack_update) && (strcmp($the_table, "akron") == 0 || strcmp($the_table, "wayne") == 0))
		{
			$query = $query . " FAKE ";
		}
		
		// cable_update
		if(isModified($cable_update) && strcmp($the_table, "akron") != 0 && strcmp($the_table, "wayne") != 0)
		{
			// It's not the first addition
			if ($first_addition)
			{
				$query = $query . " AND cable = \"" . $cable_update . "\"";
			}
			// It's the first addition
			else
			{
				$first_addition = true;
				$query = $query . "cable = \"" . $cable_update . "\"";
			}
		}
		// If the issue was that the table doesn't contain the column searched for, the query is tanked
		else if (isModified($cable_update) && (strcmp($the_table, "akron") == 0 || strcmp($the_table, "wayne") == 0))
		{
			$query = $query . " FAKE ";
		}
		
		// floor_update
		if(isModified($floor_update) && strcmp($the_table, "akron") != 0 && strcmp($the_table, "wayne") != 0)
		{
			// It's not the first addition
			if ($first_addition)
			{
				$query = $query . " AND floor = \"" . $floor_update . "\"";
			}
			// It's the first addition
			else
			{
				$first_addition = true;
				$query = $query . "floor = \"" . $floor_update . "\"";
			}
		}
		// If the issue was that the table doesn't contain the column searched for, the query is tanked
		else if (isModified($floor_update) && (strcmp($the_table, "akron") == 0 || strcmp($the_table, "wayne") == 0))
		{
			$query = $query . " FAKE ";
		}
		
		// building_update
		if(isModified($building_update) && strcmp($the_table, "akron") != 0 && strcmp($the_table, "wayne") != 0)
		{
			// It's not the first addition
			if ($first_addition)
			{
				$query = $query . " AND building = \"" . $building_update . "\"";
			}
			// It's the first addition
			else 
			{
				$query = $query . "building = \"" . $building_update . "\"";
			}
		}
		// If the issue was that the table doesn't contain the column searched for, the query is tanked
		else if (isModified($building_update) && (strcmp($the_table, "akron") == 0 || strcmp($the_table, "wayne") == 0)) 
		{
			$query = $query . " FAKE ";
		}
		
		// Return the constructed query
		return $query;
	}
	
	function constructSpecificInsertQuery($table)
	{
		// Using all of these global variables
		global $extension, $type, $cor, $tn, $coverpath, $name, $cos, $port, $room, $jack, $cable, $floor, $building;
		
		// Creating the beginning of the query (part 1)
		$query_part_one = "INSERT INTO " . $table . "(";

		// Creating the beginning of the second part of the query (part 2)
		$query_part_two = " VALUES (";
		
		// Keeping track of if anything was added
		$adding_something = false;

		// If they didn't specify something that was required, this keeps track of it
		$missing_required = false;
		
		// Inserting into the akron table
		if (strcmp($table, "akron") == 0)
		{
			// extension
			if (isModified($extension))
			{
				$adding_something = true;
				$query_part_one = $query_part_one . "extension,";
				$query_part_two = $query_part_two . $extension . ",";
			}
			// They didn't insert a necessary piece of information
			else
			{
				$missing_required = true;
			}
			
			// type
			if (isModified($type))
			{
				$adding_something = true;
				$query_part_one = $query_part_one . "type,";
				$query_part_two = $query_part_two . "\"" . $type . "\",";
			}
			// They didn't insert a necessary piece of information
			else
			{
				$missing_required = true;
			}
			
			// cor
			if (isModified($cor))
			{
				$adding_something = true;
				$query_part_one = $query_part_one . "cor,";
				$query_part_two = $query_part_two . $cor . ",";
			}
			
			// tn
			if (isModified($tn))
			{
				$adding_something = true;
				$query_part_one = $query_part_one . "tn,";
				$query_part_two = $query_part_two . $tn . ",";
			}
			
			// coverpath
			if (isModified($coverpath))
			{
				$adding_something = true;
				$query_part_one = $query_part_one . "coverpath,";
				$query_part_two = $query_part_two . "\"" . $coverpath . "\",";
			}
			
			// name
			if (isModified($name))
			{
				$adding_something = true;
				$query_part_one = $query_part_one . "name,";
				$query_part_two = $query_part_two . "\"" . $name . "\",";
			}
			
			// cos
			if (isModified($cos))
			{
				$adding_something = true;
				$query_part_one = $query_part_one . "cos,";
				$query_part_two = $query_part_two . $cos . ",";
			}
		}
		// Inserting into the wayne table
		else if (strcmp($table, "wayne") == 0)
		{
			// extension
			if (isModified($extension))
			{
				$adding_something = true;
				$query_part_one = $query_part_one . "extension,";
				$query_part_two = $query_part_two . $extension . ",";
			}
			// They didn't insert a necessary piece of information
			else
			{
				$missing_required = true;
			}
			
			// type
			if (isModified($type))
			{
				$adding_something = true;
				$query_part_one = $query_part_one . "type,";
				$query_part_two = $query_part_two . "\"" . $type . "\",";
			}
			// They didn't insert a necessary piece of information
			else
			{
				$missing_required = true;
			}
			
			// name
			if (isModified($name))
			{
				$adding_something = true;
				$query_part_one = $query_part_one . "name,";
				$query_part_two = $query_part_two . "\"" . $name . "\",";
			}
			
			// cor
			if (isModified($cor))
			{
				$adding_something = true;
				$query_part_one = $query_part_one . "cor,";
				$query_part_two = $query_part_two . $cor . ",";
			}
			
			// tn
			if (isModified($tn))
			{
				$adding_something = true;
				$query_part_one = $query_part_one . "tn,";
				$query_part_two = $query_part_two . $tn . ",";
			}
			
			// coverpath
			if (isModified($coverpath))
			{
				$adding_something = true;
				$query_part_one = $query_part_one . "coverpath,";
				$query_part_two = $query_part_two . "\"" . $coverpath . "\",";
			}
			
			// cos
			if (isModified($cos))
			{
				$adding_something = true;
				$query_part_one = $query_part_one . "cos,";
				$query_part_two = $query_part_two . $cos . ",";
			}
		}
		// Inserting into the export table
		else if (strcmp($table, "export") == 0)
		{
			// extension
			if (isModified($extension))
			{
				$adding_something = true;
				$query_part_one = $query_part_one . "extension,";
				$query_part_two = $query_part_two . $extension . ",";
			}
			// They didn't insert a necessary piece of information
			else
			{
				$missing_required = true;
			}
			
			// type
			if (isModified($type))
			{
				$adding_something = true;
				$query_part_one = $query_part_one . "type,";
				$query_part_two = $query_part_two . "\"" . $type . "\",";
			}
			// They didn't insert a necessary piece of information
			else
			{
				$missing_required = true;
			}
			
			// port
			if (isModified($port))
			{
				$adding_something = true;
				$query_part_one = $query_part_one . "port,";
				$query_part_two = $query_part_two . "\"" . $port . "\",";
			}
			
			// name
			if (isModified($name))
			{
				$adding_something = true;
				$query_part_one = $query_part_one . "name,";
				$query_part_two = $query_part_two . "\"" . $name . "\",";
			}
			
			// room
			if (isModified($room))
			{
				$adding_something = true;
				$query_part_one = $query_part_one . "room,";
				$query_part_two = $query_part_two . "\"" . $room . "\",";
			}
			
			// jack
			if (isModified($jack))
			{
				$adding_something = true;
				$query_part_one = $query_part_one . "jack,";
				$query_part_two = $query_part_two . "\"" . $jack . "\",";
			}
			
			// cable
			if (isModified($cable))
			{
				$adding_something = true;
				$query_part_one = $query_part_one . "cable,";
				$query_part_two = $query_part_two . "\"" . $cable . "\",";
			}
			
			// floor
			if (isModified($floor))
			{
				$adding_something = true;
				$query_part_one = $query_part_one . "floor,";
				$query_part_two = $query_part_two . "\"" . $floor . "\",";
			}
			
			// building
			if (isModified($building))
			{
				$adding_something = true;
				$query_part_one = $query_part_one . "building,";
				$query_part_two = $query_part_two . "\"" . $building . "\",";
			}
		}
		// They somehow are trying to edit a table that doesn't exist
		else
		{
			// Letting the user know what they did
			print "<p>A table that doesn't exist was provided for the \"Insert Query\" method.</p>";

			// Sets the query to a default query so the page doesn't error out
			$query = "SELECT * FROM akron";
		}
		
		// Finishing off the two query parts
		$query_part_one = substr($query_part_one, 0, strlen($query_part_one) - 1) . ")";
		$query_part_two = substr($query_part_two, 0, strlen($query_part_two) - 1) . ");";
		
		// Making sure everything is as it should be
		// Nothing was actually added, the insert function was just called
		if (!$adding_something)
		{
			// To prevent an error message
			$query_part_one = "SELECT * FROM";
			$query_part_two = " akron";
			
			// Letting the user know they didn't acutally give anything to insert
			print "<p> Nothing was filled out in the text boxes. Therefore, nothing was inserted. </p>";
		}
		// They didn't insert a necessary piece of information
		else if ($missing_required)
		{
			// To prevent an error message
			$query_part_one = "SELECT * FROM";
			$query_part_two = " akron";
			
			// Letting the user know they didn't acutally give anything to insert
			print "<p> Please make sure that both type and extension are given a value. </p>";
		}
		
		// Returning both parts put together as one big query
		return ($query_part_one . $query_part_two);
	}
	
	function constructSpecificViewOrDeleteOrUpdateQuery($the_table, $query)
	{
		// Using all of these global variables
		global $extension, $type, $cor, $tn, $coverpath, $name, $cos, $port, $room, $jack, $cable, $floor, $building;
		
		// Making sure we know when we've already done one addition to the query
		$first_addition = false;
		
		// extension
		if (isModified($extension))
		{
			$first_addition = true;
			$query = $query . " WHERE extension = " . $extension;
		}
		
		// type
		if(isModified($type))
		{
			// It's not the first addition
			if ($first_addition)
			{
				$query = $query . " AND type = \"" . $type . "\"";
			}
			// It's the first addition
			else
			{
				$first_addition = true;
				$query = $query . " WHERE type = \"" . $type . "\"";
			}
		}
		
		// cor
		if(isModified($cor) && strcmp($the_table, "export") != 0)
		{
			// It's not the first addition
			if ($first_addition)
			{
				$query = $query . " AND cor = " . $cor;
			}
			// It's the first addition
			else
			{
				$first_addition = true;
				$query = $query . " WHERE cor = " . $cor;
			}
		}
		// If the issue was that the table doesn't contain the column searched for, the query is tanked
		else if (isModified($cor) && strcmp($the_table, "export") == 0)
		{
			// It's not the first addition
			if ($first_addition)
			{
				$query = $query . " AND extension = -1";
			}
			// It's the first addition
			else
			{
				$first_addition = true;
				$query = $query . " WHERE extension = -1";
			}
		}
		
		// tn
		if(isModified($tn) && strcmp($the_table, "export") != 0)
		{
			// It's not the first addition
			if ($first_addition)
			{
				$query = $query . " AND tn = " . $tn;
			}
			// It's the first addition
			else
			{
				$first_addition = true;
				$query = $query . " WHERE tn = " . $tn;
			}
		}
		// If the issue was that the table doesn't contain the column searched for, the query is tanked
		else if (isModified($tn) && strcmp($the_table, "export") == 0)
		{
			// It's not the first addition
			if ($first_addition)
			{
				$query = $query . " AND extension = -1";
			}
			// It's the first addition
			else
			{
				$first_addition = true;
				$query = $query . " WHERE extension = -1";
			}
		}
		
		// coverpath
		if(isModified($coverpath) && strcmp($the_table, "export") != 0)
		{
			// It's not the first addition
			if ($first_addition)
			{
				$query = $query . " AND coverpath = \"" . $coverpath . "\"";
			}
			// It's the first addition
			else
			{
				$first_addition = true;
				$query = $query . " WHERE coverpath = \"" . $coverpath . "\"";
			}
		}
		// If the issue was that the table doesn't contain the column searched for, the query is tanked
		else if (isModified($coverpath) && strcmp($the_table, "export") == 0)
		{
			// It's not the first addition
			if ($first_addition)
			{
				$query = $query . " AND extension = -1";
			}
			// It's the first addition
			else
			{
				$first_addition = true;
				$query = $query . " WHERE extension = -1";
			}
		}
		
		// name
		if(isModified($name))
		{
			// It's not the first addition
			if ($first_addition)
			{
				$query = $query . " AND name = \"" . $name . "\"";
			}
			// It's the first addition
			else
			{
				$first_addition = true;
				$query = $query . " WHERE name = \"" . $name . "\"";
			}
		}
		
		// cos
		if(isModified($cos) && strcmp($the_table, "export") != 0)
		{
			// It's not the first addition
			if ($first_addition)
			{
				$query = $query . " AND cos = " . $cos;
			}
			// It's the first addition
			else
			{
				$first_addition = true;
				$query = $query . " WHERE cos = " . $cos;
			}
		}
		// If the issue was that the table doesn't contain the column searched for, the query is tanked
		else if (isModified($cos) && strcmp($the_table, "export") == 0)
		{
			// It's not the first addition
			if ($first_addition)
			{
				$query = $query . " AND extension = -1";
			}
			// It's the first addition
			else
			{
				$first_addition = true;
				$query = $query . " WHERE extension = -1";
			}
		}
		
		// port
		if(isModified($port) && strcmp($the_table, "akron") != 0 && strcmp($the_table, "wayne") != 0)
		{
			// It's not the first addition
			if ($first_addition)
			{
				$query = $query . " AND port = \"" . $port . "\"";
			}
			// It's the first addition
			else
			{
				$first_addition = true;
				$query = $query . " WHERE port = \"" . $port . "\"";
			}
		}
		// If the issue was that the table doesn't contain the column searched for, the query is tanked
		else if (isModified($port) && (strcmp($the_table, "akron") == 0 || strcmp($the_table, "wayne") == 0))
		{
			// It's not the first addition
			if ($first_addition)
			{
				$query = $query . " AND extension = -1";
			}
			// It's the first addition
			else
			{
				$first_addition = true;
				$query = $query . " WHERE extension = -1";
			}
		}
		
		// room
		if(isModified($room) && strcmp($the_table, "akron") != 0 && strcmp($the_table, "wayne") != 0)
		{
			// It's not the first addition
			if ($first_addition)
			{
				$query = $query . " AND room = \"" . $room . "\"";
			}
			// It's the first addition
			else
			{
				$first_addition = true;
				$query = $query . " WHERE room = \"" . $room . "\"";
			}
		}
		// If the issue was that the table doesn't contain the column searched for, the query is tanked
		else if (isModified($room) && (strcmp($the_table, "akron") == 0 || strcmp($the_table, "wayne") == 0))
		{
			// It's not the first addition
			if ($first_addition)
			{
				$query = $query . " AND extension = -1";
			}
			// It's the first addition
			else
			{
				$first_addition = true;
				$query = $query . " WHERE extension = -1";
			}
		}
		
		// jack
		if(isModified($jack) && strcmp($the_table, "akron") != 0 && strcmp($the_table, "wayne") != 0)
		{
			// It's not the first addition
			if ($first_addition)
			{
				$query = $query . " AND jack = \"" . $jack . "\"";
			}
			// It's the first addition
			else
			{
				$first_addition = true;
				$query = $query . " WHERE jack = \"" . $jack . "\"";
			}
		}
		// If the issue was that the table doesn't contain the column searched for, the query is tanked
		else if (isModified($jack) && (strcmp($the_table, "akron") == 0 || strcmp($the_table, "wayne") == 0))
		{
			// It's not the first addition
			if ($first_addition)
			{
				$query = $query . " AND extension = -1";
			}
			// It's the first addition
			else
			{
				$first_addition = true;
				$query = $query . " WHERE extension = -1";
			}
		}
		
		// cable
		if(isModified($cable) && strcmp($the_table, "akron") != 0 && strcmp($the_table, "wayne") != 0)
		{
			// It's not the first addition
			if ($first_addition)
			{
				$query = $query . " AND cable = \"" . $cable . "\"";
			}
			// It's the first addition
			else
			{
				$first_addition = true;
				$query = $query . " WHERE cable = \"" . $cable . "\"";
			}
		}
		// If the issue was that the table doesn't contain the column searched for, the query is tanked
		else if (isModified($cable) && (strcmp($the_table, "akron") == 0 || strcmp($the_table, "wayne") == 0))
		{
			// It's not the first addition
			if ($first_addition)
			{
				$query = $query . " AND extension = -1";
			}
			// It's the first addition
			else
			{
				$first_addition = true;
				$query = $query . " WHERE extension = -1";
			}
		}
		
		// floor
		if(isModified($floor) && strcmp($the_table, "akron") != 0 && strcmp($the_table, "wayne") != 0)
		{
			// It's not the first addition
			if ($first_addition)
			{
				$query = $query . " AND floor = \"" . $floor . "\"";
			}
			// It's the first addition
			else
			{
				$first_addition = true;
				$query = $query . " WHERE floor = \"" . $floor . "\"";
			}
		}
		// If the issue was that the table doesn't contain the column searched for, the query is tanked
		else if (isModified($floor) && (strcmp($the_table, "akron") == 0 || strcmp($the_table, "wayne") == 0))
		{
			// It's not the first addition
			if ($first_addition)
			{
				$query = $query . " AND extension = -1";
			}
			// It's the first addition
			else
			{
				$first_addition = true;
				$query = $query . " WHERE extension = -1";
			}
		}
		
		// building
		if(isModified($building) && strcmp($the_table, "akron") != 0 && strcmp($the_table, "wayne") != 0)
		{
			// It's not the first addition
			if ($first_addition)
			{
				$query = $query . " AND building = \"" . $building . "\"";
			}
			// It's the first addition
			else
			{
				$query = $query . " WHERE building = \"" . $building . "\"";
			}
		}
		// If the issue was that the table doesn't contain the column searched for, the query is tanked
		else if (isModified($building) && (strcmp($the_table, "akron") == 0 || strcmp($the_table, "wayne") == 0))
		{
			// It's not the first addition
			if ($first_addition)
			{
				$query = $query . " AND extension = -1";
			}
			// It's the first addition
			else
			{
				$first_addition = true;
				$query = $query . " WHERE extension = -1";
			}
		}
		
		// Adding the final ";" to the query
		$query = $query . ";";
		
		// Returning the complete query
		return $query;
	}

?>
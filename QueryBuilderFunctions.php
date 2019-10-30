

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
			if ($first_addition) // It's not the first addition
			{
				$query = $query . " AND type = \"" . $type_update . "\"";
			}
			else // It is the first addition
			{
				$first_addition = true;
				$query = $query . "type = \"" . $type_update . "\"";
			}
		}
		
		// cor_update
		if(isModified($cor_update) && strcmp($the_table, "export") != 0)
		{
			if ($first_addition) // It's not the first addition
			{
				$query = $query . " AND cor = " . $cor_update;
			}
			else // It is the first addition
			{
				$first_addition = true;
				$query = $query . "cor = " . $cor_update;
			}
		}
		else if (isModified($cor_update) && strcmp($the_table, "export") == 0) // If the issue was that the table doesn't contain the column searched for, the query is tanked
		{
			$query = $query . " FAKE ";
		}
		
		// tn_update
		if(isModified($tn_update) && strcmp($the_table, "export") != 0)
		{
			if ($first_addition) // It's not the first addition
			{
				$query = $query . " AND tn = " . $tn_update;
			}
			else // It is the first addition
			{
				$first_addition = true;
				$query = $query . "tn = " . $tn_update;
			}
		}
		else if (isModified($tn_update) && strcmp($the_table, "export") == 0) // If the issue was that the table doesn't contain the column searched for, the query is tanked
		{
			$query = $query . " FAKE ";
		}
		
		// coverpath_update
		if(isModified($coverpath_update) && strcmp($the_table, "export") != 0)
		{
			if ($first_addition) // It's not the first addition
			{
				$query = $query . " AND coverpath = \"" . $coverpath_update . "\"";
			}
			else // It is the first addition
			{
				$first_addition = true;
				$query = $query . "coverpath = \"" . $coverpath_update . "\"";
			}
		}
		else if (isModified($coverpath_update) && strcmp($the_table, "export") == 0) // If the issue was that the table doesn't contain the column searched for, the query is tanked
		{
			$query = $query . " FAKE ";
		}
		
		// name_update
		if(isModified($name_update))
		{
			if ($first_addition) // It's not the first addition
			{
				$query = $query . " AND name = \"" . $name_update . "\"";
			}
			else // It is the first addition
			{
				$first_addition = true;
				$query = $query . "name = \"" . $name_update . "\"";
			}
		}
		
		// cos_update
		if(isModified($cos_update) && strcmp($the_table, "export") != 0)
		{
			if ($first_addition) // It's not the first addition
			{
				$query = $query . " AND cos = " . $cos_update;
			}
			else // It is the first addition
			{
				$first_addition = true;
				$query = $query . "cos = " . $cos_update;
			}
		}
		else if (isModified($cos_update) && strcmp($the_table, "export") == 0) // If the issue was that the table doesn't contain the column searched for, the query is tanked
		{
			$query = $query . " FAKE ";
		}
		
		// port_update
		if(isModified($port_update) && strcmp($the_table, "akron") != 0 && strcmp($the_table, "wayne") != 0)
		{
			if ($first_addition) // It's not the first addition
			{
				$query = $query . " AND port = \"" . $port_update . "\"";
			}
			else // It is the first addition
			{
				$first_addition = true;
				$query = $query . "port = \"" . $port_update . "\"";
			}
		}
		else if (isModified($port_update) && (strcmp($the_table, "akron") == 0 || strcmp($the_table, "wayne") == 0)) // If the issue was that the table doesn't contain the column searched for, the query is tanked
		{
			$query = $query . " FAKE ";
		}
		
		// room_update
		if(isModified($room_update) && strcmp($the_table, "akron") != 0 && strcmp($the_table, "wayne") != 0)
		{
			if ($first_addition) // It's not the first addition
			{
				$query = $query . " AND room = \"" . $room_update . "\"";
			}
			else // It is the first addition
			{
				$first_addition = true;
				$query = $query . "room = \"" . $room_update . "\"";
			}
		}
		else if (isModified($room_update) && (strcmp($the_table, "akron") == 0 || strcmp($the_table, "wayne") == 0)) // If the issue was that the table doesn't contain the column searched for, the query is tanked
		{
			$query = $query . " FAKE ";
		}
		
		// jack_update
		if(isModified($jack_update) && strcmp($the_table, "akron") != 0 && strcmp($the_table, "wayne") != 0)
		{
			if ($first_addition) // It's not the first addition
			{
				$query = $query . " AND jack = \"" . $jack_update . "\"";
			}
			else // It is the first addition
			{
				$first_addition = true;
				$query = $query . "jack = \"" . $jack_update . "\"";
			}
		}
		else if (isModified($jack_update) && (strcmp($the_table, "akron") == 0 || strcmp($the_table, "wayne") == 0)) // If the issue was that the table doesn't contain the column searched for, the query is tanked
		{
			$query = $query . " FAKE ";
		}
		
		// cable_update
		if(isModified($cable_update) && strcmp($the_table, "akron") != 0 && strcmp($the_table, "wayne") != 0)
		{
			if ($first_addition) // It's not the first addition
			{
				$query = $query . " AND cable = \"" . $cable_update . "\"";
			}
			else // It is the first addition
			{
				$first_addition = true;
				$query = $query . "cable = \"" . $cable_update . "\"";
			}
		}
		else if (isModified($cable_update) && (strcmp($the_table, "akron") == 0 || strcmp($the_table, "wayne") == 0)) // If the issue was that the table doesn't contain the column searched for, the query is tanked
		{
			$query = $query . " FAKE ";
		}
		
		// floor_update
		if(isModified($floor_update) && strcmp($the_table, "akron") != 0 && strcmp($the_table, "wayne") != 0)
		{
			if ($first_addition) // It's not the first addition
			{
				$query = $query . " AND floor = \"" . $floor_update . "\"";
			}
			else // It is the first addition
			{
				$first_addition = true;
				$query = $query . "floor = \"" . $floor_update . "\"";
			}
		}
		else if (isModified($floor_update) && (strcmp($the_table, "akron") == 0 || strcmp($the_table, "wayne") == 0)) // If the issue was that the table doesn't contain the column searched for, the query is tanked
		{
			$query = $query . " FAKE ";
		}
		
		// building_update
		if(isModified($building_update) && strcmp($the_table, "akron") != 0 && strcmp($the_table, "wayne") != 0)
		{
			if ($first_addition) // It's not the first addition
			{
				$query = $query . " AND building = \"" . $building_update . "\"";
			}
			else // It is the first addition
			{
				$query = $query . "building = \"" . $building_update . "\"";
			}
		}
		else if (isModified($building_update) && (strcmp($the_table, "akron") == 0 || strcmp($the_table, "wayne") == 0)) // If the issue was that the table doesn't contain the column searched for, the query is tanked
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
		
		if (strcmp($table, "akron") == 0) // Inserting into the akron table
		{
			// extension
			if (isModified($extension))
			{
				$adding_something = true;
				$query_part_one = $query_part_one . "extension,";
				$query_part_two = $query_part_two . $extension . ",";
			}
			else // They didn't insert a necessary piece of information
			{
				$missing_required = true;
			}
			
			// type
			if (isModified($type))
			{
				$adding_something = true;
				$query_part_one = $query_part_one . "type,";
				$query_part_two = $query_part_two . "\"" . $type . "\",";
			}else // They didn't insert a necessary piece of information
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
		else if (strcmp($table, "wayne") == 0) // Inserting into the wayne table
		{
			// extension
			if (isModified($extension))
			{
				$adding_something = true;
				$query_part_one = $query_part_one . "extension,";
				$query_part_two = $query_part_two . $extension . ",";
			}
			else // They didn't insert a necessary piece of information
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
			else // They didn't insert a necessary piece of information
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
		else if (strcmp($table, "export") == 0) // Inserting into the export table
		{
			// extension
			if (isModified($extension))
			{
				$adding_something = true;
				$query_part_one = $query_part_one . "extension,";
				$query_part_two = $query_part_two . $extension . ",";
			}
			else // They didn't insert a necessary piece of information
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
			else // They didn't insert a necessary piece of information
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
		if (!$adding_something) // Nothing was actually added, the insert function was just called
		{
			// To prevent an error message
			$query_part_one = "SELECT * FROM";
			$query_part_two = " akron";
			
			// Letting the user know they didn't acutally give anything to insert
			print "<p> Nothing was filled out in the text boxes. Therefore, nothing was inserted. </p>";
		}
		else if ($missing_required) // They didn't insert a necessary piece of information
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
			if ($first_addition) // It's not the first addition
			{
				$query = $query . " AND type = \"" . $type . "\"";
			}
			else // It is the first addition
			{
				$first_addition = true;
				$query = $query . " WHERE type = \"" . $type . "\"";
			}
		}
		
		// cor
		if(isModified($cor) && strcmp($the_table, "export") != 0)
		{
			if ($first_addition) // It's not the first addition
			{
				$query = $query . " AND cor = " . $cor;
			}
			else // It is the first addition
			{
				$first_addition = true;
				$query = $query . " WHERE cor = " . $cor;
			}
		}
		else if (isModified($cor) && strcmp($the_table, "export") == 0) // If the issue was that the table doesn't contain the column searched for, the query is tanked
		{
			if ($first_addition) // It's not the first addition
			{
				$query = $query . " AND extension = -1";
			}
			else // It is the first addition
			{
				$first_addition = true;
				$query = $query . " WHERE extension = -1";
			}
		}
		
		// tn
		if(isModified($tn) && strcmp($the_table, "export") != 0)
		{
			if ($first_addition) // It's not the first addition
			{
				$query = $query . " AND tn = " . $tn;
			}
			else // It is the first addition
			{
				$first_addition = true;
				$query = $query . " WHERE tn = " . $tn;
			}
		}
		else if (isModified($tn) && strcmp($the_table, "export") == 0) // If the issue was that the table doesn't contain the column searched for, the query is tanked
		{
			if ($first_addition) // It's not the first addition
			{
				$query = $query . " AND extension = -1";
			}
			else // It is the first addition
			{
				$first_addition = true;
				$query = $query . " WHERE extension = -1";
			}
		}
		
		// coverpath
		if(isModified($coverpath) && strcmp($the_table, "export") != 0)
		{
			if ($first_addition) // It's not the first addition
			{
				$query = $query . " AND coverpath = \"" . $coverpath . "\"";
			}
			else // It is the first addition
			{
				$first_addition = true;
				$query = $query . " WHERE coverpath = \"" . $coverpath . "\"";
			}
		}
		else if (isModified($coverpath) && strcmp($the_table, "export") == 0) // If the issue was that the table doesn't contain the column searched for, the query is tanked
		{
			if ($first_addition) // It's not the first addition
			{
				$query = $query . " AND extension = -1";
			}
			else // It is the first addition
			{
				$first_addition = true;
				$query = $query . " WHERE extension = -1";
			}
		}
		
		// name
		if(isModified($name))
		{
			if ($first_addition) // It's not the first addition
			{
				$query = $query . " AND name = \"" . $name . "\"";
			}
			else // It is the first addition
			{
				$first_addition = true;
				$query = $query . " WHERE name = \"" . $name . "\"";
			}
		}
		
		// cos
		if(isModified($cos) && strcmp($the_table, "export") != 0)
		{
			if ($first_addition) // It's not the first addition
			{
				$query = $query . " AND cos = " . $cos;
			}
			else // It is the first addition
			{
				$first_addition = true;
				$query = $query . " WHERE cos = " . $cos;
			}
		}
		else if (isModified($cos) && strcmp($the_table, "export") == 0) // If the issue was that the table doesn't contain the column searched for, the query is tanked
		{
			if ($first_addition) // It's not the first addition
			{
				$query = $query . " AND extension = -1";
			}
			else // It is the first addition
			{
				$first_addition = true;
				$query = $query . " WHERE extension = -1";
			}
		}
		
		// port
		if(isModified($port) && strcmp($the_table, "akron") != 0 && strcmp($the_table, "wayne") != 0)
		{
			if ($first_addition) // It's not the first addition
			{
				$query = $query . " AND port = \"" . $port . "\"";
			}
			else // It is the first addition
			{
				$first_addition = true;
				$query = $query . " WHERE port = \"" . $port . "\"";
			}
		}
		else if (isModified($port) && (strcmp($the_table, "akron") == 0 || strcmp($the_table, "wayne") == 0)) // If the issue was that the table doesn't contain the column searched for, the query is tanked
		{
			if ($first_addition) // It's not the first addition
			{
				$query = $query . " AND extension = -1";
			}
			else // It is the first addition
			{
				$first_addition = true;
				$query = $query . " WHERE extension = -1";
			}
		}
		
		// room
		if(isModified($room) && strcmp($the_table, "akron") != 0 && strcmp($the_table, "wayne") != 0)
		{
			if ($first_addition) // It's not the first addition
			{
				$query = $query . " AND room = \"" . $room . "\"";
			}
			else // It is the first addition
			{
				$first_addition = true;
				$query = $query . " WHERE room = \"" . $room . "\"";
			}
		}
		else if (isModified($room) && (strcmp($the_table, "akron") == 0 || strcmp($the_table, "wayne") == 0)) // If the issue was that the table doesn't contain the column searched for, the query is tanked
		{
			if ($first_addition) // It's not the first addition
			{
				$query = $query . " AND extension = -1";
			}
			else // It is the first addition
			{
				$first_addition = true;
				$query = $query . " WHERE extension = -1";
			}
		}
		
		// jack
		if(isModified($jack) && strcmp($the_table, "akron") != 0 && strcmp($the_table, "wayne") != 0)
		{
			if ($first_addition) // It's not the first addition
			{
				$query = $query . " AND jack = \"" . $jack . "\"";
			}
			else // It is the first addition
			{
				$first_addition = true;
				$query = $query . " WHERE jack = \"" . $jack . "\"";
			}
		}
		else if (isModified($jack) && (strcmp($the_table, "akron") == 0 || strcmp($the_table, "wayne") == 0)) // If the issue was that the table doesn't contain the column searched for, the query is tanked
		{
			if ($first_addition) // It's not the first addition
			{
				$query = $query . " AND extension = -1";
			}
			else // It is the first addition
			{
				$first_addition = true;
				$query = $query . " WHERE extension = -1";
			}
		}
		
		// cable
		if(isModified($cable) && strcmp($the_table, "akron") != 0 && strcmp($the_table, "wayne") != 0)
		{
			if ($first_addition) // It's not the first addition
			{
				$query = $query . " AND cable = \"" . $cable . "\"";
			}
			else // It is the first addition
			{
				$first_addition = true;
				$query = $query . " WHERE cable = \"" . $cable . "\"";
			}
		}
		else if (isModified($cable) && (strcmp($the_table, "akron") == 0 || strcmp($the_table, "wayne") == 0)) // If the issue was that the table doesn't contain the column searched for, the query is tanked
		{
			if ($first_addition) // It's not the first addition
			{
				$query = $query . " AND extension = -1";
			}
			else // It is the first addition
			{
				$first_addition = true;
				$query = $query . " WHERE extension = -1";
			}
		}
		
		// floor
		if(isModified($floor) && strcmp($the_table, "akron") != 0 && strcmp($the_table, "wayne") != 0)
		{
			if ($first_addition) // It's not the first addition
			{
				$query = $query . " AND floor = \"" . $floor . "\"";
			}
			else // It is the first addition
			{
				$first_addition = true;
				$query = $query . " WHERE floor = \"" . $floor . "\"";
			}
		}
		else if (isModified($floor) && (strcmp($the_table, "akron") == 0 || strcmp($the_table, "wayne") == 0)) // If the issue was that the table doesn't contain the column searched for, the query is tanked
		{
			if ($first_addition) // It's not the first addition
			{
				$query = $query . " AND extension = -1";
			}
			else // It is the first addition
			{
				$first_addition = true;
				$query = $query . " WHERE extension = -1";
			}
		}
		
		// building
		if(isModified($building) && strcmp($the_table, "akron") != 0 && strcmp($the_table, "wayne") != 0)
		{
			if ($first_addition) // It's not the first addition
			{
				$query = $query . " AND building = \"" . $building . "\"";
			}
			else // It is the first addition
			{
				$query = $query . " WHERE building = \"" . $building . "\"";
			}
		}
		else if (isModified($building) && (strcmp($the_table, "akron") == 0 || strcmp($the_table, "wayne") == 0)) // If the issue was that the table doesn't contain the column searched for, the query is tanked
		{
			if ($first_addition) // It's not the first addition
			{
				$query = $query . " AND extension = -1";
			}
			else // It is the first addition
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
<?php

function authenticate($apiKey) {
	if(isset($_COOKIE['aphiorhorhoAuthenticated']) ) {
		return true;
	}

	else if ($apiKey == 'A197638E4B52E74DCA5A2E58A8172') {
		setcookie('aphiorhorhoAuthenticated', 'wakawaka', time() + (86400), '/');
		return true;
	}

	else {
		return false;
	}
}

function parseJsonFromSQL($results) {

    $response = array();
    
    if ($results != false) {

        while($row = $results->fetch_assoc()) {
            array_push($response, $row);
        }

        return json_encode($response);
    }

    return;
}

// SQL helpers
function db_update($table, $values, $where) {
	$query = "UPDATE " . $table . " SET ";

	// construct values to update
	$first = true;
	foreach($values as $key => $value) {
		
		// ignore _id and apiKey params
		if($key == "_id" || $key == "apiKey") {
			continue;	
		}

		if($first == true) {
			$query .= $key . " ='" . $value . "'";
			$first = false;
		}
		else {
			$query .= ", " . $key . "='" . $value . "'";
		}
	}

	// construct where clause
	if( !is_null($where) && count($where) != 0 ) {
		$query .= " WHERE ";

		$first = true;
		foreach($where as $key => $value) {
			if($first == true) {
				$query .= $key . " ='" . $value . "'";
				$first = false;
			}
			else {
				$query .= ", " . $key . "='" . $value . "'";
			}
		}
	}

	return $query;
}

function db_select($table, $where, $between, $order, $limit, $offset) {
	$query = "SELECT * FROM " . $table;

	// construct where clause
	if( !is_null($where) && count($where) != 0 ) {
		$query .= " WHERE ";

		$first = true;
		foreach($where as $key => $value) {
			if($first == true) {
				
				// bitwise AND to filter events
				if($key == 'event_code') {
					$query .= $key . " & '" . $value . "' != 0";
				} else {
					$query .= $key . " ='" . $value . "'";
				}

				$first = false;
			}
			else {

				// bitwise AND to filter events
				if($key == 'event_code') {
					$query .= ", " . $key . " & '" . $value . "' != 0";
				} else {
					$query .= ", " . $key . "='" . $value . "'";
				}
			}
		}

		if (strlen($between) != 0) {
			$query .= ' AND ' . $between;	
		}
		
	} else {

		// between conditions
		if (strlen($between) != 0) {
			$query .= ' WHERE ' . $between;	
		}
	}

	// add ordering for events
	if ( !is_null($order) ) {
		$query .= ' ORDER BY ' . $order;
	}

	// add limit for events
	if ( !is_null($limit) ) {
		$query .= ' LIMIT ' . $limit;
	}

	// add offset for events
	if ( !is_null($offset) ) {
		$query .= ' OFFSET ' . $offset;
	}

	return $query;
}

function db_select_join($table, $join, $where) {
	$query = "SELECT * FROM ";

	foreach ($table as $key => $value) {
		if ($key == "name") {
			$query .= $value;
		} else {
			$query .= " as " . $value;
		}
	}
	
	foreach ($join as $j) {
		$query .= " JOIN " . $j["table"];
		$query .= " as " . $j["alias"];
		$query .= " on " . $j["on"];
	}

	$query .= " WHERE " . $where;
	return $query;
}

// function db_insert($table, $values, $where) {

// }

?>
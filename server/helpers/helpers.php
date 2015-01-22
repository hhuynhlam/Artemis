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
			if ($key == "password") {
				$query .= $key . "=MD5('" . $value . "')";
			} else {
				$query .= $key . " ='" . $value . "'";
				$first = false;
			}
		}
		else {
			if($key == "password") {
				$query .= ", " . $key . "=MD5('" . $value . "')";
			} else {
				$query .= ", " . $key . "='" . $value . "'";
			}
		}
	}

	// construct where clause
	if( !is_null($where) ) {
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

// function db_select($table, $values, $where) {

// }

// function db_insert($table, $values, $where) {

// }

?>
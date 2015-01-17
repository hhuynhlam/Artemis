<?php

function authenticate($apiKey) {
	if(isset($_COOKIE['aphiorhorhoAuthenticated']) ) {
		return true;
	}

	else if ($apiKey == 'RI$1h7Kztf2]%"qmI%5S9CphFZJ35t') {
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

?>
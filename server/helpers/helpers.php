<?php

function authenticate($apiKey) {
	if(!empty($_COOKIE['com.aphiorhorho.authenticated']) ) {
		return true;
	}

	else if ($apiKey == 'RI$1h7Kztf2]%"qmI%5S9CphFZJ35t') {
		setcookie('com.aphiorhorho.authenticated', true, time() + (86400));
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
<?php

function authenticate($apiKey) {
	if ($apiKey == 'A197638E4B52E74DCA5A2E58A8172') {
		return true;
	}

	else {
		return false;
	}
}

function returnDataJSON($result, $name) {
    echo json_encode(json_decode($result)->$name);
}
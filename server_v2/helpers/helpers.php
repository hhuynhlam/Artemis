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

?>
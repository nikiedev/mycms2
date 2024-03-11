<?php

/**
 * Get the client IP address.
 *
 * @return string
 */
function getIpAddress() {
	if (!empty($_SERVER['HTTP_CLIENT_IP'])) {
		return $_SERVER['HTTP_CLIENT_IP'];
	} else if (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
		$ips = explode(',', $_SERVER['HTTP_X_FORWARDED_FOR']);
		return trim($ips[count($ips) - 1]);
	} else {
		return $_SERVER['REMOTE_ADDR'];
	}
}

echo getIpAddress();

?>
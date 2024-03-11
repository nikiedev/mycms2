<?php

function getFilteredServerIpAddress($ip) {
		return trim($ip, " .,+-/*%^#!@&?><()$=\t\n\r\0\x0B");
}

echo getFilteredServerIpAddress('46.174.55.206:27015');
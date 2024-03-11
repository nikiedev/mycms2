<?php

// Время в прошлом, сколько прошло с определенного момента
function getHumanTimeDiff($strTime) {
	$dtNow = time();
	$dtTime = strtotime($strTime);
	$diff = $dtNow - $dtTime;

	if ($diff >= 0 && $diff < 15) {
		// если разница меньше 15 секунд, считаем условно,
		// что событие случилось "только что"
		return 'только что';
	} else if ($diff >= 15 && $diff < 60) {
		// разница меньше минуты => ...секунд назад
		return $diff . " " . 'сек. назад';
	} else if ($diff >= 60 && $diff < 3600) {
		// разница меньше часа => ...минут назад
		return floor($diff/60) . " " . 'мин. назад.';
	} else if ($diff >= 3600 && $diff < 86400) {
		// разница меньше суток => ...часов назад
		return floor($diff/3600) . " " . 'ч. назад';
	} else if ($diff >= 86400 && $diff < 2592000) {
		// разница меньше месяца => ...дней назад
		return floor($diff/86400) . " " . 'дн. назад';
	} else if ($diff >= 2592000) {
		// разница меньше года
		return 'более месяца назад';
	}

	return '';
}
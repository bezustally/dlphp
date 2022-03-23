<?php

function checkVisitName(string $name): bool {
	return !!preg_match('/^\d{4}\-\d{2}\-\d{2}\.txt$/', $name);
}

function hasVisitsDay(string $day): bool {
	$path = 'db/logs';
	return checkVisitName($day) && file_exists("$path/$day");
}

function getVisitsDays(): array {
	$path = 'db/logs';
	$files = scandir($path);

	return array_filter($files, function ($file) {
		$path = 'db/logs';
		return is_file("$path/$file") && checkVisitName($file);
	});
}

function isValidUrl(string $url): bool {
	return !!preg_match('/^[aA-zZ0-9-_\/\?\.=&]*$/', $url);
}

function getVisits(string $dt): array {
	$path = 'db/logs';
	$lines = file("$path/$dt");

	return array_map(function ($line) {
		$log = json_decode(rtrim($line), true);
		$log['isDanger'] = !isValidUrl($log['uri']);
		return $log;
	}, $lines);
}

function addVisitLog(): bool {
	$path = 'db/logs';
	$logName = date("Y-m-d");

	$info = [
		'dt' => date("H:i:s"),
		'ip' => $_SERVER['REMOTE_ADDR'],
		'uri' => $_SERVER['REQUEST_URI'],
		'referer' => $_SERVER['HTTP_REFERER'] ?? ''
	];

	$log = json_encode($info) . "\n";
	file_put_contents("$path/$logName.txt", $log, FILE_APPEND);
	return true;
}

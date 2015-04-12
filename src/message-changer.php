<?php

function changeMessage($message, $action) {
	$words = explode(' ', $message);
	$rand = rand(0, count($words) - 1);
	$words[$rand] = getNewWord($words[$rand], $action);
	return implode(' ', $words);
}

function getNewWord($oldWord, $action) {
	switch ($action) {
		case 'autopilot':
			if (strlen($oldWord) > 2) {
				$oldWord = findDictionaryWord(substr($oldWord, 0, 2));
			}
			return $oldWord;

		case 'autopilot-u':
			return findDictionaryWord('', true);

		case 'interactive':
			return '___';
		default:
			return 'Y U Put the wrong action?!?!?!?';
	}
}

function findDictionaryWord($subWord, $urban = false) {
	$contents = file($urban ? 'urban-words.txt' : 'words.txt');
	$matches = [];
	foreach ($contents as $line) {
		if ($urban || strpos(strtolower($line), strtolower($subWord)) === 0) {
			$matches[] = $line;
		}
	}
	$rand = rand(0, count($matches) - 1);
	return trim($matches[$rand]);
}

echo(changeMessage($_POST['message'], $_POST['action']));
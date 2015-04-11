<?php

function changeMessage($message, $action){
    $words = explode(' ', $message);
    $rand = rand(0, count($words)-1);
    $words[$rand] = getNewWord($words[$rand], $action);
    return implode(' ',$words);
}

function getNewWord($oldWord, $action){
    switch($action){
        case 'autopilot':
            if(strlen($oldWord) >2){
               $oldWord = findDictionaryOf(substr($oldWord,0, 2));
            }
            return $oldWord;
        case 'interactive':
            return '___';
        default:
            return 'Y U Put the wrong action?!?!?!?';
    }
}

function findDictionaryOf($subWord){
    $contents = file('words.txt');
    $matches = [];
    foreach($contents as $line){
        if(strpos(strtolower($line), strtolower($subWord)) === 0){
            $matches[] = $line;
        }
    }
    $rand = rand(0, count($matches)-1);
    return trim($matches[$rand]);
}

echo(changeMessage($_POST['message'], $_POST['action']));
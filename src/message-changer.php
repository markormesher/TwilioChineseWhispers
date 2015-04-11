<?php

function changeMessage($message, $source){
    $words = explode(' ', $message);
    $rand = rand(0, count($words)-1);
    $words[$rand] = getNewWord($words[$rand], $source);
    return implode(' ',$words);
}

function getNewWord($oldWord, $source){
    switch($source){
        case 'dictionary':
            if(strlen($oldWord) >2){
               $oldWord = findDictionaryOf(substr($oldWord,0, 2));
            }
            return $oldWord;
        default:
            return 'Y U Put the wrong source?!?!?!?';
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

echo(changeMessage($_POST['message'], $_POST['source']));
<?php

function changeMessage($message, $source){
    $words = explode(' ', $message);
    $rand = rand(0, count($words)-1);
    $words[$rand] = getNewWord($words[$rand], $source);
    return implode(' ',$words);
}

function getNewWord($oldWord, $source){
    switch($source){
        case 'urbandictionary':
            if(strlen($oldWord) >3){
               $oldWord = findUrbanOf(substr($oldWord,0, 3));
            }
            return $oldWord;
        default:
            return 'Y U Put the wrong source?!?!?!?';
    }
}

function findUrbanOf($subWord){
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
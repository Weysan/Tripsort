<?php
$decode = json_decode(file_get_contents(__DIR__.'/cards.json'));

$tmp = array();
foreach($decode as $card){
    $tmp[] = $card;
}

shuffle($tmp);

$class = new stdClass();
foreach($tmp as $k => $card){
    $class->$k = $card;
}

$json = json_encode($class);

$f = fopen(__DIR__ . '/cards_random.json', 'w+');
fputs($f, $json, strlen($json));
fclose($f);
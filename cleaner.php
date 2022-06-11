<?php

$data = file_get_contents('json/firstPageLinks.json');
$data = json_decode($data, true);

foreach($data as $key => &$value){
    $value = str_replace('//wiki', '/wiki', $value);
}

$data = array_unique($data);
$data = array_values($data);

$data = json_encode($data, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES);
file_put_contents('json/firstPageLinks.json', $data);
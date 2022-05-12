<?php

error_reporting(E_ALL);
//ini_set('max_execution_time', 0);

require 'simple_html_dom.php';

$links = []; // Итоговый массив ссылок
$prefix = 'https://en.wikipedia.org/';
$url = 'https://en.wikipedia.org/wiki/List_of_television_networks_by_country';

$html = file_get_html($url);

foreach($html->find('.mw-parser-output ol li a') as $key => $value){
    $title = $value->getAttribute('title');
    if(isset($title) && $title !== null && strpos($title, '(page does not exist)') == false){
        $links[] = $prefix . $value->getAttribute('href');
    }
}

$links = array_unique($links);

echo "<pre>";
var_dump($links);
echo "</pre>";
<?php

error_reporting(E_ALL);
//ini_set('max_execution_time', 0);

require 'simple_html_dom.php';

$firstPageLinks = []; // Итоговый массив ссылок
$prefix = 'https://en.wikipedia.org/';
$url = 'https://en.wikipedia.org/wiki/List_of_television_stations_in_Sweden';

$html = file_get_html($url);

foreach($html->find('.mw-parser-output ul li a') as $key => $value){
    $title = $value->getAttribute('title');
    if(isset($title) && $title !== null && strpos($title, '(page does not exist)') == false){
        $link = $prefix . $value->getAttribute('href');
        if(substr_count($link, 'http') > 1) continue;

        $firstPageLinks[] = $link;
    }
}

$firstPageLinks = array_unique($firstPageLinks);
$firstPageLinks = array_values($firstPageLinks);

$firstPageLinks = json_encode($firstPageLinks, JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE);
file_put_contents('json/page.json', $firstPageLinks);
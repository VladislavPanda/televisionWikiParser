<?php

error_reporting(E_ALL);
//ini_set('max_execution_time', 0);

require 'simple_html_dom.php';

$firstPageLinks = []; // Итоговый массив ссылок
$prefix = 'https://en.wikipedia.org/';
$url = 'https://en.wikipedia.org/wiki/List_of_television_networks_by_country';

$html = file_get_html($url);

foreach($html->find('.mw-parser-output ol li a') as $key => $value){
    $title = $value->getAttribute('title');
    if(isset($title) && $title !== null && strpos($title, '(page does not exist)') == false){
        $link = $prefix . $value->getAttribute('href');
        if(substr_count($link, 'https') > 1) continue;
        if(strpos($link, 'https') !== false && strpos($link, 'http') !== false) continue;

        $links[] = $link;
    }
}

$links = array_unique($links);
$links = array_values($links);

$links = json_encode($links, JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE);
file_put_contents('json/firstPageLinks.json', $links);
<?php

error_reporting(E_ALL);
//ini_set('max_execution_time', 0);

require 'simple_html_dom.php';
$url = 'https://en.wikipedia.org/wiki/List_of_television_networks_by_country';

$html = file_get_html($url);

echo "<pre>";
var_dump($html);
echo "</pre>";
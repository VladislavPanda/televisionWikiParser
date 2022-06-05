<?php

error_reporting(E_ALL);
//ini_set('max_execution_time', 0);

require 'simple_html_dom.php';

$firstPageLinks = []; // Итоговый массив ссылок
$prefix = 'https://en.wikipedia.org/';
$url = 'https://en.wikipedia.org/wiki/List_of_television_networks_by_country';

$html = file_get_html($url);


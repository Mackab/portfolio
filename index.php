<?php

$requestPage = $_SERVER['REQUEST_URI'];

switch ($requestPage) {
    case '/':
        require 'views/index.view.php';
        break;
    case '/views/about.view.php':
        require 'views/about.view.php';
        break;
}
<?php

session_start();

// Router
$template = $_GET['page']??'home';
$template .= '.phtml';

require 'models/main.php';
require 'controllers/WordController.php';
require 'controllers/UtilesController.php';

$word = new Word;
$utiles = new Utiles;

require 'views/layout.phtml';

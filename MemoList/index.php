<?php

session_start();

if(!isset($_SESSION['goodPoints'])){
    $_SESSION['goodPoints'] = 0;
    $_SESSION['badPoints'] = 0;
}

$template = $_GET['page']??'home';

$template .= '.phtml';

// $word = "Bien";
// $word2 = "Mezziane";

require 'models/main.php';
require 'controllers/WordController.php';

$word = new Word;
$word->ChooseRandowWord();
$word->CheckAnswer();
// session_destroy();
// var_dump($list);

require 'controllers/EyeController.php';

require 'views/layout.phtml';

<?php
//Этот файл должен проводить перевод с сокращенной ссылки на длинную ссылку в базе данных, но не работает, возможно проблема в одинарных кавычках,
//но я попробовал и не работает, есть серьезный вопрос нужен ли в конце header'а адрес url?
session_start();
  require_once "shortener.php";
  require_once "classes/shortener.php";
  require_once "shorten.php";

  if(isset($_GET['code'])) {
    print_r("fine!");
   $s = new Shortener();
   $code = $_GET['code'];
   if($url = $s->getUrl($code)) {
    header("Location: {$url}");
    exit();
   }
  } else {
    echo "fuck you";
  }
  echo "fuck you2";
  header("Location: {index.php}");
?>

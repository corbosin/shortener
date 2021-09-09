<?php
//Этот файл должен проводить перевод с сокращенной ссылки на длинную ссылку в базе данных, но не работает, возможно проблема в одинарных кавычках,
//но я попробовал и не работает, есть серьезный вопрос нужен ли в конце header'а адрес url?
  require_once "shortener.php";


  if(htmlspecialchars(isset($_GET['code']))) {
   $s = new Shortener();
   $code = $_GET['code'];
   if($url = $s->getUrl($code)) {
    header("Location: {$url}");
    exit();
   }
  }
?>

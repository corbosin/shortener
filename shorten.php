<?php
  session_start();
  require_once "shortener.php";

  $s = new Shortener();

  if(isset($_POST['url'])) {
   $url = $_POST['url'];

   if($code = $s->makeCode($url)) {
    $_SESSION['feedback'] = "Готово! Вот ваша ссылка: <a href='http://localhost:3333/$code'>http://localhost:3333/$code</a>";
   } else {
    $_SESSION['feedback'] = "Ошибка! Возможно, некорректный URL?";
    if(!$_SESSION) {
      die('error what');
    }
   }
  }
  header('Location: index.php');
?>

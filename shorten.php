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
<<<<<<< HEAD
    if(!$_SESSION) {
      die('error what');
    }
=======
>>>>>>> 2d73004909511acd559ddf26f63a16d944ef3b87
   }
  }
  header('Location: index.php');
?>

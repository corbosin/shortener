<?php
  session_start();
  require_once "shortener.php";


  $s = new Shortener();

  if(isset($_POST['url'])) {
   $url = $_POST['url'];

   if($code = $s->makeCode($url)) {
    $_SESSION['feedback'] = "Готово! Вот ваша ссылка: <a href='http://d4a3fd95-7741-4559-b326-095c66e1b985.pub.instances.scw.cloud/?code=$code'>http://d4a3fd95-7741-4559-b326-095c66e1b985.pub.instances.scw.cloud/?code=$code</a>";

   } else {
    $_SESSION['feedback'] = "Ваша ссылка уже есть! Возможно, <a href='http://d4a3fd95-7741-4559-b326-095c66e1b985.pub.instances.scw.cloud/?code=$code'>http://d4a3fd95-7741-4559-b326-095c66e1b985.pub.instances.scw.cloud/?code=$code";
    if(!$_SESSION) {
      die('error what');
    }
   }
  }
  header('Location: index.php');
?>

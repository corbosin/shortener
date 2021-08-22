<?php
<<<<<<< HEAD
  require_once "shortener.php";
=======
  require_once "classes/shortener.php";
>>>>>>> 2d73004909511acd559ddf26f63a16d944ef3b87

  if(isset($_GET['code'])) {
   $s = new Shortener();
   $code = $_GET['code'];
   if($url = $s->getUrl($code)) {
    header('Location: {$url}');
    exit();
   }
  }

  header('Location: index.php');
?>

<?php
//Здесь проходит продолжение индекс.пхп, а именно вызывается функция, которая генерирует ссылку и записывает её в субд. В данный момент не работает
//и не выдает ссылку из субд если такая уже там ест, а выдает ошибку, при этом переход по сссылке ведет на индекс.пхп (судя по всему это должно быть
//прописано в хедере внизу страницы, но как нужную ссылку сопоставить с субд я хз)
  session_start();
  require_once "shortener.php";


  $s = new Shortener();

  if(isset($_POST['url'])) {
   $url = $_POST['url'];

   if($code = $s->makeCode($url)) {
    $_SESSION['feedback'] = "Готово! Вот ваша ссылка: <a href='http://localhost:3333/?code=$code'>http://localhost:3333/?code=$code</a>";
    
   } else {
    $_SESSION['feedback'] = "Ваша ссылка уже есть! Возможно, <a href='http://localhost:3333/?code=$code'>http://localhost:3333/?code=$code</a>";
    if(!$_SESSION) {
      die('error what');
    }
   }
  }
  header('Location: index.php');
?>

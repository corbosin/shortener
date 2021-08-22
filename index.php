<?php
  session_start();
?>
<!DOCTYPE html>
<html lang="ru">
<head>
  <meta charset="UTF-8">
  <title>Сокращатель URL</title>
  <link rel="stylesheet" href="style.css">
</head>
<body>
  <div class="container">
   <h1 class="title">Сокращатель URL</h1>
<?php
  if(isset($_SESSION['feedback'])) {
   echo "<p>".$_SESSION['feedback']."</p>";
   unset($_SESSION['feedback']);
  }
?>
   <form action="shorten.php" method="post">
    <input type="text" name="url" placeholder="Введите URL" autocomplete="off">
    <input type="url" name="url" placeholder="Введите URL" autocomplete="off">
    <input type="submit" value="Сократить">
   </form>
  </div>
</body>
</html>

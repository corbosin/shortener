<?php
//здесь записаны все функции внутри класса Shortener
//  0) Заочно скажу, что я допустил ошибку в именовании, поэтому неудобно их смотреть, но в целом таблица называется url_short, а графа с коротким url 
//     называется short_url
//  1) функция констракт открывает нужную таблицу
//  2) функция generateCode создает случайнй код размером от 10 до 36  символов и ставит его в переменную num
//  3) функция makeCode выполняет много задач
//      3.1) $url - создается переменная, в которой всё экранируется, то есть чтобы спецсимволы не мешали
//      3.2) $exists - достает короткую версию $url из таблицы из той графы, где длинная ссылка равна той, что ввел пользователь (т.е. эта часть должна избавлять от повторов)
//      3.3) num_rows не могу понять что делает, в такой форме его вообще не записывают в мануалах, но видимо определяет сколько рядов я смотрю, но
//           мне это это не говорит нормально ни о чем и как он находит нужную строку
//      3.4) $getUrl - фунция, которая должна перенаправлять

class Shortener {
   protected $db;

   public function __construct() {
    $this->db = new Mysqli('localhost', 'yellow', '31101993', 'shortener');
   }

   public function generateCode($num) {
    return base_convert($num, 10, 36);
   }

   public function makeCode($url) {

    $url = $this->db->escape_string($url);

    $exsists = $this->db->query("SELECT short_url FROM url_short WHERE long_url = '{$url}'");

    if($exsists->num_rows) {
     return $exsists->fetch_object()->code;
    } else {
     $this->db->query("INSERT INTO url_short(long_url) VALUE('{$url}')");

     $code = $this->generateCode($this->db->insert_id);

     $this->db->query("UPDATE url_short SET short_url = '{$code}' WHERE long_url = '{$url}'");

     return $code;
    }
   }

   public function getUrl($code) {
    $code = $this->db->escape_string($code);
    $code = $this->db->query("SELECT long_url FROM url_short WHERE short_url = '$code'");

    if($code->num_rows) {
     return $code->fetch_object()->long_url;
    }

    return '';
   }
  }
?>

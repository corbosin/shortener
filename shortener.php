<?php
  class Shortener {
   protected $db;

   public function __construct() {
    $this->db = new Mysqli('localhost', 'yellow', '31101993', 'shortener');
   }

<<<<<<< HEAD

  public function generateCode($num) {
    return base_convert($num, 10, 36);
  }
   //public function generateCode($length= 6) {
     // $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
      //$charactersLength = strlen($characters);
      //$randomString = $characters[rand(0, $charactersLength - 20)];
      //return $randomString;
   //}

   public function makeCode($url) {

    $url = $this->db->escape_string($url); //экранирую стhjrb

    $exsists = $this->db->query("SELECT short_url FROM url_short WHERE long_url = '{$url}'");
    
    if($exsists->num_rows) {
      return $exsists->fetch_object()->short_url;
     } else {
      $result = $this->db->query("INSERT INTO url_short(long_url) VALUE('{$url}')");
      if (!$result) {
        die('error: 3 ' . $this->db->error);
      }

    $code = $this->generateCode($this->db->insert_id); //генерирую код

  //var_dump($this->db->insert_id, $code); die('1');
   $this->db->query("UPDATE url_short SET short_url = '{$code}' WHERE long_url = '{$url}'");
    die('error 2' . $this->db->error);

=======
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
>>>>>>> 2d73004909511acd559ddf26f63a16d944ef3b87

     return $code;
    }
   }

   public function getUrl($code) {
    $code = $this->db->escape_string($code);
    $code = $this->db->query("SELECT long_url FROM url_short WHERE short_url = '$code'");

    if($code->num_rows) {
<<<<<<< HEAD
     return $code->fetch_object()->short_url;
=======
     return $code->fetch_object()->url;
>>>>>>> 2d73004909511acd559ddf26f63a16d944ef3b87
    }

    return '';
   }
  }
?>

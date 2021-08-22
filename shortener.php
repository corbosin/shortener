<?php
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
     return $code->fetch_object()->short_url;
     return $code->fetch_object()->url;
    }

    return '';
   }
  }
?>

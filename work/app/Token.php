<?php

namespace MyApp;

class Token {
  
  // トークン作成　CSRF対策
  public static function create() {
    if(!isset($_SESSION['token'])) {
      $_SESSION['token'] = bin2hex(random_bytes(32));
    }
  }

  // トークン確認　CSRF対策
  public static function validate() {
    if(empty($_SESSION['token']) || $_SESSION['token'] !== filter_input(INPUT_POST, 'token')) {
      exit('Invalid post request');
    }
  }
}
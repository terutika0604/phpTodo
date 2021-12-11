<?php

namespace MyApp;

class Utils {
  // SQLインゼクション対策
  public static function h($str) {
    return htmlspecialchars($str, ENT_QUOTES, 'UTF-8');
  }
}
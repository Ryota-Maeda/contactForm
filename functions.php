<?php
// 関数名：h
// 引数：変換したい文字
// 返り値：エスケープした文字

function h($str) {
  // 受け取った文字を変換
  $result = htmlspecialchars($str, ENT_QUOTES, 'UTF-8');
  // 結果を返す
  return $result;
}
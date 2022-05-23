<?php
$str = '';
$array =[];

// ファイルを開く（読み取り専用）
$file = fopen('data/text.csv', 'r');
// ファイルをロック
flock($file, LOCK_EX);

// fgets()で1行ずつ取得→$lineに格納
if ($file) {
  while ($line = fgets($file)) {
    // 取得したデータを`$str`に追加する
    $str .="<tr><td>{$line}</td></tr>";
  }
}

// ロックを解除する
flock($file, LOCK_UN);
// ファイルを閉じる
fclose($file);
//  var_dump($);
//  exit();

//  $red_fruits = array_keys($array, '1', true);
//  var_dump($red_fruits);
//  exit();

?>
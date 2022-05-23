<?php
//GETでIDを取得


// var_dump($_POST);
// exit();
//データの受け取り
$ID = $_POST['id'];
$name = $_POST['name'];
$text = $_POST['text'];

// データ1件を1行にまとめる（最後に改行を入れる）
$write_data = "{$ID}{$name} {$text}\n";
// ファイルを開く．引数が`a`である部分に注目！
$file = fopen('data/text.csv', 'a');
// ファイルをロックする
flock($file, LOCK_EX);

// 指定したファイルに指定したデータを書き込む/fputcsv($file, $write_data);
fwrite($file, $write_data);

// csvファイルに書き込む作業
//   // 1行ずつ配列の内容をファイルに書き込む
// foreach ($list as $write_data) {
//     fputcsv($file, $write_data;
// }

// ファイルのロックを解除する
flock($file, LOCK_UN);
// ファイルを閉じる
fclose($file);

// データ入力画面に移動する
header("Location:review_read.php");

// $todo = $_POST['todo'];
// $deadline = $_POST['deadline'];
// $write_data = "{$deadline} {$todo}\n";
// $file = fopen('data/todo.')

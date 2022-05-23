<?php
// POSTデータ確認
if (
  !isset($_POST['reviewer_name']) || $_POST['reviewer_name']=='' ||
  !isset($_POST['shop_name']) || $_POST['shop_name']=='' ||
  !isset($_POST['tel']) || $_POST['tel']=='' ||
  !isset($_POST['url']) || $_POST['url']=='' ||
  !isset($_POST['address']) || $_POST['address']=='' ||
  !isset($_POST['genre']) || $_POST['genre']=='' ||
  !isset($_POST['word']) || $_POST['word']==''||
  !isset($_POST['img']) || $_POST['img']==''
) {
  exit('ParamError');
}
$reviewer_name = $_POST['reviewer_name'];
$shop_name = $_POST['shop_name'];
$tel = $_POST['tel'];
$url = $_POST['url'];
$address= $_POST['address'];
$genre=$_POST['genre'];
$word = $_POST['word'];
$img= $_POST['img'];

// DB接続この部分はnameとかuser,pwdとかその時で違う。
$dbn ='mysql:dbname=review_base;charset=utf8mb4;port=3306;host=localhost';
$user = 'root';
$pwd = '';

// DB接続この部分は毎回同じ
try {
  $pdo = new PDO($dbn, $user, $pwd);
} catch (PDOException $e) {
  echo json_encode(["db error" => "{$e->getMessage()}"]);
  exit();
}


// SQL作成&実行この部分はsqlのコードですので書いてエラーが出ないか確かめてから入力したら確実
$sql = 'INSERT INTO `shops`(`shops_id`, `reviewer_name`, `shop_name`, `tel`, `url`, `address`,`genre`, `word`, `time`,`img`) VALUES (NULL,:reviewer_name,:shop_name,:tel,:url,:address,:genre,:word,now(),:img)';

$stmt = $pdo->prepare($sql);

// バインド変数を設定！！！ここで何を送るかを記述しているので大事なところ！！！
$stmt->bindValue(':reviewer_name', $reviewer_name, PDO::PARAM_STR); //数字の場合はINT
$stmt->bindValue(':shop_name', $shop_name, PDO::PARAM_STR);//数字の場合はINT
$stmt->bindValue(':tel', $tel, PDO::PARAM_STR);//数字の場合はINT
$stmt->bindValue(':url', $url, PDO::PARAM_STR);//数字の場合はINT
$stmt->bindValue(':address', $address, PDO::PARAM_STR);//数字の場合はINT
$stmt->bindValue(':genre', $genre, PDO::PARAM_STR);//数字の場合はINT
$stmt->bindValue(':word', $word, PDO::PARAM_STR);//数字の場合はINT
$stmt->bindValue(':img', $img, PDO::PARAM_STR);//数字の場合はINT
// SQL実行（実行に失敗すると `sql error ...` が出力される）
try {
  $status = $stmt->execute();
} catch (PDOException $e) {      //エラー表示を指定してるの部分
  echo json_encode(["sql error" => "{$e->getMessage()}"]);
  exit();
}
// SQL実行の処理

header('Location:review_input.php');//一連の作業が終わるとtodo_input.phpに戻る指示を出す。
exit(ok);

<?php

// DB接続
// todo_read.php
//databacenameはgsacf_l07_01
$dbn ='mysql:dbname=review_base;charset=utf8mb4;port=3306;host=localhost';
$user = 'root';
$pwd = '';

try {
  $pdo = new PDO($dbn, $user, $pwd);
} catch (PDOException $e) {
  echo json_encode(["db error" => "{$e->getMessage()}"]);
  exit();
}


// SQL作成&実行
// todo_read.php

$sql = 'SELECT * FROM shops';
$stmt = $pdo->prepare($sql);

$status = $stmt->execute();

try {//detaを取り出す
  $status = $stmt->execute();
  // var_dump();
  // echo'<pre>';
  // exit();
} catch (PDOException $e) {
  echo json_encode(["sql error" => "{$e->getMessage()}"]);
  exit();
}
// SQL実行の処理

$result = $stmt->fetchAll(PDO::FETCH_ASSOC);


$output = "";
foreach ($result as $record) {  //HTMLの生成
  $output .= "
  
    <tr> 
      
      <td>{$record['reviewer_name']}</td>
      <td>{$record['shop_name']}</td>
      <td>{$record['genre']}</td>
      <td>{$record['address']}</td>
      <td>{$record['word']}</td>
      <td><a href='review_topik.php?id=".$record['shops_id']."'>詳細へ</a></td>
      
    </tr>
  ";
}

// $view = "";
// if($status == false){
//   $error = $stmt->errorInfo();
//   exit("ErrorQuery:".$error[2]);
// }else{
//   while($result = $stmt->fetch(PDO::FETCH_ASSOC)){
//     $view .='<p>';
//     $view .='<a href="review_topik.php?id='.$result["shops_id"].'">';
//     $view .=$result["shop_name"];
//     $view .='</a>';
//     $view .=$result["word"];
//     //$view .=$result["reviewer_name"]." ".$result["tel"]."   ".$result["url"]."   ".$result["address"]."   ".$result["word"];
//     $view .='</p>';
//   }
//}

?>

<!DOCTYPE html>
<html lang="ja">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>おすすめのお店を教えてください</title>
</head>

<body>
  <fieldset>
    <legend>おすすめのお店一覧</legend>
    <a href="review_input.php">入力画面</a>
    <table>
      <thead>
        <tr>
          <th>投稿者の名前</th>
          <th>お店の名前</th>
          <th>お店のジャンル</th>
          <th>お店の住所</th>
          <th>お店の情報</th>
        </tr>
      </thead>
      <tbody>
        <!-- ここに<tr><td>deadline</td><td>todo</td><tr>の形でデータが入る -->
          <?= $output ?>
      </tbody>
    </table>
  </fieldset>
  <script>
    const data = <?= json_encode($result)?>;
    console.log(data);

  </script>
</body>

</html>
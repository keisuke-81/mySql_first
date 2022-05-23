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
  
    <thead>
    <div class='row justify-content-center'>
      
      <div class=col-2>{$record['reviewer_name']}</div>
      <div class=col-2>{$record['shop_name']}</div>
      <div class=col-2>{$record['genre']}</div>
      <div class=col-2>{$record['address']}</div>
      <div class=col-2>{$record['word']}</div>
      <div class=col-2><a href='review_topik.php?id=".$record['shops_id']."'>詳細へ</a></div>
      
    </div>
    </thead>
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
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  <link rel="stylesheet" href="style.css">
  <title>おすすめのお店を教えてください</title>
</head>

<body>
  <div class="row top_h ">
    <h1 class="col-5 display-1">foods-LINKS-all-shop</h1>
    <ul class="col-5 nav justify-content-end">
    <li class="nav-item">
      <a class="nav-link active" aria-current="page" href="#">Active</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="#">Link</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="#">Link</a>
    </li>
    <li class="nav-item">
      <a class="nav-link disabled" href="#" tabindex="-1" aria-disabled="true">Disabled</a>
    </li>
    </ul>
  </div>
  <div class="wrapper">
    <div class="container ">
      <div class="row white_back justify-content-center">
        <legend>おすすめのお店一覧   登録された順番です。</legend>
        <a href="review_input.php">topページ</a>
        <table>
          <thead>
            <div class="row justify-content-center font2">
              <div class="col-2 font2">投稿者の名前</div>
              <div class="col-2 font2">お店の名前</div>
              <div class="col-2 font2">お店のジャンル</div>
              <div class="col-2 font2">お店の住所</div>
              <div class="col-2 font2">お店の情報</div>
              <div class="col-2 font2">詳細情報</div>
            </div>
          </thead>
          <tbody>
            <!-- ここに<tr><td>deadline</td><td>todo</td><tr>の形でデータが入る -->
              <?= $output ?>
          </tbody>
        </table>
      </div>
    </div>
  </div>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
  <script>
    const data = <?= json_encode($result)?>;
    console.log(data);

  </script>
</body>

</html>
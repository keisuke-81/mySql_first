<?php
//GETでIDを取得
$id =$_GET["id"];
//echo "GET:".$id;


$day= date("Y年m月d日");
//DB接続
$dbn ='mysql:dbname=review_base;charset=utf8mb4;port=3306;host=localhost';
$user = 'root';
$pwd = '';
try {
  $pdo = new PDO($dbn, $user, $pwd);
} catch (PDOException $e) {
  echo json_encode(["db error" => "{$e->getMessage()}"]);
  exit();
}

//select
$sql = 'SELECT * FROM shops WHERE shops_id=:id';
$stmt = $pdo->prepare($sql);

// バインド変数を設定！！！ここで何を送るかを記述しているので大事なところ！！！
$stmt->bindValue(':id', $id, PDO::PARAM_INT); //数字の場合はINT
// $stmt->bindValue(':shop_name', $shop_name, PDO::PARAM_STR);//数字の場合はINT
// $stmt->bindValue(':tel', $tel, PDO::PARAM_STR);//数字の場合はINT
// $stmt->bindValue(':url', $url, PDO::PARAM_STR);//数字の場合はINT
// $stmt->bindValue(':address', $address, PDO::PARAM_STR);//数字の場合はINT
// $stmt->bindValue(':word', $word, PDO::PARAM_STR);//数字の場合はINT
//$stmt = $pdo->prepare($sql);

$status = $stmt->execute();


//表示させるために
$view = "";
if($status == false){
  $error = $stmt->errorInfo();
  exit("ErrorQuery:".$error[2]);
}else{
    $row = $stmt->fetch();
 //取得した画像バイナリデータをbase64で変換。
    

//   while($result = $stmt->fetch(PDO::FETCH_ASSOC)){
//     $view .='<p>';
    
//     $view .=$result["shop_name"];
    
//     $view .=$result["word"];
//     //$view .=$result["reviewer_name"]." ".$result["tel"]."   ".$result["url"]."   ".$result["address"]."   ".$result["word"];
//     $view .='</p>';
//   }
}
//$img = base64_encode($row['img']);
//header("Content-Type: image/jpg");
//echo $row['img'];
// header('Content-type: ' . $contents_type[$img['type']]);
//     echo $['image'];

$name ="name";
echo $name."<br>";
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <fieldset>
        <div><?=$row["shop_name"]?></div>
        <div>投稿者：<?=$row["reviewer_name"]?></div>
        <div><?=$row["word"]?></div>
        <div><?=$row["tel"]?></div>
        <div><?=$row["url"]?></div>
        <div><?=$row["address"]?></div>
    </fieldset>
    <form action="update.php" method="POST">
    <fieldset>
      <legend>あなたの口コミ募集中！</legend>
      <div>
        <label for="name">店舗ナンバー</label>
        <input id="name" type="text" name="id" value="<?=$id?>" readonly>
      </div>
      <div>
        name: <input type="name" name="name">
      </div>
      <div>
           <textarea name="text" id="" cols="40" rows="5"></textarea>
      </div>
      <div>
         <label for="name">入力日:</label>
        <input id="" type="text" name="day" value="<?=$day?>" readonly>
      </div>
      <div>
        <a href='update.php?id="<?=$id?>"'><button>入力する</button></a>
      </div>
    </fieldset>
  </form>
  <img src="<?=$row['img']?>">
</body>
</html>


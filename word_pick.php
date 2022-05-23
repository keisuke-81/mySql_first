<?php
// データまとめ用の空文字変数
$str = '';
$array =array();
// ファイルを開く（'r'は読み取り専用）
$file = fopen('data/text.csv','r');
// ファイルquestion.csvをロック
flock($file, LOCK_EX);

// 今回の違う部分
//fgets()で1行ずつ取得→$lineに格納

if ($file) {
  while ($line = fgets($file)) {  
    //fgets １業づつとってきてくれる。      
    //for文などでもできる。
    // 取得したデータを`$str`に追加する。
    $str .="<tr><td>{$line}</td></tr>";
    //タグを作りその中に一行づつとってきたものを入れる
    array_push($array,$line);
  }
}



// ロックを解除する
flock($file, LOCK_UN);
// ファイルを閉じる
fclose($file);

//echo $array[0];

$jsarray = str_replace(array("\r\n", "\r", "\n"), '', $array);//replace

$param_json = json_encode($jsarray,JSON_UNESCAPED_UNICODE); //JSONエンコード  JSON_UNESCAPED_UNICODEをつけると
 //var_dump($param_json);
// exit();

session_start();
$_SESSION["json_file"] = $param_json;
//echo $_SESSION["json_file"];

?>
<!-- <!DOCTYPE html>
<html lang="ja">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>textファイル書き込み型アンケート（一覧画面）</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  <link rel="stylesheet" href="style.css">
</head>

<body>
  <fieldset>
    <legend></legend>
    
    <table>
      <thead>
        <tr>
          <th>answer</th>
        </tr>
      </thead>
      <tbody>
        <!-- できたものをこの下に入れる -->
        
         <?= $str ?>
      
      </tbody>
    </table>
  </fieldset>
 <!-- <button type="button" class="btn btn-primary">Primary</button> -->

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
  
      <script>
         //const hogeArray = <?=json_encode($str)?>;
         //console.log(hogeArray);
        //  const dataj = JSON.parse(hogeArray);
        //   console.log(dataj);
        //console.log(str);
       // let param = JSON.parse('<?php echo $param_json; ?>'); 
       // console.log(param[2]);
      
      </script>


       <!-- <script>
        // const hogeArray = <?=json_encode($str)?>;
         //console.log(hogeArray);
        //  const dataj = JSON.parse(hogeArray);
        //   console.log(dataj);

    
        const param = JSON.parse(hogeArray); 
        console.log(param);
      </script> -->
</body>

</html> -->
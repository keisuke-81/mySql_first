<!DOCTYPE html>
<html lang="ja">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>DB連携型todoリスト（入力画面）</title>
</head>

<body>
  <div>
  <img src="" alt="和食">
  <a href='review_genre_washoku.php'>和食のお店一覧へ</a>
  </div>
  <div>
  <img src="" alt="中華">
  <a href='review_genre_chuka.php'>中華のお店一覧へ</a>
  </div>
  <div>
  <img src="" alt="イタリアン">
  <a href='review_genre_itarian.php'>イタリアンのお店一覧へ</a>
  </div>
  <div>
  <img src="" alt="フレンチ">
  <a href='review_genre_flench.php'>フレンチのお店一覧へ</a>
  </div>
  <div>
  <img src="" alt="韓国">
  <a href='review_genre_korean.php'>韓国料理のお店一覧へ</a>
  </div>
  <div>
  <img src="" alt="その他">
  <a href='review_genre_another.php'>その他のお店一覧へ</a>
  </div>
 
  <form action="review_create.php" method="POST">>
    <fieldset>
      <legend>おすすめのお店を教えてください</legend>
      <a href="review_read.php">一覧画面</a>
  
      <div>
        投稿者:  <input type="name" name="reviewer_name">
      </div>
      <div>
        お店の名前: <input type="text" name="shop_name">
      </div>
      <div>
        お店のジャンル: <select name="genre">
<option value="和食">和食</option>
<option value="中華">中華</option>
<option value="イタリアン">イタリアン</option>
<option value="フレンチ">フレンチ</option>
<option value="韓国料理">韓国料理</option>
<option value="その他">その他</option>
</select>
      </div>
      <div>
        連絡先: <input type="tel" name="tel">
      </div>
      <div>
        URL: <input type="url" name="url">
      </div>
      <div>
        住所: <input type="adress" name="address">
      </div>
      <div>
        口コミ: <input type="text" name="word">
      </div>
      <input type="file"
       id="avatar" name="img"
       accept="image/png, image/jpeg">
      <div>
        <button>submit</button>
      </div>
    </fieldset>
  </form>

</body>

</html>
<!DOCTYPE html>
<html lang="ja">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  <link rel="stylesheet" href="style.css">
  <title>DB連携型todoリスト（入力画面）</title>
</head>

<body>
  <div class="row top_h">
    <h1 class="col-5 display-1">foods-LINKS</h1>
    <ul class="col-5 nav justify-content-end">
    <li class="nav-item">
      <a class="nav-link active" aria-current="page" href="#">top</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="review_read.php">all-shop</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="#">map</a>
    </li>
    <li class="nav-item">
      <a class="nav-link disabled" href="#" tabindex="-1" aria-disabled="true">Disabled</a>
    </li>
    </ul>
  </div>
  <div class="wrapper">
    <div class="container black">
      <div class="row justify-content-center">
        <div class="col-4">
          <div>
            <img src="img/j1.jpg" alt="和食" class="top_img">
          </div>
        <div>
          <a href='review_genre_washoku.php'>和食のお店一覧へ</a>
        </div>
    
        </div>
        <div class="col-4">
        <div>
          <img src="img/c1.jpg" alt="中華" class="top_img">
        </div>
        <div>
          <a href='review_genre_chuka.php'>中華のお店一覧へ</a>
        </div>
    
        </div>
        <div class="col-4">
          <div>
            <img src="img/i1.jpg" alt="イタリアン" class="top_img">
          </div>
          <div>
            <a href='review_genre_itarian.php'>イタリアンのお店一覧へ</a>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-4">
          <div>
            <img src="img/f1.jpg" alt="フレンチ" class="top_img">
          </div>
          <div>
            <a href='review_genre_flench.php'>フレンチのお店一覧へ</a>
          </div>
        </div>
        <div class="col-4">
          <div class="top_img">
            <img src="img/k1.jpg" alt="韓国" class="top_img">
          </div>
          <div>
            <a href='review_genre_korean.php'>韓国料理のお店一覧へ</a>
          </div>
        </div>
        <div class="col-4">
          <div class="top_img">
            <img src="img/s1.jpg" alt="その他" class="top_img">
          </div>
          <div>
            <a href='review_genre_another.php'>その他のお店一覧へ</a>
          </div>
        </div>
      </div>
      <form action="review_create.php" method="POST">>
        <fieldset>
          <legend>おすすめのお店を教えてください</legend>
          <a href="review_read.php">一覧画面</a>
    
          <div class="row">
            <div col-5>
              <div class="row">
                <div class="col-1">
                  投稿者:
                </div>
                <div class="col-1">
                  <input type="name" name="reviewer_name">
                </div>
              </div>
              <div class="row">
                <div class="col-1">
                  お店の名前:
                </div>
                <div class="col-1">
                  <input type="text" name="shop_name">
                </div>
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
              <div class="row">
                <div class="col-1">
                  連絡先:
                </div>
                <div class="col-1">
                  <input type="tel" name="tel">
                </div>
              </div>
              <div class="row">
                <div class="col-1">
                  URL:
                </div>
                <div class="col-1">
                  <input type="url" name="url">
                </div>
              </div>
              <div class="row">
                <div class="col-1">
                  住所:
                </div>
                <div class="col-1">
                  <input type="adress" name="address">
                </div>
              </div>
              <div class="row">
                <div class="col-1">
                  口コミ:
                </div>
                <div class="col-1">
                  <input type="text" name="word">
                </div>
              </div>
              <input type="file"
               id="avatar" name="img"
               accept="image/png, image/jpeg">
              <div>
                <button>submit</button>
              </div>
            </div>
            <div class="col-6"></div>
          </div>
          <!-- ------------------------------------------------------------- -->
        </fieldset>
      </form>
    </div>
  </div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>

</html>
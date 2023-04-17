<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <title>レジストリ登録</title>
  <link href="css/bootstrap.min.css" rel="stylesheet">
  <style>div{padding: 10px;font-size:16px;}</style>
</head>
<body>

<!-- Head[Start] -->
<header>
<nav class="navbar" style="background-color: #fff;">
    <div class="container-fluid">
    <div class="navbar-header"><a class="navbar-brand" href="home.php">
    <img src="./image/logo.jpg" alt="iwai_babyregistry" width="160" height="70"></a></div>
    <div class="navbar-header"><a class="navbar-brand" href="home.php"style="color: black;">ホーム</a></div>
    <div class="navbar-header"><a class="navbar-brand" href="find.php" style="color: black;">レジストリを探す</a></div>
    <div class="navbar-header"><a class="navbar-brand" href="user.php"style="color: black;">新規登録</a></div>
    <div class="navbar-header"><a class="navbar-brand" href="login.php"style="color: black;">ログイン</a></div>
    <div class="navbar-header"><a class="navbar-brand" href="logout.php"style="color: black;">ログアウト</a></div><!-- ここを追記 -->
    </div>
  </nav>
</header>

<!-- Head[End] -->

<!-- Main[Start] -->
<form method="POST" action="insert.php">
  <div class="jumbotron text-center form-group">
   <fieldset>
    <h2>アイテムの登録</h2>
     <label>カテゴリー：<input type="text" name="category"></label><br>
     <label>ブランド：<input type="text" name="brand"></label><br>
     <label>商品名：<input type="text" name="item"></label><br>
     <label>詳細：</label><textArea name="detail" rows="4" cols="40"></textArea><br>
     <label>価格：<input type="number" name="price"></label><br>
     <label>参考ウェブ：<input type="text" name="website"></label><br>
     
     <input type="submit" value="送信">
    </fieldset>
  </div>
</form>
<!-- Main[End] -->


</body>
</html>

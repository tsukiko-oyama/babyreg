<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <title>ユーザ登録</title>
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
    <div class="navbar-header"><a class="navbar-brand" href="login.php"style="color: black;">ログイン</a></div>
    </div>
  </nav>
</header>

<!-- Head[End] -->

<!-- Main[Start] -->
<form method="POST" action="insertuser.php">
  <div class="container jumbotron text-center">
   <fieldset>
   <div style="margin-left:10px; margin-right:10px;"> 
   <h2>ユーザーの登録</h2>
     <label>ログインID：<input type="text" name="lid"></label><br>
     <label>ログインPW：<input type="text" name="lpw"></label><br>
     <div style="margin-top:20px; margin-bottom:20px;">
      <p>あなたのレジストリを検索する為のベビーネームと検索用パスワードを設定してください</p>
      <label>ベビーネーム：<input type="text" name="search_name"></label><br>
      <label>検索パスワード：<input type="text" name="search_pw"></label><br>
      </div>
     <input type="submit" value="登録">
     </div>
    </fieldset>
  </div>
</form>
<!-- Main[End] -->


</body>
</html>

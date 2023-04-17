<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width">
<link rel="stylesheet" href="css/main.css" />
<link href="css/bootstrap.min.css" rel="stylesheet">
<style>div{padding: 10px;font-size:16px;}</style>
<title>ホーム</title>
</head>
<body>

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
<div class = "text-center">
<h1>ベビーレジストリにようこそ</h1>
<!-- lLOGINogin_act.php は認証処理用のPHPです。 -->
プレゼントしたい相手を探してみよう
<div class="form-group">
<form name="form1" action="find_act.php" method="post">
<p>ベビーネーム:<input type="text" name="search_name"/></p>
<p>検索パスワード:<input type="password" name="search_pw" /></p>
<input type="submit" value="SEARCH" />
</form>
</div>
</div>

</body>
</html>
<?php
//SESSIONスタート
session_start();

//関数を呼び出す
require_once('funcs.php');

//ログインチェック
loginCheck();
//以下ログインユーザーのみ


//selsect.phpから処理を持ってくる
//1.外部ファイル読み込みしてDB接続(funcs.phpを呼び出して)
require_once('funcs.php');
$pdo = db_conn();

//2.対象のIDを取得
$id = $_GET['id'];

//3．データ取得SQLを作成（SELECT文）
$stmt = $pdo->prepare("SELECT * FROM baby_regdetail_table WHERE id=:id;");
$stmt->bindValue(':id',$id,PDO::PARAM_INT);
$status = $stmt->execute();


//4．データ表示
$view = '';
if ($status == false) {
    sql_error($status);
} else {
    $result = $stmt->fetch();//ここを追記！！
}

?>

<!-- 以下はindex.phpのHTMLをまるっと持ってくる -->
<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <title>プレゼントする</title>
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
<form method="POST" action="presentupdate.php">
  <div class="jumbotron">
   <fieldset>
    <legend>プレゼントする</legend>
     <label>あなたの名前<input type="text" name="givername"></label><br>
     <label>メッセージ<textArea name="givermessage" rows="4" cols="40"></textArea></label><br> 
     <input type="hidden" name="given" value="[すでに誰かがプレゼントされています]">
     <input type="hidden" name="id" value="<?= $result['id']?>">
     <input type="submit" value="送信">
    </fieldset>
  </div>
</form>
<!-- Main[End] -->


</body>
</html>

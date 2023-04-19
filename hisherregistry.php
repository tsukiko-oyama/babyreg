<?php
//SESSIONスタート
session_start();

$id = $_SESSION["reguser_id"];
$search_name = $_SESSION["search_name"];

//関数を呼び出す
require_once('funcs.php');

//ログインチェック
loginCheck();
//以下ログインユーザーのみ


//1.  DB接続します
require_once('funcs.php');
$pdo = db_conn();

//２．SQL文を用意(データ取得：SELECT)
$stmt = $pdo->prepare("SELECT * From baby_regdetail_table WHERE reguser_id = $id");

//3. 実行
$status = $stmt->execute();

//4．データ表示
$view="";
if($status==false) {
    //execute（SQL実行時にエラーがある場合）
  $error = $stmt->errorInfo();
  exit("ErrorQuery:".$error[2]);

}else{
  //Selectデータの数だけ自動でループしてくれる
  //FETCH_ASSOC=http://php.net/manual/ja/pdostatement.fetch.php
  while( $result = $stmt->fetch(PDO::FETCH_ASSOC)){ 
    $view .= '<div class="container text-center" >';
    $view .= '<p>カテゴリ：'.$result['category'].'｜ブランド：'.$result['brand'].'</p>';
    $view .= '<p> 商品名：'.$result['category'].'</p>';
    $view .= '<p> 詳細：'.$result['detail'].'</p>';
    $view .= '<p> 参考価格：'.$result['price'].'円</p>';
    $view .= '<p>'.' <a href='.$result['website'].'>'.'参考ウェブサイト'.'</a></p>';
    $view .= empty($result['given']) ? '<a href="presentdetail.php?id=' . $result['id'] . '">'.'[プレゼントする]'.'</a>' : $result['given'];
    $view .= '</p></div>';


  }

}
?>


<!DOCTYPE html>
<html lang="ja">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>ベビーレジストリ</title>
<link rel="stylesheet" href="css/range.css">
<link href="css/bootstrap.min.css" rel="stylesheet">
<style>div{padding: 10px;font-size:16px;}</style>
</head>
<body id="main">
<!-- Head[Start] -->
<header>
  <nav class="navbar fixed-top" style="background-color: #fff;">
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
<div>
    <div class="container jumbotron text-center">
    <h2>  <?= $search_name.'のレジストリへようこそ' ?></h2>
      <?= $view ?>
    </div>
</div>
<!-- Main[End] -->

</body>
</html>

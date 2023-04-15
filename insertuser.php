<?php

// 1. POSTデータ取得
$lid = $_POST["lid"];
$lpw = $_POST["lpw"];
$search_name = $_POST["search_name"];
$search_pw = $_POST["search_pw"];

// 2. DB接続します
require_once('funcs.php');
$pdo = db_conn();


// ３．SQL文を用意(データ登録：INSERT)
$stmt = $pdo->prepare(
  "INSERT INTO `baby_reguser_table`(`lid`,`lpw`, `search_name`, `search_pw`) 
  VALUES (:lid, :lpw, :search_name, :search_pw)"
);

// 4. バインド変数を用意

$stmt->bindValue(':lid', $lid, PDO::PARAM_STR);
$stmt->bindValue(':lpw', $lpw, PDO::PARAM_STR);
$stmt->bindValue(':search_name', $search_name, PDO::PARAM_STR);
$stmt->bindValue(':search_pw', $search_pw, PDO::PARAM_STR);

// 5. 実行
$status = $stmt->execute();

//6．データ登録処理後
if($status==false){
// SQL実行時にエラーがある場合（エラーオブジェクト取得して表示）
  $error = $stmt->errorInfo();
  exit("ErrorMessage:".$error[2]);
}else{
// index.phpへリダイレクト
  header('Location: login.php');
}
?>

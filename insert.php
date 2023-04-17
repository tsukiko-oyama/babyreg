<?php

session_start();

// 1. POSTデータ取得
$category = $_POST["category"];
$brand = $_POST["brand"];
$item = $_POST["item"];
$detail = $_POST["detail"];
$price = $_POST["price"];
$website = $_POST["website"];

// ログインユーザーIDを取得
$reguser_id = $_SESSION["reguser_id"];

// 2. DB接続します
require_once('funcs.php');
$pdo = db_conn();


// ３．SQL文を用意(データ登録：INSERT)
$stmt = $pdo->prepare(
  "INSERT INTO `baby_regdetail_table`(`reguser_id`,`category`, `brand`, `item`, `detail`, `price`, `website`, `indate`) 
  VALUES (:reguser_id, :category, :brand, :item, :detail, :price, :website, sysdate())"
);

// 4. バインド変数を用意

$stmt->bindValue(':reguser_id', $reguser_id, PDO::PARAM_INT);
$stmt->bindValue(':category', $category, PDO::PARAM_STR);
$stmt->bindValue(':brand', $brand, PDO::PARAM_STR);
$stmt->bindValue(':item', $item, PDO::PARAM_STR);
$stmt->bindValue(':detail', $detail, PDO::PARAM_STR);
$stmt->bindValue(':price', $price, PDO::PARAM_INT);
$stmt->bindValue(':website', $website, PDO::PARAM_STR);

// 5. 実行
$status = $stmt->execute();

//6．データ登録処理後
if($status==false){
// SQL実行時にエラーがある場合（エラーオブジェクト取得して表示）
  $error = $stmt->errorInfo();
  exit("ErrorMessage:".$error[2]);
}else{
// index.phpへリダイレクト
  header('Location: myregistry.php');
}
?>

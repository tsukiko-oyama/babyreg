<?php
//insert.phpの処理を持ってくる
//1. POSTデータ取得
$category = $_POST["category"];
$brand = $_POST["brand"];
$item = $_POST["item"];
$detail = $_POST["detail"];
$price = $_POST["price"];
$website = $_POST["website"];
$id = $_POST["id"];


//2. DB接続します
require_once('funcs.php');
$pdo = db_conn();

//３．データ更新SQL作成（UPDATE テーブル名 SET 更新対象1=:更新データ ,更新対象2=:更新データ2,... WHERE id = 対象ID;）
$stmt = $pdo->prepare(
    "UPDATE `baby_regdetail_table` SET category=:category, brand=:brand,item=:item,
    detail=:detail,price=:price,website=:website,indate=sysdate() WHERE id=:id"
  );
$stmt->bindValue(':category', $category, PDO::PARAM_STR);
$stmt->bindValue(':brand', $brand, PDO::PARAM_STR);
$stmt->bindValue(':item', $item, PDO::PARAM_STR);
$stmt->bindValue(':detail', $detail, PDO::PARAM_STR);
$stmt->bindValue(':price', $price, PDO::PARAM_INT);
$stmt->bindValue(':website', $website, PDO::PARAM_STR);
$stmt->bindValue(':id', $price, PDO::PARAM_INT);
$status = $stmt->execute();

//４．データ登録処理後
if ($status == false) {
    //execute（SQL実行時にエラーがある場合）
    $error = $stmt->errorInfo();
    exit("ErrorQuery:".$error[2]);
} else {
    redirect('select.php');
}

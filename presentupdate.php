<?php
//presentdetail.phpの処理を持ってくる
//1. POSTデータ取得
$givername = $_POST["givername"];
$givermessage = $_POST["givermessage"];
$given = $_POST["given"];
$id = $_POST["id"];


//2. DB接続します
require_once('funcs.php');
$pdo = db_conn();

//３．データ更新SQL作成（UPDATE テーブル名 SET 更新対象1=:更新データ ,更新対象2=:更新データ2,... WHERE id = 対象ID;）
$stmt = $pdo->prepare(
    "UPDATE `baby_regdetail_table` SET givername=:givername, givermessage=:givermessage,given=:given,giverdate=sysdate() WHERE id=:id"
  );
$stmt->bindValue(':givername', $givername, PDO::PARAM_STR);
$stmt->bindValue(':givermessage', $givermessage, PDO::PARAM_STR);
$stmt->bindValue(':given', $given, PDO::PARAM_STR);
$stmt->bindValue(':id', $id, PDO::PARAM_INT);
$status = $stmt->execute();

//４．データ登録処理後
if ($status == false) {
    //execute（SQL実行時にエラーがある場合）
    $error = $stmt->errorInfo();
    exit("ErrorQuery:".$error[2]);
} else {
    redirect('hisherregistry.php');
}

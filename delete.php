<?php
//SESSIONスタート
session_start();

//関数を呼び出す
require_once('funcs.php');

//ログインチェック
loginCheck();
//以下ログインユーザーのみ

//selsect.phpから処理を持ってくる
//1.対象のIDを取得
$id   = $_GET['id'];

//2.DB接続します
require_once('funcs.php');
$pdo = db_conn();

//3.削除SQLを作成
$stmt = $pdo->prepare("DELETE FROM baby_regdetail_table WHERE id = :id");
$stmt->bindValue(':id', $id, PDO::PARAM_INT);
$status = $stmt->execute(); //実行


//４．データ登録処理後
if ($status == false) {
    //execute（SQL実行時にエラーがある場合）
    $error = $stmt->errorInfo();
    exit("ErrorQuery:".$error[2]);
} else {
    redirect('myregistry.php');
}







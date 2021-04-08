<?php
//1. POSTデータ取得
require_once('funcs.php');
$id   = $_GET["id"];

//2. DB接続します
$pdo = db_conn();

//３．データ登録SQL作成
//削除するときの注意点は、idの場所を特定すること！
$stmt = $pdo->prepare(
    "DELETE FROM 
        gs_user_table 
    WHERE 
        id = :id"
);

// 数値の場合 PDO::PARAM_INT
// 文字の場合 PDO::PARAM_STR
$stmt->bindValue(':id', $id, PDO::PARAM_INT);
$status = $stmt->execute(); //実行

//４．データ登録処理後
if ($status == false) {
    sql_error($stmt);
} else {
    redirect('index.php');
}

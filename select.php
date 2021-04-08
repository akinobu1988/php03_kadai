<?php
require_once('funcs.php');
$pdo = db_conn();

//２．データ登録SQL作成
$stmt = $pdo->prepare("SELECT * FROM gs_user_table");
$status = $stmt->execute();

//３．データ表示
$view = "";
if ($status == false) {
    //SQLエラー関数：sql_errorが利用されている。
    sql_error($status);
} else {
    while ($result = $stmt->fetch(PDO::FETCH_ASSOC)) {
        $view .= '<tr><td>'. h($result['name']) . '</td>';
        $view .= '<td>'. h($result['lid']) . '</td>';
        $view .= '<td>'. h($result['lpw']) . '</td>';
        $view .= '<td>'. h($result['kanri_flg']) . '</td>';
        $view .= '<td>'. h($result['life_flg']) . '</td>';
        $view .= '<td><a href="remind.html?id=' . $result['id'] . '">'. 削除 .  '</a></td>';
        $view .= '<td><a href="detail.php?id=' . $result['id'] . '">'. 更新 .  '</a></td></tr>';
    }
}
?>

<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="utf-8">
    <title>管理ユーザーの一覧表示</title>
    <link rel="stylesheet" href="css/range.css">
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <style>div{padding: 10px;font-size:16px;}</style>
</head>
<body id="main">
<!-- Head[Start] -->
<header>
    <nav class="navbar navbar-default">
    <div class="container-fluid">
        <div class="navbar-header">
        <a class="navbar-brand" href="index.php">管理ユーザーの一覧表示</a>
        </div>
    </div>
    </nav>
</header>
<hr>
<table border="1">
    <tr>
      <th>名前</th>
      <th>ID</th>
      <th>パスワード</th>
      <th>管理フラグ</th>
      <th>在籍フラグ</th>
      <th>編集１</th>
      <th>編集２</th>
    </tr>
    </tr>  
      <td><?php echo $view; ?></td>
    </tr>

</body>
</html>

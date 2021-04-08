<?php
require_once('funcs.php');
$pdo = db_conn();
$id = $_GET['id'];

//２．データ登録SQL作成
$stmt = $pdo->prepare('SELECT * FROM gs_user_table WHERE id=' . $id . ';');
$status = $stmt->execute();

//３．データ表示
$view = "";
if ($status == false) {
    //SQLエラー関数：sql_errorが利用されている。
    sql_error($status);
} else {
    $result = $stmt->fetch();
}
?>

<!--
２．HTML
以下にindex.phpのHTMLをまるっと貼り付ける！
(入力項目は「登録/更新」はほぼ同じになるから)
※form要素 input type="hidden" name="id" を１項目追加（非表示項目）
※form要素 action="update.php"に変更
※input要素 value="ここに変数埋め込み"
-->
<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <title>データ登録</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <style>
        div {
            padding: 10px;
            font-size: 16px;
        }
    </style>
</head>

<body>
    <header>
        <nav class="navbar navbar-default">
            <div class="container-fluid">
                <div class="navbar-header"><a class="navbar-brand" href="select.php">データ更新</a></div>
            </div>
        </nav>
    </header>

    <!-- method, action, 各inputのnameを確認してください。  -->
    <form method="POST" action="update.php">
        <div class="jumbotron">
            <fieldset>
                <legend>管理ユーザーの登録</legend>
                <label>名前：<input type="text" name="name" required></label><br>
                <label>ID：<input type="text" name="lid" required></label><br>
                <label>PW：<input type="password" name="lpw" required></label><br>
                <label>管理者：<input type="checkbox" name="kanri_flg"></label><br>
                <input type="hidden" name="id" value="<?= $result['id'] ?>">
                <input type="submit" value="登録">
            </fieldset>
        </div>
    </form>
    <h4><a href="select.php">管理ユーザーの一覧表示</a></h4>
</body>

</html>

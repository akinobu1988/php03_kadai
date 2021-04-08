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
                <div class="navbar-header"><a class="navbar-brand" href="select.php">ユーザー登録</a></div>
            </div>
        </nav>
    </header>

    <!-- method, action, 各inputのnameを確認してください。  -->
    <form method="POST" action="insert.php">
        <div class="jumbotron">
            <fieldset>
                <legend>管理ユーザーの登録</legend>
                <label>名前：<input type="text" name="name" required></label><br>
                <label>ID：<input type="text" name="lid" required></label><br>
                <label>PW：<input type="password" name="lpw" required></label><br>
                <label>管理者：<input type="checkbox" name="kanri_flg"></label><br>
                <input type="submit" value="登録">
            </fieldset>
        </div>
    </form>
    <h4><a href="select.php">管理ユーザーの一覧表示</a></h4>
</body>

</html>

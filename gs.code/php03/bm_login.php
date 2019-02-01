<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <title>ログイン画面</title>
  <link href="css/bootstrap.min.css" rel="stylesheet">
  <style>div{padding: 10px;font-size:16px;}</style>
</head>
<body>

<!-- Head[Start] -->
<header>
  <nav class="navbar navbar-default">
    <div class="container-fluid">
    <div class="navbar-header"><a class="navbar-brand" href="">ログイン画面</a></div>
    </div>
  </nav>
</header>
<!-- Head[End] -->

<!-- Main[Start] -->
<form method="post" action="bm_login_act.php">
  <div class="jumbotron">
   <fieldset>
    <legend>ログイン</legend>
     <label>ID：<br><input type="text" name="lid" placeholder="ID"></label><br>
     <label>PW：<br><input type="text" name="lpw" placeholder="パスワード"></label><br>
     <input type="submit" value="送信">
    </fieldset>
  </div>

<!-- Main[End] -->


</body>
</html>

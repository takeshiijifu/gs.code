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
    <div class="navbar-header"><a class="navbar-brand">ポッドキャスト感想ページ</a></div>
    </div>
  </nav>
</header>
<!-- Head[End] -->

<!-- Main[Start] -->
<form method="post" action="bm_login_act.php">
  <div class="jumbotron">
   <fieldset>
    <legend>ログインして見る</legend>
     <label>ID：<br><input type="text" name="lid" placeholder="ID"></label><br>
     <label>PW：<br><input type="password"  name="lpw" placeholder="パスワード"></label><br>
     <!-- typeのpasswordは黒文字に変換される -->
     <br>
     <input type="submit" value="ログインする">
     </fieldset>
  </div>
</form>
<form method="post" action="bm_select_non.php">
<div class="jumbotron">
  <fieldset>
   <legend>ログインしないで見る</legend>
 　<input type="submit" value="ログインしないで見る">
 </fieldset>
</div>
</form>
</body>
</html>

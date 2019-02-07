<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <title>投稿画面</title>
  <link href="css/bootstrap.min.css" rel="stylesheet">
  <style>div{padding: 10px;font-size:16px;}</style>
</head>
<body>

<!-- Head[Start] -->
<header>
  <nav class="navbar navbar-default">
    <div class="container-fluid">
    <div class="navbar-header"><a class="navbar-brand" href="bm_select.php">ポッドキャスト感想投稿一覧</a></div>
    </div>
  </nav>
</header>
<!-- Head[End] -->

<!-- Main[Start] -->
<form method="post" action="bm_insert.php">
  <div class="jumbotron">
   <fieldset>
    <legend>ポッドキャストフォーム</legend>
     <label>ポッドキャスト名：<br><input type="text" name="name" placeholder="rebuildfm"></label><br>
     <label>ポッドキャストURL：<br><input type="text" name="url" placeholder="https://rebuild.fm"></label><br>
     <!-- <label>年齢：<input type="text" name="age"></label><br> -->
     <label>コメント<br><textArea name="naiyou" rows="10" cols="50" placeholder="みんなでポッドキャストの情報を共有しよう"></textArea></label><br>
     <input type="submit" value="投稿">
    </fieldset>
  </div>

<!-- Main[End] -->


</body>
</html>

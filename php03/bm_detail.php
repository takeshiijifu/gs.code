<?php
$id = $_GET["id"];
// echo $id;

//以下、select.phpをコピーしてきました。
include "bm_funcs.php";
$pdo = db_con();

//２．データ登録SQL作成
$stmt = $pdo->prepare("SELECT * FROM gs_bm_table WHERE id =:id");
//直接$でidを入れてはいけない。
$stmt->bindValue(":id",$id, PDO::PARAM_INT);
$status = $stmt->execute();
//３．データ表示
$view = "";
if ($status == false) {
    sqlError($stmt);
} else {
    $row = $stmt->fetch();
}
//index.php（登録フォームの画面ソースコードを全コピーして、このファイルをまるっと上書き保存）
?>
<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <title>感想データ更新画面</title>
  <link href="css/bootstrap.min.css" rel="stylesheet">
  <style>div{padding: 10px;font-size:16px;}</style>
</head>
<body>

<!-- Head[Start] -->
<header>
  <nav class="navbar navbar-default">
    <div class="container-fluid">
    <div class="navbar-header"><a class="navbar-brand" href="bm_select.php">ポッドキャスト感想データ更新画面</a></div>
    </div>
  </nav>
</header>
<!-- Head[End] -->

<!-- Main[Start] -->
<form method="post" action="bm_update.php">
  <div class="jumbotron">
   <fieldset>
    <legend>↓更新箇所を更新してください </legend>
     <label>ポッドキャスト名：<br><input type="text" name="name" value="<?php echo $row["name"]; ?>"></label><br>
     <label>ポッドキャストURL：<br><input type="text" name="url" value="<?php echo $row["url"]; ?>"></label><br>
     <!-- <label>年齢：<input type="text" name="age"></label><br> -->
     <label>コメント<br><textArea name="naiyou" rows="4" cols="40" ><?php echo $row["naiyou"]; ?></textArea></label><br>
     <input type="hidden" name="id" value="<?php echo $id; ?>">
     <input type="submit" value="送信">
    </fieldset>
  </div>
</form>
<!-- Main[End] -->


</body>
</html>

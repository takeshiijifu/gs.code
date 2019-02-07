<?php
session_start();
include("bm_funcs.php");

//ダイレクトにURLを打ってもログインできないようにする関数
// loginCheck();
$pdo = db_con();

//２．データ登録SQL作成
$stmt = $pdo->prepare("SELECT * FROM gs_bm_table");
$status = $stmt->execute();

//３．データ表示
$view = "";
if ($status == false) {
    sqlError($stmt);
} else {
    //Selectデータの数だけ自動でループしてくれる
    //FETCH_ASSOC=http://php.net/manual/ja/pdostatement.fetch.php
    while ($result = $stmt->fetch(PDO::FETCH_ASSOC)) {
        $view .='<p>';
        $view .= $result["indate"] . "<br>" . $result["name"] . "<br>" . $result["url"] . "<br>" . $result["naiyou"];
        $view .="<br>" ;
        $view .='<a>';
        //上記は全角スペース、くっいてしまわないように。
        $view .='<a href ="bm_detail_non.php?id='.$result["id"] .'" >';
        $view .= '[ 詳細 ]';
        $view .='</a>';
        $view .='</p>';
    }
}
?>
<!DOCTYPE html>
<html lang="ja">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>データ登録画面</title>
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
      <a class="navbar-brand" href="bm_login.php">ログイン画面へ戻る</a>
      </div>
    </div>
  </nav>
</header>
<!-- Head[End] -->

<!-- Main[Start] -->
<div>
    <div class="container jumbotron"><?=$view?></div>
</div>

<div id="customerreviews"><ul style="list-style-type: circle"></ul></div>
<!-- Main[End] -->
</body>
</html>
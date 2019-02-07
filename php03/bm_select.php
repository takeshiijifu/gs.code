<?php
session_start();
include("bm_funcs.php");
loginCheck();

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
    if($_SESSION["kanri_flg"]=="1"){
        $view .= $result["indate"] . "<br>" . $result["name"] . "<br>" . $result["url"] . "<br>" . $result["naiyou"];
        $view .="<br>" ;
        $view .='<a>';
        //上記は全角スペース、くっいてしまわないように。
        $view .='<a href ="bm_detail.php?id='.$result["id"] .'" >';
        $view .= '[ 更新 ]';
        $view .='　';
        //上記は全角スペース、くっいてしまわないように。
        $view .='<a href ="bm_delete.php?id='.$result["id"] .'" >';
        $view .= '[ 削除 ]';
        $view .='</a>';
      }else{
        $view .= $result["indate"] . "<br>" . $result["name"] . "<br>" . $result["url"] . "<br>" . $result["naiyou"];
        $view .='<a>';
        //上記は全角スペース、くっいてしまわないように。
        $view .='<a href ="bm_detail.php?id='.$result["id"] .'" >';
        $view .="<br>" .'[ 詳細 ]';
        $view .='</a>';
        $view .='</p>';
      }
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
      <?php echo $_SESSION["name"]; ?>さん
      <a class="navbar-brand" href="bm_index.php">ポッドキャスト感想データ登録画面</a>
      <a class="navbar-brand" href="bm_logout.php">ログアウト画面</a>
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
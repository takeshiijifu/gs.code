<?php
session_start();
$lid = $_POST["lid"];
$lpw = $_POST["lid"];

//2. DB接続します
include("bm_funcs.php");

//1.  DB接続します
$pdo = db_con();
// echo "db_con";
//３．データ登録SQL作成
$sql = "SELECT * FROM gs_bm_user_table WHERE lid=:id";
// echo $_POST["lid"];
// echo $_POST["lpw"];
$stmt = $pdo->prepare($sql);
$stmt->bindValue(':id',$lid); 
$status = $stmt->execute();

//４．データ登録処理後
if ($status == false){
    $error = $stmt->errorInfo();
    exit("QueryError:".$error[2]);
  }

$val = $stmt->fetch();

if( $val["id"] != "" ){
// echo $val["id"];
$_SESSION["chk_ssid"]  = session_id();
$_SESSION["kanri_flg"] = $val['kanri_flg'];
$_SESSION["name"]      = $val['name'];
header("Location: bm_select.php");
}else {
header("Location: bm_login.php");
}
exit();

if(password_verify($lpw,$val["lpw"]) ){
  $_SESSION["chk_ssid"]  = session_id();
  $_SESSION["kanri_flg"] = $val['kanri_flg'];
  $_SESSION["name"]      = $val['name'];
  header("Location: bm_select.php");
}else{
  //logout処理を経由して全画面へ
  header("Location: bm_login.php");
}
?>

<?php
session_start();
$lid = $_POST["lid"];
$lpw = $_POST["lpw"];

//2. DB接続します
include "bm_funcs.php";
$pdo = db_con();

//３．データ登録SQL作成
$sql = "SELECT * FROM gs_user_table WHERE u_id=:lid AND u_pw=:lpw";
$stmt = $pdo->prepare($sql);
$stmt->bindValue(':lid', $lid, PDO::PARAM_STR); //Integer（数値の場合 PDO::PARAM_INT)
$stmt->bindValue(':lpw', $lpw, PDO::PARAM_STR); //Integer（数値の場合 PDO::PARAM_INT)
$status = $stmt->execute();

//４．データ登録処理後
if ($status == false) {
    sqlError($stmt);
} else {
    exit();
}

$val = $stmt->fetch();
if ($val["id"] !== "") {
    $_SESSION["chk_ssid"] = session_id();
    $_SESSION["u_name"] = $val['u_name'];
    header("Location: bm_select.php");
} else {
    header("Location: bm_login.php");
}
// exit();

?>
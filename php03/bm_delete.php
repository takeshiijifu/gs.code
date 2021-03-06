<?php
$id = $_GET["id"];
include "bm_funcs.php";
$pdo = db_con();

//３．データ登録SQL作成
$sql = "DELETE FROM gs_bm_table WHERE id=:id";
//updateとdelete文はWHEREで条件をつけないと全てきえてします。
$stmt = $pdo->prepare($sql);
$stmt->bindValue(':id', $id, PDO::PARAM_INT); //Integer（数値の場合 PDO::PARAM_INT)
$status = $stmt->execute();

//４．データ登録処理後
if ($status == false) {
    sqlError($stmt);
} else {
    //５．select.phpへリダイレクト
    header("Location: bm_select.php");
    exit;
}

?>

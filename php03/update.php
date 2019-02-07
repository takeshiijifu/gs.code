<?php
//1.insert.phpからコピーしてきました。
$name = $_POST["name"];
$email = $_POST["email"];
$naiyou = $_POST["naiyou"];
$id = $_POST["id"];

//2. DB接続します
include "funcs.php";
$pdo = db_con();

//３．データ登録SQL作成
$sql = "UPDATE gs_an_table SET name= :name,email=:email,naiyou=:naiyou WHERE id=:id";
$stmt = $pdo->prepare($sql);
$stmt->bindValue(':name', $name, PDO::PARAM_STR); //Integer（数値の場合 PDO::PARAM_INT)
//$stmt - > bindValue⇨これだとだめ、くっつける。
//正解⇨$stmt->bindValue
$stmt->bindValue(':email', $email, PDO::PARAM_STR); //Integer（数値の場合 PDO::PARAM_INT)
$stmt->bindValue(':naiyou', $naiyou, PDO::PARAM_STR); //Integer（数値の場合 PDO::PARAM_INT)
$stmt->bindValue(':id', $id, PDO::PARAM_STR); //Integer（数値の場合 PDO::PARAM_INT)
$status = $stmt->execute();

//４．データ登録処理後
if ($status == false) {
    sqlError($stmt);
} else {
    //５．select..phpへリダイレクト
    header("Location: select.php");
    //ヘッダーロケーションの前に「：」の後に必ず半角を入れないといけない。
    exit;
}

?>

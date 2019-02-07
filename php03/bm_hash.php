<?php

//パスワード作る場合
//ユーザー管理画面に以下の処理が必要になる
$pw = password_hash("pod03",PASSWORD_DEFAULT);
echo $pw;
?>


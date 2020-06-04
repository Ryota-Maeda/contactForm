<?php

require_once('functions.php');
require_once('dbconnect.php');

// 入力された内容を取得
$username = $_POST['username'];
$email = $_POST['email'];
$content = $_POST['content'];

// 実行するSQL文の作成
$sql = 'INSERT INTO surveys(name, email, content, created_at) VALUES(:name, :email, :content, now())';

// SQL文の実行準備
$stmt = $dbh->prepare($sql);
$stmt->bindParam(':name', $username, PDO::PARAM_STR);
$stmt->bindParam(':email', $email, PDO::PARAM_STR);
$stmt->bindParam(':content', $content, PDO::PARAM_STR);

// SQL文の実行
$stmt->execute();


?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>
<body>
  <h1>お問い合わせありがとうございました</h1>
  <p>お名前 : <?= h($username); ?></p>
  <p>メールアドレス : <?= h($email); ?></p>
  <p>お問い合わせ内容 : <?= h($content); ?></p>
</body>
</html>
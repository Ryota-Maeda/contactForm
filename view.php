<?php
// 別ファイルの読み込み
require_once('functions.php');
require_once('dbconnect.php');
// 全件取得用のSQL文作成
$sql = 'SELECT * FROM surveys';
// SQLの実行準備
$stmt = $dbh->prepare($sql);
// SQLの実行
$stmt->execute();
// 結果の取得
$results = $stmt->fetchAll();
// foreach (配列名 as 変数名) {
// }
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <style>
    div {
      padding: 20px;
      border: 1px solid black;
      margin: 5px;
    }
  </style>
</head>
<body>
    <?php foreach ($results as $record) { ?>
      <div>
        <p>ID: <?= $record['id']; ?></p>
        <p>名前：<?= $record['name']; ?></p>
        <p>メールアドレス：<?= $record['email']; ?></p>
        <p>お問い合わせ内容：<?= $record['content']; ?></p>
      </div>
    <?php } ?>
</body>
</html>
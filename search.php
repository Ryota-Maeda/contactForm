<?php


$name = '';
if (isset($_GET['nickname'])) {
  // $_GETの中に、nicknameが入っていたら
  $name = $_GET['nickname'];
}

require_once('functions.php');
require_once('dbconnect.php');


// SELECT文の作成(nameがYから始まる)
$sql = "SELECT * FROM surveys WHERE name LIKE :word";
// SQL実行準備
$stmt = $dbh->prepare($sql);
$keyword = $name . "%";
$stmt->bindParam(':word', $keyword, PDO::PARAM_STR);
// SQL実行
$stmt->execute();

$results = $stmt->fetchAll();

?>
<!DOCTYPE html>
<html lang="ja">
<head>
    <title>送信完了</title>
    <meta charset="utf-8">
	<style>
	    div {
	      padding: 20px;
	      border: 1px solid black;
	      margin: 5px;
	    }
	  </style>	
</head>
<body>
    <form action="" method="get">
        <p>検索したいnicknameを入力してください。</p>
        <input type="text" name="nickname">
        <input type="submit" value="検索">
    </form>

    <?php foreach ($results as $record) { ?>
    <div>
      <p>ID: <?= $record['id']; ?></p>
      <p>名前：<?= $record['name']; ?></p>
      <p>メールアドレス：<?= $record['email']; ?></p>
      <p>お問い合わせ内容：<?= $record['content']; ?></p>
    </div>
    <?php } ?>

</body>
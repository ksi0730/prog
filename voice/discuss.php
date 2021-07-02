<?php

$id = $_GET['id'];

try {
    $pdo = new PDO('mysql:dbname=a_db;charset=utf8;host=localhost', 'root', 'root');
} catch (PDOException $e) {
    exit('DbConnectError:'.$e->getMessage());
}

$sql = "SELECT * FROM a_table WHERE id=:id";
$stmt = $pdo->prepare($sql);
$stmt->bindValue(':id', $id, PDO::PARAM_INT); //idは数値なのでINT
$status = $stmt->execute();

$view=""; //受け取るための変数を事前に作ります。
if ($status==false) {
    //execute（SQL実行時にエラーがある場合）
    $error = $stmt->errorInfo();
    exit("ErrorQuery:".$error[2]);
} else {
    //１データのみ抽出の場合はwhileループで取り出さない(一個しかデータが返ってこないので一レコード取得する)
    $row = $stmt->fetch();
}
?>

<!-- htmlを貼り付けます -->
<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <title>データ登録</title>
  <link href="css/top.css" rel="stylesheet">
  <style>div{padding: 10px;font-size:16px;}</style>
</head>
<body>
<!-- Head[Start] -->
<header>
  <!-- <nav class="navbar navbar-default"> -->
    <div class="container-fluid">
    <div class="navbar-header"><a class="navbar-brand" href="select.php"><img src="img/logo.png" width="13%"></a></div>
    </div>
    <div class="second">Exchange your voices for inspiring politician</div>
  <!-- </nav> -->
</header>
<!-- Head[End] -->
<!-- Main[Start] -->
<!-- ここからupdate.phpにデータを送ります -->
<form method="post" action="update.php">
  <div class="jumbotron">
   <fieldset>
    <!-- <legend>質問予定</legend> -->
    <label>採用予定質問：<?=$row["naiyou"]?></label><br>
     <label>質問予定者：吉田茂<br>
     <label>質問予定時：2021年7月21日14時〜；衆議院予算委員会</label><br>
     <label>応援＆提案：<textArea rows="1" cols="70%"></textArea></label><br>
     <input type='hidden' name='id' value="<?=$row["id"]?>">
     <input type="submit" value="Voice">
    </fieldset>
  </div>
</form>
<!-- Main[End] -->
</body>
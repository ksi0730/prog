<?php

session_start();
echo '<a class="navbar-brand" href="logout.php">';
echo $_SESSION["name"];
echo '<a/>';

// sesssionチェック
if (
  !isset($_SESSION['chk_ssid']) ||
  $_SESSION["chk_ssid"] != session_id()
) {
    echo "login Error";
    exit();
}
// step1. GETを使って送られたidを取得しましょう！
// この場合は$_GET['id'];を使います
$id = $_GET['id'];

// step2. insert.phpからDBに接続するコード一式を持ってきます↓
//2. DB接続します xxxにDB名を入力する
try {
    $pdo = new PDO('mysql:dbname=a_db;charset=utf8;host=localhost', 'root', 'root');
} catch (PDOException $e) {
    exit('DbConnectError:'.$e->getMessage());
}


// step3. IDをもとに、sqlを準備します！
//３．SELECT * FROM xxx WHERE id=:id
$sql = "SELECT * FROM a_table WHERE id=:id";
$stmt = $pdo->prepare($sql);
$stmt->bindValue(':id', $id, PDO::PARAM_INT); //idは数値なのでINT
$status = $stmt->execute();

//step4．データ出力
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
  <title>質問案編集</title>
  <link href="css/top.css" rel="stylesheet">
  <style>div{padding: 10px;font-size:16px;}</style>
</head>
<body>
<!-- Head[Start] -->
<header>
    <div class="container-fluid">
    <div class="logo"><a href="select.php"><img src="img/logo.png" width="13%"></a></div>
    </div>
</header>
<!-- Head[End] -->
<!-- Main[Start] -->
<!-- ここからupdate.phpにデータを送ります -->
<form method="post" action="update.php">
  <div class="jumbotron">
   <fieldset>
    <legend>国会質問案</legend>
     <label>名前：<input type="text" name="name" value="<?=$row["name"]?>"></label><br>
     <label>タグ：<input type="text" name="email" value="<?=$row["email"]?>"></label><br>
     <label>
     <textArea name="naiyou" rows="4" cols="40"><?=$row["naiyou"]?></textArea>
     </label><br>
     <input type='hidden' name="id" value="<?=$row["id"]?>">
     <input type="submit" value="Raise Voice">
    </fieldset>
  </div>
</form>
<!-- Main[End] -->
</body>
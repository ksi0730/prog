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


//1.  DB接続します xxxにDB名を入れます
try {
    // xamppの人は'')　左は何も入れない
    //mamppの人 $pdo = new PDO('mysql:dbname=xxx;charset=utf8;host=localhost', 'root', 'root');
    $pdo = new PDO('mysql:dbname=a_db;charset=utf8;host=localhost', 'root', 'root');
} catch (PDOException $e) {
    exit('データベースに接続できませんでした。'.$e->getMessage());
}

//２．データ登録SQL作成
//作ったテーブル名を書く場所  xxxにテーブル名を入れます
$stmt = $pdo->prepare("SELECT * FROM a_table");
$status = $stmt->execute();

//３．データ表示
$view="";
if ($status==false) {
    //execute（SQL実行時にエラーがある場合）
    $error = $stmt->errorInfo();
    exit("ErrorQuery:".$error[2]);
} else {
    //Selectデータの数だけ自動でループしてくれる $resultの中に「カラム名」が入ってくるのでそれを表示させる例
    while ($result = $stmt->fetch(PDO::FETCH_ASSOC)) {
        $view .= "<fieldset>";
        $view .= "<p>";
        $view .= '<a href="detail.php?id='.$result["id"].'">';
        $view .= $result["indate"].":".$result["name"];
        $view .= '<br/>';
        $view .= $result["naiyou"];
        $view .= '</a>';
        // 隙間を開ける
        $view .= '       ';
        // 削除用のaタグ
        $view .= '<a href="delete.php?id='.$result["id"].'">';
        $view .= "削除";
        $view .= '</a>';
        $view .= '       ';
        $view .= "賛同";

        $view .= "</p>";
        $view .= "</fieldset>";
        $view .= "<br/>";
    }
}
?>


<!DOCTYPE html>
<html lang="ja">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>フリーアンケート表示</title>
<link href="css/top.css" rel="stylesheet">
<style>div{padding: 10px;font-size:16px;}</style>
</head>
<body id="main">
<!-- Head[Start] -->
<header>
    <div class="container-fluid">
      <div class="navbar-header">
      <a class="navbar-brand" href="index.php"><img src="img/logo.png" width="13%"></a>
      <!-- <a class="navbar-brand" href="logout.php">ログアウト</a> -->
      </div>
    </div>
</header>
<!-- Head[End] -->

<!-- Main[Start] $view-->
<div>
    <div class="container jumbotron"><?=$view?></div>
</div>
<!-- Main[End] -->

</body>
</html>

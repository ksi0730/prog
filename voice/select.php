<?php
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
        $view .= $result["indate"].":".$result["name"]."<br/>".$result["email"].":".$result["naiyou"];
        $view .= '</a>';
    //改行
        $view .= "<br/>";
    //削除
        $view .= '<a href="delete.php?id='.$result["id"].'">';
        $view .= "削除";
        $view .= '</a>';
    //隙間
        $view .= "     ";
    //賛同
        $view .= "賛同";
        //隙間
        $view .= "     ";
    //賛同
        $view .= '<a href="discuss.php?id='.$result["id"].'">';
        $view .= "採択";
        $view .= "</a>";
        $view .= "</p>";
        $view .= "</fieldset>";
    }
}
?>


<!DOCTYPE html>
<html lang="ja">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>質問案一覧</title>
<!-- <link rel="stylesheet" href="css/range.css"> -->
<link href="css/top.css" rel="stylesheet">
<style>div{padding: 10px;font-size:16px;}</style>
</head>
<body id="main">
<!-- Head[Start] -->
<header>
    <div class="container-fluid">
      <div class="navbar-header">
      <a class="navbar-brand" href="index.php"><img src="img/logo.png" width="13%"></a>
      </div>
    </div>
    <div class="second">List of Voices for changing political debate</div>
</header>
<!-- Head[End] -->

<!-- Main[Start] $view-->
<div>
    <div><?=$view?></div>
</div>
<!-- Main[End] -->

</body>
</html>

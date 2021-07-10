<?php
session_start();
echo '<a class="navbar-brand" href="logout.php">';
echo $_SESSION["name"];
echo '<a/>';
?>

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
    <div class="container-fluid">
    <div class="logo"><a href="select.php"><img src="img/logo.png" width="13%"></a></div>
    </div>
</header>
<!-- Head[End] -->

<!-- Main[Start] -->
<!-- ここからinsert.phpにデータを送ります -->
<form method="post" action="insert.php">
  <div class="jumbotron">
   <fieldset>
    <legend>国会質問案</legend>
     <label>名前：<input type="text" name="name"></label><br>
     <label>タグ：<input type="text" name="email"></label><br>
     <label><textArea name="naiyou" rows="4" cols="40"></textArea></label><br>
     <input type="submit" value="Raise Voice">
    </fieldset>
  </div>
</form>
<!-- Main[End] -->


</body>
</html>

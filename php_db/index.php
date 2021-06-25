<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <title>Voice</title>
  <link href="css/bootstrap.min.css" rel="stylesheet">
  <style>div{padding: 10px;font-size:16px;}</style>
</head>
<body>

<!-- Head[Start] -->
<header>
  <nav class="navbar navbar-default">
    <div class="container-fluid">
    <div class="navbar-header"><a class="navbar-brand" href="select.php">Voice</a></div>
    </div>
  </nav>
</header>
<!-- Head[End] -->

<!-- Main[Start] -->
<!-- ここからinsert.phpにデータを送ります -->
<form method="post" action="insert.php">
  <div class="jumbotron">
   <fieldset>
    <legend>国会質問提案</legend>
     <label>名前：<input type="text" name="name"></label><br>
     <label>委員会：<input type="text" name="email"></label><br>
     <label><textArea name="naiyou" rows="4" cols="40"></textArea></label><br>
     <input type="submit" value="送信">
    </fieldset>
  </div>
</form>
<!-- Main[End] -->


</body>
</html>

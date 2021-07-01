<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <title>Voice</title>
  <link href="css/top.css" rel="stylesheet">
  <style>div{padding: 10px;font-size:16px;}</style>
</head>
<body>

<!-- Head[Start] -->
<header>
  <!-- <nav class="navbar navbar-default"> -->
    <div class="container-fluid">
    <div class="logo"><a href="select.php"><img src="img/logo.png" width="13%"></a></div>
    </div>
    <div class="second">Raise Voice, Change the World</div>
  <!-- </nav> -->
</header>
<!-- Head[End] -->

<!-- Main[Start] -->
<!-- ここからinsert.phpにデータを送ります -->
<form method="post" action="insert.php">
  <div>
   <fieldset>
    <legend>国会質問案</legend>
     <label>Name  ：<input type="text" name="name"></label><br>
     <label>Nation：<input type="text" name="email"></label><br>
     <label><textArea name="naiyou" rows="4" cols="40"></textArea></label><br>
     <input type="submit" value="Voice">
    </fieldset>
  </div>
</form>
<!-- Main[End] -->


</body>
</html>

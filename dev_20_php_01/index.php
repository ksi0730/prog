
<?php
$name = "";
$message = "";
 
if (isset($_POST['send']) === true) {
    $name = $_POST["name"];
    $message = $_POST["message"];
    $fp = fopen("bord.txt", "a");
    fwrite($fp, $name . "t" . $message . $line . "¥n");
    fclose($fp);
}
 
$fp = fopen("bord.txt", "r");
 
$bord_array = [];
while ($line = fgets($fp)) {
    $temp = explode("t", $line);
    $temp_array = [
        "name" => $temp[0],
        "message" => $temp[1]
    ];
    $bord_array[] = $temp_array;
}
?>
 
 
<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <title>testbord</title>
</head>
<body>
<div class=top>ポケモン国会</div>
<form action="" method="post">
    <div>
        <label for="name">提案者</label>
        <input type="text" id="name" name="name">
    </div>
    <div>
        <label for="message">質問案</label>
        <input type="text" id="message" name="message">
    </div>
    <input type="submit" name="send" value="送信する">
</form>
<h3>提言一覧</h3>
<ul>
    <?php foreach ($bord_array as $data): ?>
        <?= "<li>" ?>
        <?= $data["name"] . ":" . $data["message"]; ?>
        <?= "</li>" ?>
    <?php endforeach; ?>
</ul>
</body>
</html>

<link rel="stylesheet" href="style.css">

<?php
echo "<br/>";

echo '<div class=around>
<div class=one>
<div>
<p>
<span>提案者:ピカチュウ</span>
<span>賛同数:</span><span id="disp_count">0</span>
<spann>寄付金:</spann><span id="disp_count2">０</span><span>円</span>
</p>
<p>質問案:<br/>暗号資産については、税制がその決済利用を妨げていると思うが見解如何。</p>
<p>政策案:<br/>暗号資産で決済した場合は、消費税がかかることとし、<br/>雑所得換算とするのを改めるべきではないか。</p>
</div>
<div>
<img src="img/pika.png">
</div>
</div>
<div style="text-align:center">
<input type="button" value="賛同する" id="btn_count_up" />
<input type="button" value="出資する" id="btn_fund_up" />
<button>コメント</button>
</div>
</div>';

echo "<br/>";

echo '<div class=around>
<div class=one>
<div>
<p>
<span>提案者:フシギダネ</span>
<span>賛同数:</span><span id="disp_count3">0</span>
<spann>寄付金:</spann><span id="disp_count4">０</span><span>円</span>
</p>
<p>質問案:<br/>木造建築物については、耐用年数が短く設定されていることが、<br/>無用の建て替えや資源の浪費を招いていると考えるが見解如何。</p>
<p>政策案:<br/>耐用年数を30年とするとともに、保存状態の良いものについては、<br/>最大50年までの耐用年数延長を認めるべきではないか。</p>
</div>
<div>
<img src="img/tane.png">
</div>
</div>
<div style="text-align:center">
<input type="button" value="賛同する" id="btn_count_up2" />
<input type="button" value="出資する" id="btn_fund_up2" />
<button>コメント</button>
</div>
</div>';

echo "<br/>";

// echo '<div class=around>
// <div class=one>
// <div>
// <p>提案者:ギャラドス　賛同数:０　寄付金:０円</p>
// <p>質問案:<br/>ワクチン接種者については、隔離期間を免除すべきではないか</p>
// </div>
// <div>
// <img src="img/gyara.png">
// </div>
// </div>
// <div style="text-align:center">
// <button>賛同する</button><button>出資する</button><button>コメント</button>
// </div>
// </div>';

// </body>
// </html>
// $num = 0;

// $a= 1;
// $b= 2;

// $filePath = 'img/gyara.png';
// file_get_contents (gyara.png);
// $data = file_get_contents($filePath);
// header('Content-type: image/jpg');

// echo "<br/>";
// echo "<br/>";
// if($a===1){
  // echo '1が表示されました';
// }
// echo "<br/>";
// if($b===2){
  // echo '2が表示されました'."<br/>";
// }

// echo "<br/>";
// echo "<br/>";
// $random = mt_rand(1, 3);

// if($random===1){
  // $num += 1;
  // echo $num;
  // echo "<br/>";
  // echo '勝ち';
  // echo "<br/>";
  // echo '<img src="img/head.png">';
// }

// if($random===2){
  // $num -= 1;
  // echo $num;
  // echo "<br/>";
  // echo '負け';
  // echo "<br/>";
  // echo '<img src="img/gyara.png">';
  // echo $data;
// }

// if($random===3){
  // $num += 0;
  // echo $num;
  // echo "<br/>";
  // echo '引き分け';
  // echo "<br/>";
  // echo '<img src="img/pika.png">';
  // echo $data;
// }
?>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script>
// ページが読み込まれたら実行
window.onload = function() {

// オブジェクトと変数の準備
var count_disp = document.getElementById("disp_count");  
var count_up_btn = document.getElementById("btn_count_up");
var count_value = 0;

var count_disp2 = document.getElementById("disp_count2");  
var fund_up_btn = document.getElementById("btn_fund_up");
var count_value2 = 0;

var count_disp3 = document.getElementById("disp_count3");  
var count_up_btn2 = document.getElementById("btn_count_up2");
var count_value3 = 0;

var count_disp4 = document.getElementById("disp_count4");  
var fund_up_btn2 = document.getElementById("btn_fund_up2");
var count_value4 = 0;

     // カウントアップボタンクリック処理
     count_up_btn.onclick = function (){
          count_value += 1;
          count_disp.innerHTML = count_value;
     };

     fund_up_btn.onclick = function (){
          count_value2 += 100;
          count_disp2.innerHTML = count_value2;
     };

     count_up_btn2.onclick = function (){
          count_value3 += 1;
          count_disp3.innerHTML = count_value3;
     };

     fund_up_btn2.onclick = function (){
          count_value4 += 100;
          count_disp4.innerHTML = count_value4;
     };

};

</script>
</body>
</html>
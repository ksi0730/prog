// console.log("はじめてのジャバスクリプト")
// console.log(23+5)
// console.log(2000-1800)
// console.log("18+5")

// 変数のお話
// var name = "加藤"
// var point = 90;

// if (point >= 80) {
    // console.log("素晴らしい！")
// } else {
    // console.log("もっと頑張ろう")
// }

var random = Math.floor(Math.random() * 5);

console.log(random, "randomな数字が入ってる中身")

if(random === 0){
    console.log("大吉です")
} else if(random === 1) {
    console.log("中吉です")
} else if (random === 2) {
    console.log("小吉です")
} else if (random === 3) {
    console.log("末吉です")
} else if (random === 4) {
    console.log("大凶です")
}

function textSplit(target) {
    target.children().andSelf().contents().each(function() {
      if (this.nodeType == 3) {
        $(this).replaceWith($(this).text().replace(/(\w)/g, "<span>$&</span>"));
        }
    });
  }
  $(function () {
   textSplit($('#js-text'));
  });

// $("#jq").html("かいくけこ");
// $(".jc").html("2222")
// $("div").html("333")

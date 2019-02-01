<?php
// session_start();
// include "bm_funcs.php";
// loginCheck();


include "bm_funcs.php";
$pdo = db_con();

//２．データ登録SQL作成
$stmt = $pdo->prepare("SELECT * FROM gs_bm_table");
$status = $stmt->execute();

//３．データ表示
$view = "";
if ($status == false) {
    sqlError($stmt);
} else {
    //Selectデータの数だけ自動でループしてくれる
    //FETCH_ASSOC=http://php.net/manual/ja/pdostatement.fetch.php
    while ($result = $stmt->fetch(PDO::FETCH_ASSOC)) {
        $view .='<p>';
        $view .= $result["indate"] . "<br>" . $result["url"] . "<br>" . $result["name"] . "<br>" . $result["naiyou"] ;
        $view .='</a>';
        $view .="<br>" ;
        //上記は全角スペース、くっいてしまわないように。
        $view .='<a href ="bm_detail.php?id='.$result["id"] .'" >';
        $view .= '[ 更新 ]';
        $view .='　';
        //上記は全角スペース、くっいてしまわないように。
        $view .='<a href ="bm_delete.php?id='.$result["id"] .'" >';
        $view .= '[ 削除 ]';
        $view .='</a>';
        $view .='</p>';
    }
}
?>



<!DOCTYPE html>
<html lang="ja">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>データ登録画面</title>
<link rel="stylesheet" href="css/range.css">
<link href="css/bootstrap.min.css" rel="stylesheet">
<style>div{padding: 10px;font-size:16px;}</style>
</head>
<body id="main">
<!-- Head[Start] -->
<header>
  <nav class="navbar navbar-default">
    <div class="container-fluid">
      <div class="navbar-header">
      <a class="navbar-brand" href="bm_index.php">データ登録画面</a>
      <a class="navbar-brand" href="bm_logout.php">ログアウト画面</a>
      </div>
    </div>
  </nav>
</header>
<!-- Head[End] -->

<!-- Main[Start] -->
<div>
    <div class="container jumbotron"><?=$view?></div>
</div>

<!-- <script>

var search = function(options) {
// 検索条件のベースとなるオブジェクト
var params = {
  lang: 'ja_jp',
  entry: 'music',
  media: 'music',
  country: 'JP',
};

// 検索ワード（複数の場合は、「+」で結合しておくこと）
if (options && options.term) {
  params.term = options.term;
}

// 検索上限を指定する
if (options && options.limit) {
  params.limit = options.limit;
}

// iTunes APIをコールする
$.ajax({ 
  url: 'https://itunes.apple.com/search',
  method: 'GET',
  data: params,
  // dataTypeをjsonpにする必要があります
  dataType: 'jsonp',

  // 処理が成功したら、jsonが返却されます
   success: function(json) {
    showData(json, options);
  },
  error: function() {
    console.log('itunes api search error. ', arguments);
  },
});
};

/**
iTunes APIから取得したデータをテーブルに表示する
*/
var showData = function(json) {
// UIへ表示する
// デザインは適当ですが、こんな感じで表示できます。
for (var i = 0, len = json.results.length; i < len; i++) {
  var result = json.results[i];
  var html = 'title:' + result.trackName;
  html += 'artist:' + result.artistName;
  html += '視聴する:<audio src="' + result.previewUrl + '" controls />';
  $('#displayArea').append(html);
}
}

// 検索する
search({
term: 'きゃりーぱみゅぱみゅ',
limit: 30
});
</script> -->

// <!-- <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
// <script type="text/javascript" src="https://www.google.com/jsapi"></script>
// <script type="text/javascript">
// google.load("feeds", "1");
// function initialize() {
//     var feedurl = "https://itunes.apple.com/jp/rss/customerreviews/id=387771637/xml";
//     var feed = new google.feeds.Feed(feedurl);
//     feed.setNumEntries(51);
//     feed.setResultFormat(google.feeds.Feed.XML_FORMAT);
//     feed.load(function (result){
//         if (!result.error){
//             var entries = result.xmlDocument.getElementsByTagName("entry");
//             if (entries.length > 0) {
//                 for (var i = 1; i < entries.length; i++) {
//                     var title = jQuery(entries[i]).find("title").text();
//                     var author = jQuery(entries[i]).find("author").find("name").text();
//                     var contentHtml = jQuery(entries[i]).find("content").text();
//                     var html = jQuery.parseHTML(contentHtml);
//                     var content = jQuery(html).find("font:last").text();
//                     var updated = jQuery(entries[i]).find("updated").text();
//                     var publishDate = new Date(updated);
//                     var rating = jQuery(entries[i]).find("im\\:rating, rating").text();
//                     var version = jQuery(entries[i]).find("im\\:version, version").text();
//                     var out = '&lt;li&gt;&lt;p&gt;' + title + ' &lt;span style="color: #ff9500"&gt;' + getStarRating(rating) + '&lt;/span&gt;&lt;/p&gt;&lt;p&gt;:' + author + ' - ' + publishDate.toLocaleString() + ' - Ver.' + version + '&lt;/p&gt;&lt;p&gt;' + content + '&lt;/p&gt;'+ '&lt;/li&gt;'
//                     out = out.replace(/&lt;/igm, "<").replace(/&gt;/igm, ">");
//                     jQuery('#customerreviews ul').append(out);
//                 }
//             } else {
//                 var out = '&lt;span style="color:#f00; font-size:90%"&gt;申し訳ありません。現在、iTunes からカスタマーレビューを取得できません。&lt;br&gt;iTunes RSS カスタマーレビューサービスが停止してる可能性があります。&lt;br&gt;ご迷惑をおかけしますが、しばらく経ってから再度ご覧ください。&lt;/span&gt;';
//                 out = out.replace(/\&lt;/igm, "<").replace(/\&gt;/igm, ">");
//                 jQuery('#customerreviews ul').append(out);
//             }
//         }
//     });
// }
// function getStarRating(rating) {
//     return (!jQuery.isNumeric(rating) || rating < 0 || rating > 5) ? "-" : "★★★★★☆☆☆☆☆".substr(5 - rating, 5);
// }
// google.setOnLoadCallback(initialize);
// </script> -->
 
<div id="customerreviews"><ul style="list-style-type: circle"></ul></div>
<!-- Main[End] -->

</body>
</html>

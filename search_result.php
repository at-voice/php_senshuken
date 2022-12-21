<?PHP

// DB接続
include('functions/functions.php');

session_start();
check_session_id();

$pdo = connect_to_db();
// DB接続終了

?>

<!DOCTYPE html>
<html lang="ja">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>search_result.php</title>
  <link rel="stylesheet" type="text/css" href="css/style.css">
 <script src="https: //ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
 </head>

<body>
<h1>ここはindex_.phpです</h1>
<p>こんにちは＊＊さん</p>
<a href="../php_senshuken/logout/logout.php">ログアウト</a>
<a href="test.php">[test]ログアウトしてたら見られないページ</a>
<p>相対パスをコピーって便利…</p>

<div class="youtube_info_wrapper">
  <div class="list_youtube">
    <iframe width="560" height="315" src="https://www.youtube.com/embed/l-gF3W03mKE" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
  </div>
  <div class="list_comment">
    <ul>
      <li>すき</li>
      <li>メロスは激怒した。必ず、かの邪智暴虐じゃちぼうぎゃくの王を除かなければならぬと決意した。メロスには政治がわからぬ。メロスは、村の牧人である。笛を吹き、羊と遊んで暮して来た。けれども邪悪に対しては、人一倍に敏感であった。きょう未明メロスは村を出発し、野を越え山越え、十里はなれた此このシラクスの市にやって来た。メロスには父も、母も無い。女房も無い。十六の、内気な妹と二人暮しだ。</li>
      <li>ほにゃほにゃほにゃほにゃ</li>
    </ul>
  </div>

</div>








</body>
</html>
<?PHP

// DB接続
include('functions/functions.php');
$pdo = connect_to_db();
// DB接続終了

?>

<!DOCTYPE html>
<html lang="ja">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>movie_info.php</title>
  <link rel="stylesheet" type="text/css" href="css/style.css">
 <script src="https: //ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
 </head>

<body>
<h2>
ここはmovie_info.phpです
</h2>

<div>
    <iframe width="560" height="315" src="https://www.youtube.com/embed/l-gF3W03mKE" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>

      <div class="comment_list">
        <ul>
          <li>最後のシーンが好き</li>
          <li>考えさせられる内容だった</li>
          <li>記憶を消してもう一度見たい名作。ただし昼限定。</li>

        </ul>
      </div>






</div>



<h2>メモ用</h2>
<p>
id
username
nickname
gender
age
comment
spoiler_comment
keyword
is_for_beginner
post_date
</p>

<p>時間無かったら投稿フォームを別窓で出そう</p>

<hr>

<h2>投稿フォーム</h2>
<div class="comment_form">
  <form action="movie_info/movie_info_create.php" method="post">

  <div>
    username:
    <input type="text" name="username">
    </div>

    <div>
    nickname:
    <input type="text" name="nickname">
    </div>

    <div>
    gender:
    <select name="gender" id="gender">
        <option value="男">男</option>
        <option value="女">女</option>
        <option value="どちらでもない">どちらでもない</option>
   </select>
   </div>

   <div>
   age:
      <select name="age" id="age">
        <option value="10代前半">10代前半</option>
        <option value="10代後半">10代後半</option>
        <option value="20代前半">20代前半</option>
        <option value="20代後半">20代後半</option>
      </select>
   </div>

    <div>
    comedian_name:
    <input type="text" name="comedian_name">
    </div>

    <div>
    url:
    <input type="text" name="website_address">
    </div>

    <div>
    comment:(textareaに変更する)
    <input type="text" name="comment">

    <div>
    spoiler_comment:
    <input type="text" name="spoiler_comment">
    </div>

    <div>
    keyword:
    <input type="text" name="keyword">
    </div>

    <div>
    is_for_beginner:
      <select name="is_for_beginner" id="is_for_beginner">
        <option value="いいえ">いいえ</option>
        <option value="はい">はい</option>
      </select>
    </div>

    <div>
      <button>書き込む</button>
    </div>

  </form>
</div>

</body>
</html>
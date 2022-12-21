<?PHP

// DB接続
include('functions/functions.php');

session_start();
check_session_id();

$pdo = connect_to_db();
// DB接続終了

// SQL作成＆実行
$sql = 'SELECT * FROM comment';
$stmt = $pdo->prepare($sql);

try {
  $status = $stmt->execute();
} catch (PDOException $e) {
  echo json_encode(["sql error" => "{$e->getMessage()}"]);
  exit();
}
// SQL作成＆実行 終了

// SQL実行後の動き
$result = $stmt->fetchAll(PDO::FETCH_ASSOC);

$output = "";
foreach ($result as $record) {
  $output .= "
  <a href='{$record["website_address"]}'>{$record["comment"]}</a><a> </a>
  ";
}

$output2 = "";
foreach ($result as $record) {
  $output2 .= "
  <a href='{$record["website_address"]}'>{$record["keyword"]}</a><a> </a>
  ";
}
// SQL実行後の動き 終了




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
ここはindex1.phpです
</h2>

<div>
      <div class="comment_wrapper">
<div class="movie_comment">
  <?= $output ?>
</div>

<div class="movie_keyword">
  <?= $output2 ?>
</div>

      </div>






</div>

<hr>

<!-- 投稿フォーム -->
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
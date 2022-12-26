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
  <form action='movie_info.php' method='get'>
  <input type='hidden' value='{$record["website_address"]}' name='site_address'>
  <button class='list_button' value='{$record["comment"]}'>“{$record["comment"]}”</button>
  </form>
  ";
}


$output2 = "";
foreach ($result as $record) {
  $output2 .= "
  <form action='movie_info.php' method='get'>
  <input type='hidden' value='{$record["website_address"]}' name='site_address'>
  <button class='list_button' value='{$record["keyword"]}'>“{$record["keyword"]}”</button>
  </form>
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
  <link rel="preconnect" href="https://fonts.googleapis.com"><link rel="preconnect" href="https://fonts.gstatic.com" crossorigin><link href="https://fonts.googleapis.com/css2?family=Sawarabi+Mincho&display=swap" rel="stylesheet">
  <link rel="stylesheet" type="text/css" href="css/style.css">
 <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
 </head>

<body>
<div class="header">
<img src="img/logo.png" alt="">
</div>

<div class="comment_wrapper">

  <div class="movie_comment">
<h2>感想</h2>
  <?= $output ?>
  </div>

<div class="movie_keyword">
  <h2>印象に残ったセリフ、キーワード</h2>
  <?= $output2 ?>
</div>

 </div>






</div>


<!-- 投稿フォーム -->
<div class="comment_form">
  <form action="comment/comment_from_index.php" method="post">

  <div>

  <div class="comment_form_part">
    <div>
    性別
    <select name="gender" id="gender">
        <option value="男">男</option>
        <option value="女">女</option>
        <option value="どちらでもない">どちらでもない</option>
   </select>
   </div>

   <div>
   年代
      <select name="age" id="age">
        <option value="10代前半">10代前半</option>
        <option value="10代後半">10代後半</option>
        <option value="20代前半">20代前半</option>
        <option value="20代後半">20代後半</option>
      </select>
   </div>
  </div>


    <div>
    動画URL
    <input type="text" name="website_address">
    </div>

    <div class="comment_form_part">
    <div>
    感想
    <input type="text" name="comment">
</div>

    <div>
    印象に残ったセリフ・キーワード
    <input type="text" name="keyword">
    </div>
    </div>

  <div class="comment_form_part">
    <div>
    これは初心者向けですか？
      <select name="is_for_beginner" id="is_for_beginner">
        <option value="いいえ">いいえ</option>
        <option value="はい">はい</option>
      </select>
    </div>

    <div>
      <button>書き込む</button>
    </div>
    </div>

  </form>
</div>


</body>
</html>
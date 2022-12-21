<?PHP

// var_dump($_POST);
// exit();→ちゃんと取れてる！

// DB接続
session_start();
include('../functions/functions.php');
check_session_id();

$pdo = connect_to_db();
// DB接続終了

// 必須項目未記入の場合の処理を書く
if (
  !isset($_POST['gender']) || $_POST['gender']=='' ||
  !isset($_POST['age']) || $_POST['age']=='' ||
  !isset($_POST['comedian_name']) || $_POST['comedian_name']=='' ||
  !isset($_POST['website_address']) || $_POST['website_address']=='' ||
  !isset($_POST['comment']) || $_POST['comment']==''
) {
  exit('必須項目が未記入ですです');
}
// 必須項目未記入の場合の処理を書く（ここまで）

// データ受け取り
$username = $_POST['username'];
$nickname = $_POST['nickname'];
$gender = $_POST['gender'];
$age = $_POST['age'];
$comedian_name = $_POST['comedian_name'];
$website_address = $_POST['website_address'];
$comment = $_POST['comment'];
$spoiler_comment = $_POST['spoiler_comment'];
$keyword = $_POST['keyword'];
$is_for_beginner = $_POST['is_for_beginner'];
// データ受け取りここまで

// SQL作成＆実行
$sql = 'INSERT INTO comment(id, username, nickname, gender, age, comedian_name, website_address, comment, spoiler_comment, keyword, is_for_beginner, post_date) VALUES (NULL, :username, :nickname, :gender, :age, :comedian_name, :website_address, :comment, :spoiler_comment, :keyword, :is_for_beginner, now()) ';
$stmt = $pdo->prepare($sql);
// SQL作成＆実行 ここまで

// バインド変数設定
$stmt->bindValue(':username', $username, PDO::PARAM_STR);
$stmt->bindValue(':nickname', $nickname, PDO::PARAM_STR);
$stmt->bindValue(':gender', $gender, PDO::PARAM_STR);
$stmt->bindValue(':age', $age, PDO::PARAM_STR);
$stmt->bindValue(':comedian_name', $comedian_name, PDO::PARAM_STR);
$stmt->bindValue(':website_address', $website_address, PDO::PARAM_STR);
$stmt->bindValue(':comment', $comment, PDO::PARAM_STR);
$stmt->bindValue(':spoiler_comment', $spoiler_comment, PDO::PARAM_STR);
$stmt->bindValue(':keyword', $keyword, PDO::PARAM_STR);
$stmt->bindValue(':is_for_beginner', $is_for_beginner, PDO::PARAM_STR);
// バインド変数設定 ここまで

// SQL実行
try {
  $status = $stmt->execute();
} catch (PDOException $e) {
  echo json_encode(["sql error" => "{$e->getMessage()}"]);
  exit();
}
// SQL実行 ここまで

// 書いたら戻る
header('Location:../movie_info.php');
exit();
// 書いたら戻る ここまで









?>
<?PHP

// URLを渡すための動き

// var_dump($_POST);
// exit();→ちゃんと取れてる！

// DB接続
session_start();
include('../functions/functions.php');
check_session_id();

$pdo = connect_to_db();
// DB接続終了

// データ受け取り
$site_address = $_GET['site_address'];
// データ受け取りここまで

// var_dump($site_address);
// exit();→取れた

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
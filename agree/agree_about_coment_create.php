<?PHP

// DB接続
session_start();
include('../functions/functions.php');
check_session_id();

$pdo = connect_to_db();
// DB接続終了

// GETで値を受け取る
$user_id = $_GET['user_id'];
$todo_id = $_GET['todo_id'];
// GETで値を受け取る ここまで

// var_dump($user_id);
// var_dump($todo_id);
// exit();⇨とれてる

$sql = 'SELECT COUNT(*) FROM agree_about_comment WHERE user_id=:user_id AND todo_id=:todo_id';
// データを絞る

$stmt = $pdo->prepare($sql);
$stmt->bindValue(':user_id', $user_id, PDO::PARAM_STR);
$stmt->bindValue(':todo_id', $todo_id, PDO::PARAM_STR);

try {
  $status = $stmt->execute();
} catch (PDOException $e) {
  echo json_encode(["sql error" => "{$e->getMessage()}"]);
  exit();
}

$agree_count = $stmt->fetchColumn();

// var_dump($agree_count);
// exit;

if ($agree_count !== 0) {
  // いいねされている状態
  $sql = 'DELETE FROM agree_about_comment WHERE user_id=:user_id AND todo_id=:todo_id';
} else {
  // いいねされていない状態
  $sql = 'INSERT INTO agree_about_comment (id, user_id, todo_id, created_at) VALUES (NULL, :user_id, :todo_id, now())';
}

$stmt = $pdo->prepare($sql);
$stmt->bindValue(':user_id', $user_id, PDO::PARAM_STR);
$stmt->bindValue(':todo_id', $todo_id, PDO::PARAM_STR);

try {
  $status = $stmt->execute();
} catch (PDOException $e) {
  echo json_encode(["sql error" => "{$e->getMessage()}"]);
  exit();
}

header("Location:../movie_info.php");
exit();





?>
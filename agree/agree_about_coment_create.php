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



$sql = 'INSERT INTO like_table (id, user_id, todo_id, created_at) VALUES (NULL, :user_id, :todo_id, now())';

$stmt = $pdo->prepare($sql);
$stmt->bindValue(':user_id', $user_id, PDO::PARAM_STR);
$stmt->bindValue(':todo_id', $todo_id, PDO::PARAM_STR);

try {
  $status = $stmt->execute();
} catch (PDOException $e) {
  echo json_encode(["sql error" => "{$e->getMessage()}"]);
  exit();
}

header("Location:todo_read.php");
exit();





?>
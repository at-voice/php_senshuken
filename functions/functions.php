<?PHP

function connect_to_db()
{
  $dbn='mysql:dbname=php_senshuken;charset=utf8mb4;port=3306;host=localhost';
  $user = 'root';
  $pwd = '';
  try {
    return new PDO($dbn, $user, $pwd);
  } catch (PDOException $e) {
    exit('dbError:'.$e->getMessage());
  }
}
// DB接続関数


function check_session_id()
{
  if (!isset($_SESSION["session_id"]) ||$_SESSION["session_id"] !== session_id()) {
    header('Location:../php_senshuken/login.php');
    exit();
  } else {
    session_regenerate_id(true);
    $_SESSION["session_id"] = session_id();
  }
}
// ログインしてないとページを表示しなくする機能

?>


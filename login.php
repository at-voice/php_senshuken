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
  <title>login.php ログインページ</title>
  <link rel="stylesheet" type="text/css" href="/css/style.css">
 <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
 </head>

<body>
<h1>ログインページ</h1>

<!-- ログインフォーム -->
<form action="login/login_act.php" method="post">
username:<input type="text" name="username">
password:<input type="text" name="password">
<button>ログイン</button>
</form>
<!-- ログインフォーム終わり -->

<a href="test.php">ログアウトしたら見られないページ</a>

</body>
</html>
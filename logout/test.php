<?PHP

// DB接続
include('../functions/functions.php');

session_start();
check_session_id();

$pdo = connect_to_db();
// DB接続終了

?>

<!DOCTYPE html>
<html lang="ja">
	<head>
		<meta charset="UTF-8" />
		<meta http-equiv="X-UA-Compatible" content="IE=edge" />
		<meta name="viewport" content="width=device-width, initial-scale=1" />
		<title>Document</title>
		<link rel="stylesheet" type="text/css" href="css/style.css" />
		<script src="https: //ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
	</head>

	<body>
		test💏
		<a href="../login.php">ログインページに飛ぶ</a>
	</body>
</html>

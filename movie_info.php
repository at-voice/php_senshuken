<?PHP

// DB接続
include('functions/functions.php');

session_start();
check_session_id();

$pdo = connect_to_db();
// DB接続終了

// データ受け取り
$site_address = $_GET['site_address'];
// データ受け取りここまで

// var_dump($site_address);
// exit();⇨取れてた

// SQL作成＆実行
$sql = 'SELECT * FROM comment WHERE website_address = "https://www.youtube.com/watch?v=l-gF3W03mKE" ORDER BY post_date ASC';

// $sql = 'SELECT * FROM comment';
$stmt = $pdo->prepare($sql);

$user_id = $_SESSION['user_id'];

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

<div class='watchers_voice_wraper'>
<div class='watchers_voice'>
<p><span>感想 </span></p><p>　{$record["comment"]}</p>
<p><span>印象深いセリフ・キーワード </span></p><p>　{$record["keyword"]}</p>
<p>　{$record["gender"]} {$record["age"]}</p>
</div>
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
  <div class="header">
<img src="img/logo.png" alt="">
<h2>
<?=$site_address?>
</h2>
</div>


<div>
<iframe width='560' height='315' src='<?=$record["website_address"]?>' title='YouTube video player' frameborder='0' allow='accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture' allowfullscreen></iframe>
<a href="<?=$record["website_address"]?>">youtube</a>

<?=$output?>
      </div>






</div>





</body>
</html>
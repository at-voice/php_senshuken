<?PHP

// var_dump($_POST);
// exit();→ちゃんと取れてる！

// 必須項目未記入の場合の処理を書く
if (
  !isset($_POST['gender']) || $_POST['gender']=='' ||
  !isset($_POST['age']) || $_POST['age']=='' ||
  !isset($_POST['comment']) || $_POST['comment']==''
) {
  exit('必須項目が未記入ですです');
}
// 必須項目未記入の場合の処理を書く（ここまで）

// データ受け取り

// データ受け取りここまで











?>
<?php
//入力チェック(受信確認処理追加)
// if(
//   !isset($_POST['name']) || $_POST['name']=='' ||
//   !isset($_POST['link']) || $_POST['link']=='' ||
//   !isset($_POST['coment']) || $_POST['coment']==''
// ){
//   exit('ParamError');
// }

//1. POSTデータ取得
$id = $_POST["id"];
$name = $_POST["name"];
$lid = $_POST["lid"];
$lpw = $_POST["lpw"];
$ad_flg = $_POST["ad_flg"];
$ac_flg = $_POST["ac_flg"];

//2. DB接続します(エラー処理追加)
try {
  $pdo = new PDO('mysql:dbname=gs_f01_db10;charset=utf8;host=localhost','root','');
} catch (PDOException $e) {
  exit('dbError:'.$e->getMessage());
}




//3．データ登録SQL作成
$stmt = $pdo->prepare('UPDATE gs_user_table SET name=:a1,lid=:a2,lpw=:a3,ad_flg=:a4,ac_flg=:a5 WHERE id=:id');
$stmt->bindValue(':a1', $name, PDO::PARAM_STR);    //Integer（数値の場合 PDO::PARAM_INT)
$stmt->bindValue(':a2', $lid, PDO::PARAM_STR);   //Integer（数値の場合 PDO::PARAM_INT)
$stmt->bindValue(':a3', $lpw, PDO::PARAM_STR);  //Integer（数値の場合 PDO::PARAM_INT
$stmt->bindValue(':a4', $ad_flg, PDO::PARAM_INT); 
$stmt->bindValue(':a5', $ac_flg, PDO::PARAM_INT); 
$stmt->bindValue(':id', $id, PDO::PARAM_INT);
$status = $stmt->execute();
//4．データ登録処理後
if($status==false){
  errorMsg($stmt);
}else{
  header('Location: select.php');
  exit;
}
?>



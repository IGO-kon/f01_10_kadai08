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
$id     = $_POST["id"];
$name   = $_POST["name"];
$link  = $_POST["link"];
$coment = $_POST["coment"];

//2. DB接続します(エラー処理追加)
try {
  $pdo = new PDO('mysql:dbname=gs_f01_db10;charset=utf8;host=localhost','root','');
} catch (PDOException $e) {
  exit('dbError:'.$e->getMessage());
}




//3．データ登録SQL作成
$stmt = $pdo->prepare('UPDATE gs_bm_table SET name=:a1,link=:a2,coment=:a3 WHERE id=:id');
$stmt->bindValue(':a1', $name, PDO::PARAM_STR);
$stmt->bindValue(':a2', $link, PDO::PARAM_STR);
$stmt->bindValue(':a3', $coment, PDO::PARAM_STR);
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



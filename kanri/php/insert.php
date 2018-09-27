<?php

// if(
//   !isset($_POST["name"]) || $_POST["name"]=="" ||
//   !isset($_POST["link"]) || $_POST["link"]=="" ||
//   !isset($_POST["lid"]) || $_POST["lid"]==""
// ){
//   exit('ParamError');
// }

//1. POSTデータ取得
//$name = filter_input( INPUT_GET, "name" ); //こういうのもあるよ
//$email = filter_input( INPUT_POST, "email" ); //こういうのもあるよ
$name = $_POST["name"];
$lid = $_POST["lid"] ;
$lpw = $_POST["lpw"];
$ad_flg = $_POST["ad_flg"];
$ac_flg = $_POST["ac_flg"];

//2. DB接続します
try {
  $pdo = new PDO('mysql:dbname=gs_f01_db10;charset=utf8;host=localhost','root','');
} catch (PDOException $e) {
  exit('dbError:'.$e->getMessage());
}

//３．データ登録SQL作成
$sql ="INSERT INTO gs_user_table(id,name,lid,lpw,ad_flg,ac_flg,date)
VALUES(NULL,:a1,:a2,:a3,:a4,:a5,sysdate())";
$stmt = $pdo->prepare($sql);
$stmt->bindValue(':a1', $name, PDO::PARAM_STR);    //Integer（数値の場合 PDO::PARAM_INT)
$stmt->bindValue(':a2', $lid, PDO::PARAM_STR);   //Integer（数値の場合 PDO::PARAM_INT)
$stmt->bindValue(':a3', $lpw, PDO::PARAM_STR);  //Integer（数値の場合 PDO::PARAM_INT
$stmt->bindValue(':a4', $ad_flg, PDO::PARAM_INT); 
$stmt->bindValue(':a5', $ac_flg, PDO::PARAM_INT); 
$status = $stmt->execute();

//４．データ登録処理後
if($status==false){
  //SQL実行時にエラーがある場合（エラーオブジェクト取得して表示）
  $error = $stmt->errorInfo();
  exit("sqlError:".$error[2]);
}else{
  //５．index.phpへリダイレクト
  header("location: index.php");//スペースがないと動かない

}
?>

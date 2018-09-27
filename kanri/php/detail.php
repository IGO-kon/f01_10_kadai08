<?php
// getで送信されたidを取得
$id = $_GET['id'];
echo "GET:".$id;


//1.  DB接続します
try {
  $pdo = new PDO('mysql:dbname=gs_f01_db10;charset=utf8;host=localhost','root','');
} catch (PDOException $e) {
  exit('dbError:'.$e->getMessage());
}

//２．データ登録SQL作成，指定したidのみ表示する
$stmt = $pdo->prepare('SELECT * FROM gs_user_table WHERE id=:id');
$stmt->bindValue(':id',$id, PDO::PARAM_INT);
$status = $stmt->execute();

//３．データ表示
 if($status==false){
  // エラーのとき
errorMsg($stmt);
}else{
  // エラーでないとき
$rs = $stmt->fetch();
  // fetch()で1レコードを取得して$rsに入れる
  // $rsは配列で返ってくる．$rs["id"], $rs["name"]などで値をとれる
  // var_dump()で見てみよう
}
?>

<!-- htmlは「index.php」とほぼ同じです -->
<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <title>管理画面</title>
  
  <style>div{padding: 10px;font-size:16px;}</style>
</head>
<body>

<!-- Head[Start] -->
<header>
  <nav class="navbar navbar-default">
    <div class="container-fluid">
    <div class="navbar-header"><a class="navbar-brand" href="select.php">データ一覧</a></div>
  </nav>
</header>
<!-- Head[End] -->

<!-- Main[Start] -->
<form method="post" action="update.php">
  <div class="jumbotron">
   <fieldset>
    <legend>管理画面</legend>
     <label>名前：<input type="text" name="name" value="<?=$rs["name"]?>"></label><br>
     
     <label><textArea name="lid" rows="4" cols="40"><?=$rs["lid"]?></textArea></label><br>
     <label>lpw：<input type="text" name="lpw" value="<?=$rs["lpw"]?>"></label><br>
     <label>ad_flg：<input type="int" name="ad_flg" value="<?=$rs["ad_flg"]?>"></label><br>
     <label>ac_flg：<input type="int" name="ac_flg" value="<?=$rs["ac_flg"]?>"></label><br>
     <!-- <label>：<input type="text" name="name" value="</label><br>
     <label>：<input type="text" name="name" value="</label><br>
     <label>：<input type="text" name="name" value=""></label><br> -->
    <input type="submit" value="送信">
     <!-- idは変えたくない = ユーザーから見えないようにする-->
     <input type="hidden" name="id" value="<?=$rs["id"]?>">
    </fieldset>
  </div>
</form>
<!-- Main[End] -->


</body>
</html>

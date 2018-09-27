<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <title>Bookmarker</title>
 
  <style>div{padding: 10px;font-size:16px;}</style>
  <script type="text/javascript">
  
  
  
  
  
  
  
  </script>
</head>
<body>

<!-- Head[Start] -->
<header>
  <nav class="navbar navbar-default">
    <div class="container-fluid">
    <div class="navbar-header"><a class="navbar-brand" href="select.php">データ一覧</a></div>
    </div>
  </nav>
</header>
<!-- Head[End] -->

<!-- Main[Start] -->
<form method="post" action="insert.php">
  <div class="jumbotron">
   <fieldset>
    <legend>管理画面</legend>
     <label>name：<input type="text" name="name"></label><br>
     <label>lid<textArea name="lid" rows="4" cols="40"></textArea></label><br>
     <label>lpw：<input type="text" name="lpw"></label><br>
     <label>ad_flg：<input type="int" name="ad_flg"></label><br>
     <label>ac_flg：<input type="int" name="ac_flg"></label><br>
     
     <input type="submit" value="送信">
    </fieldset>
  </div>
</form>
<!-- Main[End] -->


</body>
</html>

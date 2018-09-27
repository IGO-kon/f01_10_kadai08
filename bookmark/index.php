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
    <legend>IGO's Bookmarker</legend>
     <label>Book：<input type="text" name="name"></label><br>
     <label>Link：<input type="text" name="link"></label><br>
     <label>Coment<textArea name="coment" rows="4" cols="40"></textArea></label><br>
     <input type="submit" value="送信">
    </fieldset>
  </div>
</form>
<!-- Main[End] -->


</body>
</html>

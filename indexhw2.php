<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <title>愛読書</title>
  <style>div{padding: 10px;font-size:16px;}</style>
</head>
<body>

<!-- Head[Start] -->
<header>
    <div>
        <form method="post" action="selecthw2.php">
            <input type="text" name="search">
            <input type="submit" value="検索">
        </form>
    </div>
    <div>
    <div><a href="selecthw2.php">データ一覧</a></div>
    </div>
</header>
<!-- Head[End] -->

<!-- Main[Start] -->
<form method="post" action="inserthw2.php">
  <div>
   <fieldset>
    <legend>愛読書</legend>
     <label>名前：<input type="text" name="name"></label><br>
     <label>書籍：<input type="text" name="books"></label><br>
     <label>URL：<input type="text" name="url"></label><br>
     <label><p>オススメポイント：</p>
     <textArea name="point" rows="5" cols="40"></textArea></label><br>
     <input type="submit" value="送信">
    </fieldset>
  </div>
</form>
<!-- Main[End] -->


</body>
</html>

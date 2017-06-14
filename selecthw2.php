<?php
if(!isset($_POST["search"]) || $_POST["search"]==""){
    $s = 0;
}else{
    $s = 1;
}

//1.  DB接続します
try {
  $pdo = new PDO('mysql:dbname=gs_db;charset=utf8;host=localhost','root','');
} catch (PDOException $e) {
  exit('DbConnectError:'.$e->getMessage());
}

//２．データ登録SQL作成
if($s == 1){
    $stmt = $pdo->prepare("SELECT * FROM gs_books WHERE name LIKE :name");
    $stmt->bindValue(":name", '%'.$_POST["search"].'%');
}else{
    $stmt = $pdo->prepare("SELECT * FROM gs_books");
}
$status = $stmt->execute();

//３．データ表示
$view="";
if($status==false){
  //execute（SQL実行時にエラーがある場合）
  $error = $stmt->errorInfo();
  exit("ErrorQuery:".$error[2]);

}else{
  //Selectデータの数だけ自動でループしてくれる
  while( $result = $stmt->fetch(PDO::FETCH_ASSOC)){
    $view .= "<p>".$result["name"].",".$result["books"].",".$result["url"].
        ",".$result["point"]."</p>";
  }

}
?>


<!DOCTYPE html>
<html lang="ja">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>愛読書</title>
<style>div{padding: 10px;font-size:16px;}</style>
</head>
<body id="main">
<!-- Head[Start] -->
<header>
  <nav>
    <div>
      <div>
      <a href="indexhw2.php">データ登録</a>
      </div>
    </div>
  </nav>
</header>
<!-- Head[End] -->

<!-- Main[Start] -->
<div>
    <div><?=$view?></div>
</div>
<!-- Main[End] -->

</body>
</html>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>アンケート</title>
</head>
<body>
    <h1>可愛いペットランキング</h1>
    <p>一番可愛いと思うペットを選んでください</p>
<form name="form" method="post" action="hw1.php">
<?php
//ラジオボタンを項目ごとに出力
$subject=array('ねこ','いぬ','うさぎ','ハムスター','熱帯魚');
for($i=0; $i<count($subject); $i++){
    echo "<input type='radio' name='pet' value='$i'>{$subject[$i]}<br>\n";
}
?>
<br>
<input type="submit" name="submit" value="投票">
</form>
<table border="1">
<?php
//データの書き込み
$data=file('hw1.txt');
for($i=0; $i<count($subject); $i++){
    $data[$i]=rtrim($data[$i]);
}
if(isset($_POST['submit'])){
    $data[$_POST['pet']]++;
    $fp=@fopen('hw1.txt','w');
    fwrite($fp,$data[$_POST['pet']]."\n");
    fclose($fp);
}
//データの出力
echo "<hr>";
for($i=0; $i<count($subject); $i++){
    echo "<tr>";
    echo "<td>{$subject[$i]}</td>";
    echo "<td><table><tr>";
    $wd=$data[$i]*10; //出力幅の設定
    echo "<td width='$wd' bgcolor='#eeeeee'> </td>";
    echo "<td>{$data[$i]} 票</td>";
    echo "</tr></table></td>";
    echo "</tr>\n";
}
?>
</table>
</body>
</html>
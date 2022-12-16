<?php
//select.phpの一番上に1行追記
require_once('funcs.php');

//1.  DB接続します
try {
  //Password:MAMP='root',XAMPP=''
  $pdo = new PDO('mysql:dbname=kadai;charset=utf8;host=localhost','root', '');
} catch (PDOException $e) {
  exit('DBConnectError'.$e->getMessage());
}

//２．データ取得SQL作成
$stmt = $pdo->prepare('SELECT * FROM gs_bm_table');
$status = $stmt->execute();

//３．データ表示
$view="";
if ($status==false) {
    //execute（SQL実行時にエラーがある場合）
  $error = $stmt->errorInfo();
  exit("ErrorQuery:".$error[2]);

}else{
  //Selectデータの数だけ自動でループしてくれる
  //FETCH_ASSOC=http://php.net/manual/ja/pdostatement.fetch.php
  $view .= '<table>';
  $view .= '<tr><th>登録日</th><th>書籍名</th><th>書籍URL</th><th>書籍コメント</th></tr>';
  while( $result = $stmt->fetch(PDO::FETCH_ASSOC)){
        $view .= '<tr>';
        $view .= '<td>' . $result['date'] . '</td><td>' . $result['book_name'] . '</td><td>' . $result['url'] . '</td><td>' . $result['comment'];
        $view .= '</tr></td>';
  }
  $view .= '</table>';
}
?>


<!DOCTYPE html>
<html lang="ja">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>フリーアンケート表示</title>
<link rel="stylesheet" href="css/range.css">
<link href="css/bootstrap.min.css" rel="stylesheet">
<style>
  div{padding: 10px;font-size:16px;}
  th{padding: 10px;font-size:16px; font-weight: bold; border:1px solid; background-color: orange}
  td{padding: 10px;font-size:16px;border:1px solid}
  table{width:100%; border:2px solid}

</style>
</head>
<body id="main">
<!-- Head[Start] -->
<header>
  <nav class="navbar navbar-default">
    <div class="container-fluid">
      <div class="navbar-header">
      <a class="navbar-brand" href="index.php">データ登録</a>
      </div>
    </div>
  </nav>
</header>
<!-- Head[End] -->

<!-- Main[Start] -->
<div>
    <div class="container jumbotron"><?= $view ?></div>
</div>
<!-- Main[End] -->

</body>
</html>

<?php
//エラー表示
ini_set("display_errors", 1);

//1.  DB接続します
try {
  //Password:MAMP='root',XAMPP=''
  $pdo = new PDO('mysql:dbname=gs_bookmark_db;charset=utf8;host=localhost','root','');
} catch (PDOException $e) {
  exit('DB_CONNECT:'.$e->getMessage());
}

//２．データ登録SQL作成
$sql = "SELECT * FROM bookmarks";
$stmt = $pdo->prepare($sql);
$status = $stmt->execute();

//３．データ表示
if($status==false) {
  //execute（SQL実行時にエラーがある場合）
  $error = $stmt->errorInfo();
  exit("SQL_ERROR:".$error[2]);
}

//全データ取得
$values =  $stmt->fetchAll(PDO::FETCH_ASSOC); //PDO::FETCH_ASSOC[カラム名のみで取得できるモード]
//JSONい値を渡す場合に使う
// $json = json_encode($values,JSON_UNESCAPED_UNICODE);
?>

<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>ブックマーク一覧</title>

  <!-- 既存 CSS -->
  <link rel="stylesheet" href="css/range.css">
  <link href="css/bootstrap.min.css" rel="stylesheet">

  <!-- カスタムスタイル -->
  <style>
    /* ページ全体 */
    body {
      font-family: "Helvetica Neue", Helvetica, Arial, sans-serif;
      background-color: #f4f4f4;
      margin: 0;
      padding: 20px;
    }

    /* ヘッダー・ナビ */
    header .navbar-default {
      background-color: #ffffff;
      border: none;
      box-shadow: 0 2px 8px rgba(0,0,0,0.1);
    }
    .navbar-brand {
      color: #007bff !important;
      font-weight: bold;
    }
    .navbar-brand:hover {
      color: #0056b3 !important;
      text-decoration: none;
    }

    /* メインコンテナ */
    .container.jumbotron {
      background-color: #ffffff;
      padding: 30px;
      border-radius: 8px;
      box-shadow: 0 2px 8px rgba(0,0,0,0.1);
      max-width: 800px;
      margin: 20px auto;
    }

    /* テーブル */
    table {
      width: 100%;
      border-collapse: collapse;
      margin-top: 15px;
    }
    table th,
    table td {
      border: 1px solid #ccc;
      padding: 8px;
      text-align: left;
      font-size: 0.95em;
    }
    table tr:nth-child(odd) {
      background-color: #fafafa;
    }
    table th {
      background-color: #f0f0f0;
    }
  </style>
</head>
<body id="main">
  <!-- Head[Start] -->
  <header>
    <nav class="navbar navbar-default">
      <div class="container-fluid">
        <div class="navbar-header">
          <a class="navbar-brand" href="index.php">ブックマーク登録に戻る</a>
        </div>
      </div>
    </nav>
  </header>
  <!-- Head[End] -->

  <!-- Main[Start] -->
  <div>
    <div class="container jumbotron">
      <h2 class="text-center">登録済みブックマーク一覧</h2>
      <table>
        <tr>
          <th>ID</th>
          <th>タイトル</th>
          <th>URL</th>
          <th>コメント</th>
          <th>登録日時</th>
        </tr>
        <?php foreach($values as $value){ ?>
        <tr>
          <td><?= htmlspecialchars($value["id"], ENT_QUOTES, 'UTF-8') ?></td>
          <td><?= htmlspecialchars($value["title"], ENT_QUOTES, 'UTF-8') ?></td>
          <td>
            <a href="<?= htmlspecialchars($value["url"], ENT_QUOTES, 'UTF-8') ?>" target="_blank">
              <?= htmlspecialchars($value["url"], ENT_QUOTES, 'UTF-8') ?>
            </a>
          </td>
          <td><?= htmlspecialchars($value["bookcomment"], ENT_QUOTES, 'UTF-8') ?></td>
          <td><?= htmlspecialchars($value["indate"], ENT_QUOTES, 'UTF-8') ?></td>
        </tr>
        <?php } ?>
      </table>
    </div>
  </div>
  <!-- Main[End] -->

  <script>
    // 必要に応じて JSON 受け取りなどのスクリプトをここへ
  </script>
</body>
</html>

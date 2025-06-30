<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <title>ブックマーク登録</title>
  <style>
    /* ページ全体の設定 */
    body {
      font-family: "Helvetica Neue", Helvetica, Arial, sans-serif;
      background-color: #f4f4f4;
      margin: 0;
      padding: 20px;
      display: flex;
      justify-content: center;
    }

    /* フォームを囲むコンテナ */
    .container {
      background-color: #ffffff;
      padding: 30px;
      border-radius: 8px;
      box-shadow: 0 2px 8px rgba(0,0,0,0.1);
      width: 100%;
      max-width: 400px;
    }

    /* 見出し */
    h1 {
      margin-top: 0;
      font-size: 1.5em;
      color: #333;
      text-align: center;
    }

    /* ラベルと入力欄 */
    label {
      display: block;
      font-weight: bold;
      margin-bottom: 5px;
      color: #555;
    }

    input[type="text"],
    input[type="url"] {
      width: 100%;
      padding: 8px 10px;
      margin-bottom: 15px;
      border: 1px solid #ccc;
      border-radius: 4px;
      box-sizing: border-box;
      font-size: 1em;
    }

    /* 登録ボタン */
    button {
      width: 100%;
      padding: 10px;
      background-color: #007bff;
      color: #fff;
      font-size: 1em;
      border: none;
      border-radius: 4px;
      cursor: pointer;
    }
    button:hover {
      background-color: #0056b3;
    }

    /* リンク */
    .link {
      display: block;
      text-align: center;
      margin-top: 20px;
    }
    .link a {
      color: #007bff;
      text-decoration: none;
    }
    .link a:hover {
      text-decoration: underline;
    }
  </style>
</head>
<body>
  <div class="container">
    <h1>ブックマーク登録</h1>
    <form method="post" action="insert.php">
      <p>
        <label>タイトル：</label>
        <input type="text" name="title" required>
      </p>
      <p>
        <label>URL：</label>
        <input type="url" name="url" required>
      </p>
      <p>
        <label>コメント：</label>
        <textArea name="bookcomment" rows="4" cols="52"></textArea>
      </p>
      <p>
        <button type="submit">登録する</button>
      </p>
    </form>
    <div class="link">
      <a href="select.php">▶ 登録済みのブックマーク一覧を見る</a>
    </div>
  </div>
</body>
</html>

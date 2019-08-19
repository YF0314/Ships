<?php
?>
  <!DOCTYPE html>
  <html>
  <head>
    <meta charset="UTF-8"/>
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0"/>
    <title>Shipsの説明書</title>

    <link rel="icon" href="https://xere.jp/img/favicon.ico" type="image/x-icon">
    <link rel="shortcut icon" href="https://xere.jp/img/favicon.ico" type="image/x-icon">

    <meta property="og:title" content="Shipsの説明書" />
    <meta property="og:site_name" content="Shipsの説明書?">
    <meta name="description" content="Shipsは匿名状態でファイルの著作権を明確化できる革新的なウェブアプリです。">


    <link href="https://fonts.googleapis.com/css?family=Merriweather|Noto+Serif+JP|Righteous|Roboto+Slab" rel="stylesheet">
    <link href="css/main.css" rel="stylesheet"/>

  </head>
  <body>
    <div class="body">
      <h1>Ships Wellcome Page</h1>
      <h2>全体的な概要やデータ構造については<a href="https://xere.jp/papers/public/Ships/">こちら</a>をご覧ください。</h2>
      <h2>API の説明</h2>
      <h4>http://api.ships.app.xere.jp/get_chains/{Number} でデータを取得できます。{Number}は0から始まり、一度に20件のデータを取得します。{Number}が無効な場合、現在のデータの個数を返します。<br>
      http://api.ships.app.xere.jp/get_user_public/{Number} でNumberに対応するユーザーIDの公開鍵を取得できます。<br>
      これらのAPIはログインせずに誰でも取得することができます。</h4>

      <h2>Appの説明</h2>
      <h4>ウェブアプリ側の説明をします。<a href="login.php">ここから</a>、Pandoraを使ってログインします。次に所有権を明確化したいPDFファイルをアップロードします。これだけです。<br></h4>
</div>
<p><strong>©2019 Yukky</strong></p>
</body>
</html>
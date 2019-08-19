<?php
session_start();

global $last_id;

if ($_SESSION["auth"] && isset($_FILES["pdf"]) && !is_int($_FILES['upfile']['error'])) {
  $maxsize = 1024 * 1024 * 5; // 最大5MB
  $finfo = new finfo();
  $filetype = $finfo->file($_FILES["pdf"]['tmp_name'], FILEINFO_MIME_TYPE);
  if ($filetype == "application/pdf" && $_FILES['uploadfile']['size'] < $maxsize) {
    if (insert_pdf()) {
      echo 'IDは'.$last_id."番です。ファイルの投稿が完了しました。<a href='https://api.ships.app.xere.jp/get_chains/".$last_id."/one/'>ここ</a>で投稿を確認できます。";
    }
  }else{
    echo "PDFファイルではありません。PDFファイルのみに対応しています。";
    // echo readfile($_FILES["pdf"]["tmp_name"]);
  }
}elseif($_SESSION["auth"] && !isset($_FILES["pdf"])) {
  ?>
  <!DOCTYPE html>
  <html>
  <head>
    <meta charset="UTF-8"/>
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0"/>
    <title>Ships panel</title>

    <link rel="icon" href="https://xere.jp/img/favicon.ico" type="image/x-icon">
    <link rel="shortcut icon" href="https://xere.jp/img/favicon.ico" type="image/x-icon">

    <meta property="og:title" content="@Bhe3spy's profile" />
    <meta property="og:url" content="https://xere.jp/" />
    <meta property="og:description" content="@Bhe3spy's profile web page." />
    <meta property="og:image" content="https://xere.jp/img/icon.jpg" />
    <meta property="og:site_name" content="Ships">
    <meta name="description" content="@Bhe3spy's profile web page.">


    <link href="https://fonts.googleapis.com/css?family=Merriweather|Noto+Serif+JP|Righteous|Roboto+Slab" rel="stylesheet">

    <link href="../css/main.css" rel="stylesheet"/>

  </head>
  <body>
    <div class="body">
      <h1>Ships Main Page</h1>
      <h2>What is this?</h2>
      <h4>てきとうなメッセージ</h4>
        <?php echo htmlspecialchars($error);?>
        <form action="" method="post" enctype="multipart/form-data">
          <label class="label" for="name">PDFファイル</label>
  <input type="file" name="pdf">
  <input type="submit" value="送信する">
</form>

</div>
<p><strong>©2019 Yukky</strong></p>
</body>
</html>
<?
}else{
  echo "Hello";
}
function Create_body($last)
{
  $file = hash( "sha256", base64_encode(file_get_contents($_FILES["pdf"]["tmp_name"])));
  // echo $file;
  $body = array('previous'=>$last,'unix'=>time(), 'pdf'=>$file, 'user'=>$_SESSION["user_id"]);
  return json_encode($body);
}

function insert_pdf()
{
  $dsn = 'mysql:host={$SECRET}';
  $db = new PDO($dsn,"{$SECRET}","{$SECRET}");
  $db->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
  $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  try{
    $sql = 'SELECT private_key FROM users WHERE user_id=:prepare';
    $prepare = $db->prepare($sql);
    $prepare->bindValue(':prepare',$_SESSION["user_id"], PDO::PARAM_STR);
    $prepare->execute();
    $user_private = $prepare->fetchColumn();
    $prepare = $db->prepare("SELECT * FROM body WHERE id = (SELECT max(id) FROM body) FOR UPDATE");
    $prepare->execute();
    $last_column = $prepare->fetch(PDO::FETCH_ASSOC);
  }catch (PDOException $e) {
    return false;
  }
  $body = Create_body(hash("sha256",json_encode($last_column)));
  openssl_private_encrypt(hash("sha256", $body), $signature, $user_private);
  $signature = base64_encode($signature);
  if ($body) {
    $sql = 'INSERT INTO body (body,signature) VALUES (:id,:sig)';
    $prepare = $db->prepare($sql);
    $prepare->bindValue(':id',$body, PDO::PARAM_STR);
    $prepare->bindValue(':sig',$signature, PDO::PARAM_STR);
    $prepare->execute();
    global $last_id;
    $last_id = $db->lastInsertId();
  }
  return true;
}

?>
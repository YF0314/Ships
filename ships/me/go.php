<?php
  $dsn = 'mysql:host={$SECRET}';
  $db = new PDO($dsn,"{$SECRET}","{$SECRET}");
  $db->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
  $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    try{
    $sql = 'SELECT * FROM body WHERE id=:prepare';
    $prepare = $db->prepare($sql);
    $prepare->bindValue(':prepare',17, PDO::PARAM_STR);
    $prepare->execute();
    $result = $prepare->fetch(PDO::FETCH_ASSOC);
  }catch (PDOException $e) {
  	echo "OK";
  	exit();
  }
  echo '<pre>';
  echo "ういういウェイ\n";
  print_r($result);
  echo '</pre>';
  $obj = json_decode($result['body']);
  // var_dump($obj);
  // echo $obj->user;
  try{
    $sql = 'SELECT public_key FROM users WHERE user_id=:prepare';
    $prepare = $db->prepare($sql);
    $prepare->bindValue(':prepare',$obj->user, PDO::PARAM_STR);
    $prepare->execute();
    $user_pub = $prepare->fetchColumn();
  }catch (PDOException $e) {
  	echo "Failed";
  	exit();
  }
  // openssl_public_decrypt (base64_decode($result["signature"]) , $decrypted , $user_pub );
  // echo $decrypted;
  // echo "<br>". hash("sha256", $result['body']); // Bodyのハッシュ
  // echo hash("sha256",json_encode($result));
  echo "<br>Finished";

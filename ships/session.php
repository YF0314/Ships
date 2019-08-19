<?php
session_start();

if($_SESSION['auth']){
	header('Location: https://ships.app.xere.jp/me/');
}else{
	$dsn = 'mysql:host={$SECRET}';
	$db = new PDO($dsn,"{$SECRET}","{$SECRET}");
	$db->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
	$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

	if($_GET['token'] == 'canceled' || empty($_GET['token'])){
		header('Location: https://ships.app.xere.jp/');
	}
	$request_url = 'https://api.pandora.xere.jp/oauth/resorce/'.$_GET['token'] ;

	$context = array(
		'http' => array(
		'method' => 'GET' , // リクエストメソッド
	) ,
	) ;
	$curl = curl_init() ;
curl_setopt( $curl, CURLOPT_URL, $request_url ) ;	// リクエストURL
curl_setopt( $curl, CURLOPT_HEADER, true ) ;	// ヘッダーを取得する
curl_setopt( $curl, CURLOPT_CUSTOMREQUEST, $context['http']['method'] ) ;	// メソッド
curl_setopt( $curl, CURLOPT_SSL_VERIFYPEER, false ) ;	// 証明書の検証を行わない
curl_setopt( $curl, CURLOPT_RETURNTRANSFER, true ) ;	// curl_execの結果を文字列で返す
//curl_setopt( $curl, CURLOPT_HTTPHEADER, $context['http'] ) ;	// ヘッダー
curl_setopt( $curl, CURLOPT_TIMEOUT, 5 ) ;	// タイムアウトの秒数
$res1 = curl_exec( $curl ) ;
$res2 = curl_getinfo( $curl ) ;
curl_close( $curl ) ;
// 取得したデータ
$json = substr( $res1, $res2['header_size'] ) ;	// 取得したデータ(JSONなど)
$array = json_decode( $json , true ) ;
//もしあなたの登録したAppのパーミッションがEmailも取得できるのなら$array["email"]でEmailゲットできます。
// ver_dump($array);

if(isset($array["id"])){
	try{
		$sql = 'SELECT id FROM users WHERE user_id=:prepare';
		$prepare = $db->prepare($sql);
		$prepare->bindValue(':prepare',$array["id"], PDO::PARAM_STR);
		$prepare->execute();
		$result = $prepare->fetchAll(PDO::FETCH_OBJ);
	}catch (PDOException $e) {
		echo $e->getMessage();
	}
	if (empty($result)) {		
		$config = array(
			"digest_alg" => "sha512",
			"private_key_bits" => 4096,
			"private_key_type" => OPENSSL_KEYTYPE_RSA,
		);
		$res=openssl_pkey_new($config);

// Get private key
		openssl_pkey_export($res, $privkey);

// Get public key
		$pubkey=openssl_pkey_get_details($res);
		$pubkey=$pubkey["key"];
		try{
			$sql = 'INSERT INTO users (user_id,private_key,public_key) VALUES (:id,:private,:public)';
			$prepare = $db->prepare($sql);
			$prepare->bindValue(':id',$array["id"], PDO::PARAM_STR);
			$prepare->bindValue(':private',$privkey, PDO::PARAM_STR);
			$prepare->bindValue(':public',$pubkey, PDO::PARAM_STR);
			$prepare->execute();
		}catch(PDOException $e){
			echo $e->getMessage();
		}
	}
	session_regenerate_id(true);
	$_SESSION['auth'] = true;
	$_SESSION['user_id'] = $array["id"];
	$_SESSION['user_email'] = $array["email"];
	header('Location: https://ships.app.xere.jp/me/');
}

}
?>
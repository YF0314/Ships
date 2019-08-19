<?php
//namespace Xere;

require "define.php";
require "route.php";
require "h.php";
/**
 * Router
 *
 * @author    Yukky
 * @copyright 2018~ @Xere_Yukky
 * @license   MIT-LiCENSE
 * 
 *
 * routes[0] = Action
 * routes[1] = Shop Name
 * routes[3] = Shop Access Key
 * routes[4] = Clerk IDm
 */
class RouteCheck
{
  function preg(){
      $dsn = 'mysql:host={$SECRET}';
      $db = new PDO($dsn,"{$SECRET}","{$SECRET}");
      $db->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
      $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
      $URL = $_SERVER['REQUEST_URI'];
      list ($routes,$count) = route($URL);
      if ($routes[0] == "get_user_public") { // get_user_public/exsist_int/
        if (0 < $routes[1] && is_numeric($routes[1])) {
          try{
            $sql = 'SELECT public_key FROM users WHERE user_id=:prepare';
            $prepare = $db->prepare($sql);
            $prepare->bindValue(':prepare',$routes[1], PDO::PARAM_STR);
            $prepare->execute();
            $user_pub = $prepare->fetchColumn();
        }catch (PDOException $e) {
            dead(501);
            exit();
        }
        header('content-type: application/json; charset=utf-8');
        http_response_code(200);
        $arr = array('code' => 200, 'public_key' => $user_pub);
        echo json_encode($arr);
        exit();
    }else{
        dead_json(403);
    }
}elseif ($routes[0] == "get_chains") {
    if (-1 < $routes[1] && is_numeric($routes[1])) {
        try{
            $prepare = $db->prepare("SELECT id FROM body WHERE id = (SELECT max(id) FROM body) FOR UPDATE");
            $prepare->execute();
            $last_id = $prepare->fetchColumn();
        }catch (PDOException $e) {
            // echo $e->getMessage();
            dead(501);
            exit();
        }
        if ($routes[2] == "one") {
            if ($last_id < $routes[1]) {
                goodbye($last_id);
            }else{
                $prepare = $db->prepare('SELECT * FROM body WHERE id = '.$routes[1].'');
                $prepare->execute();
                $obj = $prepare->fetch(PDO::FETCH_ASSOC);
                header('content-type: application/json; charset=utf-8');
                http_response_code(200);
            // var_dump($obj);
                $arr = array('id' => $obj['id'], 'body' => json_decode($obj['body'],true), 'signature' => $obj['signature']);
                $arr2 = array('code' => 200, 'chains' => $arr);
                echo json_encode($arr2,JSON_UNESCAPED_UNICODE|JSON_UNESCAPED_SLASHES);
                exit();
            }
        }else{
            $num = $routes[1] * 20;
            if ($last_id < $num) {
                goodbye($last_id);
            }else{
                try{
                    $sql = 'SELECT * FROM body LIMIT :num,20';
                    $prepare = $db->prepare($sql);
                    $prepare->bindValue(':num',$num, PDO::PARAM_STR);
                    $prepare->execute();
                    $obj = $prepare->fetchAll(PDO::FETCH_OBJ);
                }catch (PDOException $e) {
                // echo $e->getMessage();
                    dead(501);
                    exit();
                }
                        // print_r($obj);
                header('content-type: application/json; charset=utf-8');
                http_response_code(200);
                $arr = array();
                foreach ($obj as &$row) {
                    $array = json_decode($row->body,true);
                    $row = array('id' => $row->id, 'body' => $array, 'signature' => $row->signature);
                }
            // echo json_encode($arr);
            // echo "<br><br><br>";
            // print_r($arr);

                $arr2 = array('code' => 200, 'chains' => $obj);
                echo json_encode($arr2,JSON_UNESCAPED_UNICODE|JSON_UNESCAPED_SLASHES);
                exit();
            // for ($i=0; $i < count($obj); $i++) {
            //     $array = json_decode($obj->body,true);

            // }
            }}
        }else{
            dead_json(403);
        }
    }else{
    // var_dump($routes);
        dead_json(404);
    }
    return true;
}
}
function goodbye($value)
{

    header('content-type: application/json; charset=utf-8');
    http_response_code(402);
    echo json_encode(array('code' => 402, 'description' => 'Data notfound', 'last_data_id' => $value));
    exit();
}


?>
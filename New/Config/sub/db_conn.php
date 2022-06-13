<?php
$localhost = '172.17.0.3';
$user = 'web';
$password = '1qaz@WSX';
$database = 'puffs';

 //進行連線
$db = mysqli_connect($localhost, $user, $password, $database);
if (mysqli_connect_errno()) {
echo "Connect failed: ".mysqli_connect_error();
exit();
}
mysqli_set_charset($db,"utf8");//設定編碼
mysqli_select_db($db,"puffs"); //連線狀態中更換資料庫
//mysqli_close()//斷掉連接
?>
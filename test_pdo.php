<?php
include 'DB.php';
$pdo  = new PDO('mysql:host=localhost;port=3306;dbname=web_two_db','root','root');
$sql = 'select * from users where name = "abc"';
$statemnet = $pdo->query($sql);
var_dump($statemnet);
echo '<hr/>';

//把数据取出来
$r = $statemnet->fetch();
var_dump($r);
// echo $r['password'];

echo '<hr/>';
echo '测试数据库的插入语句','<br/>';
$db = new DB();
$db->connect();
$sql = 'insert into users (name,password,intro) values ("萧十一郎","abc","作家")';
$db->exec($sql);

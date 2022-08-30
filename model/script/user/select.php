<?php
header('Content-Type: application/json');
header('Access-Control-Allow-Origin: *');
include './../../dao/Mysql.php';
include './../../dao/UserDao.php';
$userDao = new UserDao();
$user_rs = $userDao->select();
$array = array();
while ($user_r = mysqli_fetch_assoc($user_rs)) {
    $array[] = $user_r;
}
echo json_encode($array);

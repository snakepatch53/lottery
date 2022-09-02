<?php
include('./model/dao/Mysql.php');
// session_start();
if ($currentPage == "login") {
    if (isset($_SESSION['user_id'])) header('location: ./');
} else {
    if (empty($_SESSION['user_id'])) header('location: ./login');
    if ($_SESSION['user_type'] != 1 and $currentPage == 'users') header('location: ./');
}

<?php
session_start();

require_once('../../utils/utility.php');
require_once('../../database/dbhelper.php');

$user = getUserToken();
if ($user != null) {
	$token = getCookie('token');
	$id = $user['id'];
	$sql = "delete from db_token where token = '$token'";
	execute($sql);
	setcookie('token', '', time() - 100, '/');
}
header('Location: login.php');

session_destroy();

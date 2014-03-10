<?php

function error_message($msg)
{
    return '<div class="alert alert-danger">'.$msg.'</div>';
}

function add_account()
{
	include("mysql.php");
	$id = "NULL";
	$username = $_POST["username"];
	$password = SHA1(strtoupper($username).':'.strtoupper($_POST["password"]));
	$gmlevel = "0"; // 0 equals an ordinary player without any adminrights
	$sessionkey = "";
	$v = "";
	$s = "";
	$email = $_POST["email"];
	$ip = $_SERVER["REMOTE_ADDR"];
	$failed_logins = "0";
	$locked = "0";
	$last_login = "";
	$active_realm_id = "0";
	$expansion = $_POST["expansion"];
	$mutetime = "0";
	$locale = "0";
	$sql = "INSERT INTO `account` (`id`, `username`, `sha_pass_hash`, `gmlevel`, `sessionkey`, `v`, `s`, `email`, `joindate`, `last_ip`, `failed_logins`, `locked`, `last_login`, `active_realm_id`, `expansion`, `mutetime`, `locale`)
			VALUES ('{$id}', '{$username}', '{$password}', '{$gmlevel}', '{$sessionkey}', '{$v}', '{$s}', '{$email}', CURRENT_TIMESTAMP, '{$ip}', '{$failed_logins}', '{$locked}', '{$last_login}', '{$active_realm_id}', '{$expansion}', '{$mutetime}', '{$locale}')";
	
	$connection->query($sql);
}

?>
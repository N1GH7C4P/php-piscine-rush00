<?php

include_once 'database_service.php';
include_once 'account_service.php';

function show_image($image_id)
{
	$url = "img/".$image_id.".png";
	echo('<img src=\''.$url.'\' alt="profilepic" width=90px height=90px></img>');
}

function show_default_profile_image()
{
	$url = "img/default.png";
	echo('<img src=\''.$url.'\' alt="profilepic" width=90px height=90px></img>');
}

function show_user_profile_pic($user)
{
	$id = get_user_profile_pic_id($user);
	if($id)
		show_image($id);
	else
		show_default_profile_image();
}

function get_user_profile_pic_id($login)
{
	$user_id = get_id_by_login($login);
	$connection = connect_to_database();
	$query = "SELECT `images`.`id` AS id FROM `images` WHERE `images`.`is_profile_pic` ='1' AND `uploader_id`='".$user_id."';";
	$res = $connection->query($query);
	if(!$res)
		return -1;
	while ($obj = $res->fetch_object())
		$image_id = $obj->id;
	return($image_id);
}

?>
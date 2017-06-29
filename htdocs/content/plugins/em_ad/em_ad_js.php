<?php
include '../../../init.php';
header('Content-type: application/javascript; charset=utf-8;');

$pos = isset($_GET['pos']) ? intval($_GET['pos']) : 0;
$id = isset($_GET['id']) ? intval($_GET['id']) : 0;

if ( ! function_exists('em_ad_echo_ads'))
	exit('document.write("EM_AD插件没有开启!")');

if ($pos)
	em_ad_echo_ads($pos);
if ($id)
	em_ad_echo_ad($id);
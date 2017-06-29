<?php
!defined('EMLOG_ROOT') && exit('access deined!');
$action = isset($_GET['action']) ? $_GET['action'] : '';
if ($action == 'update') {
	updateLogs();
	exit;
} elseif ($action == 'ajaxshow') {
  header('Content-type: application/x-javascript');
	echo displayLog();
	exit;
}
echo 'access deined!';
?>
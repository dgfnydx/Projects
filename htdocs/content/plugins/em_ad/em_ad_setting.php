<?php defined('EMLOG_ROOT') or die('本页面禁止直接访问!');

function plugin_setting_view() {
	$action = isset($_GET['do']) ? $_GET['do'] : 'home';
	$action_funtion = 'em_ad_setting_'.$action;
	if (function_exists($action_funtion)) {
		include em_ad_template('style_setting');
		include em_ad_template('js_setting');
		call_user_func($action_funtion, MySQL::getInstance());
	}
}
	
function em_ad_setting_home($db) {
	$position = isset($_GET['position']) ? intval($_GET['position']) : '';
	$type = isset($_GET['type']) ? intval($_GET['type']) : '';
	$status = isset($_GET['status']) ? $_GET['status'] : '';
	$where = array();
	if ($position) {
		$where[] = " `position` = {$position} ";
	}
	
	if (is_numeric($status)) {
		$status = intval($status);
		$where[] = " `status` = {$status} ";
	}
	
	$query = $db->query('SELECT * FROM '.DB_PREFIX.'ad '. (!empty($where) ? 'WHERE'.implode(' AND ', $where) : '') .' ORDER BY ID DESC');
	$ads = array();
	while ($ad = $db->fetch_array($query)) {
		$ads[] = $ad;
	}
	include em_ad_template('home');
}

function em_ad_setting_addnew($db) {
	if ($_SERVER['REQUEST_METHOD'] == 'GET') {
		include em_ad_template('addnew');
	} else {
		$ad_data = array();
		$title = htmlspecialchars($_POST['title']);
		$position = intval($_POST['position']);
		$ad_data['content'] = $_POST['content'];
		$weight = intval($_POST['weight']);
		if ($weight < 1) $weight = 1;
		if ($weight > 10) $weight = 10;
		
		if (isset($GLOBALS['em_ad_params'][$position])) {
			foreach ($GLOBALS['em_ad_params'][$position] as $index => $param) {
				if (isset($_POST[$index])) {
					$ad_data[$index] = $_POST[$index];
				}
			}
		}
		
		$ad_data['image'] = '';

		$image = em_ad_upload('ad_image');
		if ($image === FALSE) {
			$error_msg = '图片上传错误. 代码:'.$_FILES['ad_image']['error'];
			include em_ad_template('addnew');
			return;
		} elseif(!empty($image)) {
			$ad_data['image'] = $image;
		}
		$content = mysql_real_escape_string(serialize($ad_data));
		$sql = "
			INSERT INTO ".DB_PREFIX."ad 
			(status,position,title,content,weight) 
			VALUES 
			(".EM_AD_STATUS_ENABLED.",{$position},'{$title}','{$content}',{$weight})
		";
		$db->query($sql);
		em_ad_clean_cache();
		emMsg('广告添加成功', './plugin.php?plugin=em_ad');
	}
}

function em_ad_setting_edit($db) {
	$id = isset($_GET['id']) ? intval($_GET['id']) : 0;
	$sql = 'SELECT * FROM '.DB_PREFIX.'ad WHERE id = '. $id;
	$ad = $db->once_fetch_array($sql);
	if ( ! $ad) {
		emMsg('广告不存在!');
	}	
	$ad_content = unserialize($ad['content']);
	if ($_SERVER['REQUEST_METHOD'] == 'GET') {	
		include em_ad_template('edit');
	} else {
		$ad_data = array();
		$title = htmlspecialchars($_POST['title']);
		$position = intval($_POST['position']);
		$ad_data['content'] = $_POST['content'];
		$weight = intval($_POST['weight']);
		if ($weight < 1) $weight = 1;
		if ($weight > 10) $weight = 10;	
		if (isset($GLOBALS['em_ad_params'][$position])) {
			foreach ($GLOBALS['em_ad_params'][$position] as $index => $param) {
				if (isset($_POST[$index])) {
					$ad_data[$index] = $_POST[$index];
				}
			}
		}
		$image = em_ad_upload('ad_image');
		if ($image === FALSE) {
			$error_msg = '图片上传错误. 代码:'.$_FILES['ad_image']['error'];
			include em_ad_template('addnew');
			return;
		} elseif(!empty($image)) {
			@unlink(EM_AD_IMAGE_FOLDER.'/'.$ad_content['image']);
			$ad_data['image'] = $image;
		} else {
			if (isset($ad_content['image']))
				$ad_data['image'] = $ad_content['image'];
		}
		$content = mysql_real_escape_string(serialize($ad_data));
		$sql = "UPDATE ".DB_PREFIX."ad SET `title` = '{$title}', `position` = {$position}, `content` = '{$content}', weight = {$weight} WHERE id  = ".$id;
		$db->query($sql);
		em_ad_clean_cache();
		emMsg('广告修改成功', './plugin.php?plugin=em_ad');
	}
}

function em_ad_setting_delete($db) {
	$id = isset($_GET['id']) ? intval($_GET['id']) : 0;
	$sql = 'DELETE FROM '.DB_PREFIX.'ad WHERE id = '. $id;
	$db->query($sql);
	header('Location: ./plugin.php?plugin=em_ad');
	die;	
}

function em_ad_setting_setstatus($db) {
	$id = isset($_GET['id']) ? intval($_GET['id']) : 0;
	$sql = 'SELECT * FROM '.DB_PREFIX.'ad WHERE id = '. $id;
	$ad = $db->once_fetch_array($sql);
	if ( ! $ad) {
		emMsg('广告不存在!');
	}
	$sql = 'UPDATE '.DB_PREFIX.'ad SET `status` = '.($ad['status'] == EM_AD_STATUS_ENABLED ? EM_AD_STATUS_DISABLED : EM_AD_STATUS_ENABLED).' WHERE id = '.$ad['id'];
	$db->query($sql);
	em_ad_clean_cache();
	header('Location: ./plugin.php?plugin=em_ad');
	die;
}

function em_ad_setting_getparam($db) {
	$pos = isset($_GET['pos']) ? intval($_GET['pos']) : 0;
	$id = isset($_GET['pos']) ? intval($_GET['id']) : 0;
	ob_end_clean();
	ob_start();
	if ( ! isset($GLOBALS['em_ad_params'][$pos])) {
		exit;
	}
	$ad = NULL;
	if ($id) {
		$sql = 'SELECT * FROM '.DB_PREFIX.'ad WHERE id = '. $id;
		$ad = $db->once_fetch_array($sql);
		if ( ! $ad) {
			emMsg('广告不存在!');
		}
	}
	
	$ad_params = unserialize($ad['content']);
	$params = $GLOBALS['em_ad_params'][$pos];
	foreach ($params as $param_name => $param) {
		echo "<p><b>{$param['name']}</b>({$param['desc']})</p>";
		if (is_string($param['value'])) {
			$value = $param['value'];
			if (isset($ad_params[$param_name])) 
				$value = $ad_params[$param_name];
			echo "<input type=\"text\" name=\"{$param_name}\" value=\"$value\" />";
		} elseif (is_array($param['value'])) {
			foreach ($param['value'] as $data) {
				$checked = '';
				if (isset($ad_params[$param_name]) && $ad_params[$param_name] == $data['value'])
					$checked = 'checked';
				echo "<input type=\"radio\" name=\"{$param_name}\" value=\"{$data['value']}\" {$checked}/>{$data['name']}";
			}
		}
	}
	ob_flush();
	exit;
}

function em_ad_setting_getscript($db) {
	$id = isset($_GET['id']) ? intval($_GET['id']) : 0;
	if (empty ($id))
		exit;
	$sql = 'SELECT * FROM '.DB_PREFIX.'ad WHERE id = '. $id;
	$ad = $db->once_fetch_array($sql);
	if ( ! $ad) {
		emMsg('广告不存在!');
	}
	include em_ad_template('getscript');
}

function em_ad_setting_setting($db) {
	$config_file = EM_AD_CACHE_FOLDER.'/config.php';
	if ($_SERVER['REQUEST_METHOD'] == 'GET') {
		$config = array('enable_cache' => 0);
		if (is_file($config_file)) {
			$config = include $config_file;
		}
		$dir = opendir(EM_AD_CACHE_FOLDER);
		$cache_count = 0;
		while (false !== ($file = readdir($dir))) {   
			if (preg_match('/^'.EM_AD_CACHE_PREFIX.'/', $file))
				$cache_count++;
		} 
		include em_ad_template('setting');
	} else {
		$enable_cache = intval($_POST['enable_cache']);
		$enable_cache = $enable_cache == 1 ? 1 : 0; 
		$clean_cache = isset($_POST['clean_cache']) and $_POST['clean_cache'] == 1 ? true : false;
		$config_data = "<?php defined('EMLOG_ROOT') or die('本页面禁止直接访问!'); return array('enable_cache' => {$enable_cache});";
		file_put_contents($config_file, $config_data);
		
		if ($clean_cache) {
			em_ad_clean_cache();
		}
		emMsg('广告设置保存成功', './plugin.php?plugin=em_ad&do=setting');
	}
}
<?php defined('EMLOG_ROOT') or die('access denied!');

function em_ad_template($file_name) {
	$file_name = preg_replace('/[^A-Z_a-z]/', '', $file_name);
	$file = EM_AD_ROOT."/templates/{$file_name}.php";
	return $file;
}

function em_ad_upload($file) {
	if ( ! isset($_FILES[$file]) or $_FILES[$file]['error'] == UPLOAD_ERR_NO_FILE) {
		 return NULL;
	}
	
	if ($_FILES[$file]['error'] > 0) {
		return FALSE;
	}
	
	$match = array();
	if ( ! preg_match('/\.(jpg|png|gif|swf)$/', $_FILES[$file]['name'], $match) or (preg_match('/image\//', $_FILES[$file]['type']) or $_FILES[$file]['type'] == 'application/x-shockwave-flash') === FALSE) {
		return FALSE;
	}
	
	$new_file_name = getRandStr(12, FALSE).'.'.$match[1];
	
	if ( ! move_uploaded_file($_FILES[$file]['tmp_name'], EM_AD_IMAGE_FOLDER.'/'.$new_file_name)) {
		return FALSE;
	} 
	return $new_file_name;
}

function em_ad_get_ads_by_position($postion) {
	$cache_name = 'pos_'.$postion;
	$ads = em_ad_read_cache($cache_name);
	if ( ! $ads ) {
		$db = MySql::getInstance();
		$query = $db->query("SELECT * FROM ".DB_PREFIX."ad WHERE status = ".EM_AD_STATUS_ENABLED." AND position = ".$postion);
		$ads = array();
		while ($row = $db->fetch_array($query)) {
			$ads[] = $row;
		}
		em_ad_write_cache($cache_name, $ads);
	}
	return $ads;
}

function em_ad_get_ad_output($ads, $position) {
	$ads_count = count($ads);
	$ad = null;
	if ($ads_count == 0) {
		return '';
	} elseif ($ads_count == 1) {
		$ad = $ads[0];
	} elseif ($ads_count > 1 ) {
		$ad_weight = array();
		foreach ($ads as $tmp_ad) {
			$ad_weight[] = array($tmp_ad['weight'], $tmp_ad);
		}
		$ad = em_ad_array_rand_with_weight($ad_weight);
	}
	

	$cache_name = 'js_cache_'.$ad['id'];
	$html = em_ad_read_cache($cache_name);
	if ( ! $html) {
		$ad_content = unserialize($ad['content']);
		ob_start();
		include em_ad_template('ad_content');
		$ad_html .= ob_get_contents();
		ob_end_clean();
		
		$ad_template_name = isset($GLOBALS['em_ad_position_template_name'][$position]) ? $GLOBALS['em_ad_position_template_name'][$position] : 'common';
		if ($ad_template_name) {
			if ($ad_template_name != 'common') {
				extract($ad_content);
				ob_start();
				include em_ad_template('ad_'.$ad_template_name.'_css');
				$ad_style = ob_get_contents();
				ob_end_clean();
				ob_start();
				include em_ad_template('ad_'.$ad_template_name.'_html');
				$ad_html = ob_get_contents();
				ob_end_clean();
			}
			
			ob_start();
			include em_ad_template('ad_'.$ad_template_name);
			$html = ob_get_contents();
			ob_end_clean();
			
			// 去除windows换行
			$html = str_replace("\r\n", "\n", $html);
			// 去除Mac换行
			$html = str_replace("\r", "\n", $html);			
			$html_data = '';
			$html_lines = explode("\n", $html);
			foreach ($html_lines as $line) {
				$html_data .= 'document.writeln("'.  str_replace('"', '\"', $line).'");';
			}
			$html = $html_data;
			unset($html_data);				
		}
		em_ad_write_cache($cache_name, $html);
	}
	return $html;
}

function em_ad_echo_ads($position) {
	$ads = em_ad_get_ads_by_position($position);
	echo em_ad_get_ad_output($ads, $position);
}

function em_ad_echo_ad($id) {
	$db = MySql::getInstance();
	$ad = $db->once_fetch_array("SELECT * FROM ".DB_PREFIX."ad WHERE status = ".EM_AD_STATUS_ENABLED." AND id = ".$id);
	if ( ! $ad)
		return '';
	$cache_name = 'js_cache_single_'.$ad['id'];
	$position = 0;
	$html = em_ad_read_cache($cache_name);
	if ( ! $html) {
		$ad_content = unserialize($ad['content']);
		ob_start();
		include em_ad_template('ad_content');
		$ad_html .= ob_get_contents();
		ob_end_clean();
		ob_start();
		include em_ad_template('ad_common');
		$html = ob_get_contents();
		ob_end_clean();		
		em_ad_write_cache($cache_name, $html);
	}
	echo $html;	
}

function em_ad_read_cache($index) {
	if (EM_AD_ENABLE_CACHE == 0)
		return NULL;
	$index = preg_replace('/[^\w]+/', '', $index);
	$cache_file = EM_AD_CACHE_FOLDER.'/'.EM_AD_CACHE_PREFIX.$index.'.php';
	if ( ! is_file($cache_file))
		return NULL;
	$data = unserialize(str_replace("<?php exit; ?>\n", '', file_get_contents($cache_file)));
	return $data;
}

function em_ad_write_cache($index, $value) {
	if (EM_AD_ENABLE_CACHE == 0)
		return NULL;	
	$index = preg_replace('/[^\w]+/', '', $index);
	$value = serialize($value);
	$cache_content = "<?php exit; ?>\n{$value}";
	file_put_contents(EM_AD_CACHE_FOLDER.'/'.EM_AD_CACHE_PREFIX.$index.'.php', $cache_content);
}

function em_ad_clean_cache() {
	$dir = opendir(EM_AD_CACHE_FOLDER);
	while (false !== ($file = readdir($dir))) {   
		if (preg_match('/^'.EM_AD_CACHE_PREFIX.'/', $file)) {
			unlink(EM_AD_CACHE_FOLDER.'/'.$file);
		}
	}
}

function em_ad_array_rand_with_weight($weight_array) {  
	$weight_sum = 0;  
	$values = array();  
	foreach ($weight_array as $val) {  
		$weight = $val[0];  
		$weight_sum += $weight;  
		$values[] = $weight;  
	}    
	$r = mt_rand(1, $weight_sum);  
	foreach ($values as $pos => $weight) {  
		if  ($r <= $weight){  
			break;  
		}  
		$r -= $weight;  
	}  
	return $weight_array[$pos][1];  
}

function em_ad_echo_script_url($pos) {
	echo '<script type="text/javascript" src="'.EM_AD_BLOG_PATH.'/content/plugins/em_ad/em_ad_js.php?pos='.$pos.'"></script>';
}

function em_ad_get_ad_count() {
	$data = em_ad_read_cache('ad_count');
	if ( ! $data) {
		$data = array();
		$data[EM_AD_POS_HEADER] = em_ad_get_ad_count_by_pos(EM_AD_POS_HEADER);
		$data[EM_AD_POS_SIDEBAR] = em_ad_get_ad_count_by_pos(EM_AD_POS_SIDEBAR);
		$data[EM_AD_POS_FOOTER] = em_ad_get_ad_count_by_pos(EM_AD_POS_FOOTER);
		$data[EM_AD_POS_POSTLIST_TOP] = em_ad_get_ad_count_by_pos(EM_AD_POS_POSTLIST_TOP);
		$data[EM_AD_POS_COUPLET] = em_ad_get_ad_count_by_pos(EM_AD_POS_COUPLET);
		$data[EM_AD_POS_RELATED] = em_ad_get_ad_count_by_pos(EM_AD_POS_RELATED);
		$data[EM_AD_POS_PAGE_BOTTOM_WINDOW] = em_ad_get_ad_count_by_pos(EM_AD_POS_PAGE_BOTTOM_WINDOW);
		$data[EM_AD_POS_PAGE_FLOAT] = em_ad_get_ad_count_by_pos(EM_AD_POS_PAGE_FLOAT);
		$data[EM_AD_POS_SCRIPT] = em_ad_get_ad_count_by_pos(EM_AD_POS_SCRIPT);
		em_ad_write_cache('ad_count', $data);
	}
	return $data;
}

function em_ad_get_ad_count_by_pos($pos) {
	$sql = 'SELECT COUNT(*) AS total FROM '.DB_PREFIX.'ad WHERE status = '.EM_AD_STATUS_ENABLED.' AND position = '.$pos;
	$db = Mysql::getInstance();
	$query = $db->query($sql);
	$data = $db->fetch_array($query);
	return $data['total'];
}
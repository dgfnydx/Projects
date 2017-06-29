<?php
/*
Plugin Name: 历史今日
Version: 1.0
Plugin URL: http://www.te13.com/
Description: 天天聚团购 历史今天 同步世界最大的百度中文文库中心资料
Author: 团团说
Author Email: ttjtg@139.com
Author URL: http://www.te13.com/
*/

!defined('EMLOG_ROOT') && exit('access deined!');

function cache_ttjtg_jin ($Data, $Name) {
	$cachefile = EMLOG_ROOT . '/content/cache/' . $Name . '.php';
	$Data = $Data;
	@ $fp = fopen($cachefile, 'wb') OR emMsg('读取缓存失败。如果您使用的是Unix/Linux主机，请修改缓存目录 (content/cache) 下所有文件的权限为777。如果您使用的是Windows主机，请联系管理员，将该目录下所有文件设为可写');
	@ $fw = fwrite($fp, $Data) OR emMsg('写入缓存失败，缓存目录 (content/cache) 不可写');
	fclose($fp);
}


function ttjtg_jin_footer()
{
echo '
<script type="text/javascript">
var jiathis_config = {data_track_clickback:\'true\'};
</script>
<script type="text/javascript" src="http://v3.jiathis.com/code/jia.js?uid=1535541" charset="utf-8"></script>';
}
addAction('index_footer', 'ttjtg_jin_footer');

?>

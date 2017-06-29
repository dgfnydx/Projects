<?php
// 自定义模块
/**
 * @des 获取最新一条微语
 * @param null
 * @return string 
 */
function newSignletwiter() {
	global $CACHE; 
	$Twiter = $CACHE->readCache('newtw');
	$TwiterStr = '暂无微语';
	if($Twiter[0]['content']) {
		$TwiterStr = trim($Twiter[0]['content']);
	}
	return $TwiterStr ;
}

/**
 * @des 转换unix时间戳为个性化时间显示
 * @param $unixtime unix时间戳
 * @param $isfixtimezone 是否修正时区  boolean
 * @des $isfixtimezone：脑残emlog发文时间会将服务器时间相对于时区进行处理后存储
 * @return string
 */
function timeago($unixtime,$isfixtimezone=false) {
	if(!ctype_digit( (string) $unixtime)) { return $unixtime; }
	if($isfixtimezone) {
		$unixtime     -= (int)Option::get('timezone')*3600;
	}
	$etime = time() - $unixtime;
    if ($etime < 1) return '刚刚';     
    $interval = array (         
        12 * 30 * 24 * 60 * 60  =>  '年前 ('.date('Y-m-d', $unixtime).')',
        30 * 24 * 60 * 60       =>  '个月前 ('.date('m-d', $unixtime).')',
        7 * 24 * 60 * 60        =>  '周前 ('.date('m-d', $unixtime).')',
        24 * 60 * 60            =>  '天前',
        60 * 60                 =>  '小时前',
        60                      =>  '分钟前',
        1                       =>  '秒前'
    );
    foreach ($interval as $secs => $str) {
        $d = $etime / $secs;
        if ($d >= 1) {
            $r = round($d);
            return $r . $str;
        }
    };
}
?>
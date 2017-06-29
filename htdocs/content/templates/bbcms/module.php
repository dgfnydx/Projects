<?php if(!defined('EMLOG_ROOT')) {exit('error!');} if (!function_exists('_g')) {emMsg('<div style="color:#ff0000;line-height:40px;text-align:center;font-size:16px;">欢迎你使用由舍力制作的主题；</div><div style="line-height:25px;font-size:14px;color:#999;">你现在无法正常使用本模板的原因：<br />1、你可能还未安装，请先安装<a href="http://www.emlog.net/plugin/144" target="_blank">模板设置插件</a><br />2、你还未启用模板设置插件，请到后面插件管理中启用模板插件；<br />主题由舍力负责维护，如有疑问请阅读【<a href="http://www.shuyong.net/" target="_blank">模板使用说明</a>】，QQ345952779</div>', BLOG_URL . 'admin/plugins.php');}?>
<?php
//widget：日历
function widget_calendar($title){ ?>
<div class="cbl-one"><div class="title"><p><?php echo $title; ?></p></div>
<div id="calendar"></div><script>sendinfo('<?php echo Calendar::url(); ?>','calendar');</script></div>
<?php }?>
<?php
//widget：标签
function widget_tag($title){global $CACHE;$tag_cache = $CACHE->readCache('tags');?>
<div class="tags"><div class="title"><p><?php echo $title; ?></p></div><?php foreach($tag_cache as $value): ?><li><a href="<?php echo Url::tag($value['tagurl']); ?>" title="<?php echo $value['usenum']; ?> 篇文章"><?php echo $value['tagname']; ?></a></li><?php endforeach; ?></div><?php }?>
<?php
//widget：分类
function widget_sort($title){global $CACHE;$sort_cache = $CACHE->readCache('sort'); ?>
<div class="cbl-two"><div class="title"><p><?php echo $title; ?></p></div><?php foreach($sort_cache as $value):if ($value['pid'] != 0) continue;?><ul><li><a href="<?php echo Url::sort($value['sid']); ?>"><?php echo $value['sortname']; ?>(<?php echo $value['lognum'] ?>)</a></li></ul><?php if (!empty($value['children'])): ?>
<?php $children = $value['children'];foreach ($children as $key):$value = $sort_cache[$key];?><ul><li><a href="<?php echo Url::sort($value['sid']); ?>"><?php echo $value['sortname']; ?>(<?php echo $value['lognum'] ?>)</a></li></ul><?php endforeach; ?><?php endif; ?><?php endforeach; ?></div><?php }?>
<?php
//widget：最新微语
function widget_twitter($title){global $CACHE; $newtws_cache = $CACHE->readCache('newtw');$istwitter = Option::get('istwitter');?>
<div class="cbl-one"><div class="title"><p><?php echo $title; ?></p></div><?php foreach($newtws_cache as $value): ?><li><?php echo $value['t']; ?><p><?php echo smartDate($value['date']); ?></p></li><?php endforeach; ?></div><?php }?>
<?php
//widget：最新评论
function widget_newcomm($title){global $CACHE; $com_cache = $CACHE->readCache('comment');?>
<div class="cbl-one"><div class="title"><p><?php echo $title; ?></p></div><?php foreach($com_cache as $value):$url = Url::comment($value['gid'], $value['page'], $value['cid']);?><li id="comment"><font color="#990000"><?php echo $value['name']; ?>:</font><a href="<?php echo $url; ?>"><?php echo $value['content']; ?></a></li>	<?php endforeach; ?></div><?php }?>
<?php
//widget：最新文章
function widget_newlog($title){global $CACHE; $newLogs_cache = $CACHE->readCache('newlog');?>
<div class="cbl-one"><div class="title"><p><?php echo $title; ?></p></div><?php foreach($newLogs_cache as $value): ?><li><a href="<?php echo Url::log($value['gid']); ?>"><?php echo $value['title']; ?></a></li><?php endforeach; ?></div><?php }?>
<?php
//widget：热门文章
function widget_hotlog($title){$index_hotlognum = Option::get('index_hotlognum');$Log_Model = new Log_Model();$randLogs = $Log_Model->getHotLog($index_hotlognum);?>
<div class="cbl-one"><div class="title"><p><?php echo $title; ?></p></div><?php foreach($randLogs as $value): ?><li><a href="<?php echo Url::log($value['gid']); ?>"><?php echo $value['title']; ?></a></li><?php endforeach; ?></div><?php }?>
<?php
//widget：随机文章
function widget_random_log($title){$index_randlognum = Option::get('index_randlognum');$Log_Model = new Log_Model();$randLogs = $Log_Model->getRandLog($index_randlognum);?>
<div class="cbl-one"><div class="title"><p><?php echo $title; ?></p></div><?php foreach($randLogs as $value): ?><li><a href="<?php echo Url::log($value['gid']); ?>"><?php echo $value['title']; ?></a></li><?php endforeach; ?></div>
<?php }?>
<?php
//widget：归档
function widget_archive($title){global $CACHE; $record_cache = $CACHE->readCache('record');?>
<div class="cbl-two"><div class="title"><p><?php echo $title; ?></p></div><?php foreach($record_cache as $value): ?><ul><li><a href="<?php echo Url::record($value['date']); ?>"><?php echo $value['record']; ?>(<?php echo $value['lognum']; ?>)</a></li></ul><?php endforeach; ?></div><?php } ?>
<?php
//widget：自定义组件
function widget_custom_text($title, $content){ ?>
<li><h3><span><?php echo $title; ?></span></h3><ul id="zdy"><?php echo $content; ?></ul></li><?php } ?>
<?php
//widget：链接
function widget_link($title){global $CACHE; $link_cache = $CACHE->readCache('link');if (!blog_tool_ishome()) return;?>
<li><h3><span><?php echo $title; ?></span></h3><ul id="link"><?php foreach($link_cache as $value): ?><li><div style="background:url(<?php echo $value['url']; ?>/favicon.ico) no-repeat;background-size:16px;float:left;width:16px; height:16px;margin:5px 2px 0 0px;"></div><a href="<?php echo $value['url']; ?>" title="<?php echo $value['des']; ?>" target="_blank"><?php echo $value['link']; ?></a></li><?php endforeach; ?></ul></li><?php }?>
<?php
//widget：链接
function home_links(){global $CACHE; $link_cache = $CACHE->readCache('link');if (!blog_tool_ishome()) return;?>
<div class="home-links"><div class="title"><p>友链链接</p><span>网站运行<?php echo floor((time()-strtotime(_g('opentime')))/86400); ?>天</span></div><?php foreach($link_cache as $value): ?><li><div style="background:url(<?php echo $value['url']; ?>/favicon.ico) no-repeat;background-size:16px;float:left;width:16px; height:16px;margin:5px 2px 0 0px;"></div><a href="<?php echo $value['url']; ?>" title="<?php echo $value['des']; ?>" target="_blank"><?php echo $value['link']; ?></a></li><?php endforeach; ?></div><?php }?>

<?php //内页链接
function ny_links(){$db = MySql::getInstance();$sql = "SELECT * FROM " . DB_PREFIX . "link WHERE hide='y' ORDER BY taxis ASC";$result = $db->query($sql);?>
<div class="cbl-two"><div class="title"><p>友链链接(内页)</p></div>
<?php while($row = $db->fetch_array($result)){ ?><ul><li><a href="<?php echo $row['siteurl']; ?>" title="<?php echo $row['description']; ?>"><div style="background:url(<?php echo $row['siteurl']; ?>/favicon.ico) no-repeat;background-size:16px;float:left;width:16px;height:16px;margin:5px 2px 0 0px;"></div><?php echo $row['sitename']; ?></a></li></ul>
<?php }?></div><?php }?>
<?php
//blog：导航
function blog_navi(){global $CACHE; $navi_cache = $CACHE->readCache('navi');?>
<ul class="bar"><?php foreach($navi_cache as $value):if ($value['pid'] != 0) {continue;}if($value['url'] == ROLE_ADMIN && (ROLE == ROLE_ADMIN || ROLE == ROLE_WRITER)):	?><?php continue;endif;$newtab = $value['newtab'] == 'y' ? 'target="_blank"' : '';$value['url'] = $value['isdefault'] == 'y' ? BLOG_URL . $value['url'] : trim($value['url'], '/');$current_tab = BLOG_URL . trim(Dispatcher::setPath(), '/') == $value['url'] ? 'current' : 'common';?><li class="item <?php echo $current_tab;?>"><a href="<?php echo $value['url']; ?>" <?php echo $newtab;?>><?php echo $value['naviname']; ?></a><?php if (!empty($value['children'])) :?><ul class="sub-nav"><?php foreach ($value['children'] as $row){echo '<li><a href="'.Url::sort($row['sid']).'">'.$row['sortname'].'</a></li>';}?></ul><?php endif;?><?php if (!empty($value['childnavi'])) :?><ul class="sub-nav"><?php foreach ($value['childnavi'] as $row){$newtab = $row['newtab'] == 'y' ? 'target="_blank"' : '';echo '<li><a href="' . $row['url'] . "\" $newtab >" . $row['naviname'].'</a></li>';}?></ul><?php endif;?></li><?php endforeach; ?><?php if (in_array('sbkk', _g('on-off'))):?><li class="item"><a href="<?php sbkk_logs();?>">随便看看</a></li><?php else: endif; ?></ul><?php }?><?php if(!defined('EMLOG_ROOT')) {exit('error!');} ?>
<?php
//blog：置顶
function topflg($top, $sortop='n', $sortid=null){if(blog_tool_ishome()) {echo $top == 'y' ? "<span class='zhiding'>置顶</span>" : '';} elseif($sortid){echo $sortop == 'y' ? "<span class='zhiding'>置顶</span><i class='zhiding1'></i>" : '';}}?>
<?php
//blog：分类
function blog_sort($blogid){global $CACHE; $log_cache_sort = $CACHE->readCache('logsort');?><?php if(!empty($log_cache_sort[$blogid])): ?><a href="<?php echo Url::sort($log_cache_sort[$blogid]['id']);?>" title="<?php echo $log_cache_sort[$blogid]['name']; ?>"><?php echo $log_cache_sort[$blogid]['name']; ?></a><?php endif;?><?php }?>
<?php
//blog：文章标签
function blog_tag($blogid){global $CACHE;$log_cache_tags = $CACHE->readCache('logtags');if (!empty($log_cache_tags[$blogid])){$tag = '关键词:';foreach ($log_cache_tags[$blogid] as $value){$tag .= "    <a href=\"".Url::tag($value['tagurl'])."\">".$value['tagname'].'</a>';}echo $tag;}}?>
<?php
//blog：文章作者
function blog_author($uid){global $CACHE;$user_cache = $CACHE->readCache('user');$author = $user_cache[$uid]['name'];$mail = $user_cache[$uid]['mail'];$des = $user_cache[$uid]['des'];$title = !empty($mail) || !empty($des) ? "title=\"$des $mail\"" : '';echo $author;}?>
<?php
//blog：相邻文章
function neighbor_log($neighborLog){extract($neighborLog);?>
<?php if($prevLog):?><li>上一篇：<a href="<?php echo Url::log($prevLog['gid']) ?>"><?php echo $prevLog['title'];?></a></li><?php endif;?>
<?php if($nextLog):?><li1>下一篇：<a href="<?php echo Url::log($nextLog['gid']) ?>"><?php echo $nextLog['title'];?></a></li1><?php endif;?>
<?php }?>
<?php //判断是否是首页
function blog_tool_ishome(){if (BLOG_URL . trim(Dispatcher::setPath(), '/') == BLOG_URL){  return true; } else { return FALSE;}}?>
<?php
//blog：评论列表 链接已经加入nofollow标签
function blog_comments($comments){extract($comments);if($commentStacks): ?>
<?php endif; ?>
<?php $isGravatar = Option::get('isgravatar');foreach($commentStacks as $cid):$comment = $comments[$cid];$comment['poster'] = $comment['url'] ? '<a href="'.TEMPLATE_URL.'go/?url='.$comment['url'].'" target="_blank"><div style="background:url('.$comment['url'].'/favicon.ico) no-repeat;background-size:16px; background-position: 50% center;float:left;width:16px;height:16px;margin:5px 2px 0 0px;"></div>'.$comment['poster'].'</a>' :$comment['poster'];?>
<div class="comment" id="comment-<?php echo $comment['cid']; ?>"><a name="<?php echo $comment['cid']; ?>"></a>
<?php if($isGravatar == 'y'): ?><div class="avatar"><img src="<?php echo myGravatar($comment['mail']); ?>" /></div><?php endif; ?>
<div class="comment-info"><b><?php echo $comment['poster']; ?> </b><?php if (in_array('log-ip', _g('on-off'))):?>(<?php echo convertip($comment['ip']); ?>)<?php else: endif; ?> [<a href="#comment-<?php echo $comment['cid']; ?>" onclick="commentReply(<?php echo $comment['cid']; ?>,this)" >回复该留言</a>]<br /><span class="comment-time"><?php echo $comment['date']; ?></span></div>
<div class="comment-content"><?php echo $comment['content']; ?></div>
<?php blog_comments_children($comments, $comment['children']); ?>
</div>
<?php endforeach; ?>
<div class="pagenavi"><?php echo $commentPageUrl;?></div>
<?php }?>
<?php
//blog：子评论列表 链接已经加入nofollow标签
function blog_comments_children($comments, $children){$isGravatar = Option::get('isgravatar');foreach($children as $child):$comment = $comments[$child];$comment['poster'] = $comment['url'] ? '<a href="'.TEMPLATE_URL.'go/?url='.$comment['url'].'" target="_blank" ><div style="background:url('.$comment['url'].'/favicon.ico) no-repeat;background-size:16px; background-position: 50% center;float:left;width:16px;height:16px;margin:5px 2px 0 0px;"></div>'.$comment['poster'].'</a>' : $comment['poster'];?>
<div class="comment comment-children" id="comment-<?php echo $comment['cid']; ?>"><a name="<?php echo $comment['cid']; ?>"></a>
<div class="zipl"><?php if($isGravatar == 'y'): ?><div class="avatar"><img src="<?php echo myGravatar($comment['mail']); ?>" /></div><?php endif; ?><b><?php echo $comment['poster']; ?></b> [<a href="#comment-<?php echo $comment['cid']; ?>" onclick="commentReply(<?php echo $comment['cid']; ?>,this)">回复该留言</a>]<br /><?php echo $comment['date']; ?>
<div class="comment-content"><?php echo $comment['content']; ?></div>
</div>
<?php blog_comments_children($comments, $comment['children']);?>
</div>
<?php endforeach; ?>
<script src="<?php echo BLOG_URL; ?>/include/lib/js/common_tpl.js" type="text/javascript"></script>
<script type="text/javascript">var loaded = false, blog_url = "<?php echo TEMPLATE_URL; ?>";$(function(){$("textarea[name=comment]").bind('focus click',function() {if (!loaded) {$.getScript(blog_url + "sy/face.js");loaded = true;}});});</script>
<?php }?>
<?php
//blog：发表评论表单
function blog_comments_post($logid,$ckname,$ckmail,$ckurl,$verifyCode,$allow_remark){
if($allow_remark == 'y'): ?>
<div id="comment-place">
<div class="comment-post" id="comment-post">
<div class="cancel-reply" id="cancel-reply" style="display:none"><a href="javascript:void(0);" onclick="cancelReply()">取消回复</a></div>
<p class="comment-header"><b>发表评论：</b><a name="respond"></a></p>
<form method="post" name="commentform" action="<?php echo BLOG_URL; ?>index.php?action=addcom" id="commentform">
<input type="hidden" name="gid" value="<?php echo $logid; ?>" />
<?php if(ROLE == ROLE_VISITOR): ?>
<p><input type="text" name="comname" maxlength="49" value="<?php echo $ckname; ?>" size="22" tabindex="1"><label for="author"><small>昵称</small></label></p>
<p><input type="text" name="commail"  maxlength="128"  value="<?php echo $ckmail; ?>" size="22" tabindex="2"><label for="email"><small>邮件地址 (必填)</small></label></p>
<p><input type="text" name="comurl" maxlength="128"  value="<?php echo $ckurl; ?>" size="22" tabindex="3"><label for="url"><small>个人主页 (选填)</small></label></p>
<?php endif; ?>
<p><textarea name="comment" id="comment" rows="10" tabindex="4"></textarea></p>
<p><?php echo $verifyCode; ?> <input type="submit" id="comment_submit" value="发表评论" tabindex="6" /></p>
<input type="hidden" name="pid" id="comment-pid" value="0" size="22" tabindex="1"/>
</form></div></div><?php endif; ?>
<?php }?>
<?php
//blog-tool:获取Gravatar头像
function myGravatar($email, $s = 40, $d = 'mm', $g = 'g') {
$hash = md5($email);
$avatar = "http://cn.gravatar.com/avatar/$hash?s=$s&d=$d&r=$g";
return $avatar;
}?>
<?php //调用页面内容
function html_page($id,$echo){$homez = mysql_fetch_array(mysql_query("SELECT * FROM ".DB_PREFIX."blog WHERE gid ='$id'"));return $homez[$echo];}
?>
<?php
//文章详情页下相关文章
function xg1_logs($logData = array()){
if (is_file($configfile)) {require $configfile;}else{
$related_log_type = 'sort';//相关日志类型，sort为分类，tag为标签；
$related_log_sort = 'views_desc';//排列方式，views_desc 为点击数（降序）comnum_desc 为评论数（降序） rand 为随机 views_asc 为点击数（升序）comnum_asc 为评论数（升序）
$related_log_num = '10'; //显示文章数
$related_inrss = 'y'; //是否显示在rss订阅中，y为是，其它值为否
}global $value;$DB = MySql::getInstance();$CACHE = Cache::getInstance();extract($logData);if($value)
{$logid = $value['id'];$sortid = $value['sortid'];global $abstract;}
$sql = "SELECT gid,title FROM ".DB_PREFIX."blog WHERE hide='n' AND type='blog'";
if($related_log_type == 'tag'){$log_cache_tags = $CACHE->readCache('logtags');$Tag_Model = new Tag_Model();$related_log_id_str = '0';foreach($log_cache_tags[$logid] as $key => $val){$related_log_id_str .= ','.$Tag_Model->getTagByName($val['tagname']);}
$sql .= " AND gid!=$logid AND gid IN ($related_log_id_str)";}else{
$sql .= " AND gid!=$logid AND sortid=$sortid";}
switch ($related_log_sort){case 'views_desc':{
$sql .= " ORDER BY views DESC";break;}case 'views_asc':{
$sql .= " ORDER BY views ASC";break;}case 'comnum_desc':{
$sql .= " ORDER BY comnum DESC";break;}case 'comnum_asc':{
$sql .= " ORDER BY comnum ASC";break;}case 'rand':{
$sql .= " ORDER BY rand()";break;}}
$sql .= " LIMIT 0,10";
$related_logs = array();$query = $DB->query($sql);while($row = $DB->fetch_array($query))
{$row['gid'] = intval($row['gid']);$row['title'] = htmlspecialchars($row['title']);$related_logs[] = $row;}
$out = '';if(!empty($related_logs)){foreach($related_logs as $val){
$out .= "<li><a href=\"".Url::log($val['gid'])."\" title=\"{$val['title']}\">{$val['title']}</a></li>";
}}if(!empty($value['content'])){if($related_inrss == 'y'){$abstract .= $out;}}else{echo $out;}}
?>
<?php
// shuyong.net：同分类相邻文章
function nextLogs($logid, $sortid, $flag, $pattern=0){
$Log_Model = new Log_Model();if($flag == 'prev'){$sql = " AND gid < $logid ORDER BY gid DESC";$word = '上一篇';}
else{$sql = " AND gid > $logid ORDER BY gid ASC";$word = '下一篇';}
$log = $Log_Model -> getLogsForHome(" AND sortid = $sortid "."$sql", 1, 1);
if($log){foreach($log as $value):?>
<?php echo $word;?>：<a href="<?php echo $value['log_url'];?>" title="<?php echo $value['log_title'];?>"><?php echo $value['log_title'];?></a>
<?php endforeach;}else{echo $word.'：没有了';	}
}?>
<?php //随便看看
function sbkk_logs() {
$db = MySql::getInstance();
$sql = "SELECT gid FROM ".DB_PREFIX."blog WHERE type='blog' and hide='n' ORDER BY rand() LIMIT 0,1";
$sbkk_logs_list = $db->query($sql);
while($row = $db->fetch_array($sbkk_logs_list)){echo Url::log($row['gid']);}}
?>
<?php
//内容页分页
function log_fy($aid,$aP,$aCount) {
$log_fy .= '<div id="log_fy">';
for ($p=0;$p<$aCount;$p++) {
if ($p == 0 && $aP == 0) $log_fy .= '<span title="当前第1页">1</span>';
else if ($p == 0) $log_fy .= '<a href="'.BLOG_URL.'?post='.$aid.'" title="转到第1页">1</a>';
else if ($p == $aP) $log_fy .= '<span title="当前第'.($p+1).'页">'.($p+1).'</span>';
else $log_fy .= '<a href="'.BLOG_URL.'?post='.$aid.'&p='.$p.'" title="转到第'.($p+1).'页" rel="nofollow" >'.($p+1).'</a>';
}
$log_fy .= '</div>';
return $log_fy;}
?>
<?php
function links($title){global $CACHE; $link_cache = $CACHE->readCache('link');?>
<div id="em-links1"><div id="em-title"><span>本站友链</span></div>
<?php foreach($link_cache as $value): ?><a href="<?php echo $value['url']; ?>" title="<?php echo $value['des']; ?>" target="_blank"><div style="background:url(<?php echo $value['url']; ?>/favicon.ico) no-repeat;background-size:16px;float:left;width:16px; height:16px;margin:7px 2px 0 0px;"></div><?php echo $value['link']; ?></a><?php endforeach; ?>
</div>
<?php }?>
<?php
function page_like(){$db = MySql::getInstance();$sql = "SELECT * FROM " . DB_PREFIX . "link WHERE hide='y' ORDER BY taxis ASC";$result = $db->query($sql);while($row = $db->fetch_array($result)){ ?>
<a href="<?php echo $row['siteurl']; ?>" title="<?php echo $row['description']; ?>"><div style="background:url(<?php echo $row['siteurl']; ?>/favicon.ico) no-repeat;background-size:16px; background-position: 50% center;float:left;width:16px;height:16px;margin:7px 2px 0 0px;"></div><?php echo $row['sitename']; ?></a>
<?php } }?>
<?php //分页标题后面加 - 第几页
function page_tit($page){if ($page>=2){ echo ' - 第'.$page.'页'; }}?>
<?php
//blog-tool:格式化内容工具，去除html标签
function blog_tool_purecontent($content, $strlen = null){$content = strip_tags($content);if ($strlen) {$content = subString($content, 0, $strlen);}return $content;}
?>
<?php
//文章详情页下相关文章
function xg_logs($logData = array()){
if (is_file($configfile)) {require $configfile;}else{
$related_log_type = 'sort';//相关日志类型，sort为分类，tag为标签；
$related_log_sort = 'views_desc';//排列方式，views_desc 为点击数（降序）comnum_desc 为评论数（降序） rand 为随机 views_asc 为点击数（升序）comnum_asc 为评论数（升序）
$related_log_num = '10'; //显示文章数
$related_inrss = 'y'; //是否显示在rss订阅中，y为是，其它值为否
}global $value;$DB = MySql::getInstance();$CACHE = Cache::getInstance();extract($logData);if($value)
{$logid = $value['id'];$sortid = $value['sortid'];global $abstract;}
$sql = "SELECT gid,title FROM ".DB_PREFIX."blog WHERE hide='n' AND type='blog'";
if($related_log_type == 'tag'){$log_cache_tags = $CACHE->readCache('logtags');$Tag_Model = new Tag_Model();$related_log_id_str = '0';foreach($log_cache_tags[$logid] as $key => $val){$related_log_id_str .= ','.$Tag_Model->getTagByName($val['tagname']);}
$sql .= " AND gid!=$logid AND gid IN ($related_log_id_str)";}else{
$sql .= " AND gid!=$logid AND sortid=$sortid";}
switch ($related_log_sort){case 'views_desc':{
$sql .= " ORDER BY views DESC";break;}case 'views_asc':{
$sql .= " ORDER BY views ASC";break;}case 'comnum_desc':{
$sql .= " ORDER BY comnum DESC";break;}case 'comnum_asc':{
$sql .= " ORDER BY comnum ASC";break;}case 'rand':{
$sql .= " ORDER BY rand()";break;}}
$sql .= " LIMIT 0,10";
$related_logs = array();$query = $DB->query($sql);while($row = $DB->fetch_array($query))
{$row['gid'] = intval($row['gid']);$row['title'] = htmlspecialchars($row['title']);$related_logs[] = $row;}
$out = '';if(!empty($related_logs)){foreach($related_logs as $val){
$out .= "<ul><li><a href=\"".Url::log($val['gid'])."\" title=\"{$val['title']}\">{$val['title']}</a></li></ul>";
}}if(!empty($value['content'])){if($related_inrss == 'y'){$abstract .= $out;}}else{echo $out;}}
?>
<?php
//获取文章缩略图，先是自定义指定，然后是查找附件图片，最后是随机图片
function sheli_fjimg($logid){
$db = MySql::getInstance();
$thum_pic = EMLOG_ROOT.'/thumpic/'.$logid.'.jpg';
if (is_file($thum_pic)) {
$thum_url = BLOG_URL.'thumpic/'.$logid.'.jpg'; 
}else{
$sqlimg = "SELECT * FROM ".DB_PREFIX."attachment WHERE blogid=".$logid." AND (`filepath` LIKE '%jpg' OR `filepath` LIKE '%gif' OR `filepath` LIKE '%png') ORDER BY `aid` ASC LIMIT 0,1";
//die($sql);
$img = $db->query($sqlimg);
while($roww = $db->fetch_array($img)){
$thum_url=BLOG_URL.substr($roww['filepath'],3,strlen($roww['filepath']));
}if (empty($thum_url)) {
srand((double)microtime()*1000000); 
$randval   =   rand(0,9); 
$thum_url = BLOG_URL.'content/templates/sheli-lanse/images/shuyong_net_wzimg/'.$randval.'.jpg';}
}echo $thum_url;}
?>
<?php
//获取文章中第一张图片，如果没有就调用随机图片
function sheli_zwimg($str){
preg_match_all("/\<img.*?src\=\"(.*?)\"[^>]*>/i", $str, $match);
if(!empty($match[1])){echo $match[1][0];}else{
echo TEMPLATE_URL . 'images/shuyong_net_wzimg/'.rand(0,10).'.jpg';//随机图片路径
}}
?>
<?php //幻灯片(调用分类置顶)
function home_slideshow(){ $db = MySql::getInstance(); $sql = $db->query ("SELECT * FROM ".DB_PREFIX."blog inner join ".DB_PREFIX."sort WHERE hide='n' AND type='blog' AND sortop='y' AND sortid=sid order by date DESC limit 0,5"); while($row = $db->fetch_array($sql)){ if (!empty($row['excerpt'])){ 
preg_match_all("/\<img.*?src\=\"(.*?)\"[^>]*>/i", $row['excerpt'], $match); if(empty($match[0][0])) { preg_match_all("/\<img.*?src\=\"(.*?)\"[^>]*>/i", $row['content'], $match); } }else{ preg_match_all("/\<img.*?src\=\"(.*?)\"[^>]*>/i", $row['content'], $match); } $logpost = !empty($row['excerpt']) ? $row['excerpt'] : ''.$row['content'].''; $num = rand(1,3); $img = isset($match[1][0]) ? $match[1][0] : ''.TEMPLATE_URL.'images/shuyong_net_hdp/'.$num.'.jpg'; $date = gmdate('Y年m月d日', $row['date']); $content = strip_tags($logpost,''); $content = mb_substr($content,0,300,'utf-8');$comment = ($row['comnum'] != 0) ? '被吐槽<span>'.$row['comnum'].'</span>次' : '暂无吐槽'; $gid = $row['gid']; $tag = $db -> query("SELECT * FROM ".DB_PREFIX."tag WHERE gid LIKE '%,$gid,%'"); $out .='<li><a href="'.Url::log($row['gid']).'" title="'.$row['title'].'"><img src="'.$img.'" height="300"/></a><div id="hdp-wz">'.$row['title'].'</div></li>'; } echo $out; }?>
<?php function sl(){?><?php if (in_array('top', _g('on-off'))):?><div id="shangxia"><div id="shang" title="↑ 返回顶部"></div><a href="<?php echo _g('comt'); ?>" id="comt" title="给我留言"></a><div id="xia" title="↓ 移至底部"></div></div><?php else:endif; ?><?php }?>

<?php //cms 置顶文章
function zdlog(){ require('sheli.php'); $db = MySql::getInstance(); $sql = $db->query ("SELECT * FROM ".DB_PREFIX."blog inner join ".DB_PREFIX."sort WHERE hide='n' AND type='blog' AND top='y' AND sortid=sid order by date DESC limit 0,$newlog_mun"); while($row = $db->fetch_array($sql)){ $logpost = !empty($row['excerpt']) ? $row['excerpt'] : ''.$row['content'].''; if (!empty($row['excerpt'])){preg_match_all("/\<img.*?src\=\"(.*?)\"[^>]*>/i", $row['excerpt'], $match); if(empty($match[0][0])) {preg_match_all("/\<img.*?src\=\"(.*?)\"[^>]*>/i", $row['content'], $match); } }else{preg_match_all("/\<img.*?src\=\"(.*?)\"[^>]*>/i", $row['content'], $match); } $img = isset($match[0][0]) ? $match[0][0] : ''.$img_ad.'';
$date = gmdate('Y年m月d日', $row['date']); $content = strip_tags($logpost,''); $content = mb_substr($content,0,200,'utf-8'); $comment = ($row['comnum'] != 0) ? ''.$row['comnum'].'' : '0'; $gid = $row['gid']; $tag = $db -> query("SELECT * FROM ".DB_PREFIX."tag WHERE gid LIKE '%,$gid,%'"); $out .='<div class="home-log"><ul><div class="home-log-list"  onmouseout=this.className="home-log-list" onmouseover=this.className="home-log-list1">
<div class="home-log-list-tt"><a href="'.Url::log($row['gid']).'" title="'.$row['title'].'"  >'.$row['title'].'</a></div>
<div class="home-log-list-nr"><p>'.$img.'</p><span>'.$content.'...</span></div>      		
<div class="home-log-list-bq"><span id="shijian">'.$date.'</span> &nbsp; <span id="fenlei"><a href="'.Url::sort($row['sortid']).'" title="查看 '.$row['sortname'].' 中的全部文章">'.$row['sortname'].'</a></span> &nbsp; <span id="liulan">浏览('.$row['views'].')</span> &nbsp; <span id="pinglun">评论('.$comment.')</span><span id="qw"><a>置顶文章</a></span></div></div></ul></di'; } echo $out; }?>
<?php //cms 最新文章
function newlog(){ require('sheli.php'); $db = MySql::getInstance(); $sql = $db->query ("SELECT * FROM ".DB_PREFIX."blog inner join ".DB_PREFIX."sort WHERE hide='n' AND type='blog' AND top='n' AND sortid=sid order by date DESC limit 0,$newlog_mun"); while($row = $db->fetch_array($sql)){ $logpost = !empty($row['excerpt']) ? $row['excerpt'] : ''.$row['content'].''; if (!empty($row['excerpt'])){preg_match_all("/\<img.*?src\=\"(.*?)\"[^>]*>/i", $row['excerpt'], $match); if(empty($match[1][0])) {
preg_match_all("/\<img.*?src\=\"(.*?)\"[^>]*>/i", $row['content'], $match); } }else{preg_match_all("/\<img.*?src\=\"(.*?)\"[^>]*>/i", $row['content'], $match); } ; $img = isset($match[0][0]) ? $match[0][0] : ''.$img_ad.''; $date = gmdate('Y年m月d日', $row['date']); $content = strip_tags($logpost,''); $content = mb_substr($content,0,200,'utf-8'); $comment = ($row['comnum'] != 0) ? ''.$row['comnum'].'' : '0'; $gid = $row['gid']; $tag = $db -> query("SELECT * FROM ".DB_PREFIX."tag WHERE gid LIKE '%,$gid,%'"); $out .='<div class="home-log"><ul><div class="home-log-list"  onmouseout=this.className="home-log-list" onmouseover=this.className="home-log-list1">
<div class="home-log-list-tt"><a href="'.Url::log($row['gid']).'" title="'.$row['title'].'"  >'.$row['title'].'</a></div>
<div class="home-log-list-nr"><p>'.$img.'</p><span>'.$content.'...</span></div>       		
<div class="home-log-list-bq">时间:'.$date.' &nbsp; <span id="fenlei"><a href="'.Url::sort($row['sortid']).'" title="查看 '.$row['sortname'].' 中的全部文章">'.$row['sortname'].'</a></span> &nbsp; <span id="liulan">浏览('.$row['views'].')</span> &nbsp; <span id="pinglun">评论('.$comment.')</span>
<span id="qw"><a>最新文章</a></span></div></div></ul></div>'; } echo $out; }?>
<?php //cms 首页分类文章
function sortlogs(){ $db = MySql::getInstance(); global $CACHE; $sort_cache = $CACHE->readCache('sort'); foreach(_g('sortlog_id') as $key => $i){ $key = $key+1;
$out .= '<div class="sort-log">';
$out .= '<div class="sortlog" onmouseout=this.className="sortlog" onmouseover=this.className="sortlog1">';
$out .= '<div class="title"><p>'.$sort_cache[$i]['sortname'].'</p><span><a href="'.Url::sort($i).'" title="'.$sort_cache[$i]['sortname'].'">更多...</a></span></div>';
$sql = $db->query ("SELECT * FROM ".DB_PREFIX."blog WHERE sortid='$i' AND type='blog' AND hide='n' order by date DESC limit 0,0");
$row = $db->fetch_array($sql); if (!empty($row['excerpt'])){preg_match_all("/\<img.*?src\=\"(.*?)\"[^>]*>/i", $row['excerpt'], $match); if(empty($match[0][0])) {preg_match_all("/\<img.*?src\=\"(.*?)\"[^>]*>/i", $row['content'], $match); } }else{ preg_match_all("/\<img.*?src\=\"(.*?)\"[^>]*>/i", $row['content'], $match); } $logpost = !empty($row['excerpt']) ? $row['excerpt'] : ''.$row['content'].''; $num = rand(1,5); $img = isset($match[0][0]) ? $match[0][0] : '<img src="'.TEMPLATE_URL.'images/shuyong_net_wzimg/'.$num.'.jpg">'; 
$content = strip_tags($logpost,''); $content = mb_substr($content,0,60,'utf-8'); 
 require('sheli.php'); $sortlog_mun = $sortlog_mun -1; $logs = $db->query ("SELECT * FROM ".DB_PREFIX."blog WHERE sortid='$i' AND type='blog' AND hide='n' order by date DESC limit 0,{$sortlog_mun}"); while ($trow = $db->fetch_array($logs)){ $date = gmdate('m-d', $trow['date']); $trow['title'] = mb_substr($trow['title'],0,40,'utf-8'); 
$out .='<li><p><a href="'.Url::log($trow['gid']).'" title="'.$trow['title'].'">'.$trow['title'].'</a></p><span>'.$date.'</span></li>'
; } $out .='</div></div>'; } echo $out; }?>
<?php 
//blog：自定义分页函数 
function my_page($count, $perlogs, $page, $url, $anchor = '') { 
 $pnums = @ceil($count / $perlogs); 
 $re = ''; 
 $urlHome = preg_replace("|[?&/][^./?&=]*page[=/-]|", "", $url); 
 if($page > 1) { 
  $i = $page - 1; 
  $re = ' <a href="'.$url.$i.'" class="prev"></a> ' . $re; 
 } 
 if($page < $pnums) { 
  $i = $page + 1; 
  $re .= ' <a href="'.$url.$i.'" class="next"></a> '; 
 } 
 return $re; 
} 
?>
<?php
//shuyong.net：同分类相邻文章
function nextLog($logid, $sortid, $flag, $pattern=0){
$Log_Model = new Log_Model();if($flag == 'prev'){$sql = " AND gid < $logid ORDER BY gid DESC";$word = 'class="next"';}
else{$sql = " AND gid > $logid ORDER BY gid ASC";$word = 'class="prev"';}
$log = $Log_Model -> getLogsForHome(" AND sortid = $sortid "."$sql", 1, 1);
if($log){foreach($log as $value):?>
<a <?php echo $word;?> href="<?php echo $value['log_url'];?>" title="<?php echo $value['log_title'];?>"></a>
<?php endforeach;}
}?>
<?php
//30天按点击率排行文章
function sheli_hotlog($log_num) {
$db = MySql::getInstance();
$time = time();
$sql = "SELECT gid,title FROM ".DB_PREFIX."blog WHERE type='blog' AND date > $time - 30*24*60*60 ORDER BY `views` DESC LIMIT 0,$log_num";
$list = $db->query($sql);
while($row = $db->fetch_array($list)){ ?>
<li><a href="<?php echo Url::log($row['gid']); ?>" title="<?php echo $row['title']; ?>"><?php echo $row['title']; ?></a></li>
<?php } ?><?php } ?>
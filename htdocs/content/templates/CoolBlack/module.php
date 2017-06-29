<?php 
/*
 * @模板控制器方法集合
 * @authors DGF
 * @date    2017-5-1
 */
if(!defined('EMLOG_ROOT')) {exit('error!');} 
// require_once()语句在脚本执行期间包含并运行指定文件(通俗一点，括号内的文件会执行一遍)。此行为和require()语句类似，唯一区别是如果该文件中的代码已经被包含了，则不会再次包含。
require_once('custom.php');
?>
<?php
//blog：导航
function blog_navi(){global $CACHE;$navi_cache = $CACHE->readCache('navi');?>
<?php foreach($navi_cache as $value):if ($value['pid'] != 0) {continue;}
if($value['url'] == ROLE_ADMIN && (ROLE == ROLE_ADMIN || ROLE == ROLE_WRITER)):?>
<li><a href="<?php echo BLOG_URL; ?>admin/">管理站点</a></li>
<li><a href="<?php echo BLOG_URL; ?>admin/?action=logout">退出</a></li>
<?php continue;endif;
$newtab = $value['newtab'] == 'y' ? 'target="_blank"' : '';
$value['url'] = $value['isdefault'] == 'y' ? BLOG_URL . $value['url'] : trim($value['url'], '/');
$current_tab = BLOG_URL . trim(Dispatcher::setPath(), '/') == $value['url'] ? 'cli' : '';  //判断当前页改变类?>
<li><a class="<?php echo $current_tab;?>" href="<?php echo $value['url']; ?>" <?php echo $newtab;?>><?php echo $value['naviname']; ?></a>
<?php if (!empty($value['children'])) : //非新窗户打开?>
<ul>
<?php foreach ($value['children'] as $row){
	echo '<li><a href="'.Url::sort($row['sid']).'">'.$row['sortname'].'</a></li>';}?>
</ul>
<?php endif;?>
<?php if (!empty($value['childnavi'])) : //新窗口打开?> 
<ul>
<?php foreach ($value['childnavi'] as $row){
	$newtab = $row['newtab'] == 'y' ? 'target="_blank"' : '';
	echo '<li><a href="' . $row['url'] . "\" $newtab >" . $row['naviname'].'</a></li>';}?>
</ul>
<?php endif;?>
</li>
<?php endforeach; ?>
<?php }?>
<?php
//widget：最新文章
function newlog(){
	global $CACHE; 
	$newLogs_cache = $CACHE->readCache('newlog');
	?>
	<?php $i=0;foreach($newLogs_cache as $value): if($i==0):?>
	<li  style="display: block;"><a href="<?php echo Url::log($value['gid']); ?>"><?php echo $value['title']; ?></a></li>
	<?php else: ?>
	<li><a href="<?php echo Url::log($value['gid']); ?>"><?php echo $value['title']; ?></a></li>
	<?php endif;$i++;endforeach; ?>
<?php }?>
<?php 
//文章缩略图获取
function get_imgsrc($str){
  preg_match_all("/\<img.*?src\=\"(.*?)\"[^>]*>/i", $str, $match);
  if(!empty($match[1])){
    echo $match[1][0];
  }else{
    echo TEMPLATE_URL . 'image/random/tb'.rand(1,20).'.jpg';
  }
}
?>
<?php //文章缩略图获取 返回地址
function is_img($str){
  preg_match_all("/\<img.*?src\=\"(.*?)\"[^>]*>/i", $str, $match);
  if(!empty($match[1])){
    return $match[1][0];
  }else{
    return TEMPLATE_URL . 'image/random/tb'.rand(1,20).'.jpg';
  }
}
?>
<?php
//通过id在文章中获取图片
function idby_img($logid){
$db = MySql::getInstance();
$sql = 	"SELECT content,date,views,comnum FROM ".DB_PREFIX."blog WHERE gid=".$logid."";
$list = $db->query($sql);
while($row = $db->fetch_array($list)){ 
	$li=array(is_img($row['content']),date('20y年m月d日',$row['date']),$row['views'],$row['comnum']);
	return $li;
 }} ?>
<?php
function DeleteHtml($str) 
{ 
$str = trim($str); //清除字符串两边的空格
$str = preg_replace("/\t/","",$str); //使用正则表达式替换内容，如：空格，换行，并将替换为空。
$str = preg_replace("/\r\n/","",$str); 
$str = preg_replace("/\r/","",$str); 
$str = preg_replace("/\n/","",$str); 
$str = preg_replace("/ /","",$str);
$str = preg_replace("/  /","",$str);  //匹配html中的空格
return trim($str); //返回字符串
}
 ?>
 <?php
//widget：热门文章
function widget_hotlog($title){
	//if (blog_tool_ishome()) return;#只在非首页显示友链去掉双斜杠注释即可
	$index_hotlognum = Option::get('index_hotlognum');
	$Log_Model = new Log_Model();
	$randLogs = $Log_Model->getHotLog($index_hotlognum);?>
<div class="tuijian">
<h2><?php echo $title; ?></h2>
    	<ol>
			<?php $i=0; foreach($randLogs as $value):?>
				<li><span><strong><?php $i++; echo $i; ?></strong></span> <a href="<?php echo Url::log($value['gid']); ?>" title="<?php echo $value['title']; ?>"><?php echo $value['title']; ?></a></li>
			<?php endforeach; ?>					
		</ol>
</div>
<?php }?>
<?php
//widget：随机文章
function widget_random_log($title){
	$index_randlognum = Option::get('index_randlognum');
	$Log_Model = new Log_Model();
	$randLogs = $Log_Model->getRandLog($index_randlognum);?>
	<div class="toppic">
	<h2><?php echo $title;?></h2>
	<ul>
	<?php foreach($randLogs as $value):$li = idby_img($value['gid']); ?>
	<li><a href="<?php echo Url::log($value['gid']); ?>"><img src="<?php echo $li[0]; ?>"><?php echo $value['title']; ?>
	<p><?php echo $li[1]; ?><br/><?php echo $li[2] ?>浏览量&nbsp;&nbsp;&nbsp;&nbsp;<?php if($li[3]==0){echo "抢沙发";}else{echo $li[3]."条评论";}  ?></p>
    </a></li>
	<?php endforeach; ?>
	</ul>
	</div>
<?php }?>
<?php
//widget：最新文章
function widget_newlog($title){
	global $CACHE; 
	$newLogs_cache = $CACHE->readCache('newlog');
	?>
	<div class="toppic">
	<h2><?php echo $title;?></h2>
	<ul>
	<?php foreach($newLogs_cache as $value):$li = idby_img($value['gid']); ?>
	<li><a href="<?php echo Url::log($value['gid']); ?>"><img src="<?php echo $li[0]; ?>"><?php echo $value['title']; ?>
	<p><?php echo $li[1]; ?></p>
    </a></li>
	<?php endforeach; ?>
	</ul>
	</div>
<?php }?>
<?php
//widget：链接
function bottom_link(){
	global $CACHE; 
	$link_cache = $CACHE->readCache('link');
    //if (!blog_tool_ishome()) return;#只在首页显示友链去掉双斜杠注释即可
	?>
	<div class="footer-mid">
		<h2>友情链接</h2>
	<ul>
	<li>
	<?php foreach($link_cache as $value): ?>
	<a href="<?php echo $value['url']; ?>" title="<?php echo $value['des']; ?>" target="_blank"><?php echo $value['link']; ?></a>&nbsp;&nbsp;&nbsp;&nbsp;
	<?php endforeach; ?>
	</li>
	</ul>
	</div>
<?php }?> 
<?php
//blog：编辑
function editflg($logid,$author){
	$editflg = ROLE == ROLE_ADMIN || $author == UID ? '<span><i class="fa fa-edit"></i> <a href="'.BLOG_URL.'admin/write_log.php?action=edit&gid='.$logid.'" target="_blank">编辑</a></span>' : '';
	echo $editflg;
}
?>
<?php
//widget：分类
function widget_sort($title){global $CACHE;$sort_cache = $CACHE->readCache('sort'); ?>
<div class="sunnav">
<ul>
  <?php foreach($sort_cache as $value):if ($value['pid'] != 0) continue;?>
  <li><a href="<?php echo Url::sort($value['sid']); ?>" target="_blank"><?php echo $value['sortname']; ?><?php if(empty($value['lognum'])){ echo "(0)";}else{echo "(".$value['lognum'].")";}?></a></li>
  <?php endforeach; ?>
</ul>
</div>
<?php }?>
<?php
//blog：文章页分类
function blog_sorts($blogid){
	global $CACHE; 
	$log_cache_sort = $CACHE->readCache('logsort');
	if(!empty($log_cache_sort[$blogid])) {
		echo '<a style="color: #00a2ca" href="'.Url::sort($log_cache_sort[$blogid]['id']).'">'.$log_cache_sort[$blogid]['name'].'</a>';
	}else {
		echo '<a href="'.BLOG_URL.'">未分类</a>';
	}
}
?>
<?php
function echo_levels($comment_author_email,$comment_author_url){
  $DB = MySql::getInstance();
global $CACHE;
	$user_cache = $CACHE->readCache('user'); 
	$adminEmail = '"'.$user_cache[1]['mail'].'"';
  if($comment_author_email==$adminEmail)
  {
    echo '<a class="vip" title="管理员认证"></a><a class="vip7" title="特别认证"></a>';
  }
  $sql = "SELECT cid as author_count,mail FROM ".DB_PREFIX."comment WHERE mail != '' and mail in ($comment_author_email) and hide ='n'";
  $res = $DB->query($sql);
  $author_count = mysql_num_rows($res);
   if($author_count>=2 && $author_count<10 && $comment_author_email!=$adminEmail)
    echo '<a class="vip1" title="路过酱油 LV.1"></a>';
  else if($author_count>=10 && $author_count<20 && $comment_author_email!=$adminEmail)
    echo '<a class="vip2" title="偶尔光临 LV.2"></a>';
  else if($author_count>=20 && $author_count<40 && $comment_author_email!=$adminEmail)
    echo '<a class="vip3" title="常驻人口 LV.3"></a>';
  else if($author_count>=40 && $author_count<80 && $comment_author_email!=$adminEmail)
    echo '<a class="vip4" title="以博为家 LV.4"></a>';
  else if($author_count>=80 &&$author_count<160 && $comment_author_email!=$adminEmail)
    echo '<a class="vip5" title="情牵小博 LV.5"></a>';
  else if($author_count>=160 && $author_coun<320 && $comment_author_email!=$adminEmail)
    echo '<a class="vip6" title="为博终老 LV.6"></a>';
  else if($author_count>=50 && $author_coun<60 && $comment_author_email!=$adminEmail)
    echo '<a class="vip7" title="三世情牵 LV.7"></a>';
}
?>
<?php
//blog：评论列表
function blog_comments($comments){extract($comments);if($commentStacks):?>
	<div class="comment-header"></div>
	<?php endif;?>
  <div class="comm_charu"></div>
  <div class="comment-list">
	<?php	$isGravatar = Option::get('isgravatar');$comnum = count($comments);foreach($comments as $value){if($value['pid'] != 0){$comnum--;}}$page = isset($params[5])?intval($params[5]):1;$i= $comnum - ($page - 1)*Option::get('comment_pnum');foreach($commentStacks as $cid):$comment = $comments[$cid];$comm_name = $comment['url'] ? '<a title="点击访问：'.$comment['url'].'" href="'.BLOG_URL.'go.php?url='.base64_encode($comment['url']).'" target="_blank" rel="external nofollow">'.$comment['poster'].'</a>' : $comment['poster'];$comment['content'] = preg_replace("/\[S(([1-4]?[0-9])|50)\]/",'<img src="'.TEMPLATE_URL.'image/face/$1.gif" alt="蓝叶博客" />',$comment['content']);$comment['content'] = preg_replace("/\{smile:(([1-4]?[0-9])|50)\}/",'<img src="'.TEMPLATE_URL.'image/face/$1.gif" alt="蓝叶博客" />',$comment['content']);$comment['content'] = preg_replace("/\[img=?\]*(.*?)(\[\/img)?\]/e", '"<a href=\"$1\" target=\"_blank\" rel=\"nofollow\" title=\"新窗口查看图片\"><img style=\"width:20px;height:20px;margin:0 5px\" src=\"'.TEMPLATE_URL.'images/img.gif\" alt=\"" . basename("$1") . "\" /></a>"', $comment['content']);$comment['content'] = preg_replace("/\[code=?\]*(.*?)(\[\/code)?\]/e", '"<pre>$1</pre>"', $comment['content']);$comment['content'] = preg_replace("/\[link=?\]*(.*?)(\[\/link)?\]/e", '"<a href=\"$1\" target=\"_blank\" rel=\"external nofollow\">$1</a>"', $comment['content']);?>
	<div class="comment" id="comment-<?php echo $comment['cid']; ?>">
		<a name="<?php echo $comment['cid']; ?>"></a>
		<?php if($isGravatar == 'y'): ?><div class="avatar"><img src="<?php echo mygetGravatar($comment['mail']); ?>" width="48" height="48" alt="<?php echo $comment['poster'];?>" title="<?php echo $comment['poster'];?>" /></div><?php endif; ?>
		<div class="comment-info">
			<span class="poster"><i class="fa fa-user mar-r-4 green"></i><?php $mail_str="\"".strip_tags($comment['mail'])."\"";echo_levels($mail_str,"\"".$comment['url']."\"");?> <?php echo $comm_name;?></span><span class="comment-time"><i class="fa fa-clock-o mar-r-4"></i><?php echo $comment['date']; ?></span><span class="comment-reply"><a href="#comment-<?php echo $comment['cid']; ?>" onclick="commentReply(<?php echo $comment['cid']; ?>,this)"><i class="fa fa-share mar-r-4"></i>回复</a></span><div class="louceng">#<?php echo $i;?></div>
			<div class="comment-content"><?php echo $comment['content']; ?></div>			
		</div>
		<?php blog_comments_children($comments, $comment['children']); ?>
	</div>
	<?php $i--;endforeach;?></div><div class="clear"></div>
    <div id="pagenavi" style="border-top:1px solid rgba(0,0,0,0.13);border-bottom:1px solid rgba(0,0,0,0.13);"><?php echo $commentPageUrl;?></div>
<?php }?>
<?php
//blog：子评论列表
function blog_comments_children($comments, $children){$isGravatar = Option::get('isgravatar');foreach($children as $child):$comment = $comments[$child];$comm_name = $comment['url'] ? '<a title="点击访问：'.$comment['url'].'" href="'.BLOG_URL.'go.php?url='.base64_encode($comment['url']).'" target="_blank" rel="external nofollow">'.$comment['poster'].'</a>' : $comment['poster'];$comment['content'] = preg_replace("/\{smile:(([1-4]?[0-9])|50)\}/",'<img src="'.TEMPLATE_URL.'image/face/$1.gif" alt="蓝叶博客" />',$comment['content']);$comment['content'] = preg_replace("/\[S(([1-4]?[0-9])|50)\]/",'<img src="'.TEMPLATE_URL.'image/face/$1.gif" alt="蓝叶博客" />',$comment['content']);$comment['content'] = preg_replace("/\[img=?\]*(.*?)(\[\/img)?\]/e", '"<a href=\"$1\" target=\"_blank\" rel=\"nofollow\" title=\"新窗口查看图片\"><img style=\"width:20px;height:20px;margin:0 5px\" src=\"'.TEMPLATE_URL.'images/img.gif\" alt=\"" . basename("$1") . "\" /></a>"', $comment['content']);$comment['content'] = preg_replace("/\[code=?\]*(.*?)(\[\/code)?\]/e", '"<pre>$1</pre>"', $comment['content']);$comment['content'] = preg_replace("/\[link=?\]*(.*?)(\[\/link)?\]/e", '"<a href=\"$1\" target=\"_blank\" rel=\"external nofollow\">$1</a>"', $comment['content']);?>
	<div class="comment-children" id="comment-<?php echo $comment['cid']; ?>">
		<a name="<?php echo $comment['cid']; ?>"></a>
		<?php if($isGravatar == 'y'): ?><div class="avatar"><img src="<?php echo mygetGravatar($comment['mail']); ?>" width="36" height="36" alt="<?php echo $comment['poster'];?>" title="<?php echo $comment['poster'];?>" /></div><?php endif;?>
		<div class="comment-info"><span class="poster"><i class="fa fa-user mar-r-4 green"></i><?php $mail_str="\"".strip_tags($comment['mail'])."\"";echo_levels($mail_str,"\"".$comment['url']."\"");?> <?php echo $comm_name;?></span><span class="comment-time"><i class="fa fa-clock-o mar-r-4"></i><?php echo $comment['date']; ?></span><?php if($comment['level'] < 4):?><span class="comment-reply"><a href="#comment-<?php echo $comment['cid']; ?>" onclick="commentReply(<?php echo $comment['cid']; ?>,this)"><i class="fa fa-share mar-r-4"></i>回复</a></span><?php endif;?>
			<div class="comment-content"><?php echo $comment['content']; ?></div>			
		</div>
		<?php blog_comments_children($comments, $comment['children']);?>
	</div>
	<?php endforeach; ?>
<?php }?>
<?php
//blog：发表评论表单
function blog_comments_post($logid,$ckname,$ckmail,$ckurl,$verifyCode,$allow_remark){
	if($allow_remark == 'y'):?>
	<div id="comment-place">
 <script src="<?php echo TEMPLATE_URL; ?>js/ajax_comment.js" type="text/javascript"></script>
	<div class="comment-post" id="comment-post">
		<div class="place-header"><a name="respond"></a></div>
		<form method="post" name="commentform" action="<?php echo BLOG_URL; ?>index.php?action=addcom" id="commentform">
			<input type="hidden" name="gid" value="<?php echo $logid; ?>" />
			<div class="textarea"><textarea name="comment" id="comment" rows="10" tabindex="4" placeholder="既然来了说点什么吧…"></textarea></div>
<div class="comm_toolbar">
  <div class="comm_tool">
  <div class="smilebg"><div class="smile"><div class="arrow"></div><?php include View::getView('smiley');?></div></div>
  <div title="插入表情" onclick="tool_bq()" class="tool_bq"><i class="fa fa-smile-o"></i></div>
  <div title="插入图片" onclick="tool_img()" class="tool_img"><i class="fa fa-image"></i></div>
  <div title="插入链接" onclick="tool_link()" class="tool_link"><i class="fa fa-link"></i></div>
  <div title="插入代码" onclick="tool_code()" class="tool_code"><i class="fa fa-code"></i></div>
  <div title="签到" onclick="tool_qiand()" class="tool_qiand"><i class="fa fa-pencil"></i></div>
  <div id="cmt-loading" style="float:left;padding-left:15px;height:32px;font-size:14px;color:red;line-height:30px;"></div>
  <?php if(ROLE == 'visitor'): ?>
<div class="comm_tijiao">提交评论</div>
<div class="cancel-reply" id="cancel-reply" style="display:none"><a href="javascript:void(0);" onclick="cancelReply()">取消回复</a></div>
</div>
</div>
<div class="comm_infobox">
<p><label for="author"><small>名&nbsp;&nbsp;字：</small></label><input type="text" name="comname" id="comname" maxlength="49" value="<?php echo $ckname; ?>" size="22" tabindex="1"></p>
<p><label for="email"><small>邮&nbsp;&nbsp;箱：</small></label><input type="text" name="commail" id="commail" maxlength="128"  value="<?php echo $ckmail; ?>" size="22" tabindex="2"></p>
<p><label for="url"><small>网&nbsp;&nbsp;址：</small></label><input type="text" name="comurl" id="comurl" maxlength="128"  value="<?php echo $ckurl; ?>" size="22" tabindex="3"></p>
<input style="margin-left:17px;" type="submit" id="comment_submit" value="发表评论" tabindex="6" /><div class="comm_rest">清空信息</div><div class="comm_close">关闭评论</div>
</div>
<?php else:?>
<div class="comm_tijiao"><input type="submit" id="comment_submit" value="发表评论" tabindex="6" /></div>
<div class="cancel-reply" id="cancel-reply" style="display:none"><a href="javascript:void(0);" onclick="cancelReply()">取消回复</a></div>
</div>
</div>
<?php endif; ?>
<input type="hidden" name="pid" id="comment-pid" value="0" size="22" tabindex="1"/>
</form>
	</div>
	</div>
 	<?php endif; ?>
<?php }?>
<?php
function get_avatar($mail,$size,$default='monsterid')
{
	$email_md5=md5(strtolower($mail));//通过MD5加密邮箱
	$cache_path=TEMPLATE_PATH."cache"; //缓存文件夹路径,ljie需要换上你的主题目录名称
	if(!file_exists($cache_path))
	{
		mkdir($cache_path,0700);
	}
 $avatar_url=TEMPLATE_URL."cache/".$email_md5.'.jpg'; //头像相对路径
	$avatar_abs_url=$cache_path."/".$email_md5.'.jpg'; //头像绝对路径
	$cache_time=24*3600*7; //缓存时间为7天
	 if (empty($default)) $default = $cache_path. '/default.jpg';
	if(!file_exists($avatar_abs_url) || (time()-filemtime($avatar_abs_url)) > $cache_time)//过期或图片不存在
	{
		$new_avatar = getGravatar($mail,$size,$default);
		copy($new_avatar,$avatar_abs_url);
	}
	return $avatar_url;
}
//调用方法
//get_avatar($comment['mail'],"{$comment['poster']}{$comment['comment_nums']}")
?>
<?php 
//blog:多说获取Gravatar头像
function mygetGravatar($email, $s = 80, $d = 'monsterid', $g = 'g') {
	$hash = md5($email);
	$avatar = "http://secure.gravatar.com/avatar/$hash?s=$s&d=$d&r=$g";
	return $avatar;
}
?>
<?php
//blog：相邻日志
function neighbor_log($neighborLog){extract($neighborLog);?>
<?php if($prevLog):?>
<a rel="prev" href="<?php echo Url::log($prevLog['gid']) ?>" class="prev"><span class="icon-wrap"></span><h3><?php echo $prevLog['title'];?></h3></a>
<?php else:?>
<?php endif;?>
<?php if($nextLog && $prevLog):?>
<?php endif;?>
<?php if($nextLog):?>
<a rel="next" href="<?php echo Url::log($nextLog['gid']) ?>"class="next"><span class="icon-wrap"></span><h3><?php echo $nextLog['title'];?></h3></a>
<?php else:?>
<?php endif;?>
<?php }?>
<?php
//blog：导航
function m_sort(){global $CACHE;$navi_cache = $CACHE->readCache('navi');?>
<?php foreach($navi_cache as $value):if ($value['pid'] != 0) {continue;} ?>
<?php 
$newtab = $value['newtab'] == 'y' ? 'target="_blank"' : '';
$value['url'] = $value['isdefault'] == 'y' ? BLOG_URL . $value['url'] : trim($value['url'], '/');
$current_tab = BLOG_URL . trim(Dispatcher::setPath(), '/') == $value['url'] ? 'cli' : '';  //判断当前页改变类?>
<a href="<?php echo $value['url']; ?>" <?php echo $newtab;?>><dd><?php echo $value['naviname']; ?></dd></a>
<?php if (!empty($value['children'])) : //非新窗户打开?>
<?php foreach ($value['children'] as $row){
	echo '<a href="'.Url::sort($row['sid']).'"><dd>'.$row['sortname'].'</dd></a>';}?>
<?php endif;?>
<?php if (!empty($value['childnavi'])) : //新窗口打开?> 
<?php foreach ($value['childnavi'] as $row){
	$newtab = $row['newtab'] == 'y' ? 'target="_blank"' : '';
	echo '<a href="' . $row['url'] . "\" $newtab ><dd>" . $row['naviname'].'</dd></a>';}?>
<?php endif;?>
<?php endforeach; ?>
<?php if(_g('phone_sort')==1){m_sorts();} }?>
<?php
//widget：手机端导航分类
function m_sorts(){global $CACHE;$sort_cache = $CACHE->readCache('sort'); ?>
  <?php foreach($sort_cache as $value):if ($value['pid'] != 0) continue;?>
  <a href="<?php echo Url::sort($value['sid']); ?>" target="_blank"><dd><?php echo $value['sortname']; ?></dd></a>
  <?php endforeach; ?>
<?php }?>	  
<?php
//widget：搜索
function widget_search($title){ ?>
<div class="search">
	<form class="searchform" name="keyform" method="get" action="<?php echo BLOG_URL; ?>index.php">
	<input name="keyword" class="search" type="text" value="Search" onfocus="this.value=''" onblur="this.value='Search'"/>
	</form>
</div>
<?php } ?>
<?php
//3D标签云
function widget_tag($title){
	//if (blog_tool_ishome()) return;#只在非首页显示友链去掉双斜杠注释即可
	global $CACHE;
	$tag_cache = $CACHE->readCache('tags');?>
	<div id="tag_cloud_widget">
	<script type="text/javascript" src="<?php echo TEMPLATE_URL; ?>js/tag.js"></script>
<?php foreach($tag_cache as $value): ?>
	<a href="<?php echo Url::tag($value['tagurl']); ?>" title="<?php echo $value['usenum']; ?> 篇文章"><?php echo $value['tagname']; ?></a>
<?php endforeach; ?>
</div>
<?php }?>
<?php
//widget：最新微语
function widget_twitter($title){
	global $CACHE; 
	$newtws_cache = $CACHE->readCache('newtw');
	$istwitter = Option::get('istwitter');
	?>
	<div class="widget widget_twitter">
		<!-- <h2><?php echo $title; ?></h2> -->
		<h2>点拨人生</h2>
		<?php foreach($newtws_cache as $value): ?>
		<?php $img = empty($value['img']) ? "" : ' <a title="查看图片" class="t_img" href="'.BLOG_URL.str_replace('thum-', '', $value['img']).'" target="_blank"><i class="widget_twitter_image fa fa-image"></i></a>';?>
		<p style="color: #b9b9b9;margin-bottom:10px"><i class="fa fa-bullhorn fa-2x"></i> <?php echo $value['t']; ?><?php echo $img;?> <time><?php echo timeago($value['date']); ?></time></p>
		<?php endforeach; ?>
	</div>
<?php }?>
<?php
//widget：最新评论
function widget_newcomm($title){
	global $CACHE;
	$user_cache = $CACHE->readCache('user');
	$name = $user_cache[1]['name'];
	$com_cache = $CACHE->readCache('comment');
	?>
<div class="newcomm">
	<h2><?php echo $title; ?></h2>
	<ul id="newcomment">
		<?php
		$i = 0;
		foreach($com_cache as $value):
		//if($value['name']!=$name):
		$i++;
		$articleUrl = Url::log($value['gid']);
		$url = Url::comment($value['gid'], $value['page'], $value['cid']);
		$db = MySql::getInstance();
		$sql = "SELECT title FROM ".DB_PREFIX."blog WHERE gid=".$value['gid'];
		$ret = $db->query($sql);
		$row = $db->fetch_array($ret);
		$articleTitle = $row['title'];
		$db = MySql::getInstance();
		$sql = "SELECT url FROM ".DB_PREFIX."comment WHERE cid=".$value['cid'];
		$ret = $db->query($sql);
		$row = $db->fetch_array($ret);
		$value['content'] = preg_replace('/\[img=?\]*(.*?)(\[\/img)?\]/e', '"<a rel=\"example_group\" class=\"cboxElement\" href=\"$1\" title=\"这是一张图片，点击进行查看\">图片</a>"', $value['content']);
		$value['content']=preg_replace("/{smile:(([1-4]?[0-9])|50)}/",'<img class="lazy" src="' . TEMPLATE_URL. 'img/smilies/$1.gif" />',$value['content']) ?>
		<li><span class="img"><img width="40" height="40" src="<?php echo mygetGravatar($value['mail']); ?>" alt="评论者头像"></span>
		<span class="info">
			<span class="name">
				<?php echo $value['name']; ?>
			</span>
			<span style="color: #D8D8D8">
				<!-- 什么时候评论 -->
				<?php echo timeago($value['date']); ?>说：
			</span>
			<p>
				<a href="<?php echo $url; ?>"><?php echo preg_replace("/\[S(([1-4]?[0-9])|50)\]/",'<img alt="face" src="'.TEMPLATE_URL.'image/face/$1.gif";  />',preg_replace("|\[code\]|",'',$value['content'])); ?>
				</a>
			</p>
		</span>
		<span class="leftbox"></span>
		</li>
		<?php if($i==6){break;}  /*endif*/;endforeach; ?>
	</ul>
</div>
<?php }?>
<?php
//widget：侧边栏链接
function widget_link($title, $isLog = false, $isPage = false){
	global $CACHE; 
	$link_cache = $CACHE->readCache('link');
?>
			<div id="yqlj_link">
			<h2><?php echo $title; ?></h2>
			<ul id="link">
<?php 
	foreach($link_cache as $value):
		$urlinfo = parse_url($value['url']);
		$urlHost = explode(".",$urlinfo['host']);
		$urlHost = array_reverse($urlHost);
?>
			<li>
				<i class="fa fa-link mar-r-10"></i>
				<a rel="friend" href="<?php echo $value['url']; ?>" title="<?php echo $value['des']; ?>" target="_blank"><?php echo $value['link']; ?></a>
			</li>
<?php endforeach; ?>
			</ul>
			</div>
<?php }?>
<?php
//widget：归档
function widget_archive($title){
	global $CACHE; 
	$record_cache = $CACHE->readCache('record');
	?>
	<div>
	<h2><?php echo $title; ?></h2>
	<ul id="record">
	<?php foreach($record_cache as $value): ?>
	<li><a href="<?php echo Url::record($value['date']); ?>"><?php echo $value['record']; ?>(<?php echo $value['lognum']; ?>)</a></li>
	<?php endforeach; ?>
	</ul>
	</div>
<?php } ?>
<?php
//widget：自定义组件
function widget_custom_text($title, $content){ ?>
	<div class="zdy">
	<h2><?php echo $title; ?></h2>
	<ul>
	<?php echo $content; ?>
	</ul>
	</div>
<?php } ?>
<?php
//blog：日志作者
function blog_author($uid){
	global $CACHE;
	$user_cache = Cache::getInstance()->readCache('user');
	$author = $user_cache[$uid]['name'];
	$mail = $user_cache[$uid]['mail'];
	$des = $user_cache[$uid]['des'];
	if($mail!==($user_cache[1]['mail'])){ $title = !empty($mail) || !empty($des) ? "title=\"特邀作者\"" : '';}else{$title = !empty($mail) || !empty($des) ? "title=\"博客管理员\"" : '';}
	echo '<a href="'.Url::author($uid)."\" $title>$author</a>";
}
?>
<?php //判断内容页是否百度收录及百度自动推送代码
function baidu($url){
$url='http://www.baidu.com/s?wd='.$url;
$curl=curl_init();curl_setopt($curl,CURLOPT_URL,$url);curl_setopt($curl,CURLOPT_RETURNTRANSFER,1);$rs=curl_exec($curl);curl_close($curl);if(!strpos($rs,'没有找到')){return 1;}else{return 0;}}
function logurl($id){$url=Url::log($id);
if(baidu($url)==1){echo "<a rel=\"external nofollow\" title=\"本文已被百度收录\" target=\"_blank\" href=\"http://www.baidu.com/s?wd=$url\">本文已被百度收录！</a>";
}else{echo "<a>本文已提交百度！</a><script>
(function(){
    var bp = document.createElement('script');
    var curProtocol = window.location.protocol.split(':')[0];
    if (curProtocol === 'https') {
        bp.src = 'https://zz.bdstatic.com/linksubmit/push.js';        
    }
    else {
        bp.src = 'http://push.zhanzhang.baidu.com/push.js';
    }
    var s = document.getElementsByTagName('script')[0];
    s.parentNode.insertBefore(bp, s);
})();
</script>";}}
?>
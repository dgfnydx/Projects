<?php 
/*
* 侧边栏组件、页面模块
*/
if(!defined('EMLOG_ROOT')) {exit('error!');} 
?>
<?php
//widget：blogger
function widget_blogger($title){
	global $CACHE;
	$user_cache = $CACHE->readCache('user');
	$name = $user_cache[1]['mail'] != '' ? "<a href=\"mailto:".$user_cache[1]['mail']."\">".$user_cache[1]['name']."</a>" : $user_cache[1]['name'];?>
	<div class="sidebar_t">
		<div class="sidebar_b">
	<h3><span><?php echo $title; ?></span></h3>
	<ul id="bloggerinfo">
	<div id="bloggerinfoimg">
	<?php if (!empty($user_cache[1]['photo']['src'])): ?>
	<img src="<?php echo BLOG_URL.$user_cache[1]['photo']['src']; ?>" width="<?php echo $user_cache[1]['photo']['width']; ?>" height="<?php echo $user_cache[1]['photo']['height']; ?>" alt="blogger" />
	<?php endif;?>
	</div>
	<p><b><?php echo $name; ?></b>
	<?php echo $user_cache[1]['des']; ?></p>
	</ul>
	</div>
</div>
<div class="sidebar_f"></div>
<?php }?>
<?php
//widget：日历
function widget_calendar($title){ ?>
	<div class="sidebar_t">
		<div class="sidebar_b">
	<h3><span><?php echo $title; ?></span></h3>
	<div id="calendar">
	</div>
	<script>sendinfo('<?php echo Calendar::url(); ?>','calendar');</script>
	</div>
</div>
<div class="sidebar_f"></div>
<?php }?>
<?php
//widget：标签
function widget_tag($title){
	global $CACHE;
	$tag_cache = $CACHE->readCache('tags');?>
	<div class="sidebar_t">
		<div class="sidebar_b">
	<h3><span><?php echo $title; ?></span></h3>
	<ul id="blogtags">
	<?php foreach($tag_cache as $value): ?>
		<span style="font-size:<?php echo $value['fontsize']; ?>pt; line-height:30px;">
		<a href="<?php echo Url::tag($value['tagurl']); ?>" title="<?php echo $value['usenum']; ?> 篇日志"><?php echo $value['tagname']; ?></a></span>
	<?php endforeach; ?>
	</ul>
	</div>
</div>
<div class="sidebar_f"></div>
<?php }?>
<?php
//widget：分类
function widget_sort($title){
	global $CACHE;
	$sort_cache = $CACHE->readCache('sort'); ?>
	<div class="sidebar_t">
		<div class="sidebar_b">
	<h3><span><?php echo $title; ?></span></h3>
	<ul id="blogsort">
	<?php foreach($sort_cache as $value): ?>
	<li>
	<a href="<?php echo Url::sort($value['sid']); ?>"><?php echo $value['sortname']; ?>(<?php echo $value['lognum'] ?>)</a>
	<a href="<?php echo BLOG_URL; ?>rss.php?sort=<?php echo $value['sid']; ?>"><img src="<?php echo TEMPLATE_URL; ?>images/rss.png" alt="订阅该分类"/></a>
	</li>
	<?php endforeach; ?>
	</ul>
	</div>
</div>
<div class="sidebar_f"></div>
<?php }?>
<?php
//widget：最新碎语
function widget_twitter($title){
	global $CACHE; 
	$newtws_cache = $CACHE->readCache('newtw');
	$istwitter = Option::get('istwitter');
	?>
	<div class="sidebar_t">
		<div class="sidebar_b">
	<h3><span><?php echo $title; ?></span></h3>
	<ul id="twitter">
	<?php foreach($newtws_cache as $value): ?>
	<?php $img = empty($value['img']) ? "" : '<a title="查看图片" class="t_img" href="'.BLOG_URL.str_replace('thum-', '', $value['img']).'" target="_blank">&nbsp;</a>';?>
	<li class="st"><?php echo $value['t']; ?><?php echo $img;?><p class="ttime"><?php echo smartDate($value['date']); ?></p></li>
	<?php endforeach; ?>
    <?php if ($istwitter == 'y') :?>
	<p><a href="<?php echo BLOG_URL . 't/'; ?>">更多&raquo;</a></p>
	<?php endif;?>
	</ul>
	</div>
</div>
<div class="sidebar_f"></div>
<?php }?>
<?php
//widget：最新评论
function widget_newcomm($title){
	global $CACHE; 
	$com_cache = $CACHE->readCache('comment');
	?>
	<div class="sidebar_t">
		<div class="sidebar_b">
			<div class="r_comment">
	<h3><span><?php echo $title; ?></span></h3>
	<ul id="newcomment">
	<?php
	foreach($com_cache as $value):
	$url = Url::comment($value['gid'], $value['page'], $value['cid']);
	?>
	<li><img alt='' src='<?php echo getGravatar($value['mail']);?>' class='avatar avatar-32 photo' height='32' width='32' /><?php echo $value['name']; ?>:：
	<br /><a href="<?php echo $url; ?>"><?php echo $value['content']; ?></a></li>
	<?php endforeach; ?>
	</ul>
	</div>
	</div>
</div>
<div class="sidebar_f"></div>
<?php }?>
<?php
//widget：最新日志
function widget_newlog($title){
	global $CACHE; 
	$newLogs_cache = $CACHE->readCache('newlog');
	?>
	<div class="sidebar_t">
		<div class="sidebar_b">
	<h3><span><?php echo $title; ?></span></h3>
	<ul id="newlog">
	<?php foreach($newLogs_cache as $value): ?>
	<li><a href="<?php echo Url::log($value['gid']); ?>"><?php echo $value['title']; ?></a></li>
	<?php endforeach; ?>
	</ul>
	</div>
</div>
<div class="sidebar_f"></div>
<?php }?>
<?php
//widget：随机日志
function widget_random_log($title){
	$index_randlognum = Option::get('index_randlognum');
	$Log_Model = new Log_Model();
	$randLogs = $Log_Model->getRandLog($index_randlognum);?>
	<div class="sidebar_t">
		<div class="sidebar_b">
	<h3><span><?php echo $title; ?></span></h3>
	<ul id="randlog">
	<?php foreach($randLogs as $value): ?>
	<li><a href="<?php echo Url::log($value['gid']); ?>"><?php echo $value['title']; ?></a></li>
	<?php endforeach; ?>
	</ul>
	</div>
</div>
<div class="sidebar_f"></div>
<?php }?>
<?php
//widget：热门日志
function widget_hotlog($title){
        $index_hotlognum = Option::get('index_hotlognum');
        $Log_Model = new Log_Model();
        $randLogs = $Log_Model->getHotLog($index_hotlognum);?>
        <div class="sidebar_t">
			<div class="sidebar_b">
				<h3><span><?php echo $title; ?></span></h3>
				<ul id="hotlog">
					<?php foreach($randLogs as $value): ?>
					<li><a href="<?php echo Url::log($value['gid']); ?>"><?php echo $value['title']; ?></a></li>
					<?php endforeach; ?>
				</ul>
			</div>
        </div>
		<div class="sidebar_f"></div>
<?php }?>
<?php
//widget：归档
function widget_archive($title){
	global $CACHE; 
	$record_cache = $CACHE->readCache('record');
	?>
	<div class="sidebar_t">
		<div class="sidebar_b">
	<h3><span><?php echo $title; ?></span></h3>
	<ul id="record">
	<?php foreach($record_cache as $value): ?>
	<li><a href="<?php echo Url::record($value['date']); ?>"><?php echo $value['record']; ?>(<?php echo $value['lognum']; ?>)</a></li>
	<?php endforeach; ?>
	</ul>
	</div>
</div>
<div class="sidebar_f"></div>
<?php } ?>
<?php
//widget：自定义组件
function widget_custom_text($title, $content){ ?>
	<div class="sidebar_t">
		<div class="sidebar_b">
	<h3><span><?php echo $title; ?></span></h3>
	<ul>
	<?php echo $content; ?>
	</ul>
	</div>
</div>
<div class="sidebar_f"></div>
<?php } ?>
<?php
//widget：链接
function widget_link($title){
	global $CACHE; 
	$link_cache = $CACHE->readCache('link');
	?>
	<div class="sidebar_t">
		<div class="sidebar_b">
	<h3><span><?php echo $title; ?></span></h3>
	<ul id="link">
	<?php foreach($link_cache as $value): ?>
	<li><a href="<?php echo $value['url']; ?>" title="<?php echo $value['des']; ?>" target="_blank"><?php echo $value['link']; ?></a></li>
	<?php endforeach; ?>
	</ul>
	</div>
</div>
<div class="sidebar_f"></div>
<?php }?>
<?php
//blog：导航
function blog_navi(){
        global $CACHE; 
        $navi_cache = $CACHE->readCache('navi');
        ?>
        <div class="pagemenu">
			<ul id="menu-pages-menu" class="navi">
			<?php 
			foreach($navi_cache as $value):
					$newtab = $value['newtab'] == 'y' ? 'target="_blank"' : '';
					$value['url'] = $value['isdefault'] == 'y' ? BLOG_URL . $value['url'] : trim($value['url'], '/');
					$current_tab = (BLOG_URL . trim(Dispatcher::setPath(), '/') == $value['url']) ? 'page_item' : 'page_item';
					?>
					<li class="<?php echo $current_tab;?>"><a href="<?php echo $value['url']; ?>" <?php echo $newtab;?>><?php echo $value['naviname']; ?></a></li>
			<?php endforeach; ?>
			</ul>
		</div>
<?php }?>
<?php
//blog：置顶
function topflg($istop){
	$topflg = $istop == 'y' ? "<img src=\"".TEMPLATE_URL."/images/import.gif\" title=\"置顶日志\" /> " : '';
	echo $topflg;
}
?>
<?php
//blog：编辑
function editflg($logid,$author){
	$editflg = ROLE == 'admin' || $author == UID ? '<a href="'.BLOG_URL.'admin/write_log.php?action=edit&gid='.$logid.'">编辑</a>' : '';
	echo $editflg;
}
?>
<?php
//blog：分类
function blog_sort($blogid){
	global $CACHE; 
	$log_cache_sort = $CACHE->readCache('logsort');
	?>
	<?php if(!empty($log_cache_sort[$blogid])): ?>
	分类：<a href="<?php echo Url::sort($log_cache_sort[$blogid]['id']); ?>"><?php echo $log_cache_sort[$blogid]['name']; ?></a>
	<?php else:?>
	分类：<a href="<?php echo Url::sort($log_cache_sort[$blogid]['id']); ?>">未分类</a>
	<?php endif;?>
<?php }?>
<?php
//blog：文件附件
function blog_att($blogid){
	global $CACHE;
	$log_cache_atts = $CACHE->readCache('logatts');
	$att = '';
	if(!empty($log_cache_atts[$blogid])){
		$att .= '附件下载：';
		foreach($log_cache_atts[$blogid] as $val){
			$att .= '<a href="'.BLOG_URL.$val['url'].'" target="_blank">'.$val['filename'].'</a> '.$val['size'];
		}
	}
	echo $att;
}
?>
<?php
//blog：日志标签
function blog_tag($blogid){
	global $CACHE;
	$log_cache_tags = $CACHE->readCache('logtags');
	if (!empty($log_cache_tags[$blogid])){
		$tag = '标签:';
		foreach ($log_cache_tags[$blogid] as $value){
			$tag .= "	<a href=\"".Url::tag($value['tagurl'])."\">".$value['tagname'].'</a>';
		}
		echo $tag;
	}
}
?>
<?php
//blog：日志作者
function blog_author($uid){
	global $CACHE;
	$user_cache = $CACHE->readCache('user');
	$author = $user_cache[$uid]['name'];
	$mail = $user_cache[$uid]['mail'];
	$des = $user_cache[$uid]['des'];
	$title = !empty($mail) || !empty($des) ? "title=\"$des $mail\"" : '';
	echo '<a href="'.Url::author($uid)."\" $title>$author</a>";
}
?>
<?php
//blog：相邻日志
function neighbor_log($neighborLog){
	extract($neighborLog);?>
	<?php if($prevLog):?>
	【上一篇】<a href="<?php echo Url::log($prevLog['gid']) ?>"><?php echo $prevLog['title'];?></a>
	<?php endif;?>
	<?php if($nextLog && $prevLog):?>
		<br/>
	<?php endif;?>
	<?php if($nextLog):?>
		 【下一篇】<a href="<?php echo Url::log($nextLog['gid']) ?>"><?php echo $nextLog['title'];?></a>
	<?php endif;?>
<?php }?>
<?php
//blog：引用通告
function blog_trackback($tb, $tb_url, $allow_tb){
    if($allow_tb == 'y' && Option::get('istrackback') == 'y'):?>
	<p>通告: <?php echo $tb_url; ?>
	<a name="tb"></a></p>
	<?php endif; ?>
<?php }?>
<?php
//blog：博客评论列表
function blog_comments($comments){
    extract($comments);
    if($commentStacks): ?>
	<a name="comments"></a>
	<h3 id="comments">评论：</h3>
	<ol class="commentlist">
	<?php endif; ?>
	<?php
	$isGravatar = Option::get('isgravatar');
	foreach($commentStacks as $cid):
    $comment = $comments[$cid];
	$comment['poster'] = $comment['url'] ? '<a href="'.$comment['url'].'" target="_blank">'.$comment['poster'].'</a>' : $comment['poster'];
	?>
	<li class="comment depth-<?php echo $comment['level']+1;?>" id="comment-<?php echo $comment['cid']; ?>">
		<a name="<?php echo $comment['cid']; ?>"></a>
		<div id="div-comment-<?php echo $comment['cid']; ?>">
			<div class="comment-author vcard">
				<?php if($isGravatar == 'y'): ?><img  class="avatar" src="<?php echo getGravatar($comment['mail']); ?>" height='40' width='40' /><?php endif; ?>
				<span class="reply"><a class='comment-reply-link' href="#comment-<?php echo $comment['cid']; ?>" onclick="commentReply(<?php echo $comment['cid']; ?>,this)">[回复]</a></span><strong><?php echo $comment['poster']; ?></strong>：<span class="datetime">发表于 <?php echo $comment['date']; ?></span></div>
				<div class="comment-content"><?php echo $comment['content']; ?></div>
				<div class="clear"></div>
			</div>
			<?php blog_comments_children($comments, $comment['children']); ?>
	</li>
	<?php endforeach; ?>
	</ol>
    <div id="pagenavi" class="navigation">
		<div class='pagination'>
			<?php echo $commentPageUrl;?>
		</div>
	</div>
<?php }?>
<?php
//blog：博客子评论列表
function blog_comments_children($comments, $children){
	$isGravatar = Option::get('isgravatar');
	foreach($children as $child):
	$comment = $comments[$child];
	$comment['poster'] = $comment['url'] ? '<a href="'.$comment['url'].'" target="_blank">'.$comment['poster'].'</a>' : $comment['poster'];
	?>
	<ul class='children'>
		<li class="comment odd alt depth-<?php echo $comment['level']+1;?>" id="comment-<?php echo $comment['cid']; ?>">
			<a name="<?php echo $comment['cid']; ?>"></a>
			<div id="div-comment-<?php echo $comment['cid']; ?>">
				<div class="comment-author vcard">
					<?php if($isGravatar == 'y'): ?><img class="avatar" src="<?php echo getGravatar($comment['mail']); ?>" height='40' width='40'  /><?php endif; ?>
					<?php if($comment['level'] < 4): ?><span class="reply"><a class='comment-reply-link' href="#comment-<?php echo $comment['cid']; ?>" onclick="commentReply(<?php echo $comment['cid']; ?>,this)">[回复]</a></span><strong><?php echo $comment['poster']; ?></strong>：<span class="datetime">发表于 <?php echo $comment['date']; ?></span></div><?php endif; ?>
					<div class="comment-content"><?php echo $comment['content']; ?></div>
					<div class="clear"></div>
				</div>
				<?php blog_comments_children($comments, $comment['children']);?>
		</li>
	</ul>
	<?php endforeach; ?>
<?php }?>
<?php
//blog：发表评论表单
function blog_comments_post($logid,$ckname,$ckmail,$ckurl,$verifyCode,$allow_remark){
	if($allow_remark == 'y'): ?>
	<div id="comment-place">
	<div class="comment-post" id="comment-post">
		<p class="comment-header"><b>发表评论：</b><a name="respond"></a><a  class="cancel-reply" id="cancel-reply" style="display:none" href="javascript:void(0);" onclick="cancelReply()">点击这里取消回复</a></p>
		
		<div class="cancel-comment-reply">
		<form method="post" name="commentform" action="<?php echo BLOG_URL; ?>index.php?action=addcom" id="commentform">
			<input type="hidden" name="gid" value="<?php echo $logid; ?>" />
			<?php if(ROLE == 'visitor'): ?>
			<p>
				<input type="text" name="comname"  class="commenttext" maxlength="49" value="<?php echo $ckname; ?>" size="22" tabindex="1">
				<label for="author">昵称</label>
			</p>
			<p>
				<input type="text" name="commail"  class="commenttext"  maxlength="128"  value="<?php echo $ckmail; ?>" size="22" tabindex="2">
				<label for="email">邮件地址 (选填)</label>
			</p>
			<p>
				<input type="text" name="comurl" class="commenttext" maxlength="128"  value="<?php echo $ckurl; ?>" size="22" tabindex="3">
				<label for="url">个人主页 (选填)</label>
			</p>
			<?php endif; ?>
			<p><textarea name="comment" id="comment" rows="10" tabindex="4"></textarea></p>
			<p><?php echo $verifyCode; ?> <input type="submit" id="comment_submit" value="发表评论" tabindex="6" /></p>
			<input type="hidden" name="pid" id="comment-pid" value="0" size="22" tabindex="1"/>
		</form>
		</div>
	</div>
	</div>
	<?php endif; ?>
<?php }?>
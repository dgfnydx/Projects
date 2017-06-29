<?php 
/*
* 首页日志列表部分
*/
if(!defined('EMLOG_ROOT')) {exit('error!');} 
?>
<div class="content_l">
<?php doAction('index_loglist_top'); ?>
<?php foreach($logs as $value): ?>
	<div class="post-581 post type-post status-publish format-standard hentry category-original-article category-web-security tag-javascript tag-90 tag-web-security">
		<div class="left">
			<div class="post_date">
				<span class="date_m"><?php echo gmdate('M', $value['date']); ?></span>
				<span class="date_d"><?php echo gmdate('d', $value['date']); ?></span>
				<span class="date_y"><?php echo gmdate('Y', $value['date']); ?></span>
			</div>
			<div class="article">
				<div class="article_t">
					<div class="article_b">
						<h2><a href="<?php echo $value['log_url']; ?>" rel="bookmark" title="详细阅读 <?php echo $value['log_title']; ?>"><?php echo $value['log_title']; ?></a><span class="new"></span></h2>
						<div class="thumbnail_box">
							<div class="thumbnail">
								<a href="<?php echo $value['log_url']; ?>" rel=" " title="<?php echo $value['log_title']; ?>"><img src="<?php echo TEMPLATE_URL; ?>images/random/tb<?php echo rand(1,20);?>.jpg" alt="<?php echo $value['log_title']; ?>" title="<?php echo $value['log_title']; ?>" /></a>
							</div>
						</div>
						<div class="context">
						<?php echo $value['log_description']; ?>
						</div>
						<p class="more_b"><span class="more"><a href="<?php echo $value['log_url']; ?>" title="详细阅读 <?php echo $value['log_title']; ?>" rel="bookmark">阅读全文...</a></span></p>
						<div class="clear"></div>
					</div>
					<div class="article_f">
						<div class="article_info">
							<span class="author">
								&nbsp;&nbsp;&nbsp;&nbsp;<?php blog_author($value['author']); ?>
							</span>
							<span class="category">
								&nbsp;&nbsp;&nbsp;&nbsp;<?php blog_sort($value['logid']); ?> 
							</span>
							<span class="post_comm">
								&nbsp;&nbsp;&nbsp;&nbsp;<a href="<?php echo $value['log_url']; ?>#comments" title="《<?php echo $value['log_title']; ?>》上的评论"><?php echo $value['comnum']; ?>条评论</a></a>
							</span>
							<span class="post_view">
								&nbsp;&nbsp;&nbsp;&nbsp;已被围观 <span id="wppvp_tv_581"><?php echo $value['views']; ?></span>次</a>
							</span>
							<span class="tags">
								&nbsp;&nbsp;&nbsp;&nbsp;<?php blog_tag($value['logid']); ?>
							</span>
							<span></span>
						</div>
					</div>
				</div>
			</div>   
		</div>
	</div>
<?php endforeach; ?>
	<div id="pagenavi" class="navigation">
		<div class='pagination'>
			<?php echo $page_url;?>
		</div> 
	</div>
</div>

<?php
 include View::getView('side');
 include View::getView('footer');
?>
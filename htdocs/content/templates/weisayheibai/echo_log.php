<?php 
/*
* 阅读日志页面
*/
if(!defined('EMLOG_ROOT')) {exit('error!');} 
?>
<div class="content_l">
	<div class="left">
		<div class="post_date">
			<span class="date_m"><?php echo gmdate('M', $date); ?> </span>
			<span class="date_d"><?php echo gmdate('d', $date); ?> </span>
			<span class="date_y"><?php echo gmdate('Y', $date); ?> </span>
		</div>
		<div class="article">
			<div class="article_t">
				<div class="article_b">
					<h2><?php topflg($top); ?><?php echo $log_title; ?></h2>
						<div class="info">
							<?php $comment_num = 1;?>
							<span><img src="<?php echo TEMPLATE_URL; ?>images/meta_author.png" alt="作者" title="作者" /><?php blog_author($author); ?></span>
							<span><img src="<?php echo TEMPLATE_URL; ?>images/meta_categories.png" alt="文章分类" title="文章分类" /><?php blog_sort($logid); ?></span>
							<span><img src="<?php echo TEMPLATE_URL; ?>images/meta_comments.png" alt="文章评论" title="文章评论" /> <a href="#comments" title="<?php echo $log_title; ?>上的评论"><?php echo $comnum; ?>条评论</a></span>
							<span><img src="<?php echo TEMPLATE_URL; ?>images/meta_views.png" alt="阅读次数" title="阅读次数" /> 已被围观 <span id="wppvp_tv_415"><?php echo $views; ?></span> 次</span>
							<span></span>
						</div>
						<div class="context">
							<?php echo $log_content; ?>
						</div>
					</div>
					<div class="article_ff"></div>
				</div>
			</div>
		</div>
		<div class="left">
			<div class="article">
				<div class="article_t">
					<div class="article_b">
						<div class="author_pic">
							<a href="#" title="<?php echo $bloginfo; ?>"><img alt='' src='<?php echo getGravatar($comment['mail']); ?>' class='avatar avatar-48 photo' height='48' width='48' /></a>
						</div>
						<div class="author_text">
							<span class="spostinfo">
								<?php blog_sort($logid); ?> <br/><?php blog_tag($logid); ?><br/><?php blog_trackback($tb, $tb_url, $allow_tb); ?>
							</span>
						</div>
						<div class="clear"></div>
					</div>
					<div class="article_ff"></div>
				</div>
			</div>
		</div>
		<div class="left">
			<div class="article">
				<div class="article_t">
					<div class="article_b">
							<?php neighbor_log($neighborLog); ?>
					</div>
					<div class="article_ff"></div>
				</div>
			</div>
		</div>
		
		<div class="left">
			<div class="article">
				<div class="article_t">
					<div class="article_b">
						<?php doAction('log_related', $logData); ?>	
					</div>
					<div class="article_ff"></div>
				</div>
			</div>
		</div>
		
		<div class="left">
			<div class="article">
				<div class="article_t">
					<div class="article_b">
						<?php blog_comments($comments); ?>
						<?php blog_comments_post($logid,$ckname,$ckmail,$ckurl,$verifyCode,$allow_remark); ?>
					</div>
					<div class="article_ff"></div>
				</div>
			</div>
		</div>

	<div style="clear:both;"></div>
</div><!--end #contentleft-->
<?php
 include View::getView('side');
 include View::getView('footer');
?>
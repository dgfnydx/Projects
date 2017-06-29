<?php 
/*
* 自建页面模板
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
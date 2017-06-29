<?php 
/*
* 碎语部分
*/
if(!defined('EMLOG_ROOT')) {exit('error!');} 
?>
<div class="content_l">
    <?php 
    foreach($tws as $val):
    $author = $user_cache[$val['author']]['name'];
    $avatar = empty($user_cache[$val['author']]['avatar']) ? 
                BLOG_URL . 'admin/views/images/avatar.jpg' : 
                BLOG_URL . $user_cache[$val['author']]['avatar'];
    $tid = (int)$val['id'];
	$img = empty($val['img']) ? "" : '<a title="查看图片" href="'.BLOG_URL.str_replace('thum-', '', $val['img']).'" target="_blank"><img style="border: 1px solid #EFEFEF;" src="'.BLOG_URL.$val['img'].'"/></a>';
    ?> 
    <div class="left">
			<div class="article">
				<div class="article_t">
					<div class="article_b">
					<p class="post1"><span><?php echo $author; ?></span><br /><?php echo $val['t'].'<br/>'.$img;?></p>
					<div class="clear"></div>
					<div class="bttome">
						<p class="post"><a href="javascript:loadr('<?php echo DYNAMIC_BLOGURL; ?>?action=getr&tid=<?php echo $tid;?>','<?php echo $tid;?>');">回复(<span id="rn_<?php echo $tid;?>"><?php echo $val['replynum'];?></span>)</a></p>
					</div>
					<div class="clear"></div>
					<ul id="r_<?php echo $tid;?>" class="r"></ul>
					<div class="huifu" id="rp_<?php echo $tid;?>" style="display:none">   
						<textarea id="rtext_<?php echo $tid; ?>"></textarea>
						<div class="tbutton">
							<div class="tinfo" style="display:<?php if(ROLE == 'admin' || ROLE == 'writer'){echo 'none';}?>">
								昵称：<input type="text" id="rname_<?php echo $tid; ?>" value="" />
								<span style="display:<?php if($reply_code == 'n'){echo 'none';}?>">验证码：<input type="text" id="rcode_<?php echo $tid; ?>" value="" /><?php echo $rcode; ?></span>        
							</div>
							<input class="button_p" type="button" onclick="reply('<?php echo DYNAMIC_BLOGURL; ?>index.php?action=reply',<?php echo $tid;?>);" value="回复" /> 
							<div class="msg"><span id="rmsg_<?php echo $tid; ?>" style="color:#FF0000"></span></div>
						</div>
					</div>
	
				</div>
				<div class="article_ff"></div>
			</div>
		</div>
	</div>
    <?php endforeach;?>
	<div id="pagenavi" class="navigation">
		<div class='pagination'>
			<?php echo $pageurl;?>
		</div> 
	</div>
	<div style="clear:both;"></div>
</div><!--end #contentleft-->
<?php
 include View::getView('side');
 include View::getView('footer');
?>
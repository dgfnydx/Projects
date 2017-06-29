<?php 
/**
 * 自建页面模板
 */
if(!defined('EMLOG_ROOT')) {exit('error!');} 
?>
<div class="show">
	<div class="show_box">
     <h2><a href="<?php echo BLOG_URL; ?>" title="首页">首页</a>
	 <a rel="category tag"><?php echo $log_title; ?></a></h2>
      <h1><?php echo $log_title; ?></h1>
      <p class="box">发布时间:<?php echo gmdate('20y年m月d日',$date); ?>
	  <span>评论数：<?php if($comnum):?><?php echo $comnum; ?><?php else:?>抢沙发<?php endif;?></span>
	  作者：<span id="hits" style="display:inline"><?php blog_author($author); ?></span>
	  </p>
      <ul>
	  <?php echo $log_content;?>  
	  <div class="bdsharebuttonbox"><a href="#" class="bds_more" data-cmd="more"></a><a href="#" class="bds_qzone" data-cmd="qzone" title="分享到QQ空间"></a><a href="#" class="bds_tsina" data-cmd="tsina" title="分享到新浪微博"></a><a href="#" class="bds_tqq" data-cmd="tqq" title="分享到腾讯微博"></a><a href="#" class="bds_renren" data-cmd="renren" title="分享到人人网"></a><a href="#" class="bds_weixin" data-cmd="weixin" title="分享到微信"></a></div>
	  <script>window._bd_share_config={"common":{"bdSnsKey":{},"bdText":"","bdMini":"2","bdMiniList":false,"bdPic":"","bdStyle":"1","bdSize":"16"},"share":{},"image":{"viewList":["qzone","tsina","tqq","renren","weixin"],"viewText":"分享到：","viewSize":"16"},"selectShare":{"bdContainerClass":null,"bdSelectMiniList":["qzone","tsina","tqq","renren","weixin"]}};with(document)0[(getElementsByTagName('head')[0]||body).appendChild(createElement('script')).src='http://bdimg.share.baidu.com/static/api/js/share.js?v=89860593.js?cdnversion='+~(-new Date()/36e5)];</script>
	  </ul>
	  <div class="commt_box">
		<?php blog_comments_post($logid,$ckname,$ckmail,$ckurl,$verifyCode,$allow_remark); ?>
		<?php blog_comments($comments); ?>
	  </div>
	</div>
	<?php include View::getView('side');?>
</div>
</div>
<?php include View::getView('footer');?>
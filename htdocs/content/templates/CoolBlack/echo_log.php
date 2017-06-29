<?php 
/**
 * 阅读文章页面
 */
if(!defined('EMLOG_ROOT')) {exit('error!');} 
?>
<div class="show">
	<div class="show_box">
     <!-- <h2><a href="<?php echo BLOG_URL; ?>" title="首页">首页</a> -->
	 <!-- <?php blog_sorts($logid); ?></h2> -->
	 <div>
	 	<i>您的位置：</i>
	 	<a href="<?php echo BLOG_URL; ?>" style="color: #00a2ca">
	 		<?php echo $blogname; ?>
	 	</a>
	 	<small>&gt;</small>
 		<?php blog_sorts($logid); ?>
	 	<small>&gt;</small>
	 	<?php echo $log_title; ?>
	 </div>
      <h1><?php echo $log_title; ?></h1>
      <p class="box">发布时间:<?php echo gmdate('20y年m月d日',$date); ?>
	  <span>评论数：<?php if($comnum):?><?php echo $comnum; ?><?php else:?>抢沙发<?php endif;?>
	  </span>
	  阅读数：<span id="hits" style="display:inline"><?php echo $views; ?></span>
	  </p>
      <ul>
	  <?php echo $log_content; ?>
	  <div class="bdsharebuttonbox"><a href="#" class="bds_more" data-cmd="more"></a><a href="#" class="bds_qzone" data-cmd="qzone" title="分享到QQ空间"></a><a href="#" class="bds_tsina" data-cmd="tsina" title="分享到新浪微博"></a><a href="#" class="bds_tqq" data-cmd="tqq" title="分享到腾讯微博"></a><a href="#" class="bds_renren" data-cmd="renren" title="分享到人人网"></a><a href="#" class="bds_weixin" data-cmd="weixin" title="分享到微信"></a></div>
	  <script>window._bd_share_config={"common":{"bdSnsKey":{},"bdText":"","bdMini":"2","bdMiniList":false,"bdPic":"","bdStyle":"1","bdSize":"16"},"share":{},"image":{"viewList":["qzone","tsina","tqq","renren","weixin"],"viewText":"分享到：","viewSize":"16"},"selectShare":{"bdContainerClass":null,"bdSelectMiniList":["qzone","tsina","tqq","renren","weixin"]}};with(document)0[(getElementsByTagName('head')[0]||body).appendChild(createElement('script')).src='http://bdimg.share.baidu.com/static/api/js/share.js?v=89860593.js?cdnversion='+~(-new Date()/36e5)];</script>
	  </ul>
	  <?php if(_g('banquan')==1): ?>
	<div id="banquan">
	<div class="tupian" title="这篇文章太棒了，赶快分享给你的小伙伴们吧！1、用手机扫二维码。2、点右上角分享到朋友圈。">
	<img src="http://qr.liantu.com/api.php?&bg=ffffff&w=100&m=6&fg=000000&text=<?php $url_this =  "http://".$_SERVER ['HTTP_HOST'].$_SERVER['REQUEST_URI'];echo $url_this; ?>" alt="二维码加载中..."></div>
	<div class="xinxi">
		<span class="zuozhe">本文作者：</span><?php blog_author($author); ?> &nbsp;&nbsp;&nbsp;&nbsp;
		<span class="biaoti2">文章标题：</span> <a href="<?php echo Url::log($logid); ?>"><?php echo $log_title; ?></a><br>
		<span class="blog_url">本文地址：</span><a href="<?php echo Url::log($logid); ?>"><?php echo Url::log($logid); ?></a><span>&nbsp;&nbsp;&nbsp;&nbsp<?php echo logurl($logid);?></span><br>
		<b>版权声明：</b>若无注明，本文皆为“<span class="blog_name"><?php echo $blogname; ?></span>”原创，转载请保留文章出处。
	</div>
	</div>
	<?php endif; ?>
	<?php if(_g('xiangguan')==1): ?>
	<div class="gxq"><div class="bti"><i class="fa fa-book"></i>&nbsp;<span class="chaffle" data-lang="zh">相关文章</span></div>
    <?php $Log_Model = new Log_Model();
			  $randlogs = $Log_Model->getLogsForHome("AND sortid = {$sortid} ORDER BY rand() DESC,date DESC", 1, 10);?>
	<ul>
	<?php foreach($randlogs as $value): ?>
	<li><a href="<?php echo $value['log_url']; ?>" title="<?php echo $value['log_title']; ?>" class="shake shake-little"><?php echo $value['log_title']; ?></a></li>
	<?php endforeach; ?>
	</ul>
	</div>
	<?php endif; ?>
	  <div class="commt_box">
		<?php blog_comments_post($logid,$ckname,$ckmail,$ckurl,$verifyCode,$allow_remark); ?>
		<?php blog_comments($comments); ?>
	  </div>
	  <div class="post-navigation">
          <?php neighbor_log($neighborLog); ?>
      </div>
	</div>
	<?php include View::getView('side');?>
</div>
</div>
<?php include View::getView('footer');?>
<?php 
/**
 * 站点首页
 */
if(!defined('EMLOG_ROOT')) {exit('error!');} 
?>
	<div class="show">
    <div class="list">
	<?php if (!empty($logs)): ?>
		<ul>
		<?php foreach($logs as $value): ?>
		<li>
        <div class="list_box">
          <div class="sj"></div>
          <div class="yu"></div>
          <h2><a href="<?php echo $value['log_url'];?>" target="_blank" title="<?php echo $value['log_title'];?>"><?php echo $value['log_title'];?></a></h2>
          <ul>
            <a href="<?php echo $value['log_url'];?>"><img src="<?php get_imgsrc($value['content']);?>"></a>
            <p><?php echo subString(DeleteHtml(strip_tags($value['content'])),0,174); //文章简述 ?></p>
          </ul>
          <ol>
          	<li>
          		<?php editflg($value['logid'],$value['author']); ?>
          	</li>
            <li class="likes"><a href="">阅读数：<?php echo $value['views'];?></a>
            	
            </li>
            <li class="comments"><a href="<?php echo $value['log_url'];?>">评论数：<?php echo $value['comnum'];?></a></li>
            <li class="icon-time"><a href="<?php echo $value['log_url'];?>"><?php echo gmdate('20y年n月j日H时', $value['date']);?></a></li>
          </ol>
        </div>
      </li>
		<?php endforeach;?>
		<?php else:?>
		<div class="show_box">
		<h2 style="padding: 20px 20px 20px 20px;color: #747474;font-size: 1.5em;border: none;">抱歉，没有符合您查询条件的结果。</h2>
		<div style="text-align:center;">
		<img src="http://i11.tietuku.com/1ca7f35089b24333.jpg" />
		</div></div>
		<?php endif;?>
		<div id="pagenavi">
		<?php echo $page_url;?>
		</div>
		</ul>
		</div>
<?php include View::getView('side');?>
</div>
</div>		
<?php include View::getView('footer');?>
<?php 
/**
 * 微语部分
 */
if(!defined('EMLOG_ROOT')) {exit('error!');} 
?>
<div class="show">
	<div class="list">  
		<div class="art_box">        
			<div class="tw">        
				<div class="plus"></div>        
				<div class="plus2"></div>        
				<ul class="archives-monthlisting"><?php foreach($tws as $val): $author = $user_cache[$val['author']]['name'];    $avatar = empty($user_cache[$val['author']]['avatar']) ?  BLOG_URL . 'admin/views/images/avatar.jpg' : BLOG_URL . $user_cache[$val['author']]['avatar']; $tid = (int)$val['id'];    $img = empty($val['img']) ? "" : '<a title="查看图片" href="'.BLOG_URL.str_replace('thum-', '', $val['img']).'" target="_blank"><img style="border: 1px solid #EFEFEF;" src="'.BLOG_URL.$val['img'].'"/></a>';    ?>         
					<li> 
						<em1></em1>            
						<div class="avatar" ><?php echo $val['date'];?></div>            
						<div class="tw-content"><em></em><?php echo $val['t'].'<br/>'.$img;?>              
						<div class="status-wall-meta"><span><?php echo $val['date'];?></span></div> </div> </li>  <?php endforeach;?>		<li id="pagenavi"><?php echo $pageurl;?></li> </ul>  </div></div></div><?php include View::getView('side');?></div></div><?php include View::getView('footer'); ?>


<?php if(!defined('EMLOG_ROOT')) {exit('error!');} ?>
<div class=containertitle><b>蜘蛛来访记录</b></div>
<div class=line></div>
<table width="100%" id="adm_link_list" class="item_list">
	<thead>
		<tr>
			<th width="50"><b>序号</b></th>
			<th width="80" class="tdcenter"><b>蜘蛛名称</b></th>
			<th width="255"><b>抓取链接</b></th>
			<th width="80" class="tdcenter"><b>来路IP</b></th>
			<th width="80"><b>来访时间</b></th>
		</tr>
	</thead>
	<tbody>
		<?php
		if($count['num']){
			while($data=$DB->fetch_array($query)){
		?>  
			<tr>
				<td><?php echo $data['id'];?></td>
				<td><?php echo $data['spidername'];?></td>
				<td><a href="<?php echo $data['url'];?>" target="_blank"><?php echo $data['url'];?></a></td>
				<td class="tdcenter"><?php echo $data['spiderip'];?></td>
				<td class="tdcenter"><?php echo date('Y-m-d H:i:s',$data['dateline']);?></td>
			</tr>
		<?php
			}
		}else{
			echo '<tr><td colspan="5">暂无记录，如果您刚刚启用本插件，请耐心等待一段时间再来查询！</tr></tr>';
		}
		?>
	</tbody>
</table>
<div class="page"><?php echo $pageurl; ?></div>
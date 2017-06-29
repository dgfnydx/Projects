<?php 
/**
 * 侧边栏
 */
if(!defined('EMLOG_ROOT')) {exit('error!');} 
?>
<aside>
<!-- <div>
	<h2>点拨人生</h2>
	<p style="color: #C4C4C4">
		<?php echo newSignletwiter(); ?>
	</p>
</div> -->
<?php 
$widgets = !empty($options_cache['widgets1']) ? unserialize($options_cache['widgets1']) : array();
doAction('diff_side');
foreach ($widgets as $val)
{
	$widget_title = @unserialize($options_cache['widget_title']);
	$custom_widget = @unserialize($options_cache['custom_widget']);
	if(strpos($val, 'custom_wg_') === 0)
	{
		$callback = 'widget_custom_text';
		if(function_exists($callback))
		{
			call_user_func($callback, htmlspecialchars($custom_widget[$val]['title']), $custom_widget[$val]['content']);
		}
	}else{
		$callback = 'widget_'.$val;
		if(function_exists($callback))
		{
			preg_match("/^.*\s\((.*)\)/", $widget_title[$val], $matchs);
			$wgTitle = isset($matchs[1]) ? $matchs[1] : $widget_title[$val];
			call_user_func($callback, htmlspecialchars($wgTitle));
		}
	}
}
?>
<!-- <div class="viny">
	<dl>
		<dt class="art">
			<img src="<?php echo TEMPLATE_URL; ?>image/artwork.png" alt="专辑">
		</dt>
		<dd class="icon-song"><span></span>卡农</dd>
		<dd class="icon-artist"><span></span>押尾光太郎</dd>
		<dd class="icon-album"><span></span>史上最优美的轻音乐</dd>
		<dd class="icon-like"><span></span><a href="#">喜欢</a></dd>
		<dd class="music">
		<audio src="http://m2.music.126.net/xZ2JDykHbE5c0sMgkNj-GQ==/3176489092708890.mp3" loop="10" autostart="true" controls=""></audio>
		</dd>
	</dl>
</div> -->
</aside>

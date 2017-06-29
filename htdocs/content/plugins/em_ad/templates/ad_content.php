<?php
$style = 'style="';
if (isset($ad_content['width'])) {
	$style .= 'width:'.$ad_content['width'].'px;';
}
if (isset($ad_content['height'])) {
	$style .= 'height:'.$ad_content['height'].'px;';
}
$style .= 'display:inline-block;'.$ad_content['extra_css'].'"';
?>
<div class="<?php is_numeric($position) && isset($GLOBALS['em_ad_position_classname'][$position]) && print $GLOBALS['em_ad_position_classname'][$position]?>" <?php echo $style?>>
<?php
if (!empty($ad_content['image']) && preg_match('/\.(jpg|jpeg|png|gif)$/', $ad_content['image']))
{
	?>
	<a href="<?php echo $ad_content['content'] ?>" target="_blank"><img src="<?php echo EM_AD_BLOG_PATH?>/content/plugins/em_ad/image/<?php echo $ad_content['image']?>" <?php echo $style .='"';?> /></a>
<?php } elseif (!empty($ad_content['image']) && preg_match('/\.swf$/', $ad_content['image'])) { ?>
	<?php 
	$width = $height = '';
	if (isset($ad_content['width'])) {
		$width = 'width="'.$ad_content['width'].'"';
	}
	if (isset($ad_content['height'])) {
		$height = 'height="'.$ad_content['width'].'"';
	}		
	?>
	<object <?php echo $width?> <?php echo $height?> codebase="http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=9,0,28,0" classid="clsid:D27CDB6E-AE6D-11cf-96B8-444553540000">
	<param value="<?php echo EM_AD_BLOG_PATH?>/content/plugins/em_ad/image/<?php echo $ad_content['image']?>" name="movie">
	<param value="high" name="quality">
	<param name="wmode" value="transparent">
	<param value="Always" name="allowScriptAccess">
	<embed <?php echo $width?> <?php echo $height?> type="application/x-shockwave-flash" pluginspage="http://www.adobe.com/shockwave/download/download.cgi?P1_Prod_Version=ShockwaveFlash" allowscriptaccess="Always" wmode="transparent" quality="high" src="<?php echo EM_AD_BLOG_PATH?>/content/plugins/em_ad/image/<?php echo $ad_content['image']?>">
	</object>
<?php } else { ?>
	<?php echo $ad_content['content'] ?>
<?php }?>
</div>	

<?php if(!defined('EMLOG_ROOT')) {exit('error!');} ?></div><div id="footer"><div id="foot">Copyright © 2014 <?php echo $blogname; ?> 版权所有 &nbsp; <?php echo $icp; ?><br /><?php echo $footer_info;sl();doAction('index_footer');?><div id="bq">Powered by <a href="http://www.emlog.net" title="采用emlog系统" target="_blank">emlog</a> &Designed By <a href="http://www.shuyong.net" title="舍力博客" target="_blank">舍力博客</a>.</div></div></div></body></html><?php $output = ob_get_clean();$output = preg_replace("|\[:([^#]+)#(\d+):\]|i",'<img border="0" src="' . TEMPLATE_URL . 'images/face/$1/$2.gif" />',$output);ob_start();echo $output;?>
<?php
/*@support tpl_options*/
!defined('EMLOG_ROOT') && exit('access deined!');
$options = array(

'on-off' => array(
'type' => 'checkbox',
'name' => '站点功能开关',
'description' =>'打勾表示显示，默认显示部分(不选则不显示)',
'values' => array(
'flash' => '首页幻灯片',
'home_ad' => '首页导航下广告',
'home_ad1' => '首页最新或置顶文章上面广告位',
'home_ad2' => '首页最新或置顶文章下面广告位',
'zdlog' => '首页置顶文章',
'newlog' => '首页最新文章',
'daohang' => '文章页网站导航',
'top' => '返回顶部图标',
'next' => '站点左右翻页',
'bqkg' => '复制文章内容时加版权信息',
'xg-logs' => '文章页相关文章',
'pl-log' => '文章页评论',
'pl-page' => '页面评论',
'sbkk' => '随便看看',
'log-dhg' => '文章也读后感表情',
'ny-links' => '内页友链(友链隐藏时显示在内页)',
),
'default' => array(
'newlog',
'top',
'next',
'xg-logs',
'flash',
'pl-log',
'pl-page',
'sbkk',
),
),

'opentime' => array(
'type' =>'text',
'name' =>'建站时间',
'default' =>'2014-07-11',
),

'blog-cbl' => array(
'type' =>'radio',
'name' =>'侧边栏位置',
'values' => array(
'left' =>'居左',
'right' =>'居右',
),
'default' =>'left',
),

'logo' => array(
'type' =>'image',
'name' =>'头部LOGO',
'values' => array(TEMPLATE_URL .
'images/logo.png',
),
'description' =>'设置站点头部LOGO,250X60最佳。',
),

'logo-kg' => array(
'type' =>'radio',
'name' =>'logo显示方式',
'values' => array(
'tp' =>'图片显示(300X60px最佳)',
'wz' =>'文字显示(最多显示6个字)',
),
'default' =>'wz',
),

'topnav' => array(
'type' =>'text',
'name' =>'网站顶部文字',
'description' =>'可用html代码格式书写',
'multi' => true,
'default' =>'<font color=#ff0000>公告</font>：你正在使用由舍力制作的蓝色经典主题模板，更多相关说明请进入<a href="http://www.shuyong.net/432.html" title="[Emlog模板]蓝色经典主题 - 响应式">[Emlog模板]蓝色经典主题 - 响应式</a>查看',
),

'logo-url' => array(
'type' =>'text',
'name' =>'logo右侧',
'multi' => true,
'default' =>'
<a href="about.html" title="关于我">关于我</a><a href="contact.html" title="联系我">联系我</a><a href="sitemap.xml" title="网站地图">网站地图</a>',
),

'img' => array(
'type' =>'radio',
'name' =>'文章缩略图调用方式',
'values' => array(
'zwimg' =>'正文图片(无图片随机显示)',
'fjimg' =>'附件图片(无图片随机显示)',
'wuimg' =>'正文图片(无图片自定义代码)',
),
'default' =>'zwimg',
),

'img_ad' => array(
'type' =>'text',
'name' =>'文章无缩略图显示广告',
'multi' => true,
'description' =>'不填则不显示，可以使用html代码',
'default' =>'<script type="text/javascript">img_ad()</script>',
),

'newlog_mun' => array(
'type' =>'text',
'name' =>'首页最新日志/置顶数量',
'description' =>'"0"为不显示',
'default' =>'8',
),

'sortlog_mun' => array(
'type' =>'text',
'name' =>'首页分类日志数量',
'default' =>'10',
),

'sortlog_id' => array(
'type' =>'sort',
'name' =>'分类日志ID',
'description' =>'"不选"为不显示,排序请在分类中进行',
'multi' =>'true',
),

'flash_ad' => array(
'type' =>'text',
'name' =>'首页幻灯片上广告',
'multi' => true,
'description' =>'不填则不显示，建议建议参考下面示例修改，图片尺寸760*300px',
'default' =>'<li><a href="http://www.shuyong.net/432.html" title="[Emlog模板]蓝色经典主题 - 响应式" ><img src="http://www.shuyong.net/content/uploadfile/201409/66571411196547.jpg" alt="[Emlog模板]蓝色经典主题" border="0" /></a></li>',
),

'log_ad' => array(
'type' =>'text',
'name' =>'文章和页面内容广告',
'multi' => true,
'description' =>'不填则不显示，建议参考下面示例修改',
'default' =>'<br><div id="baidu"><center><script type="text/javascript">
    var cpro_id = "u1800627";
</script>
<script src="http://cpro.baidustatic.com/cpro/ui/c.js" type="text/javascript"></script>
</center></div>',
),

'log_ad-kg' => array(
'type' =>'radio',
'name' =>'文章和页面内容广告显示方式',
'values' => array(
'top' =>'文章内容头部',
'bottom' =>'文章内容底部',
),
'default' =>'top',
),

'm_nav' => array(
'type' =>'text',
'name' =>'手机访问导航显示',
'multi' => true,
'description' =>'不填则不显示，建议参考下面示例修改',
'default' =>'<a href="/" title="首页">首页</a><a href="网址链接" title="信息标题">信息标题</a>',
),

'home_ad' => array(
'type' =>'text',
'name' =>'首页导航下广告',
'multi' => true,
'description' =>'不填则不显示，建议参考下面示例修改',
'default' =>'<li><a href="http://www.shuyong.net/432.html">蓝色经典主题 - 响应式</a></li><li><a href="http://www.shuyong.net/325.html" title="信息标题">卢松松博客主题，加入一些新鲜元素</a></li><li><a href="http://www.shuyong.net/tougao.html" >投稿舍力博客，让更多人了解你</a></li><li><a href="http://www.shuyong.net/guidang.html" >舍力博客时间轴归档</a></li><li><a href="http://www.shuyong.net/links.html" >Emlog博客大全</a></li><li><a href="http://www.shuyong.net/contact.html" >仿站、模版购买请联系舍力</a></li>',
),

'home_ad1' => array(
'type' =>'text',
'name' =>'首页最新文章或置顶文章下广告',
'multi' => true,
'description' =>'不填则不显示，建议参考下面示例修改',
'default' =>'<li><a href="http://www.shuyong.net/564.html">SheLiCms主题发布 响应式主题模板</a></li><li><a href="http://www.shuyong.net/489.html">响应式模板sheli-1030</a></li>
<li><a href="http://www.shuyong.net/325.html">卢松松博客主题，加入一些新鲜元素</a></li><li><a href="http://www.shuyong.net/432.html">蓝色经典主题 - 响应式</li></a><li><a href="http://www.shuyong.net/480.html">]自适应设计主题 sheli-1028</a></li><li><a href="http://www.shuyong.net/473.html">自适应简单主题 - 3L主题模板</a></li>',
),

'home_ad2' => array(
'type' =>'text',
'name' =>'首页最新文章或置顶文章下广告',
'multi' => true,
'description' =>'不填则不显示，建议参考下面示例修改',
'default' =>'<li><a href="http://www.shuyong.net/447.html">sheli-926主题发布 响应式主题模板</a></li><li><a href="http://www.shuyong.net/489.html">响应式模板sheli-1030</a></li>
<li><a href="http://www.shuyong.net/325.html">卢松松博客主题，加入一些新鲜元素</a></li><li><a href="http://www.shuyong.net/432.html">蓝色经典主题 - 响应式</li></a><li><a href="http://www.shuyong.net/480.html">自适应设计主题 sheli-1028</a></li><li><a href="http://www.shuyong.net/473.html">自适应简单主题 - 3L主题模板</a></li>',
),

'comt' => array(
'type' =>'text',
'name' =>'返回顶部留言板',
'default' =>'#',
),

'nav_ys' => array(
'type' =>'text',
'name' =>'导航颜色',
'description' =>'直接填写颜色代码(不填则是白色，下同)，>><a href="http://www.shuyong.net/go/color.html" target="_blank">颜色选择器<<</a>',
'default' =>'#04a4cc',
),
'body_ys' => array(
'type' =>'text',
'name' =>'背景颜色',
'default' =>'#F0FFFF',
),

'nav_ys' => array(
'type' =>'text',
'name' =>'导航颜色',
'description' =>'直接填写颜色代码(不填则是白色，下同)，>><a href="http://www.shuyong.net/go/color.html" target="_blank">颜色选择器<<</a>',
'default' =>'#04a4cc',
),

'wzk_ys' => array(
'type' =>'text',
'name' =>'文字框背景颜色',
'default' =>'#fff',
),

);
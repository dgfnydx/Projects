<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title></title>
    <link rel="icon" href="../images/logo-icon.png"type="image/x-icon">
    <link rel="stylesheet" href="../css/reset.css" type="text/css">
    <link rel="stylesheet" href="../css/common.css" type="text/css">
    <link rel="stylesheet" href="../css/personal_style.css" type="text/css">
</head>
<body>
   	<div class="wrap">
        <?php
            include("head.html");
        ?>
		<div class="main">
            <div class="htl-myf-main">
                <div class="htl-myf-tit clearfix">
                    <div class="htl-myf-myf">
                        <span>我的粉丝</span>
                        <em>（1235）</em>
                    </div>
                    <div class="htl-myf-about">
                        <span>我的关注</span>
                        <em>（1235）</em>
                    </div>
                    <div class="htl-myf-search">
                        <input type="text" value="输入昵称或备注">
                        <span></span>
                    </div>   
                    <div class="htl-myf-allSort clearfix">
                        <div class="htl-myf-plgz">批量关注</div>
                        <div class="htl-myf-fgx">|</div>
                        <div class="htl-myf-sort">排序</div>  
                        <ul class="htl-myf-sort-con">
                            <li>加入关注</li>
                            <li>移出粉丝</li>
                            <li>私信</li>
                            <li>举报</li>
                        </ul>
                    </div>
                </div>
                <div class="htl-myf-nobody">
                    <span>
                        ( ⊙ o ⊙ )！矮油，你还没有粉丝， <a href="" title="">邀请</a> 你的好友来爱叮叮玩吧~
                    </span>
                </div>
            </div>      
        </div>
		<?php
			include("foot.html");
		?>
   	</div>
    <script charset="utf-8" src="../js/jquery-1.11.3.min.js" type="text/javascript"></script>
    <script charset="utf-8" src="../js/common.js" type="text/javascript"></script>
     <script charset="utf-8" src="../js/other.js" type="text/javascript"></script>
</body>
</html>
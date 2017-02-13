<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title></title>
    <link rel="icon" href="../images/logo-icon.png"type="image/x-icon">
    <link rel="stylesheet" href="../css/reset.css" type="text/css">
    <link rel="stylesheet" href="../css/common.css" type="text/css">
    <link rel="stylesheet" type="text/css" href="../css/other.css" />
</head>
<body>
   	<div class="wrap">
        <?php
            include("head.html");
        ?>
		<div class="main">
            <div class="customization-zfx">
                <div class="cut-zfx">
                    <span class="cut-sel">图片</span>
                    <span>文字</span>
                </div>
                <div class="effects-zfx">
                    <div class="character-zfx">
                    <!-- 输入文字内容 -->
                        <div class="option-zfx">
                            <strong>文字</strong><br />
                            <input type="" value="请输入文字内容"  class="htl-font-fml" />
                        </div>
                        <!-- 字体库 -->
                        <div class="typeface-zfx">
                            <strong>字体</strong>
                            <div class="fontlib-zfx clearfix">
                                <ul>
                                    <li>
                                        <div>
                                            <em></em>
                                        </div>
                                        <span>微软雅黑</span>
                                    </li>
                                    <li>
                                        <div>
                                            <em></em>
                                        </div>
                                        <span>宋体</span>
                                    </li>
                                    <li>
                                        <div>
                                            <em></em>
                                        </div>
                                        <span>黑体</span>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <!-- 字体大小 -->
                        <div class="bigmall-zfx">
                            <span>大小</span><br />
                            <div class="font-size-zfx">
                                <div class="htl-indiv-fonts">选择字体大小</div>
                                <ul class="htl-font-size">
                                    <li>12</li>
                                    <li>16</li>
                                    <li>20</li>
                                    <li>26</li>
                                </ul>
                            </div>
                        </div>
                        <!-- 颜色库 -->
                        <div class="font-color-zfx">
                            <span>颜色</span><br />
                            <div class="color-warehouse-zfx">
                                <div class="htl-indiv-ys">选择颜色</div>
                                <ul class="htl-font-color">
                                    <li>红色</li>
                                    <li>绿色</li>
                                    <li>蓝色</li>
                                </ul>
                            </div>
                        </div>
                        <div class="use-zfx">
                            <span>应用</span>
                        </div> 
                    </div>
                    <div class="uploading-zfx">
                        <div class="upload-pictures-zfx">
                            <input type="file" value="上传图片"  class="htl-upload-ys" />
                            <!-- 上传图片 -->
                            <span class="htl-upload">上传图片</span>
                            <em class="htl-upload-empty"></em>
                        </div>
                        <div class="frame-zfx">
                            <div><img src="../images/logo_app.jpg" alt="" /></div>
                            <div><img src="../images/logo_app.jpg" alt="" /></div>
                            <div><img src="../images/logo_app.jpg" alt="" /></div>
                            <div><img src="../images/logo_app.jpg" alt="" /></div>
                            <div><img src="../images/logo_app.jpg" alt="" /></div>
                            <div><img src="../images/logo_app.jpg" alt="" /></div>
                            <div><img src="../images/logo_app.jpg" alt="" /></div>
                            <div><img src="../images/logo_app.jpg" alt="" /></div>
                            <div><img src="../images/logo_app.jpg" alt="" /></div>
                            <div><img src="../images/logo_app.jpg" alt="" /></div>
                            <div><img src="../images/logo_app.jpg" alt="" /></div>
                            <div><img src="../images/logo_app.jpg" alt="" /></div>
                        </div>
                    </div>
                </div>   
            </div> 
           <!--  大图TAB切换  -->
            <div class="tab-zfx">
                <div class="front-zfx clearfix">
                   <img src="../images/htl/yf1.png" alt="" class="sel-zfx" />
                   <img src="../images/htl/yf2.png" alt="" />
                </div>
                <div class="sided-zfx" id="sidTab-zfx">
                   <span class="sel-zfx">正面</span>
                   <span>反面</span>
                </div>
                <p>
                    温馨提示：请将图文的尺寸控制在文本编译框内
                </p>
                <div class="htl-indiv-write" id="htl-indiv-write">
                    <div class="htl-indiv-wCon" id="htl-indiv-wCon">
                        <div class="htl-write-t" id="htl-write-t"></div>
                        <div class="htl-write-move"></div>
                        <div class="htl-write-del"></div>
                    </div>                    
                </div>
            </div> 
            <!-- 款式选择 -->
            <div class="style-select-zfx">
                <div class="elect-zfx">
                    <strong>款式选择</strong>
                </div>
                <div class="shell-zfx">
                    <div class="htl-indiv-ljxz">选择样式</div>
                    <ul class="htl-indiv-lj">
                        <li>衣服</li>
                        <li>手机</li>
                        <li>包包</li>
                    </ul>
                </div>
                <div class="htl-tabwrap">
                    <!-- 衣服的结构-->
                    <div class="htl-clothes">
                        <div class="htl-clo-par">
                            <div class="htl-clo-sz">普通T恤</div>
                            <ul class="htl-clo-con">
                                <li>普通T恤</li>
                                <li>衬衫</li>
                                <li>外套</li>
                            </ul>
                        </div>
                        <!-- 三件商品 -->
                        <div class="htl-col-sp">
                            <dl class="htl-col-all clearfix">
                            <dt>
                                <img src="../images/demo/55.png" alt="">
                            </dt>
                            <dd>圆领短袖T恤</dd>
                            </dl>
                            <dl class="htl-col-all clearfix">
                                <dt>
                                    <img src="../images/demo/55.png" alt="">
                                </dt>
                                <dd>圆领短袖T恤</dd>
                            </dl>
                            <dl class="htl-col-all clearfix">
                                <dt>
                                    <img src="../images/demo/55.png" alt="">
                                </dt>
                                <dd>圆领短袖T恤</dd>
                            </dl>
                        </div>                   
                        <div class="htl-col-cmys clearfix">
                            <div class="htl-col-cm">纯棉</div>
                            <div class="htl-col-ys">灰色</div>
                            <ul class="htl-col-xlcm"> 
                                <li>111</li>
                                <li>222</li>
                                <li>333</li>                            
                            </ul>
                            <ul class="htl-col-xlys">
                                <li>红色</li>
                                <li>绿色</li>
                                <li>蓝色</li>
                            </ul>
                        </div>
                        <div class="htl-col-sexs clearfix">
                            <div class="htl-col-sex">男</div>
                            <div class="htl-col-size">XL</div>
                            <ul class="htl-col-sexnl"> 
                                <li>男</li>
                                <li>女</li>                            
                            </ul>
                            <ul class="htl-col-sizenl"> 
                                <li>M</li>
                                <li>L</li>
                                <li>XL</li> 
                                <li>XXL</li>                           
                            </ul>
                        </div>
                    </div>
                    <!-- 手机结构 -->
                    <div class="htl-sj">
                        <div class="phone-htl clearfix">
                            <div class="htl-ph-sel">iphone</div>
                            <div class="htl-ph-jxsel">6s</div>
                            <ul class="htl-ph-con">
                                <li>iphone</li>
                                <li>华为</li>
                                <li>三星</li>
                            </ul>
                            <ul class="htl-ph-jxcon">
                                <li>6s</li>
                                <li>5s</li>
                                <li>4s</li>
                            </ul>
                        </div>
                        <!-- 手机商品 -->
                        <div class="htl-ph-sp">
                            <dl class="htl-ph-all clearfix">
                                <dt>
                                    <img src="../images/demo/55.png" alt="">
                                </dt>
                                <dd>翻盖保护套</dd>
                            </dl>
                            <dl class="htl-ph-all clearfix">
                                <dt>
                                    <img src="../images/demo/55.png" alt="">
                                </dt>
                                <dd>后盖式</dd>
                            </dl>
                            <dl class="htl-ph-all clearfix">
                                <dt>
                                    <img src="../images/demo/55.png" alt="">
                                </dt>
                                <dd>普通保护壳</dd>
                            </dl>
                            <dl class="htl-ph-all clearfix">
                                <dt>
                                    <img src="../images/demo/55.png" alt="">
                                </dt>
                                <dd>边框式</dd>
                            </dl>
                        </div> 
                        <div class="htl-ph-choose clearfix">
                            <div class="htl-ph-clsel">金属</div>
                            <div class="htl-ph-ys">灰色</div>
                            <ul class="htl-hp-clcon">
                                <li>金属</li>
                                <li>金属2</li>
                                <li>金属3</li>
                            </ul>
                            <ul class="htl-ph-yscon">
                                <li>灰色</li>
                                <li>灰色2</li>
                                <li>灰色3</li>
                            </ul>
                        </div>
                    </div>  
                    <!-- 包包的结构 -->
                    <div class="htl-bg">
                        <div class="htl-bg-par">
                            <div class="htl-bg-sz">横款</div>
                            <ul class="htl-bg-con">
                                <li>斜跨</li>
                                <li>双肩包</li>
                                <li>单肩包</li>
                            </ul>
                        </div>
                        <!-- 包包 -->
                        <div class="htl-bg-sp">
                            <dl class="htl-bg-all clearfix">
                                <dt>
                                    <img src="../images/demo/55.png" alt="">
                                </dt>
                                <dd>手提包</dd>
                            </dl>
                            <dl class="htl-bg-all clearfix">
                                <dt>
                                    <img src="../images/demo/55.png" alt="">
                                </dt>
                                <dd>手提包</dd>
                            </dl>
                            <dl class="htl-bg-all clearfix">
                                <dt>
                                    <img src="../images/demo/55.png" alt="">
                                </dt>
                                <dd>手提包</dd>
                            </dl>
                            <dl class="htl-bg-all clearfix">
                                <dt>
                                    <img src="../images/demo/55.png" alt="">
                                </dt>
                                <dd>手提包</dd>
                            </dl>
                        </div> 
                        <div class="htl-bg-cl clearfix">
                            <div class="htl-bg-clbl">帆布</div>
                            <div class="htl-bg-ys">灰色</div>
                            <ul class="htl-bg-clbl-con">
                                <li>帆布</li>
                                <li>帆布2</li>
                                <li>帆布3</li>
                            </ul>
                            <ul class="htl-bg-ys-con">
                                <li>灰色</li>
                                <li>灰色2</li>
                                <li>灰色3</li>
                            </ul>
                        </div>                    
                    </div>
                </div>
                <div class="number-zfx clearfix">
                    <div>数量</div> 
                    <div class="htl-number-xz">1</div>   
                    <ul class="htl-num-con">
                        <li>1</li>
                        <li>2</li>
                        <li>3</li>
                        <li>4</li>
                    </ul> 
                </div>
                <div class="rmb-zfx">
                    <strong>价格</strong>
                    <span>￥36.0</span>
                </div>
                <div class="join-zfx">
                    <p>加入购物车</p>
                </div>
            </div>
            <!-- 定制服务 -->
            <div class="htl-indiv-foot clearfix">
                <div class="htl-indiv-footT">定制服务流程</div>
                <div>    
                    <dl>
                        <dt>
                            <a href="" title="">
                            </a>
                        </dt>
                        <dd class="htl-indiv-dd">
                            <div><a href="" title="">款式选择</a></div>
                            <p>选择你需要的衣服款式和颜色</p>
                        </dd>
                    </dl>
                    <div class="htl-indiv-xia"></div>
                    <dl>
                        <dt>
                            <a href="" title="">
                            </a>
                        </dt>
                        <dd class="htl-indiv-dd">
                            <div><a href="" title="">款式选择</a></div>
                            <p>选择你需要的衣服款式和颜色</p>
                        </dd>
                    </dl>
                    <div class="htl-indiv-xia"></div>
                    <dl>
                        <dt>
                            <a href="" title="">
                            </a>
                        </dt>
                        <dd class="htl-indiv-dd">
                            <div><a href="" title="">款式选择</a></div>
                            <p>选择你需要的衣服款式和颜色</p>
                        </dd>
                    </dl>
                    <div class="htl-indiv-xia"></div>
                    <dl>
                        <dt>
                            <a href="" title="">
                            </a>
                        </dt>
                        <dd class="htl-indiv-dd">
                            <div><a href="" title="">款式选择</a></div>
                            <p>选择你需要的衣服款式和颜色</p>
                        </dd>
                    </dl>
                    <div class="htl-indiv-xia"></div>
                    <dl>
                        <dt>
                            <a href="" title="">
                            </a>
                        </dt>
                        <dd class="htl-indiv-dd">
                            <div><a href="" title="">款式选择</a></div>
                            <p>选择你需要的衣服款式和颜色</p>
                        </dd>
                    </dl>
                    <div class="htl-indiv-xia"></div>
                    <dl>
                        <dt>
                            <a href="" title="">
                            </a>
                        </dt>
                        <dd class="htl-indiv-dd">
                            <div><a href="" title="">款式选择</a></div>
                            <p>选择你需要的衣服款式和颜色</p>
                        </dd>
                    </dl>
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
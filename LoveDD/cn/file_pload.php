<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title></title>
    <link rel="icon" href="../images/logo-icon.png"type="image/x-icon">
    <link rel="stylesheet" href="../css/reset.css" type="text/css">
    <link rel="stylesheet" href="../css/common.css" type="text/css">
    <link rel="stylesheet" href="../css/other.css" type="text/css">
</head>
<body>
   	<div class="wrap">
        <?php
            include("head.html");
        ?>
        <div class="fileupoad-tit">
            <div class="dgf-file clearfix">
                <span class="select-btn">作品上传</span>
                <span>商品上传</span>
                <em></em>
            </div>
        </div>
		<div class="main">
            <div class="file-wrap">
                <div class="fileupoad-content hide-fileupload">
                    <p>Hi，<span>xdx434</span>，请确认您拥有该作品的版权；带有<i>*</i>  的项目是必填的哦</p>
                    <form action="">
                        <div class="all-rows trade-name">
                            <label for="">商品名称<i>*</i></label>
                            <div>
                                <input type="text" maxlength="20">
                            </div>
                            <b></b>
                            <em>还可以输入<span>20</span>字</em>
                        </div>
                        <div class="all-rows goods-class">
                            <label for="">商品分类<i>*</i></label>
                            <div class="first-kind">漫画</div>
                            <div class="second-kind">卡通</div>
                            <ul class="firkind-li">
                                <li>国画</li>
                                <li>水彩</li>
                                <li>素描</li>
                            </ul>
                            <ul class="seckind-li">
                                <li>山水</li>
                                <li>田园</li>
                                <li>花鸟</li>
                            </ul>
                        </div>
                        <div class="all-rows goods-value" >
                            <label for="">商品定价<i>*</i></label>  
                            <div>
                                <input type="text">
                            </div>
                            <b></b>
                            <em>请仔细阅读<a href="" title="">定价说明</a></em>
                        </div>
                        <div class="description">
                            <label for="">设计说明<i>*</i></label>
                            <div class="descr clearfix">
                                <textarea name="" id="" cols="30" rows="10" maxlength="200" onpropertychange="if(value.length>200) value = value.substr(0,200)"></textarea>
                            </div>
                            <em>还能输入<span>200</span>字</em>
                        </div>
                        <div class="all-rows style-select">
                            <label for="">款式选择<i>*</i></label>
                            <div>手机</div>
                            <div>小米</div>
                            <div>NOTE</div>
                            <div>翻盖式</div>
                            <div>硅胶</div>
                            <ul class=sel-list1>
                                <li>手机</li>
                                <li>衬衫</li>
                                <li>T恤</li>
                            </ul>
                            <ul class=sel-list2>
                                <li>华为</li>
                                <li>苹果</li>
                                <li>小米</li>
                            </ul>
                            <ul class=sel-list3>
                                <li>5</li>
                                <li>5s</li>
                                <li>6</li>
                            </ul>
                            <ul class=sel-list4>
                                <li>翻盖</li>
                                <li>触屏</li>
                                <li>按键</li>
                            </ul>
                            <ul class=sel-list5>
                                <li>硅胶</li>
                                <li>塑料</li>
                                <li>金属</li>
                            </ul>
                        </div>
                        <div class="all-rows goods-upload">
                            <label for="">上传商品<i>*</i></label>
                            <label for="dload-temp" class="goods-download">下载模板</label>
                            <input type="file" name="dload-temp" id="dload-temp">
                            <em>小提示：下载商品订制模板</em>
                        </div>
                        <div class="upload-img clearfix">
                            <div class="upload-commodity">
                                <div>
                                    <img src="" alt="">
                                </div>
                                <div>+</div>
                            </div>
                            <em>小提示：请上传正面和反面商品图片</em>
                        </div>
                        <div class="upload-img clearfix">
                            <div class="upload-material">
                                <div>
                                    <img src="" alt="">
                                </div>
                                <div>+</div>
                            </div>
                            <em>小提示：请上传相对应的正面和反面商品素材，请选择清晰度高的PNG格式的图片，最大不超过5M</em>
                        </div>
                        <div class="upload-finish clearfix">
                            <em>请阅读并同意<a href="">《爱叮叮作品上传说明》*</a></em>
                            <strong>完成</strong>
                        </div>
                    </form>
                </div>
                <div class="fileupoad-content">
                    <p>Hi，<span>xdx434</span>，请确认您拥有该作品的版权；带有<i>*</i>  的项目是必填的哦</p>
                    <form action="">
                        <div class="all-rows trade-name">
                            <label for="">作品名称<i>*</i></label>
                            <div>
                                <input type="text" maxlength="20">
                            </div>
                            <b></b>
                            <em>还可以输入<span>20</span>字</em>
                        </div>
                        <div class="all-rows goods-class">
                            <label for="">作品分类<i>*</i></label>
                            <div class="first-kind">漫画</div>
                            <div class="second-kind">卡通</div>
                            <ul class="firkind-li">
                                <li>国画</li>
                                <li>水彩</li>
                                <li>素描</li>
                            </ul>
                            <ul class="seckind-li">
                                <li>山水</li>
                                <li>田园</li>
                                <li>花鸟</li>
                            </ul>
                        </div>
                        <div class="all-rows goods-upload">
                            <label for="">上传图片<i>*</i></label>
                            <label for="upload-pic" class="goods-download">选择图片</label>
                            <input type="file" name="upload-pic" id="upload-pic">
                            <em>小提示：请尽量选择清晰度高的PNG格式图片，最大不超过5M，最多可上传8张图片。</em>
                        </div>
                        <div class="production-lis">
                            <dl class="clearfix cc">
                                <dt>
                                    <img src="" alt="">
                                </dt>
                                <dd class="content-area">
                                    <div class="design-name">
                                        <input type="text" name="" placeholder="作品名称">
                                        <b></b>
                                    </div>
                                    <div class="design-explain">
                                        <textarea name="" id="" cols="30" rows="10" placeholder="设计说明"></textarea>
                                    </div>
                                </dd>
                                <dd class="btn-area">
                                    <span class="del-btn"></span>
                                    <span class="up-btn"></span>
                                    <span class="down-btn"></span>
                                </dd>
                            </dl>
                            <dl class="clearfix dd">
                                <dt>
                                    <img src="" alt="">
                                </dt>
                                <dd class="content-area">
                                    <div class="design-name">
                                        <input type="text" name="" placeholder="作品名称">
                                        <b></b>
                                    </div>
                                    <div class="design-explain">
                                        <textarea name="" id="" cols="30" rows="10" placeholder="设计说明"></textarea>
                                    </div>
                                </dd>
                                <dd class="btn-area">
                                    <span class="del-btn"></span>
                                    <span class="up-btn"></span>
                                    <span class="down-btn"></span>
                                </dd>
                            </dl>
                            <dl class="clearfix">
                                <dt>
                                    <img src="" alt="">
                                </dt>
                                <dd class="content-area">
                                    <div class="design-name">
                                        <input type="text" name="" placeholder="作品名称">
                                        <b></b>
                                    </div>
                                    <div class="design-explain">
                                        <textarea name="" id="" cols="30" rows="10" placeholder="设计说明"></textarea>
                                    </div>
                                </dd>
                                <dd class="btn-area">
                                    <span class="del-btn"></span>
                                    <span class="up-btn"></span>
                                    <span class="down-btn"></span>
                                </dd>
                            </dl>
                        </div>
                        <div class="upload-finish clearfix">
                            <em class="prod-text">请阅读并同意<a href="">《爱叮叮作品上传说明》*</a></em>
                            <strong>完成</strong>
                        </div>
                    </form>
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
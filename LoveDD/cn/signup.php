<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <title></title>
    <link rel="icon" href="../images/logo-icon.png"type="image/x-icon">
    <link rel="stylesheet" href="../css/reset.css" type="text/css">
    <link rel="stylesheet" href="../css/common.css" type="text/css">
    <link rel="stylesheet" type="text/css" href="../css/login.css" />
</head>
<body>
    <div class="wrap">
        <?php
            include("head.html");
        ?>
        <div class="main">
            <div class="outer">
                <div class="sign">
                    <h1>注&nbsp册</h1>
                    <div class="uselovedd clearfix">
                        <h2>
                            <strong>使用爱叮叮账号注册</strong>
                            <span>已有账号？</span>
                            <a href="signin.php">登陆</a>
                        </h2>
                        <div class="write">
                            <input type="text" class="tel" placeholder="请输入手机号"/>
                            <i></i>
                            <input type="text" class="confirm" placeholder="请输入验证码"/>
                            <em>获取验证码</em>
                            <input type="password" class="keyword" placeholder="请输入密码"/>
                            <i></i>
                            <!-- b用于插入提示文本 -->
                            <b></b>
                            <div class="agree">
                                <p>
                                    <strong class="choose"></strong>
                                    <span>我已阅读并同意遵守</span>
                                    <a href="#">法律声明</a>
                                    <span>和</span>
                                    <a href="#">隐私条款</a>
                                </p>
                                <span class="submit"></span>
                            </div>     
                        </div>
                    </div>
                    <div class="useother clearfix">
                        <h2>
                            <strong>使用第三方账号注册</strong>
                        </h2>
                        <div class="otherup">
                            <dl>
                                <dt>
                                    <a href="#">
                                        <img src="../images/icon_wechat.png" alt="" />
                                    </a>
                                </dt>
                                <dd>
                                    <p>微信</p>
                                </dd>
                            </dl>
                            <dl>
                                <dt>
                                    <a href="#">
                                        <img src="../images/icon_weibo.png" alt="" />
                                    </a>
                                </dt>
                                <dd>
                                    <p>新浪微博</p>
                                </dd>
                            </dl>
                            <dl>
                                <dt>
                                    <a href="#">
                                        <img src="../images/icon_QQ.png" alt="" />
                                    </a>
                                </dt>
                                <dd>
                                    <p>QQ</p>
                                </dd>
                            </dl>
                        </div> 
                    </div>
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
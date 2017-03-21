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
   	<div class="wrap" id="shop">
        <?php
            include("head.html");
        ?>
		<div class="main clearfix">
            <div class="htl-shop-statePic"></div>
            <h1 class="htl-shop-h1">
                <em>| 购物车</em>
                <span>
                    | &nbsp;请在<strong>08分31</strong>秒内提交订单，下单后你另有 30 分钟的支付时间。
                </span>
            </h1> 
            <!-- 商品 -->
            <!-- 商品标题 -->
            <div class="htl-shopc-tit clearfix">
                <div class="htl-shopc-sp clearfix">
                    <span class="htlspan" v-bind:class="{'htlSelect':selectAll}" v-on:click="selected()"></span>
                    <em>商品</em>
                </div>
                <div class="htl-shopc-czxx clearfix">
                    <span class="htl-shopc-cz-dj">单价</span>
                    <span class="htl-shopc-cz-num">数量</span>
                    <span class="htl-shopc-cz-xj">小计</span>
                    <span class="htl-shopc-cz-do">操作</span>
                </div>
            </div>
            <!-- 所有商品内容 -->
            <div class="htl-shopc-con-all" v-for="good in goods">
                <div class="htl-shopc-con clearfix">
                    <div class="htl-shopc-sel" v-bind:class="{'htlSelect':good.htlSelect}" v-on:click="selGood(good)"></div>
                    <dl class="htl-shopc-cons clearfix">
                        <dt>
                            <a href="" :title="good.name">
                                <img :src="good.picture" :alt="good.name">
                            </a>
                        </dt>
                        <dd class="clearfix">
                            <div class="htl-shopc-mes">
                                <div>{{good.name}}</div>
                                <div>颜色：{{good.color}}</div>
                                <div>尺码：{{good.size}}</div>
                                <div>数量：{{good.count}}</div>
                            </div>
                            <div class="htl-shopc-cons-cz">
                                <div class="htl-shopc-cons-ad">收藏</div>
                                <div class="htl-shopc-cons-del" v-on:click="delconfig(good)">删除</div>
                            </div>
                            <div class="htl-shopc-cons-sj">{{good.unitPrice*good.count | formatMoney("元")}}</div>
                            <div class="htl-shopc-cons-num clearfix">
                                <div class="htl-shopc-cons-num-btn">
                                    <span class="htl-shopc-jj" v-on:click="changeCount(good, -1)">-</span>     
                                    <input class="htl-shopc-shuz" v-model="good.count">
                                    <span class="htl-shopc-add" @click="changeCount(good, 1)">+</span>
                                </div>
                                           
                            </div>
                            <div class="htl-shopc-cons-dj">{{good.unitPrice | formatMoney("元")}}</div>
                        </dd>
                    </dl>
                </div>    
            </div>   
            <!-- 使用优惠券按钮和页码 -->
            <div class="htl-shopc-syym clearfix">
                <div class="htl-shopc-syyhq" v-on:click="showuh=!showuh">使用卡优惠券 v</div>
                <div class="htl-page clearfix">
                    <div class="htl-up">
                        <a href="" title=""></a>
                    </div>
                    <div class="htl-now-page">
                        <a href="" title="">1</a>
                    </div>
                    <div class="htl-all-page">/2</div>
                    <div class="htl-next">
                        <a href="" title=""></a>
                    </div>
                </div>
            </div> 
            <!-- 优惠券内容 -->
            <div class="htl-shopc-yhq-con" v-if="showuh" >
                <form action="" method="">
                    <div class="htl-shopc-act-bg">            
                        <div class="htl-shopc-act clearfix">
                            <label for="htl-jh">激活新优惠券：</label>
                            <input type="text" id="htl-jh" placeholder="请输入优惠券激活码">
                            <a href="" title="">激活</a>
                        </div>
                    </div>
                </form>
                <div class="htl-shopc-mtb">
                    <div class="htl-shopc-ts">
                        注：每次只可以使用一种优惠券
                    </div>
                    <table class="htl-shopc-tb">
                        <thead>
                            <tr>
                                <th class="htl-shopc-lx">类型 </th>
                                <th class="htl-shopc-des">描述</th>
                                <th class="htl-shopc-syfw">适用范围</th>
                                <th class="htl-shopc-yxq">有效期</th>
                                <th class="htl-shopc-cz">操作</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr v-for="(youhui, index) in youhuis">
                                <td class="htl-shopc-yhq">{{youhui.type}}</td>
                                <td class="htl-shopc-mt">
                                    满<span>{{youhui.description[0]}}</span>
                                    减<span>{{youhui.description[1]}}</span> 
                                </td>
                                <td class="htl-shopc-addd">{{youhui.area}}</td>
                                <td class="htl-shopc-sjfw">{{youhui.useTime}}</td>
                                <td class="htl-shopc-del">
                                    <span v-on:click="useuh(youhui.description[0], youhui.description[1], index)">使用</span>
                                    <em v-on:click="delyh(index)"></em>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                    <div class="htl-shopc-mtb-page"></div> 
                </div>              
            </div>   
            <!-- 页脚 -->
            <div class="htl-shopc-foot clearfix">
                <div class="htl-shopc-foot-lef clearfix">
                    <b class="htl-shopc-foot-allsle htlb" v-bind:class="{'htlSelect':selectAll}" v-on:click="selected()"></b>
                    <span class="htl-shopc-foot-textsel">全选</span>
                    <span class="htl-shopc-fdel" v-on:click="delconfig2()">删除</span>
                    <span>加入收藏</span>
                    <span>|</span>
                    <a href="shop.php" title="">继续购物 ></a>
                </div>
                <div class="htl-shopc-foot-rig">
                    <strong>去结账</strong>
                    <span class="htl-shopc-zjbh">
                        <span>总价（不含运费）：</span>
                        <em>{{totalMoney - totalMoneys | formatMoney("元")}}</em>
                    </span>
                   <!--  <span class="htl-shopc-syyh">
                        使用优惠券优惠<em>-￥63.0</em>
                    </span> -->
                    <span class="htl-shopc-spje">
                        商品金额<em>{{totalMoney | formatMoney("元")}}</em>
                    </span>
                    <span class="htl-shopc-yx">
                        已选<em class="htl-shopc-selected">{{totalCount}}</em>  件商品
                    </span>
                </div>
            </div>       
        </div>
        <!-- 删除商品时，弹窗提示 -->
        <div class="htl-shopc-del-tc" v-bind:class="{'maskshow':delFlag}">
            <div class="htl-shopc-tc-con">
                <p class="htl-shopc-tc-wxts">温馨提示</p>
                <p class="htl-shopc-tc-text">你确定删除吗？</p>
                <div class="htl-shopc-tc-xz clearfix">
                    <span class="htl-shopc-tc-close" v-on:click="delFlag=false">关闭</span>
                    <span class="htl-shopc-tc-true" v-on:click="delGoods()">确定</span>
                </div>
            </div>
        </div>
		<?php
			include("foot.html");
		?>
   	</div>
    <script charset="utf-8" src="../js/jquery-1.11.3.min.js" type="text/javascript"></script>
    <script charset="utf-8" src="../js/vue-2.2.4.min.js" type="text/javascript"></script>
    <script charset="utf-8" src="../js/common.js" type="text/javascript"></script>
    <script charset="utf-8" src="../js/other.js" type="text/javascript"></script>
</body>
</html>
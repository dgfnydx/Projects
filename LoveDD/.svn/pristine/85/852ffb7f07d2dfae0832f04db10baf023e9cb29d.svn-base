// 。。。。。。。。。。丁国富JS开始。。。。。。。。
// 。。。。。。。。。。丁国富JS开始。。。。。。。。
// 。。。。。。。。。。丁国富JS开始。。。。。。。。
// 作品上传
$(function() {
    // 作品、商品上传页面
    // 作品、商品tab切换
    $(".dgf-file span").click(function() {
        var step = $(this).index()*110
        $(this).css({"color": "#d04836"}).siblings("span").css({
            "color": "#2d2d2d"}).siblings("em").stop(true).animate({"left": step})
        $(".file-wrap").children().eq($(this).index()).css({"display":"none"}).siblings().css({"display":"block"})
    })
    // 删除、移动作品
    $(".btn-area span").click(function() {
        var index = $(this).index();
        if(index == 0) {
            $(this).parent().parent().remove();
        } else if(index == 1) {
            $(this).parent().parent().insertBefore($(this).parent().parent().prev());
        } else if (index == 2) {
            $(this).parent().parent().insertAfter($(this).parent().parent().next());
        }
    })
    // 显示
    $(".firkind-li li").click(function() {
        $(".first-kind").text($(this).text()).siblings("ul").slideUp()
    })
    $(".seckind-li li").click(function() {
        $(".second-kind").text($(this).text()).siblings("ul").slideUp()
    })
    // 商品作品分类、商品款式选择
    function classSel(whichCla) {
        whichCla.click(function() {
            $(this).siblings("ul").eq($(this).index() - 1).slideToggle().siblings("ul").slideUp()
        })
    }
    classSel($(".goods-class div"));
    classSel($(".style-select div"));
    // 显示
    $(".style-select li").click(function() {
        var index = $(this).parent().index()-6
        $(this).parent().siblings("div").eq(index).text($(this).text()).siblings("ul").slideUp()
    })
})
// 个人中心
// 安全中心验证
// 手机号正则
var newPhoneReg = /^(13[0-9]|14[0-9]|15[0-9]|18[0-9])\d{8}$/;
// 密码正则
var oldPswReg = /^[a-zA-Z]\w{5,17}$/;
// 邮箱正则
var safecenterReg = /^\w+([-+.]\w+)*@\w+([-.]\w+)*\.\w+([-.]\w+)*$/;
function verMethod(whichVal, tipsText, regVal) {
    whichVal.blur(function() {
        var inputVal = $(this).val()
        if(!regVal.test(inputVal)) {
            tipsText.css({"display": "block"});
        } else {
            tipsText.css({"display": "none"});
        }
    })
}
// 手机验证
verMethod($(".new-phone-dgf input"), $(".phone-tips"), newPhoneReg);
// 密码修改验证，原始密码以字母开头的6-18位秘密
verMethod($(".old-psw-dgf input"), $(".old-psd-tips"), oldPswReg);
// 新密码验证
verMethod($(".new-pas-dgf input"), $(".new-psd-tips"), oldPswReg);
// 邮箱验证
verMethod($(".new-mailbox-dgf input"), $(".email-tips"), safecenterReg);
// 确认密码验证
$(".confirm-pas input").blur(function() {
    var newPasVal = $(".new-pas-dgf input").val()
    var conFirmVal = $(this).val()
    if(conFirmVal != newPasVal || conFirmVal == "") {
        $(".confirm-pas-tips").css({"display": "block"})
    } else {
        $(".confirm-pas-tips").css({"display": "none"})
    }
})
 /**
  * [叮叮币/提现页——表单验证]
  * @判断输入是否正整数
  */
 $(".input-dgf input").blur(function() {
    // 验证非零正整数
    var ddMoneyReg = /^\+?[1-9][0-9]*$/
    var ddValue = $(".input-dgf input").val()
    if(!ddMoneyReg.test(ddValue)) {
        $(".exchange-dgf .alert-text").text("含有非法字符！").css({"color": "red"})
    }else {
        $(".exchange-dgf .alert-text").text("")
    }
 })
 /**
  * [提现页——账户选择]
  * @单选按钮切换
  */
 $(".account-type div").click(function() {
    $(".account-type div em").css({"display": "block"})
    $(this).siblings().children().children("em").css({"display": "none"})
 })
/**
* [我的收藏页\我的订制页]
* @ajax动态请求收藏的商品
*/
 function addCollect(n, parentId, rquestsUrl) {
    var parentWrap = document.getElementById(parentId)
    $.ajax({
        url: rquestsUrl,
        type: "get",
        success: function(data) {
            for(var i = 0; i < n; i++) {
                parentWrap.innerHTML += data;
            }
            // 数据请求成功后执行相关操作，此处为删除我的订制
            afterLoad()
        },
        error: function() {
            alert("加载失败！")
        }
    })
 }
 var mycollectUrl = "ajaxRequestData/my_collect.html";
 var makecommodUrl = "ajaxRequestData/make_commodity.html";
 addCollect(5, "mymake", makecommodUrl);   
 addCollect(5, "mycollect", mycollectUrl);
/**
* [我的订制页]
* @ajax动态请求订制的商品
*/
 // function addOrder(n) {
 //    $.ajax({
 //        url: "ajaxRequestData/make_commodity.html",
 //        type: "get",
 //        success: function(data) {
 //            var sum = data;
 //            for(var i = 1; i <= n; i++) {
 //                sum += data;
 //                $(".mymake").html(sum);
 //            }
 //            // 数据请求成功后执行相关操作，此处为删除我的订制
 //            afterLoad()
 //        },
 //        error: function() {
 //            // 此处添加未请求成功后要执行的事件
 //            alert("加载失败！")
 //        }
 //    })
 // }addOrder(5)

 /**
  * 删除我的订制商品
  * [afterLoad ajax请求回来的内容无法直接绑定事件，在请求成功后调用此函数才可以绑定事件]
  * @param {[type]} initial [获取初始订制数量，用于判断是否显示提示信息]
  * @param {[type]} makeNum [当有删除订制商品时，用于判断是否显示提示信息]
  * $(".dgf-make .make-btn em").click 点那个删哪个
  * $(".del-btn span")。click 点击删除按钮全部删除（此处先判断是否全选，判断条件tick)
  */
 function afterLoad() {
    // 存储订制数量与收藏数量
    var makeNum = 0;
    // 订制页
    var makePage = ".mymake";
    // 收藏页
    var collectPage = ".mycollect";
    var tipsArr = ["您还没有订制！", "您还未收藏！"];

    $(".minemade").click(function() {
       // 订制数量（初始）
       var initial = $(".mymake .dgf-make").length
       showTips (initial, makePage, tipsArr[0]);
    })
    $(".minecollect").click(function() {
       // 收藏数量（初始）
       var initials = $(".mycollect .dgf-article").length
       showTips (initials, collectPage, tipsArr[1]);
    })

    // 我的订制，删除全选
    $(".del-btn span").click(function() {
        if(!tick) {
            $(".mymake").empty();
            makeNum = $(".mymake .dgf-make").length;
            showTips (makeNum, makePage, tipsArr[0]);
        }
    })
    // 删除订制，取消收藏核心
    function changes(m, n) {
        $(m).click(function() {
        $(this).parent().parent().parent().remove();
            makeNum = $(n).length;
            showTips (makeNum, makePage, tipsArr[0]);
            showTips (makeNum, collectPage, tipsArr[1]);
        })
    }
    // 调用删除订制，取消收藏
    (function() {
        // 我的订制删除键
        var dzDel = ".dgf-make .make-btn span";
        // 我的收藏删除键
        var colDel = ".dgf-article .collect-btn b"
        var orderNum = ".mymake .dgf-make";
        var collectNum = ".mycollect .dgf-article"
        changes(dzDel, orderNum);
        changes(colDel, collectNum)
    })()
 }

 /**
  * [showTips 没有订制或收藏的时候显示提示信息]
  * @param  {[type]} makeClass [形参，传入显示提示信息的条件]
  * @param {[type]} .mymake [在此父级内插入提示信息]
  */
 function showTips (makeClass, parentWrap, tipsText) {
    if(makeClass == 0) {
        $(parentWrap).html(tipsText).css({
            "color": "red", 
            "fontSize": "30px",
            "textAlign": "center"
        })
    }
 }
 /**
 * 字数统计——我的资料页，作品上传页
 * @统计文本域字符剩余输入数量
 */
 function wordCount(countArea, n, writeArea ) {
    countArea.keyup(function() {
        var textNum = $(this).val()
        writeArea.text(n - textNum.length)
    })
 }
 // 我的资料页文本域
 wordCount($(".dgf-abstract textarea"), 130, $(".dgf-abstract p span"))
 // 作品、商品上传
 wordCount($(".trade-name input"), 20, $(".trade-name em span"))
 wordCount($(".descr textarea"), 200, $(".description em span"))


// 我的私信——删除私信及联系人
$(".letter-time b").click(function() {
    $(this).parent().parent().remove()
})
// 清空所有联系人
$(".letter-btn").click(function() {
    $(".letter-con dl").remove( )
})
// 删除最近联系人
$(".linkman b").click(function() {
    $(this).parent().remove()
})

// 我的订单与订单详情tab切换
$(".htl-o-cancle-xq a").click(function() {
    $(".myorder-lis").css({"display": "none"}).siblings().css({"display": "block"})
})

 // 订单查询与订单记录实现tab切换
 $('.htl-ts-ddcx').click(function() {
    $('.trade-ddcx').show();
    $('.trade-notes').hide();
    $(this).css('color', '#dc4935');
    $('.htl-ts-notes').css('color', '#2d2d2d');
 });
 $('.htl-ts-notes').click(function() {
    $('.trade-ddcx').hide();
    $('.trade-notes').show();
    $(this).css('color', '#dc4935');
    $('.htl-ts-ddcx').css('color', '#2d2d2d');
 });


// 注册页
// 法律声明和隐私条框选择
var choose = false;
$(".agree p strong, .agree p span").click(function() {
    if(choose) {
        $(".agree strong").text("");
        choose = false;
    } else {
        $(".agree strong").text("√");
        choose = true;
    }
})
$(".write em").click(function(event) {
    $(this).html(Math.floor(Math.random()*9000)+1000);
});
// 注册信息验证
var tipsArr = ["手机号错误！", "密码格式错误！", "验证码错误！"]
var signPhoneReg = /^(13[0-9]|14[0-9]|15[0-9]|18[0-9])\d{8}$/;
var signPswReg = /^[a-zA-Z]\w{5,17}$/;
var telTrue = 0;
var pasTrue = 0;
var conTrue = 0;
$(".tel").blur(function(event) {
    var inputVal = $(this).val();
    if(!signPhoneReg.test(inputVal)) {
        $(".write b").text(tipsArr[0]);
    } else {
        $(".write b").text("");
        telTrue = 1;
    }
});
$(".keyword").blur(function(event) {
    var inputVal = $(this).val();
    if(!signPswReg.test(inputVal)) {
        $(".write b").text(tipsArr[1]);
    } else {
        $(".write b").text("");
        pasTrue = 1;
    }
});
$(".confirm").blur(function(event) {
    var inputVal = $(".write em").html()
    if(!(parseInt($(this).val()) == inputVal)) {
        $(".write b").text(tipsArr[2]);
    } else {
        $(".write b").text("");
        conTrue = 1;
    }
});

$(".write .submit").click(function(event) {
    if (((telTrue + pasTrue + conTrue) == 3) && (choose == true)) {
        window.location.href="signin.php";
        telTrue = 0;
        pasTrue = 0;
        conTrue = 0;
        choose = false;
    }; 
});
$(".uselovedd .submit").click(function() {
    window.location.href = "personal_center.php";
})

// 。。。。。。。。。。。。。丁国富JS结束。。。。。。。。。。。。
// 。。。。。。。。。。。。。丁国富JS结束。。。。。。。。。。。。
// 。。。。。。。。。。。。。丁国富JS结束。。。。。。。。。。。。

// 。。。。。黄添隆js开始。。。。。。。。。。。。。。。。。。。
// 。。。。。黄添隆js开始。。。。。。。。。。。。。。。。。。。
// 。。。。。黄添隆js开始。。。。。。。。。。。。。。。。。。。
// 。。。。。黄添隆js开始。。。。。。。。。。。。。。。。。。。

 //《我的交易》页面
 $(function() {
    // 下拉按钮
    $('.htl-t-t-btn').click(function() {
        $('.htl-t-t-option').stop().slideToggle();
    });
    $('.htl-t-s-btn').click(function() {
        $('.htl-t-s-option').stop().slideToggle();
    });
    $('.htl-t-f-btn').click(function() {
        $('.htl-t-f-option').stop().slideToggle();
    });
    //点击任意位置，下拉框消失
    $(document).click(function(e) {
        if(!$(e.target).is('.htl-t-t-btn')) {
            $('.htl-t-t-option').hide();
        }
        if(!$(e.target).is('.htl-t-s-btn')) {
            $('.htl-t-s-option').hide();
        }
        if(!$(e.target).is('.htl-t-f-btn')) {
            $('.htl-t-f-option').hide();
        }
    });
    //让下拉框的内容被选择
    $('.htl-t-t-option p').click(function() {
       $('.htl-t-opt-cznr').html($(this).html());
    });
    $('.htl-t-s-option p').click(function() {
       $('.htl-t-s-dzf').html($(this).html());
    });
    $('.htl-t-f-option').click(function() {
        $('.htl-t-f-sl').html($(this).html());
    });

    // 文本框聚焦则，清空内容
    $('.htl-t-input').focus(function() {
         $('.htl-t-input').val('');
        $('.htl-t-input').css('color', '#2d2d2d');
    });
    //文本框失焦，恢复原来的默认值
    $('.htl-t-input').blur(function() {
        $('.htl-t-input').css('color', '#d8d8d8');
    });
    // 页面刷新时改变文本框字体颜色
    $('.htl-t-input').css('color', '#d8d8d8');
    // 《订单查询》
    $('.htl-ts-ddcx').add('.htl-ts-notes').css('cursor', 'pointer');
    $('.htl-t-t-option p').add('.htl-t-s-option p')
    .add('.htl-t-f-option p').css('background', '#f3efee');
 })

 //《我的粉丝》页面
 $(function() {
    // 实现我的粉丝和我的关注的切换效果
    $('.htl-myf-myf').click(function() {
        $('.htl-myf-myf').css({
            background: "#fff",
            color: '#dc4935'
        });
        $('.htl-myf-about').css({
            borderRight: '0',
            background: '#fafafa',
            color: '#2d2d2d'
        });
        $('.htl-myfansS').show();
        $('.htl-myabouts').hide();
    });
    $('.htl-myf-about').click(function() {
        $('.htl-myf-about').css({
            borderRight: "1px solid #f0f0f0",
            background: "#fff",
            color: '#dc4935'
        });
        $('.htl-myf-myf').css({
            background: '#fafafa',
            color: '#2d2d2d'
        });
        $('.htl-myabouts').show();
        $('.htl-myfansS').hide();
    });

    // 实现排序按钮的下拉框效果
    $('.htl-myf-sort').click(function() {
        $('.htl-myf-sort-con').stop().slideToggle();
    });
    $(document).click(function(e) {
        if(!$(e.target).is('.htl-myf-sort')) {
            $('.htl-myf-sort-con').hide();
        }
    });

    //实现选择下拉框中的一选项，则下拉框消失
    $('.htl-myf-sort-con li').click(function() {
        $('.htl-myf-sort-con').css('display','none');
    });

    // 文本框聚焦则，清空默认的val值
    $('.htl-myf-search input').focus(function() {
        if($('.htl-myf-search input').val() == '输入昵称或备注') {
            $('.htl-myf-search input').val('');
        }
        $('.htl-myf-search input').css('color', '#2d2d2d');
    });
    //文本框失焦，恢复原来的默认值
    $('.htl-myf-search input').blur(function() {
        htlSearchVal = $('.htl-myf-search input').val();
        $('.htl-myf-search input').val('输入昵称或备注');
        $('.htl-myf-search input').css('color', '#d8d8d8');     
    });
    // 设置一开始时，input框的字体
    $('.htl-myf-search input').css('color', '#d8d8d8'); 
 });

    // 《有粉丝的页面》
 $(function() {
    //先让我的关注内容隐藏
    $('.htl-myabouts').hide();
    
    //通过ajax实现动态添加我的粉丝数量
    var xhr = new XMLHttpRequest();
    xhr.open('GET', 'ajaxRequestData/fans.html', true);
    xhr.send(null);
    xhr.onload = function() {
        var htlStr = xhr.responseText;  
        for(var i = 0; i < 31; i++) {
            $('.htl-myfansS').append(htlStr);
        }
        //点击操作按钮的功能
        // 实现点击产生下拉框功能
        $('.htl-myfansS-cz-btn').on('click',function() {
            $(this).next().stop().slideToggle();
        });
        //实现点击网页任意地方下拉框都会消失
        $(document).click(function(e) {
            if(!$(e.target).is('.htl-myfansS-cz-btn')) {
                $('.htl-myfansS-cz-con').hide();
            }
        });
        // 实现下拉框里面的功能
        $('.htl-myfansS-cz-con li').click(function() {
            if($(this).html() == '移除粉丝') {
                $(this).parent().parent().parent().parent().parent().remove();
            }
            if($(this).html() == '加入关注') {
                $(this).parent().parent().parent().parent().parent().find('.htl-myfansS-true').show();
            }
            // 点击下拉框里面内容后，下拉列表隐藏
            $('.htl-myfansS-cz-con').hide();
        });

        //排序下拉框中的全部关注功能
        $('.htl-myf-sort-con').eq(0).click(function() {
            $('.htl-myfansS-true').show();
        });

    }
    //通过ajax实现动态添加我的关注人数数量
    var htl = new XMLHttpRequest();
    htl.open('get', 'ajaxRequestData/abouts.html', true);
    htl.send(null);
    htl.onload = function() {
        var htlCon = htl.responseText;
        for(var i = 0; i < 31; i++) {
            $('.htl-myabouts').append(htlCon);
        }
        //实现下拉框效果
        $('.htl-myabouts-cz-btn').on('click',function() {
            $(this).next().stop().slideToggle();
        });
        //实现点击网页任意地方下拉框都会消失
        $(document).click(function(e) {
            if(!$(e.target).is('.htl-myabouts-cz-btn')) {
                $('.htl-myabouts-cz-con').hide();
            }
        });
        // 点击取消关注、设置备注、私信效果
        $('.htl-myabouts-cz-con li').click(function() {
            if($(this).html() == '取消关注') {
                $(this).parent().parent().parent().parent().parent().find('.htl-myabouts-true').hide();
            }
            if($(this).html() == '设置备注') {
                //先让原理的网昵隐藏
                $(this).parent().parent().next().children('.htl-myabouts-user')
                .hide();
                //生成一个inpput框（类名为htl-myabouts-user-change），用来输入新网昵
                $('.htl-myabouts-user-change').remove();    //生成input前，先清除，避免累加
                $(this).parent().parent().next().prepend('<input type="text" class="htl-myabouts-user-change">');
                $('.htl-myabouts-user-change').blur(function() {
                    // input框失点时，如果里面没有东西，则网昵还是原来的网昵
                    if(!$('.htl-myabouts-user-change').val()) {
                        $('.htl-myabouts-user-change').hide();
                        $(this).parent().find('.htl-myabouts-user').show(); 
                    } else {
                        // 否则input里面的网昵替代原来的网昵
                        $(this).parent().find('.htl-myabouts-user').show()
                        .html($('.htl-myabouts-user-change').val());
                        $('.htl-myabouts-user-change').hide();
                    }
                });
            }           
            // 点击下拉框里面内容后，下拉列表隐藏
            $('.htl-myabouts-cz-con').hide();
        });
        
    }
 })

 //《我的卡券》的页面
 $(function() {
    // 点击删除按钮功能
    $('.htl-dd-del').click(function() {
        $(this).parent().remove();
    });
    // 文本框聚焦则，清空默认的val值
    $('#htl-jh').focus(function() {
        $('#htl-jh').val('');
        $('#htl-jh').css('color', '#2d2d2d');
    });
    //文本框失焦，恢复原来的默认值
    $('#htl-jh').blur(function() {
        $('#htl-jh').css('color', '#d8d8d8');       
    });
    // 设置一开始时，input框的字体
    $('#htl-jh').css('color', '#d8d8d8');
 });

$(function() {
    //《我的订单》页面
    //生成下啦列表
    $('.htl-o-down-btn').click(function() {
        $('.htl-o-show').stop().slideToggle();
    });
    // 点击任意位置，下拉框消失
    $(document).click(function(e) {
        if(!$(e.target).is('.htl-o-down-btn')) {
            $('.htl-o-show').hide();
        }
    });
    // 点击下拉框的信息，信息将被选择
    $('.htl-o-show li').click(function() {
        $('.htl-o-c-c').html($(this).html());
    });
    // 点击删除按钮功能
    $('.htl-o-del').click(function() {
        $(this).parent().parent().parent().remove();
    });

   
    //《我的粉丝和我的关注》页面跳转控制
        //点击我的关注按钮功能
    $('.personal-common-con-head-gz').click(function() {
        $('.htl-myfansS-main').show().siblings().hide(); 
        $('.htl-myfansS').hide().next().show();
        $('.htl-myf-about').css({
            color: 'rgb(220, 73, 53)',
            background: '#fff',
            borderRight: '1px solid rgb(240, 240, 240)'
        });
        $('.htl-myf-myf').css({
            color: 'rgb(45, 45, 45)',
            background: '#fafafa'
        });        
    });
        // 点击我的粉丝按钮功能
    // $('.personal-common-con-head-fs').click(function() {
    //     $('.htl-myfansS-main').show().siblings().hide(); 
    //     $('.htl-myf-abouts').hide().next().show();
    //     $('.htl-myf-myf').css('color', 'rgb(220, 73, 53)');
    //     $('.htl-myf-about').css('color', 'rgb(45, 45, 45)');    
    // });
});

// 《我的购物车》页面
$(function() {
    var htlSelc = 0;   //计算商品选择按钮点击的次数
    var htlTc = 0;  //记录点击商品父级的索引值
    // 动态添加商品个数
    var htlShops = new XMLHttpRequest();
    htlShops.open('get', 'ajaxRequestData/shop_car.html', true);
    htlShops.send(null);
    htlShops.onload = function() {
        var htlShopsStr = htlShops.responseText;
        for(var i = 0; i < 7; i++) {
            $('.htl-shopc-con-all').append(htlShopsStr);
        }
        // 调用导航栏上购物车数字显示函数
        shoppingNum()
        // 全选按钮功能
            //点击商品按钮会全选
        $('.htl-shopc-sp span').click(function() {
            if($('.htl-shopc-sp span').hasClass('htl-shopc-spxz')) {
                $('.htl-shopc-sp span').removeClass('htl-shopc-spxz');
                $('.htl-shopc-sel').removeClass('htl-shopc-select');
            } else {
                $('.htl-shopc-sel').addClass('htl-shopc-select');
                $('.htl-shopc-sp span').addClass('htl-shopc-spxz');
            }
            htlJudge();
        });
            // 点击方框和文字都能全选
        $('.htl-shopc-foot-textsel').click(function() {
            htlASelectT();
        })
        $('.htl-shopc-foot-allsle').click(function() {  
            htlASelectT();
        });
        // 全选按钮的功能函数
        function htlASelectT() {
            if($('.htl-shopc-foot-allsle').hasClass('htl-shopc-all-selects')) {
                $('.htl-shopc-sel').removeClass('htl-shopc-select');
                $('.htl-shopc-foot-allsle').removeClass('htl-shopc-all-selects');
            } else{
                $('.htl-shopc-sel').addClass('htl-shopc-select');
                $('.htl-shopc-foot-allsle').addClass('htl-shopc-all-selects');
            }
            htlJudge();
        }
        // 全选后，点击删除按钮，则删除全部商品
        $('.htl-shopc-fdel').click(function() {
            if($('.htl-shopc-foot-allsle').hasClass('htl-shopc-all-selects')) {
                $('.htl-shopc-del-tc').show();
                $('.htl-shopc-tc-true').click(function() {
                    $('.htl-shopc-con').remove();
                    htlJudge();
                });
            } else{
                $('.htl-shopc-del-tc').show();
                $('.htl-shopc-tc-true').click(function() {
                $('.htl-shopc-select').parent().remove();
                    htlJudge();
                });
            }
        });

        // 结算金额的计算
        $(document).click(function() {
            var htlZje = 0;
            var htlspG = $('.htl-shopc-select').size();
            for(var i = 0; i < htlspG; i++) {
                htlZje += parseInt($('.htl-shopc-select').eq(i).next().find('.htl-shopc-cons-sj em').html())
            }
            $('.htl-shopc-zjbh em').html('￥' + htlZje + ".00");
            $('.htl-shopc-spje em').html('￥' + htlZje + ".0");

        });

        // 点击按钮选择商品
        $('.htl-shopc-sel').click(function() {
            if($(this).hasClass('htl-shopc-select')) {
                $(this).removeClass('htl-shopc-select');
            } else {
                $(this).addClass('htl-shopc-select');
            }
            htlJudge();  //每次选择商品，进行判断是否满足全选条件
        });

        //如果商品选择的个数等于当前页面的所有个数则全选（判断函数）
        function htlJudge() {
            //每次调用该函数，则把当前页面有几个商品的个数存入htlLmgs里
            //每次调用该函数，则把当前页面的商品数存入htlSpgs里
            var htlSpgs = $('.htl-shopc-con').size();
            var htlLmgs = $('.htl-shopc-select').size();    
            if(htlSpgs == htlLmgs && htlLmgs != 0) {
                $('.htl-shopc-foot-allsle').addClass('htl-shopc-all-selects');
                $('.htl-shopc-sp span').addClass('htl-shopc-spxz');
            } else{
                $('.htl-shopc-foot-allsle').removeClass('htl-shopc-all-selects');
                $('.htl-shopc-sp span').removeClass('htl-shopc-spxz');
            }       
        }

        //删除当前商品功能,弹窗提示
        $('.htl-shopc-cons-del').click(function() {
            htlTc = $(this).parents('.htl-shopc-con').index();
            $('.htl-shopc-del-tc').show();
            htlJudge(); //没删除一个商品，进行判断是否满足全选
        });
        // 弹窗点击关闭按钮，则弹窗消失
        $('.htl-shopc-tc-close').click(function() {
            $('.htl-shopc-del-tc').hide();
        });
        // 弹窗点击确定按钮，则商品删除
        $('.htl-shopc-tc-true').click(function() {
            $('.htl-shopc-con').eq(htlTc).remove();
            $('.htl-shopc-del-tc').hide();
            htlJudge()
        });

        //点击增加或者减少商品个数,且计算出价格
        $('.htl-shopc-add').click(function() {
            var htlAdda = $(this).prev().val();
            htlAdda++;
            console.log(htlAdda);
            $(this).parents('.htl-shopc-cons-num').prev().find('em').html(htlAdda * 88);
            $(this).prev().val(htlAdda)
        });
        $('.htl-shopc-jj').click(function() {
            var htlJja = $(this).next().val();
            htlJja--;
            if(htlJja <= 0) {
                htlJja = 0;
            }
            $(this).parents('.htl-shopc-cons-num').prev().find('em').html(htlJja * 88);
            $(this).next().val(htlJja);
        });
        //输入几件商品后，失焦后计算出价格
        $('.htl-shopc-shuz').blur(function() {
            $(this).parents('.htl-shopc-cons-num').prev().find('em').html( $(this).val()* 88);
        });

        //判断已经选择了几个商品
        $(document).click(function() {
            $('.htl-shopc-selected').html($('.htl-shopc-select').size());
        });

        //点击使用优惠券按钮时，所有优惠券显示出来
        $('.htl-shopc-syyhq').click(function() {
            $('.htl-shopc-yhq-con').show();
        });

        //删除商品按钮
        $('.htl-shopc-del em').click(function() {
            $(this).parents('tr').remove();
        });

        // 优惠券收索框的样式
        // 文本框聚焦则，清空默认的val值
        $('#htl-jh').focus(function() {
            $('#htl-jh').val('');
            $('#htl-jh').css('color', '#2d2d2d');
        });
        //文本框失焦，恢复原来的默认值
        $('#htl-jh').blur(function() {
            $('#htl-jh').css('color', '#d8d8d8');
        });
        // 页面刷新时改变文本框字体颜色
        $('#htl-jh').css('color', '#d8d8d8');       
    }   
})
    // 黄添隆js结束。。。。。。
    // 黄添隆js结束。。。。。。
    // 黄添隆js结束。。。。。。
    // 黄添隆js结束。。。。。。


// 作品欣赏切换
$(".production-caption-xxj span").click(function() {
    $(this).addClass('production-select').siblings().removeClass('production-select');
    $(".production-caption-xxj em").stop(true,true).animate({
        "left" : $(this).index() * 95 + 10 + "px"
    });
});
for (var i = 1; i <= 5; i++) {
    $(".production-sify span").eq(i).click(function() {
        $(".production-sify div").css({
            "display" : "block"
        });
        $(this).addClass('production-select-black').siblings().removeClass('production-select-black')
    });
};
$(".production-sify strong").click(function() {
     $(this).addClass('production-select-black').siblings().removeClass('production-select-black')
});
$(".production-sify p span").click(function() {
     $(this).addClass('production-select-black').siblings().removeClass('production-select-black')
});


// 。。。。。张飞翔js开始。。。。。。。。。。。。。。
// 。。。。。张飞翔js开始。。。。。。。。。。。。。。
// 。。。。。张飞翔js开始。。。。。。。。。。。。。。

// 创意商城
// 创意导航
$(".navS-zfx span").click(function() {
    $(this).addClass("color-zfx").siblings("span").removeClass("color-zfx")
}).hover(function() {
    $(".pull-zfx").css({"display": "block"});
}, function() {
});
//移出消失
$(".pull-zfx").hover(function() {
}, function() {
    $(this).css({"display": "none"});
});
$(".select-zfx span").click(function() {
    $(this).addClass("hot-zfx").siblings("span").removeClass("hot-zfx")
});
//适用对象选中变色
$(".apply-zfx ul li").click(function() {
    $(this).addClass("apply-select").siblings().removeClass("apply-select")
});
//分类选中变色
$(".classify-zfx p span").click(function() {
    $(this).addClass("classify-select").siblings().removeClass("classify-select")
});
// 列表项款式选择
// T恤移入下拉效果
$(".T-shirt-zfx").mouseover(function() {
        $(".T-shirt-zfx").stop().animate({
            "height" : "120px"
        }, 500) 
        // 下拉点击选择 
        $(".T-shirt-zfx strong").click(function() {
            $("#T-zfx").html($(this).html());
            $(this).parent().css({
                "height" : "30px"
                })
            })
});      
//鼠标移出收回
$(".T-shirt-zfx").mouseout(function() {
    $(".T-shirt-zfx").stop().animate({
        "height" : "30px"
    }, 500)
});

//polo下拉框
  $(".polo-zfx").mouseover(function() {
        $(".polo-zfx").stop().animate({
            "height" : "120px"
        }, 500) 
        // 下拉点击选择 
         $(".polo-zfx strong").click(function() {
    $("#category-zfx").html($(this).html());
    $(this).parent().css({
        "height" : "30px"
        })
    })
});      
//鼠标移出收回
$(".polo-zfx").mouseout(function() {
    $(".polo-zfx").stop().animate({
        "height" : "30px"
    }, 500)
});
//卫衣下拉框效果
  $(".fleece-zfx").mouseover(function() {
        $(".fleece-zfx").stop().animate({
            "height" : "120px"
        }, 500) 
        // 下拉点击选择 
         $(".fleece-zfx strong").click(function() {
    $("#clothes-zfx").html($(this).html());
    $(this).parent().css({
        "height" : "30px"
        })
    })
});      
//鼠标移出收回
$(".fleece-zfx").mouseout(function() {
    $(".fleece-zfx").stop().animate({
        "height" : "30px"
    }, 500)
});

//艺能下拉框
  $(".art-zfx").mouseover(function() {
        $(".art-zfx").stop().animate({
            "height" : "120px"
        }, 500) 
        // 下拉点击选择 
         $(".art-zfx strong").click(function() {
    $("#skill-zfx").html($(this).html());
    $(this).parent().css({
        "height" : "30px"
        })
    })
});      
//鼠标移出收回
$(".art-zfx").mouseout(function() {
    $(".art-zfx").stop().animate({
        "height" : "30px"
    }, 500)
});
//漫画下拉框效果
 $(".cartoon-zfx").mouseover(function() {
        $(".cartoon-zfx").stop().animate({
            "height" : "120px"
        }, 500) 
        // 下拉点击选择 
         $(".cartoon-zfx strong").click(function() {
    $("#classifys-zfx").html($(this).html());
    $(this).parent().css({
        "height" : "30px"
        })
    })
});      
//鼠标移出收回
$(".cartoon-zfx").mouseout(function() {
    $(".cartoon-zfx").stop().animate({
        "height" : "30px"
    }, 500)
});


//订制页面
// 图片正反面TAB切换
$(".sided-zfx span").click(function() {
     $(this).addClass("sel-zfx").siblings().removeClass("sel-zfx").parent().siblings().children("img").eq($(this).index()).addClass("sel-zfx").siblings().removeClass("sel-zfx");   
})

// 图片和文字TAB切换
$(".cut-zfx span").eq(1).click(function(event) {
    $(this).addClass("cut-sel").siblings().removeClass("cut-sel");
    $(".character-zfx").show().siblings().hide();
});
$(".cut-zfx span").eq(0).click(function(event) {
    $(".uploading-zfx").show().siblings().hide();
});



 // 新增js代码，修改时间6.14---黄添隆
 $(function() {   
    var htlFC;
    var htlFF;
    var htlFS;
    var htlArr = ['Microsofe YaHei', 'SimSun', 'SimHei'];   //储存文字字体
    var htlASize = [12, 16, 20, 26]     //储存文字大小
    var htlAColor = ['red', 'green', 'blue']  //储存字体颜色

     $('.cut-zfx span').click(function() {
        $(this).css('background', 'white').siblings()
        .css('background', '#fafafa');
     });
     //选择按钮的功能
     $('.fontlib-zfx em').click(function() {
        if($(this).hasClass('htl-font-sel')) {
            $(this).removeClass('htl-font-sel');
        } else {
             $(this).addClass('htl-font-sel').parents().siblings()
             .find('em').removeClass('htl-font-sel');
        }
        htlFF = $(this).parents('li').index();
     });
     // 选择按钮后面的文字也可以选择
     $('.fontlib-zfx span').click(function() {
        if($(this).prev().children().hasClass('htl-font-sel')) {
            $(this).prev().children().removeClass('htl-font-sel');
        } else{
             $(this).prev().children().addClass('htl-font-sel').parents()
             .siblings().find('em').removeClass('htl-font-sel');           
        }
        htlFF = $(this).parent('li').index();
     });
     // 文字大小下拉框
     $('.htl-indiv-fonts').click(function() {
        $('.htl-font-size').stop().slideToggle();
     });
     // 改变文字大小功能
     $('.htl-font-size li').click(function() {
        htlFS = $(this).index();
        $('.htl-indiv-fonts').html($(this).html()).next().hide();
     });
     // 选择颜色下拉框功能 
     $('.htl-indiv-ys').click(function() {
        $('.htl-font-color').stop().slideToggle();
     });
     //改变文字颜色功能
     $('.htl-font-color li').click(function() {
        htlFC = $(this).index();
        //表示选中了该点击的选项
        $('.htl-indiv-ys').html($(this).html()).next().hide();
     });
     //点击任一位置（除下拉框按钮），下拉框要消失
     $(document).click(function(e) {
        if(!$(e.target).hasClass('htl-indiv-fonts')) {
            $('.htl-font-size').hide();
        }
        if(!$(e.target).hasClass('htl-indiv-ys')) {
            $('.htl-font-color').hide();
        }
     });
     //应用按钮，功能
     $('.use-zfx').click(function() {
        //文本框的文字以及文字的样式放入衣服上面
        $('.htl-write-t').html(function() {
            if($('.htl-font-fml').val() == '请输入文字内容') {
                return '';
            } else{
                return $('.htl-font-fml').val();
            }
        }).css({
            fontFamily: htlArr[htlFF],
            fontSize: htlASize[htlFS],
            color: htlAColor[htlFC]
        });
        delPos();
        $('.htl-write-del').add('.htl-write-move').add('.htl-write-t').show();
     });
     //设计品上的内容可以拖拽功能
     var con = document.getElementById('htl-indiv-wCon');
     var box = document.getElementById('htl-indiv-write');
     con.onmousedown = function(e) {
        var e = e || window.event;
        var starX = e.clientX;
        var starY = e.clientY;
        var posX = con.offsetLeft;
        var posY = con.offsetTop;
        prevent(e);
        document.onmousemove = function(e) {
            var e = e || window.event;
            var nowX = e.clientX;
            var nowY = e.clientY;
            var lengX = nowX - starX + posX;
            var lengY = nowY - starY + posY;
            prevent(e);
            //控制内容的拖拽范围
            if(lengX >= box.clientWidth || lengY >= box.clientHeight) {
                lengX = 0;
                lengY = 0;
            }
            if(lengX <= 0) {
                lengX = 0;
            }
            if(lengY <= 0) {
                lengY = 0;
            }
            $('.htl-indiv-wCon').css({
                left: lengX + 'px',
                top: lengY + 'px'
            })
        }
     }
     document.onmouseup = function() {
        document.onmousemove = null;
     }
     // 删除按钮和移动按钮起始位隐藏状态
     $('.htl-write-del').add('.htl-write-move').add('.htl-write-t').hide();
     //设计样式中，删除功能按钮的位置
     function delPos() {
        var h = $('.htl-write-t').height();
        $('.htl-write-del').css('top', h + 'px');
     }
     $('.htl-write-del').click(function() {
        $('.htl-write-t').html('').hide();
        delPos()
     });




     // 图片上传设置
     // $.ajaxFileUpload ({
     //    // var large = $('.htl-indiv-write');
     //    $(".htl-upload-ys").change(function() {  
     //        $(".htl-indiv-write").attr("src", "file:///" + $(".htl-upload-ys").val());  
     //    });  
     // })
     

    // 文本框聚焦则，清空默认的val值
    $('.htl-font-fml').focus(function() {
        if($('.htl-font-fml').val() == '请输入文字内容') {
            $('.htl-font-fml').val('');
        }
        $('.htl-font-fml').css('color', '#2d2d2d');
    });
    // 设置一开始时，input框的字体
    $('.htl-font-fml').css('color', '#d8d8d8');

 })

// 右侧样式选择部分
// 选择样式下拉框(包括衣服、手机、包包)
// 一级下拉框
$('.htl-indiv-ljxz').click(function() {
    $('.htl-indiv-lj').stop().slideToggle();
});
$('.htl-indiv-lj li').click(function() {
    $('.htl-indiv-ljxz').html($(this).html()).next().hide();
    $('.htl-tabwrap').children().eq($(this).index()).show().siblings().hide();
});
// 二级下拉框
// 衣服
$('.htl-clo-sz').click(function() {
    $('.htl-clo-con').stop().slideToggle();
})
$('.htl-clo-con li').click(function() {
   $(this).parent().prev().html($(this).html()).next().hide();
})

$('.htl-col-cm').click(function() {
    $('.htl-col-xlcm').slideToggle();
});
$('.htl-col-xlcm li').click(function() {
    $(this).parent().hide();
    $('.htl-col-cm').html($(this).html());
})

$('.htl-col-ys').click(function() {
    $('.htl-col-xlys').slideToggle();
});
$('.htl-col-xlys li').click(function() {
    $(this).parent().hide();
    $('.htl-col-ys').html($(this).html());
})

$('.htl-col-sex').click(function() {
    $('.htl-col-sexnl').slideToggle();
});
$('.htl-col-sexnl li').click(function() {
    $(this).parent().hide();
    $('.htl-col-sex').html($(this).html());
})

$('.htl-col-size').click(function() {
    $('.htl-col-sizenl').slideToggle();
});
$('.htl-col-sizenl li').click(function() {
     $(this).parent().hide();
    $('.htl-col-size').html($(this).html());
})

$('.htl-number-xz').click(function() {
    $('.htl-num-con').slideToggle();
});
$('.htl-num-con li').click(function() {
    $('.htl-number-xz').html($(this).html());
     $(this).parent().hide();
})

 // 封装阻止默认事件的兼容函数
 function prevent(evt) {
    // 阻止默认事件
    if(evt.preventDefault) {
        // 谷歌火狐的阻止默认
        evt.preventDefault();
    } else {
        // IE的阻止默认
        evt.returnValue = false;
    }
 }


    //购买金额
    function sub(){
     document.getElementById("input-zfx").value--;
     var num = document.getElementById("input-zfx").value;
     if(num <= 1){
         document.getElementById("input-zfx").value = 1;
         num = 1;
     }
     var money = num * 36.0;
     document.getElementById("unit-price-zfx").innerHTML = "￥" + money.toFixed(1);
}
function add(){
 document.getElementById("input-zfx").value++;
 var num = document.getElementById("input-zfx").value;
 var money = num * 36.0;
 document.getElementById("unit-price-zfx").innerHTML = "￥" + money.toFixed(1);
};
    
//。。。。。。张飞翔js结束。。。。。。。。
//。。。。。。张飞翔js结束。。。。。。。。
//。。。。。。张飞翔js结束。。。。。。。。

// 作品欣赏切换
$(".production-caption-xxj span").click(function() {
    $(this).addClass('production-select').siblings().removeClass('production-select');
    $(".production-caption-xxj em").stop(true,true).animate({
        "left" : $(this).index() * 95 + 10 + "px"
    });
});
$(".production-sify span").click(function() {
    $(this).addClass('production-select-black').siblings().removeClass('production-select-black');
    $(".production-sify div").css({
        "display" : "block"
    });
});

$(".production-sify strong").click(function() {
     $(this).addClass('production-select-black').siblings().removeClass('production-select-black')
});
$(".production-sify p span").click(function() {
     $(this).addClass('production-select-black').siblings().removeClass('production-select-black')
});
$(".production-sify div em").click(function() {
    $(this).parent().css({"display" : "none"});
    $(this).siblings().removeClass('production-select-black')
});
$(".designer-sify-xxj strong").eq(0).click(function() {
    $(this).parent().css({"display" : "none"})
});
// 设计师页面
$(".list-caption-xxj span").click(function() {
    $(this).addClass('list-select-xxj').siblings().removeClass('list-select-xxj');
    $(".list-caption-xxj em").stop(true,true).animate({
        "left" : $(this).index() * 110 + 10 + "px"
    });
});
$(".list-sort-xxj span").click(function() {
    $(this).addClass('list-black-xxj').siblings().removeClass('list-black-xxj');
});
var background = false;
$(".list-keep-xxj").click(function() {
    if (background) {
        $(this).css({
            "backgroundImage" : "url('../images/list_icon-xxj_02.png')"
        }); 
        background = false;
    } else {
         $(this).css({
            "backgroundImage" : "url('../images/list_icon-xxj_01.png')"
        }); 
        background = true;
    }
});
$(".list-img-xxj div").hover(function() {
    $(this).children().eq(1).stop(true, true).animate({
        "bottom" : "0"
    });
}, function() {
    $(this).children().eq(1).stop(true, true).animate({
        "bottom" : "-30px"
    });
});
//设计师详情页
//评论框表情包
$(".production-show-comment-xxj img").eq(0).hover(function() {
    $(".designer-emotions-xxj").css({"display" : "block"});
}, function() {
    $(".designer-emotions-xxj").css({"display" : "block"});
});
$(".designer-comment-xxj img").eq(0).hover(function() {
    $(".designer-emotions-xxj").css({"display" : "block"});
}, function() {
    $(".designer-emotions-xxj").css({"display" : "block"});
});
$(".about-comment-xxj img").eq(0).hover(function() {
    $(".designer-emotions-xxj").css({"display":"block"});
}, function() {
    $(".designer-emotions-xxj").css({"display":"block"});
});
$(".designer-emotions-xxj").click(function() {
    $(".designer-emotions-xxj").css({
        "display" : "none"
    });   
});

$(".designer-merchant-xxj h2").eq(0).click(function() {
    $(this).toggleClass('designer-red-xxj');   
});
$(".designer-show-xxj div").click(function() {
    $(this).addClass('designer-white-xxj').siblings().removeClass('designer-white-xxj')
});
for (var i = 1; i <= 5; i++) {
    $(".designer-sify-xxj span").eq(i).click(function() {
        $(".designer-sify-xxj div").css({
            "display" : "block"
        });
        $(this).addClass('designer-select-xxj').siblings().removeClass('designer-select-xxj')
    });
};
$(".designer-sify-xxj strong").click(function() {
     $(this).addClass('designer-select-xxj').siblings().removeClass('designer-select-xxj')
});
$(".designer-sify-xxj p span").click(function() {
     $(this).addClass('designer-select-xxj').siblings().removeClass('designer-select-xxj')
});
$(".designer-tab-xxj span").click(function() {
    $(this).css({
        "background" : "red",
        "color" : "#fff"
    });
    $(this).siblings().css({
        "background" : "#fff",
        "color" : "#000"
    })
});
// 回复消息框
$(".designer-people-com-xxj em").hover(function() {
    $(this).css({
        "borderColor" : "#000",
        "color" : "#000"
    });
}, function() {
    $(this).css({
        "borderColor" : "#eee",
        "color" : "#ccc"
    });
});
// 广告渐变
var index = 0;
function show() {
    $(".designer-ad-xxj p").eq(index).fadeIn().siblings().fadeOut()
    index++;
    if (index >= 4) {
        index = 0;
    };
    return index;
}
var time = setInterval(show, 2000);
// 左控制键
$(".designer-ad-xxj span").eq(0).click(function() {
    index = index - 1;
    if (index < 0) {
        index = 3;
    };
    $(".designer-ad-xxj p").eq(index - 1).stop(true,true).fadeIn().siblings().stop(true,true).fadeOut();
});
// 右控制键
$(".designer-ad-xxj span").eq(1).click(function() {
    index = index + 1;
    if (index > 3) {
        index = 0;
    };
    $(".designer-ad-xxj p").eq(index).stop(true,true).fadeIn().siblings().stop(true,true).fadeOut();
});
// 鼠标移入出现控制键
$(".designer-ad-xxj").hover(function() {
    $(".designer-ad-xxj span").eq(0).stop(true, true).animate({
        "left" : "0"
    });
    $(".designer-ad-xxj span").eq(1).stop(true, true).animate({
        "right" : "0"
    });
    clearInterval(time);
}, function() {
    time = setInterval(show,2000);
    $(".designer-ad-xxj span").eq(0).stop(true, true).animate({
        "left" : "-30px"
    });
    $(".designer-ad-xxj span").eq(1).stop(true, true).animate({
        "right" : "-30px"
    });
});
// 活动页
$(".activity-caption-xxj a").click(function() {
    $(this).addClass('activity-caption-xxj-select').siblings().removeClass('activity-caption-xxj-select');
    $("b").animate({
        "marginLeft" : ($(this).index()) * 98 + 10 + "px"
    });
});
$(".activity-span-xxj span").click(function() {
    $(this).addClass('activity-caption-xxj-select').siblings().removeClass('activity-caption-xxj-select');
});

// 资讯页面
$(".caption-xxj a").click(function() {
    $(this).addClass('massage-caption-xxj-select').siblings().removeClass('massage-caption-xxj-select');
    $(".massage-b").animate({
        "marginLeft" : ($(this).index()) * 98 + 10 + "px"
    });
});
$(".massage-span-xxj span").click(function() {
    $(this).addClass('massage-caption-xxj-select').siblings().removeClass('massage-caption-xxj-select');
});
$(".massage-span-xxj em").click(function(event) {
    $(this).addClass("em-sel").siblings("em").removeClass("em-sel");
});

// 点击爱心数加1
var cli = true;
$(".production-show-like-xxj").click(function() {
    if (cli == false) {
        alert("爱心太过泛滥了哦！");
    } else {
        var a = parseInt(document.getElementById('production-showem').innerText);
        a = a + 1;
        $("#production-showem").text(a);
        cli = false;
    }
});
//。。。。肖旭疆js结束。。。。。。。。。
//。。。。肖旭疆js结束。。。。。。。。。
//。。。。肖旭疆js结束。。。。。。。。。
//。。。。肖旭疆js结束。。。。。。。。。
//。。。。肖旭疆js结束。。。。。。。。。







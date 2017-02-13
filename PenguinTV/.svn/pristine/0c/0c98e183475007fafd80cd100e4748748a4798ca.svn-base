/* 
* @Author: anchen
* @Date:   2016-07-29 16:28:18
* @Last Modified by:   anchen
* @Last Modified time: 2016-08-03 18:31:25
*/

$(document).ready(function(){
    //设置内容上外边距
    var winHeight = $(window).height();
    var broSisnowPic = $(".bro-sis-now-pic").height();
    var broSisnowWord = $(".now-bro-sis-word").height();
    $(".now-bro-sis-con").css({
        "margin-top": (winHeight - broSisnowPic - broSisnowWord)/2 + "px"
    });
    var familynowPic = $(".now-pic-group").height();
    var familynowWord = $(".now-family-word").height();
    $(".now-pic-group").css({
        "top": (winHeight - familynowPic - familynowWord)/2 + "px"
    });
    var nowpicGroupheight = $(".now-pic-group").height();
    var nowpicGrouptop = parseInt($(".now-pic-group").css("top"));
    var nowfamilywordTop = nowpicGroupheight + nowpicGrouptop;
    $(".now-family-word").css({
        "top": nowfamilywordTop + "px"
    })
    //兄妹 效果
    var brosisPast = document.querySelector(".before-bro-sis-wlf img");
    var brosisNow = document.querySelector(".bro-sis-now-pic");
    brosisPast.addEventListener("webkitAnimationEnd",function() {
        $(".before-bro-sis-wlf").hide();
        $(".now-bro-sis-wlf").show();
        $(".bro-sis-now-pic").css({
            "-webkit-animation" : "Nowbrosis 5s",
            "animation" : "Nowbrosis 5s"
        });
    }, false);
    brosisNow.addEventListener("webkitAnimationEnd",function() {
            $(".now-bro-sis-word p").eq(0).css({"display":"block"}).textillate({
                    selector: '.tit',
                    loop: false,
                    minDisplayTime: 2000,
                    initialDelay: 0,
                    autoStart: true,
                    inEffects: [],
                    in: {
                         effect: 'fadeInLeftBig',
                        delayScale: 2,
                        delay: 50,
                        sync: false,
                        shuffle: false,
                        reverse: false,
                        callback: function () {
                            $(".now-bro-sis-word p").eq(1).css({"display" : "block"}).textillate({
                                selector: '.tit',
                                loop: false,
                                minDisplayTime: 2000,
                                initialDelay: 0,
                                autoStart: true,
                                inEffects: [],
                                in: {
                                     effect: 'fadeInLeftBig',
                                    delayScale: 2,
                                    delay: 50,
                                    sync: false,
                                    shuffle: false,
                                    reverse: false,
                                    callback: function () {
                                        $(".now-bro-sis-word p").eq(2).css({"display" : "block"}).textillate({
                                            selector: '.tit',
                                            loop: false,
                                            minDisplayTime: 2000,
                                            initialDelay: 0,
                                            autoStart: true,
                                            inEffects: [],
                                            in: {
                                                 effect: 'fadeInLeftBig',
                                                delayScale: 2,
                                                delay: 50,
                                                sync: false,
                                                shuffle: false,
                                                reverse: false,
                                                callback: function () {
                                                    $(".now-bro-sis-word .next-hyq").fadeIn();
                                                }
                                            }
                                        })
                                    }
                                }
                            })
                        },
                    }   
                })
    },false);
    // 兄妹转阖家
    // $(".now-bro-sis-word .next-hyq").on("tap", function() {
    //     $(".now-bro-sis-wlf").fadeOut(2000).siblings(".family-wlf").fadeIn(3000, function() {
    //         $(".before-boy").fadeOut(4000, function() {
    //             $(".before-dad").fadeOut(3000).siblings(".before-mom").fadeOut(3000);
    //             $(".before-sofa").fadeOut(3000,function() {
    //                 $(".now-sofa").fadeIn(2000);
    //                 $(".now-grama").fadeIn(3000).siblings(".now-grapa").fadeIn(3000, function() {
    //                     $(".now-dad").fadeIn(3000, function() {
    //                         $(".before-table").fadeOut(2000);
    //                         $(".tele-bg").fadeOut(2000, function() {
    //                             $(".now-mom").fadeIn(2000).siblings(".now-boy").fadeIn(2000, function() {
    //                                 $(".now-tele-bg").fadeIn(3000,function() {
    //                                     $(".now-family-word p").eq(0).css({"display":"block"}).textillate({
    //                                             selector: '.tit',
    //                                             loop: false,
    //                                             minDisplayTime: 2000,
    //                                             initialDelay: 0,
    //                                             autoStart: true,
    //                                             inEffects: [],
    //                                             in: {
    //                                                  effect: 'fadeInLeftBig',
    //                                                 delayScale: 2,
    //                                                 delay: 50,
    //                                                 sync: false,
    //                                                 shuffle: false,
    //                                                 reverse: false,
    //                                                 callback: function () {
    //                                                     $(".now-family-word p").eq(1).css({"display" : "block"}).textillate({
    //                                                         selector: '.tit',
    //                                                         loop: false,
    //                                                         minDisplayTime: 2000,
    //                                                         initialDelay: 0,
    //                                                         autoStart: true,
    //                                                         inEffects: [],
    //                                                         in: {
    //                                                              effect: 'fadeInLeftBig',
    //                                                             delayScale: 2,
    //                                                             delay: 50,
    //                                                             sync: false,
    //                                                             shuffle: false,
    //                                                             reverse: false,
    //                                                             callback: function () {
    //                                                                 $(".now-family-word p").eq(2).css({"display" : "block"}).textillate({
    //                                                                     selector: '.tit',
    //                                                                     loop: false,
    //                                                                     minDisplayTime: 2000,
    //                                                                     initialDelay: 0,
    //                                                                     autoStart: true,
    //                                                                     inEffects: [],
    //                                                                     in: {
    //                                                                          effect: 'fadeInLeftBig',
    //                                                                         delayScale: 2,
    //                                                                         delay: 50,
    //                                                                         sync: false,
    //                                                                         shuffle: false,
    //                                                                         reverse: false,
    //                                                                         callback: function () {
    //                                                                             $(".now-family-word p").eq(3).css({"display" : "block"}).textillate({
    //                                                                                 selector: '.tit',
    //                                                                                 loop: false,
    //                                                                                 minDisplayTime: 2000,
    //                                                                                 initialDelay: 0,
    //                                                                                 autoStart: true,
    //                                                                                 inEffects: [],
    //                                                                                 in: {
    //                                                                                      effect: 'fadeInLeftBig',
    //                                                                                     delayScale: 2,
    //                                                                                     delay: 50,
    //                                                                                     sync: false,
    //                                                                                     shuffle: false,
    //                                                                                     reverse: false,
    //                                                                                     callback: function () {
    //                                                                                         $(".now-family-word .next-hyq").fadeIn();
    //                                                                                     }
    //                                                                                 }
    //                                                                             })
    //                                                                         }
    //                                                                     }
    //                                                                 })
    //                                                             }
    //                                                         }
    //                                                     })
    //                                                 },
    //                                             }   
    //                                         })
    //                                 });
    //                             })
    //                         })
    //                     })
    //                 })
    //             });
    //         })
    //     });
    // });    
    $(".now-bro-sis-word .next-hyq").on("tap", function() {
        $(".now-bro-sis-wlf").fadeOut(2000).siblings(".family-wlf").fadeIn(3000, function() {
            $(".before-boy").fadeOut(4000, function() {
                $(".before-dad").fadeOut(3000).siblings(".before-mom").fadeOut(3000);
                $(".before-table").fadeOut(2000);
                $(".before-sofa").fadeOut(3000,function() {
                    $(".now-sofa").fadeIn(2000);
                    $(".now-grama").fadeIn(3000).siblings(".now-grapa").fadeIn(3000, function() {
                        $(".now-dad").fadeIn(3000, function() {
                            $(".tele-bg").fadeOut(2000, function() {
                                $(".now-mom").fadeIn(2000).siblings(".now-boy").fadeIn(2000, function() {
                                    $(".now-tele-bg").fadeIn(3000,function() {
                                        $(".now-family-word p").eq(0).css({"display":"block"}).textillate({
                                                selector: '.tit',
                                                loop: false,
                                                minDisplayTime: 2000,
                                                initialDelay: 0,
                                                autoStart: true,
                                                inEffects: [],
                                                in: {
                                                     effect: 'fadeInLeftBig',
                                                    delayScale: 2,
                                                    delay: 50,
                                                    sync: false,
                                                    shuffle: false,
                                                    reverse: false,
                                                    callback: function () {
                                                        $(".now-family-word p").eq(1).css({"display" : "block"}).textillate({
                                                            selector: '.tit',
                                                            loop: false,
                                                            minDisplayTime: 2000,
                                                            initialDelay: 0,
                                                            autoStart: true,
                                                            inEffects: [],
                                                            in: {
                                                                 effect: 'fadeInLeftBig',
                                                                delayScale: 2,
                                                                delay: 50,
                                                                sync: false,
                                                                shuffle: false,
                                                                reverse: false,
                                                                callback: function () {
                                                                    $(".now-family-word p").eq(2).css({"display" : "block"}).textillate({
                                                                        selector: '.tit',
                                                                        loop: false,
                                                                        minDisplayTime: 2000,
                                                                        initialDelay: 0,
                                                                        autoStart: true,
                                                                        inEffects: [],
                                                                        in: {
                                                                             effect: 'fadeInLeftBig',
                                                                            delayScale: 2,
                                                                            delay: 50,
                                                                            sync: false,
                                                                            shuffle: false,
                                                                            reverse: false,
                                                                            callback: function () {
                                                                                $(".now-family-word p").eq(3).css({"display" : "block"}).textillate({
                                                                                    selector: '.tit',
                                                                                    loop: false,
                                                                                    minDisplayTime: 2000,
                                                                                    initialDelay: 0,
                                                                                    autoStart: true,
                                                                                    inEffects: [],
                                                                                    in: {
                                                                                         effect: 'fadeInLeftBig',
                                                                                        delayScale: 2,
                                                                                        delay: 50,
                                                                                        sync: false,
                                                                                        shuffle: false,
                                                                                        reverse: false,
                                                                                        callback: function () {
                                                                                            $(".now-family-word .next-hyq").fadeIn();
                                                                                        }
                                                                                    }
                                                                                })
                                                                            }
                                                                        }
                                                                    })
                                                                }
                                                            }
                                                        })
                                                    },
                                                }   
                                            })
                                    });
                                })
                            })
                        })
                    })
                });
            })
        });
    }); 
    // 阖家转文案页
    $(".now-family-word .next-hyq").on("tap", function() {
        window.location.href = "cn/copy-write.html";
    })    
})
if($('textarea[name=comment]').data("dir")==undefined || $('textarea[name=comment]').data("dir")=='') $('textarea[name=comment]').data("dir",'qq');
var smiles1 = '<a href="javascript:facebox();">插入表情(点此显示表情图片)</a>';
var smiles='';
smiles += '<style>';
smiles += '.face_box_content{display:none;background:#FFF;border:1px solid #CCC;height:135px;width:360px;z-index:999;padding:2px;position:fixed;top:30%;left:20%;border-radius:2px 2px 2px 2px;_position:absolute;_left:20%;_margin-top:180px;_top:expression(eval(document.documentElement.scrollTop));}';
smiles += '.face_box_content a{color:#00a9e9;text-decoration:none;font-size:14px;font-weight:bold;font-weight: 700;font-family: Verdana,Geneva,Tahoma,Arial,"Microsoft YaHei",SimSun;}';
smiles += '.face_box_content a:hover{color:#8bbf00;text-decoration: none;}';
smiles += '.face_box_content ul li{list-style:none outside none;}';
smiles += '.W_close{height:20px;overflow:hidden;position:absolute;right:8px;text-align:center;width:20px;}';
smiles += '.face_box_content .layer_faces{width:100%;}';
smiles += '.face_tab_nosep{line-height:23px;margin:0 0 5px;padding:5px 0 0 10px;}';
smiles += '.face_tab_nosep span.right{float:right;padding:0 20px 0 0;width:53px;}';
smiles += '.face_tab_nosep .t_itm{white-space:nowrap;float:left;}';
smiles += '.face_tab_nosep .t_lk{border-radius:2px 2px 2px 2px;display:block;line-height:22px;padding:0 5px;cursor:pointer;}';
smiles += '.tag_current .t_lk{background-color:#E6E6E6;}';
smiles += '.face_detail{float:left;padding:0 8px 10px;}';
smiles += '.faces_list li{background:#FEF9E7;border:1px solid #FCE089;cursor:pointer;float:left;height:22px;margin:-1px 0 0 -1px;overflow:hidden;padding:4px 2px;text-align:center;width:26px;}';
smiles += '.faces_list li:hover{background:#FFF9EC;border:1px solid #0095CD;position:relative;z-index:2;}';
smiles += '.face_clearfix:after{clear:both;content:".";display:block;height:0;visibility:hidden;}</style>';



smiles += '<div class="face_box_content">';
smiles += '<div class="layer_faces">';
smiles += '<div class="face_tab_nosep">';
smiles += '<span class="right"><a class="W_close" title="关闭" node-type="close" href="javascript:facebox();">X</a></span>';
smiles += '<ul class="face_pftb_ul face_clearfix" style="width:100%;">';
smiles += '<li class="t_itm tag_current"><a class="t_lk" rel="qq" onclick="setface($(this),\'qq\');">QQ</a></li>';
smiles += '<li class="t_itm"><a class="t_lk" rel="wb" onclick="setface($(this),\'wb\');">微博</a></li>';
smiles += '<li class="t_itm"><a class="t_lk" rel="xlh" onclick="setface($(this),\'xlh\');">浪小花</a></li>';
smiles += '</ul>';
smiles += '</div>';
smiles += '<div class="face_detail">';
smiles += '<ul class="faces_list face_clearfix">';

for (var i = 1; i <= 33; i++) {
smiles += '<li class="face_li_action"><img src="'+blog_url+'images/face/'+$('textarea[name=comment]').data("dir")+'/'+i+'.gif" onclick="putface(\''+$('textarea[name=comment]').data("dir")+'\',\''+i+'\');" class="iu-smiley-select"></li>';
}

smiles += '</ul></div></div>';

function putface(dir,id) {$('textarea[name=comment]').insertContent('[:'+dir+'#' + id + ':]')}

function facebox() {
$('.face_box_content').toggle();
$('textarea[name=comment]').focus();
}

function setface(obj,ftypx){
var ftyp=obj.attr("rel");
$('textarea[name=comment]').data("dir",ftyp);
$('.t_itm').removeClass('tag_current');
obj.parent().addClass("tag_current");
var faceli='';
for (var i = 1; i <= 33; i++) {faceli += '<li class="face_li_action"><img src="'+blog_url+'images/face/'+$('textarea[name=comment]').data("dir")+'/'+i+'.gif" onclick="putface(\''+$('textarea[name=comment]').data("dir")+'\',\''+i+'\');" class="iu-smiley-select"></li>';}
$('.faces_list').empty();
$('.faces_list').append(faceli);
}

$.fn.extend({

    insertContent: function(myValue) {

        var $t = $(this)[0];

        if (document.selection) {

            this.focus();

            sel = document.selection.createRange();

            sel.text = myValue;

            this.focus()

        } else if ($t.selectionStart || $t.selectionStart == '0') {

            var startPos = $t.selectionStart;

            var endPos = $t.selectionEnd;

            var scrollTop = $t.scrollTop;

            $t.value = $t.value.substring(0, startPos) + myValue + $t.value.substring(endPos, $t.value.length);

            this.focus();

            $t.selectionStart = startPos + myValue.length;

            $t.selectionEnd = startPos + myValue.length;

            $t.scrollTop = scrollTop

        } else {

            this.value += myValue;

            this.focus()

        }

    }

}) 

$('textarea[name=comment]').before(smiles1);

$('body').append(smiles);


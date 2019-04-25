<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="author" content="order by dede58.com"/>
    <title>我的购物车-小米商城</title>
    <link rel="stylesheet" type="text/css" href="/secondhand/Public/Q-css/style.css">
    <link rel="stylesheet" type="text/css" href="/secondhand/Public/Q-css/style.css">
    <link rel="stylesheet" type="text/css" href="/secondhand/Public/Q-css/style11.css">
    <link rel="stylesheet" type="text/css" href="/secondhand/Public/naranja/naranja.min.css">
    <script type="text/javascript" src="/secondhand/Public/address/city-picker.data.js"></script>
    <script type="text/javascript" src="/secondhand/Public/address/city-picker.js"></script>
    <link rel="stylesheet" type="text/css" href="/secondhand/Public/address/css/city-picker.css">
    <!-- 最新版本的 Bootstrap 核心 CSS 文件 -->
    <link rel="stylesheet" href="/secondhand/Public/bootstrap-3.3.7/css/bootstrap.min.css">
    <!-- 最新的 Bootstrap 核心 JavaScript 文件 -->
    <script src="/secondhand/Public/bootstrap-3.3.7/js/bootstrap.min.js"></script>
</head>
<body>
<!-- start header -->
<!--end header -->
<style type="text/css">

</style>
<!-- start banner_x -->
<div class="banner_x center">
    <a href="<?php echo U('Home/Main/main');?>">
        <div class="logo fl"></div>
    </a>

    <div class="wdgwc fl ml40">我的购物车</div>
    <div class="wxts fl ml20">温馨提示：产品是否购买成功，以最终下单为准哦，请尽快结算</div>
    <div class="dlzc fr">
        <ul id="userInfo">
        </ul>
    </div>
    <div class="clear"></div>
</div>
<div class="xiantiao"></div>
<form action="<?php echo U('Home/Pay/xiangqing2');?>" method="post" id="carForm">

    <div class="gwcxqbj" style="height: auto">

        <div class="gwcxd center">
            <div class="top2 center">
                <div class="sub_top fl">
                    <input type="checkbox" id="checkall" class="quanxuan"/>全选
                </div>
                <div class="sub_top fl">商品名称</div>
                <div class="sub_top fl">单价</div>
                <div class="sub_top fl">数量</div>
                <div class="sub_top fl">小计</div>
                <div class="sub_top fr">操作</div>
                <div class="clear"></div>
            </div>

            <div id="carList">
                <?php if(is_array($carinfo)): $k = 0; $__LIST__ = $carinfo;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$carinfo): $mod = ($k % 2 );++$k;?><div class="content2 center">
                        <div class="sub_content fl check">
                            <input type="checkbox" onclick="onecheck(this)" name="check[]"
                                   value="<?php echo ($carinfo['goods_sn']); ?>"
                                   class="danxuan"
                                   data="<?php echo ($carinfo['goods_sn']); ?>_<?php echo ($carinfo['shop_price']); ?>"
                                   style="margin-top: 60px"/>
                        </div>
                        <div class="sub_content fl"><img style="width: 55px;height: 55px; margin-top: 40px"
                                                         src="<?php echo ($carinfo['tupian']); ?>"></div>
                        <div class="sub_content fl ft20"><?php echo ($carinfo['goods_name']); ?></div>
                        <div class="sub_content fl dj"><?php echo ($carinfo['shop_price']); ?></div>
                        <input type="hidden" name="shop_price[]" value="<?php echo ($carinfo['shop_price']); ?>"/>
                        <div class="sub_content fl">
                            <span onclick="preduce(this)" data-dj="<?php echo ($carinfo['shop_price']); ?>"
                                  style="cursor: pointer;">-</span>
                            <input style="width: 30px;height: 30px;text-align: center" class="goods_sl" type="text"
                                   name="goods_sl[]" value="<?php echo ($carinfo['goods_sl']); ?>"
                                   step="1" min="1" max="<?php echo ($carinfo['kc']); ?>" onchange="change(this);"/>
                            <input type="hidden" value="<?php echo ($carinfo['kc']); ?>"/>
                            <span onclick="zengjia(this)" data-dj="<?php echo ($carinfo['shop_price']); ?>"
                                  style="cursor: pointer;">+</span>
                        </div>
                        <div class="sub_content fl prize" id="car_count<?php echo ($k); ?>"><?php echo ($carinfo['count']); ?></div>
                        <div class="sub_content fl"><a href="#" onclick="remove(this,'<?php echo ($carinfo['goods_sn']); ?>')">×</a>
                        </div>
                        <div class="clear"></div>
                    </div>
                    <input type="hidden" name="goods_sn[]" value="<?php echo ($carinfo['goods_sn']); ?>"/><?php endforeach; endif; else: echo "" ;endif; ?>
            </div>
        </div>
        <div class="jiesuandan mt20 center">
            <div class="tishi fl ml20">
                <ul>
                    <li><a href="<?php echo U('Home/Main/main','','');?>">继续购物</a></li>
                    <li>|</li>
                    <li>共<span><?php echo ($k); ?></span>件商品，已选择<span id="xuanzhongjianshu">0</span>件</li>
                    <div class="clear"></div>
                </ul>
            </div>
            <div class="jiesuan fr">
                <div class="jiesuanjiage fl">合计（不含运费）：<span id="allNum">0.00元</span></div>
                <div class="jsanniu fr"><input class="jsan" id="jiesuan" type="submit"

                                               value="去结算"/>
                </div>
                <input type="hidden" value="<?php echo ($k); ?>"/>
                <div class="clear"></div>
            </div>
            <div class="clear"></div>
        </div>
    </div>
</form>

<!-- footer -->
<footer class="center">

    <div class="mt20">小米商城|MIUI|米聊|多看书城|小米路由器|视频电话|小米天猫店|小米淘宝直营店|小米网盟|小米移动|隐私政策|Select Region</div>
    <div>©mi.com 京ICP证110507号 京ICP备10046444号 京公网安备11010802020134号 京网文[2014]0059-0009号</div>
    <div>违法和不良信息举报电话：185-0130-1238，本网站所列数据，除特殊说明，所有数据均出自我司实验室测试</div>
</footer>
<script type="text/javascript" src="/secondhand/Public/naranja/naranja.js"></script>
<script type="text/javascript" src="/secondhand/Public/jquery/jquery-3.3.1.min.js"></script>
<script>
    //表单的提交
    function commit(k) {
        var arr = [];
        for (var i = 0; i < $('#carList').find('.danxuan').length; i++) {
            info = $('#carList').find('.danxuan').eq(i).attr('data');
            val = $('#carList').find('.danxuan').eq(i).attr('value');
            sl = $('#carList').find('.goods_sl').eq(i).val();
            info += "_" + val + "_" + sl;
            arr.push(info);
        }
        $.ajax({
            url: "<?php echo U('Home/Pay/xiangqing2','','');?>",
            type: 'post',
            data: {"info": arr, "k": k},
            dataType: 'json',
            success: function (data) {
                console.log(data)
                window.location.href = '<?php echo U("Home/Pay/xiangqing3");?>';
            }, error: function (data) {
            }
        })

    }


    //减少

    function preduce(jianshao) {
        var price = $(jianshao).parent().prev().val();
        sl = parseInt($(jianshao).next().val());//数量
        sl = sl - 1;
        $(jianshao).next().val(sl);
        if ($(jianshao).next().val() <= 1) {
            $(jianshao).parent().next().html(price);
            $(jianshao).next().val(1);
        } else {
            $(jianshao).parent().next().html(sl * price + ".00");
        }
        checked = $(jianshao).parent().parent().find('.check').children().prop('checked');//获取复选框的状态

        if (checked) {
            allNum = parseFloat($("#allNum").html());
            var dj = parseFloat($(jianshao).attr("data-dj"));
            allNum -= dj;
            if (sl < 1) {
                return;
            }
            $("#allNum").text(allNum + ".00元");
        }
    }

    //增加
    function zengjia(zengjia) {
        var price = $(zengjia).parent().prev().val();//单价
        var kc = parseInt($(zengjia).prev().val());//库存
        var sl = parseInt($(zengjia).prev().prev().val());//数量
        sl += 1;
        if (kc < sl) {
            alert("商品已达上限数量");
            $(zengjia).prev().prev().val(kc);
            return;
        }
        $(zengjia).prev().prev().val(sl);
        parseInt($(zengjia).parent().next().html(sl * price + ".00"));
        checked = $(zengjia).parent().parent().find('.check').children().prop('checked');//获取复选框的状态
        if (checked) {
            allNum = parseFloat($("#allNum").html());
            var dj = parseFloat($(zengjia).attr("data-dj"));
            allNum += dj;

            $("#allNum").text(allNum + ".00元");
        }
    }

    //调取模态框
    function remove(obj, id) {
        $.ajax({
            url: '<?php echo U("Home/Shopping/del","","");?>',
            dataType: 'json',
            type: 'post',
            data: 'goods_sn=' + id,
            success: function (data) {
                alert(data);
                window.location.reload();
            }
        });

    }

    //选中一个的时候
    function onecheck(one) {

        //当点击完复选框，把全选改变为true
        var t = $('#carList').find('[type=checkbox]:checked').length;
        var k = $('#carList').find('[type=checkbox]').length;
        if (t == k) {
            $('#checkall').prop('checked', true);
        } else {
            $('#checkall').prop('checked', false);
        }
        if ($(one).prop('checked')) {
            //$(one).prop('value',true);
            if ($('#checkall').prop('checked')) {
                var o = parseInt($('#xuanzhongjianshu').html());
                $('#xuanzhongjianshu').html(o + 1);
            } else {
                var o = parseInt($('#xuanzhongjianshu').html());
                $('#xuanzhongjianshu').html(o + 1);
            }
            var p = $(one).parent().parent().find('.prize').text();
            chageP = parseFloat(p);
            var allNum = parseFloat($("#allNum").text());
            changeAllNum = allNum + chageP;
            $("#allNum").text(changeAllNum + ".00元");
            console.log(changeAllNum);
        } else {
            //$(one).prop('value',false);
            if ($('#checkall').prop('checked')) {
                var o = parseInt($('#xuanzhongjianshu').html());
                $('#xuanzhongjianshu').html(o - 1);
            } else {
                var o = parseInt($('#xuanzhongjianshu').html());
                $('#xuanzhongjianshu').html(o - 1);
            }
            var p = $(one).parent().parent().find('.prize').text();//获取的小计的价格
            chageP = parseFloat(p);
            var allNum = parseFloat($("#allNum").text());
            changeAllNum = allNum - chageP;
            $("#allNum").text(changeAllNum + ".00元");
        }
    }

    //页面加载事件
    $(function () {
        var allNum = 0;
        $("#checkall").on("change", function () {
            $("#carList").find('input[type=checkbox]').prop('checked', true);
            if ($(this).prop('checked')) {
                //  $("#carList").find('.danxuan').prop("value",true);
                var o = $("input[type='checkbox']:checked").length;
                $('#xuanzhongjianshu').html(o - 1);
                var aPrize = $("#carList").find(".prize");
                console.log(aPrize);
                for (var i = 0; i < aPrize.length; i++) {
                    allNum += parseFloat(aPrize.eq(i).html());
                }
                $("#allNum").text(allNum + ".00元");
                console.log(allNum);
            } else {
                // $("#carList").find('.danxuan').prop("value",false);
                $('#xuanzhongjianshu').html(0);
                allNum = 0;
                $("#allNum").text(allNum + ".00元");
                $("#carList").find('input[type=checkbox]').prop('checked', false);
            }
        })
    })

    $(document).ready(function () {
        if (userId != null && userId != "") {
            $('#userInfo').append('<li id="user"><?php echo (session('username')); ?></li>');
            $('#userInfo').append('<li><a>|</a></li>');
            $('#userInfo').append('<li><a href="<?php echo U('Home/MyInfo/myInfo');?>" style="cursor:pointer">个人中心</a></li>');
            $('#userInfo').append('<li><a>|</a></li>');
            $('#userInfo').append('<li><a style="cursor:pointer">消息通知</a></li>');
            $('#userInfo').append('<li><a>|</a></li>');
            $('#userInfo').append("<li><a style=\"cursor:pointer\" href='<?php echo U("Home/OrderCentre/orderCentre");?>'>我的订单</a></li>");
            $('#userInfo').append('<li><a>|</a></li>');
            $('#userInfo').append("<li><a style=\"cursor:pointer\" href='<?php echo U("Home/Main/exitLogin");?>'>退出</a></li>");
        } else {
            $('#userInfo').append("<li><a style=\"cursor:pointer\" href='<?php echo U("Home/Login/login");?>'>登陆</a></li>");
            $('#userInfo').append('<li><a>|</a></li>');
            $('#userInfo').append("<li><a style=\"cursor:pointer\" href='<?php echo U("Home/Register/register");?>'>注册</a></li>");
        }
    });

    var userId = "<?php echo session('userid');?>";//用户id
    var message = '';//提示消息

    //弹出框
    function narn(type, message) {
        naranja()[type]({
            title: '新消息提示',
            text: message,
            timeout: 3000,
        })
    }

    //检查是否登陆
    function checkLogin() {
        if (userId != null && userId != "") {
            window.location.href = "<?php echo U('Home/Shopping/shopping');?>";
        } else {
            message = '请先选择登陆！'
            narn('error', message);
        }
    }
</script>
</body>
</html>
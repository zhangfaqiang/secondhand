<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="author" content="order by dede58.com"/>
    <title><?php echo ($goodsinfo['goods_name']); ?>立即购买</title>

    <link rel="stylesheet" type="text/css" href="/secondhand/Public/Q-css/style.css">
    <link rel="stylesheet" type="text/css" href="/secondhand/Public/Q-css/style11.css">
    <link rel="stylesheet" type="text/css" href="/secondhand/Public/naranja/naranja.min.css">
    <script type="text/javascript" src="/secondhand/Public/jquery/jquery-3.3.1.min.js"></script>
    <script type="text/javascript" src="/secondhand/Public/address/city-picker.data.js"></script>
    <script type="text/javascript" src="/secondhand/Public/address/city-picker.js"></script>
    <Link rel="stylesheet" type="text/css" href="/secondhand/Public/address/css/city-picker.css">
    <script type="text/javascript" src="/secondhand/Public/naranja/naranja.js"></script>
    <script type="text/javascript">
        function fuckyou() {
            window.close(); //关闭当前窗口(防抽)
            window.location = "<?php echo U('Home/pay/tishi');?>"; //将当前窗口跳转置空白页
        }

        function ck() {
            console.profile();
            console.profileEnd(); //我们判断一下profiles里面有没有东西，如果有，肯定有人按F12了，没错！！
            if (console.clear) {
                console.clear()
            }
            ;
            if (typeof console.profiles == "object") {
                return console.profiles.length > 0;
            }
        }

        function hehe() {
            if ((window.console && (console.firebug || console.table && /firebug/i.test(console.table()))) || (typeof opera == 'object' && typeof opera.postError == 'function' && console.profile.length > 0)) {
                fuckyou();
            }
            if (typeof console.profiles == "object" && console.profiles.length > 0) {
                fuckyou();
            }
        }

        hehe();
        window.onresize = function () {
            if ((window.outerHeight - window.innerHeight) > 0) //判断当前窗口内页高度和窗口高度，如果差值大于200，那么呵呵
                fuckyou();
        }
    </script>


    <script type="text/javascript">
        $(document).ready(function () {
            $("#city-picker1").citypicker();
            // 获取按钮框，并绑定点击事件，点击时触发
            $("#reset").click(function () {
                // 获取输入框，并在点击按钮后清空输入框中内容
                $("#city-picker1").citypicker("reset");
            })
            //查询购物车的数量
            $.ajax({
                url: '<?php echo U("Home/GoodsDetails/count");?>',//商品的数量地址
                dataType: 'json',
                type: 'post',
                success: function (data) {
                    console.log(data);
                    if (data == null || data == "") {
                        $('#car_shuliang').append('<span>(0)</span>');
                    } else {
                        $('#car_shuliang').append('<span>(' + data + ')</span>');
                    }
                }
            });
        });

    </script>

</head>
<style>

    #aa {
        position: relative;
        display: inline-block;
    }

    #bb {
        display: none;
        position: absolute;
        background-color: #f9f9f9;
        min-width: 200px;
        box-shadow: 0px 8px 16px 0px rgba(0, 0, 0, 0.2);
        padding: 12px 16px;
    }

    #aa:hover #bb {
        display: block;
    }
</style>

<body>
<!-- start header -->
<header>
    <div class="top center">
        <div class="left fl">
            <ul>
                <!--<li><a href="http://www.mi.com/" target="_blank">小米商城</a></li>-->
                <!--<li>|</li>-->
                <!--<li><a href="">MIUI</a></li>-->
                <!--<li>|</li>-->
                <!--<li><a href="">米聊</a></li>-->
                <!--<li>|</li>-->
                <!--<li><a href="">游戏</a></li>-->
                <!--<li>|</li>-->
                <!--<li><a href="">多看阅读</a></li>-->
                <!--<li>|</li>-->
                <!--<li><a href="">云服务</a></li>-->
                <!--<li>|</li>-->
                <!--<li><a href="">金融</a></li>-->
                <!--<li>|</li>-->
                <!--<li><a href="">小米商城移动版</a></li>-->
                <!--<li>|</li>-->
                <!--<li><a href="">问题反馈</a></li>-->
                <!--<li>|</li>-->
                <!--<li><a href="">Select Region</a></li>-->
                <div class="clear"></div>
            </ul>
        </div>
        <div class="right fr" onclick="checkLogin()">
            <div class="gouwuche fr"><a id="car_shuliang">购物车</a></div>
            <div class="fr">
                <ul id="userInfo">
                </ul>
            </div>
            <div class="clear"></div>
        </div>
        <div class="clear"></div>
    </div>
</header>
<!--end header -->

<!-- start banner_x -->
<div class="banner_x center">
    <a href="<?php echo U('Home/Main/main');?>">
        <div class="logo fl"></div>
    </a>
    <div style="margin-left: 25px" class="nav fl">
        <ul>
            <li><a href="#">手机配件</a></li>
            <li><a href="#">电玩随身听</a></li>
            <li><a href="#">相机/摄像机</a></li>
            <li><a href="#">电脑/电脑周边</a></li>
            <li><a href="#">手机品牌</a></li>
            <li><a href="#">女装</a></li>
            <li><a href="#">男装</a></li>
            <li><a href="#">配饰</a></li>
            <li><a href="#">生活用品</a></li>
            <li><a href="#">箱包</a></li>
        </ul>
    </div>
    <div id="ss">
    </div>
    <div class="search fr">
        <form action="" method="post">
            <div class="text fl">
                <input type="text" class="shuru" placeholder="小米6&nbsp;小米MIX现货">
            </div>
            <div class="submit fl">
                <input type="submit" class="sousuo" value="搜索"/>
            </div>
            <div class="clear"></div>
        </form>
        <div class="clear"></div>
    </div>
</div>
<!-- end banner_x -->


<!-- xiangqing -->
<form role="form" action="<?php echo U('Home/pay/xiangqing');?>" method="post">
    <input id="xiangqing_formid" type="hidden" value="<?php echo ($goodsinfo['goods_sn']); ?>"/>
    <input id="xiangqing_formgoods_name" type="hidden" value="<?php echo ($goodsinfo['goods_name']); ?>"/>
    <input id="xiangqing_formgoods_price" type="hidden" value="<?php echo ($goodsinfo['market_price']); ?>"/>
    <input id="input_kc" value="<?php echo ($goodsinfo['goods_number']); ?>" type="hidden"/>
    <div class="xiangqing">
        <div class="neirong w">
            <div class="xiaomi6 fl"><?php echo ($goodsinfo['goods_name']); ?></div>
            <input type="hidden" value="<?php echo ($goodsinfo['goods_id']); ?>" name="goods_id">
            <input type="hidden" value="<?php echo ($goodsinfo['shop_price']); ?>" name="shop_price">
            <nav class="fr">
                <li><a href="">概述</a></li>
                <li>|</li>
                <li><a href="">变焦双摄</a></li>
                <li>|</li>
                <li><a href="">设计</a></li>
                <li>|</li>
                <li><a href="">参数</a></li>
                <li>|</li>
                <li><a href="">F码通道</a></li>
                <li>|</li>
                <li><a href="">用户评价</a></li>
                <div class="clear"></div>
            </nav>
            <div class="clear"></div>
        </div>
    </div>

    <div class="jieshao mt20 w">
        <div class="left fl"><img id="tupian" src="<?php echo ($goodsinfo['goods_img']); ?>"></div>
        <div class="right fr">
            <div class="h3 ml20 mt20"><?php echo ($goodsinfo['goods_name']); ?></div>
            <div class="jianjie mr40 ml20 mt10"><?php echo ($goodsinfo['goods_desc']); ?>
            </div>
            <div class="jiage ml20 mt10"><?php echo ($goodsinfo['shop_price']); ?>元</div>
            <div class="ft20 ml20 mt20">选择收获地址:</div>


            <div style="position: relative;width: 443px;margin: 15px auto;"><!-- container -->

                <input id="city-picker1" name="city-picker1" readonly type="text" size="70" style="line-height: 30px;">
                <input id="reset" type="button" value="重置" style="float: right; margin-top:-27px;"/>
            </div>


            <div id="d" class="Spinner"></div>

            <div class="ft20 ml20 mt20">选择数量</div>


            <ul class="btn-numbox">
                <li>
                    <ul class="count">
                        <li><span id="num-jian" class="num-jian">-</span></li>
                        <li>
                            <input type="text" readonly class="input-num" id="input-num" name="input-num" value="1"/>
                        </li>
                        <li><span id="num-jia" class="num-jia">+</span></li>
                    </ul>
                </li>
                <li><span class="kucun" id="kc">（库存:<?php echo ($goodsinfo['goods_number']); ?>）</span></li>
            </ul>


            <div class="xqxq mt20 ml20" style="background-color: rgb(200, 200, 200);">
                <div class="top1 mt10">
                    <div class="left1 fl"><?php echo ($goodsinfo['goods_name']); ?></div>
                    <div class="right1 fr">全新单价：<?php echo ($goodsinfo['market_price']); ?>元</div>
                    <div class="clear"></div>
                </div>
                <div class="bot mt20 ft20 ftbc" id="zj">总计：<?php echo ($goodsinfo['shop_price']); ?>元</div>
            </div>
            <div class="xiadan ml20 mt20">
                <input class="jrgwc" type="submit" value="立即购买"/>

                <input class="jrgwc" type="button" onclick="addcar()" value="加入购物车"/>
            </div>
        </div>
        <div class="clear"></div>
    </div>
</form>
<!-- footer -->
<footer class="mt20 center">

    <div class="mt20">小米商城|MIUI|米聊|多看书城|小米路由器|视频电话|小米天猫店|小米淘宝直营店|小米网盟|小米移动|隐私政策|Select Region</div>
    <div>?mi.com 京ICP证110507号 京ICP备10046444号 京公网安备11010802020134号 京网文[2014]0059-0009号</div>
    <div>违法和不良信息举报电话：185-0130-1238，本网站所列数据，除特殊说明，所有数据均出自我司实验室测试</div>

</footer>

</body>


<script>


    var num_jia = document.getElementById("num-jia");
    var num_jian = document.getElementById("num-jian");
    var input_num = document.getElementById("input-num");
    var d = "<?php echo ($goodsinfo['goods_number']); ?>";//商品的数量
    //加商品
    num_jia.onclick = function () {
        var a = $('#input-num').val();//框的值
        var b = "<?php echo ($goodsinfo['shop_price']); ?>";//商品的价格
        input_num.value = parseInt(input_num.value) + 1;//框中值加一+
        $("#zj").text("总计：" + (parseInt(a) + 1) * b + "元");//计算总计的钱
        if (d == a) {
            alert("数量有限");
            input_num.value = d;//框中值加一+
            $("#zj").text("总计：" + (parseInt(d)) * b + "元")
        }
    }
    num_jian.onclick = function () {

        if (input_num.value <= 1) {
            input_num.value = 1;
        } else {
            input_num.value = parseInt(input_num.value) - 1;

            var a = $('#input-num').val();
            var c = "<?php echo ($goodsinfo['shop_price']); ?>";
            $("#zj").text("总计：" + (parseInt(a)) * c + "元");
        }
    }

    function addcar() {
        var goods_sn = $('#xiangqing_formid').val();
        var goods_name = $('#xiangqing_formgoods_name').val();
        var address = $('#city-picker1').val();
        var $good_sl = $('input[type=text][name=input-num]').val();
        var $shop_price = $('#xiangqing_formgoods_price').val();
        var $tupian = $('#tupian').attr('src');
        var kc = $("#input_kc").val();
        if (address == "") {
            alert("亲！请填写地址");
            return;
        }
        $.ajax({
            url: "<?php echo U('Home/Shopping/addcar','','');?>",
            type: 'post',
            dataType: 'json',
            data: {
                "tupian": $tupian,
                "shop_price": $shop_price,
                "goods_sn": goods_sn,
                "goods_name": goods_name,
                "address": address,
                "good_sl": $good_sl,
                "kc": kc
            },
            success: function (data) {
                alert("添加成功");
            }, error: function (data) {
                console.log(data)
            }
        })

    }
</script>

<script>
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

</script>
</html>
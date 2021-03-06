<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="author" content="order by dede58.com"/>
    <title>小米手机列表</title>
    <link rel="stylesheet" type="text/css" href="/secondhand/Public/Q-css/style.css">
    <link rel="stylesheet" type="text/css" href="/secondhand/Public/naranja/naranja.min.css">
    <script type="text/javascript" src="/secondhand/Public/naranja/naranja.js"></script>
</head>
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
            <li><a href="">手机配件</a></li>
            <li><a href="">电玩随身听</a></li>
            <li><a href="">相机/摄像机</a></li>
            <li><a href="">电脑/电脑周边</a></li>
            <li><a href="">手机品牌</a></li>
            <li><a href="">女装</a></li>
            <li><a href="">男装</a></li>
            <li><a href="">配饰</a></li>
            <li><a href="">生活用品</a></li>
            <li><a href="">箱包</a></li>
        </ul>
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

<!-- start banner_y -->
<!-- end banner -->

<!-- start danpin -->
<div class="danpin center">

    <div class="biaoti center" style="color: #5bc0de">类型:<?php echo ($title); ?></div>
    <br/>
    <br/>
    <br/>
    <br/>

    <div class="main center">
        <?php if(is_array($result)): $i = 0; $__LIST__ = $result;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$data): $mod = ($i % 2 );++$i;?><div class="mingxing fl mb20" style="border:2px solid #fff;width:230px;cursor:pointer;margin-right: 5px"
                 onmouseout="this.style.border='2px solid #fff'" onmousemove="this.style.border='2px solid red'">
                <div class="sub_mingxing"><a
                        href="<?php echo U('Home/GoodsDetails/goodsDetails',array('goods_id'=>$data['goods_id']));?>">
                    <img src="<?php echo ($data['thumb_img']); ?>"
                         alt=""></a></div>
                <div class="pinpai"><a href="./xiangqing.html" target="_blank"><?php echo ($data['goods_name']); ?></a></div>
                <div class="youhui">5.16早10点开售</div>
                <div class="youhui"><?php echo ($data['goods_desc']); ?></div>
                <div class="jiage"><?php echo ($data['shop_price']); ?>元</div>
            </div><?php endforeach; endif; else: echo "" ;endif; ?>

        <div class="clear"></div>
    </div>
</div>


<footer class="mt20 center" style="display: inline-block">
    <div class="mt20">小米商城|MIUI|米聊|多看书城|小米路由器|视频电话|小米天猫店|小米淘宝直营店|小米网盟|小米移动|隐私政策|Select Region</div>
    <div>©mi.com 京ICP证110507号 京ICP备10046444号 京公网安备11010802020134号 京网文[2014]0059-0009号</div>
    <div>违法和不良信息举报电话：185-0130-1238，本网站所列数据，除特殊说明，所有数据均出自我司实验室测试</div>

</footer>
</body>
</html>
<script type="text/javascript" src="/secondhand/Public/jquery/jquery-3.3.1.min.js"></script>
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
        //
        // $("#city-picker1").citypicker();
        // // 获取按钮框，并绑定点击事件，点击时触发
        // $("#reset").click(function () {
        //     // 获取输入框，并在点击按钮后清空输入框中内容
        //     $("#city-picker1").citypicker("reset");
        // })
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
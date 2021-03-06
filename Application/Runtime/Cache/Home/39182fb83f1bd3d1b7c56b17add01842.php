<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="author" content="order by dede58.com"/>
    <title>小米商城</title>
    <link rel="stylesheet" type="text/css" href="/secondhand/Public/Q-css/style.css">
    <link rel="stylesheet" href="/secondhand/Public/KF/css/style.css"/>
    <link rel="stylesheet" type="text/css" href="/secondhand/Public/naranja/naranja.min.css">
    <link rel="stylesheet" type="text/css" href="/secondhand/Public/Q-css/button.css">
    <script type="text/javascript" src="/secondhand/Public/KF/js/jquery-1.7.2.min.js"></script>
    <script type="text/javascript" src="/secondhand/Public/KF/js/script.js"></script>
    <script type="text/javascript" src="/secondhand/Public/naranja/naranja.js"></script>

</head>
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
            $('#userInfo').append('<li><a style="cursor:pointer">个人中心</a></li>');
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
<body>
<div id="online_qq_layer" show="1" style="right: 0px; display: block;">
<div id="online_qq_tab">
<div class="online_icon">
<a title="联系我们" id="floatTrigger" href="javascript:void(0);"></a>
</div>
</div>
<div id="onlineService">
<div class="online_windows overz">
<div class="online_w_top"> </div>
<!--online_w_top end-->
<div class="online_w_c overz">
<div class="online_bar collapse" id="onlineSort1">
<h2> <a href="javascript:;">在线客户服务</a> </h2>
<div class="online_content overz" id="onlineType1" style="display: block;">
<ul class="overz">
<li><a target="_blank" href="http://wpa.qq.com/msgrd?v=3&uin=827544120&site=qq&menu=yes"><img border="0" src="http://wpa.qq.com/pa?p=2:827544120:51" alt="我们竭诚为您服务！" title="我们竭诚为您服务！"/></a></li>
<li><a target="_blank" href="http://wpa.qq.com/msgrd?v=3&uin=1321743486&site=qq&menu=yes"><img border="0" src="http://wpa.qq.com/pa?p=2:1321743486:51" alt="我们竭诚为您服务！" title="我们竭诚为您服务！"/></a></li>
<li><a target="_blank" href="http://wpa.qq.com/msgrd?v=3&uin=1243443888&site=qq&menu=yes"><img border="0" src="http://wpa.qq.com/pa?p=2:1243443888:51" alt="我们竭诚为您服务！" title="我们竭诚为您服务！"/></a></li>
<li>电话：13983783166</li>
</ul>
</div>
<!--online_content end-->
</div>
<!--online_bar end-->
<div class="online_bar collapse" id="onlineSort2">
<h2> <a href="javascript:;">加盟合作咨询</a> </h2>
<div class="online_content overz" id="onlineType2" style="display: block;">
<ul class="overz">
<li><a target="_blank" href="http://wpa.qq.com/msgrd?v=3&uin=13983783166&site=qq&menu=yes"><img border="0" src="http://wpa.qq.com/pa?p=2:827544120:51" alt="我们竭诚为您服务！" title="我们竭诚为您服务！"/></a>
</li>
<li>电话：13983783166</li>
</ul>
</div>
</div>
<!--online_bar end-->
<div class="online_bar collapse" id="onlineSort3">
<h2> <a href="javascript:;">支付宝捐助</a> </h2>
<div class="online_content overz" id="onlineType3" style="display: block;"> <img src="/secondhand/Public/KF/images/qrcode.jpg" style="display: block;margin: 0 auto 5px;width: 90px"> </div>
</div>
<!--online_bar end-->
</div>
<!--online_w_c end-->
<div class="online_w_bottom"> </div>
<!--online_w_bottom end-->
</div>
<!--online_windows end-->
</div>
</div>

<!-- start header -->
<header>
    <div class="top center">
        <div class="left fl">
            <ul>
                <!--<li><a href="">小米商城</a></li>-->
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
    <a href="<?php echo U('Home/Main/main');?>" >
        <div class="logo fl"></div>
    </a>
    <a href="">
        <div class="ad_top fl"></div>
    </a>
    <div style="margin-left: 250px; margin-top: 50px;" class="nav fl">
        <div onclick="window.open('<?php echo U('Home/Release/release');?>','_self')" style="cursor:pointer"
             class="button_base b07_3d_double_roll">
            <div>我 要 卖</div>
            <div>我 要 卖</div>
            <div>我 要 卖</div>
            <div>我 要 卖</div>
        </div>
    </div>
    <div class="search fr">
        <form action="" method="post">
            <div class="text fl">
                <input type="text" class="shuru" placeholder="输入关键字进行查询">
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
<div class="banner_y center">
    <div class="nav">
        <ul>
            <li style="">
                <a href="#">手机配件</a>
                <div class="pop">
                    <div class="left fl">
                        <h4 style="margin-left: 20px;">手机配件</h4>
                        <div style="margin-top: -10px;">
                            <div class="xuangou_left fl">
                                <a href="<?php echo U('Home/Leibiao/leibiao');?>?brand_id=1&brand_name='手机壳'">
                                    <div class="img fl">
                                        <img style="width: 40px;height: 40px;"
                                             src="/secondhand/Public/Q-image/sjk.png" alt="">
                                    </div>
                                    <span class="fl">手机壳</span>
                                    <div class="clear"></div>
                                </a>
                            </div>
                            <div class="xuangou_left fl">
                                <a href="<?php echo U('Home/Leibiao/leibiao');?>?brand_id=2&brand_name='耳机'">

                                    <div class="img fl"><img style="width: 40px;height: 40px;"
                                                             src="/secondhand/Public/Q-image/ej.png" alt=""></div>
                                    <span class="fl">耳机</span>
                                    <div class="clear"></div>
                                </a>
                            </div>
                            <div class="xuangou_left fl">
                                <a href="<?php echo U('Home/Leibiao/leibiao');?>?brand_id=3&brand_name='充电器'">
                                    <div class="img fl"><img style="width: 40px;height: 40px;"
                                                             src="/secondhand/Public/Q-image/cdq.png" alt=""></div>
                                    <span class="fl">充电器</span>
                                    <div class="clear"></div>
                                </a>
                            </div>
                            <div class="xuangou_left fl">
                                <a href="<?php echo U('Home/Leibiao/leibiao');?>?brand_id=4&brand_name='数据线'">

                                    <div class="img fl"><img style="width: 40px;height: 40px;"
                                                             src="/secondhand/Public/Q-image/sjx.png" alt=""></div>
                                    <span class="fl">数据线</span>
                                    <div class="clear"></div>
                                </a>
                            </div>
                            <div class="xuangou_left fl">
                                <a href="<?php echo U('Home/Leibiao/leibiao');?>?brand_id=5&brand_name='电池'">
                                    <div class="img fl"><img style="width: 40px;height: 40px;"
                                                             src="/secondhand/Public/Q-image/dc.png" alt=""></div>
                                    <span class="fl">电池</span>
                                    <div class="clear"></div>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </li>
            <li>
                <a href="#">电玩随身听</a>
                <div class="pop">
                    <div class="left fl">
                        <h4 style="margin-left: 20px;">电玩随身听</h4>
                        <div style="margin-top: -10px;">
                            <div class="xuangou_left fl">
                                <a href="<?php echo U('Home/Leibiao/leibiao');?>?brand_id=6&brand_name='MP3'">

                                    <div class="img fl"><img style="width: 40px;height: 40px;"
                                                             src="/secondhand/Public/Q-image/mp3.png" alt=""></div>
                                    <span class="fl">MP3</span>
                                    <div class="clear"></div>
                                </a>
                            </div>
                            <div class="xuangou_left fl">
                                <a href="<?php echo U('Home/Leibiao/leibiao');?>?brand_id=7&brand_name='MP4'">

                                    <div class="img fl"><img style="width: 40px;height: 40px;"
                                                             src="/secondhand/Public/Q-image/mp4.png" alt=""></div>
                                    <span class="fl">MP4</span>
                                    <div class="clear"></div>
                                </a>
                            </div>
                            <div class="xuangou_left fl">
                                <a href="<?php echo U('Home/Leibiao/leibiao');?>?brand_id=8&brand_name='MP5'">

                                    <div class="img fl"><img style="width: 40px;height: 40px;"
                                                             src="/secondhand/Public/Q-image/mp5.png" alt=""></div>
                                    <span class="fl">MP5</span>
                                    <div class="clear"></div>
                                </a>
                            </div>
                            <div class="xuangou_left fl">
                                <a href="<?php echo U('Home/Leibiao/leibiao');?>?brand_id=9&brand_name='录音笔'">

                                    <div class="img fl"><img style="width: 40px;height: 40px;"
                                                             src="/secondhand/Public/Q-image/lyb.png" alt=""></div>
                                    <span class="fl">录音笔</span>
                                    <div class="clear"></div>
                                </a>
                            </div>
                            <div class="xuangou_left fl">
                                <a href="<?php echo U('Home/Leibiao/leibiao');?>?brand_id=10&brand_name='Wii'">

                                    <div class="img fl"><img style="width: 40px;height: 40px;"
                                                             src="/secondhand/Public/Q-image/wii.png" alt=""></div>
                                    <span class="fl">Wii</span>
                                    <div class="clear"></div>
                                </a>
                            </div>
                            <div class="xuangou_left fl" style="margin-left:18px;">
                                <a href="<?php echo U('Home/Leibiao/leibiao');?>?brand_id=11&brand_name='PSP'">

                                    <div class="img fl"><img style="width: 40px;height: 40px;"
                                                             src="/secondhand/Public/Q-image/psp.png" alt=""></div>
                                    <span class="fl">PSP</span>
                                    <div class="clear"></div>
                                </a>
                            </div>
                            <div class="xuangou_left fl">
                                <a href="<?php echo U('Home/Leibiao/leibiao');?>?brand_id=12&brand_name='PS3'">

                                    <div class="img fl"><img style="width: 40px;height: 40px;"
                                                             src="/secondhand/Public/Q-image/ps3.png" alt=""></div>
                                    <span class="fl">PS3</span>
                                    <div class="clear"></div>
                                </a>
                            </div>
                            <div class="xuangou_left fl" style="margin-left:16px;">
                                <a href="<?php echo U('Home/Leibiao/leibiao');?>?brand_id=13&brand_name='XBOX'">

                                    <div class="img fl"><img style="width: 40px;height: 40px;"
                                                             src="/secondhand/Public/Q-image/xbox.png" alt=""></div>
                                    <span class="fl">XBOX</span>
                                    <div class="clear"></div>
                                </a>
                            </div>
                            <div class="xuangou_left fl">
                                <a href="<?php echo U('Home/Leibiao/leibiao');?>?brand_id=14&brand_name='游戏软件'">

                                    <div class="img fl"><img style="width: 40px;height: 40px;"
                                                             src="/secondhand/Public/Q-image/yx.png" alt=""></div>
                                    <span class="fl">游戏软件</span>
                                    <div class="clear"></div>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </li>
            <li>
                <a href="#">相机/摄像机</a>
                <div class="pop">
                    <div class="left fl">
                        <h4 style="margin-left: 20px;">相机/摄像机</h4>
                        <div style="margin-top: -10px;">
                            <div class="xuangou_left fl">
                                <a href="<?php echo U('Home/Leibiao/leibiao');?>?brand_id=15&brand_name='相机'">

                                    <div class="img fl"><img style="width: 40px;height: 40px;"
                                                             src="/secondhand/Public/Q-image/xiangji.png" alt=""></div>
                                    <span class="fl">相机</span>
                                    <div class="clear"></div>
                                </a>
                            </div>
                            <div class="xuangou_left fl">
                                <a href="<?php echo U('Home/Leibiao/leibiao');?>?brand_id=16&brand_name='镜头'">

                                    <div class="img fl"><img style="width: 40px;height: 40px;"
                                                             src="/secondhand/Public/Q-image/jingtou.png" alt=""></div>
                                    <span class="fl">镜头</span>
                                    <div class="clear"></div>
                                </a>
                            </div>
                            <div class="xuangou_left fl">
                                <a href="<?php echo U('Home/Leibiao/leibiao');?>?brand_id=17&brand_name='摄像机'">

                                    <div class="img fl"><img style="width: 40px;height: 40px;"
                                                             src="/secondhand/Public/Q-image/shexiangji.png" alt=""></div>
                                    <span class="fl">摄像机</span>
                                    <div class="clear"></div>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </li>
            <li>
                <a href="#">电脑/电脑周边</a>
                <div class="pop">
                    <div class="left fl">
                        <h4 style="margin-left: 20px;">电脑/电脑周边</h4>
                        <div style="margin-top: -10px;">
                            <div class="xuangou_left fl">
                                <a href="<?php echo U('Home/Leibiao/leibiao');?>?brand_id=18&brand_name='笔记本'">

                                    <div class="img fl"><img style="width: 40px;height: 40px;"
                                                             src="/secondhand/Public/Q-image/bijiben.png" alt=""></div>
                                    <span class="fl">笔记本</span>
                                    <div class="clear"></div>
                                </a>
                            </div>
                            <div class="xuangou_left fl">
                                <a href="<?php echo U('Home/Leibiao/leibiao');?>?brand_id=19&brand_name='平板电脑'">

                                    <div class="img fl"><img style="width: 40px;height: 40px;"
                                                             src="/secondhand/Public/Q-image/pingbandiannao.png" alt=""></div>
                                    <span class="fl">平板电脑</span>
                                    <div class="clear"></div>
                                </a>
                            </div>
                            <div class="xuangou_left fl">
                                <a href="<?php echo U('Home/Leibiao/leibiao');?>?brand_id=20&brand_name='台式机'">

                                    <div class="img fl"><img style="width: 40px;height: 40px;"
                                                             src="/secondhand/Public/Q-image/taishiji.png" alt=""></div>
                                    <span class="fl">台式机</span>
                                    <div class="clear"></div>
                                </a>
                            </div>
                            <div class="xuangou_left fl">
                                <a href="<?php echo U('Home/Leibiao/leibiao');?>?brand_id=21&brand_name='显示器'">

                                    <div class="img fl"><img style="width: 40px;height: 40px;"
                                                             src="/secondhand/Public/Q-image/xianshiqi.png" alt=""></div>
                                    <span class="fl">显示器</span>
                                    <div class="clear"></div>
                                </a>
                            </div>
                            <div class="xuangou_left fl">
                                <a href="<?php echo U('Home/Leibiao/leibiao');?>?brand_id=22&brand_name='鼠标'">

                                    <div class="img fl"><img style="width: 40px;height: 40px;"
                                                             src="/secondhand/Public/Q-image/shubiao.png" alt=""></div>
                                    <span class="fl">鼠标</span>
                                    <div class="clear"></div>
                                </a>
                            </div>
                            <div class="xuangou_left fl" style="margin-left:22px;">
                                <a href="<?php echo U('Home/Leibiao/leibiao');?>?brand_id=23&brand_name='键盘'">

                                    <div class="img fl"><img style="width: 40px;height: 40px;"
                                                             src="/secondhand/Public/Q-image/jianpan.png" alt=""></div>
                                    <span class="fl">键盘</span>
                                    <div class="clear"></div>
                                </a>
                            </div>
                            <div class="xuangou_left fl">
                                <a href="<?php echo U('Home/Leibiao/leibiao');?>?brand_id=24&brand_name='U盘'">

                                    <div class="img fl"><img style="width: 40px;height: 40px;"
                                                             src="/secondhand/Public/Q-image/upan.png" alt=""></div>
                                    <span class="fl">U盘</span>
                                    <div class="clear"></div>
                                </a>
                            </div>
                            <div class="xuangou_left fl" style="margin-left:25px;">
                                <a href="<?php echo U('Home/Leibiao/leibiao');?>?brand_id=25&brand_name='闪存卡'">

                                    <div class="img fl"><img style="width: 40px;height: 40px;"
                                                             src="/secondhand/Public/Q-image/shancunka.png" alt=""></div>
                                    <span class="fl">闪存卡</span>
                                    <div class="clear"></div>
                                </a>
                            </div>
                            <div class="xuangou_left fl">
                                <a href="<?php echo U('Home/Leibiao/leibiao');?>?brand_id=26&brand_name='移动硬盘'">

                                    <div class="img fl"><img style="width: 40px;height: 40px;"
                                                             src="/secondhand/Public/Q-image/yidongyingpan.png" alt=""></div>
                                    <span class="fl">移动硬盘</span>
                                    <div class="clear"></div>
                                </a>
                            </div>
                        </div>


                    </div>
                </div>
            </li>
            <li>
                <a href="#">手机品牌</a>
                <div class="pop">
                    <div class="left fl">
                        <h4 style="margin-left: 20px;">手机品牌</h4>
                        <div style="margin-top: -10px;">
                            <div class="xuangou_left fl">
                                <a href="<?php echo U('Home/Leibiao/leibiao');?>?brand_id=27&brand_name='苹果'">

                                    <div class="img fl"><img style="width: 40px;height: 40px;"
                                                             src="/secondhand/Public/Q-image/pingguo.png" alt=""></div>
                                    <span class="fl">苹果</span>
                                    <div class="clear"></div>
                                </a>
                            </div>
                            <div class="xuangou_left fl">
                                <a href="<?php echo U('Home/Leibiao/leibiao');?>?brand_id=28&brand_name='三星'">

                                    <div class="img fl"><img style="width: 40px;height: 40px;"
                                                             src="/secondhand/Public/Q-image/sanxing.png" alt=""></div>
                                    <span class="fl">三星</span>
                                    <div class="clear"></div>
                                </a>
                            </div>
                            <div class="xuangou_left fl">
                                <a href="<?php echo U('Home/Leibiao/leibiao');?>?brand_id=29&brand_name='华为'">

                                    <div class="img fl"><img style="width: 40px;height: 40px;"
                                                             src="/secondhand/Public/Q-image/huawei.png" alt=""></div>
                                    <span class="fl">华为</span>
                                    <div class="clear"></div>
                                </a>
                            </div>
                            <div class="xuangou_left fl">
                                <a href="<?php echo U('Home/Leibiao/leibiao');?>?brand_id=30&brand_name='小米'">

                                    <div class="img fl"><img style="width: 40px;height: 40px;"
                                                             src="/secondhand/Public/Q-image/xiaomi.png" alt=""></div>
                                    <span class="fl">小米</span>
                                    <div class="clear"></div>
                                </a>
                            </div>
                            <div class="xuangou_left fl">
                                <a href="<?php echo U('Home/Leibiao/leibiao');?>?brand_id=31&brand_name='一加'">

                                    <div class="img fl"><img style="width: 40px;height: 40px;"
                                                             src="/secondhand/Public/Q-image/yijia.png" alt=""></div>
                                    <span class="fl">一加</span>
                                    <div class="clear"></div>
                                </a>
                            </div>
                            <div class="xuangou_left fl">
                                <a href="<?php echo U('Home/Leibiao/leibiao');?>?brand_id=32&brand_name='OPPO'">

                                    <div class="img fl"><img style="width: 40px;height: 40px;"
                                                             src="/secondhand/Public/Q-image/oppo.png" alt=""></div>
                                    <span class="fl">OPPO</span>
                                    <div class="clear"></div>
                                </a>
                            </div>
                            <div class="xuangou_left fl">
                                <a href="<?php echo U('Home/Leibiao/leibiao');?>?brand_id=33&brand_name='HTC'">

                                    <div class="img fl"><img style="width: 40px;height: 40px;"
                                                             src="/secondhand/Public/Q-image/htc.png" alt=""></div>
                                    <span class="fl">HTC</span>
                                    <div class="clear"></div>
                                </a>
                            </div>
                            <div class="xuangou_left fl">
                                <a href="<?php echo U('Home/Leibiao/leibiao');?>?brand_id=34&brand_name='VIVO'">

                                    <div class="img fl"><img style="width: 40px;height: 40px;"
                                                             src="/secondhand/Public/Q-image/vivo.png" alt=""></div>
                                    <span class="fl">VIVO</span>
                                    <div class="clear"></div>
                                </a>
                            </div>
                            <div class="xuangou_left fl">
                                <a href="<?php echo U('Home/Leibiao/leibiao');?>?brand_id=35&brand_name='努比亚'">

                                    <div class="img fl"><img style="width: 40px;height: 40px;"
                                                             src="/secondhand/Public/Q-image/nubiya.png" alt=""></div>
                                    <span class="fl">努比亚</span>
                                    <div class="clear"></div>
                                </a>
                            </div>
                        </div>


                    </div>
                </div>
            </li>
            <li>
                <a href="#">女装</a>
                <div class="pop">
                    <div class="left fl">
                        <h4 style="margin-left: 20px;">女装</h4>
                        <div style="margin-top: -10px;">
                            <div class="xuangou_left fl">
                                <a href="<?php echo U('Home/Leibiao/leibiao');?>?brand_id=36&brand_name='连衣裙'">

                                    <div class="img fl"><img style="width: 40px;height: 40px;"
                                                             src="/secondhand/Public/Q-image/lianyiqun.png" alt=""></div>
                                    <span class="fl">连衣裙</span>
                                    <div class="clear"></div>
                                </a>
                            </div>
                            <div class="xuangou_left fl">
                                <a href="<?php echo U('Home/Leibiao/leibiao');?>?brand_id=37&brand_name='半身裙'">

                                    <div class="img fl"><img style="width: 40px;height: 40px;"
                                                             src="/secondhand/Public/Q-image/banshenqun.png" alt=""></div>
                                    <span class="fl">半身裙</span>
                                    <div class="clear"></div>
                                </a>
                            </div>
                            <div class="xuangou_left fl">
                                <a href="<?php echo U('Home/Leibiao/leibiao');?>?brand_id=38&brand_name='T恤'">

                                    <div class="img fl"><img style="width: 40px;height: 40px;"
                                                             src="/secondhand/Public/Q-image/nvshitxu.png" alt=""></div>
                                    <span class="fl">T恤</span>
                                    <div class="clear"></div>
                                </a>
                            </div>
                            <div class="xuangou_left fl" style="margin-left: 30px;">
                                <a href="<?php echo U('Home/Leibiao/leibiao');?>?brand_id=39&brand_name='衬衫'">

                                    <div class="img fl"><img style="width: 40px;height: 40px;"
                                                             src="/secondhand/Public/Q-image/nvshichenshan.png" alt=""></div>
                                    <span class="fl">衬衫</span>
                                    <div class="clear"></div>
                                </a>
                            </div>
                            <div class="xuangou_left fl">
                                <a href="<?php echo U('Home/Leibiao/leibiao');?>?brand_id=40&brand_name='卫衣'">

                                    <div class="img fl"><img style="width: 40px;height: 40px;"
                                                             src="/secondhand/Public/Q-image/nvshiweiyi.png" alt=""></div>
                                    <span class="fl">卫衣</span>
                                    <div class="clear"></div>
                                </a>
                            </div>
                            <div class="xuangou_left fl">
                                <a href="<?php echo U('Home/Leibiao/leibiao');?>?brand_id=41&brand_name='女鞋'">

                                    <div class="img fl"><img style="height: 40px;width: 40px;"
                                                             src="/secondhand/Public/Q-image/nvxie.png" alt=""></div>
                                    <span class="fl">女鞋</span>
                                    <div class="clear"></div>
                                </a>
                            </div>
                        </div>


                    </div>
                </div>
            </li>
            <li>
                <a href="#">男装</a>
                <div class="pop">
                    <div class="left fl">
                        <h4 style="margin-left: 20px;">男装</h4>
                        <div style="margin-top: -10px;">
                            <div class="xuangou_left fl">
                                <a href="<?php echo U('Home/Leibiao/leibiao');?>?brand_id=42&brand_name='夹克'">

                                    <div class="img fl"><img style="height: 40px;width: 40px;"
                                                             src="/secondhand/Public/Q-image/nanshijiake.png" alt=""></div>
                                    <span class="fl">夹克</span>
                                    <div class="clear"></div>
                                </a>
                            </div>
                            <div class="xuangou_left fl">
                                <a href="<?php echo U('Home/Leibiao/leibiao');?>?brand_id=43&brand_name='风衣'">

                                    <div class="img fl"><img style="height: 40px;width: 40px;"
                                                             src="/secondhand/Public/Q-image/nanshifengyi.png" alt=""></div>
                                    <span class="fl">风衣</span>
                                    <div class="clear"></div>
                                </a>
                            </div>
                            <div class="xuangou_left fl">
                                <a href="<?php echo U('Home/Leibiao/leibiao');?>?brand_id=44&brand_name='T恤'">

                                    <div class="img fl"><img style="height: 40px;width: 40px;"
                                                             src="/secondhand/Public/Q-image/nanshitxu.png" alt=""></div>
                                    <span class="fl">T恤</span>
                                    <div class="clear"></div>
                                </a>
                            </div>
                            <div class="xuangou_left fl">
                                <a href="<?php echo U('Home/Leibiao/leibiao');?>?brand_id=45&brand_name='衬衫'">

                                    <div class="img fl"><img style="height: 40px;width: 40px;"
                                                             src="/secondhand/Public/Q-image/nanshichenshan.png" alt=""></div>
                                    <span class="fl">衬衫</span>
                                    <div class="clear"></div>
                                </a>
                            </div>
                            <div class="xuangou_left fl">
                                <a href="<?php echo U('Home/Leibiao/leibiao');?>?brand_id=46&brand_name='卫衣'">

                                    <div class="img fl"><img style="height: 40px;width: 40px;"
                                                             src="/secondhand/Public/Q-image/nanshiweiyi.png" alt=""></div>
                                    <span class="fl">卫衣</span>
                                    <div class="clear"></div>
                                </a>
                            </div>
                        </div>
                        <div class="xuangou_left fl">
                            <a href="<?php echo U('Home/Leibiao/leibiao');?>?brand_id=47&brand_name='男鞋'">

                                <div class="img fl"><img style="height: 40px;width: 40px;"
                                                         src="/secondhand/Public/Q-image/nanxie.png" alt=""></div>
                                <span class="fl">男鞋</span>
                                <div class="clear"></div>
                            </a>
                        </div>

                    </div>
                </div>
            </li>
            <li>
                <a href="#">配饰</a>
                <div class="pop">
                    <div class="left fl">
                        <h4 style="margin-left: 20px;">配饰</h4>
                        <div style="margin-top: -10px;">
                            <div class="xuangou_left fl">
                                <a href="<?php echo U('Home/Leibiao/leibiao');?>?brand_id=48&brand_name='手表'">

                                    <div class="img fl"><img style="width: 40px;height: 40px;"
                                                             src="/secondhand/Public/Q-image/shoubiao.png" alt=""></div>
                                    <span class="fl">手表</span>
                                    <div class="clear"></div>
                                </a>
                            </div>
                            <div class="xuangou_left fl">
                                <a href="<?php echo U('Home/Leibiao/leibiao');?>?brand_id=49&brand_name='帽子'">

                                    <div class="img fl"><img style="width: 40px;height: 40px;"
                                                             src="/secondhand/Public/Q-image/maozi.png" alt=""></div>
                                    <span class="fl">帽子</span>
                                    <div class="clear"></div>
                                </a>
                            </div>
                            <div class="xuangou_left fl">
                                <a href="<?php echo U('Home/Leibiao/leibiao');?>?brand_id=50&brand_name='皮带'">

                                    <div class="img fl"><img style="width: 40px;height: 40px;"
                                                             src="/secondhand/Public/Q-image/pidai.png" alt=""></div>
                                    <span class="fl">皮带</span>
                                    <div class="clear"></div>
                                </a>
                            </div>
                            <div class="xuangou_left fl">
                                <a href="<?php echo U('Home/Leibiao/leibiao');?>?brand_id=51&brand_name='围巾'">

                                    <div class="img fl"><img style="width: 40px;height: 40px;"
                                                             src="/secondhand/Public/Q-image/weijin.png" alt=""></div>
                                    <span class="fl">围巾</span>
                                    <div class="clear"></div>
                                </a>
                            </div>
                            <div class="xuangou_left fl">
                                <a href="<?php echo U('Home/Leibiao/leibiao');?>?brand_id=52&brand_name='丝巾'">

                                    <div class="img fl"><img style="width: 40px;height: 40px;"
                                                             src="/secondhand/Public/Q-image/sijin.png" alt=""></div>
                                    <span class="fl">丝巾</span>
                                    <div class="clear"></div>
                                </a>
                            </div>
                            <div class="xuangou_left fl">
                                <a href="<?php echo U('Home/Leibiao/leibiao');?>?brand_id=53&brand_name='手套'">

                                    <div class="img fl"><img style="width: 40px;height: 40px;"
                                                             src="/secondhand/Public/Q-image/shoutao.png" alt=""></div>
                                    <span class="fl">手套</span>
                                    <div class="clear"></div>
                                </a>
                            </div>
                            <div class="xuangou_left fl">
                                <a href="<?php echo U('Home/Leibiao/leibiao');?>?brand_id=54&brand_name='耳坠'">

                                    <div class="img fl"><img style="width: 40px;height: 40px;"
                                                             src="/secondhand/Public/Q-image/erzhui.png" alt=""></div>
                                    <span class="fl">耳坠</span>
                                    <div class="clear"></div>
                                </a>
                            </div>
                            <div class="xuangou_left fl">
                                <a href="<?php echo U('Home/Leibiao/leibiao');?>?brand_id=55&brand_name='项链'">

                                    <div class="img fl"><img style="width: 40px;height: 40px;"
                                                             src="/secondhand/Public/Q-image/xianglian.png" alt=""></div>
                                    <span class="fl">项链</span>
                                    <div class="clear"></div>
                                </a>
                            </div>
                            <div class="xuangou_left fl">
                                <a href="<?php echo U('Home/Leibiao/leibiao');?>?brand_id=56&brand_name='戒子'">

                                    <div class="img fl"><img style="width: 40px;height: 40px;"
                                                             src="/secondhand/Public/Q-image/jiezhi.png" alt=""></div>
                                    <span class="fl">戒指</span>
                                    <div class="clear"></div>
                                </a>
                            </div>
                        </div>


                    </div>
                </div>
            </li>
            <li>
                <a href="#">生活用品</a>
                <div class="pop">
                    <div class="left fl">
                        <h4 style="margin-left: 20px;">生活用品</h4>
                        <div style="margin-top: -10px;">
                            <div class="xuangou_left fl">
                                <a href="<?php echo U('Home/Leibiao/leibiao');?>?brand_id=57&brand_name='毛巾'">

                                    <div class="img fl"><img style="height: 40px;width: 40px;"
                                                             src="/secondhand/Public/Q-image/maojin.png" alt=""></div>
                                    <span class="fl">毛巾</span>
                                    <div class="clear"></div>
                                </a>
                            </div>
                            <div class="xuangou_left fl">
                                <a href="<?php echo U('Home/Leibiao/leibiao');?>?brand_id=58&brand_name='洗衣液'">

                                    <div class="img fl"><img style="height: 40px;width: 40px;"
                                                             src="/secondhand/Public/Q-image/xiyiye.png" alt=""></div>
                                    <span class="fl">洗衣液</span>
                                    <div class="clear"></div>
                                </a>
                            </div>
                            <div class="xuangou_left fl">
                                <a href="<?php echo U('Home/Leibiao/leibiao');?>?brand_id=59&brand_name='雨伞'">

                                    <div class="img fl"><img style="height: 40px;width: 40px;"
                                                             src="/secondhand/Public/Q-image/yusan.png" alt=""></div>
                                    <span class="fl">雨伞</span>
                                    <div class="clear"></div>
                                </a>
                            </div>
                            <div class="xuangou_left fl">
                                <a href="<?php echo U('Home/Leibiao/leibiao');?>?brand_id=66&brand_name='洗衣粉'">

                                    <div class="img fl"><img style="height: 40px;width: 40px;"
                                                             src="/secondhand/Public/Q-image/xiyifen.png" alt=""></div>
                                    <span class="fl">洗衣粉</span>
                                    <div class="clear"></div>
                                </a>
                            </div>
                            <div class="xuangou_left fl">
                                <a href="<?php echo U('Home/Leibiao/leibiao');?>?brand_id=67&brand_name='雨衣'">

                                    <div class="img fl"><img style="height: 40px;width: 40px;"
                                                             src="/secondhand/Public/Q-image/yuyi.png" alt=""></div>
                                    <span class="fl">雨衣</span>
                                    <div class="clear"></div>
                                </a>
                            </div>
                            <div class="xuangou_left fl">
                                <a href="<?php echo U('Home/Leibiao/leibiao');?>?brand_id=60&brand_name='垃圾桶'">

                                    <div class="img fl"><img style="height: 40px;width: 40px;"
                                                             src="/secondhand/Public/Q-image/lajitong.png" alt=""></div>
                                    <span class="fl">垃圾桶</span>
                                    <div class="clear"></div>
                                </a>
                            </div>
                            <div class="xuangou_left fl">
                                <a href="<?php echo U('Home/Leibiao/leibiao');?>?brand_id=61&brand_name='化妆品'">

                                    <div class="img fl"><img style="height: 40px;width: 40px;"
                                                             src="/secondhand/Public/Q-image/huazhuangpin.png" alt=""></div>
                                    <span class="fl">化妆品</span>
                                    <div class="clear"></div>
                                </a>
                            </div>
                            <div class="xuangou_left fl">
                                <a href="<?php echo U('Home/Leibiao/leibiao');?>?brand_id=62&brand_name='书籍'">

                                    <div class="img fl"><img style="height: 40px;width: 40px;"
                                                             src="/secondhand/Public/Q-image/shuji.png" alt=""></div>
                                    <span class="fl">书籍</span>
                                    <div class="clear"></div>
                                </a>
                            </div>
                        </div>


                    </div>
                </div>
            </li>
            <li>
                <a href="#">箱包</a>
                <div class="pop">
                    <div class="left fl">
                        <h4 style="margin-left: 20px;">箱包</h4>
                        <div style="margin-top: -10px;">
                            <div class="xuangou_left fl">
                                <a href="<?php echo U('Home/Leibiao/leibiao');?>?brand_id=63&brand_name='男包'">

                                    <div class="img fl"><img style="width: 40px;height: 40px;"
                                                             src="/secondhand/Public/Q-image/nanbao.png" alt=""></div>
                                    <span class="fl">男包</span>
                                    <div class="clear"></div>
                                </a>
                            </div>
                            <div class="xuangou_left fl">
                                <a href="<?php echo U('Home/Leibiao/leibiao');?>?brand_id=64&brand_name='女包'">

                                    <div class="img fl"><img style="width: 40px;height: 40px;"
                                                             src="/secondhand/Public/Q-image/nvbao.png" alt=""></div>
                                    <span class="fl">女包</span>
                                    <div class="clear"></div>
                                </a>
                            </div>
                            <div class="xuangou_left fl">
                                <a href="<?php echo U('Home/Leibiao/leibiao');?>?brand_id=65&brand_name='旅行箱'">

                                    <div class="img fl"><img style="width: 40px;height: 40px;"
                                                             src="/secondhand/Public/Q-image/lvxingxiang.png" alt=""></div>
                                    <span class="fl">旅行箱</span>
                                    <div class="clear"></div>
                                </a>
                            </div>
                        </div>


                    </div>
                </div>
            </li>
        </ul>
    </div>

</div>

<div class="sub_banner center">
    <div class="sidebar fl">
        <div class="fl"><a href=""><img src="/secondhand/Public/Q-image/hjh_01.gif"></a></div>
        <div class="fl"><a href=""><img src="/secondhand/Public/Q-image/hjh_02.gif"></a></div>
        <div class="fl"><a href=""><img src="/secondhand/Public/Q-image/hjh_03.gif"></a></div>
        <div class="fl"><a href=""><img src="/secondhand/Public/Q-image/hjh_04.gif"></a></div>
        <div class="fl"><a href=""><img src="/secondhand/Public/Q-image/hjh_05.gif"></a></div>
        <div class="fl"><a href=""><img src="/secondhand/Public/Q-image/hjh_06.gif"></a></div>
        <div class="clear"></div>
    </div>
    <div class="datu fl"><a href=""><img src="/secondhand/Public/Q-image/hongmi4x.png" alt=""></a></div>
    <div class="datu fl"><a href=""><img src="/secondhand/Public/Q-image/xiaomi5.jpg" alt=""></a></div>
    <div class="datu fr"><a href=""><img src="/secondhand/Public/Q-image/pinghengche.jpg" alt=""></a></div>
    <div class="clear"></div>


</div>
<!-- end banner -->
<div class="tlinks">Collect from <a href="http://www.cssmoban.com/">企业网站模板</a></div>

<!-- 精品推荐 -->
<div class="danpin center">
    <div class="biaoti center">精品推荐</div>
    <div class="main center">


        <?php if(is_array($best)): foreach($best as $key=>$b): ?><div class="mingxing fl">
                <div class="sub_mingxing"><a
                        href="<?php echo U('home/goodsDetails/goodsDetails',array('goods_id'=>$b['goods_id']));?>"><img
                        src="<?php echo ($b['thumb_img']); ?>" alt="<?php echo ($b['goods_name']); ?>"></a></div>
                <div class="pinpai"><a href=""><?php echo ($b['goods_name']); ?></a></div>
                <div class="youhui"
                     style="width:230px;white-space:nowrap;text-overflow:ellipsis;-o-text-overflow:ellipsis;overflow:hidden;">
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo ($b['goods_desc']); ?>
                </div>
                <div class="jiage"><?php echo ($b['shop_price']); ?>元起</div>
            </div><?php endforeach; endif; ?>


        <div class="clear"></div>
    </div>
</div>
<!-- 促销 -->
<div class="danpin center">
    <div class="biaoti center">促销</div>
    <div class="main center">

        <?php if(is_array($sale)): foreach($sale as $key=>$s): ?><div class="mingxing fl">
                <div class="sub_mingxing"><a
                        href="<?php echo U('home/goodsDetails/goodsDetails',array('goods_id'=>$s['goods_id']));?>"><img
                        src="<?php echo ($s['thumb_img']); ?>" alt="<?php echo ($s['goods_name']); ?>"></a></div>
                <div class="pinpai"><a href=""><?php echo ($s['goods_name']); ?></a></div>
                <div class="youhui"
                     style="width:230px;white-space:nowrap;text-overflow:ellipsis;-o-text-overflow:ellipsis;overflow:hidden;">
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo ($s['goods_desc']); ?>
                </div>
                <div class="jiage"><?php echo ($s['shop_price']); ?>元起</div>
            </div><?php endforeach; endif; ?>

        <div class="clear"></div>
    </div>
</div>
<!-- 最新 -->
<div class="danpin center">
    <div class="biaoti center">最新</div>
    <div class="main center">


        <?php if(is_array($new)): foreach($new as $key=>$n): ?><div class="mingxing fl">
                <div class="sub_mingxing"><a
                        href="<?php echo U('home/goodsDetails/goodsDetails',array('goods_id'=>$n['goods_id']));?>"><img
                        src="<?php echo ($n['thumb_img']); ?>" alt="<?php echo ($n['goods_name']); ?>"></a></div>
                <div class="pinpai"><a href=""><?php echo ($n['goods_name']); ?></a></div>
                <div class="youhui"
                     style="width:230px;white-space:nowrap;text-overflow:ellipsis;-o-text-overflow:ellipsis;overflow:hidden;">
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo ($n['goods_desc']); ?>
                </div>
                <div class="jiage"><?php echo ($n['shop_price']); ?>元起</div>
            </div><?php endforeach; endif; ?>

        <div class="clear"></div>
    </div>
</div>
<!-- 最热 -->
<div class="danpin center">
    <div class="biaoti center">最热</div>
    <div class="main center">


        <?php if(is_array($hot)): foreach($hot as $key=>$h): ?><div class="mingxing fl">
                <div class="sub_mingxing"><a
                        href="<?php echo U('home/goodsDetails/goodsDetails',array('goods_id'=>$h['goods_id']));?>"><img
                        src="<?php echo ($h['thumb_img']); ?>" alt="<?php echo ($h['goods_name']); ?>"></a></div>
                <div class="pinpai"><a href=""><?php echo ($h['goods_name']); ?></a></div>
                <div class="youhui"
                     style="width:230px;white-space:nowrap;text-overflow:ellipsis;-o-text-overflow:ellipsis;overflow:hidden;">
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo ($h['goods_desc']); ?>
                </div>
                <div class="jiage"><?php echo ($h['shop_price']); ?>元起</div>
            </div><?php endforeach; endif; ?>


        <div class="clear"></div>
    </div>
</div>

<footer class="mt20 center">
    <div class="mt20">小米商城|MIUI|米聊|多看书城|小米路由器|视频电话|小米天猫店|小米淘宝直营店|小米网盟|小米移动|隐私政策|Select Region</div>
    <div>?mi.com 京ICP证110507号 京ICP备10046444号 京公网安备11010802020134号 京网文[2014]0059-0009号</div>
    <div>违法和不良信息举报电话：185-0130-1238，本网站所列数据，除特殊说明，所有数据均出自我司实验室测试</div>
</footer>
</body>
</html>
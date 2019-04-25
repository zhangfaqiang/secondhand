<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>小米商城-个人中心</title>
    <link rel="stylesheet" type="text/css" href="/secondhand/Public/Q-css/style.css">
    <link rel="stylesheet" type="text/css" href="/secondhand/Public/naranja/naranja.min.css">
</head>
<style type="text/css">
    * {
        -ms-word-wrap: break-word;
        word-wrap: break-word;
    }

    html {
        -webkit-text-size-adjust: none;
        text-size-adjust: none;
    }

    html, body {
        height: 100%;
        width: 100%;
    }

    .wrap {
        width: 464px;
        height: 34px;
        /*margin: 200px auto;*/
        border: 0;
        position: relative;
    }

    .input {
        position: absolute;
        top: 0;
        left: 0;
        width: 457px;
        margin: 0;
        padding-left: 5px;
        height: 30px;
        line-height: 30px;
        font-size: 12px;
        border: 1px solid #c9cacb;
    }

    s {
        position: absolute;
        top: 1px;
        right: 0;
        width: 32px;
        height: 32px;
        background: url("/secondhand/Public/indexaddress/img/arrow.png") no-repeat;
    }

    ._citys {
        width: 450px;
        display: inline-block;
        border: 2px solid #eee;
        padding: 5px;
        position: relative;
    }

    ._citys span {
        color: #05920a;
        height: 15px;
        width: 15px;
        line-height: 15px;
        text-align: center;
        border-radius: 3px;
        position: absolute;
        right: 10px;
        top: 10px;
        border: 1px solid #05920a;
        cursor: pointer;
    }

    ._citys0 {
        background-color: white;
        width: 95%;
        height: 34px;
        line-height: 34px;
        display: inline-block;
        border-bottom: 2px solid #05920a;
        padding: 0px 5px;
        font-size: 14px;
        font-weight: bold;
        margin-left: 6px;
    }

    ._citys0 li {
        display: inline-block;
        line-height: 34px;
        font-size: 15px;
        color: #888;
        width: 80px;
        text-align: center;
        cursor: pointer;
    }

    ._citys1 {
        width: 100%;
        display: inline-block;
        padding: 10px 0;
        background-color: white;
    }

    ._citys1 a {
        width: 83px;
        height: 35px;
        display: inline-block;
        background-color: #f5f5f5;
        color: #666;
        margin-left: 6px;
        margin-top: 3px;
        line-height: 35px;
        text-align: center;
        cursor: pointer;
        font-size: 12px;
        border-radius: 5px;
        overflow: hidden;
    }

    ._citys1 a:hover {
        color: #fff;
        background-color: #05920a;
    }

    .AreaS {
        background-color: #05920a !important;
        color: #fff !important;
    }
</style>
<body>
<!-- start header -->
<header>
    <div class="top center">
        <div class="left fl">
            <ul>
                <li><a href="#" target="_blank">小米商城</a></li>
                <li>|</li>
                <li><a href="">MIUI</a></li>
                <li>|</li>
                <li><a href="">米聊</a></li>
                <li>|</li>
                <li><a href="">游戏</a></li>
                <li>|</li>
                <li><a href="">多看阅读</a></li>
                <li>|</li>
                <li><a href="">云服务</a></li>
                <li>|</li>
                <li><a href="">金融</a></li>
                <li>|</li>
                <li><a href="">小米商城移动版</a></li>
                <li>|</li>
                <li><a href="">问题反馈</a></li>
                <li>|</li>
                <li><a href="">Select Region</a></li>
                <div class="clear"></div>
            </ul>
        </div>
        <div class="right fr">
            <div class="gouwuche fr"><a id="car_shuliang" onclick="checkLogin()">购物车</a></div>
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
    <a href="">
        <div class="ad_top fl"></div>
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
<!-- self_info -->
<div class="grzxbj">
    <div class="selfinfo center">
        <div class="lfnav fl">
            <div class="ddzx">订单中心</div>
            <div class="subddzx">
                <ul>
                    <li><a href="<?php echo U('Home/orderCentre/orderCentre');?>">我的订单</a></li>
                    <li><a href="<?php echo U('Home/Idle/idle');?>" style="color:#ff6700;font-weight:bold;">我的闲置</a></li>
                    <li><a href="">团购订单</a></li>
                    <li><a href="">评价晒单</a></li>
                </ul>
            </div>
            <div class="ddzx">个人中心</div>
            <div class="subddzx">
                <ul>
                    <li><a href="<?php echo U('Home/MyInfo/myInfo');?>">我的个人中心</a></li>
                    <li><a href="">消息通知</a></li>
                    <li><a href="">优惠券</a></li>
                    <li><a href="<?php echo U('Home/Address/address');?>">收货地址</a></li>
                </ul>
            </div>
        </div>
        <div class="rtcont fr">
            <div class="grzlbt ml40">我的闲置</div>
            <div id="myPublish" style="text-align: center;display: none;">
                <form>
                    <div style="margin-top: 5px;">
                        <span style="margin-right: 20px;">标题</span><input type="text"
                                                                          id="biaoti" name="biaoti"
                                                                          style="width: 200px;height: 25px;">
                    </div>
                    <br>
                    <div style="margin-top: 5px;">
                        <span style="margin-right: 20px;">描述</span><input type="text"
                                                                          id="miaoshu" name="miaoshu"
                                                                          style="width: 200px;height: 150px;">
                    </div>
                    <br>
                    <div style="margin-top: 5px;">
                        <span style="margin-right: 20px;">价格</span><input type="text"
                                                                          id="jiage" name="jiage"
                                                                          onkeyup="if(this.value.length==1){this.value=this.value.replace(/[^1-9]/g,'')}else{this.value=this.value.replace(/\D/g,'')}"
                                                                          style="width: 200px;height: 25px;">
                    </div>
                    <br>
                    <input type="submit" value="提交" style="width: 50px;height: 25px;">
                    <input type="button" value="取消" style="width: 50px;height: 25px;">
                </form>
            </div>
            <div style="height: 300px;margin-top: 50px; position:relative;">
                <ul>
                    <?php if(is_array($data)): $i = 0; $__LIST__ = $data;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$sp): $mod = ($i % 2 );++$i;?><li style="margin-top: 20px;">
                            <img src="<?php echo ($sp["goods_img"]); ?>" style="width: 60px;height: 60px; margin-left: 50px;">
                            <span style="margin-top: 20px;position: absolute;margin-left: 10px;">标题:<?php echo ($sp["goods_name"]); ?></span>
                            <span style="margin-top: 20px;position: absolute;margin-left: 160px;">描述:<?php echo ($sp["goods_desc"]); ?></span>
                            <span style="margin-top: 20px;position: absolute;margin-left: 410px;">价格:<?php echo ($sp["shop_price"]); ?>￥</span>
                            <span style="margin-top: 20px;position: absolute;margin-left: 530px;">发布时间:<?php echo ($sp["add_time"]); ?></span>
                            <a ids="<?php echo ($sp["goods_id"]); ?>" onclick="updatePublish(this),jsslider()"
                               style="margin-top: 20px;position: absolute;margin-left: 700px;color: red;cursor: pointer;">修改</a>
                            <a id="<?php echo ($sp["goods_id"]); ?>" onclick="deletePublish(this)"
                               style="margin-top: 20px;position: absolute;margin-left: 750px;color: red;cursor: pointer;">删除</a>
                        </li><?php endforeach; endif; else: echo "" ;endif; ?>
                </ul>
            </div>
        </div>
    </div>
    <div class="clear"></div>
</div>


<!-- self_info -->

<footer class="mt20 center">
    <div class="mt20">小米商城|MIUI|米聊|多看书城|小米路由器|视频电话|小米天猫店|小米淘宝直营店|小米网盟|小米移动|隐私政策|Select Region</div>
    <div>©mi.com 京ICP证110507号 京ICP备10046444号 京公网安备11010802020134号 京网文[2014]0059-0009号</div>
    <div>违法和不良信息举报电话：185-0130-1238，本网站所列数据，除特殊说明，所有数据均出自我司实验室测试</div>
</footer>
</body>
</html>
<script type="text/javascript" src="/secondhand/Public/jquery/jquery-3.3.1.min.js"></script>
<script type="text/javascript" src="/secondhand/Public/naranja/naranja.js"></script>
<script type="text/javascript" src="/secondhand/Public/indexaddress/js/Popt.js"></script>
<script type="text/javascript" src="/secondhand/Public/indexaddress/js/city.json.js"></script>
<script type="text/javascript" src="/secondhand/Public/indexaddress/js/citySet.js"></script>
<script>
    var userId = "<?php echo session('userid');?>";//用户id
    //消息提示框
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

        //初始化
        $('#biaoti').val('');
        $('#miaoshu').val('');
        $('#jiage').val('');

        //读取购物车商品数量
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

    //js下滑样式控制
    function jsslider() {
        if (!$("#myPublish").is(":animated")) {
            $("#myPublish").slideToggle("slow");
            $('#biaoti').val('');
            $('#miaoshu').val('');
            $('#jiage').val('')
        }
    }

    //弹出框
    function narn(type, message) {
        naranja()[type]({
            title: '新消息提示',
            text: message,
            timeout: 'keep',
            buttons: [{
                text: '接受',
                click: function (e) {
                    e.closeNotification()
                }
            }, {
                text: '取消',
                click: function (e) {
                    e.closeNotification()
                }
            }]
        })
    }

    //删除发布
    function deletePublish(info) {
        var id = info.id;
        $.ajax({
            url: '<?php echo U("Home/Idle/deletePublish");?>',
            type: 'post',
            dataType: 'json',
            data: {id: id},
            success: function (code) {
                if (code == 1) {
                    message = '删除闲置成功！';
                    narn('success', message);
                    location.reload();
                }
                if (code == 0) {
                    message = '删除闲置失败！';
                    narn('error', message);
                }
                if (code == 2) {
                    message = '请先登录！'
                    narn('warn', message);
                }
            }
        });
    }

    //修改发布
    function updatePublish(info) {
        var id = info.attributes.ids.value;
        $.ajax({
            url: '<?php echo U("Home/Idle/updatePublish");?>',
            type: 'post',
            dataType: 'json',
            data: {id: id},
            success: function (result) {
                if (result == 2) {
                    message = '请先登陆！';
                    narn('warn', message);
                    return;
                }
                $('#biaoti').val(result.goods_name);
                $('#miaoshu').val(result.goods_desc);
                $('#jiage').val(result.shop_price)
            }
        });
    }
</script>
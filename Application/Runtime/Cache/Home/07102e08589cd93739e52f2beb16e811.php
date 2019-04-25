<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>小米商城-个人中心</title>
    <link rel="stylesheet" type="text/css" href="/secondhand/Public/ModalBoxes/css/modal.css">
    <link rel="stylesheet" type="text/css" href="/secondhand/Public/Q-css/style.css">
    <link rel="stylesheet" type="text/css" href="/secondhand/Public/naranja/naranja.min.css">
</head>
<script>
</script>
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
                    <li><a href="<?php echo U('Home/Idle/idle');?>">我的闲置</a></li>
                    <li><a href="">团购订单</a></li>
                    <li><a href="">评价晒单</a></li>
                </ul>
            </div>
            <div class="ddzx">个人中心</div>
            <div class="subddzx">
                <ul>
                    <li><a href="<?php echo U('Home/MyInfo/myInfo');?>" style="color:#ff6700;font-weight:bold;">我的个人中心</a></li>
                    <li><a href="">消息通知</a></li>
                    <li><a href="">优惠券</a></li>
                    <li><a href="<?php echo U('Home/Address/address');?>">收货地址</a></li>
                </ul>
            </div>
        </div>
        <div class="rtcont fr" style="height: 250px;">
            <div class="grzlbt ml40">我的资料</div>
            <div class="subgrzl ml40"><span>手机号</span>
                <span id="phone"><?php echo ($user["user_phone"]); ?></span>
                <span><a href="#changePhoneDiv"
                         class="flatbtn"
                         id="changePhone">编辑</a></span>
            </div>
            <div class="subgrzl ml40"><span>密码</span><span>************</span><span><a href="#changePasswordDiv"
                                                                                       class="flatbtn"
                                                                                       id="changePassword">编辑</a></span>
            </div>
        </div>

    </div>
    <div class="clear"></div>
</div>
</div>

<!--修改手机号-->
<div id="changePhoneDiv" style="display:none;">
    <h1>修改手机号</h1>
    <form id="changePhoneForm" name="changePhoneForm" method="post" onsubmit="return checkChangePhone()"
          action="<?php echo U('Home/MyInfo/changePhone');?>">
        <input type="hidden" name="userid" class="txtfield" value="<?php echo session('userid');?>"
               tabindex="1"/>
        <input type="text" name="oldPhone" id="oldPhone" placeholder="原手机号" oninput="value=value.replace(/[^\d]/g,'')"
               class="txtfield" tabindex="1"/>
        <input type="text" name="captcha" id="captcha" placeholder="验证码" class="txtfield" tabindex="2"
               style="width: 150px;"/>
        <input type="button" onclick="sendSMS()" value="点击发送验证码">
        <input type="text" name="newPhone" id="newPhone" placeholder="新手机号" oninput="value=value.replace(/[^\d]/g,'')"
               class="txtfield" tabindex="3"/>
        <input class="flatbtn-blu" type="submit" value="修改">
        <input style="margin-left: 135px;" class="flatbtn-blu hidemodal" onclick="phoneEmpty()" type="button"
               value="取消">
    </form>
</div>


<!--修改密码-->
<div id="changePasswordDiv" style="display:none;">
    <h1>修改密码</h1>
    <form id="loginform" name="loginform" method="post" onsubmit="return checkChangePassword()"
          action="<?php echo U('Home/MyInfo/ChangePassword');?>">
        <input type="hidden" name="useridPassword" class="txtfield" value="<?php echo session('userid');?>"
               tabindex="1"/>
        <input type="password" name="oldPassword" id="oldPassword" placeholder="原密码" class="txtfield" tabindex="1"/>
        <input type="password" name="newPassword" id="newPassword" placeholder="新密码" class="txtfield" tabindex="2"/>
        <input class="flatbtn-blu" type="submit" value="修改">
        <input onclick="passwordEmpty()" style="margin-left: 135px;" class="flatbtn-blu hidemodal" type="button"
               value="取消">
    </form>
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
<script type="text/javascript" src="/secondhand/Public/ModalBoxes/js/jquery.leanModal.min.js"></script>
<script type="text/javascript" src="/secondhand/Public/naranja/naranja.js"></script>
<script>
    var userId = "<?php echo session('userid');?>";//用户id
    var message = '';//提示消息
    var num = '';//随机验证码

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

        //弹出修改密码
        $('#changePassword').leanModal({
            top: 110,
            overlay: 0.45,
            closeButton: ".hidemodal"
        });

        //弹出手机号
        $('#changePhone').leanModal({
            top: 110,
            overlay: 0.45,
            closeButton: ".hidemodal",
        });

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

    //修改密码检查
    function checkChangePassword() {
        var oldPassword = $('#oldPassword').val();
        var newPassword = $('#newPassword').val();
        if (oldPassword == null || oldPassword == "") {
            message = '原密码不能为空！';
            narn('error', message);
            $('#oldPassword').focus();
            return false;
        }
        if (newPassword == null || newPassword == "") {
            message = '新密码不能为空！';
            narn('error', message);
            $('#newPassword').focus();
            return false;
        }
        return true;
    }

    //修改手机号检查
    function checkChangePhone() {
        var oldPhone = $('#oldPhone').val();
        var captcha = $('#captcha').val();
        var newPhone = $('#newPhone').val();
        if (oldPhone == null || oldPhone == "") {
            message = '原手机号不能为空！'
            $('#oldPhone').focus();
            narn('error', message);
            return false;
        }
        if (oldPhone.length != 11 || !(/^1[3|4|5|7|8][0-9]\d{8,11}$/.test(oldPhone))) {
            message = '请收入原手机号的正确格式！'
            $('#oldPhone').focus();
            narn('error', message);
            return false;
        }
        if (captcha == "" || captcha.length != 4) {
            message = '请输入正确验证码！'
            $('#captcha').focus();
            narn('error', message);
            return false;
        }
        if (newPhone == null || newPhone == "") {
            message = '新手机号不能为空！';
            $('#newPhone').focus();
            narn('error', message);
            return false;
        }
        if (newPhone.length != 11 || !(/^1[3|4|5|7|8][0-9]\d{8,11}$/.test(newPhone))) {
            message = '请输入新手机号的正确格式!';
            $('#newPhone').focus();
            narn('error', message);
            return false;
        }
        if (oldPhone == newPhone) {
            message = '两手机号不能相同！';
            narn('error', message);
            $('#newPhone').focus();
            return false;
        }
        // if (captcha != num) {
        //     message = '验证码错误，请重新输入！';
        //     $('#captcha').focus();
        //     narn('error', message);
        //     return false;
        // }
        return true;

    }

    //发送验证码
    function sendSMS() {
        var tel = $('#oldPhone').val();
        //生成4位随机数
        for (var i = 0; i < 4; i++) {
            num += Math.floor(Math.random() * 10);
        }
        $.post('/secondhand/Public/SMS/SendTemplateSMS.php', {'tel': tel, 'num': num}, function (res) {
            if (res) {
                message = '短信发送成功！';
                narn('success', message);
            } else {
                message = '短信发送失败！';
                narn('error', message);
            }
        })
    }

    //修改密码清空操作
    function passwordEmpty() {
        $('#oldPassword').val('');
        $('#newPassword').val('');
    }

    //修改手机号清空操作
    function phoneEmpty() {
        $('#oldPhone').val('');
        $('#captcha').val('');
        $('#newPhone').val('');
    }


</script>
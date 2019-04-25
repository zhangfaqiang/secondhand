<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="author" content="order by dede58.com"/>
    <title>会员登录</title>
    <link rel="stylesheet" type="text/css" href="/secondhand/Public/Q-css/login.css">
    <link rel="stylesheet" type="text/css" href="/secondhand/Public/naranja/naranja.min.css">
    <script type="text/javascript" src="/secondhand/Public/jquery/jquery-3.3.1.min.js"></script>
    <script type="text/javascript" src="/secondhand/Public/naranja/naranja.js"></script>
</head>
<script>
    var captcha = "<?php echo U('Home/Login/captcha');?>";
    var message = '';//消息提示内容

    //刷新验证码
    function refreshCaptcha() {
        $('#captcha').attr('src', captcha + '?' + Math.random());
    }

    //submit提交验证
    function yanzheng() {
        var username = $('#username').val();
        var password = $('#password').val();
        var yzm = $('#yzm').val();
        if (username == "" || username == null) {
            message = '请输入用户名';
            narn('error', message);
            $('#username').focus();
            return false;
        }
        if (password == "" || password == null) {
            message = '请输入密码';
            narn('error', message);
            $('#password').focus();
            return false;
        }
        if (yzm == "" || yzm == null) {
            message = '请输入验证码';
            narn('error', message);
            $('#yzm').focus();
            return false;
        }
    }

    //弹出框
    function narn(type, message) {
        naranja()[type]({
            title: '新消息提示',
            text: message,
            timeout: 3000,
        })
    }


    $(document).ready(function () {
        refreshCaptcha();
    });
</script>
<body>
<!-- login -->
<div class="top center">
    <div class="logo center">
        <a href="" target="_blank"><img src="/secondhand/Public/Q-image/logo.jpg" style="width: 110px;height: 110px;"></a>
    </div>
</div>
<form method="post" action="<?php echo U('Home/Login/gotoLogin');?>" onsubmit="return yanzheng()" class="form center">
    <div class="login">
        <div class="login_center">
            <div class="login_top">
                <div class="left fl">会员登录</div>
                <div class="right fr">您还不是我们的会员？<a href="<?php echo U('Home/Register/register');?>" target="_self">立即注册</a></div>
                <div class="clear"></div>
                <div class="xian center"></div>
            </div>
            <div class="login_main center">
                <div class="username">用户名:&nbsp;<input class="shurukuang" type="text" id="username" name="username"
                                                       placeholder="请输入你的用户名"/></div>
                <div class="username">密&nbsp;&nbsp;&nbsp;&nbsp;码:&nbsp;<input class="shurukuang" type="password"
                                                                              id="password"
                                                                              name="password" placeholder="请输入你的密码"/>
                </div>
                <div class="username">
                    <div class="left fl">验证码:&nbsp;<input class="yanzhengma" type="text" id="yzm" name="yzm"
                                                          placeholder="请输入验证码"/></div>
                    <div class="right fl"><img style="margin-left:-10px;cursor:pointer " onclick="refreshCaptcha()" id="captcha"></div>
                    <div class="clear"></div>
                </div>
            </div>
            <div class="login_submit">
                <input class="submit" type="submit" name="submit" value="立即登录">
            </div>

        </div>
    </div>
</form>
<footer>
    <!--重庆信息技术职业学院-<img src="../Q-image/ghs.png" alt="">2016级毕业项目&ndash;&gt;-->
    <div class="copyright">简体 | 繁体 | English | 常见问题</div>
    <div class="copyright">
        <a href="http://www.cqga.gov.cn/wlaq/">
            <img src="/secondhand/Public/Q-image/sentrybox.gif">
            <img src="/secondhand/Public/Q-image/batb.png">
        </a>
        <a href="http://www.beian.gov.cn/portal/registerSystemInfo?recordcode=50010102000281">渝公网安备50010102000281号|渝ICP备11006384号-1
        </a>
    </div>


</footer>
</body>
</html>
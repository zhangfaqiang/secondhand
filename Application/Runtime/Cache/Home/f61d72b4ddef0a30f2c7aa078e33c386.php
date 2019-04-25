<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="author" content="order by dede58.com"/>
    <title>用户注册</title>
    <link rel="stylesheet" type="text/css" href="/secondhand/Public/Q-css/login.css">
    <link rel="stylesheet" type="text/css" href="/secondhand/Public/naranja/naranja.min.css">
    <script type="text/javascript" src="/secondhand/Public/jquery/jquery-3.3.1.min.js"></script>
    <script type="text/javascript" src="/secondhand/Public/naranja/naranja.js"></script>
</head>
<script>
    var message = '';//提示信息
    var num = '';//随机验证码

    //表单提交检查
    function submitCheck() {
        var username = $('#username').val();
        var password = $('#password').val();
        var confirmPassword = $('#confirmPassword').val();
        var phone = $('#phone').val();
        var captcha = $('#captcha').val();
        if (username == null || username == "") {
            message = '用户名不能为空!';
            narn('warn', message);
            $('#username').focus();
            return false;
        }
        if (password == null || password == "") {
            message = '密码不能为空!';
            narn('warn', message);
            $('#password').focus();
            return false;
        }
        if (confirmPassword == null || confirmPassword == "") {
            message = '确认密码不能为空!';
            narn('warn', message);
            $('#confirmPassword').focus();
            return false;
        }
        if (phone == null || phone == "") {
            message = '手机号码不能为空!';
            narn('warn', message);
            $('#phone').focus();
            return false;
        }
        if (captcha == null || captcha == "") {
            message = '用户名不能为空!';
            narn('warn', message);
            $('#captcha').focus();
            return false;
        }
        if (password != confirmPassword) {
            message = '两个密码不一致！';
            $('#checkPassword').append('<img src="/secondhand/Public/Q-image/error.png" height="20px" width="20px" />');
            narn('error', message);
            $('#confirmPassword').focus();
            return false;
        }
        if (captcha != num) {
            message = '验证码错误,请输入正确验证码,或重新获取！';
            narn('error', message);
            $('#captcha').focus();
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

    //手机短信接口
    function sendSMS() {
        var tel = $('#phone').val();
        var myreg = /^[1][3,4,5,7,8,9][0-9]{9}$/;
        for (var i = 0; i < 4; i++) {
            num += Math.floor(Math.random() * 10);
        }
        if (myreg.test(tel)) {

            $.post('/secondhand/Public/SMS/SendTemplateSMS.php', {'tel': tel, 'num': num}, function (res) {
                if (res) {
                    message = '短信发送成功！';
                    narn('success', message);
                } else {
                    message = '短信发送失败！';
                    narn('error', message);
                }
            })
        } else {
            message = '请输入正确手机号！';
            narn('error', message);
        }
    }

    //光标离开username Input框时检查用户名是否被注册
    function judgeUserNmaeExist() {
        $('#checkUserName').empty();
        var username = $('#username').val();
        $.ajax({
            url: "<?php echo U('Home/Register/judgeUserNmaeExist');?>",
            type: 'post',
            dataType: 'json',
            data: {username: username},
            success: function (code) {
                console.log(code);
                if (code == 0) {
                    var message = '该用户名已经注册！';
                    $('#checkUserName').append('<img src="/secondhand/Public/Q-image/error.png" height="20px" width="20px" />');
                    narn('error', message);
                }
                if (code == 1) {
                    $('#checkUserName').append('<img src="/secondhand/Public/Q-image/success.png" height="20px" width="20px" />');
                }

            }
        });
    }

    //检查密码是否一致
    function checkPassword() {
        $('#checkPassword').empty();
        var password = $('#password').val();
        var confirmPassword = $('#confirmPassword').val();
        if (password != confirmPassword) {
            message = '两个密码不一致！';
            $('#checkPassword').append('<img src="/secondhand/Public/Q-image/error.png" height="20px" width="20px" />');
            narn('error', message);
            $('#confirmPassword').focus();
        } else {
            $('#checkPassword').append('<img src="/secondhand/Public/Q-image/success.png" height="20px" width="20px" />');
        }
    }


    $(document).ready(function () {
    });
</script>
<body>
<form method="post" action="<?php echo U('Home/register/registerLoginUser');?>" onsubmit="return submitCheck()">
    <div class="regist">
        <div class="regist_center">
            <div class="regist_top">
                <div class="left fl">会员注册</div>
                <div class="right fr"><a href="./index.html" target="_self">小米商城</a></div>
                <div class="clear"></div>
                <div class="xian center"></div>
            </div>
            <div class="regist_main center">
                <div class="username">用&nbsp;&nbsp;户&nbsp;&nbsp;名:&nbsp;&nbsp;<input class="shurukuang"
                                                                                     onblur="judgeUserNmaeExist()"
                                                                                     style="ime-mode:disabled"
                                                                                     type="text"
                                                                                     name="username" id="username"
                                                                                     placeholder="请输入你的用户名"/><span>请不要输入汉字</span><span
                        id="checkUserName"></span>
                </div>
                <div class="username">密&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;码:&nbsp;&nbsp;<input
                        class="shurukuang" type="password" id="password" name="password" placeholder="请输入你的密码"/><span>请输入6位以上字符</span>
                </div>

                <div class="username">确认密码:&nbsp;&nbsp;<input class="shurukuang" type="password" id="confirmPassword"
                                                              onblur="checkPassword()"
                                                              name="confirmPassword"
                                                              placeholder="请确认你的密码"/><span>两次密码要输入一致哦</span><span
                        id="checkPassword"></span></div>
                <div class="username">手&nbsp;&nbsp;机&nbsp;&nbsp;号:&nbsp;&nbsp;<input class="shurukuang" type="text"
                                                                                     name="phone" id="phone"
                                                                                     placeholder="请填写正确的手机号"/><span>填写下手机号吧，方便我们联系您！</span>
                </div>
                <button id="sendCaptcha" onclick="sendSMS()" type="button" style="margin-left: 75px;">点击发送验证码
                </button>
                <div class="username">
                    <div class="left fl">验&nbsp;&nbsp;证&nbsp;&nbsp;码:&nbsp;&nbsp;<input class="yanzhengma" type="text"
                                                                                        name="captcha" id="captcha"
                                                                                        placeholder="请输入验证码"/></div>
                    <div class="clear"></div>
                </div>
            </div>
            <div class="regist_submit">
                <input class="submit" type="submit" name="submit" value="立即注册">
            </div>
            <div style="margin-left: 620px; margin-top: -50px;"><span>已有账号？</span><a href="<?php echo U('Home/Login/login');?>">点击返回登陆</a>
            </div>
        </div>
    </div>
</form>
</body>
</html>
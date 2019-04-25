<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>闲置发布</title>
    <link rel="stylesheet" type="text/css" href="/SecondHand/Public/Q-css/base.css">
    <link rel="stylesheet" type="text/css" href="/SecondHand/Public/Q-css/home.css">
    <link rel="stylesheet" type="text/css" href="/SecondHand/Public/Q-css/style.css">
    <link rel="stylesheet" type="text/css" href="/SecondHand/Public/popup/css/simpleAlert.css">
    <link rel="stylesheet" type="text/css" href="/SecondHand/Public/naranja/naranja.min.css">
</head>
<body>
<header>
    <div>
        <a href="<?php echo U('Home/Main/main');?>" target="_blank">
            <div class="logo fl"></div>
        </a>
        <a href="">
            <div class="ad_top fl"></div>
        </a>
    </div>
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
<!-- start banner_x -->
<div class="banner_x center">
    <a href="<?php echo U('Home/Main/main');?>">
        <div class="logo fl"></div>
    </a>
    <a href="">
        <div class="ad_top fl"></div>
    </a>
</div>
<!-- end banner_x -->
<section class="aui-content">
    <div style="height:20px;"></div>
    <div class="aui-content-up">
        <div class="aui-content-up-form">
            <h2>发布闲置</h2>
        </div>
        <div class="aui-form-group clear">
            <label class="aui-label-control">
                标题 <em>*</em>
            </label>
            <div class="aui-form-input">
                <input type="text" class="aui-form-control-two" id="biaoti" name="biaoti" required
                       placeholder="品类 品牌 型号 都是买家喜欢搜索的">
            </div>
        </div>
        <div class="aui-form-group clear">
            <label class="aui-label-control">
                描述<em>*</em>
            </label>
            <div class="aui-form-input">
                <input class="aui-form-control" name="description" id="description"
                       minlength="5"
                       placeholder="描述一下宝贝转手原因、入手渠道和使用感受"
                       required
                >
            </div>
        </div>
        <div class="aui-form-group clear">
            <label class="aui-label-control">
                价格<em>*</em>
            </label>
            <div class="aui-form-input">
                <input type="text" class="aui-form-control-two" id="jiage" name="jiage" required
                       onkeyup="if(this.value.length==1){this.value=this.value.replace(/[^1-9]/g,'')}else{this.value=this.value.replace(/\D/g,'')}"
                       onafterpaste="if(this.value.length==1){this.value=this.value.replace(/[^1-9]/g,'0')}else{this.value=this.value.replace(/\D/g,'')}"
                       placeholder="正整数"
                       required
                >
            </div>
        </div>
        <div class="aui-form-group clear">
            <label class="aui-label-control">
                图片 <em>*</em>(点击图片进行删除)
            </label>
            <div style="border: 1px solid rgb(179,206,249);width: 470px;height: 110px;margin-left:80px;border-radius: 4px;">
                <ul style="margin-left: 11px;" id="image">
                </ul>
            </div>
        </div>
        <div>
            <input type="file" onchange="upload()" id="fileUpload"
                   name="fileUpload" style="margin-left: 80px;">
        </div>
        <div class="aui-form-group clear">
            <input type="button" onclick="publish()" id="fabu" style="margin-left:270px;"
                   class="aui-btn aui-btn-account" value="发布">
        </div>
</section>
</body>
</html>
<!-- mask end -->
<script type="text/javascript" src="/SecondHand/Public/jquery/jquery-3.3.1.min.js"></script>
<script type="text/javascript" src="/SecondHand/Public/popup/js/simpleAlert.js"></script>
<script type="text/javascript" src="/SecondHand/Public/naranja/naranja.js"></script>
<script type="text/javascript">
    var userId = "<?php echo session('userid');?>";//用户id
    var ROOT = '/SecondHand';//项目根目录
    var length = 0;//图片数量
    var message = '';
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
        $('#biaoti').val('');
        $('#description').val('');
        $('#jiage').val('');

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


    //图片上传
    function upload() {
        if (length != 4) {
            var file = document.getElementById('fileUpload').files[0]
            var formdata = new FormData();
            formdata.append('file', file)
            formdata.append('userId', userId);
            $.ajax({
                url: '<?php echo U("Home/Release/upload");?>',
                type: 'post',
                dataType: 'json',
                data: formdata,
                processData: false,
                contentType: false,
                async: false,
                success: function (data) {
                    $('#image').append('<li style="float: left;" ><img id="photo' + length + '" name="photo' + length + '" onclick="deleteImg(this)" class="img" style="width: 110px;height: 110px;  padding:10px;" src="' + ROOT + '/uploads/' + data + '"></li>');
                    length++;
                },
                error: function (data) {
                    console.log('失败:' + data);
                }
            });
        } else {
            alert('只能上传4张图片！');
        }

    }

    //删除图片
    function deleteImg(img) {
        var dblChoseAlert = simpleAlert({
                "content": "确定删除图片?",
                "buttons": {
                    "确定": function () {
                        length--;
                        var my = $(img).parent()[0];
                        if (my != null) {
                            my.parentNode.removeChild(my);
                        }
                        dblChoseAlert.close();
                    },
                    "取消":

                        function () {
                            dblChoseAlert.close();
                        }
                }
            }
        )
    }

    //发布闲置
    function publish() {
        var biaoti = $('#biaoti').val();
        var description = $('#description').val();
        var jiage = $('#jiage').val();
        var photo0url = $('#photo0').attr('src');
        var myDate = new Date();
        var year = myDate.getFullYear(); //获取完整的年份(4位,1970)
        var month = myDate.getMonth(); //获取当前月份(0-11,0代表1月)
        var data = myDate.getDate(); //获取当前日(1-31)
        var publishTime = year + '.' + month + '.' + data;
        $.ajax({
            url: '<?php echo U("Home/Release/publish");?>',
            type: 'post',
            dataType: 'json',
            data: {
                userId: userId,
                biaoti: biaoti,
                description: description,
                jiage: jiage,
                photo0url: photo0url,
                publishTime: publishTime
            },
            success: function (code) {
                if (code == 1) {
                    message = '发布成功!';
                    narn('success', message);
                    location.reload();
                }
                if (code == 0) {
                    message = '发布失败！';
                    narn('error', message);
                }
                if (code == 2) {
                    message = '请先登陆！';
                    narn('warn', message);
                }
            }
        });
    }
</script>
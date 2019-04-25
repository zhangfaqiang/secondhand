<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>错误页面</title>
    <link rel="stylesheet" href="/secondhand/Public/mould/style.css">
</head>

<body>
<div class="centered">
    <div class="mj">
        <div class="full-head">
            <div class="hat"></div>
            <div class="hat-part"></div>
            <div class="m-head"></div>
        </div>
        <div class="m-body"></div>

        <div class="arms">
            <div class="arm"></div>
            <div class="arm-right"></div>
            <div class="arm-left"></div>
        </div>

        <div class="legs">
            <div class="leg-right">
                <div class="upper-right"></div>
                <div class="lower-right"></div>
            </div>
            <div class="leg-left">
                <div class="upper-left"></div>
                <div class="lower-left"></div>
            </div>
        </div>

        <div class="foot">
            <div class="feet feet-right"></div>
            <div class="feet feet-left"></div>
        </div>

    </div>
    <div>
        <?php if(isset($message)) {?>
        <h2 class="success"><?php echo($message); ?></h2>
        <?php }else{?>
        <h2 class="error"><?php echo($error); ?></h2>
        <?php }?>
        <span>页面自动<a id="href" href="<?php echo($jumpUrl); ?>" style="cursor:pointer;">跳转</a>,时间：<b
                id="wait"><?php echo($waitSecond); ?></b></span>
    </div>

</div>
</body>
<script type="text/javascript">
    (function () {
        var wait = document.getElementById('wait'), href = document.getElementById('href').href;
        var interval = setInterval(function () {
            var time = --wait.innerHTML;
            if (time <= 0) {
                location.href = href;
                clearInterval(interval);
            }
            ;
        }, 1000);
    })();
</script>
</html>
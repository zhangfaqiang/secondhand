<?php if (!defined('THINK_PATH')) exit();?><!-- $Id: goods_info.htm 17126 2010-04-23 10:30:26Z liuhui $ -->
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
        "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <title>添加新商品 </title>
    <meta name="robots" content="noindex, nofollow">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
</head>
<body>
<!-- start goods form -->
<div style="width:900px;height:90%;padding:5px;margin:10px auto;">
    <div id="p" class="easyui-panel" title="商品添加"
         style="width:100%;height:95%;padding:10px;background:#fafafa;"
         data-options="iconCls:'icon-add',closable:false,
    collapsible:false,minimizable:false,maximizable:false">
        <form enctype="multipart/form-data" action="<?php echo U('Admin/Goods/goodsadd');?>" method="post" id="addgoodsfrom"
              name="addgoodsfrom">
            <table cellpadding="5">
                <tr>
                    <td>商品名称：</td>
                    <td><input style="width: 448px" class="easyui-textbox" type="text" name="goods_name" id="goods_name"
                               data-options="required:true"/></td>
                </tr>

                <tr>
                    <td>本店售价：</td>
                    <td><input class="easyui-numberbox" type="text" name="shop_price" id="shop_price"
                               data-options="required:true" precision="2"/>元
                    </td>
                </tr>
                <tr>
                    <td>全新价格：</td>
                    <td><input class="easyui-numberbox" type="text" id="market_price" name="market_price"
                               data-options="required:true"
                               precision="2"/>元
                    </td>
                </tr>
                <tr>
                    <td>上传商品缩略图：</td>
                    <td>
                        <input type="file" style="width:100%"
                               name="goods_img" id="goods_img"/>
                        <input type="hidden" id="filePath" name="filePath"/>
                        <input type="hidden" id="filePath2" name="filePath2"/>
                    </td>
                </tr>

                <tr>
                    <td>商品重量：</td>
                    <td>
                        <input class="easyui-numberbox" type="text" name="goods_weight" id="goods_weight"
                               precision="1" data-options="required:true"/>千克
                    </td>
                </tr>
                <tr>
                    <td> 商品库存数量：</td>
                    <td>
                        <input class="easyui-numberbox" type="text" name="goods_number" id="goods_number"
                               data-options="required:true"/>

                </tr>
                <tr>
                    <td> 加入推荐：</td>

                    <td>

                        最好 <input type="radio" value="1"  name="sp_tuijian"/>
                        最新<input type="radio" value="2" checked="checked" name="sp_tuijian"/>
                        最热 <input type="radio" value="3" name="sp_tuijian"/>
                        减价<input type="radio" value="4" name="sp_tuijian"/>
                    </td>
                </tr>
                <tr>

                    <td>商品类型：</td>
                    <td>
                        <select class="easyui-combobox" id="cat_id" name="cat_id"
                                data-options="panelHeight:'auto',panelMaxHeight:200"
                                style="width: 180px;">
                            <option value="-1">请选择</option>

                        </select>
                    </td>

                </tr>

                <tr>
                    <td>产品分类</td>
                    <td>
                        <select class="easyui-combobox" name="brand_id" id="brand_id"
                                data-options="panelHeight:'auto',panelMaxHeight:200"
                                style="width: 180px;">
                            <option value="-1">请选择</option>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td>详细描述:</td>
                    <td>
                        <input class="easyui-textbox" name="goods_desc" id="goods_desc"
                               data-options="required:true,multiline:true"
                               style="height:60px;width: 380px;"/>
                    </td>
                </tr>

            </table>
            <a href="#" onclick="addbiaodan()" class="easyui-linkbutton" data-options="iconCls:'icon-save'"
               style="width: 90px;height: 35px;">添加</a>

        </form>

    </div>
</div>
<script>
    $(function () {
//获取商品类型
        $.ajax({
            url: '<?php echo U("Admin/Goods/getCatid","","");?>',
            dataType: 'json',
            type: 'post',
            success: function (data) {
                for (k in data) {
                    $('#cat_id').append('<option value=' + data[k].goods_catid + '>' + data[k].goods_catname + '</option>');
                }

                $("#cat_id").combobox({
                    onChange: function (new_value, old_value) {
                        $("#brand_id").empty();
                        $('#brand_id').append('<option value="-1">请选择</option>');
                        $.ajax({
                            url: '<?php echo U("Admin/Goods/getbrand","","");?>',
                            dataType: 'json',
                            type: 'post',
                            data: 'cat_id=' + new_value,
                            success: function (data) {
                                for (k in data) {
                                    $('#brand_id').append('<option value=' + data[k].brand_id + '>' + data[k].brand_name + '</option>');
                                }
                                $("#brand_id").combobox({});
                            }
                        });
                    }
                });

            }
        });


//文件上传
        $('#goods_img').uploadify({
            swf: '/secondhand/Public/Admin/Uploadify/uploadify.swf', //引入Uploadify核心Flash文件
            uploader: '<?php echo U("Admin/Goods/fileUpload","","");?>', //PHP处理脚本地址
            width: 120, //上传按钮宽度
            height: 30, //上传按钮高度
            fileSizeLimit: 2048, //上传图片大小不超过2M
            buttonImage: '/secondhand/Public/Admin/Uploadify/browse-btn.png', //上传按钮背景图地址
            fileTypeDesc: 'Image File', //选择文件提示文字
            fileTypeExts: '*.jpeg; *.jpg; *.png; *.gif', //允许选择的文件类型
            formData: {},
            //上传成功后的回调函数
            onUploadSuccess: function (file, data, response) {

                eval('var data = ' + data);
                $('input[name=filePath]').val(data.path);
                $('input[name=filePath2]').val(data.path2);

            }, onUploadError: function (file, errorCode, errorMsg, errorString) {
                alert('The file ' + file.name + ' could not be uploaded: ' + errorString);
                alert("上传图片失败");
            }
        });
    });

    function addbiaodan() {
        goods_name = $('#goods_name').textbox("getText");
        shop_price = $('#shop_price').textbox("getText");
        market_price = $('#market_price').textbox("getText");
        filePath = $('#filePath').val();
        goods_weight = $('#goods_weight').textbox("getText");
        goods_number = $('#goods_number').textbox("getText");
        cat_id = $('#cat_id').combobox("getValue");
        brand_id = $('#brand_id').combobox("getValue");
        goods_desc = $('#goods_desc').textbox("getText");

        if (goods_name == "") {
            $.messager.show({
                "title": "系统提示",
                "msg": "请输入商品名称"
            });
            return;
        }
        if (shop_price == "") {
            $.messager.show({
                "title": "系统提示",
                "msg": "请输入商品价格"
            });
            return;
        }
        if (market_price == "") {
            $.messager.show({
                "title": "系统提示",
                "msg": "请输入市场价格"
            });
            return;
        }
        if (filePath == "") {
            $.messager.show({
                "title": "系统提示",
                "msg": "请上传图片"
            });
            return;
        }
        if (goods_weight == "") {
            $.messager.show({
                "title": "系统提示",
                "msg": "请输入重量"
            });
            return;
        }
        if (goods_number == "") {
            $.messager.show({
                "title": "系统提示",
                "msg": "请输入数量"
            });
            return;
        }
        if (cat_id == -1) {
            $.messager.show({
                "title": "系统提示",
                "msg": "请选择类别"
            });
            return;
        }
        if (brand_id == -1) {
            $.messager.show({
                "title": "系统提示",
                "msg": "请选择品牌"
            });
            return;
        }
        if (goods_desc == "") {
            $.messager.show({
                "title": "系统提示",
                "msg": "请输入商品的描述"
            });
            return;
        }

        $('#addgoodsfrom').ajaxSubmit({
                url: '<?php echo U("Admin/Goods/add","","");?>',
                dataType: 'json',
                type: 'post',
                beforeSubmit: function (arr, $form, option) {
                    obj = {
                        "name": "brand_name",
                        "value": $('#brand_id').combobox("getText"),
                        "type": "hidden",
                        "required": true
                    }
                    arr.push(obj);
                }, success: function (data) {

                    $.messager.show({
                        "title": "系统提示",
                        "msg": "添加成功"
                    });

                    $('#addgoodsfrom').form('reset');

                }
            }
        )
        ;

    }
</script>
</body>
</html>
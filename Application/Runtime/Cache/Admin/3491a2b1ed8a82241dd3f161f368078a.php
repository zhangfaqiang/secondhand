<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
    <script type="text/javascript" src="/secondhand/Public/admin/easyui/themes/jquery.min.js"></script>
    <script type="text/javascript" src="/secondhand/Public/admin/easyui/themes/jquery.easyui.min.js"></script>
</head>
<body>


<div class="easyui-layout" data-options="fit:true">
    <div data-options="region:'center',border:false">
        <!-- Begin of toolbar -->
        <div id="student-toolbar">
            <div class="wu-toolbar-button">
            </div>
            <div class="wu-toolbar-search">
                <label>
                    商品分类
                </label>
                <select class="easyui-combobox" editable="false" id="sp_fenlei" name="sp_fenlei"
                        panelheight="auto" style="width:160px;">
                    <option value="-1">请选择</option>
                    <option value="1">手机配件</option>
                    <option value="2">电玩随身听</option>
                    <option value="3">相机/摄像机</option>
                    <option value="4">电脑/电脑周边</option>
                    <option value="5">手机品牌</option>
                    <option value="6">女装</option>
                    <option value="7">男装</option>
                    <option value="8">配饰</option>
                    <option value="9">生活用品</option>
                    <option value="10">箱包</option>

                </select>
                <label>
                    商品名称
                </label>
                <input class="easyui-textbox" data-options="prompt:'商品名称'" id="sp_mingchen" name="sp_mingchen"
                       style="width:120px;" type="text"/>
                <label>
                    商品编号
                </label>
                <input class="easyui-textbox" data-options="prompt:'商品编号'" id="sp_bianhao" name="sp_bianhao"
                       style="width:120px;" type="text"/>
                <label>
                    商品状态
                </label>
                <select class="easyui-combobox" id="sp_zhuangtai" name="sp_zhuangtai" style="width: 120px;"
                        panelheight="auto">
                    <option value="-1">请选择</option>
                    <option value="0">未发布</option>
                    <option value="1">通过发布</option>
                </select>
                <a class="easyui-linkbutton" href="#" iconcls="icon-search" onclick="startSeach()"
                   style="margin-left:30px;">
                    开始检索
                </a>
            </div>
        </div>
        <!-- End of toolbar -->
        <table class="easyui-datagrid" id="spliebiao" toolbar="#student-toolbar" data-options="fit:true">
        </table>
    </div>
</div>
<!--消息框开始-->
<div id="dlg" class="easyui-dialog" data-options="closed:true,iconCls:'icon-save'"
     style="width:600px; padding:10px;">
    <form id="xiugai_form" method="post" name="xiugai_form">
        <input type="hidden" name="dlg_goodbianhao" class="easyui-textbox"
               id="dlg_goodbianhao"/>
        <table class="disDorm_table">
            <tr>
                <td width="20%" align="right">商品名称:</td>
                <td>
                    <input type="text" name="dlg_goodname" class="easyui-textbox"
                           id="dlg_goodname" style="width:120px"/>
                </td>
                <td width="20%" align="right">商品数量:</td>
                <td>
                    <input type="text" name="dlg_goodsl" class="easyui-textbox"
                           id="dlg_goodsl" style="width:120px"/>
                </td>
            </tr>
            <tr>

                <td width="20%" align="right">商品价格:</td>
                <td>
                    <input type="text" name="dlg_price" class="easyui-textbox"
                           id="dlg_price" style="width:120px"/>
                </td>
                <td width="20%" align="right">发布状态:</td>
                <td>
                    <span class="radioSpan">
                         <input type="radio" name="good_state" value="0"><span
                            style="color: red">未发布</span></input>
                        <input type="radio" name="good_state" value="1"><span style="color: green">通过发布</span></input>
                    </span>
                </td>
            </tr>

        </table>
    </form>
</div>
<div id="dlg_shanchu" class="easyui-dialog" data-options="closed:true,iconCls:'icon-save'"
     style="width:300px; padding:10px;">
    <H4>将永久删除此纪录，是否继续</H4>
    <form id="shanchu_form" name="shanchu_form">
        <input class="easyui-textbox" type="hidden" name="shanchu_goodsn" id="shanchu_goodsn"/>
    </form>
</div>
<script>

    //商品列表表格
    $(function () {


        $('#spliebiao').datagrid({
            url: '<?php echo U("Admin/Index/getLiebiao","","");?>',
            rownumbers: true,
            pagination: true,
            fitColumns: true,
            fit: true,
            singleSelect: true,
            pageSize: 10,
            pageList: [10, 50, 100],
            remoteSort: true,
            multiSort: true,
            loadMsg: "加载中。。。",
            columns: [[
                {field: 'goods_name', title: '商品名称', width: 100},
                {field: 'goods_sn', title: '商品编号', width: 100},
                {field: 'goods_number', title: '商品数量', width: 100},
                {field: 'shop_price', title: '商品价格', width: 100},
                {field: 'good_statename', title: '状态(商品状态默认未发布)', width: 150},
                {field: 'good_state', title: '状态id', width: 150,hidden:true},
                {
                    field: 'bianji', title: '操作', width: 100, formatter: function (value, row, index) {
                        return "<a href='#' onclick='xiugai(" + index + ")' id='xiugai' class='easyui-linkbutton' name='xiugai'>修改</a>" + "<a href='#' onclick='shanchu(" + index + ")' id='shanchu' class='easyui-linkbutton' name='shanchu'>删除</a>";
                    }
                }
            ]],

            queryParams: {
                sp_fenlei: -1,
                sp_mingchen: "",
                sp_bianhao: "",
                sp_zhuangtai: -1
            }, onLoadSuccess: function (data) {
                $("a[name='xiugai']").linkbutton({
                    plain: true,
                    iconCls: 'icon-edit'
                });
                $("a[name='shanchu']").linkbutton({
                    plain: true,
                    iconCls: 'icon-cancel'
                });
            }
        });
    });

    //查询按钮
    function startSeach() {
        var queryParams = $('#spliebiao').datagrid("options").queryParams;
        queryParams.sp_fenlei = $('#sp_fenlei').combobox("getValue");
        queryParams.sp_mingchen = $('#sp_mingchen').textbox("getText");
        queryParams.sp_zhuangtai = $('#sp_zhuangtai').combobox("getValue");
        queryParams.sp_bianhao = $('#sp_bianhao').textbox("getText");
        $('#spliebiao').datagrid("reload");
    }

    function xiugai(index) {
        $('#dlg').dialog({
            title: '修改商品',
            closed: false,
            modal: true,
            top: 30,
            buttons: [
                {
                    text: '确认',
                    iconCls: 'icon-edit',
                    handler: function () {
                        xiugai_formSubmit();
                        $('#dlg').dialog('close');
                        $('#spliebiao').datagrid("reload");
                    }
                }, {
                    text: '取消',
                    iconCls: 'icon-cancel',
                    handler: function () {
                        $('#dlg').dialog('close')
                    }
                }
            ]
        });
        var row = $('#spliebiao').datagrid('getRows');//获取表格中所有的行
        if (row) {
            console.log(row[index].goods_name);
            $('input[textboxname=dlg_goodname]').textbox('setValue', row[index].goods_name);
            $('input[textboxname=dlg_goodbianhao]').textbox('setValue', row[index].goods_sn);
            $('input[textboxname=dlg_goodsl]').textbox('setValue', row[index].goods_number);
            $('input[textboxname=dlg_price]').textbox('setValue', row[index].shop_price);
            $("input[name=good_state][value='"+row[index].good_state+"']").attr("checked",true);
        }
    }
    var goods_sn;
    //删除表单的数据
    function shanchu(index) {
        var rows = $('#spliebiao').datagrid('getRows');//获取表格中所有的行
        console.log(rows[index].goods_sn);
        goods_sn = rows[index].goods_sn;
        $('input[textboxname=shanchu_goodsn]').textbox('setValue', rows[index].goods_sn);

        $('#dlg_shanchu').dialog({
            title: '删除商品',
            closed: false,
            modal: true,
            top: 30,
            buttons: [
                {
                    text: '确认',
                    iconCls: 'icon-edit',
                    handler: function () {
                        $('#shanchu_form').ajaxSubmit({
                            url: '<?php echo U("Admin/Index/sp_chanchu","","");?>',
                            type: 'post',
                            dataType: 'json',
                            success: function (data) {
                                if (data.code = -1) {
                                    $.messager.show({
                                        title: '系统提示',
                                        msg: '删除成功'
                                    });

                                }
                            }
                        });

                        $('#dlg_shanchu').dialog('close');
                        $('#spliebiao').datagrid("reload");
                    }
                }, {
                    text: '取消',
                    iconCls: 'icon-cancel',
                    handler: function () {
                        $('#dlg_shanchu').dialog('close')
                    }
                }
            ]
        })
    }
    //修改表单的数据提交
    function xiugai_formSubmit() {
        $('#xiugai_form').ajaxSubmit({
            url: '<?php echo U("Admin/Index/xiugai_formSubmit","","");?>',
            dataType: 'json',
            type: 'post',
            beforeSubmit: function (arr, $form, options) {

            },
            success: function (data) {

                $.messager.show({
                    title: '系统提示',
                    msg: '修改成功'
                })
            }, error: function (xhr, status, error, $form) {
                $.messager.show({
                    title: '系统提示',
                    msg: "修改失败"
                })
            },
            complete: function (xhr, status, $form) {
            }
        });
    }
</script>
</body>
</html>
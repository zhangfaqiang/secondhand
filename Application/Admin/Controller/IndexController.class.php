<?php

namespace Admin\Controller;

use Think\Controller;

class IndexController extends Controller
{

    /*主页写入cookie检测防止翻墙*/
    public function index()
    {
        $unll = null;
        if (cookie('user') !== $unll) {
            $user = cookie('user');
            $this->display();
        } else {
            $this->success('沙雕请先登陆', U('Admin/user/login'), 1);
        }
    }

//删除商品
    public function sp_chanchu()
    {
        $where['goods_sn'] = I('post.shanchu_goodsn');
        M('goods')->where($where)->delete();
        $result = array(
            'msg' => "删除成功",
            'code' => -1
        );
        $this->ajaxReturn($result, 'json');
    }

//删除订单
    public function order_shanchu()
    {

        $pay = M('pay');
        $where['user_order'] = I('post.shanchu_user_order');
        $pay->where($where)->delete();
        $result = array(
            'msg' => "删除成功",
            'code' => -1
        );
        $this->ajaxReturn($result, 'json');
    }

//修改订单
    public function orderxiugai_formSubmit()
    {

        $goods = M('pay');
        $goods->user_address_name = I('post.user_address_name');//收货人名字
        $goods->good_stateid = I('post.order_zhuangtai');//状态
        $goods->user_address = I('post.order_useraddress');//地址
        $goods->user_name = I('post.order_username');//用户名
        $goods->user_phone = I('post.order_phone');//电话
        $goods->user_total = I('post.order_usertotal');//价钱
        if (I('post.order_zhuangtai') != -1 && I('post.order_zhuangtai') != 0) {
            $goods->good_statename = "已发货";
        }

        if (I('post.order_zhuangtai') == 0) {
            $goods->good_statename = "未发货";
        }
        $where['user_order'] = I('post.dlg_user_order');

        $goods->where($where)->save();
        $result = array(
            'msg' => "修改状态成功",
            'code' => 1
        );
        $this->ajaxReturn($result, 'json');

    }    //修改商品

    public function xiugai_formSubmit()
    {
        $a = $_POST;
        $goods = M('goods');
        $goods->goods_name = I('post.dlg_goodname');
        $goods->goods_sn = I('post.dlg_goodbianhao');
        $goods->goods_number = I('post.dlg_goodsl');
        $goods->shop_price = I('post.dlg_price');
        $goods->good_state = I('post.good_state');
        $goods->last_update = date('Y-m-d H:i:s');
        if (I('post.good_state') != -1 && I('post.good_state') != 0) {
            $goods->good_statename = "通过发布";
        }
        if (I('post.good_state') == 0) {
            $goods->good_statename = "未发布";
        }
        $where['goods_sn'] = I('post.dlg_goodbianhao');

        $goods->where($where)->save();
        $result = array(
            'msg' => "修改状态成功",
            'code' => 1
        );
        $this->ajaxReturn($result, 'json');
    }    //添加商品

    public function addGoods()
    {

        $image_file = I('post.goods_img');
        $base64_img = base64EncodeImage($image_file);
        $t = $_POST;
        $this->ajaxReturn($t, 'json');
    }

    function base64EncodeImage($image_file)
    {
        $base64_image = '';
        $image_info = getimagesize($image_file);
        $image_data = fread(fopen($image_file, 'r'), filesize($image_file));
        $base64_image = 'data:' . $image_info['mime'] . ';base64,' . chunk_split(base64_encode($image_data));
        return $base64_image;
    }

    /*显示列表页面*/
    public function liebiao()
    {
        $this->display();

    }

//获取订单信息
    public function getOrder()
    {
        $fh_zhuangtai = I("post.fh_zhuangtai");
        if ($fh_zhuangtai != -1) {
            $where['good_stateid'] = $fh_zhuangtai;
        }
        $total = M('pay')->where($where)->count();
        $page = I("post.page");//获取页码
        $rows = I("post.rows");//获取显示多少行（左下角那个）
        $startNo = ($page - 1) * $rows;//起始查询条数$startno开始的$pageSize条数据
        $limit = $startNo . ',' . $rows;//limit需要两个参数，起始位开始查询，查询多少条
        $goodsList = M('pay')->where($where)->limit($limit)->select();
        $result = array(
            "total" => $total,//返回的总条数（在右下角显示的那个）
            "rows" => $goodsList//返回查询到的条数
        );
        $this->ajaxReturn($result, 'json');
    }

    //获取商品列表数据
    public function getLiebiao()
    {
        $fenlei = I("post.sp_fenlei");
        $mingchen = I("post.sp_mingchen");
        $bianhao = I("post.sp_bianhao");
        $good_state = I("post.sp_zhuangtai");
        if ($fenlei != -1) {
            $where['cat_id'] = $fenlei;

        }
        if ($mingchen != "" || $mingchen != null) {
            $where['goods_name'] = array('like', "%" . $mingchen . "%");
        }
        if ($bianhao != "" || $bianhao != null) {
            $where['goods_id'] = array('like', "%" . $bianhao . "%");
        }
        if ($good_state != -1) {
            $where['good_state'] = $good_state;
        }
        $total = M('goods')->where($where)->count();
        $page = I("post.page");//获取页码
        $rows = I("post.rows");//获取显示多少行（左下角那个）
        $startNo = ($page - 1) * $rows;//起始查询条数$startno开始的$pageSize条数据
        $limit = $startNo . ',' . $rows;//limit需要两个参数，起始位开始查询，查询多少条
        $goodsList = M('goods')->where($where)->limit($limit)->select();
        $result = array(
            "total" => $total,//返回的总条数（在右下角显示的那个）
            "rows" => $goodsList//返回查询到的条数
        );
        $this->ajaxReturn($result, 'json');
    }

////获取商品分类
    public function getFenlei()
    {
        $result = M('goods')->field('goods_catid,goods_catname')->group("goods_catname")->select();
        $this->ajaxReturn($result, 'json');
    }

//获取商品状态
    public function getState()
    {
        $result = M('goods')->field('good_state,good_statename')->group('good_statename')->select();
        $this->ajaxReturn($result, 'json');
    }

//获取树形菜单
    public function getTree()
    {
        $id = isset($_POST['id']) ? intval($_POST['id']) : 0; //树节点的id
        $admin_nav = M("admin_nav");
        $arr = $admin_nav->where('pid=' . $id)->select();
        $this->ajaxReturn($arr);

    }

    /*清除缓存*/
    public function eliminate()
    {
        cookie('user', null);
        cookie('password', null);
        $this->success('清除缓存成功', U('Admin/user/login'), 1);
    }

    /*退出*/
    public function logout()
    {
        $this->success('退出成功', U('Admin/user/login'), 1);
    }
}
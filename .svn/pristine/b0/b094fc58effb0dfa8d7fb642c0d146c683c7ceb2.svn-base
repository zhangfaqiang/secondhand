<?php

namespace Home\Controller;

use Think\Controller;

class ShoppingController extends Controller
{
    //视图显示
    public function shopping()
    {
        $uid = $_SESSION['userid'];
        $where['uid'] = $uid;
        $carinfo = M('car')->where($where)->select();//购物车的信息
        $this->assign("carinfo", $carinfo);
//var_dump($carinfo);

        $this->display();
    }

//删除购物车信息
    function del()
    {
        $goods_sn = I('post.goods_sn');
        $car = M("car"); // 实例化User对象
        $where['goods_sn'] = $goods_sn;
        $car->where($where)->delete(); // 删除id为5的用户数据
        if ($car) {
            $this->ajaxReturn("成功删除", 'json');
        } else {
            $this->ajaxReturn("成功失败", 'json');
        }

    }//添加商品到购物车

    public function addcar()
    {
        $goods_sn = I('post.goods_sn');
        $goods_name = I('post.goods_name');
        $address = I('post.address');
        $good_sl = I('post.good_sl');
        $shop_price = I('post.shop_price');
        $tupian = I('post.tupian');
        $kc = I('post.kc');
        $uid = $_SESSION['userid'];
        $username = $_SESSION['username'];
        $car = M('car');
        $data['uid'] = $uid;
        $data['username'] = $username;
        $data['goods_sn'] = $goods_sn;
        $data['goods_name'] = $goods_name;
        $data['address'] = $address;
        $data['goods_sl'] = $good_sl;
        $data['shop_price'] = $shop_price;
        $data['count'] = $good_sl * $shop_price;
        $data['tupian'] = $tupian;
        $data['kc'] = $kc;
        $where['goods_sn'] = $goods_sn;
        $goods_snformtable = $car->field('goods_sn,goods_sl,kc,count')->where($where)->select();
        if ($goods_snformtable == null) {
            $car->add($data);
        } else {
            if ($goods_sn == $goods_snformtable[0]['goods_sn']) {
                $dt['goods_sl'] = $goods_snformtable[0]['goods_sl'] + $good_sl;
                $dt['count'] = ($good_sl * $shop_price) + $goods_snformtable[0]['count'];
                $where['goods_sn'] = $goods_sn;
                $car->where($where)->save($dt);
            }

        }


        $this->ajaxReturn($dt['count'],'json');
    }
}

?>
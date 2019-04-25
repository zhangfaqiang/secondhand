<?php

namespace Home\Controller;

use Think\Controller;

class GoodsDetailsController extends Controller
{
    function goodsDetails()
    {
        $jieshou = I('goods_id');
        $goodsmodel = D('Admin/goods');
        $goodsinfo = $goodsmodel->find($jieshou);
        $this->assign('goodsinfo', $goodsinfo);
        $this->display();
    }

    //统计购物车里面的条数
    public function count()
    {
        $car = M('car');
        $uid=$_SESSION['userid'];
        $where['uid']=$uid;
        $re=$car->where($where)->group('uid')->count();
        $this->ajaxReturn($re,'json');
    }
}

?>
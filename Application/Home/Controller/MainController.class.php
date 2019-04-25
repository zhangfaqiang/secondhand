<?php

namespace Home\Controller;

use Think\Controller;

class MainController extends Controller
{
    function main()

    {
        $goodsModel = D('Admin/goods');
        //热销
        /*
         *
         *  最好 <input type="radio" value="1"  name="sp_tuijian"/>
                        最新<input type="radio" value="2" checked="checked" name="sp_tuijian"/>
                        最热 <input type="radio" value="3" name="sp_tuijian"/>
                        减价<input type="radio" value="4" name="sp_tuijian"/>
         * */
        $hotwhere['is_hot'] = 3;
        $hotwhere['good_state'] = 1;
        $newwhere['is_new'] = 2;
        $newwhere['good_state'] = 1;
        $salewhere['in_on_sale'] = 4;
        $salewhere['good_state'] = 1;
        $is_best['is_best'] = 1;
        $is_best['good_state'] = 1;
        $hot = $goodsModel->field('goods_id,goods_name,goods_desc,shop_price,thumb_img,goods_img,market_price')->where($hotwhere)->order('goods_id desc')->limit('0,4')->select();
        //var_dump($hot);
        $new = $goodsModel->field('goods_id,goods_name,goods_desc,shop_price,thumb_img,goods_img,market_price')->where($newwhere)->order('goods_id desc')->limit('0,4')->select();
        $sale = $goodsModel->field('goods_id,goods_name,goods_desc,shop_price,thumb_img,goods_img,market_price')->where($salewhere)->order('goods_id desc')->limit('0,4')->select();
        $best = $goodsModel->field('goods_id,goods_name,goods_desc,shop_price,thumb_img,goods_img,market_price')->where($is_best)->order('goods_id desc')->limit('0,4')->select();
        $this->assign('best', $best);
        $this->assign('sale', $sale);
        $this->assign('new', $new);
        $this->assign('hot', $hot);
        //最
        $this->display();
    }


    /**
     * 退出登陆
     */
    function exitLogin()
    {
        $_SESSION = array();
        session('[destroy]'); // 销毁session
        //重定向到登录页面
        redirect(U('Home/Main/main'));
    }
}

?>
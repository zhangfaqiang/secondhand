<?php

namespace Home\Controller;

use Think\Controller;

class OrderCentreController extends Controller
{
    public function orderCentre()
    {
        $username = session('username');
        $pay = M('pay');
        $payinfo = $pay->field('user_order,user_total,user_date,good_statename')->where("user_name='$username'")->select();
        $this->assign('payinfo', $payinfo);
        $this->display();
    }
}


<?php

namespace Home\Controller;

use Think\Controller;

class LeibiaoController extends Controller
{
    function leibiao()
    {
        $where['brand_id'] = I('get.brand_id');
        $result = M('goods')->where($where)->select();
        $title = I('get.brand_name');
        $this->assign('title', $title);
        $this->assign('result', $result);
        $this->display();
    }
}

?>
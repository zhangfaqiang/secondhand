<?php

namespace Home\Controller;

use Think\Controller;

class IdleController extends Controller
{
    function idle()
    {
        $userid = session('userid');
        $result = M('goods')->where(array('user_id' => $userid))->select();
        $this->assign('data', $result);
        $this->display();
    }

    /**
     * 删除发布
     */
    function deletePublish()
    {
        $userid = session('userid');
        if ($userid != null || $userid != "") {
            $id = I('post.id');
            $code = M('goods')->where(array('goods_id' => $id))->delete();
            if ($code != null || $code != "") {
                $code = 1;
                $this->ajaxReturn($code, 'json');
            } else {
                $code = 0;
                $this->ajaxReturn($code, 'json');
            }
        } else {
            $code = 2;
            $this->ajaxReturn($code, 'json');
        }
    }

    /**
     * 修改发布
     */
    function updatePublish()
    {
        $userid = session('userid');
        $goods_id = I('post.id');
        if ($userid == null || $userid == "") {
            $this->ajaxReturn(2, 'json');
            return;
        }
        $result = M('goods')->where(array('goods_id' => $goods_id))->find();
      $this->ajaxReturn($result,'json');
    }
}

?>
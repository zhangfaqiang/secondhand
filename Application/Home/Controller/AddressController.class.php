<?php

namespace Home\Controller;

use Think\Controller;

class AddressController extends Controller
{
    function address()
    {
        $userid = session('userid');
        $result = M('address')->where(array('user_id' => $userid))->select();
        $this->assign('result', $result);
        $this->display();
    }

    /*
     * 新增收货地址
     */
    function addAddress()
    {
        $userid = session('userid');
        $result = M('address')->where(array('user_id' => $userid))->select();
        $length = count($result);
        if ($length < 3) {
            //R方法跨控制器调用方法('模块/控制器/方法')
            $id = R('Register/uuid');
            $userid = session('userid');
            $completeAddress = I('post.completeAddress');
            $consignee = I('post.consignee');
            $telephone = I('post.telephone');
            $miaoshu=I('post.miaoshu');
            $data['id'] = $id;
            $data['miaoshu']=$miaoshu;
            $data['user_id'] = $userid;
            $data['consignee'] = $consignee;
            $data['phone'] = $telephone;
            $data['addressinfo'] = $completeAddress;
            $result = M('address')->add($data);
            if ($result = 1) {
                $code = 1;
                $this->ajaxReturn($code, 'json');
            } else {
                $code = 2;
                $this->ajaxReturn($code, 'json');
            }
        } else {
            $code = 3;
            $this->ajaxReturn($code, 'json');
        }
    }

    /**
     * 删除地址
     */
    function deleteAddress()
    {
        $addressId = I('post.addressId');
        $result = M('address')->where(array('id' => $addressId))->delete();
        $this->ajaxReturn($result, 'json');
    }
}

?>
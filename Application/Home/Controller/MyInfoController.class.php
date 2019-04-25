<?php

namespace Home\Controller;

use Think\Controller;

class MyInfoController extends Controller
{
    function myInfo()
    {

        $userid = session('userid');
        $data = M('login')->where(array('user_id' => $userid))->find();
        $this->assign('user', $data);
        $this->display();
    }

    /**
     * 修改密码
     */
    function ChangePassword()
    {
        $userid = I('post.useridPassword');
        $oldPassword = I('post.oldPassword');
        $newPassword = I('post.newPassword');
        $userInfo = M('login')->where(array('user_id' => $userid))->find();
        $user_random = $userInfo['user_random'];
        $oldPasswordEncipher = md5($oldPassword . $user_random);
        if ($oldPasswordEncipher != $userInfo['user_password']) {
            $this->error('原密码不正确！', U('Home/MyInfo/myInfo'), 2);
        }
        $newRandom = $this->make_password();
        $newPasswordEncipher = md5($newPassword . $newRandom);
        $data['user_password'] = $newPasswordEncipher;
        $data['user_random'] = $newRandom;
        M('login')->where(array('user_id' => $userid))->save($data);
        $this->success('密码修改成功！', U('Home/Login/login'), '2');

    }

    /**
     * 修改手机号
     */
    function changePhone()
    {
        $userid = I('post.userid');
        $oldPhone = I('post.oldPhone');
        $newPhone = I('post.newPhone');
        $user = M('login')->where(array('user_id' => $userid))->find();
        if ($oldPhone == $user['user_phone']) {
            $data['user_phone'] = $newPhone;
            M('login')->where(array('user_id' => $userid))->save($data);
            $this->success('手机号修改成功！', U('Home/MyInfo/myInfo'), 2);
        } else {
            $this->error('原手机号输入错误！', U('Home/MyInfo/myInfo'), 2);
        }
    }

    function make_password($length = 8)
    {
        // 密码字符集，可任意添加你需要的字符
        $chars = array('a', 'b', 'c', 'd', 'e', 'f', 'g', 'h',
            'i', 'j', 'k', 'l', 'm', 'n', 'o', 'p', 'q', 'r', 's',
            't', 'u', 'v', 'w', 'x', 'y', 'z', 'A', 'B', 'C', 'D',
            'E', 'F', 'G', 'H', 'I', 'J', 'K', 'L', 'M', 'N', 'O',
            'P', 'Q', 'R', 'S', 'T', 'U', 'V', 'W', 'X', 'Y', 'Z',
            '0', '1', '2', '3', '4', '5', '6', '7', '8', '9', '!',
            '@', '#', '$', '%', '^', '&', '*', '(', ')', '-', '_',
            '[', ']', '{', '}', '<', '>', '~', '`', '+', '=', ',',
            '.', ';', ':', '/', '?', '|');
        // 在 $chars 中随机取 $length 个数组元素键名
        $keys = array_rand($chars, $length);
        $password = '';
        for ($i = 0; $i < $length; $i++) {
            // 将 $length 个数组元素连接成字符串
            $password .= $chars[$keys[$i]];
        }
        return $password;
    }

    //查询手机号码
    function loadPhone()
    {
        $userid = I('post.userId');
        $data = M('login')->where(array('user_id' => $userid))->find();
        $this->assign('data', $data);
        $this->success(U('Home/MyInfo/myInfo'));
    }
}

?>
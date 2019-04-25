<?php

namespace Home\Controller;

use Think\Controller;

class RegisterController extends Controller
{
    function register()
    {

        $this->display();
    }

    /**
     * 注册
     */
    function registerLoginUser()
    {

        $username = I('post.username');
        $password = I('post.password');
        $photo = I('post.phone');
        $random = $this->make_password();
        $ultimatePassword = md5($password . $random);
        $result = M('login')->where(array('user_name' => $username))->find();
        if ($result == null) {
            $data['user_id'] = $this->uuid();
            $data['user_name'] = $username;
            $data['user_password'] = $ultimatePassword;
            $data['user_random'] = $random;
            $data['user_phone'] = $photo;
            M('login')->add($data);
            $this->success('注册成功,请返回登录页面登陆', U('Home/Login/login'), 2);
        } else {
            $this->error('注册失败,请核对注册信息！', U('Home/Register/register'), 2);
        }
    }

    /**
     * 生成随机数
     */
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

    /**
     * 生成UUID
     */
    function uuid($prefix = '')
    {
        $chars = md5(uniqid(mt_rand(), true));
        $uuid = substr($chars, 0, 8) . '-';
        $uuid .= substr($chars, 8, 4) . '-';
        $uuid .= substr($chars, 12, 4) . '-';
        $uuid .= substr($chars, 16, 4) . '-';
        $uuid .= substr($chars, 20, 12);
        return $prefix . $uuid;
    }

    /**
     * 鼠标离开检查用户名是否已存在
     */
    function judgeUserNmaeExist()
    {
        $username = I('post.username');
        $result = M('login')->where(array('user_name' => $username))->getField('user_name');
        if ($result != null) {
            $code = 0;
            $this->ajaxReturn($code, 'json');
        } else {
            $code = 1;
            $this->ajaxReturn($code);
        }
    }


}

?>
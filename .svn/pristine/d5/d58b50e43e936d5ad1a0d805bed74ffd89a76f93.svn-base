<?php

namespace Home\Controller;

use Think\Controller;

class LoginController extends Controller
{
    public function login()
    {
        $this->display();
    }

    /**
     * 登陆判断
     */
    function gotoLogin()
    {
        $uername = I('post.username');
        $password = I('post.password');
        $captcha = I('post.yzm');
        $where ['user_name'] = $uername;
        $user = M('login')->where($where)->find();
        $random = $user['user_random'];
        $ultimatePassword = md5($password . $random);
        if (!$this->check_verify($captcha)) {
            $this->error('验证码错误，请重试！', U('Login/login'),2);
        }
        if ($user == null || $user['user_password'] != $ultimatePassword) {
            $this->error('用户名或密码错误！', U('Login/login'),2);
        }
        session('username', $user['user_name']);
        session('userid', $user['user_id']);
        $this->success('登陆成功，正在跳转！', U('Home/Main/main'),2);
    }

    /**
     * 验证码判断
     */
    function check_verify($code, $id = '')
    {
        $verify = new \Think\Verify();
        return $verify->check($code, $id);
    }

    /**
     * 生成验证码
     */
    public function captcha()
    {
        $Verify = new \Think\Verify();
        $Verify->fontSize = 15;
        $Verify->length = 4;
        $Verify->useNoise = false;
        $Verify->entry();
    }
}


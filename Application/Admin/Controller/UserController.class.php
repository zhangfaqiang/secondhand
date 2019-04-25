<?php
namespace Admin\Controller;
use Think\Controller;
class UserController extends Controller {
    /*登陆板块*/
	public  function login(){
        if(IS_POST){
            $username=I('post.form-username');
            $password=I('post.form-password');

            $usermodel=M('User');
            $userinfo=$usermodel->where(array('user_name'=>$username))->find();
            //   var_dump($userinfo);
            if(!$userinfo){
                $this->error('用户名或密码错误','',2);
            }if($userinfo['user_password']!==$password){
                $this->error('用户名或密码错误','',2);
            }else{
                $v1=$userinfo['user_name'];
                $v2=$userinfo['user_password'];
                cookie('user',$v1);
                cookie('password',$v2);
                $this->success('登陆成功',U('Admin/index/index'),1);
            }
        }
	    $this->display();
    }
public function vip(){
	    $this->display();

}}
<?php

namespace Home\Controller;

use Think\Controller;

class ReleaseController extends Controller
{
    function release()
    {
        $this->display();
    }

    function upload()
    {
        $userid = I('post.userId');
        if (!empty($_FILES)) {
            $upload = new \Think\Upload();
            $upload->maxSize = 3145728;//设置文件上传大小
            $upload->exts = array('jpg', 'png', 'gif', 'jpeg');//设置允许上传文件类型
            $upload->rootPath = './uploads/';//设置文件保存根路径
//            $upload->savePath = $userid;//设置文件保存子文件夹
            $upload->saveName = array('uniqid', '');
            $upload->autoSub = true;
            $upload->subName = $userid;//子目录创建方式，采用数组或者字符串方式定义
            $info = $upload->upload();
            if (!$info) {
                $this->error($upload->getError());
            } else {
                $img = $info['file']['savename'];
                $imgUrl = $upload->subName . '/' . $img;
                $this->ajaxReturn($imgUrl, 'json');
            }
        }
    }

    /**
     * 发布闲置
     */
    function publish()
    {
        $userid = session('userid');
        $biaoti = I('post.biaoti');
        $description = I('description');
        $jiage = I('post.jiage');
        $photo0url = I('post.photo0url');
        $publishTime = I('post.publishTime');
        if ($userid != null || $userid != "") {
            $data['user_id'] = $userid;
            $data['goods_name'] = $biaoti;
            $data['goods_sn'] = $this->uuid();
            $data['is_new'] = 2;
            $data['goods_number'] = 1;
            $data['goods_desc'] = $description;
            $data['shop_price'] = $jiage;
            $data['goods_img'] = $photo0url;
            $data['thumb_img'] = $photo0url;
            $data['add_time'] = $publishTime;
            $reslut = M('goods')->add($data);
            if ($reslut != null || $reslut != "") {
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
     * 生成UUID
     */
    public function uuid($prefix = '')
    {
        $chars = md5(uniqid(mt_rand(), true));
        $uuid = substr($chars, 0, 8) . '-';
        $uuid .= substr($chars, 8, 4) . '-';
        $uuid .= substr($chars, 12, 4) . '-';
        $uuid .= substr($chars, 16, 4) . '-';
        $uuid .= substr($chars, 20, 12);
        return $prefix . $uuid;
    }

}

?>
<?php

namespace Admin\Controller;

use  Think\Controller;

class  GoodsController extends Controller
{
    public $gm;

    public function __construct()
    {
        parent::__construct();
        $this->gm = D('Goods');
    }

    public function goodsadd()
    {

        $this->display();
    }


    //后台对商品缩略图的添加
    public function fileUpload()
    {
        if (empty($_POST)) {
            $this->error("非法请求");

        }
        $obj = new \Think\Upload(); // 实例化上传类
        $obj->maxSize = 2097152; //图片最大上传大小
        $obj->savePath = ''; //设置文件上传（子）目录
        $obj->rootPath = './Uploads/face/'; // 设置文件上传根目录
        $obj->saveRule = 'uniqid'; //保存文件名
        $obj->uploadReplace = true; //覆盖同名文件
        $obj->allowExts = array('jpg', 'jpeg', 'gif', 'png'); //允许上传文件的后缀名
        $obj->thumb = true; //生成缩略图
        $thumbPrefix = 'face';
        $obj->thumbPrefix = $thumbPrefix; //缩略图后缀名
        $obj->autoSub = false; //不使用子目录保存
        $obj->thumbRemoveOrigin = true; //删除原图
        $fileName = date('YmdHis', time()) . '_' . rand(100, 999);//文件名
        $obj->saveName = $fileName;
        $info = $obj->upload();

        if (!$info) {
            $this->ajaxReturn(array('status' => 0, 'msg' => $obj->getErrorMsg()), "JSON");
        } else {
            $image = new \Think\Image();
            $result['status'] = 1;
            $image->open($obj->rootPath . $info['Filedata']['savename']);
            $image->thumb(160, 160)->save('uploads/face/1'. $info['Filedata']['savename'], 'jpeg', 100, true);
            $p = '/Uploads/face/1'  . $info['Filedata']['savename'];
            $result['path'] = $p;
            $image2=new \Think\Image();
            $image2->open($obj->rootPath.$info['Filedata']['savename']);
            $image2->thumb(560,560)->save('uploads/img/1'.$info['Filedata']['savename']);
            $result['path2']='/Uploads/img/1'.$info['Filedata']['savename'];
             @unlink($obj->rootPath . $info['Filedata']['savename']);
            $this->ajaxReturn($result, "JSON");

        }
    }

    /*后台对于商品的添加*/
    public function add()
    {
        if (empty($_POST)) {
            $this->error("非法请求");

        }
        // $this->ajaxReturn($_POST, 'JSON');
        $goods = M('goods');
        $data['cat_id'] = I('post.cat_id');//商品分类
        if (I('post.cat_id') == 1) {
            $data['cat_name'] = "手机配件";
        }
        if (I('post.cat_id') == 2) {
            $data['cat_name'] = "电玩随身听";
        }
        if (I('post.cat_id') == 3) {
            $data['cat_name'] = "相机/摄像机";
        }
        if (I('post.cat_id') == 4) {
            $data['cat_name'] = "电脑/电脑周边";
        }
        if (I('post.cat_id') == 5) {
            $data['cat_name'] = "手机品牌";
        }
        if (I('post.cat_id') == 6) {
            $data['cat_name'] = "女装";
        }
        if (I('post.cat_id') == 7) {
            $data['cat_name'] = "男装";
        }
        if (I('post.cat_id') == 8) {
            $data['cat_name'] = "配饰";
        }
        if (I('post.cat_id') == 9) {
            $data['cat_name'] = "生活用品";
        }
        if (I('post.cat_id') == 10) {
            $data['cat_name'] = "箱包";
        }
        $data['brand_id'] = I('post.brand_id');
        $data['brand_name'] = I('post.brand_name');


        $data['goods_sn'] = $this->uuid();

        $data['thumb_img'] = '/SecondHand'.I('post.filePath');//图片路径

        $data['goods_img'] ='/SecondHand'. I('post.filePath2');//图片路径
        $data['goods_desc'] = I('post.goods_desc');//商品描述
        $data['goods_name'] = I('post.goods_name');//商品名称
        $data['goods_number'] = I('post.goods_number');//商品数量

        $data['goods_weight'] = I('post.goods_weight');//重量
        $data['market_price'] = I('post.market_price');//市场价格
        $data['shop_price'] = I('post.shop_price');//本店价格
        $data['good_state']=1;
        $data['good_statename']="通过发布";
        $data['add_time']=date('Y-m-d H:i:s');
        if (I('post.sp_tuijian') == 1) {
            $data['is_best'] = I('post.sp_tuijian');
        }
        if (I('post.sp_tuijian') == 2) {
            $data['is_new'] = I('post.sp_tuijian');
        }
        if (I('post.sp_tuijian') == 3) {
            $data['is_hot'] = I('post.sp_tuijian');
        }
        if (I('post.sp_tuijian') == 4) {
            $data['in_on_sale'] = I('post.sp_tuijian');
        }
        $goods->add($data);
        $this->ajaxReturn($_POST['sp_tuijian'],'json');
    }

    public function getCatid()
    {
        $result = M('goods_cat')->select();
        $this->ajaxReturn($result, 'json');
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

//获取品牌
    public function getbrand()
    {
        $where['cat_id'] = I('post.cat_id');
        $result = M('goods_brand')->where($where)->select();
        $this->ajaxReturn($result, 'json');
    }
}
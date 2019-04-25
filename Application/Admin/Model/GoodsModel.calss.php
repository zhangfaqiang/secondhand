<?php
namespace Admin\Model;
use  Think\Model;
class GoodsModel extends Model{
public  $_validate=array(
    /*长度验证*/
    array('goods_name','3,12','商品ID错误','1','length','3'),
    array('goods_sn','','货号错误','1','unique','3'),

);
}
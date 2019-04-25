<?php

namespace Home\Controller;

use Think\Controller;
use Think\Model;

class PayController extends Controller
{

    public function chenggong()
    {
        if (IS_GIT) {
            $goods_id = I('get.goods_id');
            $username = I('get.username');        // out_trade_no 订单号   method接口名称  total_amount订单总额 sign商户请求参数的签名串
            //  trade_no 该交易在支付宝系统中的交易流水号 最长64  auth_app_id授权方的appid
            $out_trade_no = I('get.out_trade_no');
            $total_amount = I('get.total_amount');

            $time = I('get.time');
            $playmodel = M('pay');
            $data['user_id'] = "1";         //用户ID
            $data['user_name'] = $username;
            $data['user_address'] = "1";   //收货人地址
            $data['user_phone'] = "1231";  //收货人电话
            $data['user_address_name'] = "1234"; //收货人姓名
            $data['user_order'] = $out_trade_no;
            $data['user_date'] = $time;
            $data['user_total'] = $total_amount;
            $playmodel->add($data);
            // var_dump($goods_id);
            $this->success('购买成功！', U('Home/OrderCentre/orderCentre'), 2);
//            $this->display();
        }


    }


    public function zhifu()
    {
        if (IS_POST) {
//var_dump('goods_name');
            Vendor('alipay.AopSdk');
            /* Vendor(alipay.AopSdk);
             $aop=new \Home\alipay\AopClient;*/
            $aop = new \AopClient();
            $aop->gatewayUrl = 'https://openapi.alipaydev.com/gateway.do';
            $aop->appId = '2016092200567221';
            $aop->rsaPrivateKey = 'MIIEpQIBAAKCAQEAycC8YozTOvd+XRSL3EJROF772eR1tt2dnfGhYpsevqxlhiDEvvZ4PmiDDsarq07IQv+6KtYuP6do1vfPOvasNS4Cjr+q59bM7w4FQ5Jht3pCb7FLq2pA68OdP7jL+PjnAshof8Vh8fPPTL/8ZXko++e8fd0yq0E219QovYvxc5A3pZmcGTlSGeKLxOewMjcnq/u7hv3Jjx6CxyLbjVE6uW/vgnP8vdW0YVUcWGxTwKaybMBgUYu8ub/ISm03ZaPLp5Gzqc97JxtVfhMKP3zS0dd4FJUYVgQQi/T559TnEXFhGztkjtIbKgO11ohNtOGXxKlY8zTnPxX19UKBGYNnEwIDAQABAoIBAHX3bC9ziE8CR7DFQsIXRMZhQ4G0Q+AY1QB1OJgfe2qiAvraTjAajVRwZ7FMGTShbBdAz+ocMg6mJHcNju47LZYqwPQWviexQULGP+2yudA+fHoygLxJ9IvmZRvNQfbiErFd3TxYfVyr4ppN55atsXkZlu1BWU8pYpfwRaIPIa8fqVFTK6tBA9heyQRg8lBwVpyEWC/iTrnTdxka9LtJIlL2iAsclOD+J0zclk1eg78kfPNk4GL1Eafva8NkQhSL53pTikHbSEVzyvFt/FrQTCapzmkxAZbyPPHAsJCrM7s+X5exXh+TrJoPBpF4VBuZVCz094YHGAwFgmbEFPgKN4ECgYEA+yJB2k2J2VlkdvWn/PI4CEQaM0nxqgo5CBFHyy7UOLaDGXAJfWeIx7b8oJodX2jh2TuX8TtpOMGoV9/WuWLykGmA4rGC81iICsfRRwBaxrVIF4c7KhrYOw5edFn6bMFC3qGwXnkeZfenJsNWMKYfEx+qEcr4Tn22jWPX6gH3Ud8CgYEAzamGmDnpF1AiXGd/5V8wx3T0hu1zme7qfzj+x4kmw5021kZVVViGYCOjmv7WYDW5Hd6FMEpCqIuXd8XfCJZR6aTtMQcDPl55h2PkdoxUWH2uxMtZ28sEyxh8iDefO0/0Lr1pUJSRUKEFcJuzaZBvCgAc2zt8bClkcVubkvL/GU0CgYEApdLG/Oi6HyRhrBMla2ZdDUg6rKckxYyef+85Ira3NwN8qW1LNt0IeicfxMQ+pONSTeiFuanrHqjxCaUp2Zu2YxjnG8jumNRacBPk4icfyZmmErMeo/y5zrT8NYO8UdeC2hKVrKv5IIdYfcX5wYHPfwcnezw0nU9xHQdSaJgHwK0CgYEAl2nqOATawVk0Ewf4N2z/wrkulnAXngsyBfx2R32IVphWmScrCCymsf1LJH/eYPLsmTsMn+LsdJ5hI8NAU1gocnYEUwYwsyhnHPDEcSsbphLSKvzz6Ufs/YHHnZol10skIY0+Dh9zZQNHuAJJ8rxto9U1aYrALfnDg1nIjkXs3jkCgYEArNMTUlcqmwkCS10JG3IjLbTdf5vz70ITGRH+XCAX0syI5mlAyqDJgolEKSxzU97zaRfHg3RUJ4K1pZn05Z1mpiUrQ0PTI7/y+klM7HcAlunS/Snx7YU4ey0jM7PPPkbrPqnE2+2WoeyA0PQ0CeIKQlxDMbCEp/0huhy/HeAAPXw=';
            $aop->apiVersion = '1.0';
            $aop->signType = 'RSA2';
            $aop->postCharset = 'utf-8';
            $aop->format = 'json';
            $request = new \AlipayTradePagePayRequest();
            $shop_price = I('post.goods_price');
            $goods_name = I('post.goods_name');

            $goods_id = I('post.goods_id');
            $time = date("Y-m-d h:i:s");
            $value = session('userid');
            $findnum = $this->findNum($time);
            $order = $findnum . $goods_id;
            $username = session('username');
//    ?user_name=$username&order=$order
            $request->setReturnUrl('http://127.0.0.1/SecondHand/Home/pay/chenggong?goods_id=' . $goods_id . '&username=' . $username . '&time=' . $time . '');//同步
            $request->setNotifyUrl('http://127.0.0.1/SecondHand/Home/pay/chenggong?goods_id=' . $goods_id . '&username=' . $username . '&time=' . $time . '');//异步
//            var_dump($username);
            // out_trade_no 订单号   method接口名称  total_amount订单总额 sign商户请求参数的签名串
            //  trade_no 该交易在支付宝系统中的交易流水号 最长64  auth_app_id授权方的appid
            $request->setBizContent('{"product_code":"FAST_INSTANT_TRADE_PAY",
                                        "out_trade_no":"' . $order . '",
                                        "subject":"' . $goods_name . '",
                                        "total_amount":' . $shop_price . ',
                                        "body":"' . $goods_name . '"
                                        }');
            $result = $aop->pageExecute($request);
            echo $result;
//            var_dump($result);
            $this->display();

        } else {


        }
    }

    public function xiangqing()
    {


        //var_dump($_POST);
        $username = session('username');
        $login = D('Home/login');
        $userinfo = $login->where(array('user_name' => $username))->find();
        if (!$userinfo) {
            $this->error(' 请先登陆账号！', '', 2);
        } else {
            if (IS_POST) {
                $goodsModel = D('Admin/goods');
                $goods_num = I('post.input-num');
                $goods_id = I('post.goods_id');
                $goodsinfo = $goodsModel->where(array('goods_id' => $goods_id))->find();

                if ($goods_num > 0 && $goods_num <= $goodsinfo['goods_number'] && $goodsinfo['goods_number'] % $goods_num == 0) {
                    if (!$goodsinfo) {
                        $this->error('你个沙雕是不是修改了提交框', '', 2);
                    } else {
                        $goods_num = I('post.input-num');
                        $user_id = $userinfo['user_id'];
                        $collectgoods = M('address');
                        $collectinfo = $collectgoods->where(array('user_id' => $user_id))->select();
                        $this->assign('goods_num', $goods_num);
                        $this->assign('collectinfo', $collectinfo);
                        $this->assign('goodsinfo', $goodsinfo);
                        $this->display();
                    }
                } else {
                    $this->error('商品信息错误', '', '2');
                }
            }
        }
    }


    public function xiangqing2()
    {
        $shuju = array();
        $shuju2 = array();
        $shuju3 = 0;
        $xiahua = '_';
        $goodsModel = D('Admin/goods');
        for ($i = 0; $i < count($_POST['goods_sn']); $i++) {


            if (in_array($_POST['goods_sn'][$i], $_POST['check'])) {

                $shuju1 = $_POST['goods_sn'][$i];
                $shuju[$i] = $_POST['goods_sn'][$i] . $xiahua . $_POST['goods_sl'][$i];
                $where['goods_sn'] = $shuju1;
                $goodsinfo[$i] = $goodsModel->field('goods_name,goods_img,shop_price,goods_id')->where($where)->select();
                for ($k = 0; $k < count($goodsinfo[$i]); $k++) {
                    $goodsinfo[$i][$k]['goods_sl'] = $_POST['goods_sl'][$i];
                }


            }
        }

        for ($c = 0, $d = 0; $c < count($goodsinfo); $c++) {
            $shuju3 = $shuju3 + ($goodsinfo[$c][$d]['shop_price']) * ($goodsinfo[$c][$d]['goods_sl']);
        }
        $username = session('username');
        $lodinModel = D('Home/login');
        $usernameinfo = $lodinModel->field('user_id')->where("user_name='$username'")->select();
        //  var_dump($usernameinfo );
        $aaa = $usernameinfo[0]['user_id'];
        $addressModel = M('address');
        $addressModelinfo = $addressModel->field('id,consignee,phone,addressinfo,miaoshu')->where("user_id='$aaa'")->select();
        // var_dump($addressModelinfo);
        $this->assign('addressinfo', $addressModelinfo);
        $this->assign('shuju3', $shuju3);
        $this->assign('goodsinfo', $goodsinfo);
        $this->display();
    }


    public function findNum($str = '')
    {
        $str = trim($str);
        if (empty($str)) {
            return '';
        }
        $result = '';
        for ($i = 0; $i < strlen($str); $i++) {
            if (is_numeric($str[$i])) {
                $result .= $str[$i];
            }
        }
        return $result;
    }


    public function length()
    {
//        var_dump('11111');
        $this->display();

    }

    public function tishi()
    {
        $this->error('你个沙雕是不是想修改爸爸网页', '', '2');

    }

    public function zhifu2()
    {
        if (IS_POST) {
            $name = '';
            $id = '';
            $sl = '';
            $a = I('post.goods_price');
//    $user='向洋';
            $phone = I('post.phone');
//    $addressinfo=I('post.addressinfo');
            $goods_name = $_POST['goods_name'];
            $shid = I('post.id');
            $goods_id = $_POST['goods_id'];
            $goods_sl = $_POST['goods_sl'];
//            var_dump($shid);
//       var_dump($phone);
//       var_dump($addressinfo);
            for ($i = 0; $i < count($goods_name); $i++) {
                $name .= $goods_name[$i];
                $id .= '_' . $goods_id[$i];
                $sl .= '_' . $goods_sl[$i];
            }
            Vendor('alipay.AopSdk');

            $aop = new \AopClient();
            $aop->gatewayUrl = 'https://openapi.alipaydev.com/gateway.do';
            $aop->appId = '2016092200567221';
            $aop->rsaPrivateKey = 'MIIEpQIBAAKCAQEAycC8YozTOvd+XRSL3EJROF772eR1tt2dnfGhYpsevqxlhiDEvvZ4PmiDDsarq07IQv+6KtYuP6do1vfPOvasNS4Cjr+q59bM7w4FQ5Jht3pCb7FLq2pA68OdP7jL+PjnAshof8Vh8fPPTL/8ZXko++e8fd0yq0E219QovYvxc5A3pZmcGTlSGeKLxOewMjcnq/u7hv3Jjx6CxyLbjVE6uW/vgnP8vdW0YVUcWGxTwKaybMBgUYu8ub/ISm03ZaPLp5Gzqc97JxtVfhMKP3zS0dd4FJUYVgQQi/T559TnEXFhGztkjtIbKgO11ohNtOGXxKlY8zTnPxX19UKBGYNnEwIDAQABAoIBAHX3bC9ziE8CR7DFQsIXRMZhQ4G0Q+AY1QB1OJgfe2qiAvraTjAajVRwZ7FMGTShbBdAz+ocMg6mJHcNju47LZYqwPQWviexQULGP+2yudA+fHoygLxJ9IvmZRvNQfbiErFd3TxYfVyr4ppN55atsXkZlu1BWU8pYpfwRaIPIa8fqVFTK6tBA9heyQRg8lBwVpyEWC/iTrnTdxka9LtJIlL2iAsclOD+J0zclk1eg78kfPNk4GL1Eafva8NkQhSL53pTikHbSEVzyvFt/FrQTCapzmkxAZbyPPHAsJCrM7s+X5exXh+TrJoPBpF4VBuZVCz094YHGAwFgmbEFPgKN4ECgYEA+yJB2k2J2VlkdvWn/PI4CEQaM0nxqgo5CBFHyy7UOLaDGXAJfWeIx7b8oJodX2jh2TuX8TtpOMGoV9/WuWLykGmA4rGC81iICsfRRwBaxrVIF4c7KhrYOw5edFn6bMFC3qGwXnkeZfenJsNWMKYfEx+qEcr4Tn22jWPX6gH3Ud8CgYEAzamGmDnpF1AiXGd/5V8wx3T0hu1zme7qfzj+x4kmw5021kZVVViGYCOjmv7WYDW5Hd6FMEpCqIuXd8XfCJZR6aTtMQcDPl55h2PkdoxUWH2uxMtZ28sEyxh8iDefO0/0Lr1pUJSRUKEFcJuzaZBvCgAc2zt8bClkcVubkvL/GU0CgYEApdLG/Oi6HyRhrBMla2ZdDUg6rKckxYyef+85Ira3NwN8qW1LNt0IeicfxMQ+pONSTeiFuanrHqjxCaUp2Zu2YxjnG8jumNRacBPk4icfyZmmErMeo/y5zrT8NYO8UdeC2hKVrKv5IIdYfcX5wYHPfwcnezw0nU9xHQdSaJgHwK0CgYEAl2nqOATawVk0Ewf4N2z/wrkulnAXngsyBfx2R32IVphWmScrCCymsf1LJH/eYPLsmTsMn+LsdJ5hI8NAU1gocnYEUwYwsyhnHPDEcSsbphLSKvzz6Ufs/YHHnZol10skIY0+Dh9zZQNHuAJJ8rxto9U1aYrALfnDg1nIjkXs3jkCgYEArNMTUlcqmwkCS10JG3IjLbTdf5vz70ITGRH+XCAX0syI5mlAyqDJgolEKSxzU97zaRfHg3RUJ4K1pZn05Z1mpiUrQ0PTI7/y+klM7HcAlunS/Snx7YU4ey0jM7PPPkbrPqnE2+2WoeyA0PQ0CeIKQlxDMbCEp/0huhy/HeAAPXw=';
            $aop->apiVersion = '1.0';
            $aop->signType = 'RSA2';
            $aop->postCharset = 'utf-8';
            $aop->format = 'json';
            $request = new \AlipayTradePagePayRequest();
//        $shop_price = I('post.goods_price');
//        $goods_name = I('post.goods_name');

//        $goods_id = I('post.goods_id');
            $time = date("Y-m-d h:i:s");
            $value = session('userid');
            $findnum = $this->findNum($time);
            $order = $findnum . $id;
            $username = session('username');
            $request->setReturnUrl('http://127.0.0.1/SecondHand/Home/pay/chenggong1?goods_sl=' . $sl . '&goods_id=' . $id . '&username=' . $username . '&time=' . $time . '&shid=' . $shid . '');//同步
            $request->setNotifyUrl('http://127.0.0.1/SecondHand/Home/pay/chenggong1?goods_sl=' . $sl . '&goods_id=' . $id . '&username=' . $username . '&time=' . $time . '&shid=' . $shid . '');//异步
            // var_dump($username);
            // out_trade_no 订单号   method接口名称  total_amount订单总额 sign商户请求参数的签名串
            //  trade_no 该交易在支付宝系统中的交易流水号 最长64  auth_app_id授权方的appid
            /*14*/

            $request->setBizContent('{"product_code":"FAST_INSTANT_TRADE_PAY",
                                        "out_trade_no":"' . $order . '",
                                        "subject":"' . $name . '",
                                        "total_amount":' . $a . ',
                                        "body":"' . $name . '"
                                        }');
            $result = $aop->pageExecute($request);
            echo $result;
//            var_dump($result);
            $this->display();


        }
    }

    public function chenggong1()
    {
        $username = I('get.username');
        $time = I('get.time');
        $out_trade_no = I('get.out_trade_no');
        $total_amount = I('get.total_amount');
        $goods_sl = I('get.goods_sl');
        $shid = I('get.shid');
        $address = M('address');
        $addressinfo = $address->field('consignee,phone,addressinfo')->where("id='$shid'")->select();
//        var_dump($addressinfo[0]['consignee']);
        $playmodel = M('pay');
        $data['user_name'] = $username;
        $data['user_address'] = $addressinfo[0]['addressinfo'];//收货人地址
        $data['user_phone'] = $addressinfo[0]['phone'];//收货人电话
        $data['user_address_name'] = $addressinfo[0]['consignee'];//收货人名字
        $data['user_date'] = $time;
        $data['user_order'] = $out_trade_no;
        $data['user_total'] = $total_amount;
        $data['goods_sl_id'] = $goods_sl;
        $playmodel->add($data);
        $this->success('购买成功！', U('Home/OrderCentre/orderCentre'), 2);
        $car = M('car');
    }


}

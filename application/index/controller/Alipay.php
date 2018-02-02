<?php

namespace app\index\controller;

use Alipay\Alipay as AlipaySdk;

/**
 * 
 * 文件用途描述: 
 * @authors xiaohui
 * @date    2018-02-02 17:11:30
 */
class Alipay extends Base
{
    
    /**
     * [index]
     * 函数用途描述: 调用支付宝支付
     * @date:  2018-02-02
     * @author: xiaohui
     * @param: [variable]
     * @return [type]     [description]
     */
    public function index()
    {
        if ($this->request->isPost()) {
            $aliPayConfig = array(
                'app_id' => '2017121500818698',
                'public_key' => 'MIGfMA0GCSqGSIb3DQEBAQUAA4GNADCBiQKBgQC+9RRXD4wMxv8P32JEooltZDsfCEX/N7XLc7O36A7aIlgxYUmPHeCuoQST65dSjmr88FpuNNjxtVdWduLare5ReQmmCuyBiRLs7+kByPAtsFv0aGalUicxGw9gnB45izz3y+xjCMqd07HTBe/x694kS7NbX/CuOtuN+xvF2r/luwIDAQAB',
                'private_key' => 'MIICXAIBAAKBgQC+9RRXD4wMxv8P32JEooltZDsfCEX/N7XLc7O36A7aIlgxYUmPHeCuoQST65dSjmr88FpuNNjxtVdWduLare5ReQmmCuyBiRLs7+kByPAtsFv0aGalUicxGw9gnB45izz3y+xjCMqd07HTBe/x694kS7NbX/CuOtuN+xvF2r/luwIDAQABAoGAdBYHXHnOGQJskpipY7Ivu3nAWzgrXWDfuqRG8Bk51jAkzzgmgMOYEHFAmDATmRONROFVCERGUoJ8asrxVCGCi6P9bFugsw5gQfbSC/TTMYkwXLwLNjfQ3FBuSiBYY6xCsPyyYTh7xaE+/3vP2Ptjk5suwO/kPzVkWvP4/bMvG3kCQQD6/MUan8SNIT+kTJ0TDEJ4tLjhId2WFnCfYy+aurtOgnWH0Et3FTmLOXE2a6XzIUubcRUNpQDK11gy9rTLueB/AkEAwsVkbJhWNQbLpiwj/+ynvYYNMPLDTqhAodlsdPYn7n0jDMVG8GvMnU8edZUw2rUhIAxTOEVfloiwjxe/o7fcxQJBANonwxr1K96Pu8WPYiggS9anHttwmC3Qq2uexs3y6MPA2W+HOVD0fePpteHbh47grdsaW3ZUqW+l5d/GWDeMBPkCQBWY07ji73Qzy7MiY9+F+1ednKrX0GZRa9FGjasufGEKiS9qVKJmIasz0bnSEDfAK+sk0rmDn8TOZV2IkZxyz80CQCwpZPjw64sNwsxO4dT0JPeA7vMMQ0KibsZFIvqwYPGNdr/a7IcQ8oKUso++a2oJlF4WjSBY9ii8nBiyGMfO1Wc=',
                'sign_type' => 'RSA',
            );
            $alipay = new AlipaySdk($aliPayConfig);
            $params = array(
                'title' => '服务端生成订单加签字符串',
                'money' => 0.01,
                'online_num' => time(),
                'body' => 'test'
            );
            $redata = $alipay->makeOrderString($params);
            if ($redata['status'] == 1) {
                return 
            }
        }
    }
}
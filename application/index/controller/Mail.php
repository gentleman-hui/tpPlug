<?php

namespace app\index\controller;

/**
 * 
 * 文件用途描述: 邮件控制
 * @authors xiaohui
 * @date    2018-01-29 14:37:28
 */
class Mail extends Base {
    
    public function index()
    {
        $methods = get_class_methods("app\index\controller\Mail");     //返回类中所有方法 
        $this->assign('list', $methods);
        var_dump($methods);
    }

    /**
     * [sendMail]
     * 函数用途描述: 发送邮件
     * @date:  2018-01-26
     * @author: xiaohui
     * @param: [variable]
     * @return [type]     [description]
     */
    public function sendMail()
    {   
        $acceptor = '635981000@qq.com';
        $title = '测试发送标题';
        $content = '<h1>测试内容</h1><div style="color: red;font-size: 18px;">测试html代码</div>';
        $send_status = sendMail($acceptor, $title, $content);
        return $send_status['msg'];
        // if ($send_status['status'] == 1) {
        //  return "发送成功";
        // } else {
        //  return $send_status['msg'];
        // }
    }
}
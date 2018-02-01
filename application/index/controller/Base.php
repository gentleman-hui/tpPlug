<?php

namespace app\index\controller;

use think\Controller;
use \think\Request;
/**
 * 
 * 文件用途描述: 基类
 * @authors xiaohui
 * @date    2018-01-29 14:37:44
 */
class Base extends Controller 
{
    
	protected $request;

    public function _initialize(){
        $this->request = Request::instance();
        $assign = array(
        	'action' => $this->request->module().'/'.$this->request->controller().'/'.$this->request->action(),
        );
        $this->assign($assign);
    }
}
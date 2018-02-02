<?php

namespace app\index\controller;

use think\Db;
use Alipay\Alipay;

class Index extends Base
{
    public function index()
    {
        $plug_model = Db::name('plug');
        $list = $plug_model->paginate(10);
        $this->assign('list', json_encode($list));
        return view();
    }

    /**
     * [addConfig]
     * 函数用途描述: 添加配置
     * @date:  2018-01-29
     * @author: xiaohui
     * @param: [variable]
     */
    public function addConfig()
    {}

    /**
     * [editConfig]
     * 函数用途描述: 编辑配置
     * @date:  2018-01-29
     * @author: xiaohui
     * @param: [variable]
     * @return [type]     [description]
     */
    public function editConfig()
    {}

    /**
     * [delConfig]
     * 函数用途描述: 删除配置
     * @date:  2018-01-29
     * @author: xiaohui
     * @param: [variable]
     * @return [type]     [description]
     */
    public function delConfig()
    {}

    
}

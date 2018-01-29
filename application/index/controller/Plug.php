<?php

namespace app\index\controller;

use think\Db;

/**
 * 
 * 文件用途描述: 插件管理
 * @authors xiaohui
 * @date    2018-01-29 16:33:13
 */
class Plug extends Base 
{
    
    /**
     * [listPlug]
     * 函数用途描述: 插件列表
     * @date:  2018-01-29
     * @author: xiaohui
     * @param: [variable]
     * @return [type]     [description]
     */
    public function listPlug()
    {   
        $plug_model = Db::name('plug');
        $list = $plug_model->paginate(1);
        // $list = json_encode($list);
        $assign = array(
            'list' => $list,
            'page' => $list->render()
        );
        $this->assign($assign);
        return view();
    }

    /**
     * [addPlug]
     * 函数用途描述: 添加插件
     * @date:  2018-01-29
     * @author: xiaohui
     * @param: [variable]
     */
    public function addPlug()
    {
        return view('savePlug');
    }

    /**
     * [editPlug]
     * 函数用途描述: 编辑插件
     * @date:  2018-01-29
     * @author: xiaohui
     * @param: [variable]
     * @return [type]     [description]
     */
    public function editPlug()
    {
        return view('savePlug');
    }

    /**
     * [delPlug]
     * 函数用途描述: 删除插件
     * @date:  2018-01-29
     * @author: xiaohui
     * @param: [variable]
     * @return [type]     [description]
     */
    public function delPlug()
    {}
}
<?php
// +----------------------------------------------------------------------
// | OneThink [ WE CAN DO IT JUST THINK IT ]
// +----------------------------------------------------------------------
// | Copyright (c) 2013 http://www.onethink.cn All rights reserved.
// +----------------------------------------------------------------------
// | Author: 麦当苗儿 <zuojiazi@vip.qq.com> <http://www.zjzit.cn>
// +----------------------------------------------------------------------
namespace Addons\Links\Controller;
use Admin\Controller\AddonsController;
class LinksController extends AddonsController {
    /* 添加友情连接 */
    public function add() {
        $current = U('/admin/addons/adminlist/name/Links');
        $this -> assign('current', $current);
        //获取配置文件信息
        $config_info =
        include_once ONETHINK_ADDON_PATH . 'Links/config.inc.php';
        $this -> assign('group_type', $config_info['type']);
        $this -> display(T('Addons://Links@Links/edit'));
    }

    /* 编辑友情连接 */
    public function edit() {
        //获取配置文件信息
        $config_info =
        include_once ONETHINK_ADDON_PATH . 'Links/config.inc.php';
        $id = I('get.id', '');
        $current = U('/admin/addons/adminlist/name/Links');
        $detail = D('Addons://Links/Links') -> detail($id);
        $this -> assign('info', $detail);
        $this -> assign('current', $current);
        $this -> assign('group_type', $config_info['type']);
        $this -> display(T('Addons://Links@Links/edit'));
    }

    /* 禁用友情连接 */
    public function forbidden() {
        $id = I('get.id', '');
        if ( D('Addons://Links/Links') -> forbidden($id)) {
            $this -> success('成功禁用该友情连接', Cookie('__forward__'));
        } else {
            $this -> error( D('Addons://Links/Links') -> getError());
        }
    }

    /* 启用友情连接 */
    public function off() {
        $id = I('get.id', '');
        if ( D('Addons://Links/Links') -> off($id)) {
            $this -> success('成功启用该友情连接', Cookie('__forward__'));
        } else {
            $this -> error( D('Addons://Links/Links') -> getError());
        }
    }

    /* 删除友情连接 */
    public function del() {
        $id = I('get.id', '');
        if ( D('Addons://Links/Links') -> del($id)) {
            $this -> success('删除成功', Cookie('__forward__'));
        } else {
            $this -> error( D('Addons://Links/Links') -> getError());
        }
    }

    /* 更新友情连接 */
    public function update() {
        $res = D('Addons://Links/Links') -> update();
        if (!$res) {
            $this -> error( D('Addons://Links/Links') -> getError());
        } else {
            if ($res['id']) {
                $this -> success('更新成功', Cookie('__forward__'));
            } else {
                $this -> success('新增成功', Cookie('__forward__'));
            }
        }
    }

    /**
     * 批量处理
     */
    public function savestatus() {
        $status = I('get.status');
        $ids = I('post.id');
        if ($status == 0) {
            foreach ($ids as $id) {
                D('Addons://Links/Links') -> off($id);
            }
            $this -> success('成功启用该友情连接', Cookie('__forward__'));
        } else {
            foreach ($ids as $id) {
                D('Addons://Links/Links') -> forbidden($id);
            }
            $this -> success('成功禁用该友情连接', Cookie('__forward__'));
        }
    }

}

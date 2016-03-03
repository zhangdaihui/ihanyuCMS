<?php

namespace Addons\BaiduMap;
use Common\Controller\Addon;

/**
 * 百度地图插件
 * @author ihanyu
 */

    class BaiduMapAddon extends Addon{

        public $info = array(
            'name'=>'BaiduMap',
            'title'=>'百度地图坐标定位',
            'description'=>'百度地图坐标定位',
            'status'=>1,
            'author'=>'ihanyu',
            'version'=>'1.0'
        );

        public function install(){
            return true;
        }

        public function uninstall(){
            return true;
        }

        //实现的UploadFiles钩子方法
        public function BaiduMap($param){
//            if (empty($param['value'])) {
//                $param['value'] = json_encode(array());
//            }
			$this->assign('addons_config', $this->getConfig());
            $this->assign('param', $param);
            $this->display('index');
        }

    }
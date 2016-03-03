<?php

namespace Addons\Jscolor;
use Common\Controller\Addon;

/**
 * Js颜色选择器插件
 * @author ihanyu
 */

    class JscolorAddon extends Addon{

        public $info = array(
            'name'=>'Jscolor',
            'title'=>'Js颜色选择器',
            'description'=>'用于自定义字段颜色选择器',
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

        //实现的Jscolor钩子方法
        public function Jscolor($param){
			$this->assign('param', $param);
			$this->display('index');
        }

    }
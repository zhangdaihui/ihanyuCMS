<?php

namespace Addons\Share;
use Common\Controller\Addon;

/**
 * 分享到插件
 * @author ihanyu
 */

    class ShareAddon extends Addon{

        public $info = array(
            'name'=>'Share',
            'title'=>'分享到',
            'description'=>'分享到',
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

        //实现的share钩子方法
        public function share($param){
			$this->assign('addons_config', $this->getConfig());
            $this->display('widget');
        }

    }
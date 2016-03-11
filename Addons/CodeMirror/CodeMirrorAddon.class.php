<?php

namespace Addons\CodeMirror;
use Common\Controller\Addon;

/**
 * CodeMirror编辑器插件
 * @author ihanyu
 */

    class CodeMirrorAddon extends Addon{

        public $info = array(
            'name'=>'CodeMirror',
            'title'=>'CodeMirror',
            'description'=>'CodeMirror编辑器',
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

        public function CodeMirror($param){
            $this->assign('param', $param);
            $this->display('index');
        }

    }
<?php

namespace Addons\BaiduWeather;
use Common\Controller\Addon;

/**
 * 百度天气插件
 * @author ihanyu
 */

    class BaiduWeatherAddon extends Addon{

        public $info = array(
            'name'=>'BaiduWeather',
            'title'=>'百度天气',
            'description'=>'百度天气',
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

        //实现的BaiduWeather钩子方法
        public function BaiduWeather($param){
			$this->assign('addons_config', $this->getConfig());
            $this->assign('param', $param);
            $this->display('index');
        }

    }
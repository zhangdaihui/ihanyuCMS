<?php
// +----------------------------------------------------------------------
// | ihanyuCMS [ WE CAN DO IT JUST THINK IT ]
// +----------------------------------------------------------------------
// | Copyright (c) 2016.
// +----------------------------------------------------------------------
// | Author: ihanyu <zhangdaihui@vip.qq.com>
// +----------------------------------------------------------------------

namespace Addons\Simditor;
use Common\Controller\Addon;

/**
 * simditor编辑器插件
 * @author ihanyu <zhangdaihui@vip.qq.com>
 */

	class SimditorAddon extends Addon{

		public $info = array(
				'name'=>'Simditor',
				'title'=>'互动话题编辑器',
				'description'=>'用于增强互动话题评论',
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

		/**
		 * 编辑器挂载的文章内容钩子
		 * @param array('name'=>'表单name','value'=>'表单对应的值')
		 */
		public function simditor($data){
			$this->assign('addons_data', $data);
			$this->assign('addons_config', $this->getConfig());
			$this->display('index');
		}

	}

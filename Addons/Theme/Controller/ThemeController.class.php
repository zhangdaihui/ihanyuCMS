<?php
// +----------------------------------------------------------------------
// +----------------------------------------------------------------------

namespace Addons\Theme\Controller;
use Admin\Controller\AddonsController;
use Think\Storage;

class ThemeController extends AddonsController{
    public function path(){
        if(!defined('DEFAULT_MODULE'))
            define('DEFAULT_MODULE', 'Home');
        if(!defined('FRONT_THEME_PATH')){
            if(C('VIEW_PATH')){ // 视图目录
                define('FRONT_THEME_PATH',   C('VIEW_PATH').DEFAULT_MODULE.'/');
            }else{ // 模块视图
                define('FRONT_THEME_PATH',   APP_PATH.DEFAULT_MODULE.'/'.C('DEFAULT_V_LAYER').'/');
            }
        }
    }
    
    /**
     * 编辑主题
     */
    public function edit($name='',$file = ''){
	    $name=I('name');
		$file=I('file');
        $this->assign('theme', $name);
        if(!defined('DEFAULT_MODULE'))
            define('DEFAULT_MODULE', 'Home');
        if(!defined('FRONT_THEME_PATH')){
            if(C('VIEW_PATH')){ // 视图目录
                define('FRONT_THEME_PATH',   C('VIEW_PATH').DEFAULT_MODULE.'/');
            }else{ // 模块视图
                define('FRONT_THEME_PATH',   APP_PATH.DEFAULT_MODULE.'/'.C('DEFAULT_V_LAYER').'/');
            }
        }
        $files = glob(FRONT_THEME_PATH.$name.'/*/*.html');
        foreach ($files as $key => $value) {
            $files[$key] = str_replace(FRONT_THEME_PATH.$name.'/', '', $value);
        }
        $this->assign('list', $files);
        if($file){
            $content = file_get_contents(FRONT_THEME_PATH.$name.'/'.base64_decode($file));
            $this->assign('content', $content);
            $this->assign('file', $file);
        }else{
            $file = array_pop($files);
            $content = file_get_contents(FRONT_THEME_PATH.$name.'/'.$file);
            $this->assign('content', $content);
            $this->assign('file', base64_encode($file));
        }
      $this->display(T('Addons://Theme@Theme/edit'));
    }

    /**
     * 启用主题
     */
    public function active($name){
		$data=M('Config')->where("name = 'FRONT_THEME'")->find();
		$theme=$data['value'];
		$name=$name?$name:I('name');
		$data['value'] = $name;
		$res=M('Config')->where("id = ".$data['id'])->save($data);

        if($res !== false){
			//修改配置文件
			$path=APP_PATH.'Home/Conf/config.php';
			$sStr=file_get_contents($path);
			$s=str_replace(trim($theme),trim($name),$sStr);
			
			if(file_put_contents($path,$s)){
				S('DB_CONFIG_DATA',null);
				$this->success('启用成功');
			}else{
				$this->error('启用失败');
			}
			
        }else{
            $this->error('启用失败');
        }
    }

    public function save($file){
        $this->path();
		$file=I('file');
        $file = base64_decode($file);
        $file = FRONT_THEME_PATH.I('post.name').'/' . $file;
        $content = I('post.content');
        if(!file_exists($file))
            $this->error('错误的文件');
        if(!is_writable($file))
            $this->error('文件不可写');
        if(file_put_contents($file, $content))
            $this->success('保存成功');
        else
            $this->error('保存失败');
    }

}

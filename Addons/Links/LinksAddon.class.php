<?php
namespace Addons\Links;
use Common\Controller\Addon;
use Think\Db;
/**
 * 友情链接插件
 * @author ihanyu
 */
class LinksAddon extends Addon {
    public $info = array(
        'name' => 'Links',
        'title' => '友情链接',
        'description' => '用于前台显示友情链接插件',
        'status' => 1,
        'author' => 'ihanyu',
        'version' => '1.0'
    );
    public $addon_path = './Addons/Links/';
    /**
     * 配置列表页面
     * @var unknown_type
     */
    public $admin_list = array(
        'listKey' => array(
            'title' => '站点名称',
            'link' => '网址',
            'typetext' => '分组管理',
            'statustext' => '显示状态',
            'nofollowtext' => '是否追踪',
            'sort' => '优先级',
            'create_time' => '开始时间',
        ),
        'model' => 'Links',
        'order' => 'sort desc,id asc'
    );
    public $custom_adminlist = 'adminlist.html';
    /**
     * (non-PHPdoc)
     * 安装函数
     * @see \Common\Controller\Addons::install()
     */
    public function table_name() {
        $db_prefix = C('DB_PREFIX');
        $table_name = "{$db_prefix}links";
        return $table_name;
    }

    public function install() {
        $model = D();
        $db_prefix = C('DB_PREFIX');
        $bools = $model -> execute("INSERT INTO `{$db_prefix}hooks`(`name`,`description`,`type`)VALUES('linkspartner','友情链接与合作伙伴勾子','1');");
        if ($bools < 1) {
            session('addons_install_error', '文章标签管理勾子添加失败');
            return false;
        }
        $sql = <<<SQL
CREATE TABLE IF NOT EXISTS `{$this->table_name()}` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT COMMENT '主键',
  `title` varchar(80) NOT NULL DEFAULT '' COMMENT '站点名称',
  `link` varchar(140) NOT NULL DEFAULT '' COMMENT '链接地址',
  `sort` int(3) unsigned NOT NULL DEFAULT 0 COMMENT '优先级',
  `nofollow` tinyint(1) unsigned NOT NULL DEFAULT 0 COMMENT '是否追踪',
  `type` tinyint(3) unsigned NOT NULL DEFAULT 1 COMMENT '类型分组',
  `cover_id` int(11) unsigned NOT NULL DEFAULT 0 COMMENT '封面图片',
  `status` tinyint(2) NOT NULL DEFAULT 1 COMMENT '状态（0：禁用，1：正常）',
  `create_time` int(11) unsigned NOT NULL DEFAULT 0 COMMENT '添加时间',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC COMMENT='友情链接表';
SQL;
        $model -> execute($sql);
        if (count($model -> query("SHOW TABLES LIKE '" . $this -> table_name() . "'")) != 1) {
            session('addons_install_error', ',links表未创建成功，请手动检查插件中的sql，修复后重新安装' . $sql);
            return false;
        }
        return true;
    }

    /**
     * (non-PHPdoc)
     * 卸载函数
     * @see \Common\Controller\Addons::uninstall()
     */
    public function uninstall() {
        $db_prefix = C('DB_PREFIX');
        $model = D();
        $sql = "DROP TABLE IF EXISTS `" . $this -> table_name() . "`;";
        $model-> execute($sql);
        $sql = "DELETE FROM `{$db_prefix}hooks` WHERE `name` = 'linkspartner'";
        $model -> execute($sql);
        return true;
    }

    //实现的pageFooter底部钩子
    public function linkspartner($type) {
        $config = $this -> getConfig();
        switch ($type) {
            case '2' :
                $prefix = 'partner_';
                break;
            case '3' :
                $prefix = 'other_';
                break;
            default :
                $prefix = 'link_';
                break;
        }
        $list = D('Addons://Links/Links') -> linkList($type);
        if (!$list)
            return;
        $this -> assign('list', $list);
        $parm = array();
        $parm['type'] = $config[$prefix . 'type'];
        $parm['width'] = $config[$prefix . 'pic_width'];
        $parm['height'] = $config[$prefix . 'pic_height'];
        $this -> assign('param', $parm);
        $this -> display('widget');
    }

}

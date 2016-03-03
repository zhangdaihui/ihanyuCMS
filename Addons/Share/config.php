<?php
return array(
	'title'=>array(//配置在表单中的键名 ,这个会是config[title]
		'title'=>'显示标题:',//表单的文字
		'type'=>'text',		        //表单的类型：text、textarea、checkbox、radio、select等
		'value'=>'分享到:',			    //表单的默认值
	),
	'share_type'=>array(         //配置在表单中的键名 ,这个会是config[random]
		'title'=>'使用类型:',	 //表单的文字
		'type'=>'select',		 //表单的类型：text、textarea、checkbox、radio、select等
		'options'=>array(		 //select 和radion、checkbox的子选项
			'1'=>'百度',		 //值=>文字
			'2'=>'jiathis',
		),
		'value'=>'1',			 //表单的默认值
	),
	'share_lists'=>array(         //配置在表单中的键名 ,这个会是config[random]
		'title'=>'图标列表:',	 //表单的文字
		'type'=>'checkbox',		 //表单的类型：text、textarea、checkbox、radio、select等
		'options'=>array(		 //select 和radion、checkbox的子选项
			'0' => 'QQ空间',		 //值=>文字
			'1' => '新浪微博',
			'2' => '微信',
			'3' => '腾讯微博',
			'4' => '人人网',
			'5' => '豆瓣网',
			'6' => '百度贴吧',
			'7' => 'QQ好友',
			'8' => '显示更多'
		),
		'value'=>'0,1,2,3',			 //表单的默认值
	),
	'icon_type'=>array(         //配置在表单中的键名 ,这个会是config[random]
		'title'=>'图标大小:',	 //表单的文字
		'type'=>'radio',		 //表单的类型：text、textarea、checkbox、radio、select等
		'options'=>array(		 //select 和radion、checkbox的子选项
			'0'    =>  '小',
			'1'   =>  '中',
			'2'    =>  '大',
		),
		'value'=>'2',			 //表单的默认值
	),
	'share_style'=>array(         //配置在表单中的键名 ,这个会是config[random]
		'title'=>'分享类型:',	 //表单的文字
		'type'=>'radio',		 //表单的类型：text、textarea、checkbox、radio、select等
		'options'=>array(		 //select 和radion、checkbox的子选项
			'0'    =>  '图标式',
			'1'   =>  '侧边栏',
		),
		'value'=>'0',			 //表单的默认值
	),
);
					
<?php
// +----------------------------------------------------------------------
// | OneThink [ WE CAN DO IT JUST THINK IT ]
// +----------------------------------------------------------------------
// | Copyright (c) 2013 http://www.onethink.cn All rights reserved.
// +----------------------------------------------------------------------
// | Author: yangweijie <yangweijiester@gmail.com> <code-tech.diandian.com>
// +----------------------------------------------------------------------
return array('group' => array(
        'type' => 'group',
        'options' => array(
            'link' => array(
                'title' => '友情链接',
                'options' => array(
                    'link_limit' => array(
                        'title' => '读取数量:',
                        'type' => 'text',
                        'value' => '30',
                    ),
                    'link_type' => array(
                        'title' => '展示方式:',
                        'type' => 'radio',
                        'options' => array(
                            '1' => '文字',
                            '2' => '图片'
                        ),
                        'value' => '1'
                    ),
                    'link_order' => array(
                        'title' => '排序',
                        'type' => 'text',
                        'value' => '`sort` DESC,`id` DESC'
                    ),
                    'link_pic_width' => array(
                        'title' => '图片宽度',
                        'type' => 'text',
                        'value' => '120',
                        'tip' => '图片宽度(px)'
                    ),
                    'link_pic_height' => array(
                        'title' => '图片高度',
                        'type' => 'text',
                        'value' => '',
                        'tip' => '图片高度(px),不写时高度自动'
                    )
                )
            ),
            'partner' => array(
                'title' => '赞助商',
                'options' => array(
                    'partner_limit' => array(
                        'title' => '读取数量:',
                        'type' => 'text',
                        'value' => '20',
                    ),
                    'partner_type' => array(
                        'title' => '展示方式:',
                        'type' => 'radio',
                        'options' => array(
                            '1' => '文字',
                            '2' => '图片'
                        ),
                        'value' => '2'
                    ),
                    'partner_order' => array(
                        'title' => '排序',
                        'type' => 'text',
                        'value' => '`sort` DESC,`id` DESC'
                    ),
                    'partner_pic_width' => array(
                        'title' => '图片宽度',
                        'type' => 'text',
                        'value' => '120',
                        'tip' => '图片宽度(px)'
                    ),
                    'partner_pic_height' => array(
                        'title' => '图片高度',
                        'type' => 'text',
                        'value' => '',
                        'tip' => '图片高度(px),不写时高度自动'
                    )
                )
            )
        )
    ));

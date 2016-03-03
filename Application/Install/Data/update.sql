ALTER TABLE `ihanyucms_category` ADD COLUMN `groups` varchar(255) NOT NULL DEFAULT '' COMMENT '分组定义';
ALTER TABLE `ihanyucms_document` ADD COLUMN `group_id` smallint(3) unsigned NOT NULL COMMENT '所属分组' AFTER `category_id`;
ALTER TABLE `ihanyucms_model` ADD COLUMN `attribute_alias` varchar(255) NOT NULL DEFAULT '' COMMENT '属性别名定义' AFTER `attribute_list`;
ALTER TABLE `ihanyucms_category` CHANGE COLUMN `model` `model` varchar(100) NOT NULL DEFAULT '' COMMENT '列表绑定模型';
UPDATE `ihanyucms_attribute` SET `extra` = '[DOCUMENT_POSITION]' WHERE `id`=10;
ALTER TABLE `ihanyucms_hooks` ADD COLUMN `status` tinyint(1) unsigned NOT NULL DEFAULT '1';
ALTER TABLE `ihanyucms_category` ADD COLUMN `model_sub` varchar(100) NOT NULL DEFAULT '' COMMENT '子文档绑定模型' AFTER `model`;
UPDATE `ihanyucms_category` SET `model` = '2,3', `model_sub` = '2' WHERE `id` = 1;
UPDATE `ihanyucms_category` SET `model` = '2,3', `model_sub` = '2', `icon` = 0 WHERE `id` = 2;
ALTER TABLE `ihanyucms_file` ADD COLUMN `url` varchar(255) NOT NULL DEFAULT '' COMMENT '远程地址' AFTER `location`;
ALTER TABLE `ihanyucms_menu` ADD COLUMN `status` tinyint(1) NOT NULL DEFAULT '0' COMMENT '状态' AFTER `is_dev`;
ALTER TABLE `ihanyucms_menu` ADD INDEX `status` (`status`);
UPDATE `ihanyucms_menu` SET `status` = '1' ;
UPDATE `ihanyucms_menu` SET `url` = 'article/index' WHERE `id` =2;
INSERT INTO `ihanyucms_menu` (`title`,`pid`,`sort`,`url`,`hide`,`tip`,`group`,`is_dev`,`status`) VALUES ('审核列表', '3', '0', 'Article/examine', '1', '', '', '0','1');
UPDATE `ihanyucms_model` SET `list_grid` = 'id:编号\r\ntitle:标题:[EDIT]\r\ntype:类型\r\nupdate_time:最后更新\r\nstatus:状态\r\nview:浏览\r\nid:操作:[EDIT]|编辑,[DELETE]|删除' WHERE `id` = 1;
UPDATE `ihanyucms_model` set `list_grid` = '' WHERE `id` > 2;
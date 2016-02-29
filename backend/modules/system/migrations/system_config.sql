/*
Navicat MySQL Data Transfer

Source Server         : mysql.dev.i3a.com.cn
Source Server Version : 50621
Source Host           : mysql.dev.i3a.com.cn:3306
Source Database       : i3a_bes

Target Server Type    : MYSQL
Target Server Version : 50621
File Encoding         : 65001

Date: 2016-02-29 18:10:58
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for `i3a_system_config`
-- ----------------------------
DROP TABLE IF EXISTS `i3a_system_config`;
CREATE TABLE `i3a_system_config` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '配置ID',
  `name` varchar(30) NOT NULL DEFAULT '' COMMENT '配置名称',
  `type` tinyint(3) unsigned NOT NULL DEFAULT '0' COMMENT '配置类型',
  `title` varchar(50) NOT NULL DEFAULT '' COMMENT '配置标题',
  `group` tinyint(3) unsigned NOT NULL DEFAULT '0' COMMENT '配置分组',
  `extra` varchar(255) NOT NULL DEFAULT '' COMMENT '配置项',
  `value` text NOT NULL COMMENT '配置值',
  `remark` varchar(100) NOT NULL COMMENT '配置说明',
  `status` tinyint(4) NOT NULL DEFAULT '0' COMMENT '状态',
  `sort` smallint(3) unsigned NOT NULL DEFAULT '0' COMMENT '排序',
  `created_at` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '创建时间',
  `updated_at` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '更新时间',
  PRIMARY KEY (`id`),
  UNIQUE KEY `uk_name` (`name`),
  KEY `type` (`type`),
  KEY `group` (`group`)
) ENGINE=InnoDB AUTO_INCREMENT=41 DEFAULT CHARSET=utf8 COMMENT='系统配置';

-- ----------------------------
-- Records of i3a_system_config
-- ----------------------------
INSERT INTO `i3a_system_config` VALUES ('1', 'WEB_SITE_TITLE', '2', '网站标题', '1', '', 'i3A商业生态系统', '网站标题前台显示标题', '1', '0', '1378898976', '1447903914');
INSERT INTO `i3a_system_config` VALUES ('2', 'WEB_SITE_DESCRIPTION', '3', '网站描述', '1', '', 'i3A商业生态系统', '网站搜索引擎描述', '1', '1', '1378898976', '1379235841');
INSERT INTO `i3a_system_config` VALUES ('3', 'WEB_SITE_KEYWORD', '3', '网站关键字', '1', '', 'i3A商业生态系统', '网站搜索引擎关键字', '1', '8', '1378898976', '1381390100');
INSERT INTO `i3a_system_config` VALUES ('4', 'WEB_SITE_CLOSE', '5', '关闭站点', '1', '0:关闭\r\n1:开启', '1', '站点关闭后其他用户不能访问，管理员可以正常访问', '1', '1', '1378898976', '1379235296');
INSERT INTO `i3a_system_config` VALUES ('9', 'CONFIG_TYPE_LIST', '4', '配置类型列表', '4', '', '0:数字\r\n1:字符\r\n2:文本\r\n3:数组\r\n4:枚举', '主要用于数据解析和页面表单的生成', '1', '2', '1378898976', '1379235348');
INSERT INTO `i3a_system_config` VALUES ('10', 'WEB_SITE_ICP', '2', '网站备案号', '1', '', '', '设置在网站底部显示的备案号，如“沪ICP备12007941号-2', '1', '9', '1378900335', '1379235859');
INSERT INTO `i3a_system_config` VALUES ('11', 'DOCUMENT_POSITION', '4', '文档推荐位', '2', '', '1:列表推荐\r\n2:频道推荐\r\n4:首页推荐', '文档推荐位，推荐到多个位置KEY值相加即可', '1', '3', '1379053380', '1379235329');
INSERT INTO `i3a_system_config` VALUES ('12', 'DOCUMENT_DISPLAY', '4', '文档可见性', '2', '', '0:所有人可见\r\n1:仅注册会员可见\r\n2:仅管理员可见', '文章可见性仅影响前台显示，后台不收影响', '1', '4', '1379056370', '1379235322');
INSERT INTO `i3a_system_config` VALUES ('13', 'COLOR_STYLE', '5', '后台色系', '1', 'default_color:默认\r\nblue_color:紫罗兰', 'default_color', '后台颜色风格', '1', '10', '1379122533', '1379235904');
INSERT INTO `i3a_system_config` VALUES ('14', 'CONFIG_GROUP_LIST', '4', '配置分组', '4', '', '1:基本\r\n2:内容\r\n3:用户\r\n4:系统', '配置分组', '1', '4', '1379228036', '1384418383');
INSERT INTO `i3a_system_config` VALUES ('21', 'HOOKS_TYPE', '4', '钩子的类型', '4', '', '1:视图\r\n2:控制器', '类型 1-用于扩展显示内容，2-用于扩展业务处理', '1', '6', '1379313397', '1379313407');
INSERT INTO `i3a_system_config` VALUES ('22', 'AUTH_CONFIG', '4', 'Auth配置', '4', '', 'AUTH_ON:1\r\nAUTH_TYPE:2', '自定义Auth.class.php类配置', '1', '8', '1379409310', '1379409564');
INSERT INTO `i3a_system_config` VALUES ('23', 'OPEN_DRAFTBOX', '5', '是否开启草稿功能', '2', '0:关闭草稿功能\r\n1:开启草稿功能\r\n', '0', '新增文章时的草稿功能配置', '1', '1', '1379484332', '1379484591');
INSERT INTO `i3a_system_config` VALUES ('24', 'DRAFT_AOTOSAVE_INTERVAL', '1', '自动保存草稿时间', '2', '', '60', '自动保存草稿的时间间隔，单位：秒', '1', '2', '1379484574', '1386143323');
INSERT INTO `i3a_system_config` VALUES ('25', 'LIST_ROWS', '1', '后台每页记录数', '2', '', '30', '后台数据每页显示记录数', '1', '10', '1379503896', '1380427745');
INSERT INTO `i3a_system_config` VALUES ('26', 'USER_ALLOW_REGISTER', '5', '是否允许用户注册', '3', '0:关闭注册\r\n1:允许注册', '1', '是否开放用户注册', '1', '3', '1379504487', '1379504580');
INSERT INTO `i3a_system_config` VALUES ('27', 'CODEMIRROR_THEME', '5', '预览插件的CodeMirror主题', '4', '3024-day:3024 day\r\n3024-night:3024 night\r\nambiance:ambiance\r\nbase16-dark:base16 dark\r\nbase16-light:base16 light\r\nblackboard:blackboard\r\ncobalt:cobalt\r\neclipse:eclipse\r\nelegant:elegant\r\nerlang-dark:erlang-dark\r\nlesser-dark:lesser-dark\r\nmidnight:midnight', 'erlang-dark', '详情见CodeMirror官网', '1', '3', '1379814385', '1384740813');
INSERT INTO `i3a_system_config` VALUES ('28', 'DATA_BACKUP_PATH', '2', '数据库备份根路径', '4', '', './Data/', '路径必须以 / 结尾', '1', '5', '1381482411', '1381482411');
INSERT INTO `i3a_system_config` VALUES ('29', 'DATA_BACKUP_PART_SIZE', '1', '数据库备份卷大小', '4', '', '20971520', '该值用于限制压缩后的分卷最大长度。单位：B；建议设置20M', '1', '7', '1381482488', '1381729564');
INSERT INTO `i3a_system_config` VALUES ('30', 'DATA_BACKUP_COMPRESS', '5', '数据库备份文件是否启用压缩', '4', '0:不压缩\r\n1:启用压缩', '0', '压缩备份文件需要PHP环境支持gzopen,gzwrite函数', '1', '11', '1381713345', '1454325443');
INSERT INTO `i3a_system_config` VALUES ('31', 'DATA_BACKUP_COMPRESS_LEVEL', '5', '数据库备份文件压缩级别', '4', '1:普通\r\n4:一般\r\n9:最高', '1', '数据库备份文件的压缩级别，该配置在开启压缩时生效', '1', '10', '1381713408', '1381713408');
INSERT INTO `i3a_system_config` VALUES ('32', 'DEVELOP_MODE', '5', '开启开发者模式', '4', '0:关闭\r\n1:开启', '0', '是否开启开发者模式', '1', '11', '1383105995', '1383291877');
INSERT INTO `i3a_system_config` VALUES ('33', 'ALLOW_VISIT', '4', '不受限控制器方法', '1', '', '0:article/draftbox\r\n1:article/mydocument\r\n2:Category/tree\r\n3:Index/verify\r\n4:file/upload\r\n5:file/download\r\n6:user/updatePassword\r\n7:user/updateNickname\r\n8:user/submitPassword\r\n9:user/submitNickname\r\n10:file/uploadpicture', '', '1', '0', '1386644047', '1386644741');
INSERT INTO `i3a_system_config` VALUES ('34', 'DENY_VISIT', '4', '超管专限控制器方法', '1', '', '0:Addons/addhook\r\n1:Addons/edithook\r\n2:Addons/delhook\r\n3:Addons/updateHook\r\n4:Admin/getMenus\r\n5:Admin/recordList\r\n6:AuthManager/updateRules\r\n7:AuthManager/tree', '仅超级管理员可访问的控制器方法', '1', '0', '1386644141', '1386644659');
INSERT INTO `i3a_system_config` VALUES ('35', 'REPLY_LIST_ROWS', '1', '回复列表每页条数', '2', '', '10', '', '1', '0', '1386645376', '1387178083');
INSERT INTO `i3a_system_config` VALUES ('36', 'ADMIN_ALLOW_IP', '3', '后台允许访问IP', '4', '', '', '多个用逗号分隔，如果不配置表示不限制IP访问', '1', '12', '1387165454', '1387165553');
INSERT INTO `i3a_system_config` VALUES ('37', 'SHOW_PAGE_TRACE', '5', '是否显示页面Trace', '4', '0:关闭\r\n1:开启', '1', '是否显示页面Trace信息', '1', '1', '1387165685', '1387165685');
INSERT INTO `i3a_system_config` VALUES ('38', 'FRONT_DEFAULT_THEME', '5', '前台网站皮肤', '1', 'default:默认风格\r\nfireworks:烟花满天', 'default', '请选择网站皮肤', '1', '0', '1430555694', '1430555882');
INSERT INTO `i3a_system_config` VALUES ('39', 'ADMIN_LOGIN_VERIFY', '5', '开户后台登录验证码', '4', '', 'default', '开启后登陆后台需要输入验证码', '1', '0', '1430555694', '1430555882');
INSERT INTO `i3a_system_config` VALUES ('40', 'URL_CASE_INSENSITIVE', '5', '链接是否区分大小写', '4', '', '1', '', '1', '0', '1430555882', '1430555882');

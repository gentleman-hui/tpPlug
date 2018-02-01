/*
Navicat MySQL Data Transfer

Source Server         : localhost
Source Server Version : 50553
Source Host           : localhost:3306
Source Database       : tpplug

Target Server Type    : MYSQL
Target Server Version : 50553
File Encoding         : 65001

Date: 2018-01-29 20:10:29
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for `tpp_config`
-- ----------------------------
DROP TABLE IF EXISTS `tpp_config`;
CREATE TABLE `tpp_config` (
  `id` int(10) NOT NULL AUTO_INCREMENT COMMENT '自增主键',
  `config_name` varchar(64) NOT NULL COMMENT '配置名称',
  `config_value` varchar(255) NOT NULL COMMENT '配置值',
  `config_describe` varchar(255) NOT NULL COMMENT '配置描述',
  `create_time` int(10) NOT NULL DEFAULT '0' COMMENT '添加时间',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='配置表';

-- ----------------------------
-- Records of tpp_config
-- ----------------------------

-- ----------------------------
-- Table structure for `tpp_plug`
-- ----------------------------
DROP TABLE IF EXISTS `tpp_plug`;
CREATE TABLE `tpp_plug` (
  `id` int(10) NOT NULL AUTO_INCREMENT COMMENT '自增主键',
  `plug_name` varchar(64) NOT NULL COMMENT '插件名称',
  `class_name` varchar(64) NOT NULL COMMENT '类名',
  `extends` text NOT NULL COMMENT '扩展库json{}',
  `php_extends` text NOT NULL COMMENT 'php扩展 json',
  `down_url` varchar(255) NOT NULL COMMENT '下载地址',
  `create_time` int(10) NOT NULL DEFAULT '0' COMMENT '添加时间',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COMMENT='插件表';

-- ----------------------------
-- Records of tpp_plug
-- ----------------------------
INSERT INTO `tpp_plug` VALUES ('1', '邮件', 'Mail', '[{\"name\":\"Mailer\",\"url\":\"extend\\/Mailer\"}]', '[\"php_sockets\",\"php_openssl\"]', '', '0');
INSERT INTO `tpp_plug` VALUES ('2', '支付宝支付', 'aliPay', '[{\"name\":\"Alipay\",\"url\":\"extend\\/Alipay\"}]', '[]', '', '0');

-- ----------------------------
-- Table structure for `tpp_plug_functions`
-- ----------------------------
DROP TABLE IF EXISTS `tpp_plug_functions`;
CREATE TABLE `tpp_plug_functions` (
  `id` int(10) NOT NULL COMMENT '自增主键',
  `name` varchar(64) NOT NULL COMMENT '操作名称',
  `explain` varchar(255) NOT NULL COMMENT '说明',
  `mca` varchar(255) NOT NULL COMMENT '模块/控制器/方法',
  `create_time` int(10) NOT NULL DEFAULT '0' COMMENT '添加时间',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='插件方法表';

-- ----------------------------
-- Records of tpp_plug_functions
-- ----------------------------

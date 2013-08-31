
CREATE TABLE `pre_admin_client_corporation` (
  `id` mediumint(6) NOT NULL AUTO_INCREMENT,
  `corp_name` varchar(64) NOT NULL COMMENT '企业名字',
  `corp_description` varchar(511) NOT NULL COMMENT '企业描述',
  `corp_area` varchar(64) NOT NULL COMMENT '所属行业',
  `corp_master` varchar(32) NOT NULL COMMENT '企业负责人',
  `corp_contractor` varchar(255) NOT NULL COMMENT '企业联系人',
  `corp_phone` varchar(11) NOT NULL,
  `corp_address` varchar(255) NOT NULL COMMENT '企业地址',
  `corp_website` varchar(255) NOT NULL COMMENT '企业官方网站',
  `belongto` mediumint(4) NOT NULL COMMENT '是否为子公司',
  `etc` varchar(255) NOT NULL COMMENT 'etc',
  `generate_date` varchar(10) NOT NULL COMMENT '生成日期',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;


CREATE TABLE `pre_admin_client_info` (
  `id` mediumint(10) NOT NULL AUTO_INCREMENT,
  `row_id` mediumint(4) NOT NULL,
  `row_content` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=9 ;


CREATE TABLE `pre_admin_client_row` (
  `id` mediumint(4) NOT NULL AUTO_INCREMENT,
  `row` text NOT NULL,
  `update_date` int(10) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;


CREATE TABLE `pre_admin_mapping_log` (
  `id` smallint(3) NOT NULL AUTO_INCREMENT,
  `info_id` smallint(3) NOT NULL,
  `map_rule` varchar(520) NOT NULL,
  `created_date` varchar(10) NOT NULL,
  `update_date` varchar(10) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

/*
Navicat MySQL Data Transfer

Source Server         : local
Source Server Version : 100130
Source Host           : localhost:3306
Source Database       : shoptramhuong

Target Server Type    : MYSQL
Target Server Version : 100130
File Encoding         : 65001

Date: 2018-06-04 23:10:00
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for bill
-- ----------------------------
DROP TABLE IF EXISTS `bill`;
CREATE TABLE `bill` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `total` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'số lượng',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `price` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'giá tiền',
  `user_info` int(255) DEFAULT NULL COMMENT 'người mua hàng',
  `product_list` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'danh sách sản phẩm',
  `status` int(255) DEFAULT '1' COMMENT 'trạng thái: 0-đang chờ, 1: đã xác nhận',
  PRIMARY KEY (`id`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=COMPACT;

-- ----------------------------
-- Records of bill
-- ----------------------------
INSERT INTO `bill` VALUES ('7', 'admin-03/06/2018 20:18:40', '2', '2018-06-03 20:18:40', '2018-06-03 20:18:40', '30000', '1', '{\"1\":12,\"2\":11}', '1');
INSERT INTO `bill` VALUES ('8', 'admin-03/06/2018 20:19:49', '2', '2018-06-03 20:19:49', '2018-06-03 20:19:49', '30000', '1', '{\"1\":11,\"2\":12}', '1');
INSERT INTO `bill` VALUES ('9', 'khách hàng-04/06/2018 07:34:57', '3', '2018-06-04 07:34:57', '2018-06-04 07:34:57', '100000', '4', '{\"1\":14,\"2\":13,\"3\":10}', '1');
INSERT INTO `bill` VALUES ('10', 'khách hàng-04/06/2018 15:04:54', '4', '2018-06-04 15:04:54', '2018-06-04 15:04:54', '100000', '4', '{\"1\":14,\"2\":12,\"3\":13}', '1');

-- ----------------------------
-- Table structure for category
-- ----------------------------
DROP TABLE IF EXISTS `category`;
CREATE TABLE `category` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `type` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT;

-- ----------------------------
-- Records of category
-- ----------------------------
INSERT INTO `category` VALUES ('1', 'Kiến thức', '2018-06-02 01:22:38', '2018-06-02 01:22:38', '1');
INSERT INTO `category` VALUES ('2', 'Khuyến mại', '2018-05-31 19:48:02', '2018-05-31 19:48:02', '0');
INSERT INTO `category` VALUES ('3', 'Thác khói trầm hương', '2018-05-31 19:48:25', '2018-05-31 19:48:25', '0');
INSERT INTO `category` VALUES ('4', 'Thác nước phong thủy', '2018-06-03 17:51:47', '2018-06-03 17:51:47', '0');
INSERT INTO `category` VALUES ('5', 'Thác khói cao cấp', '2018-05-31 19:49:01', '2018-05-31 19:49:01', '0');
INSERT INTO `category` VALUES ('6', 'Làm đẹp', '2018-06-02 03:08:10', '2018-06-01 20:08:10', null);

-- ----------------------------
-- Table structure for migrations
-- ----------------------------
DROP TABLE IF EXISTS `migrations`;
CREATE TABLE `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=COMPACT;

-- ----------------------------
-- Records of migrations
-- ----------------------------
INSERT INTO `migrations` VALUES ('1', '2014_10_12_000000_create_users_table', '1');
INSERT INTO `migrations` VALUES ('2', '2014_10_12_100000_create_password_resets_table', '1');
INSERT INTO `migrations` VALUES ('3', '0000_00_00_000000_create_shoppingcart_table', '2');

-- ----------------------------
-- Table structure for password_resets
-- ----------------------------
DROP TABLE IF EXISTS `password_resets`;
CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`) USING BTREE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=COMPACT;

-- ----------------------------
-- Records of password_resets
-- ----------------------------

-- ----------------------------
-- Table structure for post
-- ----------------------------
DROP TABLE IF EXISTS `post`;
CREATE TABLE `post` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `avatar` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `body` text COLLATE utf8mb4_unicode_ci,
  `category_id` int(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `user_id` int(255) DEFAULT NULL,
  `summary` text COLLATE utf8mb4_unicode_ci,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=COMPACT;

-- ----------------------------
-- Records of post
-- ----------------------------
INSERT INTO `post` VALUES ('4', 'Quán Thế Âm Bồ Tát', '/photos/1/2.png', '<p>Quyển kinh n&oacute;i về Ng&agrave;i, m&agrave; hiện nay ph&aacute;i Bắc T&ocirc;n (Trung Hoa, Cao Ly, Nhựt Bổn, Việt Nam) c&ograve;n truyền tụng l&agrave; quyển &ldquo;Diệu Ph&aacute;p Li&ecirc;n Hoa Kinh Quan Thế &Acirc;m Bồ T&aacute;t Phổ M&ocirc;n Phẩm&rdquo;. Theo lời kinh Phổ M&ocirc;n bất cứ l&agrave; hạng n&agrave;o trong ch&uacute;ng sanh, bất cứ l&agrave; ở v&agrave;o t&igrave;nh cảnh n&agrave;o, l&uacute;c n&agrave;o, hễ cầu đến Ng&agrave;i, niệm danh hiệu Ng&agrave;i th&igrave; đặng cứu ngay. Ng&agrave;i d&ugrave;ng huyền diệu cứu vớt ch&uacute;ng sanh kh&ocirc;ng biết mu&ocirc;n ức n&agrave;o m&agrave; kể. Nếu cầu Ng&agrave;i với danh hiệu thuộc về một ph&acirc;n th&acirc;n n&agrave;o của Ng&agrave;i th&igrave; Ng&agrave;i xuất hiện y theo ph&acirc;n th&acirc;n ấy để cứu độ. Kinh Phổ m&ocirc;n c&oacute; bi&ecirc;n r&agrave;nh 12 điều đại nguyện của Ng&agrave;i.</p>\r\n<p><a href=\"http://tuyenphap.com/wp-content/uploads/2015/05/Qu%C3%A1n-Th%E1%BA%BF-%C3%82m-B%E1%BB%93-t%C3%A1t.jpg\"><img class=\"alignnone size-medium wp-image-466\" title=\"Qu&aacute;n Thế &Acirc;m Bồ t&aacute;t 1\" src=\"http://tuyenphap.com/wp-content/uploads/2015/05/Qu%C3%A1n-Th%E1%BA%BF-%C3%82m-B%E1%BB%93-t%C3%A1t-283x300.jpg\" sizes=\"(max-width: 283px) 100vw, 283px\" srcset=\"http://tuyenphap.com/wp-content/uploads/2015/05/Qu&aacute;n-Thế-&Acirc;m-Bồ-t&aacute;t-283x300.jpg 283w, http://tuyenphap.com/wp-content/uploads/2015/05/Qu&aacute;n-Thế-&Acirc;m-Bồ-t&aacute;t.jpg 600w\" alt=\"Qu&aacute;n Thế &Acirc;m Bồ t&aacute;t\" width=\"283\" height=\"300\" /></a></p>\r\n<p>Theo kinh truyện để lại, Ng&agrave;i ph&acirc;n th&acirc;n gi&aacute;ng trần 33 kiếp, khi th&igrave; mượn x&aacute;c nam nhi, khi th&igrave; l&agrave;m thiếu nữ, khi th&igrave; ở v&agrave;o cảnh quyền qu&yacute; cao sang, khi th&igrave; v&agrave;o h&agrave;ng bần c&ugrave;ng cơ khổ, khi th&igrave; sanh l&agrave;m đạo sĩ, khi th&igrave; l&agrave;m tỳ khưu, v.v&hellip;</p>\r\n<p>Quan Thế &Acirc;m tiếng Phạn l&agrave; &ldquo;Avalokiteshvara&rdquo; dịch sang tiếng H&aacute;n l&agrave; Quan Thế &Acirc;m hay Qu&aacute;n Tự Tại &hellip;Danh hiệu Quan Thế &Acirc;m, nghĩa l&agrave; quan s&aacute;t tiếng k&ecirc;u than của ch&uacute;ng sanh trong thế gian để độ cho họ tho&aacute;t khổ. Theo Kinh Bi Hoa th&igrave; ở v&agrave;o đời qu&aacute; khứ c&oacute; đức Phật ra đời hiệu l&agrave; Bảo Tạng Như Lai. thời đ&oacute; c&oacute; vua Chuyển Lu&acirc;n Th&aacute;nh Vương l&agrave; V&ocirc; Ch&aacute;nh Niệm. Vua c&oacute; quan đại thần l&agrave; Bảo Hải, phụ th&acirc;n của đức Bảo Tạng khi chưa xuất gia đối trước Đức Phật Bảo Tạng ph&aacute;t ra 48 đại nguyện.</p>\r\n<p>Vua Chuyển Lu&acirc;n c&oacute; nhiều con. Con cả l&agrave; Th&aacute;i Tử Bất Tuấn cũng do ng&agrave;i Bảo Hải khuyến tiến. Th&aacute;i Tử cũng đi xuất gia theo cha v&agrave; đối trước Đức Bảo Tạng Như Lai ph&aacute;t ra bảo nguyện đại bi thương x&oacute;t, cứu độ tất cả c&aacute;c lo&agrave;i ch&uacute;ng sanh bị khổ n&atilde;o. v&igrave; vậy Đức Bảo Tạng thọ k&yacute; cho Th&aacute;i Tử th&agrave;nh Bồ T&aacute;t hiệu l&agrave; Quan Thế &Acirc;m, c&ograve;n Bảo Hải l&agrave; tiền th&acirc;n của Đức Th&iacute;ch Ca Mầu Ni.&nbsp; Đức Bảo Tạng thọ k&yacute; cho Th&aacute;i Tử rằng: &ldquo;V&igrave; l&ograve;ng đại bi &Ocirc;ng muốn qu&aacute;n niệm cho tất cả ch&uacute;ng sanh được c&ugrave;ng về c&otilde;i an lạc (cực lạc). Vậy từ nay đặt t&ecirc;n cho &Ocirc;ng l&agrave; Qu&aacute;n Thế &Acirc;m&hellip;.</p>\r\n<p><strong>Bồ T&aacute;t Qu&aacute;n Thế &Acirc;m l&agrave; hiện th&acirc;n của&nbsp;<a href=\"http://tuyenphap.com/tu-bi-192\">Từ Bi</a>,</strong>&nbsp;Ng&agrave;i ph&aacute;t đại nguyện thực hiện từ bi c&ugrave;ng tận trong đời vị lai, nếu ch&uacute;ng sinh c&ograve;n đau khổ. V&igrave; chỉ c&oacute; từ bi mới giải trừ đau khổ, cũng như chỉ c&oacute;&nbsp;<a href=\"http://tuyenphap.com/tri-hue-190\">tr&iacute; tuệ&nbsp;</a>mới diệt được ngu si.<br />Do đ&oacute;, Bồ T&aacute;t Quan Thế &Acirc;m thiết lập t&acirc;m đại từ, đại bi m&agrave; thực hiện đại thệ nguyện độ sanh của Ng&agrave;i.&nbsp;<strong>TỪ</strong>&nbsp;l&agrave; đem niềm vui đến cho kẻ kh&aacute;c. Chữ Từ như người ta thường n&oacute;i: Từ thiện, từ &aacute;i, từ mẫu, từ t&acirc;m. Từ t&acirc;m đối với &aacute;c t&acirc;m, s&acirc;n t&acirc;m, &iacute;ch kỷ t&acirc;m&hellip;.<strong>BI</strong>&nbsp;l&agrave; phương ch&acirc;m, l&agrave; c&aacute;ch thức h&agrave;nh động để cứu khổ.Từ l&agrave; l&ograve;ng y&ecirc;u thương, Bi l&agrave; ra tay giải quyết v&agrave; dấn th&acirc;n nỗ lực l&agrave;m việc để cứu gi&uacute;p thực tế. T&oacute;m lại&nbsp;<strong>Từ Bi</strong>: Thương y&ecirc;u ch&uacute;ng sinh, mang lại cho họ niềm an lạc vui sướng gọi l&agrave; Từ (maritrya, maitri). Đồng cảm nỗi khổ v&agrave; thương x&oacute;t ch&uacute;ng sinh, trừ bỏ nỗi khổ cho họ gọi l&agrave; Bi.<br />Qu&aacute;n Thế &Acirc;m xưa kia Ng&agrave;i đ&atilde; th&agrave;nh Phật hiệu l&agrave; &ldquo;Ch&aacute;nh Ph&aacute;p Minh Như Lai&rdquo;. Ng&agrave;i thị hiện l&agrave;m Bồ T&aacute;t v&igrave; muốn đảm đương c&ocirc;ng t&aacute;c cứu khổ ban vui cho ch&uacute;ng sanh. Đức Bồ T&aacute;t qu&aacute;n thấy Phật v&agrave; ch&uacute;ng sanh đồng chung một bản thể, đồng chung một gi&aacute;c t&aacute;nh duy nhất, nhưng Phật đ&atilde; gi&aacute;c ngộ m&agrave; ch&uacute;ng sanh th&igrave; c&ograve;n m&ecirc;.<br />Do đ&oacute;, Đức Quan Thế &Acirc;m tức l&agrave; một vị Phật tương lai sẽ bổ v&agrave;o ng&ocirc;i của&nbsp;<a href=\"http://tuyenphap.com/duc-phat-a-di-da-amitabha-453\">Đức Phật A Di Đ&agrave;</a>, th&igrave; ng&agrave;i c&ugrave;ng với ng&agrave;i Đại Thế Ch&iacute; (kiếp xưa l&agrave; em ng&agrave;i, con thứ vua Chuyển Lu&acirc;n cũng c&ugrave;ng Ng&agrave;i đồng thời được Đức Bảo Tạng thụ k&yacute;) gi&uacute;p việc gi&aacute;o h&oacute;a độ sanh cho Đức Phật A Di Đ&agrave; v&agrave; 2 Ng&agrave;i cũng ứng th&acirc;n xuống sa b&agrave; trợ gi&aacute;o cho Đức Th&iacute;ch Ca M&acirc;u Ni.<br />Theo Kinh Thủ Lăng Nghi&ecirc;m c&oacute; ch&eacute;p lời Ng&agrave;i bạch với Đức Thế T&ocirc;n rằng:<br /><em>&ldquo;Con nhớ c&aacute;ch đ&acirc;y v&ocirc; số hằng h&agrave; sa kiếp về trước c&oacute; Đức Phật ra đời hiệu l&agrave; Quan Thế &Acirc;m, từ Đức Phật kia dạy con, do nghe, nghĩ v&agrave; tu m&agrave; v&agrave;o Tam Ma Đề&rdquo;</em>&nbsp;Do đ&oacute; n&ecirc;n biết: Ng&agrave;i đ&atilde; ph&aacute;t t&acirc;m Bồ Đề từ đời Đức Phật Quan Thế &Acirc;m trong v&ocirc; số hằng h&agrave; sa kiếp về trước do nghe Phật truyền ph&aacute;p, Ng&agrave;i đ&atilde; nhận định ph&aacute;p tu vi&ecirc;n th&ocirc;ng về nhĩ căn l&agrave; hơn tất cả, do ng&agrave;i kh&oacute; chứng vi&ecirc;n th&ocirc;ng ở nhĩ căn n&ecirc;n được Đức Phật thụ k&yacute; cho ng&agrave;i danh hiệu Qu&aacute;n Thế &Acirc;m, một danh hiệu m&agrave; ch&uacute;ng sanh ở mười phương cung k&iacute;nh chấp tr&igrave;, nhất l&agrave; trong những l&uacute;c nguy hiểm, đau khổ.<br />Ngo&agrave;i ra, Kinh Qu&aacute;n &Acirc;m Tam Muội n&oacute;i: &ldquo;<strong>Xưa kia Ng&agrave;i Qu&aacute;n Thế &Acirc;m đ&atilde; th&agrave;nh Phật hiệu l&agrave; &ldquo;Ch&iacute;nh Ph&aacute;p Minh Như Lai&rdquo;</strong>. Tiền th&acirc;n Đức Th&iacute;ch Ca hồi ấy đ&atilde; từng ở dưới ph&aacute;p to&agrave;, sung v&agrave;o trong số đệ tử khổ hạnh để gần gũi&rdquo;. Ng&agrave;y nay Đức Th&iacute;ch Ca th&agrave;nh Phật, thời Ng&agrave;i trở lại l&agrave;m đệ tử để gần gũi lại:&rdquo; Một Đức Phật ra đời th&igrave; h&agrave;ng ng&agrave;n Đức Phật ph&ugrave; tr&igrave;&rdquo;.<br />Trong Kinh Đại Bi T&acirc;m Đ&agrave; Na Ni th&igrave; ch&eacute;p lời Ng&agrave;i bạch Phật rằng: &ldquo;Bạch Đức Thế T&ocirc;n ! con nhớ v&ocirc; lượng ức kiếp trước c&oacute; Đức Phật ra đời hiệu l&agrave; Thi&ecirc;n Quan Vương tĩnh trụ Như Lai&rdquo; Đức Phật ấy v&igrave; thương đến con v&agrave; tất cả ch&uacute;ng sanh n&ecirc;n n&oacute;i ra m&ocirc;n Đại Bi T&acirc;m Đ&agrave; La Ni. Ng&agrave;i lại d&ugrave;ng c&aacute;nh tay sắc v&agrave;ng xoa đầu con m&agrave; bảo: &ldquo;Thiện Nam Tử ! &Ocirc;ng n&ecirc;n trụ tr&igrave; t&acirc;m ch&uacute; n&agrave;y v&agrave; v&igrave; khắp tất cả ch&uacute;ng sanh trong c&otilde;i trước ở đời vị lai m&agrave; l&agrave;m cho họ được sự lợi &iacute;ch y&ecirc;n vui lớn.&rdquo; L&uacute;c đ&oacute; con mới ở ng&ocirc;i Sơ Địa, vừa nghe xong thần ch&uacute; n&agrave;y liền vượt l&ecirc;n chứng đại B&aacute;t Địa&rdquo;.<br />Mật t&ocirc;ng th&igrave; theo trong Kinh Đại Bản Như &Yacute; n&oacute;i c&oacute; 8 vị đại Quan &Acirc;m l&agrave;:<br />1. Vi&ecirc;n M&atilde;n &Yacute;, Nguyệt Minh Vương Bồ T&aacute;t.<br />2. Bạch Y Tự Tại.<br />3. C&aacute;t La S&aacute;t Nữ.<br />4. Tứ Diện Qu&aacute;n &Acirc;m.<br />5. M&atilde; Đầu Minh Vương.<br />6. Tỳ Cầu Chi.<br />7. Đại Thế Ch&iacute;.<br />8. Đ&agrave; La Quan &Acirc;m (Qu&aacute;n &Acirc;m Chuẩn Đề).</p>\r\n<p><a href=\"http://tuyenphap.com/wp-content/uploads/2015/05/Quan-am-tu-thu.jpg\"><img class=\"alignnone size-full wp-image-484\" title=\"Qu&aacute;n Thế &Acirc;m Bồ t&aacute;t 2\" src=\"http://tuyenphap.com/wp-content/uploads/2015/05/Quan-am-tu-thu.jpg\" sizes=\"(max-width: 600px) 100vw, 600px\" srcset=\"http://tuyenphap.com/wp-content/uploads/2015/05/Quan-am-tu-thu.jpg 600w, http://tuyenphap.com/wp-content/uploads/2015/05/Quan-am-tu-thu-206x300.jpg 206w\" alt=\"Qu&aacute;n Thế &Acirc;m Bồ t&aacute;t 2\" width=\"600\" height=\"873\" /></a></p>\r\n<p>Ng&agrave;i c&oacute; đức uy thần c&ocirc;ng đức v&agrave; l&ograve;ng từ bi rất lớn. Ng&agrave;i vốn kh&ocirc;ng phải l&agrave; nữ tướng, nhưng v&igrave; ng&agrave;i thường cứu khổ cứu nạn cho ch&uacute;ng sinh (m&agrave; phụ nữ thường nhiều khổ nạn hơn so với nam giới) cho n&ecirc;n giới phụ nữ đặc biệt t&iacute;n ngưỡng về Ng&agrave;i. N&ecirc;n<strong>&nbsp;ch&uacute;ng sanh mới tưởng tượng ra Ng&agrave;i l&agrave; nữ tướng để tiện ho&aacute; độ</strong>&nbsp;cho phụ nữ. Theo Kinh A-Di-Đ&agrave; n&oacute;i: Người sanh về c&otilde;i cực lạc tuy chưa chứng quả Th&aacute;nh, vẫn kh&ocirc;ng c&oacute; tướng nam, tướng nữ.</p>\r\n<p>Đức Qu&aacute;n-Thế-&Acirc;m Bồ-T&aacute;t l&agrave; vị đại Bồ-T&aacute;t kh&ocirc;ng chỉ được mọi người ở thế giới Ta-B&agrave; ch&uacute;ng ta ca ngợi v&agrave; tr&igrave; niệm danh xưng của Ng&agrave;i m&agrave; cả ở mười phương c&otilde;i kh&aacute;c cũng được c&aacute;c chư vị Phật v&agrave; Bồ-T&aacute;t đồng khen ngợi v&agrave; nh&acirc;n d&acirc;n c&otilde;i đ&oacute; đều một l&ograve;ng th&agrave;nh k&iacute;nh tr&igrave; niệm danh hiệu của Ng&agrave;i, nhưng chỉ c&oacute; điều, ở c&aacute;c thế giới kh&aacute;c, Ng&agrave;i lại mang danh xưng kh&aacute;c m&agrave; th&ocirc;i.</p>\r\n<p>Ở Ấn-độ, Việt nam v&agrave; ở Trung Hoa cũng như khắp mọi nơi tr&ecirc;n thế-giới, đ&acirc;u đ&acirc;u người ta cũng x&acirc;y ch&ugrave;a đặt tượng của Ng&agrave;i để thờ v&agrave; chi&ecirc;m ngưỡng. H&igrave;nh ảnh của Ng&agrave;i bao tr&ugrave;m l&ecirc;n tất cả t&acirc;m tr&iacute; của biết bao người v&igrave; Ng&agrave;i lu&ocirc;n lu&ocirc;n gần gũi họ, an ủi, gia tr&igrave;, bảo vệ họ mỗi khi người ta tr&igrave; niệm danh hiệu của Ng&agrave;i.&nbsp; Ng&agrave;i đến với mọi người, kh&ocirc;ng ph&acirc;n biệt giầu hay kẻ ngh&egrave;o, gi&agrave; hay trẻ, tất cả đều một l&ograve;ng b&igrave;nh đẳng như nhau, kh&ocirc;ng hai, kh&ocirc;ng kh&aacute;c. Cho n&ecirc;n từ bậc vua ch&uacute;a đến h&agrave;ng thứ d&acirc;n, ai ai cũng s&ugrave;ng k&iacute;nh, tr&igrave; niệm danh hiệu Ng&agrave;i v&agrave; đặc biệt c&oacute; nhiều người biết niệm danh Ng&agrave;i trước khi biết đến c&aacute;c vị Phật v&agrave; bồ-T&aacute;t kh&aacute;c. Tại sao lại c&oacute; hiện tượng n&agrave;y? Đ&oacute; l&agrave; v&igrave; trong t&acirc;m của mỗi người ch&uacute;ng ta đều c&oacute; Quan-&Acirc;m tự t&aacute;nh, chỉ c&oacute; điều v&igrave; ch&uacute;ng ta bị v&ocirc; minh nhiều đời nhiều kiếp che mờ, bị phiền n&atilde;o quấy ph&aacute; n&ecirc;n chẳng thể hiện bầy ra, khi được ai nhắc đến danh hiệu Ng&agrave;i th&igrave; giống như mầm giống xưa nay gặp mưa, &aacute;nh s&aacute;ng, nhiệt độ l&agrave; tự khắc nẩy mầm, sinh s&ocirc;i ngay.</p>\r\n<p>Bồ T&aacute;t Quan Thế &Acirc;m hiện th&acirc;n của Đức Từ Bi, muốn n&oacute;i l&ecirc;n t&igrave;nh Mẹ thương con, Mẹ đối với con l&agrave; t&igrave;nh thương ch&acirc;n th&agrave;nh, tha thiết nhất kh&ocirc;ng c&oacute; t&igrave;nh thương n&agrave;o s&aacute;nh bằng. Cho n&ecirc;n, Đức Quan Thế &Acirc;m hiện th&acirc;n l&agrave; một người mẹ hiền của nh&acirc;n loại, hay của tất cả ch&uacute;ng sinh.<br />Căn cứ theo h&igrave;nh tướng đ&atilde; thể hiện v&agrave; đức t&iacute;nh Quan Thế &Acirc;m đ&atilde; cứu khổ cứu nạn cho ch&uacute;ng sinh, nh&acirc;n loại được tho&aacute;t khổ đau ở sa b&agrave; n&agrave;y to lớn biết chừng n&agrave;o!</p>', null, '2018-06-04 03:57:54', '2018-06-04 04:33:15', '1', '<p>Qu&aacute;n Thế &Acirc;m Bồ T&aacute;t l&agrave; danh hiệu của một vị Phật đ&aacute;ng lẽ đ&atilde; chứng quả Phật, nhưng c&ograve;n nguyện lẫn lộn ở c&otilde;i ta b&agrave; để cứu độ ch&uacute;ng sinh. Người ta cũng gọi Ng&agrave;i l&agrave; Quan &Acirc;m Phật, Quan &Acirc;m Như Lai, Quan Thế &Acirc;m, Quan &Acirc;m Nam Hải, Phổ Đ&agrave; Phật Tổ, v.v&hellip;</p>');
INSERT INTO `post` VALUES ('5', 'Công Dụng Kỳ Diệu Của Trầm Hương, Kỳ Nam', '/photos/1/23-1350973506_500x0.jpg', '<p class=\"Normal\" align=\"left\">Theo lương y Huỳnh Văn Quang ở TP HCM, trầm hương, kỳ hương (kỳ nam) từ gỗ th&acirc;n gi&agrave; mục của c&acirc;y trầm gi&oacute; chuyển h&oacute;a m&agrave; th&agrave;nh; hoặc do một loại nấm g&acirc;y nhiễm mục n&aacute;t th&acirc;n c&acirc;y trầm gi&oacute; rồi chuyển h&oacute;a tạo n&ecirc;n.</p>\r\n<p class=\"Normal\" align=\"left\">Cũng c&oacute; giả thuyết cho rằng, th&acirc;n c&acirc;y gi&oacute; bị bọng, những con ong, con kiến l&agrave;m tổ ở đ&oacute;, đưa mật về ăn. Hương mật ấy ngấm v&agrave;o thịt của c&acirc;y gi&oacute; l&acirc;u ng&agrave;y m&agrave; kết th&agrave;nh kỳ nam.</p>\r\n<p class=\"Normal\" align=\"left\">Đ&ocirc;ng y ph&acirc;n loại trầm tốt xấu bằng c&aacute;ch: Nếu cho v&agrave;o nước, trầm ch&igrave;m xuống tận đ&aacute;y l&agrave; trầm tốt nhất; bỏ v&agrave;o nước m&agrave; lơ lửng, kh&ocirc;ng ch&igrave;m, kh&ocirc;ng nổi l&agrave; trầm loại 2; c&ograve;n trầm loại 3 l&agrave; loại nổi tr&ecirc;n mặt nước. Đ&ocirc;ng y thường d&ugrave;ng trầm loại 2 l&agrave;m thuốc (v&igrave; loại 1 c&oacute; gi&aacute; rất cao).</p>\r\n<p class=\"Normal\" align=\"left\">Kỳ hương được ph&acirc;n ra l&agrave;m những loại: hắc kỳ (c&oacute; m&agrave;u đen, l&agrave; loại đắt tiền nhất); thanh kỳ (m&agrave;u xanh xanh, c&ograve;n gọi l&agrave; ho&agrave;ng kỳ) v&agrave; bạch kỳ (m&agrave;u trắng đục). Trầm loại tốt c&oacute; sắc đen, b&oacute;ng, nặng trịch như khối sắt. Kỳ cũng nặng vậy, nhưng thường c&oacute; tinh dầu rịn ra b&ecirc;n ngo&agrave;i ươn ướt. Tr&ecirc;n thị trường, c&oacute; khi người ta giả trầm \"xịn\" bằng c&aacute;ch, lấy trầm loại 3 khoan một lỗ thật s&acirc;u chế ch&igrave; v&agrave;o trong đ&oacute; v&agrave; b&iacute;t lại, rồi xoa tinh dầu trầm, đ&aacute;nh b&oacute;ng. Kh&ocirc;ng r&agrave;nh rất kh&oacute; m&agrave; nhận biết.</p>\r\n<p class=\"Normal\" align=\"left\"><strong><span style=\"color: #4f4f4f;\">C&ocirc;ng dụng của trầm - kỳ</span></strong></p>', null, '2018-06-04 04:35:07', '2018-06-04 04:35:07', '1', '<h2 class=\"description\">Trầm hương được Đ&ocirc;ng y coi l&agrave; một vị thuốc rất qu&yacute;. Trầm gi&uacute;p bổ dương, bổ thận kh&iacute;, chữa yếu sinh l&yacute; ở đ&agrave;n &ocirc;ng, trợ tim, trị ti&ecirc;u chảy, chống n&ocirc;n...</h2>');
INSERT INTO `post` VALUES ('6', 'Đốt Trầm Hương Vừa Thơm Nhà Lại Giúp Chữa Bệnh', '/photos/1/dot-tram-huong-thom-nha-chua-benh11459400579.jpg', '<p><strong>Trầm hương l&agrave; g&igrave;?</strong></p>\r\n<p>Lương y Huỳnh Văn Quang &ndash; Hội vi&ecirc;n Hội Đ&ocirc;ng y TP.HCM cho rằng:&nbsp;<a href=\"https://healthplus.vn/nghien-cuu-san-xuat-c17/\">Nghi&ecirc;n cứu</a>&nbsp;của c&aacute;c nh&agrave; khoa học cho thấy, trầm hương, kỳ hương l&agrave; phần gỗ th&acirc;n gi&agrave; mục của c&acirc;y trầm d&oacute; chuyển h&oacute;a m&agrave; th&agrave;nh, hoặc do một loại nấm g&acirc;y nhiễm mục n&aacute;t th&acirc;n c&acirc;y trầm d&oacute; rồi chuyển h&oacute;a tạo n&ecirc;n.</p>\r\n<p>D&oacute; trầm, d&oacute; bầu hay trầm d&oacute; l&agrave; t&ecirc;n gọi chung cho một chi thực vật thuộc họ Trầm sống ở ch&acirc;u &Aacute; trong c&aacute;c khu rừng ở Indonesia, Th&aacute;i Lan, Campuchia, L&agrave;o, Việt Nam, Malaysia, Philippines, Bắc Ấn Độ&hellip;</p>\r\n<p>Do những t&aacute;c động tr&ecirc;n th&acirc;n c&acirc;y trong qu&aacute; tr&igrave;nh sinh trưởng g&acirc;y ra những &ldquo;tổn thương&rdquo;, l&acirc;u ng&agrave;y t&iacute;ch tụ một chất dạng nhựa (dầu), lan dần ra, l&agrave;m biến đổi c&aacute;c phần tử gỗ, tạo n&ecirc;n nhiều m&agrave;u sắc (đen, n&acirc;u, ch&agrave;m, x&aacute;m&hellip;), nhiều t&iacute;nh chất (cứng, mềm, dẻo, gi&ograve;n), nhiều h&igrave;nh d&aacute;ng (tr&ograve;n, xoắn, nhọn d&agrave;i&hellip;) ở nhiều vị tr&iacute; (th&acirc;n, c&agrave;nh, rễ).</p>\r\n<p><img title=\"Đốt trầm hương vừa thơm nh&agrave; lại gi&uacute;p chữa bệnh - Ảnh 1\" src=\"https://media.healthplus.vn/Images/Uploaded/Share/2016/03/31/tram4.png\" alt=\"Đốt trầm hương vừa thơm nh&agrave; lại gi&uacute;p chữa bệnh - Ảnh 1\" width=\"500\" height=\"275\" /><em>Trầm hương l&agrave; phần gỗ th&acirc;n gi&agrave; mục của c&acirc;y trầm d&oacute; chuyển h&oacute;a m&agrave; th&agrave;nh</em></p>\r\n<p>Trầm hương được xếp th&agrave;nh 3 loại: Kỳ, Trầm v&agrave; Tốc.</p>\r\n<p>- Kỳ l&agrave; loại trầm hương c&oacute; phẩm cấp cao nhất, cho nhiều dầu, nhẹ, mềm, dẻo, nhuyễn, kh&iacute; nếm c&oacute; đủ vị chua, cay, đắng, ngọt, tỏa m&ugrave;i thơm tự nhi&ecirc;n, khi đốt hương thơm đặc biệt, kh&oacute;i xanh, bay thẳng v&agrave; d&agrave;i l&ecirc;n kh&ocirc;ng trung. Kỳ c&oacute; 4 loại l&agrave; Bạch kỳ, Thanh kỳ, Huỳnh kỳ v&agrave; Hắc kỳ.</p>\r\n<p>- Trầm l&agrave; loại trầm hương &iacute;t dầu, nặng, vị đắng, hầu hết khi đốt mới tỏa m&ugrave;i thơm. Kh&oacute;i trầm m&agrave;u trắng, bay quanh rồi tan ngay. S&aacute;ch xưa chia trầm hương th&agrave;nh 5 loại: Ho&agrave;ng lạp trầm, Ho&agrave;ng trầm, Gi&aacute;c trầm, Tiến hương, K&ecirc; cốt hương.</p>', null, '2018-06-04 06:17:10', '2018-06-04 06:17:10', '1', '<h2>Người xưa c&oacute; c&acirc;u &ldquo;ngậm ngải t&igrave;m trầm&rdquo; để chỉ sự gian khổ khi đi t&igrave;m loại gỗ qu&yacute; n&agrave;y.</h2>');
INSERT INTO `post` VALUES ('7', 'Abc123', '/photos/1/32191899_195208841291406_5021602241233027072_n.jpg', '<p>&aacute;dfsadfasdfasdfasfdasdfsadfasdfas</p>\r\n<p>&aacute;dfasdfasdfasdfsadfasdfasdfsadfas</p>\r\n<p>&aacute;dfasdfasdfasdfasdfadsfsad<img src=\"/shoptramhuong/public/photos/1/23-1350973506_500x0.jpg\" alt=\"\" /></p>', null, '2018-06-04 15:09:24', '2018-06-04 15:09:24', '1', '<p>abcqsdfsdfsdfasdf</p>');

-- ----------------------------
-- Table structure for product
-- ----------------------------
DROP TABLE IF EXISTS `product`;
CREATE TABLE `product` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `price` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `price_discount` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sold` int(11) DEFAULT '0' COMMENT 'đã bán',
  `total` int(11) DEFAULT NULL COMMENT 'tổng sản phẩm còn',
  `status` int(11) DEFAULT NULL,
  `contents` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `avatar` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=COMPACT;

-- ----------------------------
-- Records of product
-- ----------------------------
INSERT INTO `product` VALUES ('10', 'Đức Phật Thích Ca Mâu Ni Tọa Thiền', '100000', '20000', '1', '9', null, '<ul>\r\n<li><strong>K&iacute;ch thước:</strong>&nbsp;20,5*20,5*30 cm</li>\r\n<li><strong>Khối lượng:</strong>&nbsp;~ 1,5kg</li>\r\n<li><strong>Chất liệu sản phẩm:</strong>&nbsp;Resin &ndash; composite</li>\r\n</ul>', '2018-06-01 20:18:44', '2018-06-04 07:34:57', '/photos/1/1-4.jpg');
INSERT INTO `product` VALUES ('11', 'Tượng Phật', '40000', '20000', '4', '6', null, null, '2018-06-01 20:24:39', '2018-06-03 20:19:49', '/photos/1/duc-phat-thich-ca-mau-ni-1-1.jpg');
INSERT INTO `product` VALUES ('12', 'Kiến Thức', '20000', '10000', '2', '4', null, null, '2018-06-01 20:32:57', '2018-06-04 15:04:54', '/photos/1/1-4.jpg');
INSERT INTO `product` VALUES ('13', 'Cóc Tài Lộc (tặng MIỄN PHÍ Khi Mua 4 Hộp Trầm Hương)', '10000', '50000', '1', '68', null, '<p>TỪ NG&Agrave;Y 1/11 &ndash; 31/11 KHI MUA&nbsp;<strong>4 HỘP TRẦM HƯƠNG 800K</strong>&nbsp;SẼ ĐƯỢC&nbsp;<strong>TẶNG MIỄN PH&Iacute;&nbsp;</strong>TƯỢNG C&Oacute;C T&Agrave;I LỘC</p>\r\n<p>Kh&aacute;ch h&agrave;ng&nbsp;&nbsp;<stron', '2018-06-04 04:50:32', '2018-06-04 15:04:55', '/photos/1/thac-khoi-tram-huong-coc-tai-loc-1.png');
INSERT INTO `product` VALUES ('14', 'Chẩm Kinh Tạ Thư (tặng MIỄN PHÍ Khi Mua 4 Hộp Trầm Hương)', '40000', '30000', '1', '16', null, '<p>TỪ NG&Agrave;Y 1/11 &ndash; 31/11 KHI MUA&nbsp;<strong>4 HỘP TRẦM HƯƠNG 800K</strong>&nbsp;SẼ ĐƯỢC MUA TƯỢNG TH&Aacute;C CHẨM KINH TẠ THƯ VỚI&nbsp;<strong>GI&Aacute; CHỈ C&Ograve;N 199K</strong></p>\r\n<p>Kh&aacute;ch h&agrave;n', '2018-06-04 04:52:27', '2018-06-04 15:04:54', '/photos/1/cham-kinh-ta-thu-fb-1.jpg');
INSERT INTO `product` VALUES ('15', 'Abc123', '20000', '10000', '0', '20', null, '<p>dfgdfgdfgfdgfdgdfg</p>\r\n<p>dfgdf</p>\r\n<p>gdf</p>\r\n<p>gdf</p>\r\n<p>gd</p>\r\n<p>fg</p>\r\n<p>dfgd</p>', '2018-06-04 15:10:32', '2018-06-04 16:09:20', 'http://localhost/shoptramhuong/public/photos/1/32191899_195208841291406_5021602241233027072_n.jpg');

-- ----------------------------
-- Table structure for product_category
-- ----------------------------
DROP TABLE IF EXISTS `product_category`;
CREATE TABLE `product_category` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `category_id` int(11) DEFAULT NULL,
  `product_id` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=52 DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT;

-- ----------------------------
-- Records of product_category
-- ----------------------------
INSERT INTO `product_category` VALUES ('15', '2', '10', '2018-06-01 20:18:44', '2018-06-01 20:18:44');
INSERT INTO `product_category` VALUES ('16', '3', '10', '2018-06-01 20:18:44', '2018-06-01 20:18:44');
INSERT INTO `product_category` VALUES ('17', '3', '11', '2018-06-01 20:24:39', '2018-06-01 20:24:39');
INSERT INTO `product_category` VALUES ('18', '4', '11', '2018-06-01 20:24:39', '2018-06-01 20:24:39');
INSERT INTO `product_category` VALUES ('19', '5', '12', '2018-06-01 20:32:57', '2018-06-01 20:32:57');
INSERT INTO `product_category` VALUES ('20', '5', '13', '2018-06-04 04:50:32', '2018-06-04 04:50:32');
INSERT INTO `product_category` VALUES ('21', '4', '13', '2018-06-04 04:50:32', '2018-06-04 04:50:32');
INSERT INTO `product_category` VALUES ('22', '3', '13', '2018-06-04 04:50:32', '2018-06-04 04:50:32');
INSERT INTO `product_category` VALUES ('23', '3', '14', '2018-06-04 04:52:27', '2018-06-04 04:52:27');
INSERT INTO `product_category` VALUES ('24', '5', '14', '2018-06-04 04:52:27', '2018-06-04 04:52:27');
INSERT INTO `product_category` VALUES ('50', '3', '15', '2018-06-04 16:09:20', '2018-06-04 16:09:20');
INSERT INTO `product_category` VALUES ('51', '5', '15', '2018-06-04 16:09:20', '2018-06-04 16:09:20');

-- ----------------------------
-- Table structure for product_tag
-- ----------------------------
DROP TABLE IF EXISTS `product_tag`;
CREATE TABLE `product_tag` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `tag_id` int(11) DEFAULT NULL,
  `product_id` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=26 DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT;

-- ----------------------------
-- Records of product_tag
-- ----------------------------
INSERT INTO `product_tag` VALUES ('24', '2', '15', '2018-06-04 16:09:20', '2018-06-04 16:09:20');
INSERT INTO `product_tag` VALUES ('25', '4', '15', '2018-06-04 16:09:21', '2018-06-04 16:09:21');

-- ----------------------------
-- Table structure for shoppingcart
-- ----------------------------
DROP TABLE IF EXISTS `shoppingcart`;
CREATE TABLE `shoppingcart` (
  `identifier` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `instance` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `content` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`identifier`,`instance`) USING BTREE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=COMPACT;

-- ----------------------------
-- Records of shoppingcart
-- ----------------------------

-- ----------------------------
-- Table structure for tag
-- ----------------------------
DROP TABLE IF EXISTS `tag`;
CREATE TABLE `tag` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT;

-- ----------------------------
-- Records of tag
-- ----------------------------
INSERT INTO `tag` VALUES ('1', 'phật thích ca', null, null);
INSERT INTO `tag` VALUES ('2', 'phong thủy', null, null);
INSERT INTO `tag` VALUES ('3', 'trầm hương', null, null);
INSERT INTO `tag` VALUES ('4', 'thác khói', null, null);
INSERT INTO `tag` VALUES ('5', 'non bộ', null, null);
INSERT INTO `tag` VALUES ('6', 'thác nước', null, null);
INSERT INTO `tag` VALUES ('7', 'trang trí', null, null);
INSERT INTO `tag` VALUES ('8', 'cầu tài', null, null);
INSERT INTO `tag` VALUES ('9', 'cầu lộc', null, null);
INSERT INTO `tag` VALUES ('10', 'cóc tài lộc', null, null);
INSERT INTO `tag` VALUES ('11', 'bàn thờ thần tài', null, null);
INSERT INTO `tag` VALUES ('12', 'quà tặng phong thủy', null, null);

-- ----------------------------
-- Table structure for users
-- ----------------------------
DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(15) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `role_id` int(11) DEFAULT '0',
  PRIMARY KEY (`id`) USING BTREE,
  UNIQUE KEY `users_email_unique` (`email`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=COMPACT;

-- ----------------------------
-- Records of users
-- ----------------------------
INSERT INTO `users` VALUES ('1', 'admin', 'admin@gmail.com', '$2y$10$9MfYX79THfKDlvOZBbGANuzmo.GFqPOcketwGYlIpDLIqeqsjX/VW', 'iCM5Ht638gmyUM9hhd388UpE2iAlAS2rBpdQMOoIkhrfTCH2ECUdD2xvEVVy', '2018-05-30 15:40:20', '2018-05-31 19:54:52', 'Dương Nội Hà Đông', '01694128866', '1');
INSERT INTO `users` VALUES ('4', 'khách hàng', 'khachhang@gmail.com', '$2y$10$vqGrSTl3z0vfDKIAJd4cB.omVWNEhvgK2TQ9GGxFRcxCBvw98ZR2m', 'jqrSS1qFnRKCcX1Yz1oLiG7tmMKm3uC8LvysRXZpGFvpMmyJbkOcsuUh7WYf', '2018-06-04 02:51:26', '2018-06-04 02:51:26', null, null, '0');
INSERT INTO `users` VALUES ('5', 'hoàng thùy linh', 'abcd1234@abc.com', '$2y$10$ifzfYQxKSY4U9C.qVCPW.OJLFCRW01dECFCyKXFbozYKIJy/IKk6q', 'cKzvEDVxb2QgSFG60RHJxvxwHa2r5b2HFPoXIZFfCun5SUlHoHMi1BLMvcuj', '2018-06-04 07:56:34', '2018-06-04 07:56:34', null, null, '0');

-- --------------------------------------------------------
-- Host:                         192.168.1.15
-- Server version:               10.6.4-MariaDB-1:10.6.4+maria~focal - mariadb.org binary distribution
-- Server OS:                    debian-linux-gnu
-- HeidiSQL Version:             11.3.0.6295
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


-- Dumping database structure for w11_assignment_ChengTao
DROP DATABASE IF EXISTS `w11_assignment_ChengTao`;
CREATE DATABASE IF NOT EXISTS `w11_assignment_ChengTao` /*!40100 DEFAULT CHARACTER SET utf8mb4 */;
USE `w11_assignment_ChengTao`;

-- Dumping structure for table w11_assignment_ChengTao.menuItem
DROP TABLE IF EXISTS `menuItem`;
CREATE TABLE IF NOT EXISTS `menuItem` (
  `menuId` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `menuText` varchar(50) NOT NULL,
  `menuOrder` int(10) unsigned NOT NULL,
  `menuLocation` enum('top','footer','login','logout') NOT NULL,
  `pageId` int(10) unsigned NOT NULL,
  PRIMARY KEY (`menuId`),
  KEY `FK_menuItem_page` (`pageId`),
  CONSTRAINT `FK_menuItem_page` FOREIGN KEY (`pageId`) REFERENCES `page` (`pageId`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4;

-- Dumping data for table w11_assignment_ChengTao.menuItem: ~8 rows (approximately)
/*!40000 ALTER TABLE `menuItem` DISABLE KEYS */;
INSERT INTO `menuItem` (`menuId`, `menuText`, `menuOrder`, `menuLocation`, `pageId`) VALUES
	(2, 'HOME', 1, 'top', 1),
	(4, 'SHOP', 3, 'top', 4),
	(5, 'ABOUT', 4, 'top', 5),
	(6, 'Privacy', 5, 'footer', 6),
	(7, 'Shipping', 6, 'footer', 6),
	(8, 'Terms of Use', 7, 'footer', 6),
	(9, 'Contact Us', 8, 'footer', 7),
	(10, 'SIGNUP / LOGIN', 9, 'login', 8);
/*!40000 ALTER TABLE `menuItem` ENABLE KEYS */;

-- Dumping structure for table w11_assignment_ChengTao.page
DROP TABLE IF EXISTS `page`;
CREATE TABLE IF NOT EXISTS `page` (
  `pageId` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `pageTitle` varchar(50) NOT NULL,
  `pageName` varchar(50) DEFAULT NULL,
  `pageContent` text NOT NULL,
  PRIMARY KEY (`pageId`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4;

-- Dumping data for table w11_assignment_ChengTao.page: ~8 rows (approximately)
/*!40000 ALTER TABLE `page` DISABLE KEYS */;
INSERT INTO `page` (`pageId`, `pageTitle`, `pageName`, `pageContent`) VALUES
	(1, 'Welcome', 'home', '<img src="./img/nutrition.jpg">\r\n<p>Feeding your baby in the first year of life is an exciting adventure for parents and babies alike. It’s about development, nutrition, curiosity, sharing and learning. Attachment also grows as you go about your daily routine with your baby.</p>\r\n<p>You can help your baby develop a lifetime of healthy eating habits with the right start.</p>\r\n<p>For the first 6 months of life, breastfed babies will get what they need from their mother’s milk.</p>\r\n<ul>\r\n<li>Babies who are exclusively or partially breastfed should get a daily supplement of vitamin D, which is available as drops.</li>\r\n<li>Breast milk has the right amount and quality of nutrients to suit your baby’s first food needs.</li>\r\n<li>Breast milk also contains antibodies and other immune factors that help your baby prevent and fight off illness.</li>\r\n</ul>\r\n<p></p>\r\n<div id="left">\r\n<img src="./img/babyeat.jpg" id="eat">\r\n<p>At about 6 months, most babies are ready for solid foods. \r\nAlong with other foods, you can continue to breastfeed as long as it is comfortable for you and your baby, even well into the toddler years.</p>\r\n\r\n<p>You’ll know baby is ready to start other foods when they can sit up without support, lean forward, and have good control of their neck muscles.  They are able to pick up food and try to put it in their mouth.</p>\r\n\r\n<p>Remember that all babies are different. Some babies may be ready a few weeks before or just after 6 months. However, waiting after 6 months to introduce other foods increases your baby’s risk of iron deficiency.</p></div>'),
	(4, 'Shop', 'shop', '        <div id="img-memberonly">\r\n            <img src="./img/memberonly.jpg">\r\n            </div>\r\n            <div id="txt-memberonly">\r\n            <h2>OOPS!</h2>\r\n            <p>Member only area, please <a href="?p=login">signup or login</a></p>\r\n        </div>'),
	(5, 'About', 'about', '  <p>\r\n  This is an assignment for course W11 of Web and Desktop development @\r\n  Heritage College.\r\n  </p>\r\n  <p>It\'s written in PHP with Mariadb Database</p>\r\n  <p>Features on the website:</p>\r\n  <ul>\r\n    <li>Shop is only available to login users.</li>\r\n    <li>SignUp and username is unique.</li>\r\n    <li>SignUp will return result of success or failure</li>\r\n    <li>User login can choose to remember me</li>\r\n    <li>Without remember me the cookie is for the current session</li>\r\n    <li>Remember me will set the cookie to expire in one day</li>\r\n    <li>Login user will see a "Welcome" username on right side of nav bar with logtout icon</li>\r\n    <li>Logout will remove cookies</li>\r\n    <li>any non-exist index.php?p= attempt will result a 404 page</li>\r\n  </ul>'),
	(6, 'Error 404', '404', '<div id="img404">\r\n<img src="./img/404ERROR.png">\r\n</div>\r\n<div id="txt404">\r\n<h2>404 PAGE NOT FOUND</h2>\r\n<p>I swear I only eat my food not your page.</p>\r\n</div>\r\n'),
	(7, 'Contact', 'contact', '<div id="img-contact">\r\n            <img src="./img/contact.jpg">\r\n            </div>\r\n            <div id="txt-contact">\r\n            <h2>Contact Us</h2>\r\n            <p>You can always find us on the Web.</p>\r\n        </div>'),
	(8, 'SignUp / Login', 'login', '     <div id="register">\r\n        <div class="form"><h2>Create your account</h2></div>\r\n        <form action="./includes/register.php" method="post">\r\n          <div class="form">\r\n            <label for="username">username</label>\r\n            <span><input type="text" name="username" /></span>\r\n          </div>\r\n          <div class="form">\r\n            <label for="password">password</label>\r\n            <span><input type="password" name="password" /></span>\r\n          </div>\r\n          <div class="form">\r\n            <span></span>\r\n            <input id="register-btn" type="submit" value="signup" name="register" />\r\n          </div>\r\n        </form>\r\n      </div>\r\n      <div id="login">\r\n        <div class="form"><h2>Login</h2></div>\r\n        <form action="./includes/login.php" method="post">\r\n        <div class="form">\r\n          <label for="username">username</label>\r\n          <span><input type="text" name="username" /></span>\r\n        </div>\r\n        <div class="form">\r\n          <label for="password" name="password">password</label>\r\n          <span><input type="password" name="password" /></span>\r\n        </div>\r\n        <div class="form">\r\n          <span><input type="checkbox" name="remember" value="remember" />remember me</span>\r\n          <input id="login-btn" type="submit" value="login" name="login" />\r\n        </div>\r\n      </div>'),
	(9, 'Account Creation Success', 'success', '<div id="img-success">\r\n            <img src="./img/success.jpg">\r\n            </div>\r\n            <div id="txt-success">\r\n            <h2>Congratulation!</h2>\r\n            <p>You are now a prestige member of <em>Itsy Bitsy Baby Nutrition</em>.</p>\r\n            <p>An email is sent to you with your login details and your membership benefit.</p>\r\n        </div>'),
	(10, 'Account Creation Fail', 'fail', ' <div id="img-fail">\r\n            <img src="./img/fail.jpg">\r\n            </div>\r\n            <div id="txt-fail">\r\n            <h2>OOPS!</h2>\r\n            <p>We work so hard to avoid displaying this page, but unforturnately something went wrong in the registration process.</p>\r\n            <p>Error: <em>The username already exists.</em></p>\r\n            <p>Please try again.</p>\r\n        </div>');
/*!40000 ALTER TABLE `page` ENABLE KEYS */;

-- Dumping structure for table w11_assignment_ChengTao.product
DROP TABLE IF EXISTS `product`;
CREATE TABLE IF NOT EXISTS `product` (
  `productId` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `productName` varchar(128) NOT NULL,
  `productPrice` decimal(8,2) unsigned NOT NULL,
  `productImg` varchar(512) NOT NULL,
  `productCat` varchar(128) NOT NULL,
  PRIMARY KEY (`productId`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4;

-- Dumping data for table w11_assignment_ChengTao.product: ~8 rows (approximately)
/*!40000 ALTER TABLE `product` DISABLE KEYS */;
INSERT INTO `product` (`productId`, `productName`, `productPrice`, `productImg`, `productCat`) VALUES
	(1, 'Superblends: Bananas, Carrots, Mangoes, Coconut', 23.99, './img/lc-01.jpg', 'LC'),
	(2, 'Brekky Blends: Mangoes, Strawberries & Ginger', 23.99, './img/lc-02.png', 'LC'),
	(3, 'Superblends: Apples & Mangoes', 19.99, './img/lc-03.jpg', 'LC'),
	(4, 'Superblends: Apples, Spinach, Kiwi & Broccoli', 17.99, './img/lc-04.jpg', 'LC'),
	(5, 'Juicy pear & garden greens', 12.99, './img/bg-01.png', 'BG'),
	(6, 'Apple sweet potato & berries', 12.99, './img/bg-02.png', 'BG'),
	(7, 'Banana fig oatmeal', 12.99, './img/bg-03.png', 'BG'),
	(8, 'Roasted squash & fruit', 12.99, './img/bg-04.png', 'BG');
/*!40000 ALTER TABLE `product` ENABLE KEYS */;

-- Dumping structure for table w11_assignment_ChengTao.user
DROP TABLE IF EXISTS `user`;
CREATE TABLE IF NOT EXISTS `user` (
  `userId` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `username` varchar(128) NOT NULL,
  `passHash` varchar(256) NOT NULL,
  `cookieHash` varchar(256) DEFAULT NULL,
  PRIMARY KEY (`userId`),
  UNIQUE KEY `username` (`username`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4;

-- Dumping data for table w11_assignment_ChengTao.user: ~3 rows (approximately)
/*!40000 ALTER TABLE `user` DISABLE KEYS */;
INSERT INTO `user` (`userId`, `username`, `passHash`, `cookieHash`) VALUES
	(4, 'Ethan', '$2y$10$EDnxi1ihQx5ITOJbZlFWpeQyk0XWPxsaJ0HnJQT27TqFzW6ouvYlS', '$2y$10$.yAR3wJ/ZU84N0/2fG0dmuopVAarC3ApmGb5Uwv4PGrEU0JQ.P4bC');
/*!40000 ALTER TABLE `user` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;

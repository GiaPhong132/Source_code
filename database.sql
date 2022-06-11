DROP database IF EXISTS webb;
CREATE DATABASE webb;
USE webb;


CREATE TABLE `PRODUCT` (
  `id` int AUTO_INCREMENT,
  `price` int  DEFAULT NULL,
  `name` varchar(255)  DEFAULT NULL,
  `description` varchar(1000) DEFAULT NULL,
  `content` varchar(10000)  DEFAULT NULL,
  `img` varchar(255)  DEFAULT NULL,
  primary key (id)
);

CREATE TABLE `NEWS` (
  `id` int AUTO_INCREMENT,
  `status` boolean DEFAULT NULL,
  `date` datetime  DEFAULT NULL,
  `description` varchar(1000) DEFAULT NULL,
  `content` varchar(10000)  DEFAULT NULL,
  `title` varchar(255)  DEFAULT NULL,
  primary key (id)
) ;

CREATE TABLE `USER` (
  `email` varchar(255) ,
  `profile_photo` varchar(255) DEFAULT NULL,
  `fname` varchar(255) DEFAULT NULL,
  `lname` varchar(255) DEFAULT NULL,
  `gender` boolean DEFAULT NULL,
  `age` int default null,
  `phone` varchar(10) DEFAULT NULL,
  `createAt` datetime DEFAULT NULL,
  `updateAt` datetime DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  primary key (email)
) ;

CREATE TABLE `COMMENT` (
  `id` int AUTO_INCREMENT,
  `date` datetime DEFAULT NULL,
  `approved` BOOLEAN,
  `content` varchar(10000),
  `news_id` int,
  `user_id` varchar(255),
  `parent` int DEFAULT NULL,
  primary key (id),
  foreign key(news_id) references NEWS(id) ON DELETE CASCADE ON UPDATE CASCADE,
  foreign key(user_id) references USER(email) ON DELETE CASCADE ON UPDATE CASCADE
);

ALTER TABLE `COMMENT`
ADD foreign key (parent) references COMMENT(id) ON DELETE CASCADE ON UPDATE CASCADE;

CREATE TABLE `ADMIN` (
  `username` varchar(255),
  `password` varchar(255) DEFAULT NULL,
  `createAt` datetime DEFAULT NULL,
  `updateAt` datetime DEFAULT NULL,
  primary key (username)
);

CREATE TABLE `COMPANY` (
  `id` int AUTO_INCREMENT,
	`name` varchar(255),
  `address` varchar(1000) DEFAULT NULL,
  `createAt` datetime DEFAULT NULL,
  `updateAt` datetime DEFAULT NULL,
  primary key(id)
);


-- Example data
INSERT INTO `ADMIN` (username, password) VALUES ('admin', '');
INSERT INTO `ADMIN` (username, password) VALUES ('username', '');

INSERT INTO `USER` (email, fname, lname, gender, age, phone, password)
VALUES ('admin@hcmut.edu.vn', 'Nguyen Van', 'A', 1, 15, '0123456789', '');
INSERT INTO `USER` (email, fname, lname, gender, age, phone, password)
VALUES ('user@hcmut.edu.vn', 'Nguyen Van', 'B', 0, 30, '0123456789', '');

INSERT INTO `PRODUCT` (name, price, description, content)
VALUES ('Chè thập cẩm', 25000, 'Chè rất ngon', 'Đây là một món chè tươi ngon bổ dưỡng');
INSERT INTO `PRODUCT` (name, price, description, content)
VALUES ('Chè Huế', 25000, 'Chè rất ngon', 'Đây là một món chè đến từ Huế');

INSERT INTO `NEWS` (status, date, title, description, content)
VALUES (1, '2021-11-11', 'Ca nhiễm tăng, TP.HCM kiểm soát di biến động dân cư ra sao?',
'TTO - TP.HCM không lập lại các chốt kiểm soát để kiểm tra di biến động dân cư như trước đây. Tuy vậy người dân từ các tỉnh thành đến TP.HCM sẽ phải đăng ký tạm trú tạm vắng để địa phương có biện pháp kiểm soát.',
'UBND TP.HCM yêu cầu tăng cường kiểm soát chặt chẽ di biến động dân cư. Các địa phương phải nắm chắc tình hình người dân khi ra, vào địa bàn, người có nguy cơ đang lưu trú, làm việc tại các địa phương, doanh nghiệp như lái xe, phụ xe liên tỉnh, người làm việc ngoài tỉnh về địa phương lưu trú… Từ đó sẽ chủ động các biện pháp quản lý phù hợp.
Tuy nhiên trước chủ trương này của thành phố, nhiều người dân bày tỏ sự băn khoăn, không biết liệu thành phố có lập lại các chốt kiểm soát và cần phải chuẩn bị những thủ tục gì khi đến TP.HCM.
Trao đổi về vấn đề này, thượng tá Lê Mạnh Hà - phó trưởng Phòng tham mưu Công an TP.HCM - cho biết TP.HCM không lập lại các chốt kiểm soát để kiểm tra di biến động dân cư như trước đây.
Theo thượng tá Hà, biến động dân cư được hiểu là sự thay đổi về dân cư, thường trú, tạm trú, không phải là lực lượng chức năng kiểm soát người dân đi lại ở các chốt.
Hiện nay Công an TP.HCM đang thực hiện các công tác quản lý di biến động dân cư như: đăng ký thường trú, tạm trú, rà soát hộ khẩu, những ai có mặt thực tế ở địa phương. Công an TP cũng đang rà soát, đối sánh các dữ liệu dân cư, cấp mã số định danh cá nhân.
Bên cạnh đó ngành công an cũng đang kiểm tra diện thường trú, tạm trú, những người đang lưu trú ở khách sạn, nhà nghỉ... khai báo để quản lý chặt chẽ và thực hiện các chính sách an sinh xã hội.');
INSERT INTO `NEWS` (status, date, title, description, content)
VALUES (1, '2021-11-11', '50% ca tử vong ở TP.HCM chưa tiêm vắc xin, thành phố đang "đánh chặn" số ca chuyển nặng',
'TTO - Với việc ban hành hướng dẫn gói chăm sóc sức khỏe cho F0 cách ly tại nhà phiên bản 1.6, ngành y tế TP.HCM cho thấy quyết tâm tập trung "đánh chặn từ xa" bằng việc kiểm soát F0 cách ly tại cộng đồng không để trở nặng.',
'Không phải F0 nào cũng cách ly tại nhà
Theo thống kê, trong tổng số ca F0 hiện tại có khoảng 70% trường hợp có triệu chứng nhẹ, hoặc không có triệu chứng đang được cách ly chăm sóc tại nhà hoặc khu cách ly tập trung. Làm gì để giảm số ca mắc chuyển nặng? Hướng dẫn mới nhất từ TP.HCM được "chi tiết hóa" từ phân loại người F0 nào được cách ly ở nhà; chăm sóc ra sao; nên và không nên làm gì; dấu hiệu cần báo ngay cho y tế và kê đơn, cấp cứu F0 tại nhà...
Hướng dẫn lần này quy định rõ hơn về đối tượng được chăm sóc tại nhà khi đảm bảo đủ 2 điều kiện bao gồm không triệu chứng hoặc triệu chứng nhẹ (không có suy hô hấp SpO2 lớn hơn hoặc bằng 96% khi thở khí trời, nhịp thở bằng hoặc dưới 20 lần/phút). Chỉ những F0 có độ tuổi từ 1 - 50 tuổi, không có bệnh nền, không đang mang thai, không béo phì mới được cách ly ở nhà.
Ngoài ra quy định này chỉ cho phép một số trường hợp không thỏa các điều kiện nêu trên có thể xem xét cách ly ở nhà nếu có bệnh nền ổn định, bảo đảm tiêm đủ 2 mũi vắc xin hoặc sau 14 ngày kể từ ngày tiêm mũi đầu tiên.
TP Thủ Đức (TP.HCM) là một trong các địa phương được ghi nhận có số ca mắc tăng nhanh gần đây. Ông Nguyễn Văn Chức - giám đốc Trung tâm Y tế TP Thủ Đức - cho biết để "đánh chặn từ xa", ngoài 32 trạm y tế cố định, các trạm y tế lưu động, các phường triển khai tổ y tế lưu động đến từng khu phố (trước đây là phường) để kịp thời xử lý các ca F0 chuyển nặng. "Tổ lưu động của từng khu phố khá đông, bao gồm đủ các ban ngành từ y tế, đoàn thanh niên, dân quân, giáo dục, thành ra việc phản ứng và tiếp cận sẽ được gần người dân hơn" - ông Chức nói.');

INSERT INTO `COMMENT` (news_id, user_id, date, approved, content)
VALUES (1, 'admin@hcmut.edu.vn', '2021-12-12', 1, 'Bất ngờ quá');
INSERT INTO `COMMENT` (news_id, user_id, date, approved, content)
VALUES (1, 'admin@hcmut.edu.vn', '2021-12-12', 1, 'Bất ngờ quá');
INSERT INTO `COMMENT` (news_id, user_id, date, approved, content)
VALUES (2, 'user@hcmut.edu.vn', '2021-12-12', 0, 'Không thể tin được');

INSERT INTO `COMPANY` (name, address)
VALUES ('Chi nhánh TPHCM', '268 Lý Thường Kiệt, Phường 14, Quận 10, TPHCM');
INSERT INTO `COMPANY` (name, address)
VALUES ('Chi nhánh Hà Nội', 'Hà Nội');
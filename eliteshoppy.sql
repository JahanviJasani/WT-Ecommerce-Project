-- CREATE main db
CREATE DATABASE eliteshoppy;

USE eliteshoppy;
-- CREATE main products table
CREATE TABLE users (
	user_id int(8) PRIMARY KEY AUTO_INCREMENT,
	first_name varchar(50) NOT NULL,
	last_name varchar(50),
	email varchar(50) UNIQUE,
	password varchar(200),
	mobile varchar(15) UNIQUE,
	address varchar(500),
	zip varchar(10),
	city varchar(50),
	state varchar(50),
	user_type int(2)
)
ENGINE=INNODB;

CREATE TABLE seller(
	seller_id int(8) PRIMARY KEY AUTO_INCREMENT,
	user_id int(8),
	FOREIGN KEY (user_id) REFERENCES users(user_id) ON DELETE CASCADE ON UPDATE CASCADE,
	account_num varchar(50) UNIQUE,
	bank_name varchar(50),
	ifsc varchar(50),
	balance varchar(50),
	paid_amt varchar(50)
)
ENGINE=INNODB;

CREATE TABLE product (
	product_id int(8) PRIMARY KEY AUTO_INCREMENT,
	name varchar(250) NOT NULL,
	product_description varchar(4500) NOT NULL,
	brand varchar(250) NOT NULL,
	category varchar(250) NOT NULL,		-- consider using 0,1,2 for footwear, watches, bags
	price float(10,2) NOT NULL,
	colour varchar(250) NOT NULL,
	seller_id int(8) NOT NULL,
	gender varchar(10) NOT NULL,
	FOREIGN KEY (seller_id) REFERENCES seller(seller_id) ON DELETE CASCADE ON UPDATE CASCADE
)
ENGINE=INNODB;

-- CREATE table for storing image links

CREATE TABLE images (
	image_id int(8) PRIMARY KEY AUTO_INCREMENT,
	product_id int(8) NOT NULL,
	image_location varchar(250),
	FOREIGN KEY (product_id) REFERENCES product(product_id) ON DELETE CASCADE ON UPDATE CASCADE
)
ENGINE=INNODB;

CREATE TABLE bags (
	product_id int(8) NOT NULL,
	bag_id int(8) PRIMARY KEY AUTO_INCREMENT,
	stock int(5) NOT NULL,
	bag_capacity float(5,2),
	length float(5,2),
	height float(5,2),
	width float(5,2),
	material varchar(250),
	weight float(5,2),
	subcategory varchar(25) NOT NULL,
	FOREIGN KEY (product_id) REFERENCES product(product_id) ON DELETE CASCADE ON UPDATE CASCADE
)
ENGINE=INNODB;

CREATE TABLE watches (
	product_id int(8) NOT NULL,
	watch_id int(8) PRIMARY KEY AUTO_INCREMENT,
	stock int(5) NOT NULL,
	clasp_type varchar(250),
	case_shape varchar(250),
	display_type varchar(250),
	dial_colour varchar(250),
	case_material varchar(250),
	band_material varchar(250),
	FOREIGN KEY (product_id) REFERENCES product(product_id) ON DELETE CASCADE ON UPDATE CASCADE
)
ENGINE=INNODB;

CREATE TABLE footwear (
	product_id int(8) NOT NULL,
	footwear_id int(8) PRIMARY KEY AUTO_INCREMENT,
	material varchar(250),
	subcategory varchar(25) NOT NULL,
	FOREIGN KEY (product_id) REFERENCES product(product_id) ON DELETE CASCADE ON UPDATE CASCADE
)
ENGINE=INNODB;

-- Multivalued attribute table for shoe sizes and stock

CREATE TABLE footwear_size (
	footwear_id int(8),
	footwear_size int(2) NOT NULL,
	stock int(5) NOT NULL,
	FOREIGN KEY (footwear_id) REFERENCES footwear(footwear_id) ON DELETE CASCADE ON UPDATE CASCADE,
	PRIMARY KEY(footwear_id, footwear_size)
)
ENGINE=INNODB;

CREATE TABLE cart(
	user_id int(8),
	product_id int(8),
	qty int(8),
	FOREIGN KEY (user_id) REFERENCES users(user_id) ON DELETE CASCADE ON UPDATE CASCADE,
	FOREIGN KEY (product_id) REFERENCES product(product_id) ON DELETE CASCADE ON UPDATE CASCADE,
	PRIMARY KEY(user_id,product_id)
)
ENGINE=INNODB;

CREATE TABLE orders(
	order_id int(8) PRIMARY KEY AUTO_INCREMENT,
	user_id int(8) NOT NULL,
	date varchar(10),
	total int(10),
	payment_method int(3),
	FOREIGN KEY (user_id) REFERENCES users(user_id) ON DELETE CASCADE ON UPDATE CASCADE
)
ENGINE=INNODB;

CREATE TABLE sub_order(
	order_id int(8),
	product_id int(8),
	sub_order_id int(8),
	status int(8),
	quantity int(8),
	subtotal int(8),
	FOREIGN KEY (order_id) REFERENCES orders(order_id) ON DELETE CASCADE ON UPDATE CASCADE,
	FOREIGN KEY (product_id) REFERENCES product(product_id) ON DELETE CASCADE ON UPDATE CASCADE,
	PRIMARY KEY(order_id,sub_order_id)
)
ENGINE = INNODB;

CREATE TABLE transaction(
	order_id int(8),
	transaction_id int(8) PRIMARY KEY,
	payment_status varchar(1000),
	amount float(10,2),
    FOREIGN KEY (order_id) REFERENCES orders(order_id) ON DELETE CASCADE ON UPDATE CASCADE
)
ENGINE=INNODB;



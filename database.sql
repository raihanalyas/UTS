CREATE TABLE category(
	cat_id INT(11) NOT NULL AUTO_INCREMENT,
	cat_name VARCHAR(100),
	cat_text VARCHAR(100),
	PRIMARY KEY (cat_id)
);

CREATE TABLE post (
	post_id INT(11) NOT NULL AUTO_INCREMENT,
	post_cat_id INT(11) NOT NULL,
	post_date date,
	post_slug VARCHAR(25),
	post_tittle VARCHAR(100),
	post_text text,
	PRIMARY KEY (post_id),
	FOREIGN KEY(post_cat_id) REFERENCES category(cat_id)
);

CREATE TABLE photos (
	pho_id INT(11) NOT NULL AUTO_INCREMENT,
	pho_post_id INT(11) NOT NULL,
	pho_date date,
	pho_tittle VARCHAR(100),
	pho_text VARCHAR(100),
	gambar VARCHAR(100),
	PRIMARY KEY(pho_id),
	FOREIGN KEY(pho_post_id) REFERENCES post (post_id)
);

CREATE TABLE album (
	album_id INT(11) NOT NULL AUTO_INCREMENT,
	album_pho_id INT(11) NOT NULL,
	album_name VARCHAR(100),
	album_text VARCHAR(100),
	PRIMARY KEY (album_id),
	FOREIGN KEY(album_pho_id) REFERENCES photos (pho_id)
);

create table user(
	user_id int (5) NOT NULL AUTO_INCREMENT,
	user_name varchar(128),
	username varchar(50),
	password varchar(40),
	primary key(user_id)
);

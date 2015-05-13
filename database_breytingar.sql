DELETE FROM users;

INSERT INTO categories (categoryName) values
('Animals'),
('Artistic'),
('City'),
('Films'),
('Games'),
('Nature'),
('Space'),
('Other')

SELECT * FROM users;

ALTER TABLE images
ADD uploaderName varchar(15);

ALTER TABLE images
ADD uploadDate TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP;


drop procedure NewImage;
delimiter $$
create procedure NewImage(image_name varchar(45),image_path varchar(255),image_text varchar(155),category_id int, uploader_name varchar(15))
begin
	insert into Images(imageName,imagePath,imageText,categoryID,uploaderName)
    values(image_name,image_path,image_text,category_id,uploader_name);
end$$
delimiter ;
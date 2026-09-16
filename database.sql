-- use the existing database
DROP DATABASE IF EXISTS kuma_ramen;
CREATE DATABASE kuma_ramen;
USE kuma_ramen;  -- MySQL command

-- create the menu table
CREATE TABLE menu (
  RamenID INT(11) NOT NULL AUTO_INCREMENT,
  RamenName VARCHAR(255) NOT NULL,
  price DECIMAL(5,2) NOT NULL,
  rating DECIMAL(2,1) NOT NULL,
  PRIMARY KEY (RamenID)
);

-- insert sample ramen menu data
INSERT INTO menu (RamenName, price, rating) VALUES
('Tonkotsu Ramen', 12.99, 4.8),
('Shoyu Ramen', 11.49, 4.5),
('Miso Ramen', 11.99, 4.6),
('Shio Ramen', 10.99, 4.3),
('Spicy Tantanmen', 13.49, 4.7);

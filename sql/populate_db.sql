INSERT INTO activities(name, description) VALUES ("Pottery", "Making pottery");
INSERT INTO campsites(name, campsite_address_id, office_address_id, phone) VALUES ("MyCampsite", 1, 2, "1234567890");
INSERT INTO addresses(address_1, city, state, zip) VALUES ('500 El Camino Real', 'Santa Clara', 'California', 95053);
INSERT INTO addresses(address_1, city, state,  zip) VALUES ('1234 First Street', 'Santa Clara', 'California', 95050);

INSERT INTO campsites(name, campsite_address_id, office_address_id, phone) VALUES ("Second Campsite", 1, 2, "2345678901");

INSERT INTO camp_sessions(campsite_id, start_date, end_date) VALUES (1, "2016-06-01", "2016-06-08");

INSERT INTO questions (question, answer) VALUES ("How many camp locations are there?", "There are 8 camp locations.");
INSERT INTO questions (question, answer) VALUES ("How many sessions are there?", "Each campsite location has between 4 and 8 camp sessions.");

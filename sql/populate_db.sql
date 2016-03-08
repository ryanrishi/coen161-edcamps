INSERT INTO activities(name, description) VALUES ("Pottery", "Making pottery");
INSERT INTO activities(name, description) VALUES ("3D Printing", "Print a 3D object of choice");
INSERT INTO activities(name, description) VALUES ("Swimming", "Swim at nearby lakes and waterparks");
INSERT INTO activities(name, description) VALUES ("Hiking", "Hike nearby peaks");
INSERT INTO activities(name, description) VALUES ("Soccer", "Play soccer");
INSERT INTO activities(name, description) VALUES ("Programming", "Learn basic coding languages");

INSERT INTO campsites(name, campsite_address_id, office_address_id, phone) VALUES ("MyCampsite", 1, 2, "1234567890");
INSERT INTO addresses(address_1, city, state, zip) VALUES ('500 El Camino Real', 'Santa Clara', 'California', 95053);
INSERT INTO addresses(address_1, city, state,  zip) VALUES ('1234 First Street', 'Santa Clara', 'California', 95050);

INSERT INTO campsites(name, campsite_address_id, office_address_id, phone) VALUES ("Second Campsite", 1, 2, "2345678901");

INSERT INTO camp_sessions(campsite_id, start_date, end_date) VALUES (1, "2016-06-01", "2016-06-08");

INSERT INTO questions (question, answer) VALUES ("How many camp locations are there?", "There are 5 camp locations.");
INSERT INTO questions (question, answer) VALUES ("How many sessions are there?", "Each campsite location has between 4 and 8 camp sessions.");
INSERT INTO questions (question, answer) VALUES ("What is the deadline for signing up for a session?", "You can sign up as long as there is space available.");
INSERT INTO questions (question, answer) VALUES ("Are there vegetarian options for lunch?", "Yes your child may request a vegetarian option for lunch.");
INSERT INTO questions (question, answer) VALUES ("What happens if the session I want is already full?", "You may join our waitlist for this session free of charge. Just call 800-222-3443.");
INSERT INTO questions (question, answer) VALUES ("Will I receive a refund if I cancel my child's enrollment?", "You will receive a full refund up to 2 weeks before the camp. After this, you will only receive a refund of $120.");

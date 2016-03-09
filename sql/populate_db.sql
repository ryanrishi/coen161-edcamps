INSERT INTO activities (name, description) VALUES ("Pottery", "Making pottery");
INSERT INTO activities (name, description) VALUES ("3D Printing", "Print a 3D object of choice");
INSERT INTO activities (name, description) VALUES ("Swimming", "Swim at nearby lakes and waterparks");
INSERT INTO activities (name, description) VALUES ("Hiking", "Hike nearby peaks");
INSERT INTO activities (name, description) VALUES ("Soccer", "Play soccer");
INSERT INTO activities (name, description) VALUES ("Programming", "Learn basic coding languages");

INSERT INTO campsites (name, campsite_address_id, office_address_id, phone) VALUES ("MyCampsite", 1, 2, "1234567890");
INSERT INTO addresses (address_1, city, state, zip) VALUES ('500 El Camino Real', 'Santa Clara', 'California', 95053);
INSERT INTO addresses (address_1, city, state,  zip) VALUES ('1234 First Street', 'Santa Clara', 'California', 95050);

INSERT INTO campsites (name, campsite_address_id, office_address_id, phone) VALUES ("Second Campsite", 1, 2, "2345678901");

INSERT INTO camp_sessions (campsite_id, start_date, end_date) VALUES (1, "2016-06-06", "2016-06-17");
INSERT INTO camp_sessions (campsite_id, start_date, end_date) VALUES (2, "2016-06-20", "2016-07-01");
INSERT INTO camp_sessions (campsite_id, start_date, end_date) VALUES (3, "2016-07-04", "2016-07-15");
INSERT INTO camp_sessions (campsite_id, start_date, end_date) VALUES (4, "2016-07-18", "2016-07-29");
INSERT INTO camp_sessions (campsite_id, start_date, end_date) VALUES (5, "2016-08-01", "2016-08-12");
INSERT INTO camp_sessions (campsite_id, start_date, end_date) VALUES (6, "2016-08-15", "2016-08-26");
# These were generated using fakenamegenerator.com
INSERT INTO users (first_name, last_name, email, phone) VALUES ("Richard", "McDonald", "RichardSMcDonald@inbound.plus", 5087431076);
INSERT INTO users (first_name, last_name, email, phone) VALUES ("Delbert", "Ratliff", "DelbertCRatliff@inbound.plu", 9078481843);
INSERT INTO users (first_name, last_name, email, phone) VALUES ("Damien", "Greene", "DamienJGreene@inbound.plus", 9738993281);
INSERT INTO users (first_name, last_name, email, phone) VALUES ("Bryant", "Acosta", "BryantMAcosta@inbound.plus", 4692616278);
INSERT INTO users (first_name, last_name, email, phone) VALUES ("Katherine", "Rodrigue", "KatherineCRodrigue@inbound.plus", 5182139482);
INSERT INTO users (first_name, last_name, email, phone) VALUES ("Chad", "Carson", "ChadJCarson@inbound.plus", 7635252355);


INSERT INTO questions (question, answer) VALUES ("How many camp locations are there?", "There are 5 camp locations.");
INSERT INTO questions (question, answer) VALUES ("How many sessions are there?", "Each campsite location has between 4 and 8 camp sessions.");
INSERT INTO questions (question, answer) VALUES ("What is the deadline for signing up for a session?", "You can sign up as long as there is space available.");
INSERT INTO questions (question, answer) VALUES ("Are there vegetarian options for lunch?", "Yes your child may request a vegetarian option for lunch.");
INSERT INTO questions (question, answer) VALUES ("What happens if the session I want is already full?", "You may join our waitlist for this session free of charge. Just call 800-222-3443.");
INSERT INTO questions (question, answer) VALUES ("Will I receive a refund if I cancel my child's enrollment?", "You will receive a full refund up to 2 weeks before the camp. After this, you will only receive a refund of $120.");

INSERT INTO inventory (name, price, remaining) VALUES ("Sweatshirt", 20.00, 50);
INSERT INTO inventory (name, price, remaining) VALUES ("Water Bottle", 10.00, 30);
INSERT INTO inventory (name, price, remaining) VALUES ("Sticker", 3.00, 0);
INSERT INTO inventory (name, price, remaining) VALUES ("T-Shirt", 15.00, 20);

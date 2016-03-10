INSERT INTO activities (name, description) VALUES ("Pottery", "Making pottery");
INSERT INTO activities (name, description) VALUES ("3D Printing", "Print a 3D object of choice");
INSERT INTO activities (name, description) VALUES ("Swimming", "Swim at nearby lakes and waterparks");
INSERT INTO activities (name, description) VALUES ("Hiking", "Hike nearby peaks");
INSERT INTO activities (name, description) VALUES ("Soccer", "Play soccer");
INSERT INTO activities (name, description) VALUES ("Programming", "Learn basic coding languages");
INSERT INTO activities (name, description) VALUES ("Robotics", "Learn how to build a robot from scratch");
INSERT INTO activities (name, description) VALUES ("Tennis", "Tennis lessons available for all levels");
INSERT INTO activities (name, description) VALUES ("Kayaking", "Kayak and race against your friends");
INSERT INTO activities (name, description) VALUES ("Basketball", "Join a team for our basketball tournament");
INSERT INTO activities (name, description) VALUES ("Pre-programming", "Learn math programming foundations");
INSERT INTO activities (name, description) VALUES ("Rock climbing", "Join us as attend a rock climbing gym");
INSERT INTO activities (name, description) VALUES ("Baseball", "Baseball and softball tournaments");
INSERT INTO activities (name, description) VALUES ("Biking", "Mountain biking");
INSERT INTO activities (name, description) VALUES ("Zoo", "Spend the day enjoying the zoo");
INSERT INTO activities (name, description) VALUES ("Horseback riding", "Horseback riding on forest trails");
INSERT INTO activities (name, description) VALUES ("Frisbee golf", "Frisbee golf at the park");
INSERT INTO activities (name, description) VALUES ("Drawing", "Drawing and painting lessons");

INSERT INTO campsites (name, campsite_address_id, office_address_id, phone) VALUES ("MyCampsite", 1, 2, "1234567890");
INSERT INTO addresses (address_1, city, state, zip) VALUES ('500 El Camino Real', 'Santa Clara', 'California', 95053);
INSERT INTO addresses (address_1, city, state,  zip) VALUES ('1234 First Street', 'Santa Clara', 'California', 95050);
INSERT INTO addresses (address_1, city, state,  zip) VALUES ('710 Vari Court', 'San Jose', 'California', 95051);
INSERT INTO addresses (address_1, city, state,  zip) VALUES ('222 Saratoga Ave', 'Mountain View', 'California', 94035);
INSERT INTO addresses (address_1, city, state,  zip) VALUES ('12 Mckenzie Street', 'Palo Alto', 'California', 94301);
INSERT INTO addresses (address_1, city, state,  zip) VALUES ('99 Tempview Drive', 'Sunnyvale', 'California', 94085);

INSERT INTO campsites (name, campsite_address_id, office_address_id, phone) VALUES ("Second Campsite", 1, 2, "2345678901");

INSERT INTO camp_sessions (campsite_id, start_date, end_date, base_price) VALUES (1, "2016-06-06", "2016-06-17", 800.00);
INSERT INTO camp_sessions (campsite_id, start_date, end_date, base_price) VALUES (2, "2016-06-20", "2016-07-01", 650.00);
INSERT INTO camp_sessions (campsite_id, start_date, end_date, base_price) VALUES (3, "2016-07-04", "2016-07-15", 450.00);
INSERT INTO camp_sessions (campsite_id, start_date, end_date, base_price) VALUES (4, "2016-07-18", "2016-07-29", 720.00);
INSERT INTO camp_sessions (campsite_id, start_date, end_date, base_price) VALUES (5, "2016-08-01", "2016-08-12", 650.00);
INSERT INTO camp_sessions (campsite_id, start_date, end_date, base_price) VALUES (6, "2016-08-15", "2016-08-26", 580.00);

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

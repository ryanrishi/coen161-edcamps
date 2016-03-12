# coen161-edcamps
### About
This is the final project for my web programming class. It is a website for an educational summer camp called EdCamps.
Most of the data is stored in a database, which makes it easy to add and remove different components of our camp.
This was not a requirement for the project, but this exercises good practice and this is how it would likely be done in
a production environment.

### Registration
The registration form allows parents to register their child for camp. There is client-side validation on dates, phone
numbers, and email addresses.

### Schedule
Parents are able to view their child's schedule. If they are logged in, they are able to access schedule.php and see
their child's schedule.

### Store
Anyone is able to purchase EdCamps items. They can view the items and add them to their cart. If the item is out of
stock, they are unable to add that item to their cart. If the user is logged in, they get a 15% discount on the store.

### Visualizations
The visualizations page displays information about enrollment statistics for the various campsites.

### Activities
The activities page shows the various activities we offer at our campsite. These are stored in the database.
In addition to the activities listed, we have two examples of the activities offered at the camp. The first one is a
15 piece puzzle, and the second one is a game of 3D pong. Both are accessible from activities.php.

### FAQ
In addition to the required pages, we made a Frequently Asked Questions page. Each question-answer pair is stored in the
database.

### Security
This is a web programming course, not a database/NetSec course. Passwords should NEVER be stored in the clear, so we
simulated a login button (all it does is set a session key that says that the user is logged in). When a user clicks the
button, it gets a random account from the users table in the database and pretends like that user is logged in.

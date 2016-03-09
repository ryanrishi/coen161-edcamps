# coen161-edcamps

### Security
This is a web programming course, not a database/NetSec course. Passwords should NEVER be stored in the clear, so we simulated a login button (all it does is set a session key that says that the user is logged in). When a user clicks the button, it gets a random account from the users table in the database and pretends like that user is logged in.

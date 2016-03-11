Design
===
```
EdCamps
├── About
│   ├── Mission
│   ├── Overview
│   └── Enrollment statistics (graphic) -- might move into registration page
├── Schedule
│   ├── calendar
│   │   ├── database tables
│   │   │   ├── campsites (site_id, site_name, site_address, site_phone)
│   │   │   └── activities (activity_id, activity_name, activity_description)
│   │   └── database relations: each campsite has an array (?) of activities
│   └── link to register (form)
├── Store
│   ├── database
│   │   ├── table: inventory (item_id, item_name, item_price, item_stock_remaining)
|   |   └── database relations: TBD
│   └── link to register
├── Forum
│   ├── database tables (needs to be designed more clearly)
│   │   ├── forum_posts (post_id, post_author_id, post_content)
│   │   ├── forum_threads (thread_id, thread_name, thread_category, thread_children)
│   │   └── users (user_id, user_name, user_email, user_signature, account_creation_date)
│   └── database relations: each post id relates to an author id
│       ├── each post_id relates to an user_id
│       ├── each thread_id has a list of children, which are forum_posts (post_id)
│       └── might need category table (for different thread topics)
├── Activities
│   └─ database tables
│      └─ activities (activity_id, activity_name, activity_description) (same as in calendar)
└── Register
    ├── database tables (needs to be designed more clearly)
    │   ├── forum_posts (post_id, post_author_id, post_content)
    │   ├── forum_threads (thread_id, thread_name, thread_category, thread_children)
    │   └── users (user_id, user_name, user_email, user_signature, account_creation_date)
    └── database relations: each post id relates to an author id
        ├── each post_id relates to an user_id
        ├── each thread_id has a list of children, which are forum_posts (post_id)
        └── might need category table (for different thread topics)
```

TODO
===
- ~~create database tables (Ryan)~~
- create content (activities, fake forum posts)
- create homepage (Jessie)
  - ~~site logo~~
  - age requirements
  - special instructions for children and parent_last
  - ~~map of locations~~
  - ~~philosophy~~
  - services
  - ~~locations~~
  - pictures
  - ~~webmaster contact info~~
- populate database (Jessie)
  - put image url for activities (image should be square)
  - ~~create more sessions (each campsite will have multiple sessions. sessions table should have ~40 rows (5 locations * 8 sessions))~~
  - ~~create more inventory~~
  - ~~find image urls for inventory and put in database~~
  - ~~create more campsites (~5 or so)~~
- schedule/registration (Ryan)
  - Applicant’s (child’s) full name
  - Date of birth
  - Parents name
  - Parent’s contact email and phone (unique and serve to identify the child’s records)
  - Grade level and school
  - Any special instructions, allergies etc.
  - Camp duration (1 week or 2 weeks)
  - Fee (should be automatically calculated based on the duration signed up for.
  - Payment information (payment by credit card)
  - validate a DOB isn't in the future
  - validate a CC expiration date isn't in the past
  - A confirmation should be displayed on successful registration. Once a child is registered for a camp, his or her parent can login (with the child’s name and email/phone) and view the details of his/her schedule.
  - ~~make DOB datepicker / find a datepicker library~~
  - JS form validation
  - credit card drop-in UI
  - ~~sessions and locations -- select a location, then select a session from a new dropdown~~
  - format DOB on server-side (register.php)
- store (Ryan)
  - store item images in database
  - ~create dummy inventory~
  - students signed up for camps get 15% discount
  - ~~add to cart --> checkout --> checkout~~
- activities
  - store activity image url in database
- schedule (on home page)
- visualization page
  - two graphs
- ~~~activity page~~~
  - ~~~games/puzzles~~~
- parent needs to be able to see children's registration info
- fake payments (and discounts on registration page)
- fix registration (even if it's a dummy script)
- register multiple children --> discount
- make visualizations dynamic (?)
- login / registration
- form validation (client-side and server-side)
- ~~ability to view child's schedule~~
- activities vary by campsite (?)
- put dummy campers in db
- put dummy registrations in db

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

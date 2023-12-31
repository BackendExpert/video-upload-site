# Video Uploading Site

# About

- This site is Video Uploading site like Youtube
- use languages 
- - PHP 
- - HTML
- - CSS
- - Javascript
- use Frameworks
- - bootstrap
- - jkcss (my own css framework)
- - - in here i ignore node_modules
- - - the [JKCSS](https://github.com/JKCSS-CSS-Framework/JKCSS-Framework) click to go to repo
- - - [JKCSS NPM](https://www.npmjs.com/package/@jehankandy/jkcss)


# Logins

### admin

- username: jehan
- password: 123

OR

- username: nimal
- password: 789

OR

- username: amara
- password: 741

### users

 - username: kamal
 - password: 456 

 OR

 - go to signup form and fill it and submit as new user

# IMPORTANT

 - Dont try to access admin.php or pages that can only access by admins because user account will be suspended


# Accessable Pages

## Admin

- admin.php
- admin
- - admin/add_admin.php
- - admin/loged_his.php

These files are protected from users by the `admin_access()` function

## User

- user.php

## User and Admin

- video
- - video/create.php
- index.php (after login) - on root folder

# Functions

## sign_up($username, $email, $pass, $cpass)

- If users fill the data in SignUp form and submit by clicking the SignUp button this function will call

- The user enterd data will be add to `user_tbl` table of the `video_site_db` database


## sign_in($username, $pass)

- If user fill the login form and submit by clicking the Login button this fuction will call

- - check the user is active and user is not suspended if user is suspended exit the function and display `User Account: Suspended...!` with the time

- -  if user is not suspended the check the `user_type` is user or admin and login to the dashborad accourding to the `user_type`

## view_name()

- this function for display the login user's name

## admin_access()

- this is the function for
- - if `user_type` = `user` try to access to the admin account the user will automatically suspended.

## user_access()

- This function for
- - the pages that access only `user_type` = `user` 

## go_back()

- This function for go back to dashboard according to `user_type`

## update_bio() AND update_channel_info()

- These function for check the user data and user channel data 
- - if empty
- - - print Update user data or update channel data

- - if not empty
- - - display the user data or channel data

## bio_add_db() AND chdata_add()

- These functions for
- - if user add user's bio to database this function `bio_add_db()` call add add user entered data to database
- - if user add Channel bio to database this function `chdata_add()` call add add user entered data to database


## view_user_bio() AND view_ch_data()

- These functions for
- - the user add user's bio by `bio_add_db()` to database before, and now that data will display using `view_user_bio()` function
- - the user add channel data by `chdata_add()` to database before, and now that data will display using `view_ch_data()` function

## new_admin_add()

- this function for
- - add new Admin user to system so it can do only for any admin users

## login_data()

- this function for
- - store login data and login time in database

## view_login_data()

- this function for
- - view data that stored using login_data() in database

## cout_all_users() , cout_admins() , cout_users() AND cout_users_suspended()

- these functions for
- - count all users
- - count admins
- - count users
- - count suspended users on the system

## view_my_channel()

- This function will display the all videos that user added to the system (Public and Private)

## add_new_video()

- This function will added new video to system and it will store on the database

## public_videos()

- This fuction shows the all public videos uploaded by current login user

## private_videos()

- This fuction shows the all private videos uploaded by current login user


# Releases

## Version 1.3.0 01 January 2024

- develop interfaces
- developing user admin dashborads
- functions



## Version 1.3.0-beta1 27 December 2023

- develop interfaces
- developing user admin dashborads
- functions
- - updating -> public_videos() 
- - private_videos()

## Version 1.3.0-beta1 27 December 2023

- develop interfaces
- developing user admin dashborads
- functions
- - view_my_channel()
- - add_new_video()
- - public_videos()


## Version 1.2.0 26 December 2023

- develop interfaces
- developing user admin dashborads
- functions
- - new_admin_add()
- - login_data()
- - view_login_data()
- - cout_all_users()
- - cout_admins()
- - cout_users()
- - cout_users_suspended()


## Version 1.1.0 25 December 2023

- develop interfaces
- developing user admin dashborads
- functions
- - user_access()
- - go_back()
- - view_user_bio()
- - view_ch_data()


## Version 1.0.0 24 December 2023

- develop interfaces
- developing user admin dashborads
- functions
- - admin_access()
- - update_bio()
- - update_channel_info()

## Version 1.0.0-alpha1 21 December 2023

- initial releases
- start the Project
- develop interfaces
- functions
- - sign_up()
- - sign_in()
- - view_name()

# Developers 

- Jehankandy

# Copyright and license

Copyright 2021–2023 JehanKandy. [video-upload-site](https://github.com/BackendExpert/video-upload-site) released under the [MIT License](https://github.com/BackendExpert/video-upload-site/blob/master/LICENSE)
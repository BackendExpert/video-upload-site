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

## update_bio() AND update_channel_info()

- These function for check the user data and user channel data 
- - if empty
- - - print Update user data or update channel data

- - if not empty
- - - display the user data or channel data

## bio_add_db

# Releases

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
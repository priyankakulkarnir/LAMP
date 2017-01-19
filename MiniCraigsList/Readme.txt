Login Details:

Username: lamp@gmail.com
Password: lamp

==================================================================================================================================================

Database details:

Database Name:"lamp_final_project"
User:"lamp"
Password:"1"

==================================================================================================================================================

lamp_final_project.sql is script containing all drop,create, alter and insert statements.
Script is in sql folder under project.
Images used are in images folder.

==================================================================================================================================================

Pages:

Once you start project index.php will open.

index.php has uservalidation. If user is logged in then index.php page will get load. If user is not logged in then login.php will get load.

If user is already registered he/she can login using login.php. If user is new then, user can signup. registernewuser.php accepts new user information and stores it to users table. On successful addition od user addnewuser.php page will get load which jas link to travel to login page.

On successful login user gets redirected tp index.php and if credentials doesn't match then it will display error message regarding that.

index.php has functions to search and browse. 
Search is based on title and description. In this case result will be displayed on search.php page.
Browse is based on category, subcategory, region and location. In this case result will be displayed on same page.

One can add new post using link "Add a New Post". It will redirect to assnewpost.php and then one can preview their post using preview button. On preview.php user has option to submit the post. 

On successful submission of post user can come back to home page from submitpost.php page.






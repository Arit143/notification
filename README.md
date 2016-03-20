#Wingify! Notifications

###WHAT IT NEEDS TO RUN

* APACHE
* PHP
* MYSQL
You need to/can download WAMP OR XAMP according to your choice.

For WAMPSERVER 2.5

You can either extract the ZIP or git clone in /www directory in WAMP

OR

Find all "/var/www" in httpd.conf in WAMP and point it to the path wherever this project exists.
You can find httpd.conf in the folder where apache is installed.
In my case it is "C:\wamp\bin\apache\apache2.4.9\conf\" as my wamp is installed in C: Drive.

###CODEIGNITER CONFIG
.htaccess -> Changed to remove index.php from the URL
config.php -> Changed 'index_page' config parameter to null
database.php -> Changed $db['default']['database'] to 'wingify'

###DATABASE RELATED CHANGES

Folder
database-changes -> notifications.sql

###IMPLEMENTATION

There are two main URLS

1. http://localhost/notification (Your base URL can be different)-> The main notification functionality can be obtained here.
2. http://localhost/notification/pushNotification (Your base URL can be different) -> Run this inorder to insert random Notifications in the database.

###STEPS

1. Run notifications.sql under database-changes folder.
2. Run the URL (http://localhost/notification/pushNotification). Note: In your case the base URL can change according to your config.
3. You either run (http://localhost/notification) or you can wait for 5 minutes to automatically refresh the page by itself.

###ASSUMPTIONS

1. No login functionality in order to avoid page refresh. (Every time a user logs in , the user can get notifications).
2. Random User ids generated.
3. Arbitrary Notification generated in the format-> USER_NAME "has posted with Notification_Number_"(SOME RANDOM NUMBER).
4. Three default images in the img folder. (You can put your own image. But please keep the prefix as default and followed by underscore (A number starting from 1 till 3)).

###CODE STRUCTURE

BACKEND - CODEIGNITER 2.2.6
1. MVC codes(Can be found under /application folder)
2. Custom Library for processing data(Can be found under /application/libraries)

FRONTEND- ANGULARJS
All js files can be obtained under /js/app folder
/js/app/views contains "popover" html.
angular-ui is used for popover.

CSS and IMAGES
All custom css and img files are found under /css and /img respectively.
For bootstrap and fontawesome css , the css are present in /bower_components.

###FUNCTIONALITY

1. A random notification is pushed in the database with default is_read parameter as 0.
2. User goes to the notification URL and can see the unread notification depending upon the is_read flag.
3. User clicks on the notification bell which sets the is_read flag to 1 in the database. Bell notification count is not shown after user clicks it.
4. Only counts of notifications are shown if is_read = 0.
5. All notifications are always shown irrespective of read or unread.
6. The dropdown or the popover shows "notification counts" only in first click as after the first click the notification is already read.
7. The random notification generation (http://localhost/notification/pushNotification) page should be refreshed in order to get new notifications.
8. If there is no data in the database it shows a popover with no notifications to show on clicking the bell.


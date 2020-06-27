<p align="center"><img src="https://github.com/Monika171/OutplacementHeroes/blob/master/public/profile_pic/oph.jpeg" width="400"></p>

## Update(28th June'20)

New Table added(Chat interface). Import or run (after git pull)
php artisan migrate 
  
New table 'messages.sql' is available inside  
OPH_sql_import1 > NEW_SQL_TABLE(chat)

## IMPORTANT!!!

1) After cloning(steps in point (5)), modify .env file with your own database, email values (or mailtrap values). Because a user can't proceed without email verification.  

--Also enter admin values, eg:
    
ADMIN_NAME="Some Admin Name"  
ADMIN_EMAIL=adminexample@site.com  
ADMIN_PASSWORD=AdminPassword  

-- email values, eg:  
  
MAIL_MAILER=smtp  
MAIL_HOST=smtp.gmail.com  
MAIL_PORT=587  
MAIL_USERNAME=site_email@site.com  
MAIL_PASSWORD=YourEmailPassword  
MAIL_ENCRYPTION=tls  
MAIL_FROM_ADDRESS=site_email@site.com  
MAIL_FROM_NAME=OPH 

-- pusher values, eg:  
  
PUSHER_APP_ID=--your unique value--  
PUSHER_APP_KEY=---your unique value------  
PUSHER_APP_SECRET=---your unique value------  
  
[OR login to https://pusher.com/ and create all new app.
Put pusher credentials to .env file <br>
Also replace PUSHER_APP_KEY in home.blade.php inside < script> eg:  
  
 var pusher = new Pusher('-----unique value-------', {  
         cluster: 'ap2'  
         });  
    
    
2) All database tables are imported as 'oph.sql' and is available inside:
OPH_sql_import1 > ALL_PRESENT_TABLES_EXPORT > oph.sql  
  
3) Import 'countries.sql', 'states.sql', 'cities.sql', 'courses.sql', 'designations.sql', 'industries.sql', 'skills.sql', 'specializations.sql' at your database.  
(If required, delete the previous existing tables with same name which got created after 'php artisan migrate' in first step!
Well sql query does the same but just in case..)  
  
(ALL These .sql files are available here inside 'OPH_sql_import1')  
     
NOTE:   
-----------------
[A] 'cities.sql' is comparatively a big file. May not get imported easily without doing some extra one or two steps.. i.e:  
1) At  
xampp control panel-> (mysql)config -> my.ini -> (open and set)  
myisam_sort_buffer_size = 100M  
2)
copy cities.sql to "C:\xampp\mysql\bin", then in terminal-  
C:\xampp\mysql\bin>mysql -u [username] -p [databaseName] < cities.sql  

[B] 'skills.sql' file may not get imported directly. In that case, please copy the INSERT QUERY from the file and use SQL(INSERT) at phpmyadmin to achieve the same.  
  
4) Make sure the project is cloned properly (confirm):    
a) git clone url    
b) Inside project folder(using cd):  
composer install  
(or "composer update", if former is already done. Not required, if project runs already)   
c) copy .env.example .env   
(Fill up your values in .env)  
d)create database and user. Fillup details in .env file including email, admin, pusher credentials. 
e) php artisan migrate  
("php artisan migrate:fresh" if using git pull or
Only when not taking/importing .sql files from 'OPH_sql_import1')  
f) php artisan db:seed --force    
(Only when not taking/importing .sql files from 'OPH_sql_import1')   
g) php artisan storage:link     
h) php artisan key:generate    
i) php artisan serve 
  
    
5) If Old values of any collaborator persists(which is unusual), please run (if SSH access available):  
   
php artisan clear-compiled    
php artisan cache:clear    
php artisan route:clear   
php artisan view:clear  
php artisan config:clear  
composer update  
php artisan storage:link  
php artisan key:generate  

      
## Team & Tasks:  
-HIRING EMPLOYERS, JOBSEEKERS, ADMIN (sending notification carrying JD link, if latter is eligible etc).<br>
~~[AssignedTo: <a href="https://github.com/Monika171">Monika</a>]<br>
<br>
-VOLUNTEERS:<br>
~~[AssignedTo: <a href="https://github.com/Priti-Gowala">Priti</a>]<br>
<br>
-SEPARATING EMPLOYERS, CONSULTANTS:<br>
~~[AssignedTo: <a href="https://github.com/pavangv28">Pavan</a>]<br>
<br>
-HOME+LOGIN+REGISTRATION PAGE DESIGN:<br>
~~[AssignedTo: <a href="https://github.com/AkankshaBoora">Akanksha</a>]<br>
<br>
-DATA-COLLECTION(Industry, Designation, Skills, Education):<br>
~~[by Pavan,Priti,<a href="https://github.com/Harshita248">Harshita</a>]<br>
<br>
